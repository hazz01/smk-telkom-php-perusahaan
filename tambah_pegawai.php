<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
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
        }
        .form-label {
            color: #e0e0e0;
        }
        .form-control, .form-select, .form-control:focus {
            background-color: #2c2c2c;
            border-color: #444;
            color: #e0e0e0;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
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
        <h3 class="text-center">Tambah Pegawai</h3>
        <form action="proses_tambah_pegawai.php" method="post">
            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telp</label>
                <input type="text" id="telp" name="telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="id_jabatan" class="form-label">Jabatan</label>
                <select id="id_jabatan" name="id_jabatan" class="form-select" required>
                    <option value="">Pilih Jabatan</option>
                    <?php
                    include "connection.php";
                    $get_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                    while ($row = mysqli_fetch_array($get_jabatan)) {
                    ?>
                        <option value="<?php echo $row['id_jabatan']; ?>"><?php echo $row['nama_jabatan']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Tambah Pegawai</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-hO+4LqQ4xHc8hxHOm2Oks4zvj3FS+gsTRk4H6A2X/tK0U1RmeZhB/tG00GV6Kz4D" crossorigin="anonymous"></script>
</body>

</html>
