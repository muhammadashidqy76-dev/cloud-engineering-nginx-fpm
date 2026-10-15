<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearningLogEntryRequest;
use App\Models\LearningLogEntry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LearningLogEntryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = LearningLogEntry::with('relatedProject');

        if ($request->filled('category')) {
            $query->where('category', $request->query('category'));
        }

        $entries = $query->latest('published_at')->get();

        return response()->json($entries);
    }

    public function store(LearningLogEntryRequest $request): JsonResponse
    {
        $entry = LearningLogEntry::create($request->validated());

        return response()->json([
            'message' => 'Learning log entry created successfully.',
            'data' => $entry->load('relatedProject'),
        ], 201);
    }

    public function show(LearningLogEntry $learningLogEntry): JsonResponse
    {
        return response()->json($learningLogEntry->load('relatedProject'));
    }

    public function update(LearningLogEntryRequest $request, LearningLogEntry $learningLogEntry): JsonResponse
    {
        $learningLogEntry->update($request->validated());

        return response()->json([
            'message' => 'Learning log entry updated successfully.',
            'data' => $learningLogEntry->load('relatedProject'),
        ]);
    }

    public function destroy(LearningLogEntry $learningLogEntry): JsonResponse
    {
        $learningLogEntry->delete();

        return response()->json([
            'message' => 'Learning log entry deleted successfully.',
        ]);
    }
}
