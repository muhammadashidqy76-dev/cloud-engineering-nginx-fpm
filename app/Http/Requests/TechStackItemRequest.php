<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechStackItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'max:255'],
            'category'      => ['required', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'status'        => ['required', 'string', 'in:not_started,in_progress,finished'],
        ];
    }
}
