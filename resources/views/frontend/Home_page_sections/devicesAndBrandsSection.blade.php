<div>
  <style>
    /* same CSS as before (unchanged) */
    .custom-sec2{
      padding:0 15px 100px; text-align:center; float:left;
     background:#000 !important;
      color:var(--color-text);
    }
    .custom-sec2-main small{
      font-size:18px; line-height:24.59px; padding-bottom:22px;
      font-weight:800; font-family:"Manrope",sans-serif;
      color:var(--color-primary);
    }
    .custom-sec2-main h3{
      font-size:32px; line-height:60px; font-weight:700; margin:0!important;
      font-family:"Manrope",sans-serif; color:var(--color-text);
    }
    .custom-sec2-inner{ padding:50px 0; margin-top:0!important; }
    .custom-sec2-inner .custom-sec2-box{
      display:flex; padding:56px 40px; flex-direction:column; align-items:center;
      border-radius:20px ;
      box-shadow:0 0 4px 0 rgba(0,0,0,.15);
      background:transparent ;
      transition:all .3s ease;
     
    }
    /* Add grey border to the boxes */
.custom-sec2-inner .custom-sec2-box {
    border: 1px solid  var(--color-primary) !important ;  /* Grey border */
}

    
    .custom-sec2 .custom-sec2-box a:hover,
    .custom-sec2 .custom-sec2-viewAllBtn:hover{
      background: var(--color-primary);
      border-color: var(--color-primary);
      color: var(--color-bg) !important;
    }
    .custom-sec2 .custom-sec2-box a:hover *,
    .custom-sec2 .custom-sec2-viewAllBtn:hover *{ color: inherit !important; }

    .custom-sec2-inner .custom-sec2-box:hover{box-shadow:0 0 40px  var(--color-primary) !important; transition:.3s ease }

    [data-url]{ cursor:pointer; }
    [data-url]:active{ transform:scale(.98); }

    .custom-sec2-box figure{ width:100%; height:400px; margin-bottom:24px; display:flex; align-items:center; justify-content:center; }
    .custom-sec2-box figure img{ margin:auto; display:block; max-height:400px; width:500px; height:auto; }

    .custom-sec2-box a,
    .custom-sec2-viewAllBtn{
      width:249px; height:65px; font-size:20px; line-height:27.32px;
      text-decoration:none; font-weight:500; display:flex; align-items:center; justify-content:center;
      border-radius:10px; transition:.25s ease; font-family:"Manrope",sans-serif; font-style:normal;
      border:1px solid var(--color-primary);
      color:var(--color-primary) !important;
      background:transparent;
    }
    .custom-sec2-viewAllBtn{ width:145px; }

    .row.custom-sec2-inner { margin: 0 -12px !important; row-gap: 24px; }
    .row.custom-sec2-inner > [class*="col-"] { padding: 0 12px !important; }

    @media (max-width:1200px){
      .custom-sec2-inner .custom-sec2-box{ padding:40px 24px !important; }
      .custom-sec2-box figure{ height:340px; }
      .custom-sec2-box figure img{ max-height:280px; }
    }
    @media (max-width:991px){
      .custom-sec2{ padding:0 15px 50px; }
      .custom-sec2-main small{ font-size:16px; line-height:20px; padding-bottom:10px; }
      .custom-sec2-main h3{ font-size:24px; line-height:40px; }
      .row.custom-sec2-inner{ padding:30px 0; }
      .custom-sec2-inner .custom-sec2-box{ padding:32px 20px !important; }
      .custom-sec2-box figure{ height:300px; }
      .custom-sec2-box figure img{ max-height:240px; }
    }
    @media (max-width:768px){
      .custom-sec2{ padding:0 15px 40px; }
      .row.custom-sec2-inner{ row-gap:24px; }
    }
    @media (max-width:576px){
      .custom-sec2{ padding:0 10px 30px; }
      .custom-sec2-main small{ font-size:14px; line-height:20px; padding-bottom:8px; }
      .custom-sec2-main h3{ font-size:20px; line-height:35px; }
      .custom-sec2-inner .custom-sec2-box{ padding:28px 16px !important; max-width:340px; margin:0 auto; }
      .custom-sec2-box a, .custom-sec2-viewAllBtn{ width:170px; height:50px; font-size:15px; line-height:14px; border-radius:6px; }
      .custom-sec2-box figure{ height:260px; }
      .custom-sec2-box figure img{ max-height:350px; }
    }
  </style>

  <!-- custom section 2 device and brands start -->
  <section class="custom-sec2 w-100 float-left d-block">
    <div class="custom-container">
      <div class="custom-sec2-main">
        <!--<small>Devices</small>-->
        <h3>Devices & Brands We Repair</h3>

        @php
          use App\Models\Category;
          $homeDeviceTypes = Category::where('service', 'Repair')
              ->where('status', 'Publish')
              ->whereNull('deleted_at')
              ->orderBy('id', 'ASC')
              ->get();
        @endphp

        <div class="row custom-sec2-inner justify-content-center">
          @forelse($homeDeviceTypes as $device)
            <div class="col-sm-6 col-md-6" data-url="{{ url('/device-types/'.$device->id) }}">
              <div class="custom-sec2-box">
                <figure>
                  <img src="{{ $device->file ?: 'https://via.placeholder.com/360x260?text=Device' }}"
                       alt="{{ $device->name }}" class="img-fluid"
                       width="360" height="260" loading="lazy">
                </figure>
                <a href="{{ url('/device-types/'.$device->id) }}">
                  {{ $device->name }}
                </a>
              </div>
            </div>
          @empty
            <p>No devices available right now.</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>
  <!-- custom section 2 device and brands end -->
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-url]').forEach(function(card) {
      card.addEventListener('click', function(e) {
        if (!e.target.closest('a')) {
          window.location.href = this.getAttribute('data-url');
        }
      });
    });
  });
</script>
