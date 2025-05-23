@extends('layouts.backend.app')

@section('title')
    Kegiatan
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Kegiatan</h2>
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
                                    <h4 class="card-title">Kegiatan  <a href=" {{route('backend-kegiatan.create')}} " class="btn btn-primary">Tambah</a></h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                         <tr>
                                            <th></th>
                                            <th>No</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Slug</th>
                                            <th>Gambar</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                    </tr>
                                </thead>
                                        <tbody>
                                           @foreach ($kegiatan as $key => $kegiatans)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$kegiatans->nama_kegiatan}} </td>
                                                    <td> {{$kegiatans->slug}} </td>
                                                    <td> {{$kegiatans->gambar}} </td>
                                                    <td> {{$kegiatans->tanggal}} </td>
                                                    <td> {{$kegiatans->deskripsi}} </td>
                                                    <td> {{$kegiatans->is_active == 1 ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    <td>
                                                        <a href=" {{route('backend-kegiatan.edit', $kegiatans->id)}} " class="btn btn-success btn-sm">Edit</a>
                                                        <form action="{{ route('backend-kegiatan.destroy', $kegiatans->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">Hapus</button>
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