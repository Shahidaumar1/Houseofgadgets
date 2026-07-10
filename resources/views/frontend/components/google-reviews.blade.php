@php
    // shared from AppServiceProvider
    $rating = $googleReviewsRounded ?? ($googleReviews->rounded_rating ?? 0);
    $count  = $googleReviews->reviews_count ?? 0;
    $url    = $googleReviews->review_url ?? null;
    $stars  = $googleStars ?? ['full'=>0,'half'=>0,'empty'=>5];
@endphp

<style>
  .gr-wrap { display:flex; align-items:center; gap:10px; }
  .gr-stars i { font-size:20px; color:#fbbf24; }
  .gr-text  { font-size:14px; color:var(--color-text, #111); }
  .gr-link  { text-decoration:none; color:inherit; }
  .gr-link:hover { text-decoration:underline; }
</style>

<div class="gr-wrap">
  <div class="gr-stars" aria-label="Google rating {{ number_format($rating,1) }} out of 5">
    @for($i=0; $i<($stars['full'] ?? 0); $i++)
      <i class="fa-solid fa-star"></i>
    @endfor
    @if(($stars['half'] ?? 0) === 1)
      <i class="fa-solid fa-star-half-stroke"></i>
    @endif
    @for($i=0; $i<($stars['empty'] ?? 0); $i++)
      <i class="fa-regular fa-star"></i>
    @endfor
  </div>

  <div class="gr-text">
    <strong>{{ number_format($rating, 1) }}/5</strong>
    @if($count > 0)
      ·
      @if($url)
        <a class="gr-link" href="{{ $url }}" target="_blank" rel="noopener">Based on {{ $count }} reviews</a>
      @else
        Based on {{ $count }} reviews
      @endif
    @endif
  </div>
</div>
