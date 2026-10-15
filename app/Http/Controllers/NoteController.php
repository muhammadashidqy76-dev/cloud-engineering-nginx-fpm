<?php

namespace App\Http\Controllers;

use App\Models\LearningLogEntry;
use Illuminate\View\View;

class NoteController extends Controller
{
    /**
     * Show the public detail page for a single Learning Log entry.
     * Route: GET /notes/{entry:slug}
     */
    public function show(LearningLogEntry $entry): View
    {
        // Only published entries are accessible publicly
        abort_if($entry->status !== 'published', 404);

        // Adjacent entries for prev/next navigation (same category, published)
        $prevEntry = LearningLogEntry::published()
            ->where('category', $entry->category)
            ->where('published_at', '<', $entry->published_at)
            ->orderBy('published_at', 'desc')
            ->first(['id', 'title', 'slug', 'category']);

        $nextEntry = LearningLogEntry::published()
            ->where('category', $entry->category)
            ->where('published_at', '>', $entry->published_at)
            ->orderBy('published_at', 'asc')
            ->first(['id', 'title', 'slug', 'category']);

        return view('notes.show', compact('entry', 'prevEntry', 'nextEntry'));
    }
}
