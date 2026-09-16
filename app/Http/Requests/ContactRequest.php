<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'subject' => ['nullable', 'string', 'max:180'],
            'body' => ['required', 'string', 'min:10', 'max:4000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nom',
            'email' => 'e-mail',
            'subject' => 'sujet',
            'body' => 'message',
        ];
    }
}
