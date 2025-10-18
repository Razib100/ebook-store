<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Dom\Attr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display author list
     */
    public function author()
    {
        $authors = Author::latest()->orderBy('id', 'desc')->paginate(10);
        return view('admin.author.list', compact('authors'));
    }

    /**
     * Show add/edit form
     */
    public function authorAdd($id = null)
    {
        $author = null;
        if ($id) {
            $author = Author::findOrFail($id);
        }
        return view('admin.author.add', compact('author'));
    }

    /**
     * View single category
     */
    public function authorView($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.author.add', compact('author'));
    }

    /**
     * Store category
     */
    public function authorStore(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',          // Name can be duplicate
            'dob'   => 'nullable|date',
            'phone' => 'required|string|max:20|unique:authors,phone', // Phone mandatory & unique
        ]);


        $data = $request->all();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/assets/author'), $fileName);
            $imagePath = $fileName;
        }
        $data['image'] = $imagePath;
        $data['home_visible'] = $request->has('home_visible');
        $data['status'] = $request->has('status') ? 1 : 0;

        Author::create($data);

        return redirect()->route('author')->with('success', 'Author created successfully!');
    }

    /**
     * Update category
     */
    public function authorUpdate(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'dob'  => 'nullable|date',
            'phone' => 'required|string|max:20|unique:authors,phone,' . $author->id,
        ]);

        $data = $request->all();

        // Process image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/assets/author'), $fileName);
            $data['image'] = $fileName;

            // Delete old image
            if ($author->image) {
                Storage::disk('public')->delete('authors/' . $author->image);
            }
        } else {
            $data['image'] = $request->input('previous_image', $author->image);
        }
        $data['home_visible'] = $request->has('home_visible');
        $data['status'] = $request->has('status') ? 1 : 0;

        $author->update($data);

        return redirect()->route('author')->with('success', 'Author updated successfully!');
    }

    /**
     * Delete category
     */
    public function authorDelete($id)
    {
        $author = Author::findOrFail($id);

        // Delete files
        if ($author->image) {
            Storage::disk('public')->delete($author->image);
        }

        $author->delete();

        return redirect()->route('author')->with('success', 'Author deleted successfully!');
    }
}
