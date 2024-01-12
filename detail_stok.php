<!-- Header -->
<?php
include 'layouts/header.php';
include 'layouts/sidebar.php';
$id_detail = $_GET['id'];
$cari_stok_barang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT qty FROM barang_in WHERE id_barang_in = '$id_detail'"))['qty'];
?>
<!-- Content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Stok</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="box-tools">
                    <span class="btn btn-success">Total Stok : <?= $cari_stok_barang; ?></span>
                </div>
            </div>
            <div class="box-body">
                <table id="tabel" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Ukuran</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center"><i class="fa fa-gear"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $get_stok_brang_in = mysqli_query($koneksi, "SELECT stock_barang_in.id_stok_barang_in, stock_barang_in.id_barang_in, nama_barang.nama_barang, kategori.kategori, stock_barang_in.tgl_masuk, stock_barang_in.qty, stock_barang_in.status
                        FROM stock_barang_in
                        JOIN nama_barang ON nama_barang.id_nama_barang = stock_barang_in.nama_barang
                        JOIN kategori ON kategori.id_kategori = stock_barang_in.kategori
                        WHERE id_barang_in = '$id_detail'");
                        while ($data4 = mysqli_fetch_array($get_stok_brang_in)) {
                            $id_stok_barang_in = $data4['id_stok_barang_in'];
                            $nama_barang = $data4['nama_barang'];
                            $kategori = $data4['kategori'];
                            $tgl_masuk = $data4['tgl_masuk'];
                            $qty = $data4['qty'];
                            $status = $data4['status'];
                        ?>
                            <tr class="text-center">
                                <td><?= $no++; ?></td>
                                <td><?= $nama_barang; ?></td>
                                <td><?= $kategori; ?></td>
                                <td><?= $tgl_masuk; ?></td>
                                <td><?= $qty; ?></td>
                                <td>
                                    <?php if ($status == 0) { ?>
                                        <form action="" method="post">
                                            <input type="hidden" value="<?= $id_stok_barang_in; ?>" name="id_per_stok">
                                            <input type="hidden" value="<?= $id_detail; ?>" name="id_barang">
                                            <input type="hidden" value="<?= $qty; ?>" name="qty_awal">
                                            <input type="hidden" value="<?= $cari_stok_barang; ?>" name="qty_add">
                                            <button type="submit" name="updateStok" class="btn btn-warning"> <i class="fa fa-gavel"></i></button>
                                            <button type="submit" name="delupdateStok" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                                        </form>
                                    <?php } else { ?>
                                        <button type="submit" name="update" class="btn btn-success disabled"> <i class="fa fa-check"></i></button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="barang_masuk.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </section>
</div>
<?php
include 'layouts/footer.php';
?>