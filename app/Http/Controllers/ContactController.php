<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactReceived;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contact');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $message = Message::query()->create($request->validated());

        Mail::to(config('portfolio.email'))->send(new ContactReceived($message));

        return back()->with('status', 'Message bien reçu. Je te réponds dès que possible.');
    }
}
