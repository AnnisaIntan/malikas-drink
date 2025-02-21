<?php
include "../config/connection.php";
$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $nama_tamu = mysqli_real_escape_string($koneksi, $_POST['nama_tamu']);
        $tgl_komentar = mysqli_real_escape_string($koneksi, $_POST['tgl_komentar']);
        $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);

        // Insert into database
        $query = "INSERT INTO komentar (nama_tamu, tgl_komentar, komentar, created_at, updated_at) 
                VALUES ('$nama_tamu', '$tgl_komentar', '$komentar', NOW(), NOW())";

        $komentar_tambah = mysqli_query($koneksi, $query);

        if ($komentar_tambah) {
            echo "<script>alert('Comment added successfully');</script>";
        } else {
            echo "<script>alert('Failed to add comment: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $nama_tamu = mysqli_real_escape_string($koneksi, $_POST['nama_tamu']);
        $tgl_komentar = mysqli_real_escape_string($koneksi, $_POST['tgl_komentar']);
        $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);

        // Update the database without modifying created_at
        $query = "UPDATE komentar SET 
        nama_tamu = '$nama_tamu',
        tgl_komentar = '$tgl_komentar',
        komentar = '$komentar',
        updated_at = NOW(),
        created_at = created_at 
        WHERE id_komentar = '$id'";

        $komentar_edit = mysqli_query($koneksi, $query);

        if ($komentar_edit) {
            echo "<script>alert('Comment updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update comment: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $komentar_hapus = mysqli_query($koneksi, "DELETE FROM komentar WHERE id_komentar = '$id'");
            if ($komentar_hapus) {
                echo "<script>alert('Comment deleted successfully');</script>";
            } else {
                echo "<script>alert('Failed to delete comment: " . mysqli_error($koneksi) . "');</script>";
            }
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=comment_show">