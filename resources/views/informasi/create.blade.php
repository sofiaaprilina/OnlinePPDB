@extends('layouts.admenu')
@section('title', 'Tambah Informasi')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Tambah Informasi</h2>
        <a class="btn btn-primary" style="float: right;" href="{{ route('informasi.index') }}"> Back</a>
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

<form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
     <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No</strong>
                        <input type="text" name="no" class="form-control" placeholder="No">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" id="judul">
                    <div class="form-group">
                        <label><b>Icon</b></label><br>
                        <input type="file" class="form-control" name="gambar" accept="image/jpeg,image/jpg,image/png">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Isi Informasi</strong>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="10" placeholder="Tuliskan isi di sini..." required></textarea>
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