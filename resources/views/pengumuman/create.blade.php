@extends('layouts.admenu')
@section('title', 'Tambah Pengumuman')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Tambah Pengumuman</h2>
        <a class="btn btn-primary" style="float: right;" href="{{ route('pengumuman.index') }}"> Back</a>
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

<form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
     <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label><b>Kategori</b></label>
                        <select class="form-control" name="kategori" required>
                            <option value="Dashboard">Dashboard</option>
                            <option value="Alert">Alert</option>
                        </select>
                    </div>
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul:</strong>
                <input type="text" name="judul" class="form-control" placeholder="Judul Pengumuman" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Isi Pengumuman</strong>
                <textarea name="isi" class="form-control" id="isi" rows="10" placeholder="Tuliskan isi di sini..." required></textarea>
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