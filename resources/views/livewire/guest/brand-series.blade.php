<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<div>
  <livewire:components.top-bar />
  <livewire:components.mega-nav />

  <style>
    .cust-container{max-width:1140px;margin:0 auto;}
    .head{padding:28px 15px;border-bottom:1px solid rgba(0,0,0,.27);}
    .head h5{margin:0;text-align:center;font:700 22px/30px "Manrope",sans-serif}
    .wrap{padding:60px 15px}
    .cards{display:flex;flex-wrap:wrap;gap:22px;justify-content:center}
    .series-card{width:240px;min-height:120px;border:1px solid #EA1555;border-radius:14px;display:flex;align-items:center;justify-content:center;padding:18px;text-align:center;text-decoration:none;color:#000;background:#fff;font-weight:800}
    .series-card:hover{background:#EA1555;color:#fff;transition:.2s}
    .brand-logo{display:flex;justify-content:center;margin-bottom:22px}
    .brand-logo img{max-height:80px;object-fit:contain}
  </style>

  <section class="head">
    <div class="cust-container">
      <h5>Select Series — <span class="text-danger">{{ $device->name }}</span></h5>
    </div>
  </section>

  <div class="wrap">
    <div class="cust-container">
      <div class="brand-logo">
        @if(!empty($device->file))
          <img src="{{ $device->file }}" alt="{{ $device->name }}">
        @endif
      </div>

      @if(empty($series))
        <p style="text-align:center">No series found.</p>
      @else
        <div class="cards">
          @foreach($series as $s)
            <a class="series-card" href="{{ $s['href'] }}">{{ $s['label'] }}</a>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>
