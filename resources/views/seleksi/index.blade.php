@extends('layouts.main')

@section('title', 'Hasil Seleksi')

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
                 <h2>Hasil Seleksi</h2>
             </div>
             <div class="pull-right">
                 <!-- <a class="btn btn-success" href="{{ route('siswa.create') }}"> Tambah Siswa</a> -->
                 <div class="pull-right" style="float: right">
                    <form action="/cariSiswa" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <br>
                    </form>
                 </div>
                 <div class="pull-left">
                    <a href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-info"></i>
                        </span>
                        <span class="text text-justify">Jumlah Siswa    : {{$siswas->count()}} </span>
                    </a>
                    <a href="{{ route('seleksi.cetak_pdf') }}" target="_blank" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text text-justify">Cetak PDF</span>
                    </a>
                    <div class="my-2"></div>
                 </div>
             </div>
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <div class="card shadow">
        <div class="card-body">
            <div class="table">
     <table class="table-bordered" width="1000px">
         <tr>
             <th>No</th>
             <th>Nama Siswa</th>
             <th>Email</th>
             <th>Status</th>
             <th>Status Keringanan</th>
             <th >Action</th>
         </tr>
         <?php $no=1; ?>
         @foreach ($siswas as $siswa)
         <?php
            $keringanan = "";

            if ($siswa->status_ayah == 'Meninggal' && $siswa->tanggungan > 3 && $siswa->ph_ibu < 1000000){
                $keringanan = "Direkomendasikan";
            }
            elseif ($siswa->status_ibu == 'Meninggal' && $siswa->tanggungan > 3 && $siswa->ph_ayah < 1000000) {
                $keringanan = "Direkomendasikan";
            } 
            elseif ($siswa->status_ayah == 'Meninggal' && $siswa->status_ibu == 'Meninggal' && $siswa->ph_wali < 1000000 && $siswa->tanggungan > 3){
                $keringanan = "Direkomendasikan";
            }
            else{
                $keringanan = "Tidak";
            }
         ?>
         <tr>
             <td>{{ $no++ }}</td>
             <td>{{ $siswa->nama }}</td>
             <td>{{ $siswa->email }}</td>
             <td>{{ $siswa->status }}</td>
             @if ($siswa->keringanan == 'Ya')
                <td>{{ $siswa->keringanan }}</td>
             @else
                <td>{{ $keringanan }}</td>   
             @endif
             <td width="200px">
                {{-- <form action="#" method="POST"> --}}
                    @if ($keringanan == 'Direkomendasikan')
                        <div class="nav-item dropdown no-arrow">
                            <a class="btn btn-warning" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Konfirmasi</a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('keringanan',$siswa->id) }}">
                                    Kirim Notifikasi Keringanan
                                </a>
                            </div>
                        </div>
                        <br>
                    @endif
                    {{-- <a class="btn btn-warning" href="#">Konfirmasi</a><br> --}}
                    {{-- <a class="btn btn-info" href="{{ route('siswa.show',$siswa->id) }}"><i class="fas fa-clipboard-list text-gray-100"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('siswa.edit',$siswa->id) }}"><i class="fas fa-edit text-gray-100"></a> --}}
   
                    {{-- @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash text-gray-100"></button> --}}
                </form>
            </td>
        </tr>
        @endforeach
     </table>
            </div>
        </div>
     </div>

    {{-- {{ $siswas->links() }} --}}

 @endsection