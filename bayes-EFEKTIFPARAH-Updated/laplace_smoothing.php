<?php 
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "naivebayes";
    
        $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

        $jsekolah = $_POST["jsekolah"];
		$p1 = $_POST["p1"];
		$p2 = $_POST["p2"];
		$rata = $_POST["nrata"];
		$nrata= (float)$rata;

		#var_dump($nrata);

		$hasil_query = mysqli_query($koneksi, "SELECT * from atribut");
		$datalatih = mysqli_fetch_assoc($hasil_query);
		
		//Mencari Peluang Kelas

		//Peluang Kelas Pilihan 1
	 	//pembilang
		$d_pilihan_1=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE pilus = 'Pilihan Pertama' ");
		$b_pilihan_1=mysqli_fetch_array($d_pilihan_1);

		//penyebut
		$d_pilihan=mysqli_query($koneksi,"SELECT count(pilus) AS jumlah FROM atribut ");
		$b_pilihan=mysqli_fetch_array($d_pilihan);

		$p_pilihan_1=($b_pilihan_1["jumlah"]/$b_pilihan["jumlah"]);
		#var_dump($p_pilihan_1);

		//Peluang Kelas Pilihan 2
		$d_pilihan_2=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE pilus = 'Pilihan Kedua' ");
		$b_pilihan_2=mysqli_fetch_array($d_pilihan_2);

		$p_pilihan_2=($b_pilihan_2["jumlah"]/$b_pilihan["jumlah"]);
		#var_dump($p_pilihan_2);

		//peluang Atribut#1 Jurusan Sekolah
		$d_jsekolah_pil1=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE jsekolah = '$jsekolah' AND pilus = 'Pilihan Pertama' ");
		$b_jsekolah_pil1=mysqli_fetch_array($d_jsekolah_pil1);
		$p_jsekolah_pil1=($b_jsekolah_pil1["jumlah"]/$b_pilihan_1["jumlah"]);
		#var_dump($p_jsekolah_pil1);
		
		$d_jsekolah_pil2=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE jsekolah = '$jsekolah' AND pilus = 'Pilihan Kedua' ");
		$b_jsekolah_pil2=mysqli_fetch_array($d_jsekolah_pil2);
		$p_jsekolah_pil2=($b_jsekolah_pil2["jumlah"]/$b_pilihan_2["jumlah"]);
		#var_dump($p_jsekolah_pil2);

		//Peluang Atribut#2 Pilihan Pertama 
		$d_p1_pil1=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE pil1 = '$p1' AND pilus = 'Pilihan Pertama' ");
		$b_p1_pil1=mysqli_fetch_array($d_p1_pil1);
		$p_p1_pil1=($b_p1_pil1["jumlah"]/$b_pilihan_1["jumlah"]);
		#var_dump($p_p1_pil1);

		$d_p1_pil2=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE pil1 = '$p1' AND pilus = 'Pilihan Kedua' ");
		$b_p1_pil2=mysqli_fetch_array($d_p1_pil2);
		$p_p1_pil2=($b_p1_pil2["jumlah"]/$b_pilihan_2["jumlah"]);
		#var_dump($p_p1_pil2);

		//Peluang Atribut#3 Pilihan Kedua 
		$d_p2_pil1=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE pil2 = '$p2' AND pilus = 'Pilihan Pertama' ");
		$b_p2_pil1=mysqli_fetch_array($d_p2_pil1);
		$p_p2_pil1=($b_p2_pil1["jumlah"]/$b_pilihan_1["jumlah"]);
	    #var_dump($p_p2_pil1);

		$d_p2_pil2=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE pil2 = '$p2' AND pilus = 'Pilihan Kedua' ");
		$b_p2_pil2=mysqli_fetch_array($d_p2_pil2);
		$p_p2_pil2=($b_p2_pil2["jumlah"]/$b_pilihan_2["jumlah"]);
		#var_dump($p_p2_pil2);

		//Peluang Atribut#4 Nilai Rata-Rata 
		$d_nrata_pil1=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE nrata = '$nrata' AND pilus = 'Pilihan Pertama' ");
		$b_nrata_pil1=mysqli_fetch_array($d_nrata_pil1);
		$p_nrata_pil1=($b_nrata_pil1["jumlah"]/$b_pilihan_1["jumlah"]);
		#var_dump($p_nrata_pil1); 

		$d_nrata_pil2=mysqli_query($koneksi,"SELECT count(*) AS jumlah FROM atribut WHERE nrata = '$nrata' AND pilus = 'Pilihan Kedua' ");
		$b_nrata_pil2=mysqli_fetch_array($d_nrata_pil2);
		$p_nrata_pil2=($b_nrata_pil2["jumlah"]/$b_pilihan_2["jumlah"]);
		#var_dump($p_nrata_pil2);

		//Menghitung HMAPnya tanpa Laplace smoothing
		$keputusan_pil1=(($p_pilihan_1)*($p_jsekolah_pil1)*($p_p1_pil1)*($p_p2_pil1)*($p_nrata_pil1));
		$hmap_1=number_format($keputusan_pil1,6);
		#var_dump($hmap_1);

		$keputusan_pil2=(($p_pilihan_2)*($p_jsekolah_pil2)*($p_p1_pil2)*($p_p2_pil2)*($p_nrata_pil2));
		$hmap_2=number_format($keputusan_pil2,6);
        #var_dump($hmap_2);
        
        //Laplace Smoothing;
        //peluang Atribut#1 Jurusan Sekolah LS
		$dls_jsekolah_pil1=mysqli_query($koneksi,"SELECT count(DISTINCT jsekolah) FROM atribut AS jumlah");
		$bls_jsekolah_pil1=mysqli_fetch_assoc($dls_jsekolah_pil1);
		$pls_jsekolah_pil1=(($b_jsekolah_pil1["jumlah"] + 1 ) / ($b_pilihan_1["jumlah"] + $bls_jsekolah_pil1["jumlah"]));
		var_dump($pls_jsekolah_pil1);
		
		$dls_jsekolah_pil2=mysqli_query($koneksi,"SELECT count(DISTINCT jsekolah) FROM atribut AS jumlah");
		$bls_jsekolah_pil2=mysqli_fetch_array($dls_jsekolah_pil2);
		$pls_jsekolah_pil2=(($b_jsekolah_pil2["jumlah"] + 1 )/($b_pilihan_2["jumlah"] + $bls_jsekolah_pil2["jumlah"]));
		#var_dump($p_jsekolah_pil2);

		//Peluang Atribut#2 Pilihan Pertama LS
		$dls_p1_pil1=mysqli_query($koneksi,"SELECT count(DISTINCT p1) FROM atribut AS jumlah");
		$bls_p1_pil1=mysqli_fetch_array($dls_p1_pil1);
		$pls_p1_pil1=(($b_p1_pil1["jumlah"] + 1) / ($b_pilihan_1["jumlah"] + $bls_p1_pil1 ["jumlah"]));
		#var_dump($p_p1_pil1);

		$dls_p1_pil2=mysqli_query($koneksi,"SELECT count(DISTINCT p1) FROM atribut AS jumlah");
		$bls_p1_pil2=mysqli_fetch_array($dls_p1_pil2);
		$pls_p1_pil2=(($b_p1_pil2["jumlah"] + 1) / ($b_pilihan_2["jumlah"] + $bls_p1_pil2["jumlah"]));
		#var_dump($p_p1_pil2);

		//Peluang Atribut#3 Pilihan Kedua LS
		$dls_p2_pil1=mysqli_query($koneksi,"SELECT count(DISTINCT p2) FROM atribut AS jumlah");
		$bls_p2_pil1=mysqli_fetch_array($dls_p2_pil1);
		$pls_p2_pil1=(($b_p2_pil1["jumlah"] + 1) / ($b_pilihan_1["jumlah"] + $bls_p2_pil1["jumlah"]));
	    #var_dump($p_p2_pil1);

		$dls_p2_pil2=mysqli_query($koneksi,"SELECT count(DISTINCT p2) FROM atribut AS jumlah");
		$bls_p2_pil2=mysqli_fetch_array($dls_p2_pil2);
		$pls_p2_pil2=(($b_p2_pil2["jumlah"] + 1)/($b_pilihan_2["jumlah"] + $bls_p2_pil2["jumlah"]));
		#var_dump($p_p2_pil2);

		//Peluang Atribut#4 Nilai Rata-Rata LS
		$dls_nrata_pil1=mysqli_query($koneksi,"SELECT count(DISTINCT nrata) FROM atribut AS jumlah");
		$bls_nrata_pil1=mysqli_fetch_array($dls_nrata_pil1);
		$pls_nrata_pil1=(($b_nrata_pil1["jumlah"] + 1) / ($b_pilihan_1["jumlah"] + $bls_nrata_pil1["jumlah"]));
		#var_dump($p_nrata_pil1); 

		$dls_nrata_pil2=mysqli_query($koneksi,"SELECT count(DISTINCT nrata) FROM atribut AS jumlah");
		$bls_nrata_pil2=mysqli_fetch_array($dls_nrata_pil2);
		$pls_nrata_pil2=(($b_nrata_pil2["jumlah"] + 1) / ($b_pilihan_2["jumlah"] + $bls_nrata_pil2["jumlah"]));
		#var_dump($p_nrata_pil2);

		//Menghitung HMAPnya tanpa Laplace smoothing
		$keputusan_ls_pil1=(($p_pilihan_1)*($pls_jsekolah_pil1)*($pls_p1_pil1)*($pls_p2_pil1)*($pls_nrata_pil1));
		$hmap_ls_1=number_format($keputusan_ls_pil1,6);
		#var_dump($hmap_1);

		$keputusan_ls_pil2=(($p_pilihan_2)*($pls_jsekolah_pil2)*($pls_p1_pil2)*($pls_p2_pil2)*($pls_nrata_pil2));
		$hmap_ls_2=number_format($keputusan_ls_pil2,6);
		#var_dump($hmap_2);
		
		$laplace='Ya';
		if($keputusan_ls_pil1 > $keputusan_ls_pil2){
			$result="Pilihan Pertama";
			#var_dump($result);
		}else if($keputusan_ls_pil1 < $keputusan_ls_pil2){
			$result="Pilihan Kedua";
			#var_dump($result);
		}else if($keputusan_ls_pil1 == $keputusan_ls_pil2){
            $laplace='Ya';
            $result="laplace smoothing";
        }
        $hasil=array(
            "result" => $result,
            "laplace" => $laplace,
            "hmap_ls_1" =>$hmap_ls_1,
            "hmap_ls_2" => $hmap_ls_2
        );
        echo json_encode($hasil);