<?php
// session_start();
include ('../config/conn.php');
include ('../config/function.php');
?>
<html>

<head>
    <style>
    h2 {
        padding: 0px;
        margin: 0px;
        font-size: 14pt;
    }

    h4 {
        font-size: 12pt;
    }

    text {
        padding: 0px;
    }

    table {
        border-collapse: collapse;
        border: 1px solid #000;
        font-size: 11pt;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
    }

    table.tab {
        table-layout: auto;
        width: 100%;
    }
    </style>
    <title>Cetak Laporan Barang Keluar</title>
</head>

<body>
    <?php
    $tgl_awal = $_POST['tanggal_awal'];
    $tgl_akhir = $_POST['tanggal_akhir'];
    $query = mysqli_query($con,"SELECT x.*,x1.nama_barang,x2.nama_unit_kerja,x3.nama_supplier FROM barang_keluar x JOIN barang x1 ON x1.idbarang=x.barang_id JOIN unit_kerja x2 ON x2.id_unitkerja=x1.unitkerja_id JOIN supplier x3 ON x3.idsupplier=x1.supplier_id WHERE x.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY x.idbarang_keluar DESC")or die(mysqli_error($con));
    
    ?>
   <div style="page-break-after:always;text-align:center;margin-top:2%;">
        <div style="line-height:2px;">
        <center>
        
        <tr><table border="2">
                       <img src="logo.jpg" width="90"><br><br><br><br><br><br>
                        <center>
                        <font size="4">SMK NEGERI 1 MAGELANG</font><br><br><br><br><br><br><br><br><br>
                        <font size="3">di Jl. Cawang No 2 Kota Magelang</font><br>
        
       <tr>  </tr><br>
       <br>
       <td> <h2>LAPORAN BARANG KELUAR</h2> </td> <br><br><br>
            <h4>TANGGAL "<?= date('d-m-Y',strtotime($tgl_awal)); ?>" SAMPAI
                "<?= date('d-m-Y',strtotime($tgl_akhir)); ?>"</h4>
        </div>
        <hr style="border-color:black;">
        <table class="tab">
            <tr>
                <th width="20">NO</th>
                <th>TGL</th>
                <th>NAMA BARANG</th>
                <th>UNIT KERJA</th>
                <th>SUPPLIER</th>
                <th>NAMA KARYAWAN</th>
                <th>JUMLAH</th>
            </tr>
            <?php $n=1; while($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td align="center"><?= $n++.'.'; ?></td>
                <td><?= date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['nama_unit_kerja']; ?></td>
                <td><?= $row['nama_supplier']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['jumlah']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>

<script>
window.print();
</script>