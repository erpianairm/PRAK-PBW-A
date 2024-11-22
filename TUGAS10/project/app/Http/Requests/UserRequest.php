<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=> ['required', 'min:3', 'max:255', 'string'],
            'email'=> ['required','email', \Illuminate\Validation\Rule::unique('users', 'email')->ignore($this->user?->id)],
            'password'=> ['required','min:8'],
        ];
    }
}