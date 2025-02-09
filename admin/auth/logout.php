<?php
session_start();
$nama_admin = isset($_SESSION['nama_admin']) ? $_SESSION['nama_admin'] : '';

// Hancurkan sesi setelah menampilkan pesan
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script src="../../asset/sweetalert/sweetalert2.all.min.js"></script>
</head>
<body style="background-color: #E57C23;"">

<script>
    Swal.fire({
        icon: 'info',
        title: 'Sampai Jumpa!',
        text: 'Sampai jumpa, <?= addslashes($nama_admin) ?>!',
        timer: 2000,
        showConfirmButton: false
    }).then(() => {
        window.location.href = '..';
    });
</script>

</body>
</html>
