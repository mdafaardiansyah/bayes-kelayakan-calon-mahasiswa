<?php
	$server = "localhost";
    $user = "root";
    $pass = "";
    $database = "naivebayes";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	$jsekolah=htmlspecialchars($_POST['jsekolah']);
	$p1=htmlspecialchars($_POST['p1']);
	$p2=htmlspecialchars($_POST['p2']);
    $rata=htmlspecialchars($_POST['nrata']);
	$nrata= (float)$rata;
	$result=htmlspecialchars($_POST['result']);
	
	print_r($_POST);
	$sql = "INSERT INTO `atribut`( `jsekolah`, `pil1`, `pil2`, `nrata`, `pilus`) 
	VALUES ('$jsekolah','$p1','$p2','$nrata','$result')";
	if (mysqli_query($koneksi, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
		echo mysqli_error($koneksi);
	}
	mysqli_close($koneksi);
?>