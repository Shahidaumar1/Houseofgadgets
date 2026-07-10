@extends('admin.layouts.app')
@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        @media only screen and (max-width: 768px) {

            th,
            td {
                padding: 5px;
                font-size: 12px;
            }
        }
    </style>
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Site Settings</h2>
                <a href="{{ route('settingsC') }}" class="btn btn-outline-dark">Create</a>
            </div>
            <hr>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ $errors->first() }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr class="table-secondary">
                                    <th>Id</th>
                                    <th>Meta Title</th>
                                    <th>Logo</th>
                                    <th>Favicon</th>
                                    <th>Fb Link</th>
                                    <th>Instagram Link</th>
                                    <th>Twitter Link</th>
                                    <th>Tiktok Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $setting->meta_title }}</td>
                                        <td>
                                            <img src="{{ asset('storage/logo' . '/' . $setting->logo) }}"
                                                alt="{{ $setting->meta_title }}" height="50">
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/favicon' . '/' . $setting->favicon) }}"
                                                alt="{{ $setting->meta_title }}" height="50">
                                        </td>
                                        <td><a href="{{ $setting->fb_link }}" target="_blank">{{ $setting->fb_link }}</a>
                                        </td>
                                        <td><a href="{{ $setting->insta_link }}"
                                                target="_blank">{{ $setting->insta_link }}</a></td>
                                        <td><a href="{{ $setting->twitter_link }}"
                                                target="_blank">{{ $setting->twitter_link }}</a></td>
                                        <td><a href="{{ $setting->tiktok_link }}"
                                                target="_blank">{{ $setting->tiktok_link }}</a></td>
                                        <td class="d-flex">
                                            <a href="{{ url('settings/edit' . '/' . $setting->id) }}"
                                                class="btn btn-outline-dark">Edit</a>
                                            <form action="{{ url('settings/delete' . '/' . $setting->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
