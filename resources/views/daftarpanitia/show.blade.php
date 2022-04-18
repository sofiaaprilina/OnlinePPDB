@extends('layouts.admenu')
@section('content')
<div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detail Akun Panitia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('daftar-panitia.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Panitia : </strong>
                {{ $panitia->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email : </strong>
                {{ $panitia->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username : </strong>
                {{ $panitia->username }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password : </strong>
                {{ $panitia->decrypt }}
            </div>
        </div>
        
    </div>
@endsection