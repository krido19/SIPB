<?php
    if(isset($_GET['backup_app'])){
        include ('proses/backup_app.php');
    }
    else if(isset($_GET['backup_db'])){
        include ('proses/backup_db.php');
    }
    else if(isset($_GET['unit_kerja'])){
        $master = $unit_kerja = true;
        $views = 'views/master/unit_kerja.php';
    }
    else if(isset($_GET['supplier'])){
        $master = $supplier = true;
        $views = 'views/master/supplier.php';
    }
    else if(isset($_GET['barang'])){
        $master = $barang = true;
        $views = 'views/master/barang.php';
    }
    else if(isset($_GET['pengguna'])){
        $master = $pengguna = true;
        $views = 'views/master/pengguna.php';
    }
    else if(isset($_GET['barang_masuk'])){
        $transaksi = $barang_masuk = true;
        $views = 'views/transaksi/barang_masuk.php';
    }
    else if(isset($_GET['barang_keluar'])){
        $transaksi = $barang_keluar = true;
        $views = 'views/transaksi/barang_keluar.php';
    }
    else if(isset($_GET['lap_barang_masuk'])){
        $laporan = $lap_barang_masuk = true;
        $views = 'views/laporan/lap_barang_masuk.php';
    }
    else if(isset($_GET['lap_barang_keluar'])){
        $laporan = $lap_barang_keluar = true;
        $views = 'views/laporan/lap_barang_keluar.php';
    }
    else{
        $home = true;
        $views = 'views/home.php';
    }
?>