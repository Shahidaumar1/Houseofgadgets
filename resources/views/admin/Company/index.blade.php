@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h1>Companies</h1>
                <a href="{{ route('companies-create') }}" class="btn btn-success">Create</a>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-11" style="padding: 40px;">
                <table class="table table-striped table-bordered" id="table_id">
                    <thead class="thead-light">
                        <tr class="table-secondary">
                            <th>Id</th>
                            <th>Device-Type</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($Companies as $company)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $company->category->name }}</td>
                                <td>{{ $company->name }}</td>
                                <td class="d-flex justify-content-center" >
                                    <a href="{{ url('company/edit/' . $company->id) }}"><i class="bi bi-pencil me-3"></i></a>
                                    <a href="{{ url('company/delete/'. $company->id) }}"style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i> </a>
                                </td>
                        @endforeach

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
