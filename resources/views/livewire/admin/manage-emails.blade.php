<div class="container mt-5">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0 font-weight-bold">Manage Email Addresses</h1>
            <i class="fas fa-envelope fa-lg"></i>
        </div>
        <div class="card-body">
            <!-- Success Message -->
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Email Input Form -->
            <form wire:submit.prevent="addEmail" class="mb-4">
                <div class="input-group">
                    <input type="email" wire:model="email" class="form-control" placeholder="Enter email address" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-plus"></i> Add Email
                        </button>
                    </div>
                </div>
            </form>

            <!-- Current Emails List -->
            <h2 class="h5 mb-3">Current Emails</h2>
            @if ($emails->isEmpty())
                <div class="alert alert-info">No email addresses available.</div>
            @else
                <ul class="list-group">
                    @foreach ($emails as $email)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">{{ $email->email }}</span>
                            <button class="btn btn-danger btn-sm" wire:click="deleteEmail({{ $email->id }})">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
