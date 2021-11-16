@extends('layouts.menu')

@section('title', 'Cetak Data')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Cetak Data</h2>
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
         
         <div class="card shadow">
            <div class="card-body">
                <a class="btn btn-info" href="{{ route('cetak.cetak_pdf') }}" target="_blank">Cetak</a>
                <br><br>
                <div class="table">
                    <table width="1000px">
                        <tr>
                            <td><strong>Nama Calon Siswa    : </strong></td>
                            <td>{{ $siswa->nama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tempat,Tanggal Lahir    : </strong></td>
                            <td>{{ $siswa->tempat }}, {{ $siswa->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin       : </strong></td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td><strong>Agama          : </strong></td>
                            <td>{{ $siswa->agama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat          : </strong></td>
                            <td>{{ $siswa->alamat }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Ayah   : </strong></td>
                            <td>{{ $siswa->nm_ayah }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ayah   : </strong></td>
                            <td>{{ $siswa->kj_ayah }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ayah   : </strong></td>
                            <td>{{ $siswa->no_ayah }}</td>
                        </tr>
                        <tr> 
                            <td><strong>Nama Ibu   : </strong></td>
                            <td>{{ $siswa->nm_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ibu   : </strong></td>
                            <td>{{ $siswa->kj_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ibu   : </strong></td>
                            <td>{{ $siswa->no_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Wali   : </strong></td>
                            <td>{{ $siswa->nm_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Wali   : </strong></td>
                            <td>{{ $siswa->kj_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Wali   : </strong></td>
                            <td>{{ $siswa->no_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email           : </strong></td>
                            <td>{{ $siswa->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Akte           : </strong></td>
                            <td><img width="250px" src="{{asset('storage/'.$siswa->akte)}}"></td>
                        </tr>
                        <tr>
                            <td><strong>KK           : </strong></td>
                            <td><img width="250px" src="{{asset('storage/'.$siswa->kk)}}"></td>
                        </tr>
                        <tr>
                            <td><strong>KTP           : </strong></td>
                            <td><img width="250px" src="{{asset('storage/'.$siswa->ktp)}}"></td>
                        </tr>
                    </table>
                </div>
            </div>
         </div>
       @endif
    @endforeach 
</div>
 @endsection