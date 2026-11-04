@extends('layouts.app')
@section('title', 'Detail Surat Keluar')
@section('content')
<h1>Detail Surat Keluar</h1>
<p><strong>Nomor Surat : </strong>{{ $surat->nomor_surat }}</p>
<p><strong>Tanggal : </strong>{{ $surat->tanggal }}</p>
<p><strong>Pengirim : </strong>{{ $surat->pengirim }}</p>
<p><strong>Perihal : </strong>{{ $surat->perihal }}</p>
<p><strong>Keterangan : </strong>{{ $surat->keterangan }}</p>
<a href="{{ route('surat-keluar.index') }}">Kembali Ke Daftar Surat</a>
@endsection