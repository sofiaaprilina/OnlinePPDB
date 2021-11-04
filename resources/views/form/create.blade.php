<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>
  
<body>
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
        <section class="col-15 col-sm-7 col-md-6">
		<form class="form-container" action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data" >
    	@csrf
                <h2 class="text-center font-weight-bold"> Form Pendaftaran </h2>
				</br>
                <div class="form-group">
				<label for="siswa">Nama Siswa</label>
				<input type="text" id="siswa" name="siswa" class="form-control" placeholder="Masukkan Nama Siswa">
			</div>
            <div class="form-group">
				<label for="ortu">Nama Orang Tua</label>
				<input type="text" id="ortu" name="ortu" class="form-control" placeholder="Masukkan Nama Orang Tua">
			</div>
            <div class="form-group">
				<label for="tempat">Tempat Lahir</label>
				<input type="text" id="tempat" name="tempat" class="form-control" placeholder="Masukkan Tempat Lahir">
			</div>
            <div class="form-group">
				<label for="tgl_lahir">Tanggal Lahir</label>
				<input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir">
			</div>
            <div class="form-group">
				<label for="jenis_kelamin">Jenis Kelamin</label>
				<select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
					<option value="">- Pilih Jenis Kelamin</option>
					<option value="perempuan">Perempuan</option>
					<option value="laki-laki">Laki-laki</option>
				</select>
			</div>
            <div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
			</div>
            <div class="form-group">
				<label for="no_telp">No Telepon (WhatssApp)</label>
				<input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Masukkan Nomor Telepon">
			</div>
            <div class="form-group">
				<label for="email">Email</label>
				<input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Email">
			</div>
            <div class="form-group">
                <label for="bayar">Upload Bukti Pembayaran</label>
                <input type="file" name="bayar">
			</div>
			</br>
			<div class="col-xs-15 col-sm-15 col-md-15 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
</br>
</br>
        </section>
        </section>
    </section>
 
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, danyang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>