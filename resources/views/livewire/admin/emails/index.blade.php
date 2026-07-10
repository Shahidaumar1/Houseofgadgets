<div>
    <div class="d-flex" style="min-height:100vh; background:#f4f6f9;">
        <livewire:admin.components.side-nave active="newsletter" />

        <div style="flex:1; padding:30px; overflow-y:auto;">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 style="color:#20375D; font-weight:700; margin:0;">Newsletter Subscribers</h3>
                <span style="background:#20375D; font-size:14px; padding:8px 16px; border-radius:20px; color:white; font-weight:600;">
                    Total: {{ $emails->count() }}
                </span>
            </div>

            {{-- Filters --}}
            <div class="row g-2 mb-4">
                <div class="col-md-4">
                    <input type="text"
                        wire:model.live.debounce.400ms="search"
                        class="form-control"
                        placeholder="Search by email...">
                </div>
                <div class="col-md-3">
                    <label class="form-label mb-1" style="font-size:12px; color:#666;">From Date</label>
                    <input type="date" wire:model.live="start_date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label mb-1" style="font-size:12px; color:#666;">To Date</label>
                    <input type="date" wire:model.live="end_date" class="form-control">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button wire:click="$set('search', '')" class="btn w-100 btn-outline-secondary">
                        Reset
                    </button>
                </div>
            </div>

            {{-- Success Message --}}
            @if($broadcastSuccess)
                <div class="alert alert-success alert-dismissible fade show">
                    {{ $broadcastSuccess }}
                    <button type="button" class="btn-close" wire:click="$set('broadcastSuccess', '')"></button>
                </div>
            @endif

            {{-- Subscribers Table --}}
            <div class="table-responsive mb-5">
                <table class="table table-hover table-striped">
                    <thead style="background:#C0C0EF;">
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Subscribed On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emails as $index => $subscriber)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($subscriber->created_at)->format('d M Y, h:i A') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">
                                <i class="fa fa-inbox fa-3x text-muted mb-2"></i>
                                <p class="text-muted">No subscribers found.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Broadcast Email --}}
            <div class="card shadow-sm border-0">
                <div class="card-header text-white" style="background:#20375D;">
                    <h5 class="mb-0">
                        <i class="fa fa-paper-plane me-2"></i> Send Broadcast Email to All Subscribers
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subject</label>
                        <input type="text" wire:model="subject" class="form-control" placeholder="Email subject">
                        @error('subject') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Message</label>
                        <textarea wire:model="message" class="form-control" rows="5" placeholder="Write your message here..."></textarea>
                        @error('message') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <button wire:click="sendBroadcast" class="btn text-white" style="background:#20375D;">
                        <span wire:loading.remove wire:target="sendBroadcast">
                            <i class="fa fa-paper-plane me-1"></i> Send to All ({{ $emails->count() }} subscribers)
                        </span>
                        <span wire:loading wire:target="sendBroadcast">Sending...</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>