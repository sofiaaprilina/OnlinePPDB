@extends('layouts.main')
@section('title', 'Edit Data Pendaftar')   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>Edit Pendaftar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pendaftar.index') }}"> Back</a>
            </div>
            <br>
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
   
        <div class="card shadow">
            <div class="card-body"> 
        <div class="row">
            <div class="table">
                <table width="1000px">
                    <tr>
                        <td><strong>Nama Calon Siswa:</strong></td>
                        <td><input type="text" name="siswa" value="{{ $pendaftar->siswa }}" class="form-control" placeholder="Nama Calon Siswa"></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Orang Tua:</strong></td>
                        <td><input type="text" name="ortu" value="{{ $pendaftar->ortu }}" class="form-control" placeholder="Nama Orang Tua Calon Siswa"></td>
                    </tr>
                    <tr>
                        <td><strong>Tempat Lahir:</strong></td>
                        <td><input type="text" name="tempat" value="{{ $pendaftar->tempat }}" class="form-control" placeholder="Tempat Lahir"></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Lahir:</strong></td>
                        <td><input type="date" name="tgl_lahir" value="{{ $pendaftar->tgl_lahir}}" class="form-control datepicker" placeholder="yyyy/mm/dd"></td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Kelamin:</strong></td>
                        <td>
                            <select class="form-control" name="jenis_kelamin">
                                <option value="{{ $pendaftar->jenis_kelamin}}">{{ $pendaftar->jenis_kelamin}}</option>
	                            <option value="laki-laki">Laki-laki</option>
	                            <option value="perempuan">Perempuan</option>
	                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Alamat:</strong></td>
                        <td><input type="text" name="alamat" value="{{ $pendaftar->alamat }}" class="form-control" placeholder="Alamat"></td>
                    </tr>
                    <tr>
                        <td><strong>No. Telp (WA):</strong></td>
                        <td><input type="text" name="no_telp" value="{{ $pendaftar->no_telp }}" class="form-control" placeholder="Masukkan no telp (WA)"></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><input type="text" name="email" value="{{ $pendaftar->email }}" class="form-control" placeholder="Masukkan Email"></td>
                    </tr>
                    <tr>
                        <td><strong>Ijazah PAUD</strong></td>
                        <td><input type="file" name="sekolah" value="{{ $pendaftar->sekolah }}"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><img width="150px" src="{{asset('uploads/ijazahPaud/'.$pendaftar->sekolah)}}"></td>
                    </tr>
                    <tr>
                        <td><strong>Bukti Pembayaran</strong></td>
                        <td><input type="file" class="form-control" name="bayar" value="{{ $pendaftar->bayar }}"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><img width="150px" src="{{asset('storage/'.$pendaftar->bayar)}}"></td>
                    </tr>
                </table>
                <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

            </div>
        </div>
   
    </form>
@endsection