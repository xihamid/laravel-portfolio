<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\File; // Import the File facade

class BlogController extends Controller
{
/**
     * Display a listing of blogs.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(6); // Paginated blog listing
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
{
    $categories = \App\Models\Category::all(); // Fetch all categories
    return view('blogs.create', compact('categories'));
}


    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'category_id' => 'required|exists:categories,id', // Ensure the category exists
        'tags' => 'nullable|string', // Tags can be optional and comma-separated
    ]);

    if ($request->hasFile('thumbnail')) {
        $thumbnailName = time() . '.' . $request->file('thumbnail')->extension();
        $thumbnailPath = public_path('uploads/blogs'); // Path to the 'uploads/blogs' folder

        // Ensure the directory exists
        if (!File::exists($thumbnailPath)) {
            File::makeDirectory($thumbnailPath, 0755, true);
        }

        // Move the file to the specified directory
        $request->file('thumbnail')->move($thumbnailPath, $thumbnailName);

        // Save only the file name in the database
        $validated['thumbnail'] = $thumbnailName;
    }


    // Create the blog
    try {
        Blog::create($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    } catch (\Exception $e) {
        // Handle errors gracefully
        return back()->withErrors(['error' => 'Failed to create the blog. Please try again.']);
    }
}





    /**
     * Display the specified blog.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Handle TinyMCE image upload.
     */
    public function uploadImage(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        try {
            // Ensure the 'uploads' directory exists
            $uploadsFolder = public_path('uploads');
            if (!file_exists($uploadsFolder)) {
                mkdir($uploadsFolder, 0755, true); // Create the folder with proper permissions
            }

            // Generate a unique file name with timestamp
            $file = $request->file('file');
            $timestamp = now()->format('YmdHis'); // Current timestamp
            $fileName = $timestamp . '_' . $file->getClientOriginalName();

            // Move the file to the 'uploads' folder
            $file->move($uploadsFolder, $fileName);

            // Generate the URL for the uploaded file
            $url = asset('uploads/' . $fileName);

            return response()->json(['location' => $url], 200);
        } catch (\Exception $e) {
            // Handle errors during upload
            return response()->json(['error' => 'Failed to upload image'], 500);
        }
    }

    public function search(Request $request)
    {
        // dd(111111111111);
        $query = $request->input('query');

        if (!$query) {
            return response()->json(['blogs' => []], 200);
        }

        $blogs = Blog::with('category')
            ->where('title', 'LIKE', "%$query%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhere('tags', 'LIKE', "%$query%")
            ->get();

        return response()->json([
            'blogs' => $blogs->map(function ($blog) {
                return [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'thumbnail' => $blog->thumbnail ?? 'default-thumbnail.jpg',
                    'category_name' => $blog->category->name ?? 'Uncategorized',
                    'tags' => $blog->tags,
                    'created_at' => $blog->created_at->format('Y-m-d H:i:s'),
                ];
            }),
        ]);
    }



    public function edit($id)
{
    $blog = Blog::findOrFail($id); // Fetch the blog to edit
    $categories = Category::all(); // Fetch all categories for the dropdown
    return view('blogs.edit', compact('blog', 'categories'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|string',
    ]);

    $blog = Blog::findOrFail($id);

    // Handle thumbnail upload
    if ($request->hasFile('thumbnail')) {
        $thumbnailName = time() . '.' . $request->file('thumbnail')->extension();
        $thumbnailPath = public_path('uploads/blogs');

        // Ensure the directory exists
        if (!File::exists($thumbnailPath)) {
            File::makeDirectory($thumbnailPath, 0755, true);
        }

        // Delete the old thumbnail
        if ($blog->thumbnail && File::exists($thumbnailPath . '/' . $blog->thumbnail)) {
            File::delete($thumbnailPath . '/' . $blog->thumbnail);
        }

        // Move the new thumbnail
        $request->file('thumbnail')->move($thumbnailPath, $thumbnailName);
        $validated['thumbnail'] = $thumbnailName;
    }

    // Update the blog
    $blog->update($validated);

    return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
}

public function destroy($id)
{
    $blog = Blog::findOrFail($id);

    // Delete the thumbnail if it exists
    $thumbnailPath = public_path('uploads/blogs');
    if ($blog->thumbnail && File::exists($thumbnailPath . '/' . $blog->thumbnail)) {
        File::delete($thumbnailPath . '/' . $blog->thumbnail);
    }

    // Delete the blog
    $blog->delete();

    return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
}



}
