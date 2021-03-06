@extends('layouts.admenu')
@section('title', 'Edit Pengumuman')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Edit Pengumuman</h2>
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

<form action="{{ route('pengumuman.update',$pengumuman->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label><b>Cover</b></label><br>
                        <input type="file" class="form-control" name="pamflet" value="{{ $pengumuman->pamflet }}"><br>
                        <img width="150px" src="{{asset('pamflet/'.$pengumuman->pamflet)}}">
                    </div>
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul:</strong>
                <input type="text" name="judul" class="form-control" placeholder="Judul Pengumuman" value="{{$pengumuman->judul}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Isi Pengumuman</strong>
                <textarea name="isi" class="form-control" id="isi" rows="10" placeholder="Tuliskan isi di sini...">{{$pengumuman->isi}}</textarea>
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