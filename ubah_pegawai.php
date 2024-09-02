<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <?php
    include "connection.php";

    if (isset($_GET['id_pegawai']) && is_numeric($_GET['id_pegawai'])) {
        $id_pegawai = $_GET['id_pegawai'];
        $qry_get_pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");

        if (mysqli_num_rows($qry_get_pegawai) > 0) {
            $dt_pegawai = mysqli_fetch_array($qry_get_pegawai);
            // Process the data as usual
        } else {
            echo "No student found with id_pegawai: " . $id_pegawai;
        }
    } else {
        echo "Invalid or missing id_pegawai.";
    }
    ?>
    <h3>Tambah pegawai</h3>
    <form action="proses_ubah_pegawai.php" method="post">
        <input type="hidden" name="id_pegawai" value="<?= $dt_pegawai['id_pegawai'] ?>">
        nama pegawai :
        <input type="text" name="nama_pegawai" value="<?= $dt_pegawai['nama_pegawai'] ?>" class="form-control">
        Telp :
        <input type="text" name="telp" value="<?= $dt_pegawai['telp'] ?>" class="form-control">
        Gender :
        <?php
        $arr_gender = array('L' => 'Laki-laki', 'P' => 'Perempuan');
        ?>
        <select name="gender" class="form-control">
            <option></option>
            <?php foreach ($arr_gender as $key_gender => $val_gender):
                if ($key_gender == $dt_pegawai['gender']) {
                    $selek = "selected";
                } else {
                    $selek = "";
                }
            ?>
                <option value="<?= $key_gender ?>" <?= $selek ?>><?= $val_gender ?></option>
            <?php endforeach ?>
        </select>
        Alamat :
        <textarea name="alamat" class="form-control" rows="4"><?= $dt_pegawai['alamat'] ?></textarea>
        jabatan :
        <select name="id_jabatan" class="form-control">
            <option></option>
            <?php
            include "connection.php";
            $qry_jabatan = mysqli_query($conn, "select * from jabatan");
            while ($data_jabatan = mysqli_fetch_array($qry_jabatan)) {
                if ($data_jabatan['id_jabatan'] == $dt_pegawai['id_jabatan']) {
                    $selek = "selected";
                } else {
                    $selek = "";
                }
                echo '<option value="' . $data_jabatan['id_jabatan'] . '" ' . $selek . '>' . $data_jabatan['nama_jabatan'] . '</option>';
            }
            ?>
        </select>
        Username :
        <input type="text" name="username" value="<?= $dt_pegawai['username'] ?>" class="form-control">
        Password :
        <input type="password" name="password" value="" class="form-control">
        <input type="submit" name="simpan" value="Ubah pegawai" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>