@extends('layouts.main')
@section('title', 'Tambah Pendaftar')

@section('notif')
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">{{$daftars->count()}}</span>
    </a>
    @foreach ($daftars as $daftar)
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
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
        {{-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> --}}
    </div>
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Tambah Pendaftar</h2>
        <a class="btn btn-primary" style="float: right;" href="{{ route('pendaftar.index') }}"> Back</a>
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

<form action="{{ route('pendaftar.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
     <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Calon Siswa:</strong>
                <input type="text" name="siswa" class="form-control" placeholder="Nama Calon Siswa" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Orang Tua Calon Siswa</strong>
                <input type="text" name="ortu" class="form-control" placeholder="Nama Orang Tua Calon Siswa" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Lahir</strong>
                <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir:</strong>
                <input type="date" name="tgl_lahir" class="form-control datepicker" placeholder="yyyy/mm/dd" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Jenis Kelamin</label>
	            <select class="form-control" name="jenis_kelamin" required>
	                <option value="laki-laki">Laki-laki</option>
	                <option value="perempuan">Perempuan</option>
	            </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp/WA:</strong>
                <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon atau WA" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="bayar">Ijazah PAUD</label>
                <input type="file" name="sekolah" accept="image/jpeg,image/jpg,image/png">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="bayar">Bukti Pembayaran</label>
                <input type="file" name="bayar" accept="image/jpeg,image/jpg,image/png" required>
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