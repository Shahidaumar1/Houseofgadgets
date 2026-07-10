@extends('frontend.layouts.app')
@section('title', 'Blogs')
@section('content')
    <div class="bg-pink-linear">
        <section class="repair-types ">
            <livewire:components.mega-nav theme="white" />
            <div class="text-center my-4">
                <h2 class="text-danger">Our Blog Posts</h2>
            </div>
        </section>

        <div class="container">
            @if (!empty($blogPost))
                <div class="col-lg-12 col-lg-offset-3 text-center mt-5 p-5">
                    <h2 style="margin-bottom: 40px;"><span class="ion-minus"></span>{{ $blogPost->heading }}<span
                            class="ion-minus"></span></h2>
                    <p>{!! $blogPost->description !!}</p>
                </div>
            @endif
            @foreach ($blogs as $blog)
                <div class="row">
                    @if ($blog->id % 2 == 0)
                        <div class="col-md-12 mb-4 ">
                            <div class="row g-0 border  overflow-hidden flex-md-row mb-1   h-md-250 position-relative">
                                <div class="col-auto">
                                    <img src="{{ asset('storage/blog_image' . '/' . $blog->image) }}" alt=""
                                        style="    height: 230px;
                                width: 230px;">
                                </div>
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h3 class="mb-0">{{ $blog->title }}</h3>
                                    <strong class="d-inline-block  text-success">{{ $blog->heading }}</strong>
                                    <div class="mb-1 text-muted">{{ $blog->created_at }}</div>
                                    <p class="card-text mb-auto">{!! Str::limit($blog->description, 230) !!}</p>
                                    <a href="{{ route('blogsDetail', $blog->id) }}" class="stretched-link">Continue
                                        reading</a>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="col-md-12 mb-4 mt-4">
                            <div class="row g-0" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                <div class="col-lg-8 p-4">
                                    <h3 class="mb-0">{{ $blog->title }}</h3>
                                    <strong class="d-inline-block  text-success">{{ $blog->heading }}</strong>
                                    <div class="mb-1 text-muted">{{ $blog->created_at }}</div>
                                    <p class="card-text mb-auto">{!! Str::limit($blog->description, 230) !!}</p>
                                    <a href="{{ route('blogsDetail', $blog->id) }}" class="stretched-link">Continue
                                        Reading</a>
                                </div>
                                <div class="col-lg-4">
                                    <img src="{{ asset('storage/blog_image' . '/' . $blog->image) }}" {{-- style="height: 230px; width: 230px;" --}}
                                        class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
