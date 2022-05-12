@extends('layouts.main')
@section('title', 'Detail Data Siswa') 
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