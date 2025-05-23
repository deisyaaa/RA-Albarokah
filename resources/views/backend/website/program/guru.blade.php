@extends('layouts.backend.app')

@section('content')
<h3>Jadwal Pelajaran {{ $kelas->nama ?? 'A' }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
        <th>Hari</th>
        <th>Mata Pelajaran</th>
        <th>Waktu</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jurusan as $item)
        <tr>
            <td>{{ $item->hari }}</td>
            <td>{{ $item->pelajaran }}</td>
            <td>
                {{ Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - 
                {{ Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
            </td>
            <td>{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
