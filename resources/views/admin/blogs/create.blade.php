@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h2>Welcome to Create Blog</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('blogS') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">heading</label>
                        <input type="text" name="heading" class="form-control" id="heading" placeholder="heading"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="title">description</label>
                        <textarea name="description" class="form-control tinymce-editor hidden" id="mytextarea" placeholder="description"
                            style="height: 10rem;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="image"
                            accept="image/*" required>
                        To best quality upload image 400x267
                    </div>


                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"> Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
