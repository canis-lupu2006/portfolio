<?php

namespace App\Http\Controllers;

use App\Support\Portfolio;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'featured' => Portfolio::featured(),
            'rest' => Portfolio::projects()->where('featured', false)->values(),
        ]);
    }
}
