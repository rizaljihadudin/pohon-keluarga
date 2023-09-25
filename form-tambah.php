<?php
include 'koneksi.php';

// mengambil informasi ayah
$father    = mysqli_query($conn, "select * from keluarga where gender = 'L' and id_ayah = '1'");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Silsilah</title>
    </head>
    <body>
        <form method="post" action="insert.php">
            <table>
                <tr><td>NAMA</td><td><input type="text" value="" name="nama"></td></tr>
                <tr><td>JENIS KELAMIN</td><td>
                        <input type="radio" name="gender" value="L">Laki Laki
                        <input type="radio" name="gender" value="P">Perempuan
                    </td></tr>
                <tr><td>Ayah</td><td>
                       
                        <select name="id_ayah">
                            <?php
                            foreach ($father as $val){
                                echo "<option value='$val[id]' ";
                                echo ">$val[nama]</option>";
                            }
                          
                            ?>
                        </select>
                    </td></tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" value="tambah">Tambahkan</button>
                        <a href="index.php">Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
