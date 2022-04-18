@extends('layouts.admenu')

@section('title', ' Edit Akun Admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Akun Admin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" style="float: right;" href="{{ route('daftar-admin.index') }}"> Back</a>
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
  
    <form action="{{ route('daftar-admin.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        {{-- <div class="row"> --}}
            
        <div class="card shadow">
            <div class="card-body"> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Admin:</strong>
                    <input type="text" name="name" value="{{ $admin->name }}" class="form-control" placeholder="Nama admin">
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $admin->email }}" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input id="password" type="password" name="password" value="{{ $admin->password }}" class="form-control" placeholder="Password">
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