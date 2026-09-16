<?php

namespace App\Support;

use Illuminate\Support\Collection;

class Portfolio
{
    public static function get(string $key, mixed $default = null): mixed
    {
        return config("portfolio.{$key}", $default);
    }

    public static function projects(): Collection
    {
        return collect(config('portfolio.projects', []));
    }

    public static function featured(): Collection
    {
        return static::projects()->where('featured', true)->values();
    }

    public static function find(string $slug): ?array
    {
        return static::projects()->firstWhere('slug', $slug);
    }
}
