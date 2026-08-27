---
trigger: always_on
---

# Rule: Changelog Discipline
<!-- Set Activation = Always On di Customizations panel (... > Rules > Workspace) -->

## Prinsip Utama: Git adalah Source of Truth, CHANGELOG.md adalah Terjemahannya
Sesi agent bisa terputus di tengah jalan (token habis, koneksi putus, dll). Karena itu
JANGAN tunda pencatatan sampai "task besar" selesai — itu titik gagal tunggal. Sebagai
gantinya:

1. **Commit sering, per sub-langkah selesai** (bukan 1 commit raksasa di akhir).
   Contoh sub-langkah untuk 1 fitur: migration → model → controller → view. Tiap
   sub-langkah yang jalan/tervalidasi, commit dulu.
2. **Tulis 1 baris CHANGELOG.md tiap kali commit**, bukan tiap kali fitur besar
   selesai. Granularity CHANGELOG mengikuti granularity commit, bukan granularity
   fitur.
3. Kalau sesi terputus di tengah sub-langkah yang belum sempat commit, itu wajar
   hilang — jangan coba "reka ulang" progress yang belum ter-commit.

## Format Entry
Di bawah section `[Unreleased]`, kategori yang sesuai:
- **Added** — model/route/fitur/halaman baru
- **Changed** — perubahan behavior dari yang sudah ada
- **Fixed** — bug fix

Singkat, jelas, sebut nama fitur/model. Contoh:
`Added JourneyEntry model + migration untuk timeline Journey section`

## Recovery: Awal Sesi Baru
Setiap memulai sesi baru, SEBELUM mengerjakan task baru, jalankan dulu:
1. `git log --oneline -10` untuk lihat commit terakhir.
2. Bandingkan dengan entry terakhir di `CHANGELOG.md` — kalau ada commit yang belum
   punya entry, tambahkan dulu entry yang kelewat sebelum lanjut kerja baru.
Ini memastikan gap dari sesi yang terputus otomatis ke-tutup di awal sesi berikutnya,
tanpa harus diminta manual.

## Kapan TIDAK perlu log
- Perubahan kosmetik kecil (rename variabel, formatting) dalam commit yang sama dengan
  perubahan fungsional — cukup 1 entry untuk keseluruhan commit itu.
- Commit yang murni "WIP" tanpa unit kerja yang selesai — boleh digabung ke entry
  berikutnya saat unit kerjanya benar-benar selesai.

## Kaitan dengan Dokumentasi Lain
- Kalau perubahan ini melibatkan keputusan arsitektur non-trivial (pilih pendekatan A
  vs B), buat juga entry baru di `docs/decisions/` dan sebutkan di CHANGELOG bahwa ada
  ADR terkait.
- Kalau proses mengerjakannya sempat stuck cukup lama, tambahkan juga entry di
  `docs/CHALLENGES.md`.
- Entry CHANGELOG murni teknis ("apa yang berubah"), bukan tempat untuk narasi
  portfolio — narasi tetap disusun lewat skill `portfolio-narrative` memakai bahan dari
  CHANGELOG + decisions + challenges sebagai sumber.