<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form Pendaftaran</title>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
<!-- costum css -->
<link rel="stylesheet" href="{{asset('formdaftar/style.css')}}">
</head>
  
<body>
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
			<div class="row">
				<div class="col-lg-12">
					<a class="btn btn-primary" href="/">Back</a><br>
				</div>
			</div>
        <section class="col-15 col-sm-7 col-md-6">
		<form class="form-container" action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data" >
    	@csrf
                <h2 class="text-center font-weight-bold"> Form Pendaftaran </h2>
				</br>
                <div class="form-group">
				<label for="siswa"><b>Nama Siswa</b><small style="color: red";>*</small></label>
				<input type="text" id="siswa" name="siswa" class="form-control" placeholder="Masukkan Nama Siswa" required>
			</div>
            <div class="form-group">
				<label for="ortu"><b>Nama Orang Tua / Wali</b><small style="color: red";>*</small></label>
				<input type="text" id="ortu" name="ortu" class="form-control" placeholder="Masukkan Nama Orang Tua" required>
			</div>
            <div class="form-group">
				<label for="tempat"><b>Tempat Lahir Siswa</b><small style="color: red";>*</small></label>
				<input type="text" id="tempat" name="tempat" class="form-control" placeholder="Masukkan Tempat Lahir" required>
			</div>
            <div class="form-group">
				<label for="tgl_lahir"><b>Tanggal Lahir Siswa</b><small style="color: red";>*</small></label>
				<input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" required>
			</div>
            <div class="form-group">
				<label for="jenis_kelamin"><b>Jenis Kelamin Siswa</b><small style="color: red";>*</small></label>
				<select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
					<option value="">- Pilih Jenis Kelamin</option>
					<option value="Perempuan">Perempuan</option>
					<option value="Laki-laki">Laki-laki</option>
				</select>
			</div>
            <div class="form-group">
				<label for="alamat"><b>Alamat</b><small style="color: red";>*</small></label>
				<textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
			</div>
            <div class="form-group">
				<label for="no_telp"><b>No Telepon Orang Tua / Wali</b><small style="color: red";>*</small></label>
				<input type="text" id="no_telp" name="no_telp" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13" placeholder="Masukkan Nomor Telepon" required>
			</div>
            <div class="form-group">
				<label for="email"><b>Email Orang Tua / Wali</b><small style="color: red";>*</small></label>
				<input type="email" id="email" name="email" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" placeholder="Masukkan Email" required>
				<p>Gunakan email aktif dengan type gmail. Contoh: qurrotaayun@gmail.com</p>
			</div>
            <div class="form-group">
                <label for="bayar"><b>Ijazah PAUD Siswa (bila ada)</b></label><br/>
                <input type="file" name="sekolah" class="form-control" accept="image/jpeg,image/jpg,image/png"> 
				<p>Format berkas berupa gambar dengan ekstensi .jpg/.jpeg/.png </p>
			</div>
            <div class="form-group">
                <label for="bayar"><b>Upload Bukti Pembayaran</b><small style="color: red";>*</small></label><br/>
                <input type="file" name="bayar" class="form-control" accept="image/jpeg,image/jpg,image/png" required> 
				<p>Format berkas berupa gambar dengan ekstensi .jpg/.jpeg/.png </p>
			</div><br/>
			<div>
				<p><b>Keterangan:</b> <small style="color: red";>*</small>  (Wajib diisi)</p>
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