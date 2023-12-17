<?php
include '../backend/function.php';
if (isset($_SESSION['login']) == 'true') {
} else {
    echo '<script>';
    echo ' alert("Anda Belum Login");window.location = "' . $baseurl . '/login.php";';
    echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= $baseurl; ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center"><b>Laporan Barang Masuk</b></h2>
        <table class="table table-bordered table-striped">
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

</body>
<script>
    window.onload = function() {
        window.print();
    };
</script>

</html>