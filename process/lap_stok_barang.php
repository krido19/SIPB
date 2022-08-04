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
    
    <title>Cetak Laporan Stok Barang </title>

</head>

<body>
    <?php
$query = mysqli_query($con,"SELECT x.*,x1.nama_unit_kerja,x2.nama_supplier FROM barang x JOIN unit_kerja x1 ON x1.id_unitkerja=x.unitkerja_id JOIN supplier x2 ON x2.idsupplier=x.supplier_id ORDER BY x.idbarang DESC")or die(mysqli_error($con));
    
    ?>
    <div style="page-break-after:always;text-align:center;margin-top:2%;">
        <div style="line-height:5px;">
    <center>
        
            <tr><table border="2">
                           <img src="logo.jpg" width="90"><br><br><br><br>
                            <center>
                            <font size="4">SMK NEGERI 1 MAGELANG</font><br><br><br><br><br>
                            <font size="3">di Jl. Cawang No 2 Kota Magelang</font><br>
            
           <tr>  </tr><br>
           <br>
           <td> <h2>LAPORAN STOK BARANG</h2> </td> <br><br><br>
        </div>
        <hr style="border-color:black;">
        <table class="tab">
            <tr>
                <th width="20">NO</th>
                <th>NAMA BARANG</th>
                <th>UNIT KERJA</th>
                <th>SUPPLIER</th>
                <th>KETERANGAN</th>
                <th>STOK</th>
            </tr>
            <?php $n=1; while($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td align="center"><?= $n++.'.'; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['nama_unit_kerja']; ?></td>
                <td><?= $row['nama_supplier']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['stok']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>

<script>
window.print();
</script>