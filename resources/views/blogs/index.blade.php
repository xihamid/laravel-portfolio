@extends('layouts.app')

@section('title', 'Blogs - Muhammad Hamid | Explore Articles and Tutorials')
@section('meta_description', 'Discover engaging blogs and tutorials by Muhammad Hamid. Explore articles on software engineering, Laravel development, and full-stack development.')
@section('meta_keywords', 'Blogs, Tutorials, Muhammad Hamid, Laravel Blogs, Fullstack Development, Software Engineering Articles')

@section('content')

<!-- Breadcrumb Navigation -->
<nav aria-label="breadcrumb" class="mt-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
    </ol>
</nav>

<div class="container mt-5">
    <h1 class="text-center mb-4" style="color: #040b14;">Explore Blogs by Muhammad Hamid</h1>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            <div class="search-bar position-relative">
                <input
                    type="text"
                    id="liveSearch"
                    class="form-control"
                    placeholder="Search blogs by title, category, or tags..."
                    autofocus
                >
                <button class="btn search-btn">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Blog Listing -->
    <div class="row gy-4" id="blogContainer">
        @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 blog-item">
                <div class="card blog-card shadow-lg border-0">
                    <!-- Blog Thumbnail -->
                    <a href="{{ route('blogs.show', $blog->id) }}" class="card-link">
                        <div class="card-img-container position-relative">
                            <img src="{{ asset('uploads/blogs/' . $blog->thumbnail) }}"
                                 class="card-img-top img-fluid"
                                 alt="{{ $blog->title }} - Blog Image">
                            <div class="img-overlay d-flex align-items-center justify-content-center">
                                <h5 class="text-white fw-bold text-center px-3">{{ Str::limit($blog->title, 30, '...') }}</h5>
                            </div>
                        </div>
                    </a>
                    <!-- Blog Meta -->
                    <div class="card-body text-center">
                        <h5 class="card-title mt-2">
                            <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none title-hover-effect">
                                {{ Str::limit($blog->title, 50, '...') }}
                            </a>
                        </h5>
                        <p class="text-muted small mb-1">
                            <span class="badge bg-primary">Category: {{ $blog->category->name ?? 'Uncategorized' }}</span>
                            @if($blog->tags)
                                @foreach(explode(',', $blog->tags) as $tag)
                                    <span class="badge bg-secondary">Tag: {{ $tag }}</span>
                                @endforeach
                            @endif
                        </p>
                        <p class="text-muted small">
                            Published on {{ $blog->created_at->format('F d, Y') }}
                            @if($blog->created_at->diffInDays(now()) <= 7)
                                <span class="badge bg-warning text-dark">New</span>
                            @endif
                        </p>

                        <!-- Action Buttons -->
                        @auth
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <!-- Edit Button -->
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $blogs->links('pagination::bootstrap-4') }}
    </div>
</div>

@push('styles')
<style>
    /* Blog Card Styling */
    .blog-card {
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        background-color: #ffffff;
    }
    .blog-card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.2);
    }

    /* Search Bar Styling */
    .search-bar {
        position: relative;
        border-radius: 50px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .search-bar input {
        border: none;
        padding: 12px 20px;
        width: 100%;
        border-radius: 50px;
        outline: none;
        font-size: 1rem;
        box-shadow: none;
        transition: all 0.3s ease-in-out;
    }

    .search-btn {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        background-color: #149DDD;
        color: #ffffff;
        border: none;
        padding: 10px 15px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 6px rgba(20, 157, 221, 0.3);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .search-btn:hover {
        background-color: #117CAD;
        transform: scale(1.1);
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#liveSearch').on('input', function () {
            let query = $(this).val().trim();

            // Clear search results if input is empty
            if (!query) {
                window.location.reload();
                return;
            }

            $.ajax({
                url: "{{ route('blogs.search') }}",
                type: "GET",
                data: { query: query },
                success: function (response) {
                    let blogs = response.blogs;
                    let blogContainer = $('#blogContainer');
                    blogContainer.empty();

                    if (blogs.length === 0) {
                        blogContainer.html('<p class="text-center">No blogs found for your search.</p>');
                    } else {
                        $.each(blogs, function (index, blog) {
                            let tagsHtml = '';
                            if (blog.tags) {
                                let tagsArray = blog.tags.split(',');
                                tagsArray.forEach(tag => {
                                    tagsHtml += `<span class="badge bg-secondary">Tag: ${tag}</span>`;
                                });
                            }

                            blogContainer.append(`
                                <div class="col-lg-4 col-md-6 blog-item">
                                    <div class="card blog-card shadow border-0">
                                        <a href="/blogs/${blog.id}" class="card-link">
                                            <div class="card-img-container position-relative">
                                                <img src="/uploads/blogs/${blog.thumbnail}" class="card-img-top img-fluid" alt="${blog.title}">
                                            </div>
                                        </a>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">
                                                <a href="/blogs/${blog.id}" class="text-decoration-none title-hover-effect">
                                                    ${blog.title}
                                                </a>
                                            </h5>
                                            <p class="text-muted small">
                                                <span class="badge bg-primary">Category: ${blog.category_name}</span>
                                                ${tagsHtml}
                                            </p>
                                            <p class="text-muted small">
                                                Published on ${new Date(blog.created_at).toLocaleDateString()}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    }
                },
                error: function (error) {
                    console.error('Error fetching blogs:', error);
                }
            });
        });
    });
</script>

<!-- Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "Blogs - Muhammad Hamid",
  "url": "{{ url('/blogs') }}",
  "description": "Discover engaging blogs and tutorials by Muhammad Hamid. Explore articles on software engineering, Laravel development, and full-stack development.",
  "blogPosts": [
    @foreach($blogs as $blog)
    {
      "@type": "BlogPosting",
      "headline": "{{ $blog->title }}",
      "image": "{{ asset('uploads/blogs/' . $blog->thumbnail) }}",
      "author": {
        "@type": "Person",
        "name": "Muhammad Hamid"
      },
      "datePublished": "{{ $blog->created_at->format('Y-m-d') }}",
      "dateModified": "{{ $blog->updated_at->format('Y-m-d') ?? $blog->created_at->format('Y-m-d') }}",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ route('blogs.show', $blog->id) }}"
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endpush

@endsection
