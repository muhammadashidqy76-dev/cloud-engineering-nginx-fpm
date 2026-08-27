<?php

namespace App\Http\Controllers;

use App\Http\Requests\JourneyEntryRequest;
use App\Models\JourneyEntry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JourneyEntryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $entries = JourneyEntry::with('appliedProject')
            ->chronological()
            ->get();

        return response()->json($entries);
    }

    public function store(JourneyEntryRequest $request): JsonResponse
    {
        $entry = JourneyEntry::create($request->validated());

        return response()->json([
            'message' => 'Journey entry created successfully.',
            'data' => $entry->load('appliedProject'),
        ], 201);
    }

    public function show(JourneyEntry $journeyEntry): JsonResponse
    {
        return response()->json($journeyEntry->load('appliedProject'));
    }

    public function update(JourneyEntryRequest $request, JourneyEntry $journeyEntry): JsonResponse
    {
        $journeyEntry->update($request->validated());

        return response()->json([
            'message' => 'Journey entry updated successfully.',
            'data' => $journeyEntry->load('appliedProject'),
        ]);
    }

    public function destroy(JourneyEntry $journeyEntry): JsonResponse
    {
        $journeyEntry->delete();

        return response()->json([
            'message' => 'Journey entry deleted successfully.',
        ]);
    }
}
