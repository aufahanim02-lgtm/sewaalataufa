@extends('layouts.appuser')

@section('content')
<h2>Data Komentar</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Artikel</th>
        <th>Penyewa</th>
        <th>Komentar</th>
        <th>Aksi</th>
    </tr>

    @foreach($data as $i => $d)
    <tr>
        <td>{{ $i+1 }}</td>
        <td>{{ $d->artikel->judul ?? '-' }}</td>
        <td>{{ $d->penyewa->nama ?? '-' }}</td>
        <td>{{ $d->isikomentar }}</td>
        <td>
            <a href="{{ route('komentar.show', $d->id) }}">Detail</a> |
            <a href="{{ route('komentar.edit', $d->id) }}">Edit</a> |
            <form action="{{ route('komentar.delete', $d->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection