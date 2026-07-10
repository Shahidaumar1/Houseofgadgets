@extends('admin.layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                @if (!empty($masterCats))
                    <form action="{{ url('update') . '/' . $masterCats->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                                @if (isset($masterCats->title)) value="{{ $masterCats->title }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image" placeholder="image"
                                accept="image/*" value="">
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('storage/master-category' . '/' . $masterCats->image) }}" alt=""
                                height="150px" width="180px">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
