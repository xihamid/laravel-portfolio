<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = ['Technology', 'Education', 'Health', 'Lifestyle', 'Travel'];

        // Ensure the uploads/categories directory exists
        $categoryPath = public_path('uploads/categories');
        if (!File::exists($categoryPath)) {
            File::makeDirectory($categoryPath, 0755, true);
        }

        foreach ($categories as $categoryName) {
            // Generate a unique file name for the placeholder image
            $imageName = uniqid() . '.jpg'; // Unique file name
            $imagePath = $categoryPath . '/' . $imageName;
            copy('https://via.placeholder.com/300', $imagePath); // Download and save placeholder image

            // Save category with only the file name
            Category::create([
                'name' => $categoryName,
                'image' => $imageName, // Save only the file name
            ]);
        }
    }
}
