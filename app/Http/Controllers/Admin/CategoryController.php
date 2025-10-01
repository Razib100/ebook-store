<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display category list
     */
    public function category()
    {
        $categories = Category::orderBy('position', 'asc')->paginate(10);
        return view('admin.category.list', compact('categories'));
    }

    /**
     * Show add/edit form
     */
    public function categoryAdd($id = null)
    {
        $category = null;
        if ($id) {
            $category = Category::findOrFail($id);
        }
        return view('admin.category.add', compact('category'));
    }

    /**
     * View single category
     */
    public function categoryView($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.add', compact('category'));
    }

    /**
     * Store category
     */
    public function categoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'position' => 'required|integer|unique:categories,position',
        ], [
            'position.unique' => 'This position is already assigned, please try another position.',
        ]);

        $data = $request->all();

        // Process image upload
        $logo = null;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('frontend/assets/category'), $fileName);
            $logoPath = $fileName;
        }

        // Checkbox (is_visible)
        $data['is_visible'] = $request->has('is_visible') ? 1 : 0;
        $data['is_trending'] = $request->has('is_trending') ? 1 : 0;
        $data['logo'] = $logoPath;
        $data['date'] = now()->toDateString();

        Category::create($data);

        return redirect()->route('category')->with('success', 'Category created successfully!');
    }

    /**
     * Update category
     */
    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'position' => 'required|integer|unique:categories,position,' . $id,
        ], [
            'position.unique' => 'This position is already assigned, please try another position.',
        ]);

        $data = $request->all();
        $data['is_visible'] = $request->has('is_visible') ? 1 : 0;
        $data['is_trending'] = $request->has('is_trending') ? 1 : 0;

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('frontend/assets/category'), $fileName);
            $logoPath = $fileName;
        } else {
            $logoPath = $request->input('previous_logo');
        }

        $data['logo'] = $logoPath;
        $data['date'] = now()->toDateString();


        $category->update($data);

        return redirect()->route('category')->with('success', 'Category updated successfully!');
    }

    /**
     * Delete category
     */
    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);

        // Delete files
        if ($category->logo) {
            Storage::disk('public')->delete($category->logo);
        }
        if ($category->banner) {
            Storage::disk('public')->delete($category->banner);
        }

        $category->delete();

        return redirect()->route('category')->with('success', 'Category deleted successfully!');
    }
}
