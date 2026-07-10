<div class="d-flex">
    <livewire:admin.components.side-nave active="staff" />
    <x-content>
        <div>

            {{-- Success / Error Messages --}}
            @if($successMessage)
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <i class="fa fa-check-circle me-2"></i>{{ $successMessage }}
                    <button type="button" class="btn-close" wire:click="$set('successMessage', '')"></button>
                </div>
            @endif
            @if($errorMessage)
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ $errorMessage }}
                    <button type="button" class="btn-close" wire:click="$set('errorMessage', '')"></button>
                </div>
            @endif

            <div class="container my-5">

                {{-- Page Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold mb-1" style="color: #20375D;">Staff Management</h4>
                        <p class="text-muted mb-0 small">Manage your admin staff members</p>
                    </div>
                    <button
                        wire:click="toggleForm"
                        class="btn px-4 py-2 fw-semibold"
                        style="background-color: #20375D; color: white; border-radius: 10px;">
                        <i class="fa {{ $showForm ? 'fa-times' : 'fa-plus' }} me-2"></i>
                        {{ $showForm ? 'Cancel' : 'Add New Staff' }}
                    </button>
                </div>

                {{-- Add / Edit Form --}}
                @if($showForm)
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; background-color: #f8f9ff;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-4" style="color: #20375D;">
                            <i class="fa fa-user-plus me-2"></i>
                            {{ $editingId ? 'Edit Staff Member' : 'Add New Staff Member' }}
                        </h6>

                        <div class="row g-3">
                            {{-- Profile Photo --}}
                            <div class="col-12">
                                <label class="form-label fw-semibold" style="color: #20375D;">
                                    Profile Photo <small class="text-muted fw-normal">(optional)</small>
                                </label>
                                <div class="d-flex align-items-center gap-3">
                                    @if($photo)
                                        <img src="{{ $photo->temporaryUrl() }}"
                                             class="rounded-circle"
                                             style="width:70px; height:70px; object-fit:cover; border: 3px solid #C0C0EF;">
                                    @elseif($editingId)
                                        @php $editUser = collect($staffList)->firstWhere('id', $editingId); @endphp
                                        @if(!empty($editUser['profile_photo_path']))
                                            <img src="{{ asset('storage/' . $editUser['profile_photo_path']) }}"
                                                 class="rounded-circle"
                                                 style="width:70px; height:70px; object-fit:cover; border: 3px solid #C0C0EF;">
                                        @else
                                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                                 style="width:70px; height:70px; background-color:#C0C0EF; color:#20375D; font-size:22px;">
                                                {{ strtoupper(substr($editUser['name'] ?? 'S', 0, 1)) }}
                                            </div>
                                        @endif
                                    @else
                                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                                             style="width:70px; height:70px; background-color:#e9ecef; color:#aaa; font-size:22px;">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    @endif

                                    <div>
                                        <input type="file"
                                               wire:model="photo"
                                               accept="image/*"
                                               class="form-control @error('photo') is-invalid @enderror"
                                               style="border-radius: 10px; border: 1px solid #C0C0EF; max-width: 300px;">
                                        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        <small class="text-muted">Max 2MB. JPG, PNG allowed.</small>
                                    </div>
                                </div>
                            </div>

                            {{-- Name --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #20375D;">Full Name</label>
                                <input type="text" wire:model.defer="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter full name"
                                    style="border-radius: 10px; border: 1px solid #C0C0EF;">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #20375D;">Email Address</label>
                                <input type="email" wire:model.defer="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter email address"
                                    style="border-radius: 10px; border: 1px solid #C0C0EF;">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Password --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #20375D;">
                                    Password
                                    @if($editingId) <small class="text-muted fw-normal">(blank = keep current)</small> @endif
                                </label>
                                <input type="password" wire:model.defer="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{ $editingId ? 'Leave blank to keep current' : 'Min 8 characters' }}"
                                    style="border-radius: 10px; border: 1px solid #C0C0EF;">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #20375D;">Confirm Password</label>
                                <input type="password" wire:model.defer="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm password"
                                    style="border-radius: 10px; border: 1px solid #C0C0EF;">
                            </div>

                            {{-- Buttons --}}
                            <div class="col-12">
                                <button wire:click="saveStaff" wire:loading.attr="disabled"
                                    class="btn px-4 py-2 fw-semibold"
                                    style="background-color: #29C01E; color: white; border-radius: 10px;">
                                    <span wire:loading wire:target="saveStaff">
                                        <span class="spinner-border spinner-border-sm me-2"></span>Saving...
                                    </span>
                                    <span wire:loading.remove wire:target="saveStaff">
                                        <i class="fa fa-save me-2"></i>{{ $editingId ? 'Update Staff' : 'Add Staff' }}
                                    </span>
                                </button>
                                <button wire:click="toggleForm"
                                    class="btn px-4 py-2 fw-semibold ms-2"
                                    style="background-color: #e9ecef; color: #20375D; border-radius: 10px;">
                                    <i class="fa fa-times me-2"></i>Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Staff List Table --}}
                <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                    <div class="card-body p-0">
                        @if(count($staffList) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3" style="background-color: #C0C0EF;">#</th>
                                            <th class="py-3" style="background-color: #C0C0EF;">Photo</th>
                                            <th class="py-3" style="background-color: #C0C0EF;">Name</th>
                                            <th class="py-3" style="background-color: #C0C0EF;">Email</th>
                                            <th class="py-3" style="background-color: #C0C0EF;">Created</th>
                                            <th class="py-3 text-center" style="background-color: #C0C0EF;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staffList as $index => $staff)
                                        <tr>
                                            <td class="px-4 py-3 text-muted">{{ $index + 1 }}</td>
                                            <td class="py-3">
                                                @if(!empty($staff['profile_photo_path']))
                                                    <img src="{{ asset('storage/' . $staff['profile_photo_path']) }}"
                                                         class="rounded-circle"
                                                         style="width:42px; height:42px; object-fit:cover; border: 2px solid #C0C0EF;">
                                                @else
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                                         style="width:42px; height:42px; background-color:#C0C0EF; color:#20375D; font-size:16px;">
                                                        {{ strtoupper(substr($staff['name'], 0, 1)) }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="py-3 fw-semibold" style="color: #20375D;">{{ $staff['name'] }}</td>
                                            <td class="py-3 text-muted">{{ $staff['email'] }}</td>
                                            <td class="py-3 text-muted">
                                                {{ \Carbon\Carbon::parse($staff['created_at'])->format('d M Y') }}
                                            </td>
                                            <td class="py-3 text-center">
                                                <button wire:click="editStaff({{ $staff['id'] }})"
                                                    class="btn btn-sm px-3 me-1"
                                                    style="background-color: #C0C0EF; color: #20375D; border-radius: 8px;">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                                <button wire:click="deleteStaff({{ $staff['id'] }})"
                                                    onclick="return confirm('Delete this staff member?')"
                                                    class="btn btn-sm px-3"
                                                    style="background-color: #fee2e2; color: #dc2626; border-radius: 8px;">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fa fa-users fa-3x mb-3" style="color: #C0C0EF;"></i>
                                <p class="text-muted">No staff members added yet.</p>
                                <button wire:click="toggleForm"
                                    class="btn px-4 py-2 fw-semibold"
                                    style="background-color: #20375D; color: white; border-radius: 10px;">
                                    <i class="fa fa-plus me-2"></i>Add First Staff Member
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </x-content>
</div>