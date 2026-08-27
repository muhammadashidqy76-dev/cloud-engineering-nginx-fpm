<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JourneyEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'course_name' => ['required', 'string', 'max:255'],
            'source' => ['nullable', 'string', 'max:255'],
            'learned' => ['required', 'string'],
            'applied_project_id' => ['nullable', 'integer', 'exists:projects,id'],
            'result' => ['required', 'string'],
            'completed_at' => ['nullable', 'date'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'string', Rule::in(['draft', 'published'])],
        ];
    }
}
