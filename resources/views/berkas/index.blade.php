@extends('layouts.menu')

@section('title', 'Data Berkas')

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
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Berkas</h2>
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
        <form action="{{ route('berkas.update',$siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card shadow">
                <div class="card-body">
                    <div class="table">
                    <table class="table-bordered" width="1000px">
                    <tr>
                        <th width="350px"><center>File</center></th>
                        <th width="300px"><center>Keterangan</center></th>
                        <th width="350px"><center>Opsi</center></th>
                    </tr>
                    <tr>
                        <td><center><img width="250px" src="{{asset('uploads/'.$siswa->akte)}}"></center></td>
                        <td><center>Akte</center></td>
                        <td>   
                            <input type="file" class="form-control" name="akte" value="{{ $siswa->akte }}" accept="image/jpeg,image/jpg,image/png">
                        </td>
                    </tr>
                    <tr>
                        <td><center><img width="250px" src="{{asset('uploads/'.$siswa->kk)}}"></center></td>
                        <td><center>Kartu Keluarga (KK)</center></td>
                        <td width="250px">   
                            <input type="file" class="form-control" name="kk" value="{{ $siswa->kk }}" accept="image/jpeg,image/jpg,image/png">
                        </td>
                    </tr>
                    <tr>
                        <td><center><img width="250px" src="{{asset('uploads/'.$siswa->ktp)}}"></center></td>
                        <td><center>KTP Orang Tua</center></td>
                        <td width="250px">   
                            <input type="file" class="form-control" name="ktp" value="{{ $siswa->ktp}}" accept="image/jpeg,image/jpg,image/png">
                        </td>
                    </tr>
                    <tr>
                        <td><center><img width="250px" src="{{asset('uploads/'.$siswa->gaji)}}"></center></td>
                        <td><center>Slip Gaji Orang Tua <br> (terbaru) jika ada</center></td>
                        <td width="250px">   
                            <input type="file" class="form-control" name="gaji" value="{{ $siswa->gaji}}" accept="image/jpeg,image/jpg,image/png">
                        </td>
                    </tr>
                    </table>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
        </form>
        @endif
        @endforeach 
    </div>

 @endsection