@extends('layouts.menu')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Biodata</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('biodata.index') }}"> Back</a>
        </div>
    </div>
</div>
   
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

<form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Calon Siswa:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama Calon Siswa">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Lahir</strong>
                <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir:</strong>
                <input type="date" name="tgl_lahir" class="form-control datepicker" placeholder="yyyy/mm/dd">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Jenis Kelamin</label>
	            <select class="form-control" name="jenis_kelamin">
	                <option value="laki-laki">Laki-laki</option>
	                <option value="perempuan">Perempuan</option>
	            </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agama:</strong>
                <input type="text" name="agama" class="form-control" placeholder="Agama">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ayah:</strong>
                <input type="text" name="nm_ayah" class="form-control" placeholder="Nama Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Ayah:</strong>
                <input type="text" name="kj_ayah" class="form-control" placeholder="Pekerjaan Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penghasilan Ayah:</strong>
                <input type="text" name="ph_ayah" class="form-control" placeholder="Penghasilan Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telp Ayah:</strong>
                <input type="text" name="no_ayah" class="form-control" placeholder="Nomor Telp atau WA Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ibu:</strong>
                <input type="text" name="nm_ibu" class="form-control" placeholder="Nama Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Ibu:</strong>
                <input type="text" name="kj_ibu" class="form-control" placeholder="Pekerjaan Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penghasilan Ibu:</strong>
                <input type="text" name="ph_ibu" class="form-control" placeholder="Penghasilan Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telp Ibu:</strong>
                <input type="text" name="no_ibu" class="form-control" placeholder="Nomor Telp atau WA Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Wali:</strong>
                <input type="text" name="nm_wali" class="form-control" placeholder="Nama Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Wali:</strong>
                <input type="text" name="kj_wali" class="form-control" placeholder="Pekerjaan Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penghasilan Wali:</strong>
                <input type="text" name="ph_wali" class="form-control" placeholder="Penghasilan Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telp Wali:</strong>
                <input type="text" name="no_wali" class="form-control" placeholder="Nomor Telp atau WA Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggungan Orang Tua:</strong>
                <input type="text" name="tanggungan" class="form-control" placeholder="Tanggungan Orang Tua">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Masukkan email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection