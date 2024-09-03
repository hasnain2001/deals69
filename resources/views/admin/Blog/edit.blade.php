@extends('admin.master')
@section('title')
    Update
@endsection
@section('main-content')
 <style>
            #container {
                width: 1000px;
                margin: 20px auto;
            }
            .ck-editor__editable[role="textbox"] {
                /* Editing area */
                min-height: 200px;
            }
            .ck-content .image {
                /* Block images */
                max-width: 80%;
                margin: 20px auto;
            }
        </style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Blog</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid form-container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>{{ session('success') }}</b>
                </div>
            @endif
            <form name="UpdateCategory" id="UpdateCategory" method="POST" enctype="multipart/form-data" action="{{ route('admin.Blog.update', $blog->id) }}">
                @csrf
                <div class="form-group">
                    <label for="title">Blog Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $blog->title }}" required>
                </div>
                     <div class="form-group">
                    <label for="title">slug <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="title" value="{{ $blog->slug }}" required>
                </div>

                <div class="form-group">
                    <label for="category_image">Category Image</label>
                    <input type="file" class="form-control" name="category_image" id="category_image" onchange="previewImage()">
                    @if($blog->category_image)
                        <img src="{{ asset($blog->category_image) }}" class="image-preview" alt="Current Image" style="height: 300px;widht:300px;">
                    @endif
                </div>
                <div class="form-group">
                    <label for="content">Main content <span class="text-danger">*</span></label>
                    <textarea id="editor" name="content" required>{!! $blog->content !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="meta_title">Meta Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $blog->meta_title }}">
                </div>

                <div class="form-group">
                    <label for="meta_keyword">Meta Keyword <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{ $blog->meta_keyword }}">
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="5" style="resize: none;">{{ $blog->meta_description }}</textarea>
                </div>

                <button type="submit" class="btn btn-dark">Submit</button>
                <a href="{{ route('admin.blog') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </section>
</div>

        -->
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
<script src="{{ asset('front/js/ckeditor.js') }}"></script>

        <script>
            function previewImage() {
                var file = document.getElementById('category_image').files[0];
                var reader = new FileReader();
                reader.onloadend = function () {
                    var imagePreview = document.createElement('img');
                    imagePreview.src = reader.result;
                    imagePreview.className = 'image-preview';
                    var existingPreview = document.querySelector('.image-preview');
                    if (existingPreview) {
                        existingPreview.remove();
                    }
                    document.querySelector('#category_image').parentElement.appendChild(imagePreview);
                }
                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>

@endsection
