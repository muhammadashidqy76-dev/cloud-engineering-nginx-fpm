---
name: portfolio-narrative
description: Menulis atau meninjau copy/narasi untuk section Journey, Learning Log, dan deskripsi Featured Projects di portfolio ini. Gunakan saat membuat entry timeline pembelajaran, entry blog Learning Log, atau problem statement/impact metric project.
---

# Portfolio Narrative Writing

## Konteks
Azure adalah fresh graduate self-taught, positioning sebagai Laravel Backend
Developer. Tidak ada pengalaman kerja formal — jadi Journey section menggantikan
"Experience", dan harus terasa terstruktur & applied, bukan sekadar daftar sertifikat.

## Pola Wajib: Learned → Applied → Result
Setiap entry Journey (per course/skill yang dipelajari) HARUS mengikuti 3 bagian ini:
1. **Learned** — skill/konsep apa yang dipelajari, dari mana (course/sumber).
2. **Applied** — di project mana skill ini dipakai (harus merujuk salah satu dari 3
   Featured Projects: E-Commerce, API-only/Headless Backend, atau CMS).
3. **Result** — dampak konkret: metrik, fitur yang berhasil dibangun, masalah yang
   terpecahkan. Hindari klaim vague ("belajar banyak hal") — selalu konkret.

## Sumber Bahan Mentah
- `docs/decisions/*.md` — alasan teknis di balik fitur besar, bisa jadi bahan
  "keputusan arsitektur" di copy Featured Project.
- `docs/CHALLENGES.md` — cerita stuck & cara keluar, bisa jadi bahan Learning Log
  (tag `Exploring`) atau bagian "Result" di Journey (menunjukkan problem solving asli).

## Learning Log
- Tiap entry ditag salah satu: `Exploring` (masih dipelajari, belum matang) atau
  `Production-Ready` (skill yang sudah stabil dipakai).
- Gaya blog singkat, boleh lebih personal/reflektif dibanding Journey.

## Featured Project Copy
Tiap project (diurutkan dari kompleksitas rendah ke tinggi) harus punya:
- Problem statement singkat.
- Keputusan arsitektur kunci (kenapa pilih pendekatan X, bukan Y) — cek
  `docs/decisions/` sebelum menulis bagian ini.
- Tech stack badge.
- Minimal 1 impact metric konkret.

## Yang Harus Dihindari
- Jangan tulis Journey sebagai daftar sertifikat linear tanpa konteks aplikasi.
- Jangan gunakan istilah generik ("passionate", "hardworking") tanpa bukti konkret.
- Jangan campur nada Journey (formal/terstruktur) dengan Learning Log (santai) — jaga
  konsistensi tone per section.