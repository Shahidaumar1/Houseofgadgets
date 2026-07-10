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
                <form action="{{ route('landing.s1S') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="file" name="icon" class="form-control" id="icon"  accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="address_2">Sub Heading</label>
                        <input type="text" name="sub_heading" class="form-control" id="sub_heading"  required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description"  required>
                    </div>

                    <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit"> Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
