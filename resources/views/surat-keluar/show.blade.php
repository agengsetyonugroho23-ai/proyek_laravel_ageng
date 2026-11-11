@extends('layouts.app')
@section('title', 'Detail Surat Keluar')
@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-extrabold tracking-tight text-slate-800">Detail Surat Keluar</h1>
    <p class="mt-1 text-sm text-slate-500">Informasi lengkap surat yang dikirim.</p>
</div>

<div class="max-w-3xl overflow-hidden rounded-2xl border border-slate-200">
    <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-6 py-5 text-white">
        <p class="text-xs font-medium uppercase tracking-wider text-indigo-100">Nomor Surat</p>
        <p class="mt-1 text-xl font-bold">{{ $surat->nomor_surat }}</p>
    </div>

    <dl class="divide-y divide-slate-100">
        <div class="grid grid-cols-1 gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-slate-500">Tanggal</dt>
            <dd class="text-sm text-slate-800 sm:col-span-2">{{ $surat->tanggal }}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-slate-500">Pengirim</dt>
            <dd class="text-sm text-slate-800 sm:col-span-2">{{ $surat->pengirim }}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-slate-500">Perihal</dt>
            <dd class="text-sm text-slate-800 sm:col-span-2">{{ $surat->perihal }}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-slate-500">Keterangan</dt>
            <dd class="whitespace-pre-line text-sm text-slate-800 sm:col-span-2">{{ $surat->keterangan }}</dd>
        </div>
    </dl>
</div>

<a href="{{ route('surat-keluar.index') }}"
   class="mt-6 inline-flex items-center gap-2 rounded-xl bg-slate-100 px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-200">
    &larr; Kembali Ke Daftar Surat
</a>
@endsection