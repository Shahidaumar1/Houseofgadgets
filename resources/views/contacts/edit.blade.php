<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>





<body>


    @extends('layouts.admin')
    @php
        $slot = '';
    @endphp
    <div class="d-flex justify-content-center">
        <livewire:admin.components.side-nave active="buy" />


        <div class="container mt-5">

            <div class="card">
                <h5 class="card-header">Edit Contact</h5>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $contact->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $contact->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $contact->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="selected_option">Selected Option</label>
                            <input type="text" class="form-control" id="selected_option" name="selected_option"
                                value="{{ $contact->selected_option }}">
                        </div>
                        <div class="form-group">
                            <label for="other_option">Other Option</label>
                            <input type="text" class="form-control" id="other_option" name="other_option"
                                value="{{ $contact->other_option }}">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message">{{ $contact->message }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
