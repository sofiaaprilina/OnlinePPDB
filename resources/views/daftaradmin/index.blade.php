@extends('layouts.admenu')

@section('title', ' Data Admin')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Akun Admin</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('daftar-admin.create') }}"> Tambah Akun Admin</a>
                 <div class="pull-right" style="float: right">
                    <form action="/cariAdmin" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="cariAdmin"  class="form-control bg-white border-1 small" placeholder="Search for..."
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
             <th>Nama</th>
             <th>Email</th>
             {{-- <th>Password</th> --}}
             <th >Action</th>
         </tr>
         @foreach ($admins as $admin)
         <tr>
             <td>{{ $admin->id }}</td>
             <td>{{ $admin->name }}</td>
             <td>{{ $admin->email }}</td>
             {{-- <td>{{ $admin->password }}</td> --}}
             <td width="250px">
                <form action="{{ route('daftar-admin.destroy',$admin->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('daftar-admin.show',$admin->id) }}"><i class="fas fa-clipboard-list text-gray-100"></i></a> --}}
    
                    <a class="btn btn-primary" href="{{ route('daftar-admin.edit',$admin->id) }}"><i class="fas fa-edit text-gray-100"></a>
   
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

    {{ $admins->links() }}

 @endsection