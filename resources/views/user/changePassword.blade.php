@extends('layouts.menu')

@section('title', 'Dashboard')

@section('notif')
    @php
        $jumlah = 0;
    @endphp
    @foreach ($siswas as $siswa)
        @if (Auth::user()->id == $siswa->user_id)
            <?php 
                if ($siswa->agama == null || $siswa->alamat == null) {
                    $jumlah+=1;
                }
                if ($siswa->nm_ayah == null || $siswa->kj_ayah == null || $siswa->ph_ayah == null || $siswa->no_ayah == null || $siswa->nm_ibu == null || $siswa->kj_ibu == null || $siswa->ph_ibu == null || $siswa->no_ibu == null || $siswa->tanggungan == null || $siswa->email == null) {
                    $jumlah+=1;
                }
                if ($siswa->akte == null) {
                    $jumlah+=1;
                }
                if ($siswa->kk == null) {
                    $jumlah+=1;
                }
                if ($siswa->ktp == null) {
                    $jumlah+=1;
                }
            ?>
        @endif
    @endforeach
    <li class="nav-item dropdown no-arrow mx-1">
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
        
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            @foreach ($siswas as $siswa)
                @if (Auth::user()->id == $siswa->user_id)
                    @if ($siswa->agama == null || $siswa->alamat == null)
                        <a class="dropdown-item d-flex align-items-center" href="/biodata">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Melengkapi Identitas Calon Siswa</span>
                                <div class="small text-black-500">Isian identitas calon siswa belum lengkap. Segera lengkapi isian yang dibutuhkan.</div>
                            </div>
                        </a>
                    @endif
                    @if ($siswa->nm_ayah == null || $siswa->kj_ayah == null || $siswa->ph_ayah == null || $siswa->no_ayah == null || $siswa->nm_ibu == null || $siswa->kj_ibu == null || $siswa->ph_ibu == null || $siswa->no_ibu == null || $siswa->tanggungan == null || $siswa->email == null)
                        <a class="dropdown-item d-flex align-items-center" href="/biodata">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Melengkapi Identitas Orang Tua / Wali</span>
                                <div class="small text-black-500">Isian identitas orang tua / wali calon siswa belum lengkap. Segera lengkapi isian yang dibutuhkan.</div>
                            </div>
                        </a>
                    @endif
                    @if ($siswa->akte == null)
                        <a class="dropdown-item d-flex align-items-center" href="/berkas">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Upload Berkas</span>
                                <div class="small text-black-500">Akte Belum diupload</div>
                            </div>
                        </a>
                    @endif
                    @if ($siswa->kk == null)
                        <a class="dropdown-item d-flex align-items-center" href="/berkas">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Upload Berkas</span>
                                <div class="small text-black-500">KK Belum diupload</div>
                            </div>
                        </a>
                    @endif
                    @if ($siswa->ktp == null)
                        <a class="dropdown-item d-flex align-items-center" href="/berkas">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">Upload Berkas</span>
                                <div class="small text-black-500">KTP Belum diupload</div>
                            </div>
                        </a>
                    @endif
                @endif
            @endforeach
        </div>
    </li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ganti Password</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="float: right;" href="{{ route('home') }}"> Back</a>
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

<form action="{{ route('change.password') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password Lama: </strong>
                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password Baru: </strong>
                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Konfirmasi Password Baru: </strong>
                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Password</button>
        </div>
    </div>
        </div>
    </div>
   
</form>
@endsection