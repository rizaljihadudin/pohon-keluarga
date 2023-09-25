<?php
    include 'koneksi.php';
    // menyimpan data kedalam variabel
    $nama           = $_POST['nama'];
    $gender         = $_POST['gender'];
    $id_ayah        = $_POST['id_ayah'];
    // query SQL untuk insert data
    $query="INSERT INTO keluarga (nama, id_ayah, gender)  VALUES('$nama', '$id_ayah', '$gender')";
    mysqli_query($conn, $query);
    // mengalihkan ke halaman index.php
    header("location:index.php");
?>