@extends('layouts.app')

@section('title', 'Daftar Surat Masuk')

@section('content')

<div class="space-y-6">

    {{-- PAGE HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <p class="text-sm font-medium text-blue-600 mb-1">
                MANAJEMEN SURAT
            </p>

            <h1 class="text-2xl sm:text-3xl font-bold text-[#172554]">
                Daftar Surat Masuk
            </h1>

            <p class="text-sm text-slate-500 mt-2">
                Kelola dan pantau seluruh data surat yang masuk.
            </p>
        </div>

        @can('manage-letters')
            <a
                href="{{ route('surat-masuk.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 hover:bg-blue-700 transition duration-200"
            >
                <span class="text-lg leading-none">+</span>
                Tambah Surat
            </a>
        @endcan

    </div>

    {{-- SUCCESS NOTIFICATION --}}
    @if (session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 shrink-0"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
            </svg>

            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- SEARCH AND FILTER --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

        <form
            method="GET"
            action="{{ route('surat-masuk.index') }}"
            class="grid grid-cols-1 md:grid-cols-12 gap-4"
        >

            {{-- SEARCH --}}
            <div class="md:col-span-6">
                <label for="q" class="block text-sm font-semibold text-slate-700 mb-2">
                    Pencarian
                </label>

                <input
                    type="text"
                    id="q"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Nomor, pengirim, atau perihal..."
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
                >
            </div>

            {{-- CATEGORY FILTER --}}
            <div class="md:col-span-4">
                <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-2">
                    Filter Kategori
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
                >
                    <option value="">Semua kategori</option>

                    @foreach ($categories as $kategori)
                        <option
                            value="{{ $kategori->id }}"
                            @selected(request('category_id') == $kategori->id)
                        >
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- BUTTONS --}}
            <div class="md:col-span-2 flex flex-row items-end gap-2">

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition"
                >
                    Cari
                </button>

                <a
                    href="{{ route('surat-masuk.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition"
                >
                    Reset
                </a>

            </div>

        </form>

    </div>

    {{-- TABLE CARD --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- CARD HEADER --}}
        <div class="border-b border-slate-200 px-5 py-4 sm:px-6">
            <h2 class="text-base font-bold text-slate-800">
                Data Surat Masuk
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Daftar surat yang telah tercatat dalam sistem.
            </p>
        </div>

        {{-- RESPONSIVE TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[850px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="w-16 px-5 py-4 font-semibold">No</th>
                        <th class="px-5 py-4 font-semibold">Nomor Surat</th>
                        <th class="px-5 py-4 font-semibold">Tanggal</th>
                        <th class="px-5 py-4 font-semibold">Pengirim</th>
                        <th class="px-5 py-4 font-semibold">Perihal</th>
                        <th class="px-5 py-4 font-semibold">Kategori</th>
                        <th class="px-5 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($suratMasuk as $surat)

                        <tr class="hover:bg-blue-50/40 transition duration-150">

                            <td class="px-5 py-4 text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4 font-semibold text-[#172554]">
                                {{ $surat->nomor_surat }}
                            </td>

                            <td class="px-5 py-4 text-slate-600 whitespace-nowrap">
                                {{ $surat->tanggal }}
                            </td>

                            <td class="px-5 py-4 text-slate-700">
                                {{ $surat->pengirim }}
                            </td>

                            <td class="px-5 py-4 text-slate-600">
                                {{ $surat->perihal }}
                            </td>

                            <td class="px-5 py-4 text-slate-600">
                                {{ $surat->category?->nama ?? 'Tanpa Kategori' }}
                            </td>

                            {{-- ACTIONS --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    <a
                                        href="{{ route('surat-masuk.show', $surat->id) }}"
                                        class="inline-flex items-center rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 hover:bg-blue-100 transition"
                                    >
                                        Detail
                                    </a>

                                    @can('manage-letters')

                                        <a
                                            href="{{ route('surat-masuk.edit', $surat->id) }}"
                                            class="inline-flex items-center rounded-lg bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 hover:bg-amber-100 transition"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('surat-masuk.destroy', $surat->id) }}"
                                            method="POST"
                                            class="inline"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                onclick="return confirm('Hapus surat ini?')"
                                                class="inline-flex items-center rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-100 transition"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    @endcan

                                </div>
                            </td>

                        </tr>

                    @empty

                        {{-- EMPTY STATE --}}
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400 mb-3">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-7 h-7"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.6"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5v12.5H3.75z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6" />
                                        </svg>
                                    </div>

                                    <p class="font-semibold text-slate-700">
                                        Belum ada surat masuk
                                    </p>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Data surat masuk belum tersedia.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-t border-slate-200 bg-white px-5 py-4 sm:px-6">

            <p class="text-sm text-slate-500">
                Halaman
                <span class="font-semibold text-slate-800">
                    {{ $suratMasuk->currentPage() }}
                </span>
                dari
                <span class="font-semibold text-slate-800">
                    {{ $suratMasuk->lastPage() }}
                </span>
            </p>

            <div class="flex items-center gap-2">

                @if ($suratMasuk->previousPageUrl())
                    <a
                        href="{{ $suratMasuk->appends(request()->query())->previousPageUrl() }}"
                        class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition"
                    >
                        Sebelumnya
                    </a>
                @else
                    <span class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-400 cursor-not-allowed">
                        Sebelumnya
                    </span>
                @endif

                @if ($suratMasuk->nextPageUrl())
                    <a
                        href="{{ $suratMasuk->appends(request()->query())->nextPageUrl() }}"
                        class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 transition"
                    >
                        Berikutnya
                    </a>
                @else
                    <span class="inline-flex items-center justify-center rounded-lg bg-blue-300 px-4 py-2 text-sm font-semibold text-white cursor-not-allowed">
                        Berikutnya
                    </span>
                @endif

            </div>

        </div>

    </div>

</div>

@endsection