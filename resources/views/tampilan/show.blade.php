@extends('layouts.admenu')
@section('title', 'Detail Tampilan')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Detail Tampilan</h2>
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

    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                @if ($tampilan->no != null)
                    <div class="col-xs-12 col-sm-12 col-md-12" id="no">
                        <div class="form-group">
                            <strong>No</strong>
                            <input type="text" value="{{$tampilan->no}}" name="no" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="urutan nomor...">
                        </div>
                    </div>
                @endif

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori</strong>
                        <input type="text" value="{{$tampilan->kategori}}" name="kategori" id="kategori" class="form-control" readonly>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Keterangan</strong>
                        <input type="text" value="{{$tampilan->judul}}" name="judul" id="judul" class="form-control" readonly >
                    </div>
                </div>

                @if ($tampilan->file != null)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label><b>Gambar</b></label><br>
                            <img width="150px" src="{{asset('images/gambarSistem/'.$tampilan->file)}}">
                        </div>
                    </div>
                @endif
                @if ($tampilan->link != null)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Link Video</strong>
                            <input type="text" name="link" class="form-control" placeholder="Masukkan link di sini..." value="{{$tampilan->link}}"><br>
                            <iframe src="{{$tampilan->link}}" width="500px" height="250px" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection