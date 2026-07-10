<div>
  <style>
    .switch { position: relative; display:inline-block; width:46px; height:26px; }
    .switch input { opacity:0; width:0; height:0; }
    .slider {
      position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0;
      background:#d0d7de; transition:.2s; border-radius:26px;
      box-shadow: inset 0 0 0 1px rgba(0,0,0,.08);
    }
    .slider:before {
      position:absolute; content:""; height:22px; width:22px; left:2px; top:2px;
      background:#fff; transition:.2s; border-radius:50%;
      box-shadow:0 1px 2px rgba(0,0,0,.25);
    }
    input:checked + .slider { background:#22c55e; }
    input:checked + .slider:before { transform:translateX(20px); }
    .pm-card{
      border:1px solid rgba(0,0,0,.08); border-radius:12px; padding:16px; margin-bottom:16px;
      background:var(--color-surface, #fff); color:var(--color-text, #111);
    }
    .pm-row{display:flex; align-items:center; justify-content:space-between; padding:8px 0; border-bottom:1px dashed rgba(0,0,0,.08);}
    .pm-row:last-child{border-bottom:0;}
    .pm-name{font-weight:700;}
    .pm-badge{padding:2px 8px; border-radius:999px; font-size:12px; background:#eef2f7; color:#334155;}
  </style>

  @foreach($grouped as $group => $rows)
    <div class="pm-card">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <h5 class="m-0">{{ $group }} Methods</h5>
        <span class="pm-badge">{{ $rows->count() }} items</span>
      </div>

      @foreach($rows as $m)
        <div class="pm-row">
          <div class="pm-name">{{ str_replace('_', ' ', $m->name) }}</div>
          <label class="switch mb-0">
            <input type="checkbox"
                   wire:click="toggle({{ $m->id }})"
                   @checked($m->is_enabled)>
            <span class="slider"></span>
          </label>
        </div>
      @endforeach
    </div>
  @endforeach
</div>
