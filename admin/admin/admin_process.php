<?php
include "../config/connection.php";

$status = isset($_POST['status']) ? $_POST['status'] : '';

switch ($status) {
    case 'tambah':
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);
        $nama_admin = $_POST['nama_admin'];
        $alamat_admin = $_POST['alamat_admin'];
        $no_telp_admin = $_POST['no_telp_admin'];

        // Handle photo upload
        if (isset($_FILES['foto_admin']['tmp_name']) && !empty($_FILES['foto_admin']['tmp_name'])) {
            $admin_foto = $_FILES['foto_admin']['tmp_name'];
            $foto_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto_admin']['name']);
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($admin_foto, $simpan_foto);
        } else {
            $simpan_foto = "";
        }

        $admin_tambah = mysqli_query($koneksi, "INSERT INTO admin (user_name, password, nama_admin, alamat_admin, no_telp_admin, foto_admin, created_at, updated_at) VALUES 
        ('$user_name', '$password', '$nama_admin', '$alamat_admin', '$no_telp_admin', '$simpan_foto', NOW(), NOW())");

        echo $admin_tambah ? "<script>alert('Successfully added admin data');</script>" : "<script>alert('Failed to add admin data');</script>";
        break;

    case 'edit':
        $id = $_POST['id'];
        $user_name = $_POST['user_name'];
        $nama_admin = $_POST['nama_admin'];
        $alamat_admin = $_POST['alamat_admin'];
        $no_telp_admin = $_POST['no_telp_admin'];
        $password = $_POST['password'];

        // Retrieve existing data
        $admin_data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT password, foto_admin FROM admin WHERE id = '$id'"));
        $existing_password = $admin_data['password'];
        $existing_foto_admin = $admin_data['foto_admin'];

        // Update password only if a new one is provided
        if (!empty($password)) {
            $password = md5($password);
        } else {
            $password = $existing_password;
        }

        // Handle photo upload
        if (isset($_FILES['foto_admin']['tmp_name']) && !empty($_FILES['foto_admin']['tmp_name'])) {
            if (!empty($existing_foto_admin) && file_exists($existing_foto_admin)) {
                unlink($existing_foto_admin); // Delete the existing photo
            }
            $admin_foto = $_FILES['foto_admin']['tmp_name'];
            $foto_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto_admin']['name']);
            $simpan_foto = "../image/" . $foto_name;
            move_uploaded_file($admin_foto, $simpan_foto);
        } else {
            $simpan_foto = $existing_foto_admin;
        }

        $admin_edit = mysqli_query($koneksi, "UPDATE admin SET
            user_name = '$user_name',
            password = '$password',
            nama_admin = '$nama_admin',
            alamat_admin = '$alamat_admin',
            no_telp_admin = '$no_telp_admin',
            foto_admin = '$simpan_foto',
            updated_at = NOW()
            WHERE id = '$id'");

        echo $admin_edit ? "<script>alert('Successfully updated admin data');</script>" : "<script>alert('Failed to update admin data');</script>";
        break;

    default:
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $admin_hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE id = '$id'");
            echo $admin_hapus ? "<script>alert('Successfully deleted admin data');</script>" : "<script>alert('Failed to delete admin data');</script>";
        }
        break;
}
?>
<meta http-equiv="refresh" content="0; index.php?page=my_profile">