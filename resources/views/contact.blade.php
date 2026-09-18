<x-layout title="Contact" description="Écrire à KONLANI Yentchabré Modeste.">
    <section class="site-wrap grid gap-14 pt-16 pb-24 md:grid-cols-12 md:pt-24">
        <div class="md:col-span-5" data-reveal>
            <p class="eyebrow">Contact</p>
            <h1 class="mt-3 font-display text-5xl font-extrabold tracking-tight md:text-6xl">Discutons.</h1>
            <p class="mt-6 max-w-sm leading-relaxed text-mute">
                Un projet, une question, une opportunité de stage. WhatsApp est le plus direct — sinon le formulaire, réponse sous 48h en général.
            </p>

            <div class="mt-8">
                <x-whatsapp label="Contacter par WhatsApp" />
            </div>

            <ul class="mt-10 space-y-5 text-sm">
                <li>
                    <p class="eyebrow">E-mail</p>
                    <a href="mailto:{{ config('portfolio.email') }}" class="mt-1 block">{{ config('portfolio.email') }}</a>
                </li>
                <li>
                    <p class="eyebrow">WhatsApp</p>
                    <a href="{{ config('portfolio.whatsapp') }}?text={{ rawurlencode(config('portfolio.whatsapp_text')) }}" class="mt-1 block" target="_blank" rel="noreferrer">{{ config('portfolio.phone') }}</a>
                </li>
                <li>
                    <p class="eyebrow">GitHub</p>
                    <a href="{{ config('portfolio.github') }}" class="mt-1 block" target="_blank" rel="noreferrer">{{ config('portfolio.github_handle') }}</a>
                </li>
                <li>
                    <p class="eyebrow">LinkedIn</p>
                    <a href="{{ config('portfolio.linkedin') }}" class="mt-1 block" target="_blank" rel="noreferrer">{{ config('portfolio.linkedin_handle') }}</a>
                </li>
                <li>
                    <p class="eyebrow">CV</p>
                    <a href="{{ config('portfolio.cv') }}" class="mt-1 block" target="_blank" rel="noreferrer">Télécharger le PDF</a>
                </li>
                <li>
                    <p class="eyebrow">Lieu</p>
                    <p class="mt-1">{{ config('portfolio.location') }}, {{ config('portfolio.country') }}</p>
                </li>
            </ul>
        </div>

        <div class="md:col-span-7" data-reveal>
            @if (session('status'))
                <p class="mb-6 rounded-2xl border border-line bg-night-2 px-5 py-4 text-sm text-copper">{{ session('status') }}</p>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="contact-form">
                @csrf
                <div class="grid gap-5 sm:grid-cols-2">
                    <label>
                        <span>Nom</span>
                        <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Votre nom">
                        @error('name') <em>{{ $message }}</em> @enderror
                    </label>
                    <label>
                        <span>E-mail</span>
                        <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="vous@exemple.com">
                        @error('email') <em>{{ $message }}</em> @enderror
                    </label>
                </div>
                <label>
                    <span>Sujet — optionnel</span>
                    <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Stage, collab, projet…">
                    @error('subject') <em>{{ $message }}</em> @enderror
                </label>
                <label>
                    <span>Message</span>
                    <textarea name="body" rows="7" required placeholder="Le contexte, le besoin, le délai — ce que vous voulez.">{{ old('body') }}</textarea>
                    @error('body') <em>{{ $message }}</em> @enderror
                </label>
                <button type="submit" class="btn-primary justify-self-start" data-magnetic>Envoyer</button>
            </form>
        </div>
    </section>
</x-layout>
