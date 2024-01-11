<?php
session_start();

$baseurl = 'http://localhost/new_prodi';

// koneksi database
$koneksi = mysqli_connect('localhost', 'root', '', 'new_prodi');

// dinamis title halaman
$dynamic_title = ucwords(str_replace("_", " ", basename(pathinfo($_SERVER['PHP_SELF'])['basename'], ".php")));

// dashboard items
$count_barang_in = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_barang_in) as tot_barang_in FROM barang_in"))['tot_barang_in'];
$count_nama_barang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_nama_barang) as tot_nama_barang FROM nama_barang"))['tot_nama_barang'];
$count_pelanggan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_pelanggan) as tot_pelanggan FROM pelanggan"))['tot_pelanggan'];
$count_barang_out = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(id_barang_out) as tot_barang_out FROM barang_out"))['tot_barang_out'];

// user function
$get_user = mysqli_query($koneksi, "SELECT * FROM user");
/// add user
if (isset($_POST['addUser'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO user (id_user, username, password, nama, level) VALUES ('', '$username','$password','$nama','$level')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("User berhasil di tambah");window.location = "' . $baseurl . '/user.php";';
    } else {
        echo 'alert("User gagal di tambah");window.location = "' . $baseurl . '/user.php";';
    }
    echo '</script>';
}
/// edit user
if (isset($_POST['editUser'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql_query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user='$id_user'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Edit Data Berhasil");window.location = "' . $baseurl . '/user.php";';
    } else {
        echo 'alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/user.php";';
    }
    echo '</script>';
}
/// hapus data user
if (isset($_POST['hapusUser'])) {
    $id_user = $_POST['id_user'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user ='$id_user'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/user.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/user.php";';
    }
    echo '</script>';
}
/// login user
if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $prc = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $get_row = mysqli_num_rows($prc);

    if ($get_row > 0) {
        $data = mysqli_fetch_assoc($prc);
        if ($data['level'] == "admin") {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = 'admin';
            header('location:index.php');
        } else if ($data['level'] == "staf") {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = 'staf';
            header('location:index.php');
        } else if ($data['level'] == "pimpinan") {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = 'pimpinan';
            header('location:index.php');
        } else {
            echo '
            <script>alert("Username atau Password salah");
            window.location.href="' . $baseurl . '/login.php"
            </script>';
        }
    } else {
        echo '
        <script>alert("Username atau Password salah");
        window.location.href="' . $baseurl . '/login.php"
        </script>';
    }
}
/// logout user
if (isset($_POST['logoutBtn'])) {
    // session_start();
    session_unset();
    session_destroy();
    echo '<script>';
    echo ' alert("Anda Berhasil Logout");window.location = "' . $baseurl . '/login.php";';
    echo '</script>';
}

// end user function 

// function kategori
/// get data
$get_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
/// tambah data kategori
if (isset($_POST['addKategori'])) {
    $kategori = $_POST['kategori'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO kategori (id_kategori, kategori) VALUES ('', '$kategori')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Kategori berhasil di tambah");window.location = "' . $baseurl . '/ukuran.php";';
    } else {
        echo 'alert("Kategori gagal di tambah");window.location = "' . $baseurl . '/ukuran.php";';
    }
    echo '</script>';
}
/// edit data kategori
if (isset($_POST['editKategori'])) {
    $id_kategori = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];

    $sql_query = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id_kategori'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Edit Data Berhasil");window.location = "' . $baseurl . '/ukuran.php";';
    } else {
        echo 'alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/ukuran.php";';
    }
    echo '</script>';
}
/// hapus data kategori
if (isset($_POST['hapusKategori'])) {
    $id_kategori = $_POST['id_kategori'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori ='$id_kategori'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/ukuran.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/ukuran.php";';
    }
    echo '</script>';
}
// end function kategori

// function nama barang
/// get data
$get_nama_barang = mysqli_query($koneksi, "SELECT * FROM nama_barang");
/// tambah data nama barang
if (isset($_POST['addNamaBarang'])) {
    $nama_barang = $_POST['nama_barang'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO nama_barang (id_nama_barang, nama_barang) VALUES ('', '$nama_barang')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Data berhasil di tambah");window.location = "' . $baseurl . '/nama_barang.php";';
    } else {
        echo 'alert("Data gagal di tambah");window.location = "' . $baseurl . '/nama_barang.php";';
    }
    echo '</script>';
}
/// edit data nama barang
if (isset($_POST['editNamaBarang'])) {
    $id_nama_barang = $_POST['id_nama_barang'];
    $nama_barang = $_POST['nama_barang'];

    $sql_query = mysqli_query($koneksi, "UPDATE nama_barang SET nama_barang='$nama_barang' WHERE id_nama_barang='$id_nama_barang'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Edit Data Berhasil");window.location = "' . $baseurl . '/nama_barang.php";';
    } else {
        echo 'alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/nama_barang.php";';
    }
    echo '</script>';
}
/// hapus data nama barang
if (isset($_POST['hapusNamaBarang'])) {
    $id_nama_barang = $_POST['id_nama_barang'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM nama_barang WHERE id_nama_barang='$id_nama_barang'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/nama_barang.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/nama_barang.php";';
    }
    echo '</script>';
}
// end function nama barang

// barang masuk function
/// get data barang masuk
$total_barang_in = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(qty) as total_barang_in FROM barang_in"))['total_barang_in'];
$get_barang_in = mysqli_query($koneksi, "SELECT barang_in.id_barang_in, barang_in.nama_suplier, kategori.id_kategori, kategori.kategori, nama_barang.id_nama_barang, nama_barang.nama_barang, barang_in.tgl_masuk, barang_in.qty, nama_barang.id_nama_barang FROM barang_in 
                                        INNER JOIN kategori ON barang_in.kategori = kategori.id_kategori
                                        INNER JOIN nama_barang ON barang_in.nama_barang = nama_barang.id_nama_barang");
/// tambah data barang masuk
if (isset($_POST['addBarangIn'])) {
    $nama_suplier = $_POST['nama_suplier'];
    $kategori = $_POST['kategori'];
    $nama_barang = $_POST['nama_barang'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $qty = $_POST['qty'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO barang_in (id_barang_in, nama_suplier, kategori, nama_barang, tgl_masuk, qty) VALUES ('','$nama_suplier','$kategori','$nama_barang','$tgl_masuk','$qty')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Kategori berhasil di tambah");window.location = "' . $baseurl . '/barang_masuk.php";';
    } else {
        echo 'alert("Kategori gagal di tambah");window.location = "' . $baseurl . '/barang_masuk.php";';
    }
    echo '</script>';
}

///update stok new
if (isset($_POST['updateStok'])) {
    $id_barang_in = $_POST['id_barang_in'];
    $update_stok = $_POST['stok_terbaru'];

    $sql_query = mysqli_query($koneksi, "UPDATE barang_in SET qty='$update_stok' WHERE id_barang_in='$id_barang_in'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Stok berhasil di tambah");window.location = "' . $baseurl . '/barang_masuk.php";';
    } else {
        echo 'alert("Stok gagal di tambah");window.location = "' . $baseurl . '/barang_masuk.php";';
    }
    echo '</script>';
}
///update stok
if (isset($_POST['addStock'])) {
    $id_barang_in = $_POST['id_barang_in'];
    $stok_awal = $_POST['selected_stok_awal'];
    $stok_tambah = $_POST['add_qty'];

    $update_stok = $stok_awal + $stok_tambah;

    $tgl_masuk = $_POST['tgl_masuk'];

    $sql_query = mysqli_query($koneksi, "UPDATE barang_in SET tgl_masuk='$tgl_masuk', qty='$update_stok' WHERE id_barang_in='$id_barang_in'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Stok berhasil di tambah");window.location = "' . $baseurl . '/barang_masuk.php";';
    } else {
        echo 'alert("Stok gagal di tambah");window.location = "' . $baseurl . '/barang_masuk.php";';
    }
    echo '</script>';
}

if (isset($_POST['tambahStok'])) {
    $id_barang_in = $_POST['id_barang_in'];
    $id_kategori = $_POST['id_kategori'];
    $id_nama_barang = $_POST['id_nama_barang'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $add_qty = $_POST['add_qty'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO stock_barang_in (id_stok_barang_in, id_barang_in, nama_barang, kategori, tgl_masuk, qty) VALUES ('','$id_barang_in','$id_nama_barang','$id_kategori','$tgl_masuk','$add_qty')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Stok berhasil di tambah");window.location = "' . $baseurl . '/barang_masuk.php";';
    } else {
        echo 'alert("Stok gagal di tambah");window.location = "' . $baseurl . '/barang_masuk.php";';
    }
    echo '</script>';
}
/// hapus stok barang
if (isset($_POST['hapusBarangMasuk'])) {
    $id_barang_in = $_POST['id_barang_in'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM barang_in WHERE id_barang_in='$id_barang_in'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/barang_masuk.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/barang_masuk.php";';
    }
    echo '</script>';
}

// pelanggan function
$get_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
/// add pelanggan
if (isset($_POST['addPelanggan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_tlp = $_POST['no_tlp'];
    $plat_no = $_POST['plat_no'];

    $sql_query = mysqli_query($koneksi, "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, no_tlp, plat_no) VALUES ('', '$nama_pelanggan','$no_tlp','$plat_no')");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Data berhasil di tambah");window.location = "' . $baseurl . '/mekanik.php";';
    } else {
        echo 'alert("Data gagal di tambah");window.location = "' . $baseurl . '/mekanik.php";';
    }
    echo '</script>';
}
/// edit pelanggan
if (isset($_POST['editPelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_tlp = $_POST['no_tlp'];
    $plat_no = $_POST['plat_no'];

    $sql_query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_tlp='$no_tlp', plat_no='$plat_no' WHERE id_pelanggan='$id_pelanggan'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Edit Data Berhasil");window.location = "' . $baseurl . '/mekanik.php";';
    } else {
        echo 'alert("Edit Data Gagal!!!");window.location = "' . $baseurl . '/mekanik.php";';
    }
    echo '</script>';
}
/// hapus pelanggan
if (isset($_POST['hapusPelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];

    $sql_query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");

    echo '<script>';
    if ($sql_query == TRUE) {
        echo ' alert("Hapus Data Berhasil");window.location = "' . $baseurl . '/mekanik.php";';
    } else {
        echo 'alert("Hapus Data Gagal!!!");window.location = "' . $baseurl . '/mekanik.php";';
    }
    echo '</script>';
}

// barang keluar function
$get_barang_out = mysqli_query($koneksi,    "SELECT barang_out.id_barang_out, barang_out.nama_barang, barang_out.jumlah, barang_out.pelanggan, barang_out.tanggal_out, nama_barang.nama_barang AS nama_barang2, pelanggan.nama_pelanggan 
                                            FROM barang_out
                                            INNER JOIN pelanggan ON barang_out.pelanggan = pelanggan.id_pelanggan 
                                            INNER JOIN nama_barang ON barang_out.nama_barang = nama_barang.id_nama_barang
                                            ");
/// add barang keluar
if (isset($_POST['addBarangOut'])) {
    $id_barang_in = $_POST['id_barang_in'];
    $selected_stok_awal = $_POST['selected_stok_awal'];
    $selected_id_barang = $_POST['selected_id_barang'];
    $jumlah = $_POST['jumlah'];
    $pelanggan = $_POST['pelanggan'];
    $tgl_keluar = $_POST['tgl_keluar'];

    $barang_keluar = "INSERT INTO barang_out (id_barang_out, nama_barang, jumlah, pelanggan, tanggal_out) VALUES ('', '$selected_id_barang','$jumlah','$pelanggan', '$tgl_keluar')";
    $min_stok = "UPDATE barang_in SET qty=(qty-'$jumlah') WHERE id_barang_in='$id_barang_in'";

    echo '<script>';
    if ($selected_stok_awal < $jumlah) {
        echo 'alert("Stok Tidak Mencukupi");window.location = "' . $baseurl . '/barang_keluar.php";';
    } elseif ($koneksi->multi_query("$barang_keluar; $min_stok")) {
        echo ' alert("Data berhasil di tambah");window.location = "' . $baseurl . '/barang_keluar.php";';
    } else {
        echo 'alert("Data gagal di tambah");window.location = "' . $baseurl . '/barang_keluar.php";';
    }
    echo '</script>';
}
/// hapus barang keluar
if (isset($_POST['hapusBarangKeluar'])) {
    $id_barang_out = $_POST['id_barang_out'];
    $id_in = $_POST['id_in'];
    $jumlah = $_POST['jumlah'];

    $barang_keluar_del = "DELETE FROM barang_out WHERE id_barang_out='$id_barang_out'";
    $back_stok = "UPDATE barang_in SET qty=(qty+'$jumlah') WHERE id_barang_in='$id_in'";

    echo '<script>';
    if ($koneksi->multi_query("$barang_keluar_del; $back_stok")) {
        echo ' alert("Data berhasil di Hapus");window.location = "' . $baseurl . '/barang_keluar.php";';
    } else {
        echo 'alert("Data gagal di Hapus");window.location = "' . $baseurl . '/barang_keluar.php";';
    }
    echo '</script>';
}
