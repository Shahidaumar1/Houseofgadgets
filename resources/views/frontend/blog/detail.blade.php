@extends('frontend.layouts.app')
@section('title', 'Blogs')
@section('content')
    <div class="bg-pink-linear">
        <section class="repair-types ">
            <livewire:components.mega-nav theme="white" />
        </section>
        <div class="container">
            <div class="row rounded my-5 d-flex align-items-center p-5" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">

                <div class="col">
                    <h2 style="text-transform:capitalize;color:red;">{{ $blog->heading }}</h2>
                    <div class="d-flex justify-content-center my-4">
                        <img src="{{ asset('storage/blog_image') . '/' . $blog->image }}" alt="" height="400px"
                            width="800px" />
                    </div>
                    <h3 style="text-transform:capitalize;">{{ $blog->title }}</h3>
                    <p style="line-height:28px;">{!! $blog->description !!}</p>
                    <span>
                        <h4 style="text-align: end">{{ $blog->created_at }}</h4>
                    </span>

                </div>

            </div>
        </div>
    </div>
@endsection
