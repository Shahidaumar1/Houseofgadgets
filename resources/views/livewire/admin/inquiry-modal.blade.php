<div>
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inquiry Details</h5>
                        <button type="button" class="close" aria-label="Close" wire:click="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>First Name:</strong> {{ $inquiry->first_name }}</p>
                        <p><strong>Last Name:</strong> {{ $inquiry->last_name }}</p>
                        <p><strong>Email:</strong> {{ $inquiry->email }}</p>
                        <p><strong>Phone:</strong> {{ $inquiry->phone }}</p>
                        <p><strong>Product Name:</strong> {{ $inquiry->product_name }}</p>
                        <p><strong>Checkboxes:</strong> {{ implode(', ', json_decode($inquiry->checkboxes)) }}</p>
                        <p><strong>Other Text:</strong> {{ $inquiry->other_text }}</p>
                        <p><strong>Existing Customer:</strong> {{ $inquiry->existing_customer ? 'Yes' : 'No' }}</p>
                        <p><strong>Is Business:</strong> {{ $inquiry->is_business ? 'Yes' : 'No' }}</p>
                        <p><strong>Brand:</strong> {{ $inquiry->brand }}</p>
                        <p><strong>Model:</strong> {{ $inquiry->model }}</p>
                        <p><strong>Additional Description:</strong> {{ $inquiry->additional_description }}</p>
                        <p><strong>Created At:</strong> {{ $inquiry->created_at }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="close">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
