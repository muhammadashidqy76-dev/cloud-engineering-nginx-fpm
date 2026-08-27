# Rule: Laravel Conventions
<!-- Set Activation = Always On di Customizations panel (... > Rules > Workspace) -->

## Prinsip Umum
- Ikuti PSR-12 untuk style code.
- Gunakan Eloquent secara idiomatis; hindari raw query kecuali benar-benar perlu
  performa spesifik (beri komentar alasan kalau terpaksa pakai raw query).
- Controller tetap tipis (thin controller) — logika bisnis dipindah ke Service class
  atau Action class, bukan ditumpuk di controller.
- Gunakan Form Request untuk validasi input, bukan validasi manual di controller.
- Karena proyek ini pakai Breeze: jangan ubah struktur auth scaffolding bawaan Breeze
  kecuali diminta eksplisit — cukup extend, jangan rewrite dari nol.

## Penamaan
- Model: singular, PascalCase (`Project`, `TechStackItem`, `JourneyEntry`,
  `LearningLogEntry`).
- Migration: deskriptif dan urut sesuai dependency antar tabel.
- Route: gunakan resource routing di mana relevan; nama route jelas
  (`projects.index`, `journey.index`, dst).

## Environment & Keamanan
- `.env` sudah punya `APP_KEY` yang valid — jangan generate ulang tanpa konfirmasi.
- Jangan commit `.env` ke git.
- Migration yang bersifat destructive (drop column/table) selalu minta konfirmasi
  eksplisit sebelum dijalankan.

## Testing
- Setiap fitur CMS baru (create/update/delete konten) idealnya disertai feature test
  minimal untuk happy path + 1 edge case.

## Referensi
- Lihat AGENTS.md di root untuk konteks struktur konten & prioritas section.
- Lihat rule `content-cms-rules.md` untuk aturan spesifik soal data-driven content.
