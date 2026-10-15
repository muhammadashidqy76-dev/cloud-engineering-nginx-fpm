<?php

namespace App\Http\Requests;

use App\Models\LearningLogEntry;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LearningLogEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'tag' => [
                'required',
                'string',
                Rule::in([
                    LearningLogEntry::TAG_EXPLORING,
                    LearningLogEntry::TAG_PRODUCTION_READY,
                ]),
            ],
            'category' => [
                'required',
                'string',
                Rule::in([
                    LearningLogEntry::CATEGORY_LARAVEL,
                    LearningLogEntry::CATEGORY_CLOUD,
                ]),
            ],
            'related_project_id' => ['nullable', 'integer', 'exists:projects,id'],
            'published_at' => ['nullable', 'date'],
            'status' => ['required', 'string', Rule::in(['draft', 'published'])],
        ];
    }
}
