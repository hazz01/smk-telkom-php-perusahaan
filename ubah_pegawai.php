<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pegawai</title>
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
        .form-control, .form-select {
            background-color: #2c2c2c;
            color: #e0e0e0;
            border: 1px solid #444;
        }
        .form-control:focus, .form-select:focus {
            border-color: #666;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include "connection.php";

        if (isset($_GET['id_pegawai']) && is_numeric($_GET['id_pegawai'])) {
            $id_pegawai = $_GET['id_pegawai'];
            $qry_get_pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");

            if (mysqli_num_rows($qry_get_pegawai) > 0) {
                $dt_pegawai = mysqli_fetch_array($qry_get_pegawai);
            } else {
                echo "<p class='text-danger'>No pegawai found with id_pegawai: " . $id_pegawai . "</p>";
                exit;
            }
        } else {
            echo "<p class='text-danger'>Invalid or missing id_pegawai.</p>";
            exit;
        }
        ?>
        <h3 class="text-center">Ubah Pegawai</h3>
        <form action="proses_ubah_pegawai.php" method="post">
            <input type="hidden" name="id_pegawai" value="<?= htmlspecialchars($dt_pegawai['id_pegawai']) ?>">
            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama Pegawai:</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" value="<?= htmlspecialchars($dt_pegawai['nama_pegawai']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telp:</label>
                <input type="text" name="telp" id="telp" value="<?= htmlspecialchars($dt_pegawai['telp']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <?php
                $arr_gender = array('L' => 'Laki-laki', 'P' => 'Perempuan');
                ?>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="">Pilih Gender</option>
                    <?php foreach ($arr_gender as $key_gender => $val_gender):
                        $selected = ($key_gender == $dt_pegawai['gender']) ? "selected" : "";
                    ?>
                        <option value="<?= htmlspecialchars($key_gender) ?>" <?= $selected ?>><?= htmlspecialchars($val_gender) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="4" required><?= htmlspecialchars($dt_pegawai['alamat']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="id_jabatan" class="form-label">Jabatan:</label>
                <select name="id_jabatan" id="id_jabatan" class="form-select" required>
                    <option value="">Pilih Jabatan</option>
                    <?php
                    $qry_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                    while ($data_jabatan = mysqli_fetch_array($qry_jabatan)) {
                        $selected = ($data_jabatan['id_jabatan'] == $dt_pegawai['id_jabatan']) ? "selected" : "";
                        echo '<option value="' . htmlspecialchars($data_jabatan['id_jabatan']) . '" ' . $selected . '>' . htmlspecialchars($data_jabatan['nama_jabatan']) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" value="<?= htmlspecialchars($dt_pegawai['username']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" value="" class="form-control">
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Ubah Pegawai</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
