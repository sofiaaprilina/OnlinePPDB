@extends('layouts.main')

@section('title', 'Pendaftar')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Pendaftar</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('pendaftar.create') }}"> Tambah Pendaftar</a>
                 <div class="pull-right" style="float: right">
                    <form action="/cari" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="cari"  class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
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
    
     <div class="card shadow">
        <div class="card-body">
            <div class="table">
     <table class="table-bordered" width="1000px">
         <tr>
             <th>Id</th>
             <th>Nama Siswa</th>
             <th>Nama Ortu</th>
             <th>Tanggal Daftar</th>
             <th>Email</th>
             <th>No. Telp</th>
             <th>Status</th>
             <th>Bukti Pembayaran</th>
             <th >Action</th>
         </tr>
         @foreach ($pendaftars as $pendaftar)
         <tr>
             <td>{{ $pendaftar->id }}</td>
             <td>{{ $pendaftar->siswa }}</td>
             <td>{{ $pendaftar->ortu }}</td>
             <td>{{ $pendaftar->tgl_daftar }}</td>
             <td>{{ $pendaftar->email }}</td>
             <td>{{ $pendaftar->no_telp }}</td>
             <td>{{ $pendaftar->status }}</td>
             <td><img width="150px" src="{{asset('storage/'.$pendaftar->bayar)}}"></td>
             <td width="250px">
                <form action="{{ route('pendaftar.destroy',$pendaftar->id) }}" method="POST">
                    <div class="nav-item dropdown no-arrow">
                        <a class="btn btn-warning" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Konfirmasi</a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal">
                                Kirim Notifikasi
                            </a>
                            <a class="dropdown-item" href="{{ route('pendaftar.add',$pendaftar->id) }}">
                                Tambah Siswa
                             </a>
                         </div>
                    </div>
                    <br>
                    <a class="btn btn-info" href="{{ route('pendaftar.show',$pendaftar->id) }}"><i class="fas fa-clipboard-list text-gray-100"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('pendaftar.edit',$pendaftar->id) }}"><i class="fas fa-edit text-gray-100"></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash text-gray-100"></button>
                </form>
            </td>
        </tr>
        @endforeach
     </table>
     </div>
     </div>
     </div>

    {{ $pendaftars->links() }}

 @endsection