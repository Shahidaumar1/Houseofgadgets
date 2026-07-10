@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h1>Create</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                <form action="{{ route('store-Device') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" class="form-control" id="title" placeholder="Device Type" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="image" accept="image/*" required>
                    </div>
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit"> Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
