<div class="card mt-4">
    <div class="card-header">
        <h5 class="m-0">Google Reviews (Homepage Banner)</h5>
    </div>

    <div class="card-body">
        @if(session()->has('success'))
            <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif

        <div class="row g-3">
            {{-- Rating --}}
            <div class="col-md-3">
                <label class="form-label">Rating (0–5)</label>
                {{-- live update so stars change instantly --}}
                <input type="number" step="0.1" min="0" max="5"
                       wire:model="form.rating"
                       class="form-control" placeholder="e.g. 4.9">
                @error('form.rating') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Stars (auto) --}}
            <div class="col-md-3">
                <label class="form-label d-block">Stars (auto)</label>

                @php
                    $previewRating = max(0, min(5, (float) ($form['rating'] ?? 0)));
                    $rounded       = round($previewRating * 2) / 2;   // nearest 0.5
                    $full          = (int) floor($rounded);
                    $half          = (($rounded - $full) >= 0.5) ? 1 : 0;
                    $empty         = 5 - $full - $half;
                @endphp

                <div class="d-flex align-items-center gap-2 border rounded px-2 py-2" style="min-height:42px;">
                    <span>
                        @for($i=0;$i<$full;$i++)
                            <i class="fa-solid fa-star text-warning"></i>
                        @endfor
                        @if($half)
                            <i class="fa-solid fa-star-half-stroke text-warning"></i>
                        @endif
                        @for($i=0;$i<$empty;$i++)
                            <i class="fa-regular fa-star text-warning"></i>
                        @endfor
                    </span>
                    <strong>{{ number_format($rounded,1) }}/5</strong>
                </div>
                <small class="text-muted">Auto-rounded to nearest 0.5</small>
            </div>

            {{-- Reviews Count --}}
            <div class="col-md-3">
                <label class="form-label">Reviews Count</label>
                <input type="number" min="0"
                       wire:model.defer="form.reviews_count"
                       class="form-control" placeholder="e.g. 321">
                @error('form.reviews_count') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Google Review URL --}}
            <div class="col-md-3">
                <label class="form-label">Google Review URL</label>
                <input type="url"
                       wire:model.defer="form.review_url"
                       class="form-control" placeholder="https://g.page/r/... or https://maps.app.goo.gl/...">
                @error('form.review_url') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mt-3 d-flex align-items-center gap-2">
            <button wire:click="save" class="btn btn-primary">
                Save Google Reviews
            </button>
            <span wire:loading wire:target="save">Saving…</span>
        </div>
    </div>
</div>
