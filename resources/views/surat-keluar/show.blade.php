@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- PAGE HEADER --}}
    <div>
        <p class="text-sm font-medium text-blue-600 mb-1">
            MANAJEMEN SURAT
        </p>

        <h1 class="text-2xl sm:text-3xl font-bold text-[#172554]">
            Detail Surat Keluar
        </h1>

        <p class="text-sm text-slate-500 mt-2">
            Informasi lengkap mengenai surat keluar yang dipilih.
        </p>
    </div>

    {{-- DETAIL CARD --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        {{-- CARD HEADER --}}
        <div class="border-b border-slate-200 bg-slate-50 px-6 py-5">
            <div class="flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5v12.5H3.75z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6" />
                    </svg>
                </div>

                <div>
                    <h2 class="font-bold text-slate-800">
                        Informasi Surat
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Rincian data surat masuk
                    </p>
                </div>

            </div>
        </div>
        
        <div class="p-6 space-y-5">

            {{-- NOMOR SURAT --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-4">
                <p class="text-sm font-semibold text-slate-500">
                    Nomor Surat
                </p>

                <p class="text-sm font-medium text-slate-800 sm:col-span-2">
                    {{ $surat->nomor_surat }}
                </p>
            </div>

            <div class="border-t border-slate-100"></div>

            {{-- TANGGAL --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-4">
                <p class="text-sm font-semibold text-slate-500">
                    Tanggal
                </p>

                <p class="text-sm font-medium text-slate-800 sm:col-span-2">
                    {{ $surat->tanggal }}
                </p>
            </div>

            <div class="border-t border-slate-100"></div>

            {{-- PENGIRIM --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-4">
                <p class="text-sm font-semibold text-slate-500">
                    Pengirim
                </p>

                <p class="text-sm font-medium text-slate-800 sm:col-span-2">
                    {{ $surat->pengirim }}
                </p>
            </div>

            <div class="border-t border-slate-100"></div>

            {{-- PERIHAL --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-4">
                <p class="text-sm font-semibold text-slate-500">
                    Perihal
                </p>

                <p class="text-sm font-medium text-slate-800 sm:col-span-2">
                    {{ $surat->perihal }}
                </p>
            </div>

            <div class="border-t border-slate-100"></div>

            {{-- KATEGORI --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-semibold text-slate-500">
                    Kategori
                </dt>
                <dd class="sm:col-span-2 font-medium text-sm text-slate-800">
                    {{ $surat->category?->nama ?? 'Tanpa Kategori' }}
                </dd>
            </div>

            <div class="border-t border-slate-100"></div>

            {{-- LAMPIRAN --}}
            @if ($surat->lampiran)
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-4 py-4">
                    <dt class="text-sm font-semibold text-slate-500">
                        Lampiran
                    </dt>

                    <dd class="sm:col-span-2 text-sm text-slate-800">
                        <a
                            href="{{ asset('storage/' . $surat->lampiran) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 font-semibold text-blue-600 hover:text-blue-800 hover:underline transition"
                        >
                            Lihat Lampiran
                        </a>
                    </dd>
                </div>
            @endif

            {{-- KETERANGAN --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-4">
                <p class="text-sm font-semibold text-slate-500">
                    Keterangan
                </p>

                <p class="text-sm font-medium text-slate-700 sm:col-span-2">
                    {{ $surat->keterangan }}
                </p>
            </div>

        </div>

        {{-- CARD FOOTER --}}
        <div class="px-6 py-5 bg-slate-50 border-t border-slate-200">
            <a
                href="{{ route('surat-keluar.index') }}"
                class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 hover:bg-blue-700 transition"
            >
                Kembali ke Daftar Surat
            </a>
        </div>

    </div>

</div>

@endsection