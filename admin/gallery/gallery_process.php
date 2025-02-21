<?php
include "../config/connection.php";

$id_admin = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $judul_galeri = mysqli_real_escape_string($koneksi, $_POST['judul_galeri']);
        $detail_galeri = mysqli_real_escape_string($koneksi, $_POST['detail_galeri']);

        // Insert into database without image first
        $query = "INSERT INTO galeri (id_admin, user_name, judul_galeri, tgl_galeri, foto_galeri, detail_galeri, created_at, updated_at) 
                  VALUES ('$id_admin', '$user_name', '$judul_galeri', NOW(), '', '$detail_galeri', NOW(), NOW())";

        $galeri_tambah = mysqli_query($koneksi, $query);

        if ($galeri_tambah) {
            $id_galeri = mysqli_insert_id($koneksi);

            // Handle photo upload
            if (isset($_FILES['foto_galeri']['tmp_name']) && $_FILES['foto_galeri']['size'] > 0) {
                $galeri_foto = $_FILES['foto_galeri']['tmp_name'];
                $ext = pathinfo($_FILES['foto_galeri']['name'], PATHINFO_EXTENSION);
                $foto_name = "gallery-photo-$id_galeri.$ext";
                $simpan_foto = "../image/" . $foto_name;

                if (move_uploaded_file($galeri_foto, $simpan_foto)) {
                    mysqli_query($koneksi, "UPDATE galeri SET foto_galeri = '$simpan_foto' WHERE id_galeri = '$id_galeri'");
                }
            }
            echo "<script>alert('Gallery data added successfully');</script>";
        } else {
            echo "<script>alert('Failed to add gallery data: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $judul_galeri = mysqli_real_escape_string($koneksi, $_POST['judul_galeri']);
        $detail_galeri = mysqli_real_escape_string($koneksi, $_POST['detail_galeri']);
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        // Retrieve existing photo
        $existing_foto_galeri = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_galeri FROM galeri WHERE id_galeri = '$id'"))['foto_galeri'];

        if ($centang == '1' && isset($_FILES['foto_galeri']['tmp_name']) && $_FILES['foto_galeri']['size'] > 0) {
            // Delete old photo if exists
            if (!empty($existing_foto_galeri) && file_exists($existing_foto_galeri)) {
                unlink($existing_foto_galeri);
            }

            // Upload new photo
            $galeri_foto = $_FILES['foto_galeri']['tmp_name'];
            $ext = pathinfo($_FILES['foto_galeri']['name'], PATHINFO_EXTENSION);
            $foto_name = "gallery-photo-$id.$ext";
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($galeri_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_galeri;
        }

        // Update the database without modifying created_at
        $query = "UPDATE galeri SET 
        id_admin = '$id_admin',
        user_name = '$user_name',
        judul_galeri = '$judul_galeri',
        tgl_galeri = NOW(),
        foto_galeri = '$simpan_foto',
        detail_galeri = '$detail_galeri',
        updated_at = NOW(),
        created_at = created_at 
        WHERE id_galeri = '$id'";

        $galeri_edit = mysqli_query($koneksi, $query);

        if ($galeri_edit) {
            echo "<script>alert('Gallery data updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update gallery data: " . mysqli_error($koneksi) . "');</script>";
        }
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $galeri_hapus = mysqli_query($koneksi, "DELETE FROM galeri WHERE id_galeri = '$id'");
            if ($galeri_hapus) {
                echo "<script>alert('Gallery data deleted successfully');</script>";
            } else {
                echo "<script>alert('Failed to delete gallery data: " . mysqli_error($koneksi) . "');</script>";
            }
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=gallery_show">