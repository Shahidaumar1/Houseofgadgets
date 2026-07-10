@extends('admin.layouts.app')
<style>
    .dataTable {
        width: 100% !important;
    }
</style>
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h1>Device Type</h1>
                <a href="{{ route('Create-Device') }}" class="btn btn-success">Create</a>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12" style="padding: 40px;">
                <table class="table table-striped table-bordered" id="table_id">
                    <thead class="thead-light">
                        <tr class="table-secondary">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/master-category' . '/' . $category->image) }}"
                                        alt="{{ $category->title }}" height="50">
                                </td>
                                <td class="d-flex justify-content-center" >
                                    <a href="{{ url('Device/edit/' . $category->id) }}"><i class="bi bi-pencil me-3"></i></a>
                                    <a href="{{ url('Device/delete/'. $category->id) }}"style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i> </a>
                                </td>
                        @endforeach

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
