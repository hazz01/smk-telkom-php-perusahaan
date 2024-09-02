<?php
if($_POST){
    $id_pegawai=$_POST['id_pegawai'];
    $nama_pegawai=$_POST['nama_pegawai'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $id_jabatan=$_POST['id_jabatan'];
    
    if(empty($nama_pegawai)){
        echo "<script>alert('nama pegawai tidak boleh kosong');location.href='tambah_pegawai.php';</script>";
    } else {
        include "connection.php";
        if(empty($password)){
            $update=mysqli_query($conn, "UPDATE pegawai SET nama_pegawai='".$nama_pegawai."', telp='".$telp."', gender='".$gender."', alamat='".$alamat."', id_jabatan='".$id_jabatan."' WHERE id_pegawai = '".$id_pegawai."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update pegawai');location.href='tampil_pegawai.php';</script>";
            } else {
                echo "<script>alert('Gagal update pegawai');location.href='ubah_pegawai.php?id_pegawai=".$id_pegawai."';</script>";
            }
        } else {
            $update=mysqli_query($conn, "UPDATE pegawai SET nama_pegawai='".$nama_pegawai."', telp='".$telp."', gender='".$gender."', alamat='".$alamat."', id_jabatan='".$id_jabatan."', password='".md5($password)."' WHERE id_pegawai = '".$id_pegawai."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update pegawai');location.href='tampil_pegawai.php';</script>";
            } else {
                echo "<script>alert('Gagal update pegawai');location.href='ubah_pegawai.php?id_pegawai=".$id_pegawai."';</script>";
            }
        }
    }
}
