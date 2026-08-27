---
description: 
---

# Workflow: Sync Portfolio Content
<!-- Panggil manual di chat agent dengan: /sync-portfolio-content -->

Tujuan: menjembatani dokumentasi teknis (CHANGELOG, decisions, challenges) menjadi
draft konten CV (Journey entry / Learning Log entry / Featured Project copy), supaya
tidak ada langkah manual yang kelewat.

## Langkah

1. Baca `CHANGELOG.md` sejak entry terakhir yang sudah "diserap" ke konten CV
   (tandai entry yang sudah diserap dengan komentar `<!-- synced -->` di baris itu
   setelah selesai diproses).
2. Baca semua `docs/decisions/*.md` yang belum punya tanda `Synced: yes` di frontmatter/
   bagian atas file.
3. Baca `docs/CHALLENGES.md` untuk entry yang belum ditandai `<!-- synced -->`.
4. Untuk tiap item baru yang ditemukan, tentukan cocoknya masuk ke mana:
   - Perubahan teknis besar + ada ADR terkait → draft entry **Journey**
     (pola learned → applied → result, pakai skill `portfolio-narrative`).
   - Skill/tool baru yang dipelajari tanpa ADR besar → draft entry **Learning Log**
     (tag `Exploring` atau `Production-Ready`).
   - Ada entry di CHALLENGES.md → jadikan draft **Learning Log** (`Exploring`) atau
     tambahan di bagian "Result" pada Journey entry yang relevan.
5. Tampilkan semua draft ke user untuk direview SEBELUM disimpan ke database/model
   konten — jangan langsung publish otomatis.
6. Setelah user approve, baru simpan ke model konten (`JourneyEntry`/
   `LearningLogEntry`) dengan status `draft` (bukan `published`) sebagai default.
7. Tandai sumber-sumber yang sudah diproses di langkah 1-3 sebagai synced.

## Catatan
- Workflow ini tidak menerbitkan konten secara otomatis — hanya menyiapkan draft.
  Keputusan publish tetap manual.