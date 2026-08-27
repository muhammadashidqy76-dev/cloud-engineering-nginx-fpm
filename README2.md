# [Ashidqy.backdev]

> README ini masih placeholder — akan disusun lebih lengkap setelah struktur konten
> & fitur utama stabil (Featured Projects, Tech Stack, section ketiga TBD).

## Tentang
Portfolio + CMS ringan milik Azure, positioning sebagai Laravel Backend Developer.

## Tech Stack
- Laravel
- Laravel Breeze (auth)
- (lengkapi setelah stack final)

## Setup Lokal
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
```

## Struktur Dokumentasi Agent
Proyek ini dikembangkan dengan bantuan agent (Antigravity). Lihat:
- `AGENTS.md` — konteks & aturan utama
- `.agents/rules/` — konvensi coding & arsitektur (always-on)
- `.agents/skills/` — knowledge kontekstual (mis. penulisan narasi portfolio)
- `docs/decisions/` — alasan di balik keputusan teknis besar
- `docs/CHALLENGES.md` — catatan proses debugging & pembelajaran