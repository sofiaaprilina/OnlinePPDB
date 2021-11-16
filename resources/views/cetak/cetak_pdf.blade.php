<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Data Pendaftaran</title>
    
</head>
<body>
    <center>
        <h1>Laporan Data Pendaftaran</h1>
    </center>
    
                    <table width="1000px">
                        @foreach ($siswa as $s)
                        @if (Auth::user()->id == $s->user_id)
                        <tr>
                            <td><strong>Nama Calon siswa    : </strong></td>
                            <td>{{ $s->nama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tempat,Tanggal Lahir    : </strong></td>
                            <td>{{ $s->tempat }}, {{ $s->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin       : </strong></td>
                            <td>{{ $s->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td><strong>Agama          : </strong></td>
                            <td>{{ $s->agama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat          : </strong></td>
                            <td>{{ $s->alamat }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Ayah   : </strong></td>
                            <td>{{ $s->nm_ayah }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ayah   : </strong></td>
                            <td>{{ $s->kj_ayah }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ayah   : </strong></td>
                            <td>{{ $s->no_ayah }}</td>
                        </tr>
                        <tr> 
                            <td><strong>Nama Ibu   : </strong></td>
                            <td>{{ $s->nm_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Ibu   : </strong></td>
                            <td>{{ $s->kj_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Ibu   : </strong></td>
                            <td>{{ $s->no_ibu }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Wali   : </strong></td>
                            <td>{{ $s->nm_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pekerjaan Wali   : </strong></td>
                            <td>{{ $s->kj_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>No Telp Wali   : </strong></td>
                            <td>{{ $s->no_wali }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email           : </strong></td>
                            <td>{{ $s->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Akte           : </strong></td>
                            <td><img width="250px" src="{{public_path('storage/'.$s->akte)}}"></td>
                        </tr>
                        <tr>
                            <td><strong>KK           : </strong></td>
                            <td><img width="250px" src="{{public_path('storage/'.$s->kk)}}"></td>
                        </tr>
                        <tr>
                            <td><strong>KTP           : </strong></td>
                            <td><img width="250px" src="{{public_path('storage/'.$s->ktp)}}"></td>
                        </tr>
                        @endif
                        @endforeach 
                    </table>

</body>
</html>