@extends('layouts.menu')

@section('title', 'Data Biodata')

@section('notif')
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <span class="badge badge-danger badge-counter">{{$alerts->count()}}</span>
        </a>
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        @foreach ($alerts as $alert)
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{$alert->tanggal}}</div>
                    <span class="font-weight-bold">{{$alert->judul}}</span>
                    <div class="small text-black-500">{{$alert->isi}}</div>
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
                 <h2>Data Biodata</h2>
             </div>
             <div class="pull-right">
                 <div class="pull-right" style="float: right">
                    <form action="/cari" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <br>
                </form>
                 </div>
             </div>
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <div class="row">
        @foreach ($siswas as $siswa)
         @if (Auth::user()->id == $siswa->user_id)
         <form action="{{ route('biodata.update',$siswa->id) }}" method="POST" enctype="multipart/form-data">
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
                            <td><strong>Nama Calon Siswa</strong></td>
                            <td><input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Tempat, Tanggal Lahir </strong></td>
                            <td><input type="text" value="{{ $siswa->tempat }}, {{ $siswa->tgl_lahir }}" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin </strong></td>
                            <td><input type="text" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }}" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Agama</strong></td>
                            <td><input type="text" name="agama" value="{{ $siswa->agama }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat </strong></td>
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
                            <td><strong>Nama Ayah </strong></td>
                            <td><input type="text" name="nm_ayah" value="{{ $siswa->nm_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ayah </strong></td>
                            <td><input type="text" name="kj_ayah" value="{{ $siswa->kj_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ayah </strong></td>
                            <td>
                                <input type="text" name="ph_ayah" id="ph_ayah" value="{{ $siswa->ph_ayah }}" class="form-control">
                                <p><small style="color: red";>*</small> Per bulan.</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ayah</strong></td>
                            <td><input type="text" name="no_ayah" value="{{ $siswa->no_ayah }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13"></td>
                        </tr>
                        <tr>
                            <td><strong>Status Ayah</strong></td>
                            <td>
                                <select name="status_ayah" class="form-control">
                                    <option value="{{$siswa->status_ayah}}">{{$siswa->status_ayah}}</option>
                                    <option value="Masih Hidup">Masih Hidup</option>
                                    <option value="Meninggal">Meninggal</option>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <td><strong>Nama Ibu</strong></td>
                            <td><input type="text" name="nm_ibu" value="{{ $siswa->nm_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ibu</strong></td>
                            <td><input type="text" name="kj_ibu" value="{{ $siswa->kj_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ibu </strong></td>
                            <td>
                                <input type="text" name="ph_ibu" id="ph_ibu" value="{{ $siswa->ph_ibu }}" class="form-control">
                                <p><small style="color: red";>*</small> Per bulan.</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ibu </strong></td>
                            <td><input type="text" name="no_ibu" value="{{ $siswa->no_ibu }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13"></td>
                        </tr>
                        <tr>
                            <td><strong>Status Ibu</strong></td>
                            <td>
                                <select name="status_ibu" class="form-control">
                                    <option value="{{$siswa->status_ibu}}">{{$siswa->status_ibu}}</option>
                                    <option value="Masih Hidup">Masih Hidup</option>
                                    <option value="Meninggal">Meninggal</option>
                                </select>
                            </td>
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
                            <td><strong>Penghasilan Wali </strong></td>
                            <td>
                                <input type="text" name="ph_wali" id="ph_wali" value="{{ $siswa->ph_wali }}" class="form-control">
                                <p><small style="color: red";>*</small> Per bulan.</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Wali </strong></td>
                            <td><input type="text" name="no_wali" value="{{ $siswa->no_wali }}" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13"></td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Tanggungan Orang Tua / Wali  : </strong></td>
                            <td>
                                <input type="number" name="tanggungan" id="tanggungan" value="{{ $siswa->tanggungan }}" class="form-control">
                                <p><small style="color: red";>*</small> Jumlah anggota keluarga yang masih dibiayai orang tua.</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Email Orang Tua / Wali </strong></td>
                            <td><input type="email" name="email" value="{{ $siswa->email }}" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"></td>
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
       @endif
    @endforeach 
</div>
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