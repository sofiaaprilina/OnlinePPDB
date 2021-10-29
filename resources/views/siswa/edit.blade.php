@extends('layouts.main')   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('siswa.index') }}"> Back</a>
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
  
    <form action="{{ route('siswa.update',$siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Calon Siswa:</strong>
                    <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" placeholder="Nama Calon Siswa">
                </div>
            </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Lahir:</strong>
                <input type="text" name="tempat" value="{{ $siswa->tempat }}" class="form-control" placeholder="Tempat Lahir">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir:</strong>
                <input type="date" name="tgl_lahir" value="{{ $siswa->tgl_lahir}}" class="form-control datepicker" placeholder="yyyy/mm/dd">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin:</strong>
                <select class="form-control" name="jenis_kelamin">
                    <option value="{{ $siswa->jenis_kelamin}}">{{ $siswa->jenis_kelamin}}</option>
	                <option value="laki-laki">Laki-laki</option>
	                <option value="perempuan">Perempuan</option>
	            </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agama:</strong>
                <input type="text" name="agama" value="{{ $siswa->agama }}" class="form-control" placeholder="Agama">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" value="{{ $siswa->alamat }}" class="form-control" placeholder="Alamat">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ayah:</strong>
                <input type="text" name="nm_ayah" value="{{ $siswa->nm_ayah }}" class="form-control" placeholder="Nama Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Ayah:</strong>
                <input type="text" name="kj_ayah" value="{{ $siswa->kj_ayah }}" class="form-control" placeholder="Pekerjaan Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp Ayah:</strong>
                <input type="text" name="no_ayah" value="{{ $siswa->no_ayah }}" class="form-control" placeholder="No Telp atau WA Ayah">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ibu:</strong>
                <input type="text" name="nm_ibu" value="{{ $siswa->nm_ibu }}" class="form-control" placeholder="Nama Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Ibu:</strong>
                <input type="text" name="kj_ibu" value="{{ $siswa->kj_ibu }}" class="form-control" placeholder="Pekerjaan Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp Ibu:</strong>
                <input type="text" name="no_ibu" value="{{ $siswa->no_ibu }}" class="form-control" placeholder="No Telp atau WA Ibu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Wali:</strong>
                <input type="text" name="nm_wali" value="{{ $siswa->nm_wali }}" class="form-control" placeholder="Nama Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pekerjaan Wali:</strong>
                <input type="text" name="kj_wali" value="{{ $siswa->kj_wali }}" class="form-control" placeholder="Pekerjaan Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp Wali:</strong>
                <input type="text" name="no_wali" value="{{ $siswa->no_wali }}" class="form-control" placeholder="No Telp atau WA Wali">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $siswa->email }}" class="form-control" placeholder="Masukkan Email">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="akte">Akte Kelahiran</label>
                <input type="file" class="form-control" name="akte" value="{{ $siswa->akte }}">
                <img width="150px" src="{{asset('storage/'.$siswa->akte)}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="kk">Kartu Keluarga</label>
                <input type="file" class="form-control" name="kk" value="{{ $siswa->kk }}">
                <img width="150px" src="{{asset('storage/'.$siswa->kk)}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="ktp">KTP Orang Tua</label>
                <input type="file" class="form-control" name="ktp" value="{{ $siswa->ktp }}">
                <img width="150px" src="{{asset('storage/'.$siswa->ktp)}}">
            </div>
        </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection