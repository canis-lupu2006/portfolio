<x-layout :title="$project['title']" :description="$project['summary']">
    <article class="site-wrap pt-16 pb-24 md:pt-24">
        <p class="eyebrow" data-reveal>
            <a href="{{ route('work.index') }}">Projets</a>
            <span class="mx-2 text-mute">/</span>
            {{ $project['kicker'] }} · {{ $project['year'] }}
        </p>
        <h1 class="mt-4 max-w-3xl font-display text-5xl font-extrabold tracking-tight md:text-6xl" data-reveal>{{ $project['title'] }}</h1>
        <p class="mt-5 max-w-2xl text-lg leading-relaxed text-mute" data-reveal>{{ $project['description'] }}</p>

        @if (! empty($project['highlights']))
            <div class="meta-grid mt-10" data-reveal>
                @foreach ($project['highlights'] as $item)
                    <div>
                        <p class="eyebrow">{{ $item['label'] }}</p>
                        <p class="mt-2 font-medium">{{ $item['value'] }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-10" data-reveal>
            <x-cover :kind="$project['cover']" :slug="$project['slug']" :title="$project['title']" :kicker="$project['kicker']" :image="$project['image'] ?? null" large eager />
        </div>

        <div class="mt-14 grid gap-12 md:grid-cols-12">
            <div class="md:col-span-4" data-reveal>
                <div class="sticky top-24 space-y-8 panel">
                    <div>
                        <p class="eyebrow">Rôle</p>
                        <p class="mt-3">{{ $project['role'] }}</p>
                    </div>
                    <div>
                        <p class="eyebrow">Stack</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach ($project['stack'] as $item)
                                <span class="chip">{{ $item }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <p class="eyebrow">Année</p>
                        <p class="mt-3">{{ $project['year'] }}</p>
                    </div>
                    @if ($project['private'])
                        <div>
                            <p class="eyebrow">Accès</p>
                            <p class="mt-3 text-sm text-mute">Repository privé — disponible sur demande.</p>
                        </div>
                    @endif
                    @if (count($project['links']))
                        <div class="flex flex-col gap-2">
                            @foreach ($project['links'] as $link)
                                <a href="{{ $link['url'] }}" class="btn-ghost justify-between" target="_blank" rel="noreferrer">
                                    {{ $link['label'] }}
                                    <span aria-hidden="true">↗</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="md:col-span-8 space-y-6 text-lg leading-relaxed text-mute" data-reveal>
                @foreach ($project['body'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>

        <nav class="project-pager" aria-label="Parcourir les projets" data-reveal>
            @if ($previous)
                <a href="{{ route('work.show', $previous['slug']) }}" class="is-prev">
                    <span class="eyebrow">Précédent</span>
                    <strong>{{ $previous['title'] }}</strong>
                    <span>{{ $previous['kicker'] }}</span>
                </a>
            @else
                <span></span>
            @endif
            @if ($next)
                <a href="{{ route('work.show', $next['slug']) }}" class="is-next">
                    <span class="eyebrow">Suivant</span>
                    <strong>{{ $next['title'] }}</strong>
                    <span>{{ $next['kicker'] }}</span>
                </a>
            @endif
        </nav>
    </article>

    @if ($others->isNotEmpty())
        <section class="site-wrap pb-24">
            <p class="eyebrow mb-6">À suivre</p>
            <div class="grid items-stretch gap-5 md:grid-cols-3">
                @foreach ($others as $item)
                    <div data-reveal>
                        <x-project-card :project="$item" />
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</x-layout>
