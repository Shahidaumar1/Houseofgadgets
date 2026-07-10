@extends('admin.layouts.app')
@php $categories= \App\Models\category::get() @endphp
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
                <form action="{{route('company-update',$Company->id)}}" method="POST"  class="step-form-vertical"> @csrf
                    <label for="image">Device Type</label>
                    <div class="form-group">
                        <select class="form-select" style="width: 100%" aria-label="Default select example" name="category_id" required>
                          <option selected value="{{$Company->category->id}}">{{$Company->category->name}}</option>
                            @foreach($categories as $category )
                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Company Name</label>
                        <input type="text" name="name" class="form-control" id="title" placeholder="Company Name" value="{{$Company->name}}" required>
                    </div>

                    <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit"> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
