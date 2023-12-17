<!-- Header -->
<?php
include 'layouts/header.php';
include 'layouts/sidebar.php';
?>
<!-- Content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Barang Masuk</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?= $baseurl; ?>/laporan/cetak_barang_in.php" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print</a>
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Supplier</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Tanggal Masuk</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            mysqli_data_seek($get_barang_in, 0);
                            while ($data = mysqli_fetch_array($get_barang_in)) :
                                $id_barang_in = $data['id_barang_in'];
                                $id_kategori0 = $data['id_kategori'];
                                $nama_suplier = $data['nama_suplier'];
                                $kategori = $data['kategori'];
                                $nama_barang = $data['nama_barang'];
                                $tgl_masuk = $data['tgl_masuk'];
                                $qty = $data['qty'];
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $nama_suplier; ?></td>
                                    <td class="text-center"><?= $kategori; ?></td>
                                    <td class="text-center"><?= $nama_barang; ?></td>
                                    <td class="text-center"><?= $tgl_masuk; ?></td>
                                    <td class="text-center"><?= $qty; ?></td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Barang Keluar</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?= $baseurl; ?>/laporan/cetak_barang_out.php" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print</a>
                <div class="box-body">
                    <table id="tabel2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Pelanggan</th>
                                <th class="text-center">Tanggal Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($get_barang_out)) :
                                $id_barang_out = $data['id_barang_out'];
                                $nama_barang = $data['nama_barang'];
                                $nama_barang2 = $data['nama_barang2'];
                                $jumlah = $data['jumlah'];
                                $pelanggan = $data['nama_pelanggan'];
                                $tanggal_out = $data['tanggal_out'];
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $nama_barang2; ?></td>
                                    <td class="text-center"><?= $jumlah; ?></td>
                                    <td class="text-center"><?= $pelanggan; ?></td>
                                    <td class="text-center"><?= $tanggal_out; ?></td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include 'layouts/footer.php';
?>