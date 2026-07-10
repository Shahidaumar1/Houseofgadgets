<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-17637798557">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-17637798557');
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF (fixes 419 for fetch/axios/ajax) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>MobileBitz - Buy, Sell, Repair</title>

    {{-- Livewire (because you use @livewire in this layout) --}}
    @livewireStyles

    {{-- Optional: expose token to JS too --}}
    <script>
      window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>

    {{-- Bootstrap etc --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
      




    {{-- Google Tag Manager --}}
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-TD8FM855');
    </script>
    {{-- End GTM --}}

    {{-- GA --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C783ZPCQ87"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-C783ZPCQ87');
    </script>

    {{-- ACTIVE THEME injection (from AppServiceProvider -> $activeTheme) --}}
    <style id="active-theme">
      :root{
        --theme-c0: {{ $activeTheme['colors'][0] ?? '#111827' }};
        --theme-c1: {{ $activeTheme['colors'][1] ?? '#1F2937' }};
        --theme-c2: {{ $activeTheme['colors'][2] ?? '#374151' }};
        --theme-c3: {{ $activeTheme['colors'][3] ?? '#9CA3AF' }};
        --theme-c4: {{ $activeTheme['colors'][4] ?? '#E5E7EB' }};
        --theme-c5: {{ $activeTheme['colors'][5] ?? '#6B7280' }};
        --theme-c6: {{ $activeTheme['colors'][6] ?? '#4B5563' }};
        --theme-c7: {{ $activeTheme['colors'][7] ?? '#111827' }};

        --color-bg: var(--theme-c0);
        --color-surface: var(--theme-c1);
        --color-muted: var(--theme-c2);
        --color-text: var(--theme-c3);
        --color-primary: var(--theme-c4);
        --color-accent: var(--theme-c5);
      }
      body{ background:var(--color-bg); color:var(--color-text); }
      .card{ background:var(--color-surface); }
      .btn-primary{ background:var(--color-primary)!important; border-color:var(--color-primary)!important; }
      a{ color:var(--color-accent); }
    </style>

    {{-- Let pages push extra <head> tags if needed --}}
    @stack('head')
    
</head>

<body>
    {{-- GTM noscript --}}
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TD8FM855"
      height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    {{-- Top Bar Livewire Component --}}
    @livewire('components.top-bar')

    {{-- Navigation --}}
    @include('layouts.navigation')

    {{-- Page content --}}
    <div class="container mt-5">
      @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="bg-light text-center py-3 mt-5">
      <p>&copy; {{ now()->year }} MobileBitz. All Rights Reserved.</p>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>

    {{-- Livewire scripts --}}
    @livewireScripts

    {{-- Allow pages to push body-end scripts (e.g., your theme page script) --}}
    @stack('scripts')
</body>
</html>
