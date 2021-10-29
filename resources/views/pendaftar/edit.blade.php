@extends('layouts.main')   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pendaftar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pendaftar.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('pendaftar.update',$pendaftar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Calon Siswa:</strong>
                    <input type="text" name="siswa" value="{{ $pendaftar->siswa }}" class="form-control" placeholder="Nama Calon Siswa">
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Orang Tua:</strong>
                <input type="text" name="ortu" value="{{ $pendaftar->ortu }}" class="form-control" placeholder="Nama Orang Tua Calon Siswa">
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
	                <option value="laki-laki">Laki-laki</option>
	                <option value="perempuan">Perempuan</option>
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
                <strong>No. Telp (WA):</strong>
                <input type="text" name="no_telp" value="{{ $pendaftar->no_telp }}" class="form-control" placeholder="Masukkan no telp (WA)">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $pendaftar->email }}" class="form-control" placeholder="Masukkan Email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sekolah Asal:</strong>
                <input type="text" name="sekolah" value="{{ $pendaftar->sekolah }}" class="form-control" placeholder="Sekolah asal">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="bayar">Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bayar" value="{{ $pendaftar->bayar }}">
                <img width="150px" src="{{asset('storage/'.$pendaftar->bayar)}}">
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection