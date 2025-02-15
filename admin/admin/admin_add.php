<?php
include "../config/connection.php";

// Retrieve data if editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $admin_ambil = mysqli_query($koneksi, "SELECT * FROM admin WHERE id = '$id'") or die(mysqli_error($koneksi));
    $admin_edit = mysqli_fetch_array($admin_ambil);
}
?>

<form action="<?php echo 'index.php?page=admin_process'; ?>" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id' value='" . $admin_edit['id'] . "'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table align="center">
        <h1>Data Admin</h1>
        <br>
        <tr>
            <td>Username</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="user_name" value="<?php echo @$admin_edit['user_name']; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td> : </td>
            <td><input type="password" maxlength="32" size="50" name="password"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="nama_admin" value="<?php echo @$admin_edit['nama_admin']; ?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="alamat_admin" value="<?php echo @$admin_edit['alamat_admin']; ?>"></td>
        </tr>
        <tr>
            <td>Number Phone</td>
            <td> : </td>
            <td><input type="number" maxlength="16" size="50" name="no_telp_admin" value="<?php echo @$admin_edit['no_telp_admin']; ?>"></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td> : </td>
            <td>
                <?php if (!empty($admin_edit['foto_admin'])): ?>
                    <img src="<?= $admin_edit['foto_admin']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_admin">
                <?php else: ?>
                    <input type="file" name="foto_admin">
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <br>
    <input type="submit" value="SIMPAN" class="button-primary">
    <input type="reset" value="BATAL" class="button-primary" onclick="window.location.href='index.php?page=admin_show'">
</form>

<style>
    :root {
        --bg: #025464;
        --color: #F8F1F1;
        --tr1: #E57C23;
        --tr2: #E8AA42;
    }

    input,
    textarea {
        color: var(--bg);
        background-color: white;
        border: 1px solid var(--tr1);
        padding: 5px;
        font-size: 16px;
    }

    input::placeholder {
        color: var(--bg);
        opacity: 1;
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
</style>