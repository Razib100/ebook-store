<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use DB;

class CartController extends Controller
{
    // Add product to cart (AJAX POST)
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        // For ebooks: only one per product allowed
        if (isset($cart[$product->id])) {
            return response()->json([
                'success' => false,
                'message' => 'This book is already in your cart.',
                'count' => count($cart),
            ], 409);
        }

        $discount = (int) ($product->percentage ?? 0);
        $price = (float) $product->price;
        $discountPrice = $discount > 0 ? round($price - ($price * $discount / 100), 2) : $price;

        $cart[$product->id] = [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $price,
            'discount' => $discount,
            'final_price' => $discountPrice,
            'cover_image' => $product->cover_image, // adjust path if stored differently
            'slug' => $product->slug ?? '',
        ];

        session()->put('cart', $cart);

        // return updated mini cart html and count
        $html = view('frontend.partials.header_mini_cart', [
            'cartItems' => collect($cart),
            'subtotal' => collect($cart)->sum('final_price'),
        ])->render();

        return response()->json([
            'success' => true,
            'message' => 'Book added to cart',
            'count' => count($cart),
            'html' => $html,
            'subtotal' => collect($cart)->sum('final_price'),
        ]);
    }

    // Return mini cart HTML (used to refresh header)
    public function mini()
    {
        $cart = session()->get('cart', []);
        $html = view('frontend.partials.header_mini_cart', [
            'cartItems' => collect($cart),
            'subtotal' => collect($cart)->sum('final_price'),
        ])->render();

        return response()->json([
            'html' => $html,
            'count' => count($cart),
            'subtotal' => collect($cart)->sum('final_price'),
        ]);
    }

    // (Optional) index & remove methods if not already present
    public function index()
    {
        $customerId = Auth::guard('customer')->id();
        $categories = Category::where('status', 1)->get();
        $cart = session()->get('cart', []);
        $removedPurchasedProducts = false; // Flag for Blade

        if ($customerId && !empty($cart)) {
            // Get all product IDs in the cart (keys of the cart array)
            $cartProductIds = array_keys($cart);

            // Get purchased product IDs for this customer
            $purchasedProductIds = Purchase::where('customer_id', $customerId)
                ->whereIn('product_id', $cartProductIds)
                ->pluck('product_id')
                ->toArray();

            if (!empty($purchasedProductIds)) {
                $removedPurchasedProducts = true; // Set flag if any product is removed

                // Remove purchased products from cart
                foreach ($purchasedProductIds as $productId) {
                    if (isset($cart[$productId])) {
                        unset($cart[$productId]);
                    }
                }

                // Update the session cart
                session()->put('cart', $cart);
            }
        }

        $grandTotal = collect($cart)->sum('final_price');

        return view('frontend.cart', compact('cart', 'grandTotal', 'categories', 'removedPurchasedProducts'));
    }


    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            $cartItems = collect($cart);
            $subtotal = $cartItems->sum(fn($item) => $item['final_price']);
            $html = view('frontend.partials.header_mini_cart', compact('cartItems', 'subtotal'))->render();

            return response()->json([
                'status' => 'success',
                'message' => 'Product removed from cart successfully!',
                'count' => count($cartItems),
                'subtotal' => $subtotal,
                'html' => $html
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Product not found in cart'
        ], 404);
    }
    public function removed(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            // Flash a message to session
            $request->session()->flash('toast', [
                'message' => 'Product removed from cart successfully!',
                'type' => 'danger' // you can use 'success' or 'danger'
            ]);

            return redirect()->back();
        }

        // If product not found
        $request->session()->flash('toast', [
            'message' => 'Product not found in cart',
            'type' => 'danger'
        ]);

        return redirect()->back();
    }
}
