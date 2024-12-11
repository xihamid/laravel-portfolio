@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 bg-light">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-11">
            <div class="card shadow-sm">
                <!-- Blog Thumbnail -->
                <div class="position-relative">
                    <img src="{{ asset('uploads/blogs/' . $blog->thumbnail ?? 'uploads/default-thumbnail.jpg') }}"
                         class="img-fluid w-100"
                         alt="{{ $blog->title }}"
                         style="height: 400px; object-fit: cover;">
                </div>


                <!-- Blog Meta -->
                <div class="text-center py-3 bg-white">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-muted mb-1"><i class="bi bi-person-circle"></i> <strong>Author:</strong> John Doe</p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-muted mb-1"><i class="bi bi-calendar3"></i> <strong>Published On:</strong>
                                {{ $blog->created_at->format('F d, Y h:i A') }}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-muted mb-0"><i class="bi bi-tags"></i> <strong>Category:</strong> Technology, Web Development</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Content -->
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">{{ $blog->title }}</h1>
                    <div class="card-text" style="font-size: 1.1rem; line-height: 1.8;">
                        {!! $blog->content !!}
                    </div>
                </div>

                <!-- Back Button -->
                <div class="text-center py-3 bg-light">
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary px-4 rounded-pill">Back to All Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
