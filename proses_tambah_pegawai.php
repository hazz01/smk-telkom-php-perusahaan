<?php
if ($_POST) {
    // Debugging
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    // Continue with your existing code
    $nama_pegawai = $_POST['nama_pegawai'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['jenis_kelamin'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_jabatan = $_POST['id_jabatan'];

    if (empty($id_jabatan)) {
        echo "<script>alert('Jabatan tidak boleh kosong');location.href='tambah_pegawai.php';</script>";
    } elseif (empty($nama_pegawai)) {
        echo "<script>alert('Nama pegawai tidak boleh kosong');location.href='tambah_pegawai.php';</script>";
    } else {
        include "connection.php";
        $insert = mysqli_query($conn, "INSERT INTO pegawai (nama_pegawai, alamat, gender, telp, username, password, id_jabatan) VALUES ('$nama_pegawai', '$alamat', '$gender', '$telp', '$username', '$password', '$id_jabatan')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan pegawai');location.href='tampil_pegawai.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pegawai');location.href='tambah_pegawai.php';</script>";
        }
    }
}
?>
