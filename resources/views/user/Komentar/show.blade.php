@extends('layouts.appuser')

@section('content')
<h2>Detail Komentar</h2>

<p><b>Artikel:</b> {{ $data->artikel->judul ?? '-' }}</p>
<p><b>Penyewa:</b> {{ $data->penyewa->nama ?? '-' }}</p>
<p><b>Komentar:</b></p>
<p>{{ $data->isikomentar }}</p>

<a href="{{ route('komentar.index') }}">Kembali</a>
@endsection