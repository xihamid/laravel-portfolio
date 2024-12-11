<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File; // Import the File facade


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $imagePath = public_path('uploads/categories'); // Path to the 'uploads/categories' folder

            // Ensure the directory exists
            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0755, true); // Create the directory if it doesn't exist
            }

            // Move the file to the specified directory
            $request->file('image')->move($imagePath, $imageName);

            // Save only the file name in the database
            $validated['image'] = $imageName;
        }

        // Create the category
        try {
            Category::create($validated);

            return redirect()->route('categories.index')->with('success', 'Category added successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to add the category. Please try again.']);
        }
    }



      // Edit Category
      public function edit($id)
      {
          $category = Category::findOrFail($id);
          return view('categories.edit', compact('category'));
      }

      // Update Category
      public function update(Request $request, $id)
      {
          $validated = $request->validate([
              'name' => 'required|string|max:255|unique:categories,name,' . $id,
              'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
          ]);

          $category = Category::findOrFail($id);

          if ($request->hasFile('image')) {
              // Delete old image if exists
              if ($category->image && File::exists(public_path('uploads/categories/' . $category->image))) {
                  File::delete(public_path('uploads/categories/' . $category->image));
              }

              // Upload new image
              $imageName = time() . '.' . $request->image->extension();
              $request->image->move(public_path('uploads/categories'), $imageName);
              $validated['image'] = $imageName;
          }

          $category->update($validated);

          return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
      }

      // Delete Category
      public function destroy($id)
      {
          $category = Category::findOrFail($id);

          // Delete image if exists
          if ($category->image && File::exists(public_path('uploads/categories/' . $category->image))) {
              File::delete(public_path('uploads/categories/' . $category->image));
          }

          $category->delete();

          return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
      }


}
