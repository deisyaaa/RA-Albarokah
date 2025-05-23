@extends('layouts.backend.app')

@section('title')
    Event
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif

<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Event</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Event 
                                        <a href="{{ route('backend-event.create') }}" class="btn btn-primary">Tambah</a> 
                                    </h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jenis Event</th>                   
                                                <th>Lokasi</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach ($event as $key => $events)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $events->title }}</td>
                                                    <td>
                                                        <span class="badge badge-pill 
                                                            @if($events->jenis_event == '1') badge-primary
                                                            @elseif($events->jenis_event == '2') badge-success  
                                                            @else badge-warning
                                                            @endif">
                                                            Event {{ $events->jenis_event }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $events->lokasi }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($events->acara)->format('d M Y H:i') }}</td>
                                                    <td>
                                                        <span class="badge badge-pill {{ $events->is_active == '0' ? 'badge-success' : 'badge-secondary' }}">
                                                            {{ $events->is_active == '0' ? 'Aktif' : 'Tidak Aktif' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('backend-event.edit', $events->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                        <form action="{{ route('backend-event.destroy', $events->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection