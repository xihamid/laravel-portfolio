@extends('layouts.app')

@section('content')

<style>
    /* Styles for the page header */
    /* h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #040b14;
        text-transform: uppercase;
        letter-spacing: 2px;
        animation: fadeIn 1.5s ease-in-out;
    } */

    /* Category Thumbnail */
    .category-thumbnail {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .category-thumbnail:hover {
        transform: scale(1.2);
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }

    /* Table Styling */
    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    }

    .table th {
        background: #040b14;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .table td {
        vertical-align: middle;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #149DDD;
        border-color: #149DDD;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #117CAD;
        transform: translateY(-2px);
    }


    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }



    }
</style>

<div class="container mt-5">
    <div style="text-align: center; position: relative; padding-bottom: 10px;">
        <h1 style="font-size: 2.5rem; font-weight: bold; text-transform: uppercase; color: #040b14; display: inline-block; position: relative;">
            <span>Manage Categories</span>
            <div style="content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 60%; height: 4px; background: #149DDD; border-radius: 2px; transition: width 0.3s ease-in-out;"></div>
        </h1>
    </div>


    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success" style="animation: fadeIn 0.8s ease;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Category Form -->
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Category Name" required>
            </div>
            <div class="col-md-4">
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Add Category</button>
            </div>
        </div>
    </form>

    <!-- Categories Table -->
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        {{-- <th>Created At</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                         class="img-fluid category-thumbnail"
                                         alt="{{ $category->name }}">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            {{-- <td>{{ $category->created_at->format('F d, Y') }}</td> --}}
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No categories available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
