@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')

@section('content')

<div class="mb-8">
    <h1 class="text-2xl font-extrabold tracking-tight text-slate-800">Tambah Surat Masuk</h1>
    <p class="mt-1 text-sm text-slate-500">Isi data surat yang diterima, lalu simpan.</p>
</div>

<form action="{{ route('surat-masuk.store') }}" method="POST" class="max-w-2xl space-y-5">
    @csrf

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label class="mb-1.5 block text-sm font-semibold text-slate-700">Nomor Surat</label>
            <input name="nomor_surat" value="{{ old('nomor_surat') }}"
                   class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100">
            @error('nomor_surat') <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1.5 block text-sm font-semibold text-slate-700">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                   class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100">
            @error('tanggal') <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Pengirim</label>
        <input name="pengirim" value="{{ old('pengirim') }}"
               class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        @error('pengirim') <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Perihal</label>
        <input name="perihal" value="{{ old('perihal') }}"
               class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        @error('perihal') <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Keterangan</label>
        <textarea name="keterangan" rows="4"
                  class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100">{{ old('keterangan') }}</textarea>
        @error('keterangan') <p class="mt-1.5 text-sm font-medium text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit"
                class="cursor-pointer rounded-xl bg-emerald-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-500/30 transition hover:-translate-y-0.5 hover:bg-emerald-700">
            Simpan
        </button>
        <a href="{{ route('surat-masuk.index') }}"
           class="rounded-xl bg-slate-100 px-6 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-200">Batal</a>
    </div>
</form>
@endsection