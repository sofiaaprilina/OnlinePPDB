@extends('layouts.main')
@section('title', 'Detail Data Siswa') 
@section('notif')
    <li class="nav-item dropdown no-arrow mx-1">
        @php
            $jumlah = $daftars->count() + $alerts->count();
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
                <h2> Detail Siswa Baru</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('siswa.index') }}"> Back</a>
            </div>
        </div>
    </div><br>
    <a href="#" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-user"></i>
        </span>
        <span class="text">A. Identitas Calon Siswa</span>
    </a>
    <div class="my-2"></div>
            <div class="table">
                <table width="1000px">
                    <tr>
                        <td><strong>Nama Calon Siswa    : </strong></td>
                        <td>{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tempat,Tanggal Lahir    : </strong></td>
                        <td>{{ $siswa->tempat }}, {{ $siswa->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Kelamin       : </strong></td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td><strong>Agama          : </strong></td>
                        <td>{{ $siswa->agama }}</td>
                    </tr>
                    <tr>
                        <td><strong>Alamat          : </strong></td>
                        <td>{{ $siswa->alamat }}</td>
                    </tr>
                </table>
                <a href="#" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="text">B. Identitas Orang Tua / Wali Calon Siswa</span>
                </a>
                <div class="my-2"></div>
                <table width="1000px">
                    <tr>
                        <td><strong>Nama Ayah   : </strong></td>
                        <td>{{ $siswa->nm_ayah }}</td>
                    </tr>
                    <tr>
                        <td><strong>Pekerjaan Ayah   : </strong></td>
                        <td>{{ $siswa->kj_ayah }}</td>
                    </tr>
                    <tr>
                        <td><strong>Penghasilan Ayah   : </strong></td>
                        <td>{{ $siswa->ph_ayah }}</td>
                    </tr>
                    <tr>
                        <td><strong>No Telp Ayah   : </strong></td>
                        <td>{{ $siswa->no_ayah }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status Ayah   : </strong></td>
                        <td>{{ $siswa->status_ayah }}</td>
                    </tr>
                    <tr> 
                        <td><strong>Nama Ibu   : </strong></td>
                        <td>{{ $siswa->nm_ibu }}</td>
                    </tr>
                    <tr>
                        <td><strong>Pekerjaan Ibu   : </strong></td>
                        <td>{{ $siswa->kj_ibu }}</td>
                    </tr>
                    <tr>
                        <td><strong>Penghasilan Ibu   : </strong></td>
                        <td>{{ $siswa->ph_ibu }}</td>
                    </tr>
                    <tr>
                        <td><strong>No Telp Ibu   : </strong></td>
                        <td>{{ $siswa->no_ibu }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status Ibu   : </strong></td>
                        <td>{{ $siswa->status_ibu }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Wali   : </strong></td>
                        <td>{{ $siswa->nm_wali }}</td>
                    </tr>
                    <tr>
                        <td><strong>Pekerjaan Wali   : </strong></td>
                        <td>{{ $siswa->kj_wali }}</td>
                    </tr>
                    <tr>
                        <td><strong>Penghasilan Wali   : </strong></td>
                        <td>{{ $siswa->ph_wali }}</td>
                    </tr>
                    <tr>
                        <td><strong>No Telp Wali   : </strong></td>
                        <td>{{ $siswa->no_wali }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggungan Orang Tua   : </strong></td>
                        <td>{{ $siswa->tanggungan }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email           : </strong></td>
                        <td>{{ $siswa->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Akte Kelahiran : </strong></td>
                        <td><img width="150px" src="{{asset('uploads/'.$siswa->akte)}}" data-action="zoom"></td>
                    </tr>
                    <tr>
                        <td><strong>Kartu Keluarga : </strong></td>
                        <td><img width="150px" src="{{asset('uploads/'.$siswa->kk)}}" data-action="zoom"></td>
                    </tr>
                    <tr>
                        <td><strong>KTP Orang Tua : </strong></td>
                        <td><img width="150px" src="{{asset('uploads/'.$siswa->ktp)}}" data-action="zoom"></td>
                    </tr>
                    <tr>
                        <td><strong>Slip Gaji : </strong></td>
                        <td><img width="150px" src="{{asset('uploads/'.$siswa->gaji)}}" data-action="zoom"></td>
                    </tr>
                </table>
            </div>
        </div>
     </div>
@endsection