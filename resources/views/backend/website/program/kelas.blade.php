@extends('layouts.backend.app')

@section('content')
<h3>Daftar Murid {{ $kelas->nama ?? 'A' }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tahun Ajaran</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($murid as $key => $item)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->muridDetail->jenis_kelamin ?? '-' }}</td>
            <td>2023/2024</td>
            <td>{{ $item->status }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Tidak ada murid di kelas ini</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
