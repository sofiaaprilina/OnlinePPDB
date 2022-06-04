<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cetak Data Pendaftar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T">
</head>
<body>
    @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif

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
        <h4>DATA PENDAFTAR</h4>
    </center>
    <br>    
    <table class="table cell-border tabel_data" style="page-break-inside:auto; margin-bottom: 0px; padding-bottom: 0px;">
                        <tr class="tr-break" style="text-align: center;">
                            <th>Id</th>
                            <th>Tanggal Daftar</th>
                            <th>Nama Siswa</th>
                            <th>Nama Ortu / Wali</th>
                            <th>Email Orang Tua / Wali</th>
                            <th>No. Telp</th>
                            <th>Status</th>
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
                            </tr>
                            </thead>
                
                        <tbody style="font-family: 'Times New Roman'; border-top: 1px solid black !important;">
                        @foreach ($pendaftars as $pendaftar)
                        <tr class="tabel_data ">
                            <td>{{ $pendaftar->id }}</td>
                            <td>{{ $pendaftar->tgl_daftar }}</td>
                            <td>{{ $pendaftar->siswa }}</td>
                            <td>{{ $pendaftar->ortu }}</td>
                            <td>{{ $pendaftar->email }}</td>
                            <td>{{ $pendaftar->no_telp }}</td>
                            <td>{{ $pendaftar->status }}</td>
                        </tr>
                        @endforeach 
                    </tbody>
                    </table>
                <br>
            <br><br>
            
</body>
</html>