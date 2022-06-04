@extends('layouts.main')

@section('title', 'Data Siswa Baru')

@section('notif')
    <li class="nav-item dropdown no-arrow mx-1">
        @php
            $jumlah = $daftars->count() + $alerts->count();
        @endphp
        @if ($jumlah > 0)
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">{{$jumlah}}</span>
            </a>
        @else
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter"></span>
            </a>
        @endif
        
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            @foreach ($daftars as $daftar)
            <a class="dropdown-item d-flex align-items-center" href="/pendaftar">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{$daftar->tgl_daftar}}</div>
                    <span class="font-weight-bold">Pendaftar: {{$daftar->siswa}} {{$daftar->status}}</span>
                </div>
            </a>
            @endforeach
            @foreach ($alerts as $alert)
            <a class="dropdown-item d-flex align-items-center" href="/siswa">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{$alert->created_at}}</div>
                    <span class="font-weight-bold">Berkas: {{$alert->nama}} {{$alert->berkas}}</span>
                </div>
            </a>
            @endforeach
        </div>
    </li>
@endsection

 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Data Siswa Baru</h2>
             </div>
             <div class="pull-right">
                 <!-- <a class="btn btn-success" href="{{ route('siswa.create') }}"> Tambah Siswa</a> -->
                 <div class="pull-right" style="float: right">
                    <form action="/cariSiswa" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="cariSiswa"  class="form-control bg-light border-1 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
                <br>
                </form>
                 </div>
                 <div class="pull-left">
                    <a href="#" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-info"></i>
                        </span>
                        <span class="text text-justify">Berkas Terkonfirmasi    : {{$konfirm}} <br>Berkas Belum Terkonfirmasi    : {{$nokonfirm}} </span>
                    </a>
                    <a href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-info"></i>
                        </span>
                        <span class="text text-justify">Lolos Seleksi    : {{$sis}} <br>Kuota    : 125 </span>
                    </a>
                    <div class="my-2"></div>
                 </div>
             </div>
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <div class="card shadow">
        <div class="card-body">
            <div class="table">
     <table class="table-bordered" width="1000px">
         <tr>
             <th>Id</th>
             <th>Nama Siswa</th>
             <th>Tempat Tanggal Lahir</th>
             <th>Jenis Kelamin</th>
             <th>Alamat</th>
             <th>Status Berkas</th>
             <th>Status</th>
             <th >Action</th>
         </tr>
         @foreach ($siswas as $siswa)
         <tr>
             <td>{{ $siswa->id }}</td>
             <td>{{ $siswa->nama }}</td>
             <td>{{ $siswa->tempat }},{{ $siswa->tgl_lahir }}</td>
             <td>{{ $siswa->jenis_kelamin }}</td>
             <td>{{ $siswa->alamat }}</td>
             <td>{{ $siswa->berkas }}</td>
            <td width="100px">
                @if ($siswa->berkas == 'Terkonfirmasi')
                    <select class="status form-control" data-id="{{ $siswa->id }}" style="padding: 2px">
                        <option value="{{$siswa->status}}">{{$siswa->status}}</option>
                        @if ($sis < 125)
                            <option value="Lolos" {{ $siswa->status ? 'selected' : '' }}>Lolos</option>
                        @endif
                        <option value="Tidak Lolos" {{ !$siswa->status ? 'selected' : '' }}>Tidak Lolos</option>
                    </select>
                @endif
            </td>
             
             <td width="200px">
                <form action="{{ route('siswa.destroy',$siswa->id) }}" method="POST">
                    <div class="nav-item dropdown no-arrow">
                        <a class="btn btn-warning" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Konfirmasi</a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('berkas.valid',$siswa->id) }}">
                                Kirim Notifikasi Valid
                            </a>
                            <a class="dropdown-item" href="{{ route('berkas.novalid',$siswa->id) }}">
                                Kirim Notifikasi Tidak Valid
                            </a>
                         </div>
                    </div>
                    <br>
                    {{-- <a class="btn btn-warning" href="#">Konfirmasi</a><br> --}}
                    <a class="btn btn-info" href="{{ route('siswa.show',$siswa->id) }}"><i class="fas fa-clipboard-list text-gray-100"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('siswa.edit',$siswa->id) }}"><i class="fas fa-edit text-gray-100"></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash text-gray-100"></button>
                </form>
            </td>
        </tr>
        @endforeach
     </table>
            </div>
        </div>
     </div>

    {{ $siswas->links() }}

    {{-- <script>
        $(".status").on("change", function(){
        // alert($(this).data('id'));
        // alert($(this).val());
            var temp = $(this); 
            $.ajax({
                url: '{{ url("/ubah-status-siswa") }}',
                type: 'post',
                data: {_token: "{{ csrf_token() }}", id: $(this).data("id"),  status: $(this).val() },
            });
        });
    </script> --}}

 @endsection