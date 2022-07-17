<?php 
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "naivebayes";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title> Program Naive Bayes Studi Kasus Kelulusan Mahasiswa Baru</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>

		/* Button */
		
		/* Untuk Header */
		
		/* Untuk Footer */
		@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

		* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: "Poppins", sans-serif;
		}

		section {
		display: flex;
		background: #fff;
		justify-content: flex-end;
		align-items: flex-end;
		min-height: 50vh;
		}

		.footer {
		position: relative;
		width: 100%;
		background: #3586ff;
		min-height: 100px;
		padding: 20px 50px;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		}

		.social-icon,
		.menu {
		position: relative;
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 10px 0;
		flex-wrap: wrap;
		}

		.social-icon__item,
		.menu__item {
		list-style: none;
		}

		.social-icon__link {
		font-size: 2rem;
		color: #fff;
		margin: 0 10px;
		display: inline-block;
		transition: 0.5s;
		}
		.social-icon__link:hover {
		transform: translateY(-10px);
		}

		.menu__link {
		font-size: 1.2rem;
		color: #fff;
		margin: 0 10px;
		display: inline-block;
		transition: 0.5s;
		text-decoration: none;
		opacity: 0.75;
		font-weight: 300;
		}

		.menu__link:hover {
		opacity: 1;
		}

		.footer p {
		color: #fff;
		margin: 15px 0 10px 0;
		font-size: 1rem;
		font-weight: 300;
		}

		.wave {
		position: absolute;
		top: -100px;
		left: 0;
		width: 100%;
		height: 100px;
		background: url("https://i.ibb.co/wQZVxxk/wave.png");
		background-size: 1000px 100px;
		}

		.wave#wave1 {
		z-index: 1000;
		opacity: 1;
		bottom: 0;
		animation: animateWaves 4s linear infinite;
		}

		.wave#wave2 {
		z-index: 999;
		opacity: 0.5;
		bottom: 10px;
		animation: animate 4s linear infinite !important;
		}

		.wave#wave3 {
		z-index: 1000;
		opacity: 0.2;
		bottom: 15px;
		animation: animateWaves 3s linear infinite;
		}

		.wave#wave4 {
		z-index: 999;
		opacity: 0.7;
		bottom: 20px;
		animation: animate 3s linear infinite;
		}

		@keyframes animateWaves {
		0% {
			background-position-x: 1000px;
		}
		100% {
			background-positon-x: 0px;
		}
		}

		@keyframes animate {
		0% {
			background-position-x: -1000px;
		}
		100% {
			background-positon-x: 0px;
		}
		}

	</style>
</head>

<body>
<div class="container">
		<h1 class="text-center" style="font-variant:small-caps; font-size:50px"> Program Naive Bayes Studi Kasus Kelulusan Mahasiswa Baru </h1>
		<h2 class="text-center" style="font-size:15px; font-weight:bold">STATISTIKA KOMPUTASI</h2>
	<!-- Awal Tabel -->
	<div class="card mb-3 mt-3">
	  <div class="card-header bg-warning text-black" style="text-align:center">
	   <b>Daftar Tabel Data Train</b>
	  </div>
	  <div class="card-body">
	    <table class="table table-bordered" style="width: 100%" id="mydatatable">
	    	<thead class="thead-dark">
	    	<tr>
	    		<th colspan="1" rowspan="2" style="text-align:center; vertical-align: middle">No.</th>
	    		<th colspan="4" style="text-align:center">Atribut Umum</th>
	    		<th colspan="1" style="text-align:center">Kelas (Label)</th>
	    		<th colspan="2" style="text-align:center; vertical-align: middle">Aksi</th>
	    	</tr>
	    	<tr>
	    		<th style="text-align:center; vertical-align: middle">Jurusan Sekolah</th>
	    		<th style="text-align:center; vertical-align: middle">Pilihan Pertama</th>
	    		<th style="text-align:center; vertical-align: middle">Pilihan Kedua</th>
	    		<th style="text-align:center; vertical-align: middle">Nilai Rata-Rata</th>
	    		<th style="text-align:center; vertical-align: middle">Pilihan Lulus</th>
	    		<th style="text-align:center; vertical-align: middle">Edit</th>
	    		<th style="text-align:center; vertical-align: middle">Hapus</th>
	    	</tr>
	    	</thead>

	    	<tbody>
	    	<?php 
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from atribut");
	    		while($data = mysqli_fetch_array($tampil)) :
	    	 ?>
	    	<tr>
	    		<td style="text-align: center;"><?=$no++;?> </td>
	    		<td style="text-align: center;"><?=$data['jsekolah']?></td>
	    		<td style="text-align: center;"><?=$data['pil1']?></td>
	    		<td style="text-align: center;"><?=$data['pil2']?></td>
	    		<td style="text-align: center;"><?=$data['nrata']?></td>
	    		<td style="text-align: center;"><?=$data['pilus']?></td>
				<td style="text-align: center;">
					<button type="submit" class="btn btn-info">
						EDIT
					</button>
				</td>
				<td style="text-align: center;">
					<a href="hapus.php?id=<?=$data['nomor']?>" class="btn btn-danger"> DELETE </a>
				</td>
	    	</tr>
	   		<?php endwhile; //Akhir Dari Loop While ?>
	    	</tbody>

	    	<tfoot>
	    		<tr>
	    		</tr>
	    	</tfoot>
	    </table>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#mydatatable').DataTable({
				"pageLength" : 5,
				"lengthMenu": [[5,10,15,20,25,-1],[5,10,15,20,25,"All"]]
			});
		});
	</script>
	<!-- Akhir Tabel -->

	<!-- Awal Form -->
	<div class="card mt-3">
	  <div class="card-header bg-info text-white" style="text-align:center">
	    <b>List Atribut Data</b>
	  </div>
	  <div class="card-body">
	    <form method="post" id='form_bayes'>

	    	<div class="form-group">
	    		<label> Jurusan Sekolah </label>
	    		<select class="form-control" name="jsekolah" id="jursek" required>
	    			<option value=""disabled selected hidden>Masukkan Jurusan SMA/SMK Anda Disini !</option>
	    			<option value="IPA (Ilmu pengetahuan Alam)">IPA (Ilmu pengetahuan Alam)</option>
	    			<option value="TKJ (Teknik Komputer Jaringan)">TKJ (Teknik Komputer dan Jaringan)</option>
	    			<option value="Bahasa">Bahasa</option>
	    			<option value="IPS (Ilmu Pengetahuan Sosial)">IPS (Ilmu Pengetahuan Sosial)</option>
	    			<option value="Kesehatan">Kesehatan</option>
	    			<option value="Perkantoran">Perkantoran</option>
	    		</select>
	    	</div>

	    	<div class="form-group">
	    		<label> Pilihan Pertama </label>
	    		<select class="form-control" name="p1" id="pil1" required>
	    			<option value=""disabled selected hidden>Masukkan Pilihan 1 Anda Disini !</option>
	    			<option value="Sistem Informasi">Sistem Informasi</option>
	    			<option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
	    			<option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
	    			<option value="PPKn">PPKn</option>
	    			<option value="Bahasa Indonesia">Bahasa Indonesia</option>
	    			<option value="Matematika">Matematika</option>
	    		</select>
	    	</div>

	    	<div class="form-group">
	    		<label> Piliham Kedua </label>
	    		<select class="form-control" name="p2" id="pil2" required>
	    			<option value=""disabled selected hidden>Masukkan Pilihan 2 Anda Disini !</option>
	    			<option value="Sistem Informasi">Sistem Informasi</option>
	    			<option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
	    			<option value="Teknik Informatika">Teknik Informatika</option>
	    			<option value="Peternakan">Peternakan</option>
	    			<option value="Ekonomi Islam">Ekonomi Islam</option>
	    		</select>
	    	</div>

	    	<div class="form-group">
	    		<label> Nilai Rata - Rata </label>
	    		<input type="text" name="nrata" id="rata2" class="form-control" placeholder="Masukkan Nilai Rata-Rata Anda Disini !" required>
	    	</div>

			<center>
	    		<button type="reset" class="btn btn-danger" name="bulang">Hapus Semua Tulisan yang Berada di Form </button>
	    	</center>
			<!--

			<div class="form-group">
	    		<label> Pilihan Lulus  </label>
	    		<select class="form-control" name="pilihan_lulus" required>
	    			<option value=""disabled selected hidden>Hasil anda Akan keluar disini !</option>
	    			<option value="p1">Pilihan Pertama</option>
	 				<option value="p2">Pilihan Kedua</option>
	 				<option value="p0">Tidak Lulus</option>
	    		</select>
	    	</div>
			
			Cadangan -->
			</form>
			<br>
			<center>
	    		<button type="button" class="btn btn-success" name="perhitungan" id="perhitunganjs">Hitung ! </button>
			</center>
			<!--<button type="button" class="btn btn-success" name="perhitungan" id="laplacejs">Hitung Laplace Smoothing ! </button> -->

			<!-- Rectangular switch -->
	  </div>
	</div>
	<br>
	<!-- Akhir Form -->

</div>

<script type="text/javascript" src="bootstrap.min.cjs"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script> 
$('#perhitunganjs').click(function(){

$.post(
	'http://localhost/bayes-EFEKTIFPARAH/perhitungan.php' ,
	$('#form_bayes').serialize(),
	function(data){
		var laplace ="";
		data=JSON.parse(data);
		console.log(data);

		if(data["laplace"]== "Ya"){
					laplace="Anda Disarankan Menggunakan Laplace Smothing";
				}
		Swal.fire({
			title: 'Hasil HMAP',
			html:
				'Hasil dari HMAP 1 = <b> '+data["hmap1"]+'  </b> <br></br> ' +
				'Hasil dari HMAP 2 = <b> '+data["hmap2"]+' </b> <br></br> ' +
				'Maka Keputusan Pilihannya Adalah <b> '+data["result"]+' </b> <br></br>'+
				laplace+
				'<h6> <b> Apakah Anda ingin Memasukkan Hasil ke Data Traine ? <b> </h6>',

			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			cancelButtonText: 'Tidak'
		}).then((result) => {
			if (result.isConfirmed) {
						var jsekolah = $('#jursek').val();
						var p1 = $('#pil1').val();
						var p2 = $('#pil2').val();
						var nrata = $('#rata2').val();
						var result = data['result'];
						if(jsekolah!="" && p1!="" && p2!="" && nrata!=""){
							$.ajax({
								url: "insert.php",
								type: "POST",
								data: {
									jsekolah: jsekolah,
									p1: p1,
									p2: p2,
									nrata: nrata,
									result: result				
								},
								cache: false,
								success: function(dataResult){
									var dataResult = JSON.parse(dataResult);

									if(dataResult.statusCode==200){
										$("#butsave").removeAttr("disabled");
										$('#fupForm').find('input:text').val('');
										$("#success").show();
										$('#success').html('Data added successfully !'); 						
									}
									else if(dataResult.statusCode==201){
									alert("Error occured !");
									}
									
								}
							});
						}
						else{
							alert('Please fill all the field !');
						}	
			}
			else {
				location.reload();
			}
		})
	}
);

});
</script>
<script> 
$('#laplacejs').click(function(){

$.post(
	'http://localhost/bayes-EFEKTIFPARAH/laplace_smoothing.php' ,
	$('#form_bayes').serialize(),
	function(data){
		var laplace ="";
		data=JSON.parse(data);
		console.log(data);

		if(data["laplace"]== "Tidak"){
					laplace="Anda Disarankan tidak Menggunakan Laplace Smooothing";
				}
		Swal.fire({
			title: 'Hasil HMAP dari Laplace Smoothing',
			html:
				'Hasil dari HMAP 1 = <b> '+data["hmap_ls_1"]+'  </b> <br></br> ' +
				'Hasil dari HMAP 2 = <b> '+data["hmap_ls_2"]+' </b> <br></br> ' +
				'Maka Keputusan Pilihannya Adalah <b> '+data["result"]+' </b> <br></br>'+
				laplace+
				'<h6> <b> Apakah Anda ingin Memasukkan Hasil ke Data Traine ? <b> </h6>',

			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			cancelButtonText: 'Tidak'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire(
				'Deleted!',
				'Your file has been deleted.',
				'success'
				)
			}
			else {
				location.reload();
			}
		})
	}
);

});
</script>
<section>
<footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="https://twitter.com/GlanzeGlare">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="https://www.instagram.com/ardidafa21/">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu">
      <li class="menu__item"><a class="menu__link" href="#">Home</a></li>

    </ul>
    <p>&copy;2020 Dafa Ardiansyah | All Rights Reserved</p>
</section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </footer>
  
</body>
</html>