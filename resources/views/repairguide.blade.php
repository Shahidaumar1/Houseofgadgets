{{-- resources/views/repairguide.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- Dark theme — only for this page --}}
<style>
  :root{
    --bg: #0b1215;          /* page background */
    --panel: #11181c;       /* cards/nav panels */
    --panel-2:#0e1519;      /* alt panel */
    --text: #d7e2ea;        /* primary text */
    --muted:#9db0bd;        /* secondary text */
    --border:#20323a;       /* subtle borders */
    --accent:#EA1555;       /* brand accent/pink */
  }

  /* remove site chrome for this landing */
  header, .navbar, .site-header, .topbar, .breadcrumb, footer { display:none !important; }
  html { scroll-behavior:smooth; }
body { padding-top:0 !important; background:#000  !important; color:var(--text); }


  /* container width + breathing room */
  .faq-container{ margin-bottom:4rem; }
  @media (min-width:1200px){ .faq-container{ max-width:1100px; } }
  @media (min-width:992px){ .faq-container{ margin-bottom:5rem; } }

  /* page title */
  .faq-title{
    color:var(--text);
    letter-spacing:.2px;
    text-shadow:0 1px 0 rgba(0,0,0,.2);
  }

  /* left sticky menu */
.faq-menu{
  position:sticky; top:18px;
  background:#000 !important;
  border:1px solid var(--color-primary) !important;
  border-radius:16px;
}

  .faq-menu h6{
    color:var(--accent);
    letter-spacing:.2px;
  }
  .faq-menu .list-group{
    background:transparent;
  }
  .faq-menu .list-group-item{
    background:transparent;
    border:none;
    color:var(--muted);
    padding:.55rem .75rem;
    border-radius:10px;
    transition:background .18s ease,color .18s ease;
  }
  .faq-menu .list-group-item:hover{ color:var(--text); background:rgba(234,21,85,.08); }
  .faq-menu .list-group-item.active{
    background:var(--accent);
    color:#fff;
  }

  /* right Q&A cards */
 .faq-card{
  background:#000 !important;
  border:1px solid var(--color-primary) !important;
  border-radius:16px;
  box-shadow:none;
}

  .faq-card + .faq-card{ margin-top:14px; }
  .faq-card h3{
    color:#ffffff;
    font-size:1.05rem;
    margin-bottom:.35rem;
  }
  .faq-card .answer{
    color:var(--muted);
    font-size:.95rem;
    line-height:1.55rem;
  }

  /* links inside content */
  #faqContent a{ color:#ff87ac; text-decoration:none; }
  #faqContent a:hover{ color:#ffc2d3; }

  /* chips / small accent */
  .chip{
    display:inline-flex; align-items:center; gap:.4rem;
    background:rgba(234,21,85,.08); color:#ffd2df;
    border:1px solid rgba(234,21,85,.25);
    padding:.2rem .55rem; border-radius:999px; font-size:.75rem;
  }

  /* small horizontal separators inside answers */
  .soft-hr{
    height:1px; width:100%;
    background:linear-gradient(90deg,transparent, var(--border), transparent);
    margin:.6rem 0;
  }

  /* buttons if you re-enable later */
  .btn-dark, .btn-outline-light{
    border-radius:10px;
  }

  /* fine-tune bootstrap list group contrast on dark */
  .list-group-item + .list-group-item{ border-top: none; }
</style>
<style>
  /* === OVERRIDES: remove pink, use silver + black === */
  .faq-menu .list-group-item:hover{
    background: #d9d9d9;   /* light silver */
    color: #000;           /* black text */
  }
  .faq-menu .list-group-item.active{
    background: #c0c0c0;   /* silver when active (while scrolling) */
    color: #000;           /* black text */
  }

  /* optional: sidebar heading color from pink -> silver */
  .faq-menu h6{
    color: #c0c0c0;
  }

  /* optional: in-article links from pink -> silver shades */
  #faqContent a{ color:#c0c0c0; }
  #faqContent a:hover{ color:#e6e6e6; }
</style>


<div class="container faq-container my-4 my-md-5" style="font-family: 'Manrope', 'Segoe UI', Roboto, Arial, sans-serif;">
  <div class="text-center mb-2 mt-4">
    <h1 class="fw-bold m-0 faq-title">Repair Guide</h1>
  </div>

  <div class="row g-4 mt-4">
    {{-- LEFT: Sticky Menu --}}
    <aside class="col-lg-4 order-1 order-lg-1">
      <div class="faq-menu shadow-sm p-3">
        <h6 class="fw-bold mb-2">Questions</h6>
        <div class="list-group" id="faqMenu">
          <a class="list-group-item list-group-item-action" href="#q1">Do I lose data with a screen replacement?</a>
          <a class="list-group-item list-group-item-action" href="#q2">Do I need a new battery?</a>
          <a class="list-group-item list-group-item-action" href="#q3">Phone in water — what now?</a>
          <a class="list-group-item list-group-item-action" href="#q4">Not charging: port vs battery</a>
          <a class="list-group-item list-group-item-action" href="#q5">Privacy & data access</a>
          <a class="list-group-item list-group-item-action" href="#q6">Parts quality (OEM/aftermarket)</a>
          <a class="list-group-item list-group-item-action" href="#q7">Booking vs walk-in</a>
          <a class="list-group-item list-group-item-action" href="#q8">Diagnostic fee</a>
          <a class="list-group-item list-group-item-action" href="#q9">How long do repairs take?</a>
          <a class="list-group-item list-group-item-action" href="#q10">What warranty do I get?</a>
          <a class="list-group-item list-group-item-action" href="#q11">True Tone / Face ID / Touch ID</a>
          <a class="list-group-item list-group-item-action" href="#q12">Do I need to back up first?</a>
          <a class="list-group-item list-group-item-action" href="#q13">After-repair care tips</a>
          <a class="list-group-item list-group-item-action" href="#q14">Why can a quote change?</a>
        </div>
      </div>
    </aside>

    {{-- RIGHT: Content --}}
    <div class="col-lg-8 order-2 order-lg-2" id="faqContent">

      <article id="q1" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">Do I lose data when I replace my screen?</h3>
        <div class="answer">
          Screen repairs don’t touch your storage — your data stays safe. If there’s water damage or severe board faults, back up first.
        </div>
      </article>

      <article id="q2" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">How do I know if I need a new battery?</h3>
        <div class="answer">
          Fast drain, random shutdowns, swelling, or iPhone Battery Health &lt; 80% are classic signs. A fresh battery usually restores normal performance.
        </div>
      </article>

      <article id="q3" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">I dropped my phone in water — what should I do?</h3>
        <div class="answer">
          Power off immediately, don’t charge, and bring it in ASAP. Rice isn’t reliable — professional ultrasonic cleaning stops corrosion and saves components.
        </div>
      </article>

      <article id="q4" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">My phone isn’t charging — is it the port or the battery?</h3>
        <div class="answer">
          We test with a known-good cable, inspect/clean the port, and run diagnostics. Many cases are port cleaning or replacement rather than the battery.
        </div>
      </article>

      <article id="q5" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">Will you access my photos or data?</h3>
        <div class="answer">
          No — we respect your privacy. We only test functions required for the repair. You can back up and sign out of accounts if you prefer.
        </div>
      </article>

      <article id="q6" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">What parts do you use — OEM or aftermarket?</h3>
        <div class="answer">
          We fit premium-grade parts with warranty. Where OEM isn’t available, we use the best quality alternatives suitable for your model.
        </div>
      </article>

      <article id="q7" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">Do I need an appointment, or can I walk in?</h3>
        <div class="answer">
          Walk-ins welcome! Booking online guarantees priority and part availability, especially on busy days.
        </div>
      </article>

      <article id="q8" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">Is there a diagnostic fee if I don’t go ahead?</h3>
        <div class="answer">
          Basic checks are usually free. For complex board-level faults, a small diagnostic fee may apply — we’ll confirm before continuing.
        </div>
      </article>

      <article id="q9" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">How long do repairs take?</h3>
        <div class="answer">
          Many fixes are same-day. Typical times: screen 45–90 min, battery 30–60 min, charge port 60–120 min. Water/board work may take 1–3 days.
        </div>
      </article>

      <article id="q10" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">What warranty do I get?</h3>
        <div class="answer">
          Most repairs include a parts & labour warranty (3–12 months depending on part type). Physical damage, liquid damage, or third-party tampering aren’t covered.
        </div>
      </article>

      <article id="q11" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">Will True Tone, Face ID or Touch ID be affected?</h3>
        <div class="answer">
          We preserve features where possible. Some models need calibration/programming to retain True Tone; Face ID/Touch ID modules are paired to the logic board and must remain original to function.
        </div>
      </article>

      <article id="q12" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">Do I need to back up first?</h3>
        <div class="answer">
          It’s best practice. Use iCloud/Google backup or a computer. For critical data or water/board cases, <em>please</em> back up before handing in.
        </div>
      </article>

      <article id="q13" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">Any after-repair care tips?</h3>
        <div class="answer">
          Avoid moisture/heat for 24 hours, let new seals cure, and use a quality case/screen protector. Batteries may need a couple of full cycles to re-optimize.
        </div>
      </article>

      <article id="q14" class="faq-card p-3 p-md-4 shadow-sm">
        <h3 class="fw-semibold">Why can a quote change after diagnostics?</h3>
        <div class="answer">
          Hidden issues (water, bent frame, board damage) can show up after opening/testing. We’ll call first and only proceed once you approve any changes.
        </div>
      </article>

      {{-- Optional CTA (kept commented as in your file)
      <div class="text-center mt-4">
        <a href="{{ route('repair-create') }}" class="btn btn-outline-light px-4">Book a Repair</a>
      </div> --}}
    </div>
  </div>
</div>

{{-- left menu active highlight while scrolling --}}
<script>
  (function () {
    const links   = Array.from(document.querySelectorAll('#faqMenu a'));
    const targets = links.map(a => document.querySelector(a.getAttribute('href'))).filter(Boolean);

    function setActive(id){
      links.forEach(a => a.classList.toggle('active', a.getAttribute('href') === '#'+id));
    }

    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) setActive(entry.target.id);
      });
    }, { rootMargin: '0px 0px -70% 0px', threshold: 0.1 });

    targets.forEach(sec => io.observe(sec));
    links.forEach(a => a.addEventListener('click', () => setActive(a.getAttribute('href').slice(1))));
  })();
</script>
@endsection
