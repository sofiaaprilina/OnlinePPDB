@extends('layouts.admenu')
@section('title', 'Tambah Akun Pendaftar')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Akun Pendaftar</h2>
        </div>
        <div class="pull-right">
            {{-- <a class="btn btn-warning" href="{{ route('pendaftar.index') }}"> Data Pendaftar</a> --}}
            <a class="btn btn-primary" style="float: right;" href="{{ route('daftar-siswa.index') }}"> Back</a>
        </div>
    </div>
</div>
<br>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('daftar-siswa.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Pendaftar: </strong>
                <select name="idPendaftar" class="form-control" id="idPendaftar" required = 'required' >
                    @foreach ($pendaftars as $p)
                        <option value="{{$p->id}}">{{$p->id}} | {{$p->siswa}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Calon Siswa: </strong>
                <select name="name" class="form-control" id="name" required = 'required' >
                    @foreach ($pendaftars as $p)
                        <option value="{{$p->siswa}}">{{$p->id}} | {{$p->siswa}}</option>
                    @endforeach
                    </select>
                {{-- <input type="text" name="name" class="form-control" placeholder="Nama Calon Siswa"> --}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email: </strong>
                <select name="email" class="form-control" id="email" required = 'required' >
                @foreach ($pendaftars as $p)
                    <option value="{{$p->email}}">{{$p->id}} | {{$p->email}}</option>
                @endforeach
                </select>
                {{-- <input type="text" name="email" class="form-control" placeholder="Email "> --}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username: </strong>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
        </div>
    </div>
   
</form>
@endsection