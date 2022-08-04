<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama_barang = $_POST['nama_barang'];
    $unitkerja_id = $_POST['unitkerja_id'];
    $supplier_id = $_POST['supplier_id'];
    $keterangan = $_POST['keterangan'];
    $stok = 0;

    $insert = mysqli_query($con,"INSERT INTO barang (unitkerja_id, supplier_id, nama_barang, keterangan, stok) VALUES ('$unitkerja_id','$supplier_id','$nama_barang','$keterangan','$stok')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data barang';
    }else{
        $error = 'Gagal menambahkan data barang';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang');
}

if(isset($_POST['ubah'])){
    $id = $_POST['idbarang'];
    $unitkerja_id = $_POST['unitkerja_id'];
    $supplier_id = $_POST['supplier_id'];
    $nama_barang = $_POST['nama_barang'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($con,"UPDATE barang SET unitkerja_id='$unitkerja_id', supplier_id='$supplier_id', nama_barang='$nama_barang', keterangan='$keterangan' WHERE idbarang='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data barang';
    }else{
        $error = 'Gagal mengubah data barang';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang');
}

if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    // echo $_GET['act'];die;
    $id = decrypt($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM barang WHERE idbarang='$id'")or die(mysqli_error($con));
    if ($delete) {
        $success = "Data barang berhasil dihapus";
    }else{
        $error = "Data barang gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang');
}
?>