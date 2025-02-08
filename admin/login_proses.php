<?php
session_start();
include "../config/connection.php";
$user_name = $_POST['user_name'];
$password = md5($_POST['password']);
$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE user_name = '$user_name' AND password = '$password'");
$jumlah_login = mysqli_num_rows($login);
if ($jumlah_login == 0) {
    echo "<script>alert('Login Gagal')</script>";
} else {
    $data_login = mysqli_fetch_array($login);
    $_SESSION["id"] = $data_login["id"];
    $_SESSION["user_name"] = $data_login["user_name"];
    $_SESSION["nama_admin"] = $data_login["nama_admin"];
    $_SESSION["foto_admin"] = $data_login["foto_admin"];
    echo "<script>alert('Login Berhasil')</script>";
}
?>
<meta http-equiv="refresh" content="0; URL=index.php">