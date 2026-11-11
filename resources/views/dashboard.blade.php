@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

@php
    $waktu = now()->timezone('Asia/Jakarta');
    $jam = $waktu->hour;
    $sapaan = match (true) {
        $jam < 11 => 'Selamat pagi',
        $jam < 15 => 'Selamat siang',
        $jam < 18 => 'Selamat sore',
        default   => 'Selamat malam',
    };
    $tanggal = $waktu->copy()->locale('id')->translatedFormat('l, d F Y');
@endphp

<!-- Banner sambutan -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-700 via-indigo-600 to-sky-500 p-8 text-white shadow-2xl shadow-indigo-500/30 md:p-12">
    <!-- Hiasan latar -->
    <div class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-white/10 blur-sm"></div>
    <div class="absolute right-32 -bottom-24 h-56 w-56 rounded-full bg-sky-300/20 blur-xl"></div>
    <div class="absolute -left-10 bottom-0 h-40 w-40 rounded-full bg-indigo-300/20 blur-xl"></div>
    <div class="absolute inset-0 opacity-[0.07]"
         style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 22px 22px;"></div>

    <div class="relative flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
        <div>
            <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3.5 py-1.5 text-xs font-semibold text-indigo-50 ring-1 ring-white/25 backdrop-blur">
                <span class="relative flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-300 opacity-75"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-300"></span>
                </span>
                Sistem aktif
            </span>

            <h1 class="mt-5 text-3xl font-extrabold tracking-tight md:text-5xl">
                {{ $sapaan }}@auth, <span class="text-sky-200">{{ auth()->user()->name }}</span>@endauth 👋
            </h1>
            <p class="mt-3 max-w-xl text-base leading-relaxed text-indigo-50 md:text-lg">
                Selamat Datang di Sistem Informasi Surat.
            </p>
        </div>

        <!-- Kartu tanggal & jam -->
        <div class="shrink-0 rounded-2xl bg-white/15 px-7 py-5 text-center ring-1 ring-white/25 backdrop-blur-md">
            <p id="jam-digital" class="text-4xl font-extrabold tabular-nums tracking-tight">{{ $waktu->format('H:i:s') }}</p>
            <p class="mt-1 text-sm font-medium text-indigo-100">{{ $tanggal }}</p>
            <p class="mt-0.5 text-xs text-indigo-200">WIB</p>
        </div>
    </div>
</div>

<!-- Akses cepat -->
<div class="mb-4 mt-12 flex items-end justify-between">
    <div>
        <h2 class="text-lg font-bold text-slate-800">Akses Cepat</h2>
        <p class="text-sm text-slate-500">Pilih menu untuk mulai mengelola surat.</p>
    </div>
</div>

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

    <a href="{{ route('surat-masuk.index') }}"
       class="group relative flex items-center gap-5 overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 transition duration-300 hover:-translate-y-1.5 hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-100">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-emerald-50 transition duration-300 group-hover:scale-150"></div>
        <span class="relative flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-500 text-white shadow-lg shadow-emerald-500/30 transition duration-300 group-hover:rotate-3 group-hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
        </span>
        <div class="relative flex-1">
            <h3 class="text-lg font-bold text-slate-800">Surat Masuk</h3>
            <p class="mt-0.5 text-sm text-slate-500">Lihat dan kelola surat yang diterima.</p>
        </div>
        <span class="relative text-slate-300 transition duration-300 group-hover:translate-x-1 group-hover:text-emerald-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </span>
    </a>

    <a href="{{ route('surat-keluar.index') }}"
       class="group relative flex items-center gap-5 overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 transition duration-300 hover:-translate-y-1.5 hover:border-indigo-300 hover:shadow-xl hover:shadow-indigo-100">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-indigo-50 transition duration-300 group-hover:scale-150"></div>
        <span class="relative flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-500/30 transition duration-300 group-hover:rotate-3 group-hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
        </span>
        <div class="relative flex-1">
            <h3 class="text-lg font-bold text-slate-800">Surat Keluar</h3>
            <p class="mt-0.5 text-sm text-slate-500">Lihat dan kelola surat yang dikirim.</p>
        </div>
        <span class="relative text-slate-300 transition duration-300 group-hover:translate-x-1 group-hover:text-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </span>
    </a>

</div>

<!-- Alur kerja singkat -->
<div class="mb-4 mt-12">
    <h2 class="text-lg font-bold text-slate-800">Alur Kerja Singkat</h2>
    <p class="text-sm text-slate-500">Tiga langkah mudah mengelola surat di sistem ini.</p>
</div>

<div class="grid grid-cols-1 gap-5 md:grid-cols-3">
    <div class="rounded-2xl bg-gradient-to-br from-slate-50 to-white p-6 ring-1 ring-slate-200">
        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-100 text-sm font-extrabold text-indigo-700">1</span>
        <h3 class="mt-4 font-bold text-slate-800">Catat Surat</h3>
        <p class="mt-1 text-sm leading-relaxed text-slate-500">Masukkan nomor, tanggal, pengirim, dan perihal setiap surat yang masuk maupun keluar.</p>
    </div>
    <div class="rounded-2xl bg-gradient-to-br from-slate-50 to-white p-6 ring-1 ring-slate-200">
        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-sm font-extrabold text-emerald-700">2</span>
        <h3 class="mt-4 font-bold text-slate-800">Kelola Data</h3>
        <p class="mt-1 text-sm leading-relaxed text-slate-500">Lihat detail, perbarui informasi, atau hapus surat yang sudah tidak diperlukan.</p>
    </div>
    <div class="rounded-2xl bg-gradient-to-br from-slate-50 to-white p-6 ring-1 ring-slate-200">
        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-sm font-extrabold text-amber-700">3</span>
        <h3 class="mt-4 font-bold text-slate-800">Arsipkan Rapi</h3>
        <p class="mt-1 text-sm leading-relaxed text-slate-500">Semua surat tersimpan terurut dan mudah dicari kapan pun dibutuhkan.</p>
    </div>
</div>

<script>
    // Jam digital (WIB) yang berjalan otomatis
    (function () {
        var el = document.getElementById('jam-digital');
        if (!el) return;
        function tick() {
            el.textContent = new Date().toLocaleTimeString('id-ID', {
                timeZone: 'Asia/Jakarta', hour12: false,
                hour: '2-digit', minute: '2-digit', second: '2-digit'
            }).replace(/\./g, ':');
        }
        tick();
        setInterval(tick, 1000);
    })();
</script>

@endsection