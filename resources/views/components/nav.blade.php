@php
    $links = [
        ['label' => 'Projets', 'route' => 'work.index', 'match' => 'work.*'],
        ['label' => 'À propos', 'route' => 'about', 'match' => 'about'],
        ['label' => 'Contact', 'route' => 'contact', 'match' => 'contact'],
    ];
@endphp

<header class="site-header" data-header>
    <div class="site-wrap flex h-[4.25rem] items-center justify-between gap-6">
        <a href="{{ route('home') }}" class="logo-mark">
            <b>MK</b>
            {{ config('portfolio.last_name') }}
        </a>

        <nav class="hidden items-center gap-8 text-sm md:flex">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    class="nav-link {{ request()->routeIs($link['match']) ? 'is-active' : '' }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-2 md:gap-4">
            <button type="button" class="theme-toggle" data-theme-toggle aria-label="Activer le mode clair">
                <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M12 3v2M12 19v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M3 12h2M19 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"></path>
                </svg>
                <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path d="M16.5 13.5A7 7 0 0 1 10.5 4a7 7 0 1 0 6 9.5Z"></path>
                </svg>
            </button>
            <a href="{{ config('portfolio.cv') }}" class="nav-link hidden text-sm md:inline" target="_blank" rel="noreferrer">CV</a>
            <a href="{{ route('contact') }}" class="btn-primary hidden !px-5 !py-2 text-sm md:inline-flex">Discuter</a>
            <button type="button" class="nav-toggle md:hidden" data-nav-toggle aria-expanded="false" aria-controls="mobile-nav" aria-label="Menu">
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <div id="mobile-nav" class="mobile-nav hidden border-t border-line bg-night md:hidden">
        <div class="site-wrap flex flex-col gap-1 py-4">
            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}" class="py-3 text-lg">{{ $link['label'] }}</a>
            @endforeach
            <a href="{{ config('portfolio.cv') }}" class="py-3 text-lg" target="_blank" rel="noreferrer">Télécharger le CV</a>
        </div>
    </div>
</header>
