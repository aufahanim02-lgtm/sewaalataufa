@extends('layouts.appuser')

@section('content')
<h2>Tambah Komentar</h2>

<form action="{{ route('komentar.store') }}" method="POST">
@csrf

<p>ID Artikel</p>
<input type="number" name="artikelid">

<p>Komentar</p>
<textarea name="isikomentar"></textarea>

<br><br>
<button type="submit">Simpan</button>
</form>
@endsection