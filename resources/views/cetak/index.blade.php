@extends('layouts.menu')

@section('title', 'Cetak Data')

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
                 <h2>Cetak Data</h2><br>
             </div>
             <div class="pull-right">
                <div class="pull-right" style="float: right">
                   <form action="/cari" method="GET"
               class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
               <br>
               </form>
                </div>
            </div>
            <a class="btn btn-info" href="{{ route('cetak.cetak_pdf') }}" target="_blank">Cetak</a>
        </div>
    </div><br>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <div class="row">
        @foreach ($siswas as $siswa)
         @if (Auth::user()->id == $siswa->user_id)
         <?php
            $keringanan = "";

            if ($siswa->status_ayah == 'Meninggal' && $siswa->tanggungan > 3 && $siswa->ph_ibu < 1000000){
                $keringanan = "Ya";
            }
            elseif ($siswa->status_ibu == 'Meninggal' && $siswa->tanggungan > 3 && $siswa->ph_ayah < 1000000) {
                $keringanan = "Ya";
            } 
            elseif ($siswa->status_ayah == 'Meninggal' && $siswa->status_ibu == 'Meninggal' && $siswa->ph_wali < 1000000 && $siswa->tanggungan > 3){
                $keringanan = "Ya";
            }
            else{
                $keringanan = "Tidak";
            }
         ?>
         
            
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
                            <td>{{ $siswa->nama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tempat,Tanggal Lahir</strong></td>
                            <td>{{ $siswa->tempat }}, {{ $siswa->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin</strong></td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td><strong>Agama</strong></td>
                            <td>{{ $siswa->agama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
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
                            <td><strong>Nama Ayah</strong></td>
                            <td>{{ $siswa->nm_ayah }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ayah</strong></td>
                            <td>{{ $siswa->kj_ayah }}</td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ayah</strong></td>
                            <td>Rp.{{ $siswa->ph_ayah }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ayah</strong></td>
                            <td>{{ $siswa->no_ayah }}</td>
                        </tr>
                        <tr> 
                            <td><strong>Nama Ibu</strong></td>
                            <td>{{ $siswa->nm_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ibu</strong></td>
                            <td>{{ $siswa->kj_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ibu</strong></td>
                            <td>Rp.{{ $siswa->ph_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ibu</strong></td>
                            <td>{{ $siswa->no_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Wali</strong></td>
                            <td>{{ $siswa->nm_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Wali</strong></td>
                            <td>{{ $siswa->kj_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Wali</strong></td>
                            <td>Rp.{{ $siswa->ph_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Wali</strong></td>
                            <td>{{ $siswa->no_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Tanggungan</strong></td>
                            <td>{{ $siswa->tanggungan }}</td>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{ $siswa->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status Keringanan</strong></td>
                            <td>{{ $keringanan }}</td>
                        </tr>
                    </table>
                </div>
            </div>
         </div>
       @endif
    @endforeach 
</div>
 @endsection