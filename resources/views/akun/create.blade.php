@extends('layouts.main')
@section('title', 'Tambah Akun Pendaftar')
@section('notif')
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <span class="badge badge-danger badge-counter"><?php echo $jumlah = $pendaftars->count() + $alerts->count() ?></span>
        </a>
        
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
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Akun Pendaftar</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('pendaftar.index') }}"> Data Pendaftar</a>
            <a class="btn btn-primary" style="float: right;" href="{{ route('akun.index') }}"> Back</a>
        </div>
    </div>
</div>
<br>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Pendaftar: </strong>
                <select name="idPendaftar" class="form-control" id="idPendaftar" required = 'required' >
                    @foreach ($pendaftars as $p)
                        <option value="{{$p->id}}">{{$p->id}} | {{$p->siswa}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Calon Siswa: </strong>
                <select name="name" class="form-control" id="name" required = 'required' >
                    @foreach ($pendaftars as $p)
                        <option value="{{$p->siswa}}">{{$p->id}} | {{$p->siswa}}</option>
                    @endforeach
                    </select>
                {{-- <input type="text" name="name" class="form-control" placeholder="Nama Calon Siswa"> --}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email: </strong>
                <select name="email" class="form-control" id="email" required = 'required' >
                @foreach ($pendaftars as $p)
                    <option value="{{$p->email}}">{{$p->id}} | {{$p->email}}</option>
                @endforeach
                </select>
                {{-- <input type="text" name="email" class="form-control" placeholder="Email "> --}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username: </strong>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
        </div>
    </div>
   
</form>
@endsection