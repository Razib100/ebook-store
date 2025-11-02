<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\PDFMail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\ContactFormMail;
use DB;
use Carbon\Carbon;
use App\Helpers\Various;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::where('status', 1)->get();
        $authors = Author::where('home_visible', 1)->where('status', 1)->take(2)->get();
        $trendingProducts = Product::leftJoin('authors', 'products.author_id', '=', 'authors.id')
            ->where('products.is_trending', 1)
            ->where('products.status', 1)
            ->latest('products.created_at') // specify table
            ->take(6)
            ->select('products.*', 'authors.name as author_name')
            ->get();
        $topCategories = Category::where('status', 1)
            ->withCount('products')
            ->orderByDesc('products_count')
            ->take(6)
            ->get();
        $topCategoryProducts = [];

        foreach ($topCategories as $category) {
            $topCategoryProducts[$category->id] = $category->products()
                ->where('status', 1)
                ->latest()
                ->take(6)
                ->get();
        }
        // end top category and their products 

        // Last month best seller
        $startOfPrevMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfPrevMonth = Carbon::now()->subMonth()->endOfMonth();

        // Get the first and last day of the current month
        $startOfPrevMonth = Carbon::now()->startOfMonth();
        $endOfPrevMonth = Carbon::now()->endOfMonth();

        $topAuthorId = DB::table('products')
            ->select('author_id', DB::raw('count(*) as total_products'))
            ->whereBetween('created_at', [$startOfPrevMonth, $endOfPrevMonth])
            ->where('status', 1)
            ->groupBy('author_id')
            ->orderByDesc('total_products')
            ->limit(1)
            ->value('author_id');
        if ($topAuthorId) {
            $bestAuthor = Author::with(['products' => function ($query) use ($startOfPrevMonth, $endOfPrevMonth) {
                $query->whereBetween('created_at', [$startOfPrevMonth, $endOfPrevMonth])
                    ->where('status', 1)
                    ->latest()
                    ->take(4)
                    ->select('id', 'author_id', 'cover_image');
            }])
                ->withCount(['products' => function ($query) {
                    $query->where('status', 1); // total products
                }])
                ->find($topAuthorId, ['id', 'name', 'image', 'short_description']);

            $topSeller = [
                'name' => $bestAuthor->name,
                'image' => $bestAuthor->image,
                'short_description' => $bestAuthor->short_description,
                'total_products' => $bestAuthor->products_count,
                'products_cover_images' => $bestAuthor->products->pluck('cover_image')->toArray(),
            ];
        } else {
            $topSeller = null;
        }

        $homeProducts = Product::with(['category', 'author'])
            ->where('home_visible', 1)
            ->where('status', 1)
            ->inRandomOrder()
            ->latest('created_at')
            ->get();

        // Group by category and limit 6 per category
        $productsByCategory = $homeProducts
            ->groupBy('category_id')
            ->map(function ($products) {
                return $products->shuffle()->take(6);
            });

        $mostDownloadedProducts = Product::with(['category', 'author'])
            ->where('status', 1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->orderByDesc('download_count')
            ->take(12)
            ->get();

        return view('frontend.home', compact('categories', 'trendingProducts', 'authors', 'topCategories', 'topCategoryProducts', 'topSeller', 'productsByCategory', 'mostDownloadedProducts'));
    }

    public function bookByCategory($id)
    {
        $categories = Category::where('status', 1)->get();
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(9);

        return view('frontend.shop', compact('products', 'category', 'categories'));
    }
    public function search(Request $request)
    {
        $query = Product::query()->where('status', 1);

        // Filter by category
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by author name search
        if ($request->search) {
            $query->whereHas('author', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by author ID
        if ($request->author_id) {
            $query->where('author_id', $request->author_id);
        }

        // Filter by minimum price
        if ($request->price_min !== null) {
            $query->where('price', '>=', $request->price_min);
        }

        // Filter by maximum price
        if ($request->price_max !== null) {
            $query->where('price', '<=', $request->price_max);
        }

        // Filter by minimum rating
        if ($request->rating_min) {
            $query->whereHas('reviews', function ($q) use ($request) {
                $q->havingRaw('rating = ?', [$request->rating_min]);
            });
        }

        // Filter by formats
        if ($request->formats && is_array($request->formats)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->formats as $format) {
                    $q->orWhereNotNull($format . '_file');  // Assuming your product table has 'pdf_file', 'epub_file', 'mobi_file' columns
                }
            });
        }

        // Sort order
        switch ($request->orderby) {
            case 'asc':
                $query->orderBy('id', 'asc');
                break;
            case 'price-low-to-high':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high-to-low':
                $query->orderBy('price', 'desc');
                break;
            case 'desc':
            default:
                $query->orderBy('id', 'desc');
                break;
        }

        $products = $query->paginate(12)->appends($request->except('page')); // append filters to pagination links

        $categories = Category::where('status', 1)->get();

        return view('frontend.shop', compact('products', 'categories'));
    }

    public function bookById($id)
    {
        $categories = Category::where('status', 1)->get();
        $product = Product::leftJoin('authors', 'products.author_id', '=', 'authors.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->with(['author', 'category'])
            ->select('products.*', 'authors.name as author_name', 'categories.name as category_name')
            ->findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(10)
            ->get();
        $product = Product::findOrFail($id);
        $canReview = Various::getProductByCustomer($id);
        $isReview = Various::reviewCheck($id);
        $reviews = Review::with('customer')
            ->where('status', 1)
            ->where('product_id', $id)
            ->take(10)
            ->latest()
            ->get();

        return view('frontend.book-details', compact('product', 'categories', 'relatedProducts', 'canReview', 'isReview', 'reviews'));
    }
    public function aboutUs()
    {
        $categories = Category::where('status', 1)->get();
        return view('frontend.about', compact('categories'));
    }

    public function contact()
    {
        $categories = Category::where('status', 1)->get();
        $operators = ['+', '-', '*']; // Define possible operators
        $num1 = rand(1, 10); // Generate a random number
        $num2 = rand(1, 10); // Generate another random number
        $operator = $operators[array_rand($operators)]; // Pick a random operator

        // Calculate the result based on the operator
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
        }

        // Store the result in the session for validation
        session(['captcha_result' => $result]);

        return view('frontend.contact', compact('categories', 'num1', 'num2', 'operator'));
    }
    public function submit(Request $request)
    {
        // Step 1: Validate the form data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'user_result' => 'required|numeric',
            'file' => 'nullable|mimes:png,jpg,jpeg,docx,ppt,pdf,csv,xlsx|max:5120', // File validation
        ]);

        // Step 2: Validate captcha
        $correctResult = session('captcha_result');
        if ($request->input('user_result') != $correctResult) {
            return back()->with('error', 'Incorrect captcha answer. Please try again.');
        }

        // Step 3: Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Save in 'storage/app/public/uploads'
        }
        $subject = '';
        if ($request->input('subject') == 0) {
            $subject = 'Normal issue';
        } elseif ($request->input('subject') == 1) {
            $subject = 'Technical problem';
        } elseif ($request->input('subject') == 2) {
            $subject = 'Payment unsuccessful';
        } else {
            $subject = 'Payment successful but pdf download issue';
        }
        // Step 4: Prepare email data
        $emailData = [
            'first_name' => $request->input('first_name'),
            'email' => $request->input('email'), // User's email for the dynamic "from"
            'subject' => $subject,
            'message' => $request->input('message'),
            'file_path' => $filePath ? asset('storage/' . $filePath) : null,
        ];

        // Step 5: Send email
        Mail::to('razibdeveloper634@gmail.com')->send(new ContactFormMail($emailData));

        return back()->with('success', 'Your message has been sent successfully.');
    }

    public function termsCondition()
    {
        $categories = Category::where('status', 1)->get();
        return view('frontend.terms-condition', compact('categories'));
    }
}
