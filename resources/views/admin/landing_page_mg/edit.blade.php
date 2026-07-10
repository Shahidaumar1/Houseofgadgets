@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-2">
                <h2>Edit</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                @if (isset($section_one))
                    <form action="{{ route('landing.s1U', $section_one->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" name="icon" class="form-control" id="icon" accept="image/*"
                                @if ($section_one->icon) value="{{ $section_one->icon }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="address_2">Sub Heading</label>
                            <input type="text" name="sub_heading" class="form-control" id="sub_heading"
                                @if ($section_one->sub_heading) value="{{ $section_one->sub_heading }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                @if ($section_one->description) value="{{ $section_one->description }}" @endif>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit"> Update</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
