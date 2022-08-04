<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');
//proses tambah
if(isset($_POST['tambah'])){
    $nama_supplier = $_POST['nama_supplier'];
    $keterangan = $_POST['keterangan'];

    
    $insert = mysqli_query($con,"INSERT INTO supplier (nama_supplier, keterangan) VALUES ('$nama_supplier','$keterangan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data supplier';
    }else{
        $error = 'Gagal menambahkan data supplier';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?supplier');
}
//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM supplier WHERE idsupplier='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data supplier';
    }else{
        $error = 'Gagal menghapus data supplier';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?supplier');
}

?>