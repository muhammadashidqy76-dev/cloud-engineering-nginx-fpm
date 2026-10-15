<?php

namespace Database\Seeders;

use App\Models\LearningLogEntry;
use App\Models\Project;
use Illuminate\Database\Seeder;

class LearningLogEntrySeeder extends Seeder
{
    public function run(): void
    {
        $headless = Project::where('slug', 'ordersync-api-multi-channel-order-aggregator')->first();
        $cms = Project::where('slug', 'modular-portfolio-cms')->first();

        $entries = [
            // Track 1: Laravel Ecosystem & Architecture
            [
                'title' => 'Penerapan API Resources & Custom Form Requests',
                'content' => 'Praktik terbaik dalam memisahkan logika validasi input dengan Form Requests dan pemformatan output JSON dengan Eloquent API Resources untuk menjaga controller tetap clean dan scalable.',
                'tag' => LearningLogEntry::TAG_PRODUCTION_READY,
                'category' => LearningLogEntry::CATEGORY_LARAVEL,
                'related_project_id' => $headless?->id,
                'published_at' => '2026-06-15',
                'status' => 'published',
            ],
            [
                'title' => 'Eksplorasi Dynamic Component & Scope Query di Laravel Eloquent',
                'content' => 'Catatan mengenai efisiensi penulisan reusable query scopes seperti scopePublished() dan scopeOrderedByComplexity() agar pengambilan data di controller tetap expressive.',
                'tag' => LearningLogEntry::TAG_PRODUCTION_READY,
                'category' => LearningLogEntry::CATEGORY_LARAVEL,
                'related_project_id' => $cms?->id,
                'published_at' => '2026-08-25',
                'status' => 'published',
            ],
            // Track 2: Cloud Engineering & Infrastructure
            [
                'title' => 'Eksplorasi Redis Caching untuk API Rate Limiting & Session',
                'content' => 'Mengevaluasi latensi pemindahan session store dan rate limiting throttling dari database ke Redis standalone server. Latensi throttling turun dari 15ms menjadi < 2ms.',
                'tag' => LearningLogEntry::TAG_PRODUCTION_READY,
                'category' => LearningLogEntry::CATEGORY_CLOUD,
                'related_project_id' => $headless?->id,
                'published_at' => '2026-06-01',
                'status' => 'published',
            ],
            [
                'title' => 'Containerization PHP 8.3 & Nginx dengan Docker Multi-Stage',
                'content' => 'Eksplorasi optimasi container image Laravel menggunakan Docker multi-stage build dan Alpine Linux untuk memangkas ukuran image dari 800MB menjadi di bawah 140MB siap deploy.',
                'tag' => LearningLogEntry::TAG_EXPLORING,
                'category' => LearningLogEntry::CATEGORY_CLOUD,
                'related_project_id' => $cms?->id,
                'published_at' => '2026-09-02',
                'status' => 'published',
            ],
        ];

        foreach ($entries as $entryData) {
            LearningLogEntry::updateOrCreate(
                ['title' => $entryData['title']],
                $entryData
            );
        }
    }
}
