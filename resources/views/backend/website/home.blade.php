@extends('layouts.backend.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
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

            @if (Auth::user()->role == 'Admin')
                <div class="col-lg-3 col-sm-6 col-12">
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{$guru}}</h2>
                                <p class="card-text">Guru</p>
                            </div>
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="users" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$acara}}</h2>
                                    <p class="card-text">Acara</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="calendar" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{$murid}}</h2>
                                <p class="card-text">Murid</p>
                            </div>
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="user-check" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$alumni ?? 0}}</h2>
                                    <p class="card-text">Alumni</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            @endif

            <!-- Perbaikan: <di> menjadi <div> -->
            <div class="row">
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
                                    <h6 class="mb-0">{{$event->lokasi ?? '-'}}</h6>
                                    <small>kec. sempu Desa Temuasri</small>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                
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
                                    <h6 class="mb-0">{{$event2->lokasi ?? '-'}}</h6>
                                    <small>kec. sempu Desa Temuasri</small>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                
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
                                    <h6 class="mb-0">{{$event3->lokasi ?? '-'}}</h6>
                                    <small>kec. sempu Desa Temuasri</small>
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