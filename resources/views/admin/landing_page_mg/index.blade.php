@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-2" style="display: flex;  justify-content: space-between; align-items: center;">
                <h2>Landing Page Management</h2> <br>
                @if ($enteries < 8)
                    <a href="{{ route('landing.s1C') }}" class="btn btn-outline-dark">Create</a>
                @endif
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <div class="mb-3">
                    <h3>Heading</h3>
                    @if (empty($heading))
                        <a href="{{ route('SectionOneHeadingC') }}" class="btn btn-success">Create Heading</a>
                    @endif
                </div>

                @if (!empty($heading))
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                            <tr class="table-secondary">
                                <th>Heading</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @if (isset($heading->heading))
                                        {{ $heading->heading }}
                                    @endif
                                </td>
                                <td class="d-flex justify-content-end">

                                    <a href="{{ route('SectionOneHeadingE', $heading->id) }}"
                                        class="btn btn-secondary">Edit</a>
                                    {{-- <form action="{{ url('landing-s1/delete' . '/' . $heading->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger ml-4">Delete</button>
                                </form> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif
                <table class="table table-striped table-bordered" id="table_id">
                    <thead class="thead-light">
                        <tr class="table-secondary">
                            <th>Id</th>
                            <th>Icon</th>
                            <th>Sub Heading</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($section_one as $section)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/icon' . '/' . $section->icon) }}" alt="{{ $section->icon }}"
                                        height="50">
                                </td>
                                <td>{{ $section->sub_heading }}</td>
                                <td>{{ $section->description }}</td>

                                <td class="d-flex justify-content-end" style="padding-bottom: 23px; ">

                                    <a href="{{ url('landing-s1/edit' . '/' . $section->id) }}"
                                        class="btn btn-secondary">Edit</a> &nbsp;
                                    <form action="{{ url('landing-s1/delete' . '/' . $section->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger ">Delete</button>
                                    </form>
                                </td>
                        @endforeach

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
