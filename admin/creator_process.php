<?php
include "../config/connection.php";
session_start();

$id_admin = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $nama_pembuat = mysqli_real_escape_string($koneksi, $_POST['nama_pembuat']);
        $pendidikan_pembuat = mysqli_real_escape_string($koneksi, $_POST['pendidikan_pembuat']);
        $detail_pembuat = mysqli_real_escape_string($koneksi, $_POST['detail_pembuat']);

        // Handle photo upload
        $simpan_foto = "";
        if (isset($_FILES['foto_pembuat']['tmp_name']) && $_FILES['foto_pembuat']['size'] > 0) {
            $pembuat_foto = $_FILES['foto_pembuat']['tmp_name'];
            $foto_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto_pembuat']['name']);
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($pembuat_foto, $simpan_foto);
        }

        // Insert into database
        $query = "INSERT INTO pembuat (id_admin, user_name, nama_pembuat, pendidikan_pembuat, foto_pembuat, detail_pembuat, created_at, updated_at) 
                VALUES ('$id_admin', '$user_name', '$nama_pembuat', '$pendidikan_pembuat', '$simpan_foto', '$detail_pembuat', NOW(), NOW())";

        $pembuat_tambah = mysqli_query($koneksi, $query);

        if ($pembuat_tambah) {
            echo "<script>alert('Tambah Data Pembuat Berhasil');</script>";
        } else {
            echo "<script>alert('Tambah Data Pembuat Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $nama_pembuat = mysqli_real_escape_string($koneksi, $_POST['nama_pembuat']);
        $pendidikan_pembuat = mysqli_real_escape_string($koneksi, $_POST['pendidikan_pembuat']);
        $detail_pembuat = mysqli_real_escape_string($koneksi, $_POST['detail_pembuat']);
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        // Retrieve existing photo
        $existing_foto_pembuat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_pembuat FROM pembuat WHERE id_pembuat = '$id'"))['foto_pembuat'];

        if ($centang == '1' && isset($_FILES['foto_pembuat']['tmp_name']) && $_FILES['foto_pembuat']['size'] > 0) {
            // Delete old photo if exists
            if (!empty($existing_foto_pembuat) && file_exists($existing_foto_pembuat)) {
                unlink($existing_foto_pembuat);
            }

            // Upload new photo
            $pembuat_foto = $_FILES['foto_pembuat']['tmp_name'];
            $foto_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto_pembuat']['name']);
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($pembuat_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_pembuat;
        }

        // Update the database without modifying created_at
        $query = "UPDATE pembuat SET 
        id_admin = '$id_admin',
        user_name = '$user_name',
        nama_pembuat = '$nama_pembuat',
        pendidikan_pembuat = '$pendidikan_pembuat',
        foto_pembuat = '$simpan_foto',
        detail_pembuat = '$detail_pembuat',
        updated_at = NOW(),
        created_at = created_at 
        WHERE id_pembuat = '$id'";

        $pembuat_edit = mysqli_query($koneksi, $query);

        if ($pembuat_edit) {
            echo "<script>alert('Edit Data Pembuat Berhasil');</script>";
        } else {
            echo "<script>alert('Edit Data Pembuat Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pembuat_hapus = mysqli_query($koneksi, "DELETE FROM pembuat WHERE id_pembuat = '$id'");
            if ($pembuat_hapus) {
                echo "<script>alert('Hapus Data Pembuat Berhasil');</script>";
            } else {
                echo "<script>alert('Hapus Data Pembuat Gagal: " . mysqli_error($koneksi) . "');</script>";
            }
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=creator_show">