@extends('layouts.menu')

@section('title', 'Dashboard')

@section('notif')
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <span class="badge badge-danger badge-counter">{{$alerts->count()}}</span>
        </a>
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        @foreach ($alerts as $alert)
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{$alert->tanggal}}</div>
                    <span class="font-weight-bold">{{$alert->judul}}</span>
                    <div class="small text-black-500">{{$alert->isi}}</div>
                </div>
            </a>
            @endforeach
        </div>
    </li>
@endsection

@section('content')
<div class="container">
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<a href="#" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-flag"></i>
    </span>
    <span class="text">Pengumuman</span>
</a>
<div class="my-2"></div>

<!-- Collapsable Card Example -->
@foreach ($pengumumans as $pengumuman)
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
        role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">{{$pengumuman->judul}}</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            {{$pengumuman->tanggal}} <br>
            {{$pengumuman->isi}}
        </div>
    </div>
</div>
@endforeach

<div class="my-2"></div>
<a href="#" class="btn btn-success btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-right"></i>
    </span>
    <span class="text">Selamat Datang</span>
</a>
<div class="my-2"></div>


<!-- Content Row -->
<center>
<div class="row">
<div class="card shadow mb-4">
    <div class="card-body">
        <center><h1><b><p>SELAMAT DATANG DI</p></h1></center>
        <center><h1><b>PPDB RA. QURROTA A'YUN</h1></center>
        <br><br>
        <img src="{{asset('images/g.png')}}" >

    </div>
</div>
</div>
</center>
</div>

<!-- /.container-fluid -->
</div>
@endsection
