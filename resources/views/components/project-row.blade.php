@props(['project', 'index' => 1])

<a href="{{ route('work.show', $project['slug']) }}" class="project-row group">
    <span class="project-index">{{ str_pad((string) $index, 2, '0', STR_PAD_LEFT) }}</span>
    <span class="min-w-0">
        <span class="block font-display text-2xl leading-tight md:text-3xl">{{ $project['title'] }}</span>
        <span class="mt-1 block text-sm text-ink-soft md:hidden">{{ $project['kicker'] }}</span>
    </span>
    <span class="hidden text-sm text-ink-soft md:block">{{ $project['kicker'] }}</span>
    <span class="hidden text-sm text-ink-soft lg:block">{{ implode(' · ', array_slice($project['stack'], 0, 3)) }}</span>
    <span class="project-year">{{ $project['year'] }}</span>
    <span class="project-arrow" aria-hidden="true">→</span>
</a>
