@extends('layouts.admenu')
@section('title', 'Detail Informasi')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Detail Informasi</h2>
        <a class="btn btn-primary" style="float: right;" href="{{ route('informasi.index') }}"> Back</a>
    </div>
</div>
<br>
   

     <div class="row justify-content-center">
        <div class="card shadow col-15 col-md-12 col-md-12">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label><b>Icon</b></label><br>
                        <img width="150px" src="{{asset('images/info/'.$informasi->gambar)}}" data-action="zoom">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No</strong>
                        <input type="text" name="no" class="form-control" value="{{$informasi->no}}" readonly>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Isi Informasi</strong>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="10" readonly>{{$informasi->keterangan}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection