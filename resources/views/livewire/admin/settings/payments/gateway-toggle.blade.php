<div class="d-flex align-items-center gap-2 mb-3">
  <style>
    .switch { position:relative; display:inline-block; width:46px; height:26px; }
    .switch input { opacity:0; width:0; height:0; }
    .slider { position:absolute; cursor:pointer; inset:0; background:#d0d7de; transition:.2s; border-radius:26px; }
    .slider:before { content:""; position:absolute; height:22px; width:22px; left:2px; top:2px; background:#fff; border-radius:50%; transition:.2s; }
    input:checked + .slider { background:#22c55e; }
    input:checked + .slider:before { transform:translateX(20px); }
  </style>

  <strong class="me-2">{{ ucfirst($gateway) }} status</strong>

  <label class="switch mb-0" title="Toggle all Buy/Sell/Repair {{ ucfirst($gateway) }}">
    <input type="checkbox" wire:click="toggleAll" @checked($allOn)>
    <span class="slider"></span>
  </label>

  <span class="text-muted small ms-2">
    {{ $enabled }}/{{ $total }} enabled
  </span>
</div>
