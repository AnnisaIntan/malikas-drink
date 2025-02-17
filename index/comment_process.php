<?php
include "../config/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_tamu = mysqli_real_escape_string($koneksi, $_POST['nama_tamu']);
    $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);

    // Query Insert
    $query = "INSERT INTO komentar (nama_tamu, tgl_komentar, komentar, created_at, updated_at) 
    VALUES ('$nama_tamu', CURDATE(), '$komentar', NOW(), NOW())";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Komentar berhasil ditambahkan',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/malikas-drink/index/download.php';
            }
        });
    });
    </script>";
    } else {
        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error!',
            text: 'Gagal menambahkan komentar: " . mysqli_error($koneksi) . "',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
    </script>";
    }
}
?>

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="/malikas-drink/asset/sweetalert/sweetalert2.min.css">
<!-- SweetAlert2 JS -->
<script src="/malikas-drink/asset/sweetalert/sweetalert2.all.min.js"></script>