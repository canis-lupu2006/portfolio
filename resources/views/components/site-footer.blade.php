<footer class="mt-24 border-t border-line">
    <div class="site-wrap flex flex-col gap-8 py-12 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="site-footer-name">{{ config('portfolio.last_name') }}</p>
            <p class="site-footer-given">{{ config('portfolio.given_names') }}</p>
            <p class="mt-3 max-w-sm text-sm text-mute">
                {{ config('portfolio.role') }} · {{ config('portfolio.location') }}
            </p>
        </div>
        <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm">
            <a href="mailto:{{ config('portfolio.email') }}" class="nav-link">E-mail</a>
            <a href="{{ config('portfolio.whatsapp') }}?text={{ rawurlencode(config('portfolio.whatsapp_text')) }}" class="nav-link" target="_blank" rel="noreferrer">WhatsApp</a>
            <a href="{{ config('portfolio.github') }}" class="nav-link" target="_blank" rel="noreferrer">GitHub</a>
            <a href="{{ config('portfolio.linkedin') }}" class="nav-link" target="_blank" rel="noreferrer">LinkedIn</a>
            <a href="{{ config('portfolio.cv') }}" class="nav-link" target="_blank" rel="noreferrer">CV</a>
            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
        </div>
    </div>
    <div class="site-wrap flex items-center justify-between border-t border-line py-6 text-xs text-mute">
        <p>© {{ now()->year }} {{ config('portfolio.name') }}</p>
        <p>Lomé</p>
    </div>
</footer>
