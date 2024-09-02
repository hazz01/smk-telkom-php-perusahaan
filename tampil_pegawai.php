<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h3>Tampil Pegawai</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA PEGAWAI</th>
                <th>ALAMAT</th>
                <th>GENDER</th>
                <th>TELP</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>JABATAN</th>
                <th>GAJI POKOK</th>
                <th>TUNJANGAN</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "connection.php";
            $qry_pegawai = mysqli_query($conn, "SELECT pegawai.*, jabatan.nama_jabatan, jabatan.gaji_pokok, jabatan.tunjangan 
                                                FROM pegawai 
                                                JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan");
            $no = 0;
            while ($data_pegawai = mysqli_fetch_array($qry_pegawai)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_pegawai['nama_pegawai'] ?></td>
                    <td><?= $data_pegawai['alamat'] ?></td>
                    <td><?= $data_pegawai['gender'] ?></td>
                    <td><?= $data_pegawai['telp'] ?></td>
                    <td><?= $data_pegawai['username'] ?></td>
                    <td><?= $data_pegawai['password'] ?></td>
                    <td><?= $data_pegawai['nama_jabatan'] ?></td>
                    <td><?= number_format($data_pegawai['gaji_pokok'], 0, ',', '.') ?></td>
                    <td><?= number_format($data_pegawai['tunjangan'], 0, ',', '.') ?></td>
                    <td>
                        <a href="ubah_pegawai.php?id_pegawai=<?= $data_pegawai['id_pegawai'] ?>" class="btn btn-success">Ubah</a> | 
                        <a href="hapus.php?id_pegawai=<?= $data_pegawai['id_pegawai'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="tambah_pegawai.php" class="btn btn-primary">Tambah Pegawai</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>