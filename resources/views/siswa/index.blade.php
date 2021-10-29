@extends('layouts.main')

@section('title', 'Data Siswa Baru')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Siswa Baru</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('siswa.create') }}"> Tambah Siswa</a>
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
    
     <table class="table table-bordered">
         <tr>
             <th>Id</th>
             <th>Nama Siswa</th>
             <th>Tempat Tanggal Lahir</th>
             <th>Jenis Kelamin</th>
             <th>Alamat</th>
             <th>No. Telp</th>
             <th>Email</th>
             <th >Action</th>
         </tr>
         @foreach ($siswas as $siswa)
         <tr>
             <td>{{ $siswa->id }}</td>
             <td>{{ $siswa->nama }}</td>
             <td>{{ $siswa->tempat }},{{ $siswa->tgl_lahir }}</td>
             <td>{{ $siswa->jenis_kelamin }}</td>
             <td>{{ $siswa->alamat }}</td>
             <td>{{ $siswa->no_ibu }}</td>
             <td>{{ $siswa->email }}</td>
             <td width="250px">
                <form action="{{ route('siswa.destroy',$siswa->id) }}" method="POST">
                    <a class="btn btn-warning" href="#">Konfirmasi</a><br>
                    <a class="btn btn-info" href="{{ route('siswa.show',$siswa->id) }}"><i class="fas fa-clipboard-list text-gray-100"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('siswa.edit',$siswa->id) }}"><i class="fas fa-edit text-gray-100"></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash text-gray-100"></button>
                </form>
            </td>
        </tr>
        @endforeach
     </table>

    {{ $siswas->links() }}

 @endsection