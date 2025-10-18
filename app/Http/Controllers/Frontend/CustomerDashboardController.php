<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Review;
use App\Models\Customer;
use App\Helpers\Various;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $customerId = Auth::guard('customer')->id();
        $categories = Category::where('status', 1)->get();
        $customer = Auth::guard('customer')->user();
        $purchasedProductIds = Purchase::where('customer_id', $customerId)
            ->pluck('product_id')
            ->toArray();

        $products = Product::leftJoin('authors', 'products.author_id', '=', 'authors.id')
            ->leftJoin('purchases', function ($join) use ($customerId) {
                $join->on('products.id', '=', 'purchases.product_id')
                    ->where('purchases.customer_id', $customerId);
            })
            ->leftJoin('payments', 'purchases.payment_id', '=', 'payments.id')
            ->whereIn('products.id', $purchasedProductIds)
            ->where('products.status', 1)
            ->select(
                'products.*',
                'authors.name as author_name',
                'payments.status as payment_status'
            )
            ->get();
        return view('frontend.customer.dashboard', compact('customer', 'categories', 'products'));
    }
    public function customerPanel(){
        $customerId = Auth::guard('customer')->id();
        $categories = Category::where('status', 1)->get();
        $customer = Auth::guard('customer')->user();
        $purchasedProductIds = Purchase::where('customer_id', $customerId)
            ->pluck('product_id')
            ->toArray();

        $products = Product::leftJoin('authors', 'products.author_id', '=', 'authors.id')
            ->leftJoin('purchases', function ($join) use ($customerId) {
                $join->on('products.id', '=', 'purchases.product_id')
                    ->where('purchases.customer_id', $customerId);
            })
            ->leftJoin('payments', 'purchases.payment_id', '=', 'payments.id')
            ->whereIn('products.id', $purchasedProductIds)
            ->where('products.status', 1)
            ->select(
                'products.*',
                'authors.name as author_name',
                'payments.status as payment_status'
            )
            ->get();
        return view('customer.dashboard', compact('customer', 'categories', 'products'));
    }
    public function store(Request $request, $productId)
    {
        $request->validate([
            'review' => 'required|string|max:1000',
        ]);

        Review::create([
            'customer_id' => Auth::guard('customer')->id(),
            'product_id' => $productId,
            'comment' => $request->review,
            'rating' => $request->rating,
            'status' => 0
        ]);

        return back()->with('success', 'Thank you for your review!');
    }

    /**
     * Display category list
     */
    public function product()
    {
        $customerId = Auth::guard('customer')->id();
        $existingAuthor = Author::where('customer_id', $customerId)->first();
        $products = Product::where('author_id', $existingAuthor->id)->where('created_by', 'customer')->latest()->paginate(20);
        return view('customer.book.list', compact('products'));
    }

    /**
     * Show add/edit form
     */
    public function productAdd($id = null)
    {
        $customerId = Auth::guard('customer')->id();
        $categories = Category::where('status', 1)->get();
        $author    = Customer::where('id', $customerId)->where('status', 1)->first();

        $product = null;
        if ($id) {
            $product = Product::findOrFail($id);
        }
        $galleryImages = [];
        if (!empty($product->product_gallery)) {
            $galleryImages = json_decode($product->product_gallery, true);
        }
        return view('customer.book.add', compact('product', 'author', 'categories', 'galleryImages'));
    }

    /**
     * View single category
     */
    public function productView($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $customerId = Auth::guard('customer')->id();
        $categories = Category::where('status', 1)->get();
        $author    = Customer::where('id', $customerId)->where('status', 1)->first();
        $galleryImages = [];
        if (!empty($product->product_gallery)) {
            $galleryImages = json_decode($product->product_gallery, true);
        }
        return view('customer.book.add', compact('product', 'author', 'categories', 'galleryImages'));
    }


    /**
     * Store category
     */
    public function productStore(Request $request)
    {

        $customerId = Auth::guard('customer')->id();
        $existingAuthor = Author::where('customer_id', $customerId)->first();

        if (!$existingAuthor) {
            $existingAuthor = Author::create([
                'customer_id'  => $customerId,
                'name'         => $request->author_id,
                'gender'       => $request->gender ?? 'male',
                'dob'          => $request->dob ?? now(),
                'phone'        => $request->phone ?? Various::generateUniquePhone(),
                'email'        => $request->email ?? null,
                'home_visible' => 1,
                'status'       => 1,
            ]);
        }
        
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'exists:categories,id',
            'price' => 'required|numeric',
            'percentage' => 'nullable|numeric',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'cover_image' => 'required|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|required_without_all:epub_file,mobi_file',
            'epub_file' => 'nullable|mimes:epub|required_without_all:pdf_file,mobi_file',
            'mobi_file' => 'nullable|mimes:mobi|required_without_all:pdf_file,epub_file',
            'status' => 'required|in:0,1',
        ], [
            'short_description.max' => 'Short description cannot exceed 500 characters.',
            'pdf_file.required_without_all' => 'At least one file (PDF, EPUB, or MOBI) must be uploaded.',
            'epub_file.required_without_all' => 'At least one file (PDF, EPUB, or MOBI) must be uploaded.',
            'mobi_file.required_without_all' => 'At least one file (PDF, EPUB, or MOBI) must be uploaded.',
        ]);
        try {
            $product = new Product();
            $product->title = $request->title;
            $product->author_id = $existingAuthor->id;
            $product->created_by = 'customer';
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->percentage = $request->percentage;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->tags = $request->tags ? explode(',', $request->tags) : [];
            $product->is_trending = $request->has('is_trending');
            $product->home_visible = $request->has('home_visible');
            $product->status = $request->status;

            $uploadPath = public_path('admin/assets/product');

            // Logo upload
            if ($request->hasFile('cover_image')) {
                $cover_image = $request->file('cover_image');
                $coverImageName = time() . '_' . $cover_image->getClientOriginalName();
                $cover_image->move($uploadPath, $coverImageName);
                $product->cover_image = 'admin/assets/product/' . $coverImageName;
            }

            // Gallery upload
            if ($request->hasFile('gallery_images')) {
                $galleryPaths = [];
                foreach ($request->file('gallery_images') as $image) {
                    $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                    $image->move($uploadPath, $imageName);
                    $galleryPaths[] = 'admin/assets/product/' . $imageName;
                }
                $product->product_gallery = json_encode($galleryPaths);
            }
            $uploadPDFPath = public_path('admin/assets/product/pdf');
            // Files upload (optional, can use same public path or keep storage)
            if ($request->hasFile('pdf_file')) {
                $pdf = $request->file('pdf_file');
                $pdfName = time() . '_' . $pdf->getClientOriginalName();
                $pdf->move($uploadPDFPath, $pdfName);
                $product->pdf_file = 'admin/assets/product/pdf/' . $pdfName;
            }
            $uploadEpubPath = public_path('admin/assets/product/epub');
            if ($request->hasFile('epub_file')) {
                $epub = $request->file('epub_file');
                $epubName = time() . '_' . $epub->getClientOriginalName();
                $epub->move($uploadEpubPath, $epubName);
                $product->epub_file = 'admin/assets/product/epub/' . $epubName;
            }
            $uploadMobiPath = public_path('admin/assets/product/mobi');
            if ($request->hasFile('mobi_file')) {
                $mobi = $request->file('mobi_file');
                $mobiName = time() . '_' . $mobi->getClientOriginalName();
                $mobi->move($uploadMobiPath, $mobiName);
                $product->mobi_file = 'admin/assets/product/mobi/' . $mobiName;
            }

            $product->save();
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong while saving the product.');
        }

        return redirect()->route('customer.book')->with('success', 'Product created successfully.');
    }

    /**
     * Update category
     */
    public function productUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $customerId = Auth::guard('customer')->id();
        $existingAuthor = Author::where('customer_id', $customerId)->first();
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'exists:categories,id',
            'price' => 'required|numeric',
            'percentage' => 'nullable|numeric',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'cover_image' => 'required_without:previous_cover_image|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf',
            'epub_file' => 'nullable|mimes:epub',
            'mobi_file' => 'nullable|mimes:mobi',
            'status' => 'required|in:0,1',
        ], [
            'short_description.max' => 'Short description cannot exceed 500 characters.',
            'cover_image.required_without' => 'Cover image is required if no previous image exists.',
        ]);
        

        $product->title = $request->title;
        $product->author_id = $existingAuthor->id;

        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->percentage = $request->percentage;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->tags = $request->tags ? explode(',', $request->tags) : [];
        $product->home_visible = $request->has('home_visible');

        $product->is_trending = $request->has('is_trending');
        $product->status = $request->status;

        $uploadPath = public_path('admin/assets/product');

        // Cover image upload
        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');
            $coverImageName = time() . '_' . $cover_image->getClientOriginalName();
            $cover_image->move($uploadPath, $coverImageName);
            $product->cover_image = 'admin/assets/product/' . $coverImageName;
        } else if ($request->input('previous_cover_image')) {
            $product->cover_image = $request->input('previous_cover_image');
        }

        // Gallery images
        $existingGallery = $request->input('existing_gallery', []); // array of existing images user kept
        $galleryPaths = $existingGallery;

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move($uploadPath, $imageName);
                $galleryPaths[] = 'admin/assets/product/' . $imageName;
            }
        }

        $product->product_gallery = json_encode($galleryPaths);

        // Files upload
        $uploadPDFPath = public_path('admin/assets/product/pdf');
        if ($request->hasFile('pdf_file')) {
            $pdf = $request->file('pdf_file');
            $pdfName = time() . '_' . $pdf->getClientOriginalName();
            $pdf->move($uploadPDFPath, $pdfName);
            $product->pdf_file = 'admin/assets/product/pdf/' . $pdfName;
        } else if ($request->input('previous_pdf_file')) {
            $product->pdf_file = $request->input('previous_pdf_file');
        }

        $uploadEpubPath = public_path('admin/assets/product/epub');
        if ($request->hasFile('epub_file')) {
            $epub = $request->file('epub_file');
            $epubName = time() . '_' . $epub->getClientOriginalName();
            $epub->move($uploadEpubPath, $epubName);
            $product->epub_file = 'admin/assets/product/epub/' . $epubName;
        } else if ($request->input('previous_epub_file')) {
            $product->epub_file = $request->input('previous_epub_file');
        }

        $uploadMobiPath = public_path('admin/assets/product/mobi');
        if ($request->hasFile('mobi_file')) {
            $mobi = $request->file('mobi_file');
            $mobiName = time() . '_' . $mobi->getClientOriginalName();
            $mobi->move($uploadMobiPath, $mobiName);
            $product->mobi_file = 'admin/assets/product/mobi/' . $mobiName;
        } else if ($request->input('previous_mobi_file')) {
            $product->mobi_file = $request->input('previous_mobi_file');
        }

        $product->save();

        return redirect()->route('customer.book')->with('success', 'Product updated successfully.');
    }


    /**
     * Delete category
     */
    public function productDelete($id)
    {
        $product = Product::findOrFail($id);

        // Optional: delete associated files from storage
        if ($product->cover_image && file_exists(public_path($product->cover_image))) {
            unlink(public_path($product->cover_image));
        }

        if ($product->product_gallery) {
            $galleryImages = json_decode($product->product_gallery, true);
            if (is_array($galleryImages)) {
                foreach ($galleryImages as $image) {
                    if (file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }
        }

        if ($product->pdf_file && file_exists(public_path($product->pdf_file))) {
            unlink(public_path($product->pdf_file));
        }

        if ($product->epub_file && file_exists(public_path($product->epub_file))) {
            unlink(public_path($product->epub_file));
        }

        if ($product->mobi_file && file_exists(public_path($product->mobi_file))) {
            unlink(public_path($product->mobi_file));
        }

        $product->delete();

        return redirect()->route('customer.book')->with('success', 'Product deleted successfully!');
    }
}
