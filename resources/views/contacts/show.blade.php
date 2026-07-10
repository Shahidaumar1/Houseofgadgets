<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
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
                <h5 class="card-header">Contact Details</h5>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $contact->name }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                    <p><strong>Selected Option:</strong> {{ $contact->selected_option }}</p>
                    <p><strong>Other Option:</strong> {{ $contact->other_option }}</p>
                    <p><strong>Message:</strong> {{ $contact->message }}</p>
                    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
