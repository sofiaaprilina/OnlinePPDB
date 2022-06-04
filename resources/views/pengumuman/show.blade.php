@extends('layouts.admenu')
@section('title', 'Detail Pengumuman')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Detail Pengumuman</h2>
        <a class="btn btn-primary" style="float: right;" href="{{ route('pengumuman.index') }}"> Back</a>
    </div>
</div>
<br>
   

     <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label><b>Cover</b></label><br>
                        <img width="150px" src="{{asset('pamflet/'.$pengumuman->pamflet)}}" data-action="zoom">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Judul:</strong>
                        <input type="text" name="judul" class="form-control" value="{{$pengumuman->judul}}" readonly>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Isi Pengumuman</strong>
                        <textarea name="isi" class="form-control" id="isi" rows="10" readonly>{{$pengumuman->isi}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection