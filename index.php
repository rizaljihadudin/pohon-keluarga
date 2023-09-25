

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Silsilah</title>
</head>
<body>
    <div class="wrapper">
        <nav>
            <div class="container-flex">
                <div class="brand">
                    <a href="">Silsilah</a>
                </div>
                <div class="burger">
                    <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                </div>
                <div class="bg-sidebar"></div>
                <ul class="sidebar">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="pohon.php">Pohon Keluarga</a></li>
                </ul>
            </div>
        </nav>
    </div>
    
    <div>
        <h2>Daftar keluarga</h2>
        <br>
        <br>
        <a href='form-tambah.php'>Tambah</a>
        <br>
        <br>
        <table border="1">
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
                include 'koneksi.php';
                $keluarga = mysqli_query($conn, "SELECT * from keluarga");
                $no = 1;
                foreach ($keluarga as $row) {
                    $jenis_kelamin = $row['gender'] == 'P' ? 'Perempuan' : 'Laki laki';
                    echo "<tr>
                <td>$no</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $jenis_kelamin . "</td>
                <td><a href='form-edit.php?id=$row[id]'>Edit</a>
                    <a href='delete.php?id=$row[id]'>Delete</a>
                </td>
                </tr>";
                    $no++;
                }
            ?>
        </table>
    </div>

</body>
</html>