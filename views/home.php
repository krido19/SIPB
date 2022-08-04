<?php hakAkses(['admin']); $now = date('Y-m-d'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda </h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Barang Masuk Hari Ini</h4>
            <a href="<?=base_url();?>process/cetak_barang_masuk_today.php" target="_blank"
                class="btn btn-info btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Cetak</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>TANGGAL</th>
                            <th>NAMA BARANG</th>
                            <th>UNIT KERJA</th>
                            <th>SUPPLIER</th>
                            <th>JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        $query = mysqli_query($con,"SELECT x.*,x1.nama_barang,x2.nama_unit_kerja,x3.nama_supplier FROM barang_masuk x JOIN barang x1 ON x1.idbarang=x.barang_id JOIN unit_kerja x2 ON x2.id_unitkerja=x1.unitkerja_id JOIN supplier x3 ON x3.idsupplier=x1.supplier_id WHERE x.tanggal='$now' ORDER BY x.idbarang_masuk DESC")or die(mysqli_error($con));
                        while($row = mysqli_fetch_array($query)):
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><?= $row['nama_unit_kerja']; ?></td>
                            <td><?= $row['nama_supplier']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Barang Keluar Hari Ini</h4>
            <a href="<?=base_url();?>process/cetak_barang_keluar_today.php" target="_blank"
                class="btn btn-info btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Cetak</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>TANGGAL</th>
                            <th>NAMA BARANG</th>
                            <th>UNIT KERJA</th>
                            <th>SUPPLIER</th>
                            <th>KARYAWAN</th>
                            <th>JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        $query = mysqli_query($con,"SELECT x.*,x1.nama_barang,x2.nama_unit_kerja,x3.nama_supplier FROM barang_keluar x JOIN barang x1 ON x1.idbarang=x.barang_id JOIN unit_kerja x2 ON x2.id_unitkerja=x1.unitkerja_id JOIN supplier x3 ON x3.idsupplier=x1.supplier_id WHERE x.tanggal='$now' ORDER BY x.idbarang_keluar DESC")or die(mysqli_error($con));
                        while($row = mysqli_fetch_array($query)):
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><?= $row['nama_unit_kerja']; ?></td>
                            <td><?= $row['nama_supplier']; ?></td>
                            <td><?= $row['keterangan']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->