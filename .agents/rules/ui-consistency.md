# Rule: UI & Design Token Consistency
<!-- Set Activation = Always On di Customizations panel (... > Rules > Workspace) -->

## Overview & Tujuan
Rule ini mendokumentasikan design token, sistem spasi, dan motif UI yang telah diimplementasikan pada seluruh section portfolio (Hero, Featured Projects, Tech Stack, Journey, dan Learning Log). **Aturan ini wajib dipatuhi untuk seluruh section dan komponen baru ke depannya** agar tampilan aplikasi tetap konsisten, rapi, berirama visual teratur, dan berkesan premium.

---

## 1. Color Palette & Surfaces

### Page & Surface Backgrounds
- **Main Page / Section Base**: `bg-[#0b0f19]` (Dark midnight navy)
- **Primary Card Surface**: `bg-slate-900/70` atau `bg-[#0f1422]/90` (Deep dark slate with opacity)
- **Mockup / Code Block Inner Surface**: `bg-[#080d14]` atau `bg-[#090d16]` (Ultra-dark code canvas)
- **Mockup / Card Top Header**: `bg-slate-900` atau `bg-[#0b0f19]/90`
- **Tech Item Pill Surface**: `bg-[#090d16]`

### Borders
- **Section Top Divider**: `border-t border-slate-800/60`
- **Card Default Border**: `border border-slate-800` atau `border-slate-800/80`
- **Card Hover Border**: `hover:border-slate-700` atau `hover:border-slate-700/80`
- **Subtle Inner/Pill Border**: `border border-slate-700/60` atau `border-slate-800/80`

### Accents & Gradients
- **Primary Red Brand Accent**: `red-500` (`#ef4444`), `red-600` (`#dc2626`), `red-400` (`#f87171`), `rose-400` (`#fb7185`)
- **Headline Text Gradient**: `bg-clip-text text-transparent bg-gradient-to-r from-red-500 via-rose-400 to-amber-400`
- **Ambient Glow Blobs**:
  - Red Blob: `bg-red-600/15` atau `bg-red-600/5 rounded-full blur-[100px] pointer-events-none`
  - Amber Blob: `bg-amber-500/10 rounded-full blur-[120px] pointer-events-none`
  - Indigo Blob: `bg-indigo-500/5 rounded-full blur-[100px] pointer-events-none`
- **Card Hover Ambient Glow**: `bg-gradient-to-r from-red-600/30 to-amber-500/20 rounded-2xl blur-xl opacity-75 group-hover:opacity-100 transition duration-500`

### Text Colors
- **Primary Heading**: `text-white`
- **Secondary / Body Text**: `text-slate-400` (atau `text-slate-300` untuk keterbacaan tinggi di card)
- **Muted / Meta Captions**: `text-slate-500` (line numbers: `text-slate-600`)
- **Category Colors**:
  - Backend / PHP / Red accent: `text-rose-400` / `text-red-400`
  - Database / MySQL / Success: `text-emerald-400`
  - Frontend / Web / Sky accent: `text-sky-400`
  - Tools / Warning / Amber accent: `text-amber-400`
- **Text Selection**: `selection:bg-red-500 selection:text-white`

---

## 2. Typography & Fonts

- **Primary Sans Font**: `Figtree`, fallback `sans-serif` (`font-sans antialiased`)
  - Dipakai untuk: Body text, judul section, deskripsi, tombol.
  - Weights: `font-normal` (400), `font-medium` (500), `font-semibold` (600), `font-bold` (700), `font-extrabold` (800).
- **Monospace Font**: `font-mono`
  - Dipakai untuk: Mockup code editor, JSON preview, badge jumlah item, complexity tag (`#1`), URL bar, tag tech item pill, line numbers.

### Typographic Hierarchy
- **Main Hero Title (`h1`)**: `text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.15]`
- **Section Heading (`h2`)**: `text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight tracking-tight`
- **Card Title (`h3`)**: `text-[15px]` atau `text-base font-bold text-white tracking-tight`
- **Eyebrow Header**: `text-[11px] font-semibold uppercase tracking-widest text-red-400 mb-3 inline-flex items-center gap-1.5`
- **Body / Subtitle**: `text-sm sm:text-base text-slate-400 leading-relaxed`

---

## 3. Border Radius Scale

- `rounded-full`: Eyebrow pills, status indicators, ambient background blobs, tag badge kecil.
- `rounded-2xl`: Large feature containers / Window IDE mockup.
- `rounded-xl`: Main cards (Featured Projects, Tech Stack category card) & CTA main buttons.
- `rounded-lg`: Action buttons (`py-2`), icon buttons (`p-2.5`), tech item pills (`px-3.5 py-2`).
- `rounded` / `rounded-md`: Minor code tags, complexity order badges (`#1`), URL input header bar.

---

## 4. Shadows & Elevation

- **Card Hover Shadow**: `hover:shadow-xl hover:shadow-black/30 hover:-translate-y-0.5 transition-all duration-200`
- **Primary Button Red Shadow**: `shadow-lg shadow-red-600/25 hover:shadow-red-500/35` atau `shadow-sm shadow-red-600/20`
- **IDE / Window Mockup Shadow**: `shadow-2xl`
- **Badge Pill Shadow**: `shadow-lg shadow-black/40`

---

## 5. Spacing & Rhythm System (Sistem Spasi & Ritme Visual)

Skala spasi menggunakan kelipatan 4 berbasis utilitas Tailwind CSS (`4/8/12/16/20/24/28/32`).

### A. Section Spacing (Tingkat Tertinggi / Macro)
- **Jarak Antar Section**: `py-20 lg:py-28` (jarak **PALING BESAR** di seluruh halaman).
- **Diferensiasi Visual Antar Section**:
  - Setiap section wajib memiliki garis pembatas halus: `border-t border-slate-800/60`.
  - Ambient background glow blob (`bg-red-600/5`, `bg-indigo-500/5 blur-[100px]`) untuk menegaskan zona section tanpa bergantung semata pada whitespace.
- **Container Lebar Maksimum**:
  - Hero Section: `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8`
  - Konten Section (Projects, Tech Stack, Journey, Learning Log): `max-w-6xl mx-auto px-4 sm:px-6 lg:px-8`
- **Header Section Margin Bawah**: `mb-12 max-w-2xl` (jarak yang jelas memisahkan judul section dari grid konten di bawahnya).

### B. Card Gap (Tingkat Menengah / Meso)
- **Grid Gap Antar Card**: `gap-6` (pada layout 3 kolom maupun 2 kolom).
- Memberikan ruang pemisah yang tegas antar card namun tetap mempertahankan ikatan visual satu kelompok.

### C. Card Internal Padding (Tingkat Mikro / Konsisten)
- **Standar Padding Dalam Card**: Seluruh jenis card (Featured Project, Tech Stack Category, Journey Entry, Learning Log Entry) wajib menggunakan padding seragam **`p-6`** (atau `p-5 sm:p-6` responsive).
- **Mockup Top Bar Padding**: `px-4 py-3` atau `px-3.5 py-2.5`.
- **Card Footer / Actions**: `px-6 pb-6 pt-0` atau `border-t border-slate-800/60 pt-4 mt-auto`.

### D. Timeline Journey Khusus
- **Jarak Vertikal Antar Entry**: `space-y-6`.
- **Garis & Marker**: Dot/marker dan badge status tidak boleh tumpang tindih (*overlap*) dengan konten kartu.
- **Sub-box 3 Pilar (Learned, Applied, Result)**: Menggunakan `p-4 rounded-lg bg-[#080d14] border border-slate-800/80` dengan `gap-3` antar kolom.

### E. Penerapan Prinsip Proximity (Gestalt)
- **Terkait Sangat Erat (High Proximity - Jarak Kecil)**:
  - Judul Card + Subtitle: `mt-1` atau `mt-1.5`.
  - Tag pill icon + teks label: `gap-1.5` atau `gap-2`.
  - Eyebrow horizontal bar + teks kategori: `gap-1.5`.
- **Tingkat Menengah (Medium Proximity)**:
  - Jarak antar paragraf deskripsi / highlight list / tag pills group: `mt-3`, `mt-4`, `space-y-1.5`.
- **Pemisah Blok / Aksi (Low Proximity - Jarak Lebih Luas)**:
  - Jarak konten ke tombol aksi / impact metric footer: `mt-auto pt-4`.
  - Jarak header section ke toggle accordion: `mt-8`.

---

## 6. Motif Komponen Berulang (Reusable Component Motifs)

### A. Window / IDE Mockup Top Bar (3 Colored Dots)
Dipakai pada preview visual project, code block, atau terminal mockup:
```html
<div class="flex items-center gap-2 px-3 py-2 bg-slate-900 border-b border-slate-800/60">
    <div class="flex gap-1">
        <span class="w-2 h-2 rounded-full bg-rose-500/70"></span>
        <span class="w-2 h-2 rounded-full bg-amber-400/70"></span>
        <span class="w-2 h-2 rounded-full bg-emerald-400/70"></span>
    </div>
    <span class="font-mono text-[10px] text-slate-500 bg-slate-950/60 px-2.5 py-0.5 rounded border border-slate-800">
        {{ $label }}
    </span>
</div>
```

### B. Eyebrow Section Header & Badge Pill
Dipakai untuk penanda section dan badge status:
```html
<!-- Eyebrow Tag -->
<span class="inline-flex items-center gap-1.5 text-[11px] font-semibold uppercase tracking-widest text-red-400 mb-3">
    <span class="w-4 h-px bg-red-400/80 rounded"></span>
    Section Category
</span>

<!-- Status Badge Pill with Pulse -->
<div class="inline-flex items-center gap-2 p-1 pr-3 rounded-full bg-slate-900/90 border border-slate-800/80 shadow-lg shadow-black/40 backdrop-blur-md">
    <span class="bg-red-500/15 text-red-400 border border-red-500/20 px-3 py-1 rounded-full text-xs font-semibold tracking-wide flex items-center gap-1.5">
        <span class="w-1.5 h-1.5 rounded-full bg-red-400 animate-pulse"></span>
        Status Title
    </span>
</div>
```

### C. Buttons (Primary vs Secondary Outline)
```html
<!-- Primary Red Button -->
<a href="#" class="bg-red-600 hover:bg-red-500 text-white font-semibold px-6 py-3 rounded-xl shadow-lg shadow-red-600/25 hover:shadow-red-500/35 transition-all duration-200 flex items-center justify-center gap-2">
    Action Title
</a>

<!-- Secondary / Outline Button -->
<a href="#" class="text-slate-300 hover:text-white font-semibold px-5 py-3 rounded-xl border border-slate-800 hover:border-slate-700 bg-slate-900/50 hover:bg-slate-800/50 transition-all duration-200 flex items-center justify-center gap-2">
    Secondary Action
</a>
```

### D. Card Container Standard
```html
<article class="group flex flex-col rounded-xl bg-slate-900/70 border border-slate-800 hover:border-slate-700 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/30 overflow-hidden">
    <!-- Header / Visual Preview -->
    <!-- Content Body -->
    <!-- Footer / Action Buttons -->
</article>
```

### E. Tech Stack / Tag Pills
```html
<!-- Mini Tech Badge -->
<span class="text-[10px] font-medium px-2 py-0.5 rounded-full bg-slate-800 text-slate-300 border border-slate-700/60">
    Laravel
</span>

<!-- Ecosystem Tech Pill (With Icon) -->
<div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#090d16] border border-slate-800/80 text-slate-200 text-xs font-mono font-medium hover:border-slate-700 hover:text-white transition-colors">
    <span class="shrink-0">{!! $iconSvg !!}</span>
    <span>Techno Name</span>
</div>
```
