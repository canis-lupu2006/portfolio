<x-layout>
    <section class="site-wrap grid items-center gap-10 pt-10 pb-10 md:grid-cols-12 md:pt-14 md:pb-12">
        <div class="md:col-span-6" data-reveal>
            <div class="hero-identity">
                <img
                    class="hero-photo"
                    src="{{ config('portfolio.photo') }}"
                    alt="Portrait de {{ config('portfolio.name') }}"
                    width="88"
                    height="88"
                >
                <p class="status-pill"><i></i> Disponible · Lomé</p>
            </div>
            <h1 class="hero-title mt-5">
                <span class="hero-family">{{ config('portfolio.last_name') }}</span>
                <span class="hero-given">{{ config('portfolio.given_names') }}</span>
            </h1>
            <p class="hero-lead">{{ config('portfolio.tagline') }}</p>
            <p class="hero-meta">{{ config('portfolio.role') }} · {{ config('portfolio.location') }}</p>
            <div class="mt-5 flex flex-wrap gap-3">
                <a href="{{ route('work.index') }}" class="btn-primary" data-magnetic>Voir les projets</a>
                <a href="{{ route('contact') }}" class="btn-ghost" data-magnetic>Me écrire</a>
            </div>
        </div>

        <div class="md:col-span-6" data-reveal>
            <div class="hero-stack">
                @foreach ($featured as $card)
                    <a href="{{ route('work.show', $card['slug']) }}" class="hero-stack-card">
                        <x-cover :kind="$card['cover']" :slug="$card['slug']" :title="$card['title']" :kicker="$card['kicker']" :image="$card['image'] ?? null" />
                    </a>
                @endforeach
            </div>
            <p class="hero-stack-caption">Sélection — {{ $featured->pluck('title')->implode(' · ') }}</p>
        </div>
    </section>

    <section class="site-wrap pb-10">
        <div class="stat-row" data-reveal>
            @foreach (config('portfolio.stats') as $stat)
                <div>
                    <b @unless($stat['static'] ?? false) data-count="{{ $stat['value'] }}" @endunless>{{ $stat['static'] ?? false ? $stat['value'] : '0' }}{{ $stat['suffix'] }}</b>
                    <span>{{ $stat['label'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="marquee-wrap" aria-hidden="true">
        <div class="marquee">
            @foreach ([...config('portfolio.skills'), ...config('portfolio.skills')] as $skill)
                <span>{{ $skill }}</span>
            @endforeach
        </div>
    </section>

    <section class="site-wrap py-20 md:py-28">
        <div class="mb-8 flex items-end justify-between gap-6" data-reveal>
            <div>
                <p class="eyebrow">Sélection</p>
                <h2 class="mt-3 font-display text-4xl font-bold tracking-tight md:text-5xl">Projets récents</h2>
                <p class="mt-3 max-w-md text-mute">Trois pièces pour comprendre le terrain : urgence urbaine, outil métier, analytics.</p>
            </div>
            <a href="{{ route('work.index') }}" class="nav-link hidden sm:inline">Tout voir</a>
        </div>

        @foreach ($featured as $index => $project)
            <article class="feature-row {{ $index % 2 === 1 ? 'is-flip' : '' }}" data-reveal>
                <a href="{{ route('work.show', $project['slug']) }}" class="feature-visual">
                    <span class="feature-index">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <x-cover :kind="$project['cover']" :slug="$project['slug']" :title="$project['title']" :kicker="$project['kicker']" :image="$project['image'] ?? null" />
                </a>
                <div>
                    <p class="eyebrow">{{ $project['kicker'] }} · {{ $project['year'] }}</p>
                    <h3 class="mt-4 font-display text-4xl font-bold tracking-tight">{{ $project['title'] }}</h3>
                    <p class="mt-4 max-w-md leading-relaxed text-mute">{{ $project['summary'] }}</p>
                    <p class="feature-role">Rôle — {{ $project['role'] }}</p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach ($project['stack'] as $item)
                            <span class="chip">{{ $item }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('work.show', $project['slug']) }}" class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-copper">
                        Lire le projet <span aria-hidden="true">→</span>
                    </a>
                </div>
            </article>
        @endforeach

        @if ($rest->isNotEmpty())
            <div class="also-list" data-reveal>
                <p class="eyebrow mb-4">Autres projets</p>
                @foreach ($rest as $project)
                    <a href="{{ route('work.show', $project['slug']) }}" class="also-row">
                        <span>{{ $project['title'] }}</span>
                        <span>{{ $project['kicker'] }}</span>
                        <span>{{ $project['year'] }}</span>
                        <span aria-hidden="true">→</span>
                    </a>
                @endforeach
            </div>
        @endif
    </section>

    <section class="site-wrap pb-20 md:pb-28">
        <div class="grid gap-12 md:grid-cols-12" data-reveal>
            <div class="md:col-span-5">
                <p class="eyebrow">Méthode</p>
                <h2 class="mt-3 font-display text-4xl font-bold tracking-tight">Du besoin au produit qui tourne.</h2>
                <p class="mt-4 max-w-sm text-mute">Trois gestes que je répète, que ce soit un outil interne ou un hackathon de 48 heures.</p>
            </div>
            <div class="md:col-span-7">
                <div class="timeline">
                    <div class="timeline-item">
                        <p class="eyebrow">01</p>
                        <div>
                            <h3 class="font-display text-2xl font-bold">Construire</h3>
                            <p class="mt-2 text-mute">Factures, stock, tâches — des apps métier pour des entreprises de Lomé.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <p class="eyebrow">02</p>
                        <div>
                            <h3 class="font-display text-2xl font-bold">Expérimenter</h3>
                            <p class="mt-2 text-mute">Hackathons, cartes temps réel, analytics — livrer sous pression, sans bricolage.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <p class="eyebrow">03</p>
                        <div>
                            <h3 class="font-display text-2xl font-bold">Déployer</h3>
                            <p class="mt-2 text-mute">Jenkins, GitHub, backends Java / Laravel — une chaîne qui tient toute seule.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-wrap pb-24">
        <div class="cta-band text-center" data-reveal>
            <p class="eyebrow relative">Contact</p>
            <h2 class="relative mx-auto mt-4 max-w-2xl font-display text-4xl font-bold tracking-tight md:text-5xl">
                Un projet. Un stage.<br>Une conversation sérieuse.
            </h2>
            <p class="relative mx-auto mt-4 max-w-md text-mute">Agoè-Zossimé, Lomé — ouvert aux collabs et aux opportunités. Réponse sous 48h en général.</p>
            <div class="relative mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('contact') }}" class="btn-primary" data-magnetic>Écrire un message</a>
                <a href="mailto:{{ config('portfolio.email') }}" class="btn-ghost" data-magnetic>{{ config('portfolio.email') }}</a>
            </div>
        </div>
    </section>
</x-layout>
