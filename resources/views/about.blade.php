<x-layout title="À propos" description="KONLANI Yentchabré Modeste, développeur fullstack à Lomé — ESGIS-Togo.">
    <section class="site-wrap pt-16 pb-12 md:pt-24" data-reveal>
        <p class="eyebrow">Profil</p>
        <h1 class="mt-3 font-display text-5xl font-extrabold tracking-tight md:text-6xl">À propos</h1>
        <p class="mt-5 max-w-lg text-lg text-mute">Qui je suis, ce que je construis, comment j’ai appris — à Lomé.</p>
    </section>

    <section class="site-wrap grid gap-12 pb-16 md:grid-cols-12">
        <div class="md:col-span-5" data-reveal>
            <div class="id-card">
                <div class="id-photo">
                    <img src="{{ config('portfolio.photo') }}" alt="Portrait de {{ config('portfolio.name') }}">
                </div>
                <div class="id-card-body">
                    <p class="font-display text-3xl font-bold tracking-tight">{{ config('portfolio.last_name') }}</p>
                    <p class="mt-1 font-serif text-xl italic">{{ config('portfolio.given_names') }}</p>
                    <p class="mt-2 text-mute">{{ config('portfolio.role') }}</p>
                    <p class="mt-5 text-sm text-mute">Licence IRT · ESGIS-Togo</p>
                    <p class="text-sm text-mute">{{ config('portfolio.location') }}</p>
                    <p class="id-now mt-5"><i></i> Ouvert au stage et aux collabs</p>
                </div>
            </div>
        </div>
        <div class="md:col-span-7 max-w-xl space-y-5 text-lg leading-relaxed text-mute" data-reveal>
            @foreach (config('portfolio.bio') as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
            <div class="flex flex-wrap gap-3 pt-4">
                <a href="{{ config('portfolio.cv') }}" class="btn-primary" data-magnetic target="_blank" rel="noreferrer">Télécharger le CV</a>
                <a href="{{ config('portfolio.github') }}" class="btn-ghost" data-magnetic target="_blank" rel="noreferrer">GitHub</a>
                <a href="{{ config('portfolio.linkedin') }}" class="btn-ghost" data-magnetic target="_blank" rel="noreferrer">LinkedIn</a>
                <x-whatsapp class="btn-whatsapp--ghost" />
            </div>
        </div>
    </section>

    <section class="site-wrap pb-16">
        <div class="stat-row" data-reveal>
            @foreach (config('portfolio.stats') as $stat)
                <div>
                    <b>{{ $stat['value'] }}{{ $stat['suffix'] }}</b>
                    <span>{{ $stat['label'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="site-wrap pb-16">
        <p class="eyebrow mb-5">Ce que je touche</p>
        <div class="grid gap-5 md:grid-cols-3">
            @foreach (config('portfolio.stack_groups') as $group)
                <div class="panel" data-reveal>
                    <p class="eyebrow">{{ $group['label'] }}</p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach ($group['items'] as $item)
                            <span class="chip">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="site-wrap grid gap-12 py-8 md:grid-cols-12">
        <div class="md:col-span-5" data-reveal>
            <p class="eyebrow">Formation</p>
            <h2 class="mt-3 font-display text-4xl font-bold tracking-tight">Parcours</h2>
            <p class="mt-4 max-w-sm text-mute">Licence en cours, bac scientifique avant ça — le fil reste le même : comprendre un système, puis le faire marcher.</p>
        </div>
        <div class="md:col-span-7" data-reveal>
            <ul class="overflow-hidden rounded-3xl border border-line">
                @foreach (config('portfolio.education') as $item)
                    <li class="grid gap-2 border-b border-line px-5 py-6 last:border-0 sm:grid-cols-[8.5rem_1fr]">
                        <p class="text-sm text-copper">{{ $item['period'] }}</p>
                        <div>
                            <p class="font-medium">{{ $item['title'] }}</p>
                            <p class="text-mute">{{ $item['place'] }}</p>
                            <p class="mt-1 text-sm text-mute">{{ $item['detail'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="site-wrap pb-24 pt-10">
        <p class="eyebrow">Langues</p>
        <div class="mt-6 grid gap-4 sm:grid-cols-3">
            @foreach (config('portfolio.languages') as $language)
                <div class="panel" data-reveal>
                    <p class="font-display text-2xl font-bold">{{ $language['name'] }}</p>
                    <p class="mt-2 text-sm text-mute">{{ $language['level'] }}</p>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
