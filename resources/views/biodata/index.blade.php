@extends('layouts.menu')

@section('title', 'Data Biodata')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Biodata</h2>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('biodata.create') }}"> Tambah Biodata</a>
                 <div class="pull-right" style="float: right">
                    <form action="/cari" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <br>
                <br>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Calon Siswa    : </strong>
                {{ $siswa->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat,Tanggal Lahir    : </strong>
                {{ $siswa->tempat }}, {{ $siswa->tgl_lahir }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin       : </strong>
                {{ $siswa->jenis_kelamin }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agama          : </strong>
                {{ $siswa->agama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat          : </strong>
                {{ $siswa->alamat }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ayah   : </strong>
                {{ $siswa->nm_ayah }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Ayah   : </strong>
                {{ $siswa->kj_ayah }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp Ayah   : </strong>
                {{ $siswa->no_ayah }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ibu   : </strong>
                {{ $siswa->nm_ibu }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Ibu   : </strong>
                {{ $siswa->kj_ibu }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp Ibu   : </strong>
                {{ $siswa->no_ibu }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Wali   : </strong>
                {{ $siswa->nm_wali }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Wali   : </strong>
                {{ $siswa->kj_wali }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp Wali   : </strong>
                {{ $siswa->no_wali }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email           : </strong>
                {{ $siswa->email }}
            </div>
        </div>
       @endif
        @endforeach 
    </div>
        
         
        
  


 @endsection