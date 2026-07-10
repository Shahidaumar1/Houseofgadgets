<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF for AJAX/fetch --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>

    {{-- FONTS / ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Livewire --}}
    @livewireStyles
    @livewireScripts

    {{-- Vite assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- THEME VARIABLES (from AppServiceProvider → $activeTheme) --}}
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

        /* convenient aliases */
        --color-bg: var(--theme-c0);
        --color-surface: var(--theme-c1);
        --color-muted: var(--theme-c2);
        --color-text: var(--theme-c3);
        --color-primary: var(--theme-c4);
        --color-accent: var(--theme-c5);
      }

      /* optional admin theming */
      body { background: var(--color-bg); color: var(--color-text); }
      .content-wrapper { background: var(--color-surface); }
      a { color: var(--color-accent); }
      .btn-primary { background: var(--color-primary) !important; border-color: var(--color-primary) !important; }
      .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active { background: var(--color-primary); }
    </style>
</head>
