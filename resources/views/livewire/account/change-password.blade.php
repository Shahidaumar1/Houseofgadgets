<div class="container form-container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Change Password</h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <div class="form-group position-relative mb-3">
                        <label for="currentPassword">Current Password</label>
                        <input wire:model="currentPassword" type="password" class="form-control" id="currentPassword" name="currentPassword">
                        <span toggle="#currentPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @error('currentPassword') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group position-relative mb-3">
                        <label for="newPassword">New Password</label>
                        <input wire:model="newPassword" type="password" class="form-control" id="newPassword" name="newPassword">
                        <span toggle="#newPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group position-relative mb-3">
                        <label for="confirmPassword">Confirm Password</label>
                        <input wire:model="confirmPassword" type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                        <span toggle="#confirmPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @error('confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-container {
        min-height: 100vh;
    }

    .card {
        border-radius: 10px;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .form-group {
        position: relative;
    }

    .field-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .form-control {
        padding-right: 2.5rem;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    @media (max-width: 767px) {
        .container {
            padding: 1rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePasswordElements = document.querySelectorAll('.toggle-password');
        togglePasswordElements.forEach(function (togglePasswordElement) {
            togglePasswordElement.addEventListener('click', function () {
                const input = document.querySelector(this.getAttribute('toggle'));
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>
