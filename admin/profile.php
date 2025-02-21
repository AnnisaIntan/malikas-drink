<?php
include "../config/connection.php";

$user_id = $_SESSION['id']; // Get the logged-in user's ID from the session

// Fetch the logged-in user's data from the 'admin' table
$result = mysqli_query($koneksi, "SELECT * FROM admin WHERE id = '$user_id' LIMIT 1");
$admin = mysqli_fetch_assoc($result);

// Retrieve data if editing another admin profile
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $admin_ambil = mysqli_query($koneksi, "SELECT * FROM admin WHERE id = '$id'") or die(mysqli_error($koneksi));
    $admin_edit = mysqli_fetch_array($admin_ambil);
}
?>

<div class="head" style="display: flex; justify-content: space-between; align-items: center;">
    <!-- Page Title -->
    <h2 style="margin: 0;">My Profile</h2>
    <!-- Edit Profile Button -->
    <a href="index.php?page=admin_add&id=<?= $user_id ?>" class="button-primary">Edit Profile</a>
</div>

<!-- Profile Information Table -->
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