<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'StockGuard — E-Commerce Checkout Engine',
                'slug' => 'stockguard-ecommerce-checkout-engine',
                'complexity_order' => 1,
                'problem_statement' => 'Mengatasi masalah race condition pada stok produk saat lonjakan checkout simultan (promo/flash sale) yang berpotensi menyebabkan overselling (stok minus) akibat transaksi membaca stok secara bersamaan sebelum pembaruan database.',
                'architecture_decision_summary' => "1. Pessimistic Locking & Database Transactions: Mengombinasikan DB::transaction() dengan lockForUpdate() pada baris stok produk untuk menjamin eksklusivitas pembaruan stok.\n2. Async Job Processing: Memanfaatkan Laravel Queue berbasis Redis untuk mengalihkan proses I/O berat (invoice & email konfirmasi) dari request cycle utama.\n3. Service Layer Pattern: Enkapsulasi logika bisnis checkout terpisah dari Controller untuk reusability dan kemudahan unit testing.",
                'impact_metric' => '300+ checkout simultan tanpa overselling, response time <150ms',
                'preview_image_path' => 'https://placehold.co/800x450/0f0f23/6366f1?text=StockGuard+Dashboard',
                'status' => 'published',
            ],
            [
                'title' => 'OrderSync API — Multi-Channel Order Aggregator',
                'slug' => 'ordersync-api-multi-channel-order-aggregator',
                'complexity_order' => 2,
                'problem_statement' => 'Menyatukan data pesanan dari beberapa channel penjualan (marketplace, POS, website) ke dalam satu sumber data terpusat tanpa duplikasi atau konflik status order.',
                'architecture_decision_summary' => "1. Laravel API Resource untuk menjaga konsistensi struktur JSON response ke semua consumer.\n2. Sanctum token-based authentication untuk otorisasi akses tiap channel/client.",
                'impact_metric' => 'Menyatukan 3 channel penjualan ke 1 API terpusat, response time rata-rata <200ms',
                'preview_image_path' => null,
                'status' => 'published',
            ],
            [
                'title' => 'Modular Portfolio CMS & Learning Tracker',
                'slug' => 'modular-portfolio-cms',
                'complexity_order' => 3,
                'problem_statement' => 'Merancang sistem CMS khusus portfolio dev yang memungkinkan pembaruan konten dinamis (Projects, Tech Stack, Journey Timeline, dan Learning Log) tanpa hardcode view.',
                'architecture_decision_summary' => 'Menerapkan Laravel Breeze auth scaffolding, relasi Eloquent yang ketat (foreign key constraint & cascade rules), serta scope query khusus untuk publikasi konten.',
                'impact_metric' => 'Memangkas waktu publikasi update portfolio dari 30 menit (manual code edit) menjadi kurang dari 2 menit via dashboard CMS.',
                'preview_image_path' => 'projects/portfolio-cms.jpg',
                'status' => 'published',
            ],
        ];

        foreach ($projects as $projectData) {
            Project::updateOrCreate(
                ['slug' => $projectData['slug']],
                $projectData
            );
        }
    }
}
