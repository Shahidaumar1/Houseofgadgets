@extends('admin.layouts.app')
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-12 p-2 d-flex justify-content-between align-items-center">
                <h2>Address</h2>
                <a href="{{ route('addressC') }}" class="btn btn-outline-dark">Create</a>
            </div>
        </div>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                            <tr class="table-secondary">
                                <th>Id</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Postal Code</th>
                                <th>Type</th>
                                <th>Days</th>
                                <th>Hours</th>
                                <th>Background</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addresses as $address)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $address->company_name }}</td>
                                    <td>{{ $address->address }}</td>
                                    <td>{{ $address->postal_code }}</td>
                                    <td>{{ $address->type }}</td>
                                    <td>{{ $address->days }}</td>
                                    <td>{{ $address->hours }}</td>
                                    <td>
                                        <img src="{{ asset('storage/address/background' . '/' . $address->background) }}"
                                            alt="{{ $address->title }}" height="50">
                                    </td>
                                    <td class="d-flex justify-content-end" style="padding-bottom: 23px;">
                                        <a href="{{ url('address/edit' . '/' . $address->id) }}"
                                            class="btn btn-secondary">Edit</a>
                                        <form action="{{ url('address/delete' . '/' . $address->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger ml-4">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
