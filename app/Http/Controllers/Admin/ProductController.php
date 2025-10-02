<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display category list
     */
    public function product()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.product.list', compact('products'));
    }

    /**
     * Show add/edit form
     */
    public function productAdd($id = null)
    {
        $categories = Category::all();
        $product = null;
        if ($id) {
            $product = Product::findOrFail($id);
        }
        $galleryImages = [];
        if (!empty($product->product_gallery)) {
            $galleryImages = json_decode($product->product_gallery, true);
        }
        return view('admin.product.add', compact('product', 'categories', 'galleryImages'));
    }

    /**
     * View single category
     */
    public function productView($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        $galleryImages = [];
        if (!empty($product->product_gallery)) {
            $galleryImages = json_decode($product->product_gallery, true);
        }
        return view('admin.product.add', compact('product', 'categories', 'galleryImages'));
    }


    /**
     * Store category
     */
    public function productStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric',
            'logo' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10000',
            'epub_file' => 'nullable|mimes:epub|max:10000',
            'mobi_file' => 'nullable|mimes:mobi|max:100000',
            'status' => 'required|in:0,1',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->is_trending = $request->has('is_trending');
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

        return redirect()->route('product')->with('success', 'Product created successfully.');
    }

    /**
     * Update category
     */
    public function productUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric',
            'cover_image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'existing_gallery.*' => 'nullable|string',
            'pdf_file' => 'nullable|mimes:pdf|max:10000',
            'epub_file' => 'nullable|mimes:epub|max:10000',
            'mobi_file' => 'nullable|mimes:mobi|max:100000',
            'status' => 'required|in:0,1',
        ]);

        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
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

        return redirect()->route('product')->with('success', 'Product updated successfully.');
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

        return redirect()->route('product')->with('success', 'Product deleted successfully!');
    }
}
