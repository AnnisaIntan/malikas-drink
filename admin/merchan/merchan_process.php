<?php
include "../config/connection.php";
session_start();

$id_admin = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $nama_merchan = mysqli_real_escape_string($koneksi, $_POST['nama_merchan']);
        $harga_merchan = mysqli_real_escape_string($koneksi, $_POST['harga_merchan']);
        $detail_merchan = mysqli_real_escape_string($koneksi, $_POST['detail_merchan']);

        // Handle photo upload
        $simpan_foto = "";
        if (isset($_FILES['foto_merchan']['tmp_name']) && $_FILES['foto_merchan']['size'] > 0) {
            $merchan_foto = $_FILES['foto_merchan']['tmp_name'];
            $foto_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto_merchan']['name']);
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($merchan_foto, $simpan_foto);
        }

        // Insert into database
        $query = "INSERT INTO merchandise (id_admin, user_name, nama_merchan, harga_merchan, foto_merchan, detail_merchan, created_at, updated_at) 
                VALUES ('$id_admin', '$user_name', '$nama_merchan', '$harga_merchan', '$simpan_foto', '$detail_merchan', NOW(), NOW())";

        $merchan_tambah = mysqli_query($koneksi, $query);

        if ($merchan_tambah) {
            echo "<script>alert('Tambah Data Merchandise Berhasil');</script>";
        } else {
            echo "<script>alert('Tambah Data Merchandise Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $nama_merchan = mysqli_real_escape_string($koneksi, $_POST['nama_merchan']);
        $harga_merchan = mysqli_real_escape_string($koneksi, $_POST['harga_merchan']);
        $detail_merchan = mysqli_real_escape_string($koneksi, $_POST['detail_merchan']);
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        // Retrieve existing photo
        $existing_foto_merchan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_merchan FROM merchandise WHERE id_merchan = '$id'"))['foto_merchan'];

        if ($centang == '1' && isset($_FILES['foto_merchan']['tmp_name']) && $_FILES['foto_merchan']['size'] > 0) {
            // Delete old photo if exists
            if (!empty($existing_foto_merchan) && file_exists($existing_foto_merchan)) {
                unlink($existing_foto_merchan);
            }

            // Upload new photo
            $merchan_foto = $_FILES['foto_merchan']['tmp_name'];
            $foto_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto_merchan']['name']);
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($merchan_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_merchan;
        }

        // Update the database without modifying created_at
        $query = "UPDATE merchandise SET 
        id_admin = '$id_admin',
        user_name = '$user_name',
        nama_merchan = '$nama_merchan',
        harga_merchan = '$harga_merchan',
        foto_merchan = '$simpan_foto',
        detail_merchan = '$detail_merchan',
        updated_at = NOW(),
        created_at = created_at 
        WHERE id_merchan = '$id'";

        $merchan_edit = mysqli_query($koneksi, $query);

        if ($merchan_edit) {
            echo "<script>alert('Edit Data Merchandise Berhasil');</script>";
        } else {
            echo "<script>alert('Edit Data Merchandise Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $merchan_hapus = mysqli_query($koneksi, "DELETE FROM merchandise WHERE id_merchan = '$id'");
            if ($merchan_hapus) {
                echo "<script>alert('Hapus Data Merchandise Berhasil');</script>";
            } else {
                echo "<script>alert('Hapus Data Merchandise Gagal: " . mysqli_error($koneksi) . "');</script>";
            }
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=merchan_show">