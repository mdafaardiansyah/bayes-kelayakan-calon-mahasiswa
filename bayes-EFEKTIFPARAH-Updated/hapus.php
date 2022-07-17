<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "naivebayes";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));


$id = $_GET["id"];

function hapus($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM atribut WHERE nomor = $id");
    return mysqli_affected_rows($koneksi);
}

if( hapus($id) > 0 ){
    echo "
        <script>
            alert('Data Berhasil DiHapus !');
            document.location.href = 'index.php';
        </script>
    
    ";
} else {
    echo "
        <script>
            alert('Data Gagal DiHapus!');
            document.location.href = 'index.php';
        </script>

    ";
}

?>