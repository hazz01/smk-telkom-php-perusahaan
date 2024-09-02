<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
        .container {
            background-color: #1e1e1e;
            border-radius: 8px;
            padding: 2rem;
            margin-top: 2rem;
        }
        h3 {
            color: #f5f5f5;
            margin-bottom: 1rem;
        }
        .table {
            background-color: #2c2c2c;
            color: #e0e0e0;
        }
        .table thead th {
            background-color: #333;
            color: #e0e0e0;
        }
        .table tbody tr:hover {
            background-color: #444;
        }
        .btn-primary, .btn-success, .btn-danger {
            margin: 0.1rem;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="tampil_pegawai.php">Tampil Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah_pegawai.php">Tambah Pegawai</a>
                    </li>
                    <!-- Add more navigation items here -->
                </ul>
                <div class="ms-auto">
                    <a href="logout.php" class="btn btn-outline-light">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <h3 class="text-center">Tampil Pegawai</h3>
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
                            <a href="ubah_pegawai.php?id_pegawai=<?= $data_pegawai['id_pegawai'] ?>" class="btn btn-success">Ubah</a>
                            <a href="hapus.php?id_pegawai=<?= $data_pegawai['id_pegawai'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="tambah_pegawai.php" class="btn btn-primary">Tambah Pegawai</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
