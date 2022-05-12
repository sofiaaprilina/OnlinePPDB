@extends('layouts.menu')

@section('title', 'Data Berkas')

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Berkas</h2>
             </div>
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <div class="row">
        {{-- @foreach ($siswas as $siswa) --}}
        @if (Auth::user()->id == $siswa->user_id)
        <form action="{{ route('berkas.update',$siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card shadow">
                <div class="card-body">
                    <div class="table">
                    <table class="table-bordered" width="1000px">
                    <tr>
                        <th width="350px"><center>File</center></th>
                        <th width="300px"><center>Keterangan</center></th>
                        <th width="350px"><center>Opsi</center></th>
                    </tr>
                    <tr>
                        <td><center><img width="250px" src="{{asset('uploads/'.$siswa->akte)}}"></center></td>
                        <td><center>Akte</center></td>
                        <td>   
                            <input type="file" class="form-control" name="akte" value="{{ $siswa->akte }}" accept="image/jpeg,image/jpg,image/png">
                        </td>
                    </tr>
                    <tr>
                        <td><center><img width="250px" src="{{asset('uploads/'.$siswa->kk)}}"></center></td>
                        <td><center>Kartu Keluarga (KK)</center></td>
                        <td width="250px">   
                            <input type="file" class="form-control" name="kk" value="{{ $siswa->kk }}" accept="image/jpeg,image/jpg,image/png">
                        </td>
                    </tr>
                    <tr>
                        <td><center><img width="250px" src="{{asset('uploads/'.$siswa->ktp)}}"></center></td>
                        <td><center>KTP Orang Tua</center></td>
                        <td width="250px">   
                            <input type="file" class="form-control" name="ktp" value="{{ $siswa->ktp}}" accept="image/jpeg,image/jpg,image/png">
                        </td>
                    </tr>
                    <tr>
                        <td><center><img width="250px" src="{{asset('uploads/'.$siswa->gaji)}}"></center></td>
                        <td><center>Slip Gaji Orang Tua</center></td>
                        <td width="250px">   
                            <input type="file" class="form-control" name="gaji" value="{{ $siswa->gaji}}" accept="image/jpeg,image/jpg,image/png">
                        </td>
                    </tr>
                    </table>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
        </form>
        @endif
        {{-- @endforeach  --}}
    </div>

 @endsection