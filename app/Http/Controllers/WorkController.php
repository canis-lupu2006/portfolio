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

        $others = Portfolio::projects()
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values();

        return view('work.show', [
            'project' => $project,
            'others' => $others,
        ]);
    }
}
