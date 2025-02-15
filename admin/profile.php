<?php
include "../config/connection.php";

$user_id = $_SESSION['id']; // Get user ID from session

// Fetch the user data based on their ID
$result = mysqli_query($koneksi, "SELECT * FROM admin WHERE id = '$user_id' LIMIT 1");
$admin = mysqli_fetch_assoc($result);
?>

<h2>My Profile</h2>
<br>
<table border='1'>
    <tr>
        <td><strong>Username:</strong></td>
        <td><?= htmlspecialchars($admin['user_name']) ?></td>
    </tr>
    <tr>
        <td><strong>Name:</strong></td>
        <td><?= htmlspecialchars($admin['nama_admin']) ?></td>
    </tr>
    <tr>
        <td><strong>Address:</strong></td>
        <td><?= htmlspecialchars($admin['alamat_admin']) ?></td>
    </tr>
    <tr>
        <td><strong>Phone:</strong></td>
        <td><?= htmlspecialchars($admin['no_telp_admin']) ?></td>
    </tr>
    <tr>
        <td><strong>Photo:</strong></td>
        <td>
            <?php if (!empty($admin['foto_admin']) && file_exists("../image/" . $admin['foto_admin'])): ?>
                <img src='../image/<?= htmlspecialchars($admin['foto_admin']) ?>' class='gambar' alt='Profile Photo'>
            <?php else: ?>
                <p>No photo available</p>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td><strong>Created At:</strong></td>
        <td><?= htmlspecialchars($admin['created_at']) ?></td>
    </tr>
    <tr>
        <td><strong>Updated At:</strong></td>
        <td><?= htmlspecialchars($admin['updated_at']) ?></td>
    </tr>
</table>