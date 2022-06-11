@extends('layouts.main')

@section('title', 'Dashboard')

@section('notif')
    <li class="nav-item dropdown no-arrow mx-1">
        @php
            $jumlah = $pendaftars->count() + $alerts->count();
        @endphp
        @if ($jumlah > 0)
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">{{$jumlah}}</span>
            </a>
        @else
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter"></span>
            </a>
        @endif
        
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            @foreach ($pendaftars as $daftar)
            <a class="dropdown-item d-flex align-items-center" href="/pendaftar">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{$daftar->tgl_daftar}}</div>
                    <span class="font-weight-bold">Pendaftar: {{$daftar->siswa}} {{$daftar->status}}</span>
                </div>
            </a>
            @endforeach
            @foreach ($alerts as $alert)
            <a class="dropdown-item d-flex align-items-center" href="/siswa">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{$alert->created_at}}</div>
                    <span class="font-weight-bold">Berkas: {{$alert->nama}} {{$alert->berkas}}</span>
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

<!-- Content Row -->
<div class="row">
   
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a href="/pendaftar">
            <div class="card-body"> 
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Pendaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$daftars->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <a href="/akun">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Akun Pendaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <a href="/siswa">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Berkas & Biodata</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$siswas->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <a href="/seleksi">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hasil Seleksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$seleksi->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-info fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            @if ($confirms->count() > 0 || $checks->count() > 0 || $seleksi->count() > 0)
            <div class="card-body">
                <?php $blm = round($confirms->count() / $daftars->count() * 100,2); ?>
                @if ($confirms->count() > 0)
                    <h4 class="small font-weight-bold">Pendaftar Terkonfirmasi <span
                            class="float-right">{{$blm}}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$blm}}%"
                            aria-valuenow="{{$blm}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> 
                @endif
                <?php $berkas = round($checks->count() / $siswas->count() * 100,2); ?>
                @if ($checks->count() > 0)
                    <h4 class="small font-weight-bold">Berkas Terkonfirmasi <span class="float-right">{{$berkas}}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{$berkas}}%" aria-valuenow="{{$berkas}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                @endif
                <?php $lolos = round($seleksi->count() / 125 * 100,2); ?>
                @if ($seleksi->count() > 0)
                    <h4 class="small font-weight-bold">Lolos Seleksi <span class="float-right">{{$lolos}}%</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$lolos}}%" aria-valuenow="{{$lolos}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                @endif
            </div> 
            @endif  
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
</div>
@endsection
