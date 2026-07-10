@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-2">
                <h2>Create</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                <form action="{{ route('SectionOneHeadingS') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="heading">Heading</label>
                        <input type="text" name="heading" class="form-control" id="heading">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"> Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
