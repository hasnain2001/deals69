@extends('admin.master')
@section('title')
 Create|Blog
@endsection
@section('main-content')

    <div class="content-wrapper">
    <div class="container justify-content">
        <!-- Blog Form -->
        <form method="POST" action="{{ route('admin.blog.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
           @if (session()->has('success'))
    <div class="alert alert-primary d-flex align-items-center" role="alert">

        <div>
            blog created successfully
        </div>
    </div>
@endif


                        <!-- Display validation errors here -->
                        @if ($errors->any())
                        <div  class="alert alert-danger" >
                            <strong>Validation error(s):</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required />
                        </div>

                          <div class="form-group">
                            <label for="title">slug</label>
                            <input type="text" class="form-control" name="slug" id="title" required />
                        </div>
                        <div class="form-group">
                            <label for="category_image">Category Image</label>
                            <input type="file" class="form-control" name="category_image" id="category_image" onchange="previewImage()">

                        </div>
                        <div class="form-group">
                            <label for="category_image">Main Content</label>


                             <div id="container">
                                 <textarea id="editor" name="content" required>
                                </textarea>

        </div>
                        </div>

                    </div>

                </div>
                     <div class="form-group">
                                    <label for="name">Meta Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title" >
                                </div>
                                <div class="form-group">
                                    <label for="meta_tag">Meta Tag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_tag" id="meta_tag">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="5" style="resize: none;"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </div>
            </div>    </div>    </div>
        </form>
    </div>
</div>

        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io/">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content -->
        </aside>
    </div>
    <!-- ./wrapper -->
<script>
     function previewImage() {
    var file = document.getElementById('category_image').files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        var imagePreview = document.createElement('img');
        imagePreview.src = reader.result;
        imagePreview.className = 'image-preview';
        imagePreview.style.width = '500px';
        imagePreview.style.height = '300px';
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
