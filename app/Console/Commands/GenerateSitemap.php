<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Blog;
use App\Models\Category;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.xml file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        // Create the sitemap instance
        $sitemap = Sitemap::create();

        // Add static routes
        $sitemap->add(Url::create('/')
            ->setPriority(1.0)
            ->setChangeFrequency('daily'))
            ->add(Url::create('/home')
            ->setPriority(0.9)
            ->setChangeFrequency('weekly'))
            ->add(Url::create('/blogs')
            ->setPriority(0.8)
            ->setChangeFrequency('weekly'))
            ->add(Url::create('/categories')
            ->setPriority(0.7)
            ->setChangeFrequency('monthly'));

        // Add dynamic blog routes
        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            $sitemap->add(
                Url::create("/blogs/{$blog->id}")
                    ->setLastModificationDate($blog->updated_at ?? $blog->created_at)
                    ->setPriority(0.8)
                    ->setChangeFrequency('weekly')
            );
        }

        // Add dynamic category routes
        $categories = Category::all();
        foreach ($categories as $category) {
            $sitemap->add(
                Url::create("/categories/edit/{$category->id}")
                    ->setLastModificationDate($category->updated_at ?? $category->created_at)
                    ->setPriority(0.6)
                    ->setChangeFrequency('monthly')
            );
        }

        // Write the sitemap to the public folder
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at public/sitemap.xml');

        return Command::SUCCESS;
    }
}
