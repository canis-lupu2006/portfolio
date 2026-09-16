@props([
    'title' => null,
    'description' => null,
])

@php
    $name = config('portfolio.name');
    $pageTitle = $title ? $title.' — '.$name : $name.' — '.config('portfolio.role');
    $pageDescription = $description ?? config('portfolio.intro');
@endphp

<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="theme-color" content="#0e0d0b">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:type" content="website">
    <title>{{ $pageTitle }}</title>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <script>
        (() => {
            try {
                const saved = localStorage.getItem('mk-theme');
                const theme = saved === 'light' || saved === 'dark'
                    ? saved
                    : (window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');
                document.documentElement.dataset.theme = theme;
                const meta = document.querySelector('meta[name="theme-color"]');
                if (meta) meta.setAttribute('content', theme === 'light' ? '#f4ebe1' : '#0e0d0b');
            } catch (error) {}
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen overflow-x-hidden bg-night antialiased">
    <div class="spotlight" aria-hidden="true"></div>
    <x-nav />
    <main>
        {{ $slot }}
    </main>
    <x-site-footer />
</body>
</html>
