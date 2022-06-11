@extends('layouts.admenu')
@section('title', 'Edit Informasi')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Edit Informasi</h2>
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

<form action="{{ route('informasi.update',$informasi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label><b>Icon</b></label><br>
                        <input type="file" class="form-control" name="gambar" value="{{ $informasi->gambar }}"><br>
                        <img width="150px" src="{{asset('images/info/'.$informasi->gambar)}}">
                    </div>
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No</strong>
                <input type="text" name="no" class="form-control" placeholder="no" value="{{$informasi->no}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Isi Informasi</strong>
                <textarea name="keterangan" class="form-control" id="keterangan" rows="10" placeholder="Tuliskan informasi di sini...">{{$informasi->keterangan}}</textarea>
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