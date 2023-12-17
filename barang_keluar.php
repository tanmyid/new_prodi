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
                <h3 class="box-title">Barang Keluar</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangOut"><i class="fa fa-plus"></i> Tambah</button>
                <!-- Modal Add Barang Keluar -->
                <div class="modal fade" id="tambahBarangOut">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Barang Keluar</h4>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <select class="form-control" name="id_barang_in" id="mySelect" onchange="getSelectedOption()">
                                            <option selected>Pilih...</option>
                                            <?php
                                            while ($data3 = mysqli_fetch_array($get_barang_in)) :
                                                $id_barang_in = $data3['id_barang_in'];
                                                $nama_barang = $data3['nama_barang'];
                                                $qty_awal = $data3['qty'];
                                                $id_nama_barang = $data3['id_nama_barang'];
                                            ?>
                                                <option value="<?= $id_barang_in; ?>" data-idnamset="<?= $qty_awal; ?>" data-idnamset2="<?= $id_nama_barang; ?>"><?= $nama_barang; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok Awal</label>
                                        <input type="number" class="form-control" placeholder="Stock Awal" id="selected_stok_awal" name="selected_stok_awal" readonly>
                                        <input type="hidden" class="form-control" id="selected_id_barang" name="selected_id_barang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Barang Keluar</label>
                                        <input type="number" class="form-control" placeholder="Jumlah Barang" name="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label>Pelanggan</label>
                                        <select name="pelanggan" class="form-control">
                                            <option selected>Pilih...</option>
                                            <?php
                                            while ($data2 = mysqli_fetch_array($get_pelanggan)) :
                                                $id_pelanggan = $data2['id_pelanggan'];
                                                $nama_pelanggan = $data2['nama_pelanggan'];
                                            ?>
                                                <option value="<?= $id_pelanggan; ?>"><?= $nama_pelanggan; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="tgl_keluar" class="form-control" value="<?= date("Y-m-d"); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="addBarangOut"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ./Modal Add Barang Masuk -->
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Pelanggan</th>
                                <th class="text-center">Tanggal Keluar</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            mysqli_data_seek($get_barang_in, 0);
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
                                    <td class="text-center">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusBarangOut<?= $id_barang_out; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Hapus Kategori -->
                                <div class="modal fade" id="hapusBarangOut<?= $id_barang_out; ?>">
                                    <div class="modal-dialog modal-danger">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Hapus Barang Keluar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_barang_out" value="<?= $id_barang_out; ?>">
                                                        <?php
                                                        $get_id_in = mysqli_fetch_array(mysqli_query($koneksi, "SELECT id_barang_in FROM barang_in WHERE nama_barang='$nama_barang'"))['id_barang_in'];
                                                        ?>
                                                        <input type="hidden" class="form-control" name="id_in" value="<?= $get_id_in; ?>">
                                                        <input type="hidden" class="form-control" name="jumlah" value="<?= $jumlah; ?>">
                                                        <span>Anda yakin ingin menghapus Data : <?= $nama_barang2; ?> ?</span>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="hapusBarangKeluar"><i class="fa fa-save"></i> Simpan</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ./Modal Hapus Kategori -->
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
<script type="text/javascript">
    function getSelectedOption() {
        var select = document.getElementById("mySelect");

        var selectedIdNamsetInput = document.getElementById("selected_stok_awal");
        var selectedIdNamset2Input = document.getElementById("selected_id_barang");

        var selectedOption = select.options[select.selectedIndex];
        var idNamset = selectedOption.getAttribute("data-idnamset");
        var idNamset2 = selectedOption.getAttribute("data-idnamset2");

        // Set nilai input sesuai dengan variabel
        selectedIdNamsetInput.value = idNamset;
        selectedIdNamset2Input.value = idNamset2;
    }
</script>
<?php
include 'layouts/footer.php';
?>