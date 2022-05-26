@extends('layouts.main')
@section('title', 'Detail Data Pendaftar')
@section('notif')
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <?php $jumlah = $daftars->count() + $alerts->count() ?>
        <span class="badge badge-danger badge-counter"><?php echo $jumlah = $daftars->count() + $alerts->count() ?></span>
        </a>
        
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            @foreach ($daftars as $daftar)
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
<div>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Detail Pendaftar</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('pendaftar.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="table">
                <table width="1000px">
                    <tr>
                        <td><strong>Nama Calon Siswa    : </strong></td>
                        <td>{{ $pendaftar->siswa }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Orang Tua Calon Siswa    : </strong></td>
                        <td>{{ $pendaftar->ortu }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tempat,Tanggal Lahir    : </strong></td>
                        <td>{{ $pendaftar->tempat }}, {{ $pendaftar->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Kelamin       : </strong></td>
                        <td>{{ $pendaftar->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td><strong>Alamat          : </strong></td>
                        <td>{{ $pendaftar->alamat }}</td>
                    </tr>
                    <tr>
                        <td><strong>No Telepon      : </strong></td>
                        <td>{{ $pendaftar->no_telp }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email           : </strong></td>
                        <td>{{ $pendaftar->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ijazah PAUD : </strong></td>
                        <td><img width="150px" src="{{asset('uploads/ijazahPaud/'.$pendaftar->sekolah)}}" data-action="zoom"></td>
                    </tr>
                    <tr>
                        <td><strong>Bukti Pembayaran : </strong></td>
                        <td><img width="150px" src="{{asset('buktiPendaftaran/'.$pendaftar->bayar)}}" data-action="zoom"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection