<?php
include "../config/connection.php";

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    die("Session error: Pastikan sudah login.");
}

$id_admin = $_SESSION['id'];
$user_name = $_SESSION['user_name'];

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':  // Fix: Match with form
        $nama_merchan = mysqli_real_escape_string($koneksi, $_POST['nama_merchan']);
        $harga_merchan = mysqli_real_escape_string($koneksi, $_POST['harga_merchan']);
        $detail_merchan = mysqli_real_escape_string($koneksi, $_POST['detail_merchan']);

        $query = "INSERT INTO merchandise (id_admin, user_name, nama_merchan, harga_merchan, detail_merchan, created_at, updated_at) 
                VALUES ('$id_admin', '$user_name', '$nama_merchan', '$harga_merchan', '$detail_merchan', NOW(), NOW())";

        if (mysqli_query($koneksi, $query)) {
            $id_merchan = mysqli_insert_id($koneksi);

            if (!empty($_FILES['foto_merchan']['name'])) {
                $foto_extension = pathinfo($_FILES['foto_merchan']['name'], PATHINFO_EXTENSION);
                $foto_name = "merchan-photo-$id_merchan.$foto_extension";
                $simpan_foto = "../image/" . $foto_name;

                if (move_uploaded_file($_FILES['foto_merchan']['tmp_name'], $simpan_foto)) {
                    mysqli_query($koneksi, "UPDATE merchandise SET foto_merchan='$simpan_foto' WHERE id_merchan='$id_merchan'");
                }
            }
            echo "<script>alert('Merchandise successfully added'); window.location.href='index.php?page=merchan_show';</script>";
        } else {
            die("Error adding merchandise: " . mysqli_error($koneksi));
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $nama_merchan = mysqli_real_escape_string($koneksi, $_POST['nama_merchan']);
        $harga_merchan = mysqli_real_escape_string($koneksi, $_POST['harga_merchan']);
        $detail_merchan = mysqli_real_escape_string($koneksi, $_POST['detail_merchan']);
        $centang = isset($_POST['centang']) ? $_POST['centang'] : '';

        $existing_foto = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_merchan FROM merchandise WHERE id_merchan = '$id'"))['foto_merchan'];
        $update_foto = "";

        if ($centang == '1' && !empty($_FILES['foto_merchan']['name'])) {
            if (!empty($existing_foto) && file_exists($existing_foto)) {
                unlink($existing_foto);
            }

            $foto_extension = pathinfo($_FILES['foto_merchan']['name'], PATHINFO_EXTENSION);
            $foto_name = "merchan-photo-$id.$foto_extension";
            $simpan_foto = "../image/" . $foto_name;

            if (move_uploaded_file($_FILES['foto_merchan']['tmp_name'], $simpan_foto)) {
                $update_foto = ", foto_merchan = '$simpan_foto'";
            }
        }

        $query = "UPDATE merchandise SET 
        nama_merchan = '$nama_merchan', 
        harga_merchan = '$harga_merchan', 
        detail_merchan = '$detail_merchan',
        updated_at = NOW()
        $update_foto 
        WHERE id_merchan = '$id'";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Merchandise successfully updated'); window.location.href='index.php?page=merchan_show';</script>";
        } else {
            die("Error updating merchandise: " . mysqli_error($koneksi));
        }
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $existing_foto_merchan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_merchan FROM merchandise WHERE id_merchan = '$id'"))['foto_merchan'];

            if (!empty($existing_foto_merchan) && file_exists($existing_foto_merchan)) {
                unlink($existing_foto_merchan);
            }

            $merchan_delete = mysqli_query($koneksi, "DELETE FROM merchandise WHERE id_merchan = '$id'");
            if ($merchan_delete) {
                echo "<script>
    alert('Merchandise successfully deleted');
</script>";
            } else {
                echo "<script>
    alert('Failed to delete merchandise: " . mysqli_error($koneksi) . "');
</script>";
            }
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=merchan_show">