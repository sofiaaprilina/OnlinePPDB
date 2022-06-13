<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cetak Laporan Data Pendaftaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T">
</head>
<body>
    @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <div class="row">
        @foreach ($siswa as $s)
         @if (Auth::user()->id == $s->user_id)
         <?php
            $keringanan = "";

            if ($s->status_ayah == 'Meninggal' && $s->tanggungan > 3 && $s->ph_ibu < 1000000){
                $keringanan = "Ya";
            }
            elseif ($s->status_ibu == 'Meninggal' && $s->tanggungan > 3 && $s->ph_ayah < 1000000) {
                $keringanan = "Ya";
            } 
            elseif ($s->status_ayah == 'Meninggal' && $s->status_ibu == 'Meninggal' && $s->ph_wali < 1000000 && $s->tanggungan > 3){
                $keringanan = "Ya";
            }
            else{
                $keringanan = "Tidak";
            } 
         ?>
         @endif
        @endforeach 
     </div>

     <style type="text/css">
        table tr td,
        table tr th{
            font-size: 12pt;
        }
        .table td, .table th {
            padding: 5px;
            /* border: 1px solid black; */
        }

        .tabel_data {
          /* border: 1px solid black ; */
          border-collapse: collapse ;
        }

        .border_none {
            /* border: 1px solid black ; */
            /* border-top: 1px solid black ; */
        }

        .tr-break {
            page-break-inside:avoid; page-break-after:auto;
            /* border: 1px solid black; */
        }
        .thead-break {display: table-header-group;}

        .right   { text-align: right;}
    </style>
    <center>
        <h3>PPDB RA QURROTA A'YUN</h3>
        <h6>JL. Krapyak, Panggungrejo, Kepanjen, Kab.Malang</h6>
        <h6>Telp. 085102120143, 087704616524</h6>
        <h5>_____________________________________________________________________</h5>
        <h4>DATA CALON SISWA BARU</h4>
    </center>
    <br>    
        <table class="table cell-border" style="page-break-inside:auto; margin-bottom: 1px; padding-bottom: 1px;" width="500">
            @foreach ($siswa as $s)
            @if (Auth::user()->id == $s->user_id)
            <tr class="tr-break">
                <td colspan="2" style="font-size:13pt;"><strong>&nbsp;A. Identitas Calon Siswa</strong></td>
                <br><br>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Kartu Keluarga</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->no_kk }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK Calon Siswa</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->nik }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Calon Siswa</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->nama }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat, Tanggal Lahir</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->tempat }}, {{ $s->tgl_lahir }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->jenis_kelamin }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agama</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->agama }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->alamat }}</td>
            </tr>
            <br>
            <tr class="tr-break">
                <td colspan="2" style="font-size:13pt;"><strong>&nbsp;B. Identitas Orang Tua / Wali Calon Siswa</strong></td>
                <br><br>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK Ayah</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->nik_ayah }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Ayah</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->nm_ayah }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan Ayah</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->kj_ayah }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penghasilan Ayah</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;Rp. {{ $s->ph_ayah }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Telp Ayah</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->no_ayah }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK Ibu</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->nik_ibu }}</td>
            </tr>
            <tr class="tr-break"> 
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Ibu</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->nm_ibu }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan Ibu</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->kj_ibu }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penghasilan Ibu</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;Rp. {{ $s->ph_ibu }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Telp Ibu</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->no_ibu }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK Wali</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->nik_wali }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Wali</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->nm_wali }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan Wali</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->kj_wali }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penghasilan Wali</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;Rp. {{ $s->ph_wali }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Telp Wali</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->no_wali }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jumlah Tanggungan Orang Tua / Wali</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->tanggungan }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->email }}</td>
            </tr>
            <tr class="tr-break">
                <td class="tabel_data"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status Keringanan</strong></td>
                <td class="tabel_data">&nbsp;&nbsp;{{ $s->keringanan }}</td>
            </tr>
            @endif
            @endforeach 
        </table>
    <br>
    <p><i>*Dokumen ini harap dibawa ketika melakukan daftar ulang. Beserta FotoCopy Akte, KK, KTP Orang Tua*</p><br><br>
    <p class="right">Orang Tua / Wali Murid</p>
    <br><br><br>
    <p class="right">_______________________</p>
            
</body>
</html>