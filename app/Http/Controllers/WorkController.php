<?php

namespace App\Http\Controllers;

use App\Support\Portfolio;
use Illuminate\View\View;

class WorkController extends Controller
{
    public function index(): View
    {
        return view('work.index', [
            'projects' => Portfolio::projects()->values(),
        ]);
    }

    public function show(string $slug): View
    {
        $project = Portfolio::find($slug);

        abort_if(! $project, 404);

        $projects = Portfolio::projects()->values();
        $index = $projects->search(fn (array $item) => $item['slug'] === $slug);

        return view('work.show', [
            'project' => $project,
            'previous' => $index > 0 ? $projects[$index - 1] : null,
            'next' => $index !== false && $index < $projects->count() - 1 ? $projects[$index + 1] : null,
            'others' => $projects
                ->where('slug', '!=', $slug)
                ->values()
                ->take(3),
        ]);
    }
}
