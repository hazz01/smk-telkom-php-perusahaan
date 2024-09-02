<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
        .navbar {
            background-color: #1e1e1e;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #e0e0e0;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .container {
            margin-top: 2rem;
        }
        .card {
            background-color: #1e1e1e;
            color: #e0e0e0;
        }
        .card-header {
            background-color: #2c2c2c;
        }
        .btn-outline-light {
            border-color: #e0e0e0;
            color: #e0e0e0;
        }
        .btn-outline-light:hover {
            background-color: #e0e0e0;
            color: #121212;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
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

    <!-- Dashboard Content -->
    <div class="container">
        <div class="row">
            <!-- Welcome Section -->
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        Selamat Datang
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Halo, <?=$_SESSION['nama_pegawai']?></h4>
                        <p class="card-text">Selamat datang di dashboard Anda. Gunakan menu di atas untuk menavigasi aplikasi Anda. Semoga Anda mendapatkan pengalaman yang menyenangkan!</p>
                    </div>
                </div>
            </div>

            <!-- Berita Terkini Section -->
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        Berita Terkini
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>
                                <h5>Berita 1</h5>
                                <p>Deskripsi singkat tentang berita terkini 1.</p>
                            </li>
                            <li>
                                <h5>Berita 2</h5>
                                <p>Deskripsi singkat tentang berita terkini 2.</p>
                            </li>
                            <!-- Add more news items here -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Additional Section (e.g., Statistik Pegawai) -->
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        Statistik Pegawai
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Total Pegawai</h5>
                                <p class="fs-3">5</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Pegawai Aktif</h5>
                                <p class="fs-3">1</p>
                            </div>
                        </div>
                        <!-- Optionally, you can add charts or graphs here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
