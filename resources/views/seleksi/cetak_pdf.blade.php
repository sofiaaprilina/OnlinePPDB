<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cetak Laporan Hasil Seleksi</title>
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
        @endforeach 
     </div>

     <style type="text/css">
        html{margin:40px 50px}

        table tr td,
        table tr th{
            font-size: 12pt;
        }
        .table td, .table th {
            padding: 1px;
        }

        .tabel_data {
          border: 1px solid black !important;
          border-collapse: collapse !important;
        }

        .border_none {
            border: 1px solid white !important;
            border-top: 1px solid white !important;
        }

        .tr-break {
            page-break-inside:avoid; page-break-after:auto;
        }
        .thead-break {display: table-header-group;}
        table, th, td  {
          border: 1px solid black !important;
          border-collapse: collapse !important;
        }
    </style>
    <center>
        <h3>PPDB RA QURROTA A'YUN</h3>
        <h6>JL. Krapyak, Panggungrejo, Kepanjen, Kab.Malang Telp. 085102120143, 087704616524</h6>
        <h5>_____________________________________________________________________</h5>
        <h4>DATA HASIL SELEKSI</h4>
    </center>
    <br>    
    <table class="table cell-border tabel_data" style="page-break-inside:auto; margin-bottom: 0px; padding-bottom: 0px;">
                        <tr class="tr-break" style="text-align: center;">
                            <th>ID</th>
                            <th>Nama Siswa</th>
                            <th>Tempat, Tangggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Nama Ayah</th>
                            <th>No Ayah</th>
                            <th>Nama Ibu</th>
                            <th>No Ibu</th>
                            <th>Keringanan</th>
                            <th>Check</th>
                        </tr>
                        <thead style="border-top: 1.5px solid black !important; border-bottom: 1px solid black !important;">
                            <tr class="tabel_data tr-break" style="background-color: #9c9c9c; text-align: center;">
                              <th class="tabel_data">1</th>
                              <th class="tabel_data">2</th>
                              <th class="tabel_data">3</th>
                              <th class="tabel_data">4</th>
                              <th class="tabel_data">5</th>
                              <th class="tabel_data">6</th>
                              <th class="tabel_data">7</th>
                              <th class="tabel_data">8</th>
                              <th class="tabel_data">9</th>
                              <th class="tabel_data">10</th>
                              <th class="tabel_data">11</th>
                              <th class="tabel_data">12</th>
                            </tr>
                            </thead>
                
                        <tbody style="font-family: 'Times New Roman'; border-top: 1px solid black !important;">
                        @foreach ($siswa as $s)
                        <tr class="tabel_data ">
                            <td>{{$s->id}}</td>
                            <td>{{$s->nama}}</td>
                            <td>{{$s->tempat}},{{$s->tgl_lahir}}</td>
                            <td>{{$s->jenis_kelamin}}</td>
                            <td>{{$s->agama}}</td>
                            <td>{{$s->alamat}}</td>
                            <td>{{$s->nm_ayah}}</td>
                            <td>{{$s->no_ayah}}</td>
                            <td>{{$s->nm_ibu}}</td>
                            <td>{{$s->no_ibu}}</td>
                            <td>{{$keringanan}}</td>
                            <td></td>
                        </tr>
                        @endforeach 
                    </tbody>
                    </table>
                <br>
            <br><br>
            <p class="right">Panitia</p>
            <br><br><br>
            <p class="right">_______________________</p>
            
</body>
</html>