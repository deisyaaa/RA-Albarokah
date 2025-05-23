@extends('layouts.backend.app')

@section('title')
    Guru
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
                    <h2> Guru</h2>
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
                                    <h4 class="card-title">Guru <a href=" {{route('backend-pengguna-pengajar.create')}} " class="btn btn-primary">Tambah</a> </h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Mengajar</th>
                                                <th>NIP</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                           @foreach ($pengajar as $key => $pengajars)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$pengajars->name}} </td>
                                                    <td> {{$pengajars->userDetail->mengajar}} </td>
                                                    <td> {{$pengajars->userDetail->nip}} </td>
                                                    <td> {{$pengajars->email}} </td>
                                                    <td> {{$pengajars->status == 'Aktif' ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    <td class="d-flex">
                                                    <a href="{{ route('backend-pengguna-pengajar.edit', $pengajars->id) }}" class="btn btn-success btn-sm mr-1">Edit</a>
                                                    <form action="{{ route('backend-pengguna-pengajar.destroy', $pengajars->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengajar ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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