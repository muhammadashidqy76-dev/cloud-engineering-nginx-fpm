<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $projectId = $this->route('project')?->id ?? $this->route('project');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('projects', 'slug')->ignore($projectId)],
            'complexity_order' => ['required', 'integer', 'min:1', 'max:255'],
            'problem_statement' => ['required', 'string'],
            'architecture_decision_summary' => ['nullable', 'string'],
            'impact_metric' => ['nullable', 'string', 'max:255'],
            'preview_image_path' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', Rule::in(['draft', 'published'])],
            'tech_stack_items' => ['nullable', 'array'],
            'tech_stack_items.*' => ['integer', 'exists:tech_stack_items,id'],
        ];
    }
}
