<?php
include "../config/connection.php";

// Retrieve data if editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pembuat_ambil = mysqli_query($koneksi, "SELECT * FROM pembuat WHERE id_pembuat = '$id'") or die(mysqli_error($koneksi));
    $pembuat_edit = mysqli_fetch_array($pembuat_ambil);
}
?>

<form action="creator_process.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id' value='" . $pembuat_edit['id_pembuat'] . "'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table align="center">
        <h1>Data Pembuat</h1>
        <br>
        <tr>
            <td>Nama Pembuat</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="nama_pembuat" value="<?php echo @$pembuat_edit['nama_pembuat']; ?>"></td>
        </tr>
        <tr>
            <td>Pendidikan Pembuat</td>
            <td> : </td>
            <td><input type="text" name="pendidikan_pembuat" value="<?php echo @$pembuat_edit['pendidikan_pembuat']; ?>"></td>
        </tr>
        <tr>
            <td>Foto Pembuat</td>
            <td> : </td>
            <td>
                <?php if (!empty($pembuat_edit['foto_pembuat'])): ?>
                    <img src="<?= $pembuat_edit['foto_pembuat']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_pembuat">
                <?php else: ?>
                    <input type="file" name="foto_pembuat">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Detail Pembuat</td>
            <td> : </td>
            <td><textarea name="detail_pembuat" rows="5" cols="50"><?php echo @$pembuat_edit['detail_pembuat']; ?></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="SIMPAN" class="button-primary">
    <input type="reset" value="BATAL" class="button-primary" onclick="window.location.href='index.php?page=creator_show'">
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