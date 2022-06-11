@extends('layouts.admenu')

@section('title', 'Data Tampilan')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Tampilan</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('tampilan.create') }}">Tambah Tampilan</a>
                 <form action="/filter-tampilan" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <select name="filter" id="filter" aria-controls="dataTable" class="custom-select custom-select-md form-control form-control-md">
                            <option value="Semua">Semua Kategori</option>
                            <option value="Fasilitas">Fasilitas</option>
                            <option value="Ekskul">Ekstrakulikuler</option>
                            <option value="Kegiatan">Kegiatan</option>
                            <option value="Sub Kegiatan-Fisik Motorik">Sub Kegiatan-Fisik Motorik</option>
                            <option value="Sub Kegiatan-Keagamaan">Sub Kegiatan-Keagamaan</option>
                            <option value="Sub Kegiatan-Outing Class">Sub Kegiatan-Outing Class</option>
                            <option value="Sub Kegiatan-Peringatan Hari Besar">Sub Kegiatan-Peringatan Hari Besar</option>
                            <option value="Sub Kegiatan-Daring">Sub Kegiatan-Daring</option>
                            <option value="Sub Kegiatan-Luring">Sub Kegiatan-Luring</option>
                            <option value="Dewan Guru">Dewan Guru</option>
                            <option value="PPDB">PPDB</option>
                        </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            Filter
                        </button>
                    </div>
                </div>
                </form>
                 
                 <div class="pull-right" style="float: right">
                    <form action="/caritampilan" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="cariTampilan"  class="form-control bg-light border-1 small" placeholder="Search for..."
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
             <th>Kategori</th>
             <th>Keterangan</th>
             <th>File</th>
             <th>Action</th>
         </tr>
         @foreach ($tampilans as $tampilan)
         <tr>
             <td>{{ $tampilan->id }}</td>
             <td>{{ $tampilan->kategori }}</td>
             <td>{{ $tampilan->judul }}</td>
             @if ($tampilan->file != null)
                <td><img width="150px" src="{{asset('images/gambarSistem/'.$tampilan->file)}}" data-action="zoom"></td>
             @else
                <td>
                    <iframe width="200px" height="150px" src="{{$tampilan->link}}" frameborder="0" allowfullscreen></iframe>
                </td>
             @endif
             <td width="200px">
                <form action="{{ route('tampilan.destroy',$tampilan->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tampilan.show',$tampilan->id) }}"><i class="fas fa-clipboard-list text-gray-100"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('tampilan.edit',$tampilan->id) }}"><i class="fas fa-edit text-gray-100"></a>
   
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

    {{ $tampilans->links() }}

 @endsection