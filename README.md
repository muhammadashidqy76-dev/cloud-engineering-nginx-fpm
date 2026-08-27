# [ashidqy.backend.dev] — Portfolio & Web CV

> Portfolio interaktif yang juga berfungsi sebagai CV — dibangun dengan Laravel untuk
> menunjukkan kemampuan backend development secara langsung, bukan cuma diceritakan.

<!-- Ganti placeholder di bawah begitu deploy pertama selesai -->
🔗 **Live demo:** [link akan ditambahkan setelah deploy]
📄 **CV PDF:** [opsional, kalau mau sediakan versi unduh]

## Kenapa Proyek Ini Dibuat
Saya self-taught backend developer, fresh graduate, fokus di **Laravel**. Alih-alih
CV statis, saya bangun portfolio ini sebagai CMS ringan — jadi proyek ini sendiri
sudah jadi bukti kemampuan: modeling data, arsitektur backend, dan kemampuan
menyelesaikan sesuatu sampai production-ready.

## Yang Bisa Dilihat di Sini
- **Featured Projects** — 3 proyek berurutan dari kompleksitas rendah ke tinggi
  (E-Commerce → API-only/Headless Backend → CMS), masing-masing dengan problem
  statement, keputusan arsitektur, dan impact metric.
- **Tech Stack** — dikelompokkan per kategori.
- **Journey** — timeline pembelajaran self-directed, tiap entry mengikuti pola
  *learned → applied → result*, bukan sekadar daftar sertifikat.
- **Learning Log** — catatan skill yang sedang/sudah dikuasai.

## Tech Stack Proyek Ini Sendiri
- Laravel
- Laravel Breeze (auth)
- (lengkapi setelah stack final: DB, frontend stack, hosting)

## Setup Lokal
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
```

## Proses Pengembangan (Transparan)
Proyek ini dibangun dengan bantuan AI coding agent (Antigravity), dan dokumentasi
prosesnya disimpan terbuka:
- [`AGENTS.md`](./AGENTS.md) — konteks & aturan yang dipakai agent
- [`docs/decisions/`](./docs/decisions/) — alasan di balik keputusan teknis besar
- [`docs/CHALLENGES.md`](./docs/CHALLENGES.md) — catatan proses debugging & pembelajaran
- [`CHANGELOG.md`](./CHANGELOG.md) — riwayat perubahan