<?php
    include 'koneksi.php';

    // data ayah
    $familly    = mysqli_query($conn, "select * from keluarga");
    $kk         = mysqli_query($conn, "select * from keluarga where id='1'");
    $anak_budi  = mysqli_query($conn, "select * from keluarga where id_ayah='1'");
    // $cucu_budi  = mysqli_query($conn, "select * from keluarga where id_ayah not in ('1', '0')");
    $row        = mysqli_fetch_array($kk);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/tree.css">
    <title>Treeview Keluarga</title>
</head>
<body>
    <div id="wrapper">
        <span class="label"><?= $row['nama'] ?></span>
        <div class="branch lv1">
            <?php foreach($anak_budi as $ab) {?>
                <div class="entry">
                    <span class="label"><?= $ab['nama']?></span>
                        <?php 
                            $cucu_budi  = mysqli_query($conn, "select * from keluarga where id_ayah='$ab[id]'");
                            if($cucu_budi->num_rows > 0){
                        ?>
                        <div class="branch lv2">
                            <?php foreach($cucu_budi as $cb) 
                            
                            { if($cb['id_ayah'] == $ab['id']) {?>
                                <div class="entry">
                                    <span class="label"><?= $cb['nama']?></span>
                                </div>
                                <?php } }?>
                            </div>
                        <?php }?>
                       
                </div>
            <?php }?>
        </div>
    </div>
    <a href="index.php">Kembali</a>
</body>
</html>