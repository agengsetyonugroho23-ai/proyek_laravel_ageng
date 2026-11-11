@extends('layouts.app')

@section('title', 'Daftar Surat Masuk')

@section('content')

<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-2xl font-extrabold tracking-tight text-slate-800">Daftar Surat Masuk</h1>
        <p class="mt-1 text-sm text-slate-500">Semua surat yang diterima tercatat di sini.</p>
    </div>

    @can('manage-letters')
        <a href="{{ route('surat-masuk.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/30 transition hover:-translate-y-0.5 hover:bg-emerald-700">
            + Tambah Surat
        </a>
    @endcan
</div>

@if (session('success'))
    <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto rounded-2xl border border-slate-200">
    <table class="min-w-full text-sm">
        <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
            <tr>
                <th class="px-5 py-3.5">No</th>
                <th class="px-5 py-3.5">Nomor</th>
                <th class="px-5 py-3.5">Tanggal</th>
                <th class="px-5 py-3.5">Pengirim</th>
                <th class="px-5 py-3.5">Perihal</th>
                <th class="px-5 py-3.5 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse ($suratMasuk as $surat)
                <tr class="transition hover:bg-emerald-50/40">
                    <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="px-5 py-4">
                        <span class="rounded-lg bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700">{{ $surat->nomor_surat }}</span>
                    </td>
                    <td class="whitespace-nowrap px-5 py-4 text-slate-600">{{ $surat->tanggal }}</td>
                    <td class="px-5 py-4 font-medium text-slate-800">{{ $surat->pengirim }}</td>
                    <td class="px-5 py-4 text-slate-600">{{ $surat->perihal }}</td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('surat-masuk.show', $surat->id) }}"
                               class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">Detail</a>
                            @can('manage-letters')
                                <a href="{{ route('surat-masuk.edit', $surat->id) }}"
                                   class="rounded-lg bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">Edit</a>
                                <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus surat ini?')"
                                            class="cursor-pointer rounded-lg bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-600 hover:text-white">Hapus</button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-5 py-14 text-center">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                        </div>
                        <p class="mt-3 text-sm font-medium text-slate-500">Belum ada surat masuk.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection