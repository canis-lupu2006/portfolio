<x-layout title="Projets" description="Projets de KONLANI Yentchabré Modeste — applications métier, hackathons, CI/CD.">
    <section class="site-wrap pt-16 pb-10 md:pt-24" data-reveal>
        <p class="eyebrow">Index</p>
        <div class="mt-4 flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <h1 class="font-display text-5xl font-extrabold tracking-tight md:text-6xl">Projets</h1>
            <p class="max-w-md text-mute">{{ count($projects) }} projets — du produit métier au hackathon, toujours avec un usage réel au bout.</p>
        </div>
    </section>

    <section class="site-wrap work-board pb-24" data-work-board>
        <div class="work-list">
            @foreach ($projects as $index => $project)
                <a
                    href="{{ route('work.show', $project['slug']) }}"
                    class="work-row {{ $index === 0 ? 'is-active' : '' }}"
                    data-preview="{{ $project['slug'] }}"
                >
                    <span class="work-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="min-w-0">
                        <span class="block font-display text-2xl font-bold leading-tight">{{ $project['title'] }}</span>
                        <span class="mt-1 block text-sm text-mute">{{ $project['kicker'] }}</span>
                        <span class="work-blurb">{{ $project['summary'] }}</span>
                    </span>
                    <span class="hidden text-sm text-mute lg:block">{{ implode(' · ', array_slice($project['stack'], 0, 3)) }}</span>
                    <span class="text-sm text-mute">{{ $project['year'] }}</span>
                    <span class="work-arrow" aria-hidden="true">→</span>
                </a>
            @endforeach
        </div>

        <div class="work-preview">
            @foreach ($projects as $index => $project)
                <div class="work-preview-item {{ $index === 0 ? 'is-active' : '' }}" data-preview-item="{{ $project['slug'] }}">
                    <x-cover :kind="$project['cover']" :slug="$project['slug']" :title="$project['title']" :kicker="$project['kicker']" :image="$project['image'] ?? null" large />
                    <p class="mt-4 text-sm leading-relaxed text-mute">{{ $project['summary'] }}</p>
                    <p class="mt-2 text-sm font-medium text-copper">Rôle — {{ $project['role'] }}</p>
                    <a href="{{ route('work.show', $project['slug']) }}" class="work-preview-cta">Ouvrir le projet <span aria-hidden="true">→</span></a>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
