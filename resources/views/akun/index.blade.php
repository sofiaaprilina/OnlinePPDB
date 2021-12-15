@extends('layouts.main')

@section('title', ' Akun Pendaftar')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Akun Pendaftar</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('akun.create') }}"> Tambah Akun Pendaftar</a>
                 <a class="btn btn-warning" href="{{ route('pendaftar.index') }}"> Data Pendaftar</a>
                 <div class="pull-right" style="float: right">
                    <form action="/cariAkun" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="cariAkun"  class="form-control bg-light border-0 small" placeholder="Search for..."
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
             <th>ID Pendaftaran</th>
             <th>Nama</th>
             <th>Username</th>
             <th>Password</th>
             <th >Action</th>
         </tr>
         @foreach ($users as $user)
         <tr>
             <td>{{ $user->id }}</td>
             <td>{{ $user->idPendaftar }}</td>
             <td>{{ $user->name }}</td>
             <td>{{ $user->username }}</td>
             <td>{{ $user->decrypt }}</td>
             <td width="250px">
                <form action="{{ route('akun.destroy',$user->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('akun.show',$user->id) }}"><i class="fas fa-clipboard-list text-gray-100"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('akun.edit',$user->id) }}"><i class="fas fa-edit text-gray-100"></a>
   
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

    {{ $users->links() }}

 @endsection