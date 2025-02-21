<?php
include "../config/connection.php";

$id_admin = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $judul_game = mysqli_real_escape_string($koneksi, $_POST['judul_game']);
        $versi = mysqli_real_escape_string($koneksi, $_POST['versi']);
        $spesifikasi = mysqli_real_escape_string($koneksi, $_POST['spesifikasi']);
        $detail_game = mysqli_real_escape_string($koneksi, $_POST['detail_game']);

        // Insert into database first without the photo
        $query = "INSERT INTO game (id_admin, user_name, judul_game, versi, spesifikasi, detail_game, created_at, updated_at) 
                  VALUES ('$id_admin', '$user_name', '$judul_game', '$versi', '$spesifikasi', '$detail_game', NOW(), NOW())";

        $game_tambah = mysqli_query($koneksi, $query);

        if ($game_tambah) {
            $id_game = mysqli_insert_id($koneksi); // Get the last inserted ID

            // Handle photo upload
            if (isset($_FILES['foto_game']['tmp_name']) && $_FILES['foto_game']['size'] > 0) {
                $game_foto = $_FILES['foto_game']['tmp_name'];
                $foto_extension = pathinfo($_FILES['foto_game']['name'], PATHINFO_EXTENSION);
                $foto_name = "game-photo-$id_game.$foto_extension";
                $simpan_foto = "../image/" . $foto_name;
                move_uploaded_file($game_foto, $simpan_foto);

                // Update the photo path in the database
                mysqli_query($koneksi, "UPDATE game SET foto_game = '$simpan_foto' WHERE id_game = '$id_game'");
            }

            echo "<script>alert('Successfully added game data');</script>";
        } else {
            echo "<script>alert('Failed to add game data: " . mysqli_error($koneksi) . "');</script>";
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
            $foto_extension = pathinfo($_FILES['foto_game']['name'], PATHINFO_EXTENSION);
            $foto_name = "game-photo-$id.$foto_extension";
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
            echo "<script>alert('Successfully updated game data');</script>";
        } else {
            echo "<script>alert('Failed to update game data: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $existing_foto_game = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_game FROM game WHERE id_game = '$id'"))['foto_game'];

            // Delete the image file if it exists
            if (!empty($existing_foto_game) && file_exists($existing_foto_game)) {
                unlink($existing_foto_game);
            }

            $game_hapus = mysqli_query($koneksi, "DELETE FROM game WHERE id_game = '$id'");

            if ($game_hapus) {
                echo "<script>alert('Successfully deleted game data');</script>";
            } else {
                echo "<script>alert('Failed to delete game data: " . mysqli_error($koneksi) . "');</script>";
            }
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=game_show">