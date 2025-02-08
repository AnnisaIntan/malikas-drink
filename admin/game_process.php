<?php
include "../config/connection.php";
session_start();

$id_admin = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $judul_game = mysqli_real_escape_string($koneksi, $_POST['judul_game']);
        $versi = mysqli_real_escape_string($koneksi, $_POST['versi']);
        $spesifikasi = mysqli_real_escape_string($koneksi, $_POST['spesifikasi']);
        $detail_game = mysqli_real_escape_string($koneksi, $_POST['detail_game']);

        // Handle photo upload
        $simpan_foto = "";
        if (isset($_FILES['foto_game']['tmp_name']) && $_FILES['foto_game']['size'] > 0) {
            $game_foto = $_FILES['foto_game']['tmp_name'];
            $foto_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto_game']['name']);
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($game_foto, $simpan_foto);
        }

        // Insert into database
        $query = "INSERT INTO game (id_admin, user_name, judul_game, versi, spesifikasi, foto_game, detail_game, created_at, updated_at) 
                VALUES ('$id_admin', '$user_name', '$judul_game', '$versi', '$spesifikasi', '$simpan_foto', '$detail_game', NOW(), NOW())";

        $game_tambah = mysqli_query($koneksi, $query);

        if ($game_tambah) {
            echo "<script>alert('Tambah Data Game Berhasil');</script>";
        } else {
            echo "<script>alert('Tambah Data Game Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $judul_game = mysqli_real_escape_string($koneksi, $_POST['judul_game']);
        $versi = mysqli_real_escape_string($koneksi, $_POST['versi']);
        $spesifikasi = mysqli_real_escape_string($koneksi, $_POST['spesifikasi']);
        $detail_game = mysqli_real_escape_string($koneksi, $_POST['detail_game']);
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        // Retrieve existing photo
        $existing_foto_game = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_game FROM game WHERE id_game = '$id'"))['foto_game'];

        if ($centang == '1' && isset($_FILES['foto_game']['tmp_name']) && $_FILES['foto_game']['size'] > 0) {
            // Delete old photo if exists
            if (!empty($existing_foto_game) && file_exists($existing_foto_game)) {
                unlink($existing_foto_game);
            }

            // Upload new photo
            $game_foto = $_FILES['foto_game']['tmp_name'];
            $foto_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto_game']['name']);
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($game_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_game;
        }

        // Update the database without modifying created_at
        $query = "UPDATE game SET 
        id_admin = '$id_admin',
        user_name = '$user_name',
        judul_game = '$judul_game',
        versi = '$versi',
        spesifikasi = '$spesifikasi',
        foto_game = '$simpan_foto',
        detail_game = '$detail_game',
        updated_at = NOW(),
        created_at = created_at 
        WHERE id_game = '$id'";

        $game_edit = mysqli_query($koneksi, $query);

        if ($game_edit) {
            echo "<script>alert('Edit Data Game Berhasil');</script>";
        } else {
            echo "<script>alert('Edit Data Game Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $game_hapus = mysqli_query($koneksi, "DELETE FROM game WHERE id_game = '$id'");
            if ($game_hapus) {
                echo "<script>alert('Hapus Data Game Berhasil');</script>";
            } else {
                echo "<script>alert('Hapus Data Game Gagal: " . mysqli_error($koneksi) . "');</script>";
            }
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=game_show">