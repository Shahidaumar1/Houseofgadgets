@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit</h2>
            </div>
            <hr>
        </div>
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
            <div class="col-md-6 offset-lg-4">
                <form action="{{ route('settingsU', $setting->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="meta-title">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" required id="meta-title"
                            value="{{ $setting->meta_title ?? '' }}">
                        @error('meta_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fb_link">Facebook Link</label>
                        <input type="url" name="fb_link" class="form-control" id="fb_link"
                            value="{{ $setting->fb_link ?? '' }}" required>
                        @error('fb_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="insta_link">Instagram Link</label>
                        <input type="url" name="insta_link" class="form-control" required id="insta_link"
                            value="{{ $setting->insta_link ?? '' }}">
                        @error('insta_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="url" name="twitter_link" class="form-control" required id="twitter_link"
                            value="{{ $setting->twitter_link ?? '' }}">
                        @error('twitter_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tiktok_link">Tiktok Link</label>
                        <input type="url" name="tiktok_link" class="form-control" required id="tiktok_link"
                            value="{{ $setting->tiktok_link ?? '' }}">
                        @error('tiktok_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo">
                        @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- @if ($setting->logo)
    <img src="{{ asset('storage/' . $setting->logo) }}" alt="logo" width="100px" height="100px">
    @endif -->
                    </div>
                    <div class="form-group">
                        <label for="favicon">Favicon</label>
                        <input type="file" name="favicon" class="form-control" id="favicon">
                        @error('favicon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- @if ($setting->favicon)
    <img src="{{ asset('storage/' . $setting->favicon) }}" alt="favicon" width="100px" height="100px">
    @endif -->
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit"> Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
