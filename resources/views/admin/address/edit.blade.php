@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h1>Edit</h1>
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
                
        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                <form action="{{ route('addressU', $address->id)  }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Company Name</label>
                        <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Company Name" @if(isset($address)) value="{{ $address->company_name }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" @if(isset($address)) value="{{ $address->address }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Company Name" @if(isset($address)) value="{{ $address->postal_code }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" class="form-control" id="type" placeholder="type" @if(isset($address)) value="{{ $address->type }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="days">Days</label>
                        <input type="text" name="days" class="form-control" id="days" placeholder="Days" @if(isset($address)) value="{{ $address->days }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="days">Hours</label>
                        <input type="text" name="hours" class="form-control" id="hours" placeholder="Hours" @if(isset($address)) value="{{ $address->hours }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="background">Background</label>
                        <input type="file" name="background" class="form-control" id="background" placeholder="image" accept="image/*" >
                    </div>
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit"> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
