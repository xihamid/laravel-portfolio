@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Blog</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="blogForm">
        @csrf
        @method('PUT')
        <!-- Title Field -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>

        <!-- Thumbnail Field -->
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*">
            @if($blog->thumbnail)
                <img src="{{ asset('uploads/blogs/' . $blog->thumbnail) }}" class="img-fluid mt-2" width="150" alt="Thumbnail">
            @endif
        </div>

        <!-- Category Field -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="" disabled>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Content Field (TinyMCE Editor) -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea id="editor" class="form-control" rows="10">{{ old('content', $blog->content) }}</textarea>
            <!-- Hidden Field for Validation -->
            <textarea name="content" id="content_hidden" class="d-none" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</div>

<!-- TinyMCE Editor Integration -->
<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: '#editor',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste help wordcount',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
        height: 400,
        branding: false,
        images_upload_url: "{{ route('blogs.uploadImage') }}", // Route for image upload
        automatic_uploads: true,
        file_picker_types: 'image',
        setup: function(editor) {
            // Sync TinyMCE content to hidden field on editor change
            editor.on('change', function() {
                tinymce.triggerSave(); // Save content to #editor
                document.getElementById('content_hidden').value = editor.getContent(); // Sync to hidden field
            });
        }
    });

    // Sync TinyMCE content to hidden field on form submit
    document.getElementById('blogForm').addEventListener('submit', function(event) {
        tinymce.triggerSave(); // Save content to #editor
        document.getElementById('content_hidden').value = tinymce.get('editor').getContent(); // Sync to hidden field
    });
</script>
@endsection
