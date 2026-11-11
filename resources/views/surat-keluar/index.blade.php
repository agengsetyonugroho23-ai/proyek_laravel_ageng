@extends('layouts.app')

@section('title', 'Surat Keluar')

@section('content')

<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-2xl font-extrabold tracking-tight text-slate-800">Daftar Surat Keluar</h1>
        <p class="mt-1 text-sm text-slate-500">Semua surat yang dikirim tercatat di sini.</p>
    </div>

    @can('manage-letters')
        <a href="{{ route('surat-keluar.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/30 transition hover:-translate-y-0.5 hover:bg-indigo-700">
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
                <th class="px-5 py-3.5">Nomor Surat</th>
                <th class="px-5 py-3.5">Tanggal</th>
                <th class="px-5 py-3.5">Pengirim</th>
                <th class="px-5 py-3.5">Perihal</th>
                <th class="px-5 py-3.5 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse ($suratKeluar as $surat)
                <tr class="transition hover:bg-indigo-50/40">
                    <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="px-5 py-4">
                        <span class="rounded-lg bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700">{{ $surat->nomor_surat }}</span>
                    </td>
                    <td class="whitespace-nowrap px-5 py-4 text-slate-600">{{ $surat->tanggal }}</td>
                    <td class="px-5 py-4 font-medium text-slate-800">{{ $surat->pengirim }}</td>
                    <td class="px-5 py-4 text-slate-600">{{ $surat->perihal }}</td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('surat-keluar.show', $surat->id) }}"
                               class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">Detail</a>
                            @can('manage-letters')
                                <a href="{{ route('surat-keluar.edit', $surat->id) }}"
                                   class="rounded-lg bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">Edit</a>
                                <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" class="inline">
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </div>
                        <p class="mt-3 text-sm font-medium text-slate-500">Belum ada surat keluar.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection