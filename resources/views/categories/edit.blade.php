@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Category</h1>

    <!-- Edit Category Form -->
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Category Image</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                @if($category->image)
                    <img src="{{ asset('uploads/categories/' . $category->image) }}" class="img-fluid mt-2 category-thumbnail">
                @endif
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
