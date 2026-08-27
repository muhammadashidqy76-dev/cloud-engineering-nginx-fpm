<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechStackItemRequest;
use App\Models\TechStackItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TechStackItemController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $items = TechStackItem::orderBy('category')
            ->orderBy('display_order')
            ->get();

        return response()->json($items);
    }

    public function store(TechStackItemRequest $request): JsonResponse
    {
        $item = TechStackItem::create($request->validated());

        return response()->json([
            'message' => 'Tech stack item created successfully.',
            'data' => $item,
        ], 201);
    }

    public function show(TechStackItem $techStackItem): JsonResponse
    {
        return response()->json($techStackItem->load('projects'));
    }

    public function update(TechStackItemRequest $request, TechStackItem $techStackItem): JsonResponse
    {
        $techStackItem->update($request->validated());

        return response()->json([
            'message' => 'Tech stack item updated successfully.',
            'data' => $techStackItem,
        ]);
    }

    public function destroy(TechStackItem $techStackItem): JsonResponse
    {
        $techStackItem->delete();

        return response()->json([
            'message' => 'Tech stack item deleted successfully.',
        ]);
    }
}
