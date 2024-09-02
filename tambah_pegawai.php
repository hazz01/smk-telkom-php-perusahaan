<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h3>Tambah Pegawai</h3>
    <form action="proses_tambah_pegawai.php" method="post">
        Nama Pegawai :
        <input type="text" name="nama_pegawai" required><br>
        Tanggal Lahir :
        <input type="date" name="tanggal_lahir" required><br>
        Alamat :
        <textarea name="alamat" required></textarea><br>
        Jenis Kelamin :
        <select name="jenis_kelamin" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br>
        Telp:
        <input type="text" name="telp" required><br>
        Username :
        <input type="text" name="username" required><br>
        Password :
        <input type="password" name="password" required><br>
        Jabatan :
        <select name="id_jabatan" required>
            <option value="">Pilih Jabatan</option>
            <?php
            include "connection.php";
            $get_kelas = mysqli_query($conn, "SELECT * FROM jabatan");
            while ($row = mysqli_fetch_array($get_kelas)) {
            ?>
                <option value="<?php echo $row['id_jabatan']; ?>"><?php echo $row['nama_jabatan']; ?></option>
            <?php
            }
            ?>
        </select><br>
        <button type="submit">Tambah pegawai</button>
    </form>
</body>

</html>