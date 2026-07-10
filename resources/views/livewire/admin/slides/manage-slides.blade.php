<div class="admin-slider clean">
  <style>
    /* ====== Cards & headings ====== */
    .admin-slider.clean .card{
      border:1px solid #e9ecef;border-radius:14px;box-shadow:0 6px 18px rgba(0,0,0,.05);
    }
    .admin-slider.clean .card-header{
      background:#f8f9fa;border-bottom:1px solid #e9ecef;
      font-weight:800;           /* bolder per request */
      font-size:18px;            /* bigger heading */
      letter-spacing:.2px;
    }

    /* ====== Form grid (aligned with table columns) ====== */
    .admin-slider.clean .grid-row{display:grid;grid-template-columns:240px 160px 1fr;gap:12px;}
    .admin-slider.clean .grid-row + .grid-row{margin-top:12px;}
    .admin-slider.clean .form-label{font-size:12px;font-weight:700;color:#6b7280;margin-bottom:4px}
    .admin-slider.clean .preview img{width:420px;max-width:100%;height:auto;border-radius:10px;border:1px solid #eee}
    .admin-slider.clean .btn-bar{display:flex;gap:10px;align-items:center;margin-top:10px}

    .slider-size-note{
      margin:8px 0 12px;padding:10px 14px;border-radius:10px;
      background:#f4f7ff;border:1px solid #dbe5ff;color:#1b2a4e;
      font:600 13px/1.35 "Inter", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    }

    /* ====== Table ====== */
    .admin-slider.clean .table-wrap{max-height:420px;overflow:auto;border:1px solid #e9ecef;border-radius:12px}
    .admin-slider.clean table{margin:0}
    .admin-slider.clean thead th{
      position:sticky;top:0;background:#fff;z-index:2;
      border-bottom:1px solid #e9ecef;
      font-weight:700;font-size:13px;white-space:nowrap;
    }
    .admin-slider.clean tbody td{vertical-align:middle;font-size:14px}
    .admin-slider.clean tbody tr:nth-child(odd){background:#fafafa}
    .admin-slider.clean .thumb{width:120px;height:60px;object-fit:cover;border-radius:8px;border:1px solid #eee}
    .admin-slider.clean .badge{font-weight:700}
    .admin-slider.clean .link-cell{max-width:220px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}

    /* Active pill */
    .toggle-on{ background:#e8f7ef; color:#147a37; border:1px solid #c5eed6; padding:6px 10px; border-radius:999px; font-weight:800; font-size:12px; }
    .toggle-off{ background:#fff3f3; color:#b42318; border:1px solid #ffd8d8; padding:6px 10px; border-radius:999px; font-weight:800; font-size:12px; }

    /* Action buttons */
    .admin-slider.clean .btn-sm{ padding:6px 10px; font-size:12px; border-radius:8px; }

    /* Responsive */
    @media (max-width: 992px){
      .admin-slider.clean .grid-row{grid-template-columns:1fr 160px 1fr}
    }
    @media (max-width: 576px){
      .admin-slider.clean .grid-row{grid-template-columns:1fr;gap:10px}
      .admin-slider.clean .card-header{font-size:16px}
    }
  </style>

  {{-- flash --}}
  @if (session('ok'))
    <div class="alert alert-success mb-3">{{ session('ok') }}</div>
  @endif

  {{-- ================== FORM ================== --}}
  <div class="card mb-4">
    <div class="card-header">{{ $slideId ? 'Edit Slide' : 'Add New Slide' }}</div>
    <div class="card-body">
      <div class="grid-row">
        <div>
          <label class="form-label">Placement</label>
          <select class="form-select" wire:model.defer="placement">
            <option value="home_hero">Home Hero (main banner)</option>
          </select>
          @error('placement') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="d-flex align-items-end">
          <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" wire:model.defer="is_active" id="actv">
            <label class="form-check-label" for="actv">Active</label>
          </div>
        </div>

        <div class="col-12" style="grid-column: 1 / -1;">
          <label class="form-label">Image URL *</label>
          <input type="text" class="form-control" wire:model.defer="image_path" placeholder="https://.../banner.jpg">
          <div class="slider-size-note">
           <strong>Recommended Image size:</strong> Width 500px × Height 300px &nbsp;&nbsp; 
          </div>
          @error('image_path') <small class="text-danger d-block">{{ $message }}</small> @enderror
        </div>
      </div>

      @if($image_path)
        <div class="preview mt-3">
          <img src="{{ $image_path }}" alt="preview">
        </div>
      @endif

      <div class="btn-bar">
        <button class="btn btn-primary" wire:click="saveSlide">
          {{ $slideId ? 'Update Slide' : 'Save Slide' }}
        </button>
        @if($slideId)
          <button class="btn btn-outline-secondary" wire:click="resetForm">Cancel</button>
        @endif
        <span wire:loading wire:target="saveSlide">Saving…</span>
      </div>
    </div>
  </div>

  {{-- ================== TABLE ================== --}}
  <div class="card">
    <div class="card-header">All Slides</div>
    <div class="card-body p-0">
      <div class="table-wrap">
        <table class="table table-hover table-sm align-middle mb-0">
          <thead>
            <tr>
              <th style="width:140px">Preview</th>
              <th style="width:160px">Placement</th>
              <th style="width:100px">Active</th>
              <th style="width:180px">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($slides as $s)
              <tr>
                <td><img class="thumb" src="{{ $s->image_path }}" alt=""></td>
                <td><span class="badge bg-info text-dark">{{ $s->placement }}</span></td>
                <td>
                  @if($s->is_active)
                    <span class="toggle-on">On</span>
                  @else
                    <span class="toggle-off">Off</span>
                  @endif
                </td>
                <td>
                  <div class="d-flex gap-2">
                    <button class="btn btn-primary btn-sm" wire:click="editSlide({{ $s->id }})">Edit</button>
                    <button class="btn btn-danger btn-sm"
                            wire:click="deleteSlide({{ $s->id }})"
                            onclick="return confirm('Delete this slide?')">Delete</button>
                  </div>
                </td>
              </tr>
            @empty
              <tr><td colspan="4" class="text-center py-4">No slides yet.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
