<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');
//proses tambah
if(isset($_POST['tambah'])){
    $nama_unit_kerja = $_POST['nama_unit_kerja'];
    $keterangan = $_POST['keterangan'];

    
    $insert = mysqli_query($con,"INSERT INTO unit_kerja (nama_unit_kerja, keterangan) VALUES ('$nama_unit_kerja','$keterangan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data unit_kerja';
    }else{
        $error = 'Gagal menambahkan data unit_kerja';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?unit_kerja');
}
//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM unit_kerja WHERE id_unitkerja='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data unit_kerja';
    }else{
        $error = 'Gagal menghapus data unit_kerja';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?unit_kerja');
}

?>