@props(['project'])

<a href="{{ route('work.show', $project['slug']) }}" class="project-card" data-tilt>
    <x-cover :kind="$project['cover']" :slug="$project['slug']" :title="$project['title']" :image="$project['image'] ?? null" />
    <div class="project-card-body">
        <p class="eyebrow">{{ $project['kicker'] }} · {{ $project['year'] }}</p>
        <h3>{{ $project['title'] }}</h3>
        <p>{{ $project['summary'] }}</p>
    </div>
</a>
