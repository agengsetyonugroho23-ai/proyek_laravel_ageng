@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- PAGE HEADER --}}
    <div>
        <p class="text-sm font-medium text-blue-600 mb-1">
            MANAJEMEN SURAT
        </p>

        <h1 class="text-2xl sm:text-3xl font-bold text-[#172554]">
            Edit Surat Masuk
        </h1>

        <p class="text-sm text-slate-500 mt-2">
            Perbarui informasi surat masuk yang telah tercatat.
        </p>
    </div>

    {{-- FORM CARD --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200">
            <h2 class="font-bold text-slate-800">
                Perbarui Informasi Surat
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Pastikan informasi yang diperbarui sudah benar.
            </p>
        </div>

        <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NOMOR SURAT --}}
                <div>
                    <label for="nomor_surat" class="block text-sm font-semibold text-slate-700 mb-2">
                        Nomor Surat
                    </label>

                    <input type="text" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" placeholder="Masukkan nomor surat" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 @error('nomor_surat') border-red-400 @enderror">
                    @error('nomor_surat')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- TANGGAL --}}
                <div>
                    <label for="tanggal" class="block text-sm font-semibold text-slate-700 mb-2">
                        Tanggal
                    </label>

                    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 @error('tanggal') border-red-400 @enderror">

                    @error('tanggal')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- PENGIRIM --}}
                <div>
                    <label for="pengirim" class="block text-sm font-semibold text-slate-700 mb-2">
                        Pengirim
                    </label>

                    <input
                        type="text"
                        id="pengirim"
                        name="pengirim"
                        value="{{ old('pengirim', $surat->pengirim) }}"
                        placeholder="Masukkan nama pengirim"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 @error('pengirim') border-red-400 @enderror"
                    >

                    @error('pengirim')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- PERIHAL --}}
                <div>
                    <label for="perihal" class="block text-sm font-semibold text-slate-700 mb-2">
                        Perihal
                    </label>

                    <input
                        type="text"
                        id="perihal"
                        name="perihal"
                        value="{{ old('perihal', $surat->perihal) }}"
                        placeholder="Masukkan perihal surat"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 @error('perihal') border-red-400 @enderror"
                    >

                    @error('perihal')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- KATEGORI --}}
                <div class="md:col-span-2">
                    <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-2">
                        Kategori Surat
                    </label>

                    <select
                        id="category_id"
                        name="category_id"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 @error('category_id') border-red-400 @enderror"
                    >
                        <option value="">-- Tanpa kategori --</option>

                        @foreach ($categories as $kategori)
                            <option
                                value="{{ $kategori->id }}"
                                @selected(old('category_id', $surat->category_id ?? '') == $kategori->id)
                            >
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            {{-- KETERANGAN --}}
            <div>
                <label for="keterangan" class="block text-sm font-semibold text-slate-700 mb-2">
                    Keterangan
                </label>

                <textarea
                    id="keterangan"
                    name="keterangan"
                    rows="4"
                    placeholder="Masukkan keterangan tambahan jika ada"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 outline-none transition resize-y focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 @error('keterangan') border-red-400 @enderror"
                >{{ old('keterangan', $surat->keterangan) }}</textarea>

                @error('keterangan')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- LAMPIRAN --}}
            <div>
                <label for="lampiran" class="block text-sm font-semibold text-slate-700 mb-2">
                    Lampiran
                </label>

                <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4">

                    <input
                        type="file"
                        id="lampiran"
                        name="lampiran"
                        accept=".pdf,.jpg,.jpeg,.png"
                        class="block w-full text-sm text-slate-600 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100"
                    >

                    <p class="mt-2 text-xs text-slate-500">
                        Format yang didukung: PDF, JPG, JPEG, PNG. Maksimal ukuran file 2 MB.
                    </p>

                    @if ($surat->lampiran)
                        <div class="mt-4 rounded-lg border border-blue-100 bg-blue-50 p-3">
                            <p class="text-sm font-medium text-slate-700">
                                Lampiran saat ini:
                            </p>

                            <a
                                href="{{ asset('storage/' . $surat->lampiran) }}"
                                target="_blank"
                                rel="noopener"
                                class="mt-1 inline-flex items-center gap-2 text-sm font-semibold text-blue-700 hover:text-blue-800"
                            >
                                <span>Lihat lampiran saat ini</span>
                            </a>

                            <p class="mt-1 text-xs text-slate-500">
                                Pilih file baru jika ingin mengganti lampiran.
                            </p>
                        </div>
                    @endif

                </div>

                @error('lampiran')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- FORM ACTIONS --}}
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 border-t border-slate-200 pt-5">

                <a
                    href="{{ route('surat-masuk.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 hover:bg-blue-700 transition"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection