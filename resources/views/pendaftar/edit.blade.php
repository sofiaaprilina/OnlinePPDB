@extends('layouts.main')
@section('title', 'Edit Data Pendaftar')
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
                        <td><img width="150px" src="{{asset('buktiPendaftaran/'.$pendaftar->bayar)}}"></td>
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