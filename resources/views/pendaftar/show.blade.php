@extends('layouts.main')
@section('title', 'Detail Data Pendaftar')   
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
                        <td><img width="150px" src="{{asset('storage/'.$pendaftar->bayar)}}" data-action="zoom"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection