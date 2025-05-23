@extends('layouts.backend.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="{{asset('Assets/Backend/images/pages/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                        <img src="{{asset('Assets/Backend/images/pages/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">Welcome {{Auth::user()->name}},</h1>
                            <p class="card-text m-auto w-75">
                                Have fun your day :)
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Cards - 3 Event Terpisah -->
            <div class="row">
                <!-- Event 1 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-developer-meetup">
                        <div class="meetup-img-wrapper rounded-top text-center">
                            <img src="{{asset('assets/frontend/img/foto_logo.png')}}" alt="Meeting Pic" height="170" />
                        </div>
                        <div class="card-body">
                            <!-- Badge untuk Event 1 -->
                            <div class="mb-2">
                                <span class="badge badge-primary">Event 1</span>
                            </div>
                            <div class="meetup-header d-flex align-items-center">
                                <div class="meetup-day">
                                    <h6 class="mb-0">
                                        @if($event)
                                            {{Carbon\Carbon::parse($event->acara)->format('l')}}
                                        @else
                                            -
                                        @endif
                                    </h6>
                                    <h3 class="mb-0">
                                        @if($event)
                                            {{Carbon\Carbon::parse($event->acara)->format('d')}}
                                        @else
                                            -
                                        @endif
                                    </h3>
                                </div>
                                <div class="my-auto">
                                    <h4 class="card-title mb-25">{{$event->title ?? 'Belum Ada Event'}}</h4>
                                    <p class="card-text mb-0">{{$event->desc ?? 'Belum ada deskripsi'}}</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="avatar bg-light-primary rounded mr-1">
                                    <div class="avatar-content">
                                        <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-0">
                                        @if($event)
                                            {{Carbon\Carbon::parse($event->acara)->format('d F, Y')}}
                                        @else
                                            -
                                        @endif
                                    </h6>
                                    <small>
                                        @if($event)
                                            {{Carbon\Carbon::parse($event->acara)->format('H:i')}}
                                        @else
                                            -
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="media">
                                <div class="avatar bg-light-primary rounded mr-1">
                                    <div class="avatar-content">
                                        <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-0" style="margin-top: 5px;">{{$event->lokasi ?? '-'}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-developer-meetup">
                        <div class="meetup-img-wrapper rounded-top text-center">
                            <img src="{{asset('assets/frontend/img/foto_logo.png')}}" alt="Meeting Pic" height="170" />
                        </div>
                        <div class="card-body">
                            <!-- Badge untuk Event 2 -->
                            <div class="mb-2">
                                <span class="badge badge-success">Event 2</span>
                            </div>
                            <div class="meetup-header d-flex align-items-center">
                                <div class="meetup-day">
                                    <h6 class="mb-0">
                                        @if($event2)
                                            {{Carbon\Carbon::parse($event2->acara)->format('l')}}
                                        @else
                                            -
                                        @endif
                                    </h6>
                                    <h3 class="mb-0">
                                        @if($event2)
                                            {{Carbon\Carbon::parse($event2->acara)->format('d')}}
                                        @else
                                            -
                                        @endif
                                    </h3>
                                </div>
                                <div class="my-auto">
                                    <h4 class="card-title mb-25">{{$event2->title ?? 'Belum Ada Event'}}</h4>
                                    <p class="card-text mb-0">{{$event2->desc ?? 'Belum ada deskripsi'}}</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="avatar bg-light-primary rounded mr-1">
                                    <div class="avatar-content">
                                        <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-0">
                                        @if($event2)
                                            {{Carbon\Carbon::parse($event2->acara)->format('d F, Y')}}
                                        @else
                                            -
                                        @endif
                                    </h6>
                                    <small>
                                        @if($event2)
                                            {{Carbon\Carbon::parse($event2->acara)->format('H:i')}}
                                        @else
                                            -
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="media">
                                <div class="avatar bg-light-primary rounded mr-1">
                                    <div class="avatar-content">
                                        <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-0" style="margin-top: 5px;">{{$event2->lokasi ?? '-'}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-developer-meetup">
                        <div class="meetup-img-wrapper rounded-top text-center">
                            <img src="{{asset('assets/frontend/img/foto_logo.png')}}" alt="Meeting Pic" height="170" />
                        </div>
                        <div class="card-body">
                            <!-- Badge untuk Event 3 -->
                            <div class="mb-2">
                                <span class="badge badge-warning">Event 3</span>
                            </div>
                            <div class="meetup-header d-flex align-items-center">
                                <div class="meetup-day">
                                    <h6 class="mb-0">
                                        @if($event3)
                                            {{Carbon\Carbon::parse($event3->acara)->format('l')}}
                                        @else
                                            -
                                        @endif
                                    </h6>
                                    <h3 class="mb-0">
                                        @if($event3)
                                            {{Carbon\Carbon::parse($event3->acara)->format('d')}}
                                        @else
                                            -
                                        @endif
                                    </h3>
                                </div>
                                <div class="my-auto">
                                    <h4 class="card-title mb-25">{{$event3->title ?? 'Belum Ada Event'}}</h4>
                                    <p class="card-text mb-0">{{$event3->desc ?? 'Belum ada deskripsi'}}</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="avatar bg-light-primary rounded mr-1">
                                    <div class="avatar-content">
                                        <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-0">
                                        @if($event3)
                                            {{Carbon\Carbon::parse($event3->acara)->format('d F, Y')}}
                                        @else
                                            -
                                        @endif
                                    </h6>
                                    <small>
                                        @if($event3)
                                            {{Carbon\Carbon::parse($event3->acara)->format('H:i')}}
                                        @else
                                            -
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="media">
                                <div class="avatar bg-light-primary rounded mr-1">
                                    <div class="avatar-content">
                                        <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-0" style="margin-top: 5px;">{{$event3->lokasi ?? '-'}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik Perpustakaan untuk Murid -->
            <!-- <div class="row">
                <div class="col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Perpustakaan</h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text font-small-2 mr-25 mb-0">Status Peminjaman Buku</p>
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="users" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{strtoupper(Auth::user()->username)}}</h4>
                                            @if (Auth::user()->member)
                                                <p class="card-text font-small-1 mb-0">Member sejak {{Carbon\carbon::parse(Auth::user()->member->created_at)->format('d F Y')}} </p>
                                            @else
                                                <p class="card-text font-small-1 mb-0 text-warning"> Belum menjadi member Perpustakaan</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="book-open" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{$pinjam ?? 0}}</h4>
                                            <p class="card-text font-small-3 mb-0">Buku Dipinjam</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="book" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{$lateness ?? 0}}</h4>
                                            <p class="card-text font-small-3 mb-0">Belum Dikembalikan</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection