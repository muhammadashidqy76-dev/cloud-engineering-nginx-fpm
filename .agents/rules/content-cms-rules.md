---
trigger: always_on
---

# Rule: Content/CMS Architecture
<!-- Set Activation = Always On di Customizations panel (... > Rules > Workspace) -->

## Kenapa Rule Ini Ada
Situs ini bukan portfolio statis — ini CMS. Kalau agent hardcode konten langsung di
Blade/view, seluruh tujuan proyek (konten yang bisa berkembang seiring skill Azure)
jadi gagal.

## Aturan
- Konten Featured Projects, Tech Stack, Journey, dan Learning Log WAJIB disimpan
  sebagai data (model + migration), diambil lewat controller/query — bukan ditulis
  langsung sebagai teks statis di view.
- **Pengecualian Hero Section**: Hero Section bersifat **statis** (nama, tagline, bio singkat berbentuk code block, tombol CTA, social links) dan di-hardcode langsung di Blade component. Hero Section TIDAK memerlukan model/migration database karena isinya personal dan jarang berubah.
- Setiap model konten idealnya punya field status (draft/published) supaya Azure bisa
  update konten tanpa langsung tayang ke publik.
- Section secondary (Journey, Learning Log) HARUS di-render collapsed/collapsible by
  default di frontend — jangan full-expanded saat initial page load.
- Field yang merepresentasikan pola narasi Journey (learned/applied/result) sebaiknya
  jadi kolom terpisah di database, bukan satu blob teks — supaya bisa ditampilkan
  konsisten secara struktural di UI.
- Learning Log wajib punya field tag dengan nilai terbatas: `Exploring` atau
  `Production-Ready` (pakai enum atau constrained string, bukan free text).
- Urutan Featured Projects mengikuti kompleksitas: E-Commerce → API-only/Headless
  Backend → CMS. Kalau ada field urutan, default-nya ikuti urutan ini.

## Skema Database
- Sebelum membuat migration baru untuk entitas konten (Project, TechStackItem,
  JourneyEntry, LearningLogEntry, dll), cek dulu `docs/database_schema.md` — itu
  rencana kolom yang sudah disepakati. Kalau mau menyimpang dari rencana itu, catat
  alasannya di `docs/decisions/` dulu, baru update `docs/database_schema.md`.
- Setelah migration benar-benar dibuat, centang checklist "[ ] Migration dibuat" di
  `docs/database_schema.md` untuk tabel terkait.
- `docs/database_schema.md` tidak di-push ke GitHub (ada di `.gitignore`) — tetap
  gunakan sebagai acuan kerja lokal.

## Referensi
- Lihat AGENTS.md untuk struktur konten lengkap.
- Lihat skill `portfolio-narrative` untuk aturan penulisan copy per section.
- Lihat `docs/database_schema.md` untuk rencana skema database.