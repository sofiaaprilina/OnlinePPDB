@extends('layouts.main')
@section('title', 'Edit Data Siswa')
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
                            <td><strong>No Kartu Keluarga</strong></td>
                            <td>:</td>
                            <td><input type="text" name="no_kk" value="{{ $siswa->no_kk }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="16"></td>
                        </tr>
                        <tr>
                            <td><strong>NIK Calon Siswa</strong></td>
                            <td>:</td>
                            <td><input type="text" name="nik" value="{{ $siswa->nik }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="16"></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Calon Siswa</strong></td>
                            <td>:</td>
                            <td><input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Tempat Lahir </strong></td>
                            <td>:</td>
                            <td><input type="text" name="tempat" value="{{$siswa->tempat}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Lahir </strong></td>
                            <td>:</td>
                            <td><input type="date" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin </strong></td>
                            <td>:</td>
                            <td>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="{{$siswa->jenis_kelamin}}">{{$siswa->jenis_kelamin}}</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Agama </strong></td>
                            <td>:</td>
                            <td><input type="text" name="agama" value="{{ $siswa->agama }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat </strong></td>
                            <td>:</td>
                            <td><input type="text" name="alamat" value="{{ $siswa->alamat }}" class="form-control"></td>
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
                            <td><strong>NIK Ayah </strong></td>
                            <td>:</td>
                            <td><input type="text" name="nik_ayah" value="{{ $siswa->nik_ayah }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="16"></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Ayah </strong></td>
                            <td>:</td>
                            <td><input type="text" name="nm_ayah" value="{{ $siswa->nm_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ayah </strong></td>
                            <td>:</td>
                            <td><input type="text" name="kj_ayah" value="{{ $siswa->kj_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ayah </strong></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="ph_ayah" id="ph_ayah" value="{{ $siswa->ph_ayah }}" class="form-control">
                                <p><small style="color: red";>*</small> Per bulan.</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ayah </strong></td>
                            <td>:</td>
                            <td><input type="text" name="no_ayah" value="{{ $siswa->no_ayah }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13"></td>
                        </tr>
                        <tr>
                            <td><strong>Status Ayah</strong></td>
                            <td>:</td>
                            <td>
                                <select name="status_ayah" class="form-control">
                                    <option value="{{$siswa->status_ayah}}">{{$siswa->status_ayah}}</option>
                                    <option value="Masih Hidup">Masih Hidup</option>
                                    <option value="Meninggal">Meninggal</option>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <td><strong>NIK Ibu </strong></td>
                            <td>:</td>
                            <td><input type="text" name="nik_ibu" value="{{ $siswa->nik_ibu }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="16"></td>
                        </tr>
                        <tr> 
                            <td><strong>Nama Ibu </strong></td>
                            <td>:</td>
                            <td><input type="text" name="nm_ibu" value="{{ $siswa->nm_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ibu </strong></td>
                            <td>:</td>
                            <td><input type="text" name="kj_ibu" value="{{ $siswa->kj_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ibu </strong></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="ph_ibu" id="ph_ibu" value="{{ $siswa->ph_ibu }}" class="form-control">
                                <p><small style="color: red";>*</small> Per bulan.</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ibu </strong></td>
                            <td>:</td>
                            <td><input type="text" name="no_ibu" value="{{ $siswa->no_ibu }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13"></td>
                        </tr>
                        <tr>
                            <td><strong>Status Ibu</strong></td>
                            <td>:</td>
                            <td>
                                <select name="status_ibu" class="form-control">
                                    <option value="{{$siswa->status_ibu}}">{{$siswa->status_ibu}}</option>
                                    <option value="Masih Hidup">Masih Hidup</option>
                                    <option value="Meninggal">Meninggal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>NIK Wali </strong></td>
                            <td>:</td>
                            <td><input type="text" name="nik_wali" value="{{ $siswa->nik_wali }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="16"></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Wali </strong></td>
                            <td>:</td>
                            <td><input type="text" name="nm_wali" value="{{ $siswa->nm_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Wali </strong></td>
                            <td>:</td>
                            <td><input type="text" name="kj_wali" value="{{ $siswa->kj_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Wali</strong></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="ph_wali" id="ph_wali" value="{{ $siswa->ph_wali }}" class="form-control">
                                <p><small style="color: red";>*</small> Per bulan.</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Wali </strong></td>
                            <td>:</td>
                            <td><input type="text" name="no_wali" value="{{ $siswa->no_wali }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13"></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggungan Orang Tua / Wali </strong></td>
                            <td>:</td>
                            <td>
                                <input type="number" name="tanggungan" id="tanggungan" value="{{ $siswa->tanggungan }}" class="form-control">
                                <p><small style="color: red";>*</small> Jumlah anggota keluarga yang masih dibiayai orang tua / wali.</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Email Orang Tua / Wali</strong></td>
                            <td>:</td>
                            <td><input type="email" name="email" value="{{ $siswa->email }}" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"></td>
                        </tr>
                        <tr>
                            <td><strong>Akte Kelahiran</strong></td>
                            <td>:</td>
                            <td><input type="file" class="form-control" name="akte" value="{{ $siswa->akte }}" accept="image/jpeg,image/jpg,image/png"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><img width="150px" src="{{asset('uploads/'.$siswa->akte)}}" data-action="zoom"></td>
                        </tr>
                        <tr>
                            <td><strong>Kartu Keluarga</strong></td>
                            <td>:</td>
                            <td><input type="file" class="form-control" name="kk" value="{{ $siswa->kk }}" accept="image/jpeg,image/jpg,image/png"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><img width="150px" src="{{asset('uploads/'.$siswa->kk)}}" data-action="zoom"></td>
                        </tr>
                        <tr>
                            <td><strong>KTP Orang Tua</strong></td>
                            <td>:</td>
                            <td><input type="file" class="form-control" name="ktp" value="{{ $siswa->ktp }}" accept="image/jpeg,image/jpg,image/png"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><img width="150px" src="{{asset('uploads/'.$siswa->ktp)}}" data-action="zoom"></td>
                        </tr>
                        <tr>
                            <td><strong>Slip Gaji</strong></td>
                            <td>:</td>
                            <td><input type="file" class="form-control" name="gaji" value="{{ $siswa->gaji }}" accept="image/jpeg,image/jpg,image/png"></td>
                        </tr>
                        <tr>
                            <td></td>
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
    <script>
        var ph_ayah = document.getElementById("ph_ayah");
        ph_ayah.addEventListener("keyup", function (e) {
            ph_ayah.value = formatRupiah(this.value);
        });
    
        var ph_ibu = document.getElementById("ph_ibu");
        ph_ibu.addEventListener("keyup", function (e) {
            ph_ibu.value = formatRupiah(this.value);
        });
    
        var ph_wali = document.getElementById("ph_wali");
        ph_wali.addEventListener("keyup", function (e) {
            ph_wali.value = formatRupiah(this.value);
        });
    
        /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById("dengan-rupiah");
        dengan_rupiah.addEventListener("keyup", function (e) {
            dengan_rupiah.value = formatRupiah(this.value, "Rp. ");
        });
    
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }
    
            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>
@endsection