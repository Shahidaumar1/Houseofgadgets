@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h2>Create</h2>
            </div>
        </div>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $errors->first() }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                <form action="{{ route('settingsS') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="meta-title">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" id="meta-title"
                            placeholder="Meta Title" required>
                    </div>
                    <div class="form-group">
                        <label for="fb_link">Facebook Link</label>
                        <input type="url" name="fb_link" class="form-control" id="fb_link" placeholder="Facebook Link"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="fb_link">Instagram Link</label>
                        <input type="url" name="insta_link" class="form-control" id="insta_link"
                            placeholder="Instagram Link" required>
                    </div>
                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="url" name="twitter_link" class="form-control" id="twitter_link"
                            placeholder="Twitter Link" required>
                    </div>
                    <div class="form-group">
                        <label for="tiktok_link">Tiktok Link</label>
                        <input type="url" name="tiktok_link" class="form-control" id="tiktok_link"
                            placeholder="Tiktok Link" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="favicon">Favicon</label>
                        <input type="file" name="favicon" class="form-control" id="favicon" accept="image/*" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"> Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
