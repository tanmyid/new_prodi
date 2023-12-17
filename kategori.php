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
                <h3 class="box-title">Kategori</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahKategori"><i class="fa fa-plus"></i> Tambah</button>
                <!-- Modal Tambah Kategori -->
                <div class="modal fade" id="tambahKategori">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Kategori</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Kategori ..." name="kategori">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addKategori"><i class="fa fa-save"></i> Simpan</button>
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
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($get_kategori)) :
                                $id_kategori = $data['id_kategori'];
                                $kategori = $data['kategori'];
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $kategori; ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editKategori<?= $id_kategori; ?>"> <i class="fa fa-edit"></i>Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusKategori<?= $id_kategori; ?>"><i class="fa fa-trash"></i>Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Edit Kategori -->
                                <div class="modal fade" id="editKategori<?= $id_kategori; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit Kategori</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_kategori" value="<?= $id_kategori; ?>">
                                                        <label>Kategori</label>
                                                        <input type="text" class="form-control" placeholder="" name="kategori" value="<?= $kategori; ?>">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="editKategori"><i class="fa fa-save"></i> Simpan</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ./Modal Edit Kategori -->
                                <!-- Modal Hapus Kategori -->
                                <div class="modal fade" id="hapusKategori<?= $id_kategori; ?>">
                                    <div class="modal-dialog modal-danger">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Hapus Kategori</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_kategori" value="<?= $id_kategori; ?>">
                                                        <span>Anda yakin ingin menghapus : <?= $kategori; ?>????</span>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="hapusKategori"><i class="fa fa-save"></i> Simpan</button>
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