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
    <title>Laporan Barang Keluar</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= $baseurl; ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center"><b>Laporan Barang Keluar</b></h2>
        <table class="table table-bordered table-striped">
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

</body>
<script>
    window.onload = function() {
        window.print();
    };
</script>

</html>