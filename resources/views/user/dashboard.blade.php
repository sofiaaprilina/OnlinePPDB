@extends('layouts.menu')

@section('title', 'Dashboard')

@section('notif')
    @php
        $jumlah = 0;
    @endphp
    @foreach ($siswas as $siswa)
        @if (Auth::user()->id == $siswa->user_id)
            <?php 
                if ($siswa->no_kk == null || $siswa->nik == null || $siswa->agama == null || $siswa->alamat == null) {
                    $jumlah+=1;
                }
                if ($siswa->nik_ayah == null || $siswa->nm_ayah == null || $siswa->kj_ayah == null || $siswa->ph_ayah == null || $siswa->no_ayah == null || $siswa->nik_ibu == null || $siswa->nm_ibu == null || $siswa->kj_ibu == null || $siswa->ph_ibu == null || $siswa->no_ibu == null || $siswa->tanggungan == null || $siswa->email == null) {
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
                    @if ($siswa->no_kk == null || $siswa->nik == null || $siswa->agama == null || $siswa->alamat == null)
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
                    @if ($siswa->nik_ayah == null || $siswa->nm_ayah == null || $siswa->kj_ayah == null || $siswa->ph_ayah == null || $siswa->no_ayah == null || $siswa->nik_ibu == null ||  $siswa->nm_ibu == null || $siswa->kj_ibu == null || $siswa->ph_ibu == null || $siswa->no_ibu == null || $siswa->tanggungan == null || $siswa->email == null)
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
<div class="container">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @foreach ($siswas as $siswa)
            @if (Auth::user()->id == $siswa->user_id)
            <?php
                if ($siswa->status == 'Lolos') {
                    alert()->success('Silahkan mencetak bukti pendaftaran dan melakukan daftar ulang sesuai jadwal yang ditentukan.', 'Selamat Ananda Lolos Seleksi');
                } 
                else if($siswa->status == 'Tidak Lolos') {
                    alert()->error('Jangan kecewa masih banyak kesempatan lain. Terima kasih sudah mendaftar', 'Maaf Ananda Tidak Lolos Seleksi');
                }
            ?>
            @endif
        @endforeach
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<a href="#" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-flag"></i>
    </span>
    <span class="text">Pengumuman</span>
</a>
<div class="my-2"></div>

<!-- Collapsable Card Example -->
@foreach ($pengumumans as $pengumuman)
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
        role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">{{$pengumuman->judul}}</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            {{$pengumuman->tanggal}} <br>
            <table>
                <td>
                    <img width="100px" style="padding:10px;" src="{{asset('pamflet/'.$pengumuman->pamflet)}}" data-action="zoom">
                </td>
                <td>{{$pengumuman->isi}}</td>
            </table>            
        </div>
    </div>
</div>
@endforeach

<div class="my-2"></div>
<a href="#" class="btn btn-success btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-right"></i>
    </span>
    <span class="text">Selamat Datang</span>
</a>
<div class="my-2"></div>


<!-- Content Row -->
<center>
<div class="row">
<div class="card shadow mb-4">
    <div class="card-body">
        <center><h1><b><p>SELAMAT DATANG DI</p></h1></center>
        <center><h1><b>PPDB RA. QURROTA A'YUN</h1></center>
        <br><br>
        <img src="{{asset('images/g.png')}}" >

    </div>
</div>
</div>
</center>
</div>

<!-- /.container-fluid -->
</div>
@endsection
