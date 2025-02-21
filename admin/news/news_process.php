<?php
include "../config/connection.php";

$id_admin = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $judul_berita = mysqli_real_escape_string($koneksi, $_POST['judul_berita']);
        $detail_berita = mysqli_real_escape_string($koneksi, $_POST['detail_berita']);

        // Insert into database first to get the ID
        $query = "INSERT INTO berita (id_admin, user_name, judul_berita, tgl_berita, foto_berita, detail_berita, created_at, updated_at) 
                VALUES ('$id_admin', '$user_name', '$judul_berita', NOW(), '', '$detail_berita', NOW(), NOW())";

        $berita_tambah = mysqli_query($koneksi, $query);

        if ($berita_tambah) {
            $id_berita = mysqli_insert_id($koneksi);

            // Handle photo upload
            if (isset($_FILES['foto_berita']['tmp_name']) && $_FILES['foto_berita']['size'] > 0) {
                $berita_foto = $_FILES['foto_berita']['tmp_name'];
                $foto_ext = pathinfo($_FILES['foto_berita']['name'], PATHINFO_EXTENSION);
                $foto_name = "news-photo-" . $id_berita . "." . $foto_ext;
                $simpan_foto = "../image/" . $foto_name;
                move_uploaded_file($berita_foto, $simpan_foto);

                // Update the record with the correct photo name
                mysqli_query($koneksi, "UPDATE berita SET foto_berita = '$simpan_foto' WHERE id = '$id_berita'");
            }
            echo "<script>alert('News data added successfully');</script>";
        } else {
            echo "<script>alert('Failed to add news data: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $judul_berita = mysqli_real_escape_string($koneksi, $_POST['judul_berita']);
        $detail_berita = mysqli_real_escape_string($koneksi, $_POST['detail_berita']);
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        // Retrieve existing photo
        $existing_foto_berita = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_berita FROM berita WHERE id = '$id'"))['foto_berita'];

        if ($centang == '1' && isset($_FILES['foto_berita']['tmp_name']) && $_FILES['foto_berita']['size'] > 0) {
            // Delete old photo if exists
            if (!empty($existing_foto_berita) && file_exists($existing_foto_berita)) {
                unlink($existing_foto_berita);
            }

            // Upload new photo
            $berita_foto = $_FILES['foto_berita']['tmp_name'];
            $foto_ext = pathinfo($_FILES['foto_berita']['name'], PATHINFO_EXTENSION);
            $foto_name = "news-photo-" . $id . "." . $foto_ext;
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($berita_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_berita;
        }

        // Update the database without modifying created_at
        $query = "UPDATE berita SET 
        id_admin = '$id_admin',
        user_name = '$user_name',
        judul_berita = '$judul_berita',
        tgl_berita = NOW(),
        foto_berita = '$simpan_foto',
        detail_berita = '$detail_berita',
        updated_at = NOW(),
        created_at = created_at 
        WHERE id = '$id'";

        $berita_edit = mysqli_query($koneksi, $query);

        if ($berita_edit) {
            echo "<script>alert('News data updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update news data: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $berita_hapus = mysqli_query($koneksi, "DELETE FROM berita WHERE id = '$id'");
            if ($berita_hapus) {
                echo "<script>alert('News data deleted successfully');</script>";
            } else {
                echo "<script>alert('Failed to delete news data: " . mysqli_error($koneksi) . "');</script>";
            }
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=news_show">