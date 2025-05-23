@extends('layouts.backend.app')

@section('title')
    Jadwal Pelajaran
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
                    <h2> Jadwal Pelajaran</h2>
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
                                    <h4 class="card-title">Jadwal Pelajaran  <a href=" {{route('program-studi.create')}} " class="btn btn-primary">Tambah</a></h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Hari</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Waktu</th>
                                                <th>Kelas</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach ($jurusan as $key => $jurusans)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$jurusans->hari}} </td>
                                                    <td> {{$jurusans->pelajaran}} </td>
                                                    <td> {{$jurusans->jam_mulai}} - {{$jurusans->jam_selesai}} </td>
                                                    <td> {{$jurusans->kelas ? $jurusans->kelas->nama : 'Tidak ada kelas'}} </td>
                                                    <td> {{$jurusans->is_active == 0 ? 'Tidak Aktif' : 'Aktif'}} </td>
                                                    <td>
                                                        <a href=" {{route('program-studi.edit', $jurusans->id)}} " class="btn btn-success btn-sm">Edit</a>

                                                        <form action="{{ route('program-studi.destroy', $jurusans->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                                     @csrf
                                                      @method('DELETE')
                                                      <button class="btn btn-danger btn-sm">Hapus</button>
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