@extends('layouts.admenu')
@section('title', 'Detail Akun Admin')
@section('content')
<div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detail Akun Admin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('daftar-admin.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Admin : </strong>
                {{ $admin->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email : </strong>
                {{ $admin->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password : </strong>
                {{ $admin->password }}
            </div>
        </div>
        
    </div>
@endsection