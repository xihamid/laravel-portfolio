<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\File;


class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = Category::all();
        $blogPath = public_path('uploads/blogs');

        // Ensure the 'uploads/blogs' directory exists
        if (!File::exists($blogPath)) {
            File::makeDirectory($blogPath, 0755, true);
        }

        foreach (range(1, 20) as $index) {
            // Select a random category
            $category = $categories->random();

            // Generate a random placeholder image
            $imageName = uniqid() . '.jpg'; // Generate a unique file name
            $imagePath = $blogPath . '/' . $imageName;
            copy('https://via.placeholder.com/600', $imagePath); // Download and save placeholder image

            Blog::create([
                'title' => "Sample Blog Title $index",
                'content' => "This is the content for blog post $index. It's automatically generated.",
                'thumbnail' => $imageName, // Save only the file name
                'category_id' => $category->id,
                'tags' => 'Sample,Test,Placeholder',
            ]);
        }
    }
}
