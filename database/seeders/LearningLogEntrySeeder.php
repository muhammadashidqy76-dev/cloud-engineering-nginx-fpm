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
            [
                'title' => 'Eksplorasi Redis Caching untuk API Rate Limiting',
                'content' => 'Mencoba memindahkan session dan rate limiting throttling dari database/file driver ke Redis server lokal. Hasilnya latensi throttling turun dari 15ms menjadi < 2ms.',
                'tag' => LearningLogEntry::TAG_EXPLORING,
                'related_project_id' => $headless?->id,
                'published_at' => '2026-06-01',
                'status' => 'published',
            ],
            [
                'title' => 'Penerapan API Resources & Custom Form Requests',
                'content' => 'Praktik terbaik dalam memisahkan logika validasi input dengan Form Requests dan pemformatan output JSON dengan Eloquent API Resources untuk menjaga controller tetap clean.',
                'tag' => LearningLogEntry::TAG_PRODUCTION_READY,
                'related_project_id' => $headless?->id,
                'published_at' => '2026-06-15',
                'status' => 'published',
            ],
            [
                'title' => 'Eksplorasi Dynamic Component & Scope Query di Laravel Eloquent',
                'content' => 'Catatan mengenai efisiensi penulisan scope query seperti scopePublished() dan scopeOrderedByComplexity() agar kode pengambilan data di controller tetap expressive.',
                'tag' => LearningLogEntry::TAG_PRODUCTION_READY,
                'related_project_id' => $cms?->id,
                'published_at' => '2026-08-25',
                'status' => 'published',
            ],
        ];

        foreach ($entries as $entryData) {
            LearningLogEntry::create($entryData);
        }
    }
}
