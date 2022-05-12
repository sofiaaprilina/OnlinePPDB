@extends('layouts.main')
@section('title', 'Edit Data Siswa')   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('siswa.index') }}"> Back</a>
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
  
    <form action="{{ route('siswa.update',$siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="card shadow">
            <div class="card-body">
                <div class="table">
                    <table width="1000px">
                        <tr>
                            <td><strong>Nama Calon Siswa </strong></td>
                            <td><input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Tempat,Tanggal Lahir </strong></td>
                            <td><input type="text" value="{{ $siswa->tempat }}, {{ $siswa->tgl_lahir }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin </strong></td>
                            <td><input type="text" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Agama </strong></td>
                            <td><input type="text" name="agama" value="{{ $siswa->agama }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat </strong></td>
                            <td><input type="text" name="alamat" value="{{ $siswa->alamat }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Ayah </strong></td>
                            <td><input type="text" name="nm_ayah" value="{{ $siswa->nm_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ayah </strong></td>
                            <td><input type="text" name="kj_ayah" value="{{ $siswa->kj_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ayah </strong></td>
                            <td><input type="text" name="ph_ayah" value="{{ $siswa->ph_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ayah </strong></td>
                            <td><input type="text" name="no_ayah" value="{{ $siswa->no_ayah }}" class="form-control"></td>
                        </tr>
                        <tr> 
                            <td><strong>Nama Ibu   : </strong></td>
                            <td><input type="text" name="nm_ibu" value="{{ $siswa->nm_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ibu </strong></td>
                            <td><input type="text" name="kj_ibu" value="{{ $siswa->kj_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ibu </strong></td>
                            <td><input type="text" name="ph_ibu" value="{{ $siswa->ph_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ibu </strong></td>
                            <td><input type="text" name="no_ibu" value="{{ $siswa->no_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Wali </strong></td>
                            <td><input type="text" name="nm_wali" value="{{ $siswa->nm_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Wali </strong></td>
                            <td><input type="text" name="kj_wali" value="{{ $siswa->kj_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Wali</strong></td>
                            <td><input type="text" name="ph_wali" value="{{ $siswa->ph_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Wali </strong></td>
                            <td><input type="text" name="no_wali" value="{{ $siswa->no_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggungan Orang Tua </strong></td>
                            <td><input type="text" name="tanggungan" value="{{ $siswa->tanggungan }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td><input type="text" name="email" value="{{ $siswa->email }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Akte Kelahiran</strong></td>
                            <td><input type="file" class="form-control" name="akte" value="{{ $siswa->akte }}" accept="image/jpeg,image/jpg,image/png"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><img width="150px" src="{{asset('uploads/'.$siswa->akte)}}" data-action="zoom"></td>
                        </tr>
                        <tr>
                            <td><strong>Kartu Keluarga</strong></td>
                            <td><input type="file" class="form-control" name="kk" value="{{ $siswa->kk }}" accept="image/jpeg,image/jpg,image/png"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><img width="150px" src="{{asset('uploads/'.$siswa->kk)}}" data-action="zoom"></td>
                        </tr>
                        <tr>
                            <td><strong>KTP Orang Tua</strong></td>
                            <td><input type="file" class="form-control" name="ktp" value="{{ $siswa->ktp }}" accept="image/jpeg,image/jpg,image/png"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><img width="150px" src="{{asset('uploads/'.$siswa->ktp)}}" data-action="zoom"></td>
                        </tr>
                        <tr>
                            <td><strong>Slip Gaji</strong></td>
                            <td><input type="file" class="form-control" name="gaji" value="{{ $siswa->gaji }}" accept="image/jpeg,image/jpg,image/png"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><img width="150px" src="{{asset('uploads/'.$siswa->gaji)}}" data-action="zoom"></td>
                        </tr>
                    </table>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
         </div> 
    </form>
@endsection