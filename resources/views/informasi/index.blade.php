@extends('layouts.admenu')

@section('title', 'Informasi PPDB')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Informasi</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('informasi.create') }}">Tambah Informasi</a>
                 <div class="pull-right" style="float: right">
                    <form action="/cariInformasi" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="cariInformasi"  class="form-control bg-light border-1 small" placeholder="Search for..."
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
             <th>No</th>
             <th>Informasi</th>
             <th>Icon</th>
             <th>Action</th>
         </tr>
         @foreach ($informasis as $informasi)
         <tr>
             <td>{{ $informasi->id }}</td>
             <td>{{ $informasi->no }}</td>
             <td>{{ $informasi->keterangan }}</td>
             <td><img width="100px" src="{{asset('images/info/'.$informasi->gambar)}}" data-action="zoom"></td>
             <td width="200px">
                <form action="{{ route('informasi.destroy',$informasi->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('informasi.show',$informasi->id) }}"><i class="fas fa-clipboard-list text-gray-100"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('informasi.edit',$informasi->id) }}"><i class="fas fa-edit text-gray-100"></a>
   
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

    {{ $informasis->links() }}

 @endsection