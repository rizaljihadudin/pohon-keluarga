<?php
include 'koneksi.php';
$id         = $_GET['id'];
$keluarga   = mysqli_query($conn, "select * from keluarga where id='$id'");
$row        = mysqli_fetch_array($keluarga);

// mengambil informasi ayah
$father    = mysqli_query($conn, "select * from keluarga where gender = 'L' and id_ayah = '1'");
// membuat function untuk set aktif radio button
function active_radio_button($value,$input){
    // apabilan value dari radio sama dengan yang di input
    $result =  $value==$input?'checked':'';
    return $result;
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Silsilah</title>
    </head>
    <body>
        <form method="post" action="update.php">
            <input type="hidden" value="<?php echo $row['id'];?>" name="id">
            <table>
                <tr><td>NAMA</td><td><input type="text" value="<?php echo $row['nama'];?>" name="nama"></td></tr>
                <tr><td>JENIS KELAMIN</td><td>
                        <input type="radio" name="gender" value="L" <?php echo active_radio_button("L", $row['gender'])?>>Laki Laki
                        <input type="radio" name="gender" value="P" <?php echo active_radio_button("P", $row['gender'])?>>Perempuan
                    </td></tr>
                <tr><td>Ayah</td><td>
                    <?php  if($row['id_ayah'] == 0){ 
                        echo ' anda tidak bisa mengupdate jenis hubungan anda'; 
                    } else {?>
                       
                        <select name="id_ayah">
                            <?php
                            foreach ($father as $val){
                                echo "<option value='$val[id]' ";
                                echo $val['id']==$row['id_ayah']?'selected="selected"':'';
                                echo ">$val[nama]</option>";
                            }
                          
                            ?>
                        </select>
                        <?php }?>
                    </td></tr>
                <tr><td colspan="2"><button type="submit" value="simpan">Update</button>
                        <a href="index.php">Kembali</a></td></tr>
            </table>
        </form>
    </body>
</html>
