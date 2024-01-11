<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li> <a href="<?= $baseurl; ?>"> <i class="fa fa-circle-o"></i> <span>Dashboard</span></a></li>
            <?php
            if ($_SESSION['level'] == 'staf') {
                echo '
                <li><a href="' . $baseurl . '/ukuran.php"><i class="fa fa-circle-o"></i> <span>Ukuran</span></a></li>
                <li><a href="' . $baseurl . '/nama_barang.php"><i class="fa fa-circle-o"></i> <span>Nama Barang</span></a></li>
                <li><a href="' . $baseurl . '/barang_masuk.php"><i class="fa fa-circle-o"></i> <span>Barang Masuk</span></a></li>
                <li><a href="' . $baseurl . '/barang_keluar.php"><i class="fa fa-circle-o"></i> <span>Barang Keluar</span></a></li>
                ';
            } elseif ($_SESSION['level'] == 'admin') {
                echo '
                <li><a href="' . $baseurl . '/barang_masuk.php"><i class="fa fa-circle-o"></i> <span>Barang Masuk</span></a></li>
                <li><a href="' . $baseurl . '/mekanik.php"><i class="fa fa-circle-o"></i> <span>Mekanik</span></a></li>
                ';
            } else {

                // <li><a href="' . $baseurl . '/barang_masuk.php"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
                echo '
                <li><a href="' . $baseurl . '/laporan.php"><i class="fa fa-circle-o"></i> <span>Laporan</span></a></li>
                <li class="header">SETTING</li>
                <li> <a href="' . $baseurl . '/user.php"> <i class="fa fa-gear"></i> <span>User</span> </a> </li>
                ';
            }
            ?>
        </ul>
    </section>
</aside>