@extends('layouts.admenu')
@section('title', 'Edit Akun Pendaftar')   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Akun Pendaftar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="float: right;" href="{{ route('daftar-siswa.index') }}"> Back</a>
            </div>
        </div>
    </div> <br>
   
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
  
    <form action="{{ route('daftar-siswa.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="card shadow">
            <div class="card-body"> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Calon Siswa:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Nama Calon Siswa">
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input id="password" type="password" name="password" value="{{ $user->decrypt }}" minlength="6" class="form-control" placeholder="Password">
            </div>
        </div>

        <div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
        </div>
   
    </form>
@endsection