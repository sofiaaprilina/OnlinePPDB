@extends('layouts.menu')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ganti Password</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="float: right;" href="{{ route('home') }}"> Back</a>
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

<form action="{{ route('change.password') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password Lama: </strong>
                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password Baru: </strong>
                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Konfirmasi Password Baru: </strong>
                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Password</button>
        </div>
    </div>
        </div>
    </div>
   
</form>
@endsection