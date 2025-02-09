<?php
session_start();
include "../../config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="../../asset/sweetalert/sweetalert2.all.min.js"></script>
</head>
<body style="background-color: #E57C23;"">

<?php
$user_name = $_POST['user_name'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE user_name = '$user_name' AND password = '$password'");
$jumlah_login = mysqli_num_rows($login);

if ($jumlah_login == 0) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: 'Username atau password salah!',
            timer: 2000,
            showConfirmButton: false
        }).then(() => {
            window.location.href = '..';
        });
    </script>";
} else {
    $data_login = mysqli_fetch_array($login);
    $_SESSION['id'] = $data_login['id'];
    $_SESSION['user_name'] = $data_login['user_name'];
    $_SESSION['nama_admin'] = $data_login['nama_admin'];
    $_SESSION['foto_admin'] = $data_login['foto_admin'];

    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Login Berhasil',
            text: 'Selamat datang, {$_SESSION['nama_admin']}!',
            timer: 2000,
            showConfirmButton: false
        }).then(() => {
            window.location.href = '..';
        });
    </script>";
}
?>

</body>
</html>
