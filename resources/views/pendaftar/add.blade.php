@extends('layouts.main')
@section('title', 'Tambah Pendaftar')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Tambah Data Siswa</h2>
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

<form action="{{ route('pendaftar.olah',$pendaftar->id) }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
     <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ID Pendaftar:</strong>
                            <input type="text" name="idPendaftar" value="{{ $pendaftar->id }}" class="form-control" placeholder="Nama Calon Siswa">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Siswa:</strong>
                            <input type="text" name="nama" value="{{ $pendaftar->siswa }}" class="form-control" placeholder="Nama Calon Siswa">
                        </div>
                    </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tempat Lahir:</strong>
                        <input type="text" name="tempat" value="{{ $pendaftar->tempat }}" class="form-control" placeholder="Tempat Lahir">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal Lahir:</strong>
                        <input type="date" name="tgl_lahir" value="{{ $pendaftar->tgl_lahir}}" class="form-control datepicker" placeholder="yyyy/mm/dd">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jenis Kelamin:</strong>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="{{ $pendaftar->jenis_kelamin}}">{{ $pendaftar->jenis_kelamin}}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        <input type="text" name="alamat" value="{{ $pendaftar->alamat }}" class="form-control" placeholder="Alamat">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" value="{{ $pendaftar->email }}" class="form-control" placeholder="Masukkan Email">
                    </div>
                </div>
                
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</form>
@endsection