@extends('layouts.backend.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Jadwal Pelajaran - {{ $kelas->nama }}</h5>
                </div>
                <div class="card-body">
                    @if($jurusan->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Pelajaran</th>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                </tr>
                            </thead>
                         <tbody>
                                @foreach($jurusan as $item)
                                    <tr>
                                        <td>{{ $item->pelajaran }}</td>
                                        <td>{{ $item->hari }}</td>
                                        <td>{{ $item->jam_mulai }}</td>
                                        <td>{{ $item->jam_selesai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            Tidak ada jadwal pelajaran untuk kelas ini.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection