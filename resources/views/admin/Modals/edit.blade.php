@extends('admin.layouts.app')
@php $Companies = \App\Models\company::get();@endphp
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
                <form action="{{route('Modal-update',$modals->id)}}" method="POST"  class="step-form-vertical">                    @csrf

                    <label for="image">Companies</label>
                    <div class="form-group">
                        <select class="form-select" style="width: 100%" aria-label="Default select example" name="company_id" required>
                          <option selected @if(isset($modals)) value="{{ $modals->company->id }}" @endif >{{ $modals->company->name }}</option>
                            @foreach($Companies as $Company )
                            <option value="{{ $Company->id }}" >{{ $Company->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" class="form-control" id="title" placeholder="Model" @if(isset($modals)) value="{{ $modals->name }}" @endif >
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="image" accept="image/*" >
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('/storage/category/' . '/' . $modals->image) }}" alt=""
                            height="150px" width="180px">
                    </div>
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit"> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
