# AGENTS.md

## Tentang Proyek Ini
Portfolio website milik Azure — self-taught backend developer, fresh graduate, dengan
positioning spesifik sebagai **Laravel Backend Developer**. Website ini sekaligus
berfungsi sebagai CMS ringan sehingga kontennya bisa terus di-update seiring skill
Azure berkembang.

Tujuan utama: recruiter yang scanning cepat harus langsung menangkap identitas
profesional, skill yang applicable, dan bukti hasil kerja nyata — walau tanpa
pengalaman kerja formal.

## Status Setup
- Laravel sudah di-install, `php artisan key:generate` sudah dijalankan.
- Laravel Breeze sudah di-install (auth scaffolding).
- Belum ada fitur CMS/konten yang dibangun — masih tahap fondasi.

## Tech Stack
- Backend: Laravel
- Auth/scaffolding: Laravel Breeze
- (Lengkapi begitu stack final: DB, frontend stack dari Breeze — Blade/Livewire/React/Vue,
  hosting, dll)

## Struktur Konten (konteks penting untuk fitur apapun yang dikerjakan agent)
0. **Hero Section** (Beranda) — terletak tepat di bawah Navbar. Memperkenalkan identitas spesifik Azure sebagai **Laravel Backend Developer** (headline, positioning summary, bio singkat berbentuk code block, tombol Call-to-Action ke Featured Projects / Resume / Contact, serta social links). Section ini bersifat **STATIS** dan di-hardcode langsung di Blade — TIDAK memerlukan model/migration seperti section konten lainnya.
1. **Featured Projects** (prioritas utama) — 3 project berurutan dari kompleksitas
   rendah ke tinggi: E-Commerce site → API-only/Headless Backend → CMS. Tiap project
   punya preview visual, problem statement, keputusan arsitektur, badge tech stack,
   metrik impact.
2. **Tech Stack** (prioritas utama) — dikelompokkan per kategori, bukan icon cloud.
3. **[Section primer ketiga — TBD, lengkapi setelah difinalisasi]**
4. **Journey/Background** (secondary, collapsible default) — pengganti "Experience".
   Timeline self-directed learning, tiap entry course mengikuti narasi:
   **learned → applied → result**, terhubung ke salah satu Featured Project.
5. **Learning Log** (secondary, collapsible default) — entry gaya blog, tag
   "Exploring" atau "Production-Ready".

## Bagaimana Konteks Ini Diatur di Antigravity
Proyek ini pakai 3 layer customization Antigravity, jangan tumpang tindih:
- **`.agents/rules/`** — aturan yang HARUS selalu berlaku (coding convention, struktur
  data CMS). Diaktifkan sebagai **Always On** lewat Customizations panel di IDE.
- **`.agents/skills/`** — knowledge spesifik yang di-load hanya kalau relevan
  (misalnya menulis narasi Journey/Learning Log). Auto-trigger berdasarkan `description`.
- **`docs/decisions/`** dan **`docs/CHALLENGES.md`** — dokumentasi yang ditulis
  manual/dibantu agent per fitur besar atau saat stuck, bukan bagian dari context
  loading otomatis, tapi jadi bahan mentah untuk konten portfolio (Journey/Learning Log).

## Deny Rules
- Jangan ubah urutan prioritas section (Featured Projects & Tech Stack di atas Journey
  & Learning Log) tanpa konfirmasi eksplisit.
- Jangan hardcode konten project/course/journey di view/Blade — proyek ini CMS, konten harus
  dari data layer (DB/model) (kecuali Hero Section yang bersifat statis).
- Jangan commit/push ke branch utama tanpa review manual.
- Jangan jalankan `php artisan migrate:fresh` atau `key:generate` ulang tanpa konfirmasi
  eksplisit — `.env` sudah punya key yang valid.

## Catatan Model
Antigravity bisa menjalankan agent di bawah model selain Claude (mis. Gemini). Tulis
instruksi di sini, di Rules, dan di Skills secara model-agnostic.