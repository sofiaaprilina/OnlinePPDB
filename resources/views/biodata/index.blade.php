@extends('layouts.menu')

@section('title', 'Data Biodata')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Biodata</h2>
             </div>
             <div class="pull-right">
                 <div class="pull-right" style="float: right">
                    <form action="/cari" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <br>
                </form>
                 </div>
             </div>
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <div class="row">
        @foreach ($siswas as $siswa)
         @if (Auth::user()->id == $siswa->user_id)
         <form action="{{ route('biodata.update',$siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
         <div class="card shadow">
            <div class="card-body">
                <div class="table">
                    <table width="1000px">
                        <tr>
                            <td><strong>Nama Calon Siswa    : </strong></td>
                            <td><input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" disabled></td>
                        </tr>
                        <tr>
                            <td><strong>Tempat,Tanggal Lahir    : </strong></td>
                            <td><input type="text" value="{{ $siswa->tempat }}, {{ $siswa->tgl_lahir }}" class="form-control" disabled></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin       : </strong></td>
                            <td><input type="text" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }}" class="form-control" disabled></td>
                        </tr>
                        <tr>
                            <td><strong>Agama          : </strong></td>
                            <td><input type="text" name="agama" value="{{ $siswa->agama }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat          : </strong></td>
                            <td><input type="text" name="alamat" value="{{ $siswa->alamat }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Ayah   : </strong></td>
                            <td><input type="text" name="nm_ayah" value="{{ $siswa->nm_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ayah   : </strong></td>
                            <td><input type="text" name="kj_ayah" value="{{ $siswa->kj_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ayah   : </strong></td>
                            <td><input type="text" name="ph_ayah" value="{{ $siswa->ph_ayah }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ayah   : </strong></td>
                            <td><input type="text" name="no_ayah" value="{{ $siswa->no_ayah }}" class="form-control"></td>
                        </tr>
                        <tr> 
                            <td><strong>Nama Ibu   : </strong></td>
                            <td><input type="text" name="nm_ibu" value="{{ $siswa->nm_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ibu   : </strong></td>
                            <td><input type="text" name="kj_ibu" value="{{ $siswa->kj_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Ibu   : </strong></td>
                            <td><input type="text" name="ph_ibu" value="{{ $siswa->ph_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ibu   : </strong></td>
                            <td><input type="text" name="no_ibu" value="{{ $siswa->no_ibu }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Wali   : </strong></td>
                            <td><input type="text" name="nm_wali" value="{{ $siswa->nm_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Wali   : </strong></td>
                            <td><input type="text" name="kj_wali" value="{{ $siswa->kj_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Penghasilan Wali   : </strong></td>
                            <td><input type="text" name="ph_wali" value="{{ $siswa->ph_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Wali   : </strong></td>
                            <td><input type="text" name="no_wali" value="{{ $siswa->no_wali }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggungan Orang Tua   : </strong></td>
                            <td><input type="text" name="tanggungan" value="{{ $siswa->tanggungan }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>Email           : </strong></td>
                            <td><input type="text" name="email" value="{{ $siswa->email }}" class="form-control"></td>
                        </tr>
                    </table>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
         </div>
         </form>
       @endif
    @endforeach 
</div>
@endsection