# Changelog

Semua perubahan penting di project ini dicatat di sini. Format mengacu ke
[Keep a Changelog](https://keepachangelog.com/), ringkas dan per-fitur/per-fix —
bukan per-commit (untuk itu lihat `git log`).

## [Unreleased]

### Added
- Blade `resources/views/work-experience/index.blade.php`: antarmuka visual manajemen riwayat pengalaman kerja bertema dark carbon dengan 4 kartu statistik metrik (Total, Aktif Sekarang, Published, Draft), filter status tab, card timeline bergaya window terminal, badge tipe pekerjaan dan durasi waktu, serta aksi Edit & Hapus.
- Blade `resources/views/work-experience/create.blade.php` & `resources/views/work-experience/edit.blade.php`: form pembuatan & pengeditan riwayat pengalaman kerja dengan selector radio tipe pekerjaan (Internship, Full-time, Part-time, Freelance), toggle reaktif Alpine.js "Masih Bekerja di Sini (Present)" yang otomatis mengontrol input tanggal selesai, textarea poin pencapaian/tanggung jawab, display order, dan status publikasi (Published / Draft).
- `WorkExperienceRequest`: validasi terpadu input riwayat pengalaman kerja dengan normalisasi otomatis boolean `is_current`, validasi conditional `end_date`, validasi enum employment type dan status, serta pesan kesalahan dalam bahasa Indonesia.
- Blade `resources/views/tech-stack/create.blade.php` & `resources/views/tech-stack/edit.blade.php`: panel pemilih relasi Featured Projects dua arah dengan checkbox interaktif, quick action "Pilih Semua / Batal", tautan cepat ke proyek terkait, serta sinkronisasi otomatis pivot `project_tech_stack_item` saat menambah maupun mengedit teknologi.
- Blade `resources/views/tech-stack/index.blade.php`: antarmuka visual manajemen Tech Stack Items terkelompok per kategori (Core Backend, Database & Cache, Tools & DevOps, dll) dengan kartu ringkasan status penguasaan (Finished, In Progress, Not Started), filter kategori cepat, counter metrik, dan aksi Edit & Hapus.
- Blade `resources/views/projects/index.blade.php`: antarmuka visual daftar Featured Projects lengkap dengan info urutan tier kompleksitas, thumbnail preview/mockup API, badge status, tautan live demo, dan tombol aksi Edit & Hapus.
- Blade `resources/views/projects/create.blade.php` & `resources/views/projects/edit.blade.php`: form pembuatan & pengeditan proyek bertema dark carbon dengan auto-slug generator, input multi-bahasa (ID & EN), pemilihan complexity order (1-3), upload file thumbnail / custom path, demo URL, dan pemilih tech stack terkelompok per kategori via checkbox relasi pivot.
- `AdminUserSeeder`: seeder akun administrator awal (`admin@ashidqy.dev` / `password`).
- Controller `DashboardController`: mengelola tampilan konsol ringkasan `/dashboard` dengan agregasi metrik dari seluruh model konten CMS (Projects, Tech Stack, Work Experience, Journey, dan Notes/Learning Log).
- Blade `resources/views/dashboard.blade.php`: Control Room overview dashboard (Batch 1) bertema dark architectural carbon yang menampilkan 5 kartu statistik metrik, roadmap tracker implementasi modular batch 1-6, feed catatan teknis terkini, dan preview featured projects.

### Changed
- Controller `WorkExperienceController`: upgrade dari JSON-only response menjadi full Blade CRUD controller (`index`, `create`, `store`, `edit`, `update`, `destroy`) dengan agregasi counter status pengalaman, pengurutan kronologis terbalik, filter status interaktif, dan penanganan backward compatibility JSON.
- Layout `resources/views/layouts/navigation.blade.php`: mengaktifkan menu navigasi `Experience` (Batch 4) di desktop dan mobile menu.
- Blade `resources/views/dashboard.blade.php`: memperbarui status roadmap tracker Batch 4 menjadi Live, kartu metrik `03. Experience` menjadi tautan langsung ke `work-experience.index`, dan Batch 5 menjadi status "Berikutnya".
- Controller `TechStackItemController`: upgrade dari JSON-only response menjadi full Blade CRUD controller (`index`, `create`, `store`, `edit`, `update`, `destroy`) dengan fitur sinkronisasi relasi pivot `projects()`, agregasi counter status penguasaan, pengelompokan kategori, filter interaktif, dan penanganan backward compatibility JSON.
- `TechStackItemRequest`: penambahan aturan validasi untuk `name`, `category`, `custom_category`, `status` (`finished`, `in_progress`, `not_started`), `display_order`, `description`, serta array `project_ids.*`.
- Layout `resources/views/layouts/navigation.blade.php`: mengaktifkan menu navigasi `Tech Stack` (Batch 3) di desktop dan mobile menu.
- Blade `resources/views/dashboard.blade.php`: memperbarui status roadmap tracker Batch 3 menjadi Live, kartu metrik `02. Tech Stack` menjadi tautan langsung ke `tech-stack.index`, dan Batch 4 menjadi status "Berikutnya".
- Controller `ProjectController`: upgrade dari JSON-only response menjadi full Blade CRUD controller (`index`, `create`, `store`, `edit`, `update`, `destroy`) dengan dukungan upload file thumbnail gambar ke storage publik, sinkronisasi relasi pivot `techStackItems`, dan penanganan backward compatibility JSON.
- `ProjectRequest`: penambahan aturan validasi untuk `title_id`, `slug`, `complexity_order`, `problem_statement_id`, `architecture_details_id`, upload file `preview_image`, `demo_url`, dan `status`.
- Model `Project`: mutator setter untuk atribut multi-bahasa dan accessor `preview_image_url` untuk kemudahan rendering thumbnail di dashboard.
- Layout `resources/views/layouts/navigation.blade.php`: mengaktifkan menu navigasi `Projects` (Batch 2) di desktop dan mobile menu.
- Blade `resources/views/dashboard.blade.php`: memperbarui status roadmap tracker batch 2 menjadi Live dan kartu metrik proyek menjadi tautan langsung.
- `routes/auth.php`: menonaktifkan rute registrasi publik (`/register` otomatis dialihkan ke `/login`) agar CMS berjalan aman dalam mode single-operator.
- `routes/web.php`: rute `/dashboard` beralih dari closure view statis ke `DashboardController::class, 'index'`.
- Layout `resources/views/layouts/guest.blade.php`: redesain total dengan estetika dark architectural carbon, window terminal mockup, grid matrix canvas, dan branding `<Ashidqy/>`.
- Blade auth (`auth/login.blade.php`, `auth/forgot-password.blade.php`, `auth/reset-password.blade.php`): penyelarasan visual ke dark theme lengkap dengan styling input, label monospace, remember-me checkbox, dan tombol aksen vermilion.
- Layout `resources/views/layouts/app.blade.php` & `resources/views/layouts/navigation.blade.php`: layout CMS dark carbon, navigasi modular bertahap (Overview aktif, batch 2-6 berindikator status), link shortcut "Lihat Website ↗", profil dropdown, dan responsive mobile menu.
- Komponen Breeze (`text-input`, `input-label`, `primary-button`, `secondary-button`, `danger-button`, `input-error`, `auth-session-status`, `nav-link`, `responsive-nav-link`, `dropdown`, `dropdown-link`, `modal`): diselaraskan penuh dengan palet warna Carbon (slate/dark) dan aksen Vermilion.
- Blade `profile/edit.blade.php` & partials: penyesuaian kontainer card dan kontras teks form profil ke dark carbon.
- Blade `resources/views/notes/show.blade.php`: menghapus switcher bahasa (ID/EN) dari header baca artikel dan menggantinya dengan tautan langsung ke katalog catatan (`/notes`) serta penambahan link `Catatan` di quick links footer.
- Blade `resources/views/notes/show.blade.php`: upgrade header ke reader-mode lengkap (branding `<Ashidqy/>`, tombol kembali ke beranda, judul artikel fade-in saat scroll melewati header artikel, tombol salin link dengan feedback tooltip), penambahan Author Card mini profil di akhir artikel, dan upgrade footer lengkap dengan navigasi quick links, info built with, copyright, dan social media links.

### Added
- Route publik `GET /notes` → `NoteController::index` dan Blade `resources/views/notes/index.blade.php`: halaman arsip & katalog penuh untuk seluruh catatan teknis, dilengkapi filter kategori (Semua, Laravel, Cloud Engineering), pencarian judul/konten, grid card responsif 3-kolom, dan pagination.
- Component `learning-log-section.blade.php`: tombol Call-to-Action "Lihat Semua Catatan & Eksperimen" di bagian bawah section beranda yang mengarah langsung ke `/notes`.
- Migration `add_slug_and_body_to_learning_log_entries_table`: menambahkan kolom `slug` (unique) dan `body` (longText, Markdown penuh) ke tabel `learning_log_entries`. Kolom `content` tetap sebagai excerpt di card homepage.
- Model `LearningLogEntry`: tambah `slug` & `body` ke `$fillable`, auto-generate slug dari title via `booted()`, route key binding by `slug`, accessor `getBodyHtmlAttribute()` yang mengkonversi `body` Markdown ke HTML via `Str::markdown()`, dan update `getReadingTimeAttribute()` untuk menghitung dari `body` jika tersedia.
- Controller `NoteController`: handle publik route `GET /notes/{entry:slug}`, guard 404 untuk entri belum published, query prev/next dalam track yang sama untuk navigasi artikel.
- Route publik `GET /notes/{entry:slug}` → `notes.show` di `routes/web.php`, di luar middleware auth.
- Blade `resources/views/notes/show.blade.php`: halaman detail artikel bergaya Medium — sticky minimal header dengan track badge & reading time, artikel header (status badge, h1 judul, meta bar), lead/excerpt box, body Markdown dirender sebagai HTML dengan custom `prose-note` typography, navigasi prev/next in-track, dan reading progress bar JavaScript.
- `LearningLogEntrySeeder`: update semua 4 entri dengan `slug` dan konten artikel `body` Markdown penuh (Breeze vs Sanctum, Form Requests & API Resources, Redis Caching, Docker Multi-Stage Build).
- Component `learning-log-section.blade.php`: title card sekarang berupa link ke `/notes/{slug}`, card footer mendapat tombol "Baca →" berwarna sesuai track (vermilion untuk Laravel, cyan untuk Cloud), hover border card berubah ke warna track.
- Model `LearningLogEntry`: tambah accessor `getReadingTimeAttribute()` untuk estimasi waktu baca otomatis bergaya Medium berdasarkan jumlah kata konten.
- Migration `add_category_to_learning_log_entries_table`: menambahkan kolom `category` (default `laravel`) pada tabel `learning_log_entries` untuk pengelompokan pilar topik (Laravel Ecosystem vs Cloud Engineering).
- Model `LearningLogEntry`: tambah konstanta `CATEGORY_LARAVEL` & `CATEGORY_CLOUD`, field `category` ke `$fillable`, serta query scopes `scopeLaravel()`, `scopeCloud()`, dan `scopeCategory()`.
- `LearningLogEntryRequest`: tambah validasi field `category` (`required`, `in:laravel,cloud_engineering`).
- `LearningLogEntryController`: tambah dukungan filter query parameter `category` pada method `index()`.
- `LearningLogEntryFactory` & `LearningLogEntrySeeder`: dukungan atribut `category`, factory states `laravel()` & `cloud()`, serta seed entri data seimbang untuk pilar Laravel dan Cloud Engineering.
- Keys lokalisasi track pilar (`log.track_laravel_title/desc`, `log.track_cloud_title/desc`, `log.empty_track`) di `lang/id.json` dan `lang/en.json`.
- Feature tests `FeaturedProjectsTest.php`: validasi query data published projects dari database, relasi tech stack items, complexity order, dan rendering mock-up API.
- Feature tests `WorkExperienceTest.php`: validasi model, accessors (`duration_label`, badge classes), scopes (`published`, `current`, `chronological`), form requests, CRUD API endpoints, dan graceful frontend visibility pada welcome page.
- `WorkExperienceSeeder`: seeder dengan 1 entri data dummy sementara untuk keperluan preview visual section Work Experience (perlu diganti data asli sebelum deploy).
- Component `work-experience-section.blade.php`: section publik untuk pengalaman kerja & magang yang tersembunyi secara graceful jika belum ada entri berstatus published, terintegrasi pada `welcome.blade.php`.
- `WorkExperienceController`: Resource Controller CRUD backend untuk data pengalaman kerja/magang (`index`, `store`, `show`, `update`, `destroy`) dan registrasi route resource `work-experience` di `routes/web.php`.
- Form Requests `StoreWorkExperienceRequest` & `UpdateWorkExperienceRequest`: validasi `employment_type` (`in:internship,full_time,part_time,freelance`), `status` (`in:published,draft`), `start_date`, dan conditional validation untuk `end_date` (required jika `is_current` false).
- Model `WorkExperience`: fillables, casts, constants (`TYPE_INTERNSHIP/FULL_TIME/PART_TIME/FREELANCE`, `STATUS_PUBLISHED/DRAFT`), scopes (`scopePublished`, `scopeCurrent`, `scopeChronological`), dan accessors (`duration_label`, `employment_type_badge_classes`, `employment_type_label`).
- Migration `create_work_experiences_table`: membuat tabel `work_experiences` dengan kolom `company_name`, `position`, `employment_type` (default `internship`), `start_date`, `end_date`, `is_current`, `description`, `location`, `display_order`, dan `status` (default `draft`).
- Asset placeholder SVG logo issuer (`laracasts.svg`, `udemy.svg`, `bnsp.svg`, `default.svg`) di `public/images/issuer-logos/` sebagai aset dummy sementara.
- Model `JourneyEntry`: tambah accessor `getIssuerLogoAttribute()` untuk me-mapping nama `source` ke path asset logo SVG di `public/images/issuer-logos/` dengan fallback ke `default.svg`.
- Favicon `public/images/logo-web.svg` diterapkan ke semua layout (`welcome.blade.php`, `layouts/app.blade.php`, `layouts/guest.blade.php`, `errors/layout.blade.php`) via `<link rel="icon" type="image/svg+xml">`.
- Migration `add_credential_fields_to_journey_entries_table`: menambahkan kolom `credential_type` (default `course`), `certificate_file_path`, dan `verification_url`, serta mengubah kolom narasi `learned` dan `result` menjadi nullable.
- Model `JourneyEntry`: tambah `credential_type`, `certificate_file_path`, dan `verification_url` ke `$fillable`, constants `TYPE_COURSE/CERTIFICATION/DIPLOMA`, accessor `has_narrative`, dan query scopes `scopeCourses()`, `scopeCertifications()`, `scopeDiplomas()`.
- `JourneyEntryRequest`: tambah validasi `credential_type` (`in:course,certification,diploma`), jadikan `learned`, `result`, `applied_project_id` nullable, validasi format gambar/pdf `certificate_file_path`, dan format URL `verification_url`.
- Migration `add_status_to_tech_stack_items_table`: menambahkan kolom `status` (constrained string, default `not_started`, nilai valid: `not_started`/`in_progress`/`finished`) ke tabel `tech_stack_items`.
- Model `TechStackItem`: tambah `status` ke `$fillable`, constants `STATUS_FINISHED/IN_PROGRESS/NOT_STARTED`, accessor `getStatusColorClassAttribute()` (mapping ke Tailwind class emerald/amber/rose-400), dan scopes `scopeFinished()`, `scopeInProgress()`, `scopeNotStarted()`.
- Model `TechStackItem`: tambah accessor `getStatusBadgeClassesAttribute()` — mengembalikan array `['text', 'bg', 'border']` berisi Tailwind class badge pill per status (emerald/amber/rose-400, opacity-10/20 untuk bg dan border).
- `TechStackItemRequest`: tambah validasi `status` (`required`, `in:not_started,in_progress,finished`) — validasi di Form Request, bukan di level database, sesuai konvensi project.

### Fixed
- fix: seragamkan ukuran logo issuer di card Journey (`w-8 h-8`, `shrink-0`, `object-contain`, `rounded-md`) agar konsisten untuk semua tipe card dan resolusi gambar.

- `learning-log-section.blade.php`: beralih dari layout 3-kolom grid menjadi layout Split Section Two-Track berdampingan (`lg:grid-cols-2`) untuk Track 01 (Laravel & System Architecture) dan Track 02 (Cloud Engineering & Infrastructure); dilengkapi pill waktu baca otomatis bergaya Medium, pembatasan 2 entri terbaru per track di beranda, serta Segmented Tab Switcher khusus mobile (`< lg`) dengan Alpine.js untuk eliminasi scroll berlebih.
- Redesain visual seluruh Error Pages (`403`, `404`, `419`, `429`, `500`, `503`, dan `layout.blade.php`): mengintegrasikan tema *Architectural Backend Craft*, window mockup header `app/Exceptions/Handler.php` dengan badge status `EXCEPTION_THROWN`, blok telemetri terminal monospace interaktif, tombol CTA vermilion, dan background matrix grid global terpadu.
- Penyatuan pola background matrix grid: memindahkan pola *blueprint matrix grid* dari masing-masing section ke satu layer global (*fixed background*) di `welcome.blade.php`, menghasilkan garis grid yang tersambung seamless dari atas hingga bawah halaman tanpa pengulangan pola per-section.
- Redesain visual (UI/styling) Section Journey, Learning Log, Work Experience, dan Tech Stack: standarisasi penuh ke tema *Architectural Backend Craft* berbasis Obsidian-Carbon (`bg-carbon-950`, `bg-carbon-900`, `border-carbon-800`), badge status monospace terstruktur, motif window header 3-dot presisi, dan tipografi hierarkis tajam tanpa mengubah struktur data, model, translation keys, atau fungsionalitas Alpine.
- Redesain visual (UI/styling) Navbar, Footer, dan trigger bar section sekunder: harmonisasi tema *Architectural Backend Craft* berbasis Obsidian-Carbon (`#090c12`), hairline borders (`border-carbon-800`), font monospace pada link navigasi & status badge, aksen vermilion, dan transisi terarah tanpa mengubah fungsionalitas scrollspy atau routing.
- Redesain visual (UI/styling) Hero Section dan Featured Projects Section: beralih dari styling generik ke tema *Architectural Backend Craft* berbasis palet Obsidian-Carbon (`#090c12`), aksen vermilion Laravel presisi, tipografi hierarkis (Plus Jakarta Sans & JetBrains Mono), 1px hairline borders, serta penghapusan gradient blur dan over-rounded corners tanpa mengubah struktur konten, teks, atau fungsionalitas.
- `featured-projects.blade.php`: mengambil dan me-render data Featured Projects secara dinamis dari tabel `projects` dan relasi `tech_stack_items` di database via Eloquent (`Project::published()->with('techStackItems')->orderedByComplexity()`) dengan fallback graceful.
- `journey-section.blade.php`: menyederhanakan tampilan card untuk semua tipe kredensial (termasuk `course`) menjadi format ringkas 3-kolom grid (`grid-cols-1 md:grid-cols-2 lg:grid-cols-3`) sejajar (badge tipe, judul kredensial, issuer/source, tanggal, tombol dokumen/verifikasi) dan menghapus rendering blok narasi 3-kolom (Learned/Applied/Result) dari UI agar lebih cepat di-scan recruiter (perubahan visual saja, kolom data `learned`, `applied_project_id`, dan `result` tetap tersimpan aman di database).
- `JourneyEntrySeeder.php` & `JourneyEntryFactory.php`: diperbarui untuk menyertakan `credential_type`, `certificate_file_path`, dan `verification_url` serta contoh data riwayat sertifikasi resmi (BNSP).
- `tech-stack.blade.php`: badge pill kini fully dynamic — background, border, warna icon SVG, dan warna teks label semuanya dari `$item->status_badge_classes` (emerald=finished, amber=in_progress, rose=not_started). Radius, padding, dan spacing badge tidak berubah. Fallback aman ke rose array saat data dari placeholder.
- Factories dan Seeders untuk Project, TechStackItem, JourneyEntry, dan LearningLogEntry serta konfigurasi DatabaseSeeder.
- Resource Controllers, Form Requests, dan Resource Routes untuk CRUD backend (Project, TechStackItem, JourneyEntry, LearningLogEntry).
- Konten spesifik Featured Project #1 ("StockGuard — E-Commerce Checkout Engine") pada ProjectSeeder.
- Dokumentasi Hero Section (Beranda) di bawah Navbar pada `AGENTS.md`.
- Component `hero-section.blade.php` (Section 1 dari portfolio) dengan dark mode default, responsive two-column layout, dan code editor mockup PHP.
- Component `featured-projects.blade.php` (Section 2 dari portfolio) menampilkan 3 card project diurutkan berdasar kompleksitas (Browser mockup untuk Monolith/CMS, JSON API block untuk Headless Backend).
- Component `tech-stack.blade.php` (Section 3 dari portfolio) disesuaikan secara presisi mengikuti mock-up referensi visual dan gaya header Section 2 (badge red-400, font mono badge jumlah teknologi, border navy dark, dan ikon kustom tiap tech pill).
- Rule `.agents/rules/ui-consistency.md` (Always On) mendokumentasikan token-token UI (warna, font, radius, shadow, spacing, dan motif komponen berulang) sebagai standar konsistensi visual.
- Component `journey-section.blade.php` (Section 4 dari portfolio) menampilkan timeline pembelajaran self-directed dengan pola learned → applied → result, visual window mockup, dan fitur collapsible (Alpine.js).
- Component `learning-log-section.blade.php` (Section 5 dari portfolio) menampilkan catatan teknis dengan badge tag Exploring / Production-Ready, visual window mockup, dan fitur collapsible (Alpine.js).
- Component `navbar.blade.php` (Sticky Navigation Bar) dengan backdrop blur responsif saat scroll, anchor links smooth scroll ke seluruh section, window-dot motif logo, dan mobile hamburger menu (Alpine.js).
- Fitur Scrollspy pada `navbar.blade.php` menggunakan Intersection Observer API bawaan (dibungkus Alpine.js) untuk highlight otomatis link yang sedang aktif di viewport (Projects, Tech Stack, Journey, Learning Log) baik pada desktop maupun mobile menu.
- Custom error pages (404, 403, 419, 429, 500, 503) di `resources/views/errors/` dengan layout minimal, motif window-mockup 3-dot, dan pesan manusiawi — tanpa expose detail teknis Laravel ke user.
- Component `footer.blade.php` (Footer penutup) dengan visual boundary penegas akhir halaman, social links sinkron dengan Hero section, copyright dinamis, dan tagline teknologi.

### Fixed
- Memperbaiki rendering gambar preview Card 1 (StockGuard) menggunakan URL placeholder bertema gelap (`placehold.co`).
- Memperbarui konten Card 2 dengan data nyata "OrderSync API — Multi-Channel Order Aggregator" (mengabaikan placeholder bracket TBD).
- Memperbaiki breakpoint responsive Navbar: nav-links horizontal dan tombol GitHub tampil di layar desktop (`md` ke atas), sedangkan tombol hamburger dan mobile dropdown menu hanya aktif di layar kecil (di bawah `md`).
- Memperbaiki konsistensi spacing vertikal Journey & Learning Log (menyelaraskan `mb-12` header, `mt-8` accordion, `gap-6` grid) serta memperbaiki alignment ikon + teks pada summary accordion agar tidak saling overlap (menambahkan `shrink-0` dan explicit flex gap).

### Changed
- Memperbaiki hirarki section header dan proporsi ukuran card pada Featured Projects Section agar lebih ringkas dan tidak terlalu rapat.
- Menambahkan 2 tombol aksi ("Detail" untuk info lengkap & "Live Demo" untuk tautan eksternal) pada footer setiap project card.
- Redesign penuh Featured Projects card: preview `h-28`, problem statement inline tanpa box, skala tipografi proporsional, footer minimalis dengan impact metric & dual button.
- Update `AGENTS.md` dan `.agents/rules/content-cms-rules.md`: penegasan bahwa Hero Section bersifat statis (hardcoded Blade) tanpa memerlukan data model/migration.
- Standarisasi "Spacing & Rhythm System" pada `.agents/rules/ui-consistency.md` dan penerapan polish pass spasi konsisten (section padding, grid gap, card padding, dan prinsip proximity) pada seluruh 5 section komponen.

---

<!--
Template entry (pindahkan ke atas [Unreleased] jadi versi baru saat rilis/milestone):

## [x.y.z] - YYYY-MM-DD
### Added
- Fitur/model/route baru yang ditambahkan

### Changed
- Perubahan behavior dari yang sudah ada

### Fixed
- Bug yang diperbaiki

Setiap entry idealnya 1 baris, jelas, dan kalau relevan sebut nama fitur/model
(mis. "Added JourneyEntry model + migration untuk timeline Journey section").
-->