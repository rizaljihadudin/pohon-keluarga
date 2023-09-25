<?php
    include 'koneksi.php';
    // menyimpan data kedalam variabel
    $id             = $_POST['id'];
    $nama           = $_POST['nama'];
    $gender         = $_POST['gender'];

    if($_POST['id_ayah'] == null || $_POST['id_ayah'] == ''){
        $idx = 0;
    }else{
        $idx = $_POST['id_ayah'];
    }
    $id_ayah        = $idx;
    // query SQL untuk insert data
    $query="UPDATE keluarga SET nama='$nama',id_ayah='$id_ayah',gender='$gender' where id='$id'";
    mysqli_query($conn, $query);
    // mengalihkan ke halaman index.php
    header("location:index.php");
?>