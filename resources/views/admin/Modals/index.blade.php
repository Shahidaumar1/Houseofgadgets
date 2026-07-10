@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h1>Model</h1>
                <a href="{{ route('Modal-create') }}" class="btn btn-success">Create</a>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-11" style="padding: 40px;">
                <table class="table table-striped table-bordered" id="table_id">
                    <thead class="thead-light">
                        <tr class="table-secondary">
                            <th>Id</th>
                            <th >Companies</th>
                            <th>Model</th>
                            <th>Image</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($modals as $modal)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{$modal->company->name}}</td>
                                <td>{{ $modal->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/category' . '/' . $modal->image) }}"
                                        alt="{{ $modal->name }}" height="70">
                                </td>
                                <td class="d-flex justify-content-center" >
                                    <a href="{{ url('Modal/edit/' . $modal->id) }}"><i class="bi bi-pencil me-3"></i></a>
                                    <a href="{{ url('modal/delete/'. $modal->id) }}"style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i> </a>
                                </td>
                        @endforeach

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
