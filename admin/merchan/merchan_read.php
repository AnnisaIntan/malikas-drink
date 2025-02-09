<?php
include "../config/connection.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM merchandise WHERE id_merchan = '$id'");

    if ($hasil = mysqli_fetch_array($query)) {
        echo "<h1>Merchandise Details</h1> <br>";
        echo "<table border='1'>";
        echo "<tr><td><strong>Nama Merchandise:</strong></td><td>" . htmlspecialchars($hasil['nama_merchan']) . "</td></tr>";
        echo "<tr><td><strong>Harga:</strong></td><td>" . htmlspecialchars($hasil['harga_merchan']) . "</td></tr>";
        echo "<tr><td><strong>Detail Merchandise:</strong></td><td>" . htmlspecialchars($hasil['detail_merchan']) . "</td></tr>";
        echo "<tr><td><strong>Foto:</strong></td><td><img src='" . htmlspecialchars($hasil['foto_merchan']) . "' class='gambar'></td></tr>";
        echo "<tr><td><strong>Username:</strong></td><td>" . htmlspecialchars($hasil['user_name']) . "</td></tr>";
        echo "<tr><td><strong>Created At:</strong></td><td>" . htmlspecialchars($hasil['created_at']) . "</td></tr>";
        echo "<tr><td><strong>Updated At:</strong></td><td>" . htmlspecialchars($hasil['updated_at']) . "</td></tr>";
        echo "</table>";
        echo "<br><a href='index.php?page=merchan_show'><button class='button-primary'>Back</button></a>";
    } else {
        echo "<p>Data not found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>

<style>
    :root {
        --bg: #025464;
        --color: #F8F1F1;
        --tr1: #E57C23;
        --tr2: #E8AA42;
    }

    td {
        padding: 8px 10px;
    }

    .button-primary {
        cursor: pointer;
        background-color: var(--bg);
        border-radius: 10px;
        border: 2px solid var(--tr1);
        padding: 8px 16px;
        font-size: 16px;
        transition: 0.3s;
    }

    .button-primary:hover {
        background-color: var(--tr1);
        color: white;
    }

    .gambar {
        max-height: 200px;
        width: auto;
    }
</style>