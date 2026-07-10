@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-2" style="display: flex;  justify-content: space-between; align-items: center;">
                <h2>View Blogs</h2>
                <a href="{{ route('blogC') }}" class="btn btn-outline-dark">Create new Blog</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <table class="table table-striped table-bordered" id="table_id">
                    <thead class="thead-light">
                        <tr class="table-secondary">
                            <th>Heading</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            @if (isset($blogPost))
                                <td> {{ $blogPost->heading }}</td>
                                <td>{{ $blogPost->description }}</td>
                                <td>
                                    <a class='me-3' href="{{ url("BlogPost/$blogPost->id") }}" role="button"><i
                                            class="bi bi-pencil"></i></a>
                                </td>
                            @endif

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead class="thead-light">
                        <tr class="table-secondary">
                            <th>ID</th>
                            <th>Heading</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->heading }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->description }}</td>
                                <td>
                                    <img src="{{ asset('storage/blog_image' . '/' . $blog->image) }}"
                                        alt="{{ $blog->image }}" height="70">
                                </td>
                                <td>
                                    <a class='me-3' href="{{ url('blog/edit') . '/' . $blog->id }}" role="button"><i
                                            class="bi bi-pencil"></i></a>
                                    <a href="{{ url('blog/destroy' . '/' . $blog->id) }}"><i class="bi bi-trash-fill"
                                            style="color:rgb(211, 64, 64)"></i></a>

                                </td>
                        @endforeach

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        });
    </script>
@endsection
