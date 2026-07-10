<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container mt-5 p-4 border rounded shadow-sm" style="max-width: 500px; background-color: white;">
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($token)
            <form wire:submit.prevent="resetPassword" class="mt-4">
                <input type="hidden" wire:model="token">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" wire:model="email" required autofocus class="form-control">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" wire:model="password" required class="form-control">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" wire:model="password_confirmation" required class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        @else
            <form wire:submit.prevent="sendResetLinkEmail" class="mt-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" wire:model="email" required autofocus class="form-control">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                </div>
            </form>
        @endif
    </div>
</div>
