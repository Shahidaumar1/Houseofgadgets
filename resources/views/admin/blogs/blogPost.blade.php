@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h4>Update Blog Heading</h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto mb-2">
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action={{ url('postblogs/update/' . $belogpost->id) }} method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">heading</label>
                        <input type="text" name="heading" class="form-control" id="title"
                            value="{{ $belogpost->heading }}" placeholder="heading" required>
                    </div>

                    <div class="form-group">
                        <label for="title">description</label>
                        <textarea name="description" class="form-control"
                            id="title"value="{{ $belogpost->description }}" placeholder="description" style="height:10rem" required></textarea>
                    </div>



                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
