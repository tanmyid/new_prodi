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
                <h3 class="box-title">Data Pelanggan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahNamaBarang"><i class="fa fa-plus"></i> Tambah</button>
                <!-- Modal Tambah Kategori -->
                <div class="modal fade" id="tambahNamaBarang">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Mekanik</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Nama Mekanik</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama ..." name="nama_pelanggan">
                                    </div>
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="number" class="form-control" placeholder="Masukkan Nama ..." name="no_tlp">
                                    </div>
                                    <div class="form-group">
                                        <label>Plat No</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama ..." name="plat_no">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addPelanggan"><i class="fa fa-save"></i> Simpan</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ./Modal Tambah Kategori -->
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Pelanggan</th>
                                <th class="text-center">No Telp</th>
                                <!-- <th class="text-center">No Plat</th> -->
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($get_pelanggan)) :
                                $id_pelanggan = $data['id_pelanggan'];
                                $nama_pelanggan = $data['nama_pelanggan'];
                                $no_tlp = $data['no_tlp'];
                                $plat_no = $data['plat_no'];
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $nama_pelanggan; ?></td>
                                    <td class="text-center"><?= $no_tlp; ?></td>
                                    <!-- <td class="text-center"><?= $plat_no; ?></td> -->
                                    <td class="text-center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editPelanggan<?= $id_pelanggan; ?>"> <i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusPelanggan<?= $id_pelanggan; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Edit Kategori -->
                                <div class="modal fade" id="editPelanggan<?= $id_pelanggan; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit Nama</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
                                                        <label>Nama Mekakin</label>
                                                        <input type="text" class="form-control" name="nama_pelanggan" value="<?= $nama_pelanggan; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No Telp</label>
                                                        <input type="number" class="form-control" name="no_tlp" value="<?= $no_tlp; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Plat No</label>
                                                        <input type="text" class="form-control" name="plat_no" value="<?= $plat_no; ?>">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="editPelanggan"><i class="fa fa-save"></i> Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Modal Edit Kategori -->
                                <!-- Modal Hapus Kategori -->
                                <div class="modal fade" id="hapusPelanggan<?= $id_pelanggan; ?>">
                                    <div class="modal-dialog modal-danger">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Hapus Data</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
                                                        <span>Anda yakin ingin menghapus : <?= $nama_pelanggan; ?>????</span>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="hapusPelanggan"><i class="fa fa-trash"></i> Hapus</button>
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
<?php
include 'layouts/footer.php';
?>