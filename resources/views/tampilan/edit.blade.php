@extends('layouts.admenu')
@section('title', 'Edit Tampilan')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Edit Tampilan</h2>
        <a class="btn btn-primary" style="float: right;" href="{{ route('tampilan.index') }}"> Back</a>
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

<form action="{{ route('tampilan.update',$tampilan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12" id="no">
                    <div class="form-group">
                        <strong>No</strong>
                        <input type="text" value="{{$tampilan->no}}" name="no" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="urutan nomor...">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori</strong>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="{{$tampilan->kategori}}">{{$tampilan->kategori}}</option>
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
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Keterangan</strong>
                        <input type="text" value="{{$tampilan->judul}}" name="judul" id="judul" class="form-control" placeholder="Keterangan tampilan..." >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label><b>Gambar</b></label><br>
                        <input type="file" class="form-control" name="file" value="{{ $tampilan->file }}"><br>
                        <img width="150px" src="{{asset('images/gambarSistem/'.$tampilan->file)}}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Link Video</strong>
                        <input type="text" name="link" class="form-control" placeholder="Masukkan link di sini..." value="{{$tampilan->link}}"><br>
                        <iframe src="{{$tampilan->link}}" width="500px" height="250px" frameborder="0" allowfullscreen></iframe>
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