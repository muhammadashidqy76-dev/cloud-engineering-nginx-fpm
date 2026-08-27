<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $projects = Project::with('techStackItems')
            ->orderedByComplexity()
            ->get();

        return response()->json($projects);
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $project = Project::create($validated);

        if (isset($validated['tech_stack_items'])) {
            $project->techStackItems()->sync($validated['tech_stack_items']);
        }

        return response()->json([
            'message' => 'Project created successfully.',
            'data' => $project->load('techStackItems'),
        ], 201);
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project->load('techStackItems', 'journeyEntries', 'learningLogEntries'));
    }

    public function update(ProjectRequest $request, Project $project): JsonResponse
    {
        $validated = $request->validated();

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $project->update($validated);

        if (isset($validated['tech_stack_items'])) {
            $project->techStackItems()->sync($validated['tech_stack_items']);
        }

        return response()->json([
            'message' => 'Project updated successfully.',
            'data' => $project->load('techStackItems'),
        ]);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully.',
        ]);
    }
}
