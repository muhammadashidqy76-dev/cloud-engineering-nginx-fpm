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
                'title' => 'Breeze vs Sanctum: Membedah State Cookie vs Stateless Token',
                'content' => 'Eksperimen membedah arsitektur otentikasi di Laravel. Membandingkan kapan harus memakai session-based cookie dengan Breeze untuk web monolith vs API token stateless dengan Sanctum untuk SPA/Mobile.',
                'tag' => LearningLogEntry::TAG_PRODUCTION_READY,
                'category' => LearningLogEntry::CATEGORY_LARAVEL,
                'related_project_id' => $headless?->id,
                'published_at' => '2026-06-15',
                'status' => 'published',
            ],
            [
                'title' => 'Penerapan Form Requests & API Resources untuk Clean Controller',
                'content' => 'Catatan mengenai pemisahan tanggung jawab (Separation of Concerns). Memindahkan validasi rumit ke Form Requests dan formatting payload JSON ke API Resources agar controller tetap ramping.',
                'tag' => LearningLogEntry::TAG_PRODUCTION_READY,
                'category' => LearningLogEntry::CATEGORY_LARAVEL,
                'related_project_id' => $cms?->id,
                'published_at' => '2026-08-25',
                'status' => 'published',
            ],
            // Track 2: Cloud Engineering & Infrastructure
            [
                'title' => 'Eksplorasi Redis Caching untuk API Rate Limiting & Session Store',
                'content' => 'Catatan pengujian latensi pemindahan driver session dan rate throttling dari MySQL ke Redis in-memory server lokal. Latensi throttling terpangkas dari 15ms menjadi kurang dari 2ms.',
                'tag' => LearningLogEntry::TAG_PRODUCTION_READY,
                'category' => LearningLogEntry::CATEGORY_CLOUD,
                'related_project_id' => $headless?->id,
                'published_at' => '2026-06-01',
                'status' => 'published',
            ],
            [
                'title' => 'Containerization PHP 8.3 & Nginx dengan Docker Multi-Stage Build',
                'content' => 'Bedah optimasi ukuran Docker image untuk Laravel. Memisahkan tahapan composer install dengan production image berbasis Alpine Linux, memangkas ukuran dari 800MB menjadi 135MB siap rilis.',
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
