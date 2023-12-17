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
                <h3 class="box-title">Data User</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahUser"><i class="fa fa-plus"></i> Tambah</button>
                <!-- Modal Tambah User -->
                <div class="modal fade" id="tambahUser">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah User</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama ..." name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Username ..." name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Password ..." name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="level" class="form-control">
                                            <option selected>Pilih..</option>
                                            <option value="admin">Admin</option>
                                            <option value="staf">Staf</option>
                                            <option value="pimpinan">Pimpinan</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addUser"><i class="fa fa-save"></i> Simpan</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ./Modal Tambah User -->
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($get_user)) :
                                $id_user = $data['id_user'];
                                $nama = $data['nama'];
                                $username = $data['username'];
                                $password = $data['password'];
                                $level = $data['level'];
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $nama; ?></td>
                                    <td class="text-center"><?= $username; ?></td>
                                    <td class="text-center"><?= $level; ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editUser<?= $id_user; ?>"> <i class="fa fa-edit"></i>Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusUser<?= $id_user; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Edit Kategori -->
                                <div class="modal fade" id="editUser<?= $id_user; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit User</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_user" value="<?= $id_user; ?>">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" value="<?= $nama; ?>" name="nama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" value="<?= $username; ?>" name="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="text" class="form-control" value="<?= $password; ?>" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select name="level" class="form-control">
                                                            <?php
                                                            if ($level == 'staf') {
                                                                echo '
                                                                <option value="admin">Admin</option>
                                                                <option value="staf" selected>Staf</option>
                                                                <option value="pimpinan">Pimpinan</option>
                                                                ';
                                                            } elseif ($level == 'admin') {
                                                                echo '
                                                                <option value="admin" selected>Admin</option>
                                                                <option value="staf">Staf</option>
                                                                <option value="pimpinan">Pimpinan</option>
                                                                ';
                                                            } else {
                                                                echo '
                                                                <option value="admin">Admin</option>
                                                                <option value="staf">Staf</option>
                                                                <option value="pimpinan" selected>Pimpinan</option>
                                                                ';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="editUser"><i class="fa fa-save"></i> Simpan</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ./Modal Edit User -->
                                <!-- Modal Hapus Kategori -->
                                <div class="modal fade" id="hapusUser<?= $id_user; ?>">
                                    <div class="modal-dialog modal-danger">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Hapus User</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_user" value="<?= $id_user; ?>">
                                                        <span>Anda yakin ingin menghapus : <?= $nama; ?>????</span>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="hapusUser"><i class="fa fa-save"></i> Simpan</button>
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