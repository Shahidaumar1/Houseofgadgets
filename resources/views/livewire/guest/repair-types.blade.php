<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
 
   @php
    use App\Models\FormStatus;
    use App\Models\Price;
    $formStatuses = FormStatus::where('name', 'services')->first();
    @endphp
    
    
    <div>
                <livewire:components.mega-nav theme="white" />
 
        <style>
            /* Theme-aware Repair Types */
            body,.repair-main-sec,.repair-heading-sec,.repair-type-page {
                background-color:#000 !important;
            }
.repair-type-page{display:block;width:100%;float:left;}
a{text-decoration:none;color:var(--color-text);}

.cust-container{max-width:1140px;margin:0 auto;}

.repair-heading-sec{padding:29px 15px;border-bottom:1px solid rgba(0,0,0,.27);}
.repair-heading-sec p{
  color:var(--color-text);
  font-family:"Manrope",sans-serif;margin-bottom:0;text-align:center;
  font-size:20px;line-height:27.32px;
}

.repair-main-sec{padding:72px 15px;}
.repair-main-sec h2{
  font-size:32px;text-align:center;line-height:60px;font-weight:700;
  color:var(--color-text);font-family:"Manrope",sans-serif;margin:0 0 50px;letter-spacing:-.33px;
}
.repair-main-sec small{
  font-size:18px;line-height:24.59px;display:block;text-align:center;
  color:var(--color-primary);font-family:"Manrope",sans-serif;font-weight:800;
}

.repair-main-inner{
  display:flex;gap:30px;flex-wrap:wrap;justify-content:center;align-items:stretch;
}

.repair-main-inner .repair-item-box{
  background:transparent !important;color:var(--color-text);
  box-shadow:0 0 4px rgba(0,0,0,.15);
  border:1px solid var(--color-primary);
  padding:60px 49px;border-radius:20px;flex:0 0 30%;width:100%;
  display:flex;flex-direction:column;cursor:pointer;
  transition:box-shadow .25s ease, transform .15s ease;
}
.repair-main-inner .repair-item-box:hover{box-shadow:0 0 40px  var(--color-primary) !important; transition:.3s ease }

.repair-main-inner .repair-item-box figure{width:100%;margin-bottom:30px;}
.repair-main-inner .repair-item-box figure img{
  height:100px;object-fit:contain;display:block;margin:0 auto;
}

.repair-main-inner .repair-item-box h4{
  font-size:24px;line-height:28.8px;text-align:center;font-weight:700;
  font-family:"Manrope",sans-serif;margin:0 auto;max-width:231px;padding-bottom:16px;
  color:color-mix(in srgb, var(--color-text), transparent 32%);
}
.repair-main-inner .repair-item-box h6{
  font-size:40px;line-height:60px;font-weight:700;text-align:center;margin:0 0 40px;
  color:color-mix(in srgb, var(--color-text), transparent 32%);
  font-family:"Manrope",sans-serif;
}

/* Primary CTA */
.repair-main-inner .repair-item-box .repair-btn{
  width:232px;height:65px;font-size:20px;line-height:27.32px;
  font-weight:500;display:flex;align-items:center;justify-content:center;
  border-radius:10px;transition:.25s ease;font-family:"Manrope",sans-serif;
  border:1px solid var(--color-primary);color:var(--color-primary)!important;
  background:#000 !important;margin:0 auto;text-align:center;padding:0;
}
.repair-main-inner .repair-item-box .repair-btn:hover{
  color:black!important;background:var(--color-primary) !important;border-color:var(--color-primary) ;
}

/* Mobile chevron CTA */
.repair-main-inner .repair-item-box .mobile-repair-btn{
  display:none;font-size:30px;color:var(--color-primary)!important;background:transparent;
}

/* ======= Breakpoints ======= */
@media (max-width:991px){
  .repair-main-sec{padding:50px 15px;}
  .repair-main-inner .repair-item-box{padding:40px 30px;}
  .repair-main-inner .repair-item-box .repair-btn{
    width:168px;height:40px;font-size:16px;line-height:21.86px;border-radius:10px;
  }
  .repair-main-inner .repair-item-box h4{font-size:20px;line-height:23.8px;}
}
@media (max-width:768px){
  .repair-main-sec{padding:40px 15px;}
  .repair-heading-sec{padding:20px 15px;border-bottom:1px solid rgba(0,0,0,.27);}
  .repair-heading-sec p{font-size:18px;}
  .repair-main-sec h2{font-size:25px;line-height:32px;margin-bottom:40px;}
  .repair-main-inner{gap:20px;}
  .repair-main-inner .repair-item-box{flex:0 0 48%;}
  .repair-main-inner .repair-item-box h4{font-size:18px;line-height:23px;padding-bottom:14px;}
  .repair-main-inner .repair-item-box h6{font-size:24px;line-height:32px;margin-bottom:25px;}
}
@media (max-width:576px){
  .repair-main-sec{padding:30px 15px;}
  .repair-heading-sec p{font-size:15px;line-height:20px;}
  .repair-main-inner{gap:20px;}
  .repair-main-inner .repair-item-box{
    padding:20px;border-radius:10px;flex:0 0 100%;
    display:flex;flex-direction:row;gap:15px;align-items:center;justify-content:space-around;
  }
  .repair-main-inner .repair-item-box figure{width:80px;margin-bottom:0;}
  .repair-main-inner .repair-item-box h4,
  .repair-main-inner .repair-item-box h6{text-align:left;margin:0;padding-bottom:8px;}
  .repair-main-inner .repair-item-box .repair-btn{display:none;}
  .repair-main-inner .repair-item-box .mobile-repair-btn{display:block;}
}
@media (max-width:400px){
  .repair-main-inner .repair-item-box h4{font-size:15px;line-height:19px;}
  .repair-main-inner .repair-item-box h6{font-size:20px;line-height:26px;}
}

        </style>

        <section class="repair-type-page">
            <div class="cust-container">
                <div class="repair-heading-sec">
                    <p>Need A Repair? Tell us Which Device You Have </p>
                </div>

                <div class="repair-main-sec">
                    <small>We can fix that</small>
                    <h2>Broken {{ $modal->name ?? '' }}</h2>
                    @if ($device)
                    <div class="repair-main-inner">
                        @forelse ($device->repair_types as $repair_type)
                        @php
                            $price = Price::where('modal_id', $modal->id)
                                ->where('repair_type_id', $repair_type->id)
                                ->first();

                            $repairUrl = route('repair-detail', [
                                'category' => $category->slug,
                                'device'   => $device->slug,
                                'modal'    => $modal->slug,
                                'repair'   => $repair_type->slug,
                            ]);
                        @endphp

                        @if ($price && $price->price > 0)
                       <div class="repair-item-box" data-url="{{ $repairUrl }}">
    <figure>
        <img src="{{ asset($repair_type->image) ?? '' }}"
            alt="{{ asset($repair_type->image) ?? '' }}" class="img-fluid">
    </figure>
    <div style="text-align:left;">
        <h4> {{ $repair_type->name }}</h4>
        <h6>£ {{ $price->price }}</h6>
    </div><br>
    <a class="repair-btn" href="{{ $repairUrl }}">
        Book Instant Repair 
    </a>
    <a class="mobile-repair-btn" href="{{ $repairUrl }}">
        <i class="fa-solid fa-circle-chevron-right"></i>
    </a>
</div>
                        @endif

                        @empty
                        <p>No repair types found.</p>
                        @endforelse
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
    
    <script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.repair-item-box[data-url]').forEach(function(card) {
        card.addEventListener('click', function(e) {
            // Check if the clicked element is NOT an anchor tag AND not inside an anchor
            if (!e.target.closest('a')) {
                window.location.href = this.getAttribute('data-url');
            }
        });
        
        // Add hover effect to indicate it's clickable
        card.style.cursor = 'pointer';
    });
});
</script>