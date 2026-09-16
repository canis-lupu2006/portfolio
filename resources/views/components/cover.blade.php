@props([
    'kind' => 'todzi',
    'large' => false,
    'image' => null,
    'title' => null,
    'slug' => null,
])

@php
    $src = $image;
    if (! $src && $slug) {
        foreach (['png', 'jpg', 'jpeg', 'webp'] as $ext) {
            $relative = "images/projects/{$slug}.{$ext}";
            if (is_file(public_path($relative))) {
                $src = '/'.$relative;
                break;
            }
        }
    }

    $forcePoster = $kind === 'froid';
    $showPhoto = $src && ! $forcePoster;
@endphp

<div {{ $attributes->class(['cover', 'cover-'.$kind, $large ? 'cover-large' : '', $showPhoto ? 'has-image' : 'has-stage']) }}>
    @if ($showPhoto)
        <img src="{{ $src }}" alt="{{ $title ?? '' }}" class="cover-img">
    @else
        <div class="cover-stage stage-{{ $kind }}">
            @switch($kind)
                @case('todzi')
                    <div class="radar" aria-hidden="true">
                        <i></i><i></i><i></i>
                        <b class="pin pin-a"></b>
                        <b class="pin pin-b"></b>
                        <b class="pin pin-c"></b>
                    </div>
                    <p class="stage-kicker">6.13° N · 1.22° E</p>
                    <p class="stage-title">{{ $title ?? 'TODZI' }}</p>
                    <div class="stage-chips">
                        <span>SOS</span>
                        <span>Heatmap</span>
                        <span>PWA</span>
                    </div>
                    @break

                @case('froid')
                    @if ($src)
                        <img src="{{ $src }}" alt="" class="stage-mark">
                    @endif
                    <p class="stage-kicker">Produit métier</p>
                    <p class="stage-title">{{ $title ?? 'Froid du Centre' }}</p>
                    <div class="stage-chips">
                        <span>Factures</span>
                        <span>Stock</span>
                        <span>Tâches</span>
                    </div>
                    @break

                @case('stock')
                    <div class="stage-boxes" aria-hidden="true">
                        <span></span><span></span><span></span>
                    </div>
                    <p class="stage-kicker">Spring Boot · MySQL</p>
                    <p class="stage-title">{{ $title ?? 'Stock' }}</p>
                    <div class="stage-chips">
                        <span>PDF</span>
                        <span>Repository</span>
                    </div>
                    @break

                @case('video')
                    <div class="film" aria-hidden="true">
                        <span></span><span></span><span></span><span></span>
                    </div>
                    <p class="stage-kicker">MERISE / UML</p>
                    <p class="stage-title">{{ $title ?? 'Vidéo club' }}</p>
                    <div class="stage-chips">
                        <span>Triggers</span>
                        <span>MySQL</span>
                    </div>
                    @break

                @case('edu')
                    <div class="edu-grid" aria-hidden="true">
                        <span></span><span></span><span></span><span></span>
                    </div>
                    <p class="stage-kicker">Hackathon</p>
                    <p class="stage-title">{{ $title ?? 'Edusphere' }}</p>
                    <div class="stage-chips">
                        <span>Éducation</span>
                    </div>
                    @break

                @case('chat')
                    <div class="bubbles" aria-hidden="true">
                        <span>Horaires du service ?</span>
                        <span class="me">Ouvert 8h–16h, bâtiment B.</span>
                    </div>
                    <p class="stage-kicker">ESGIS</p>
                    <p class="stage-title">{{ $title ?? 'Chatbot' }}</p>
                    @break

                @default
                    <p class="stage-title">{{ $title ?? 'Projet' }}</p>
            @endswitch
        </div>
    @endif
</div>
