<x-mail::message>
Nouveau message depuis le portfolio.

**De :** {{ $contact->name }} ({{ $contact->email }})
**Sujet :** {{ $contact->subject ?: '—' }}

{{ $contact->body }}

Merci,<br>
{{ config('portfolio.name') }}
</x-mail::message>
