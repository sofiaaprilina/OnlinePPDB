@extends('layouts.main')
@section('title', 'Detail Akun Pendaftar')
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
                        <h2> Detail Akun Pendaftar</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('akun.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="table">
                <table width="1000px">
                    <tr>
                        <td><strong>Nama Calon Siswa    : </strong></td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email               : </strong></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Username            : </strong></td>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <td><strong>Password            : </strong></td>
                        <td>{{ $user->decrypt }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection