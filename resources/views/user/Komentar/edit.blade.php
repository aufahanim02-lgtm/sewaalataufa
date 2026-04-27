@extends('layouts.appuser')

@section('content')
<h2>Edit Komentar</h2>

<form action="{{ route('komentar.update', $data->id) }}" method="POST">
@csrf
@method('PUT')

<p>Komentar</p>
<textarea name="isikomentar">{{ $data->isikomentar }}</textarea>

<br><br>
<button type="submit">Update</button>
</form>
@endsection