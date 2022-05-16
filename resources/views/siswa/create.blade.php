@extends('layouts.main')
@section('title', 'Tambah Siswa')
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
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Siswa</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="float: right;" href="{{ route('siswa.index') }}"> Back</a>
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

<form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Calon Siswa:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama Calon Siswa">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Lahir</strong>
                <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir:</strong>
                <input type="date" name="tgl_lahir" class="form-control datepicker" placeholder="yyyy/mm/dd">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Jenis Kelamin</label>
	            <select class="form-control" name="jenis_kelamin">
	                <option value="laki-laki">Laki-laki</option>
	                <option value="perempuan">Perempuan</option>
	            </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agama:</strong>
                <input type="text" name="agama" class="form-control" placeholder="Agama">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ayah:</strong>
                <input type="text" name="nm_ayah" class="form-control" placeholder="Nama Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Ayah:</strong>
                <input type="text" name="kj_ayah" class="form-control" placeholder="Pekerjaan Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telp Ayah:</strong>
                <input type="text" name="no_ayah" class="form-control" placeholder="Nomor Telp atau WA Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ibu:</strong>
                <input type="text" name="nm_ibu" class="form-control" placeholder="Nama Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Ibu:</strong>
                <input type="text" name="kj_ibu" class="form-control" placeholder="Pekerjaan Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telp Ibu:</strong>
                <input type="text" name="no_ibu" class="form-control" placeholder="Nomor Telp atau WA Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Wali:</strong>
                <input type="text" name="nm_wali" class="form-control" placeholder="Nama Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Wali:</strong>
                <input type="text" name="kj_wali" class="form-control" placeholder="Pekerjaan Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telp Wali:</strong>
                <input type="text" name="no_wali" class="form-control" placeholder="Nomor Telp atau WA Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Masukkan email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="akte">Akte Kelahiran</label>
                <input type="file" name="akte" accept="image/jpeg,image/jpg,image/png">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="kk">Kartu Keluarga</label>
                <input type="file" name="kk" accept="image/jpeg,image/jpg,image/png">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="ktp">KTP Orang Tua</label>
                <input type="file" name="ktp" accept="image/jpeg,image/jpg,image/png">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="ktp">Slip Gaji</label>
                <input type="file" name="gaji" accept="image/jpeg,image/jpg,image/png">
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