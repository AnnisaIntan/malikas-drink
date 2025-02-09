<?php
include "../config/connection.php";

// Retrieve data if editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $merchan_ambil = mysqli_query($koneksi, "SELECT * FROM merchandise WHERE id_merchan = '$id'") or die(mysqli_error($koneksi));
    $merchan_edit = mysqli_fetch_array($merchan_ambil);
}
?>

<form action="merchan_process.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id' value='" . $merchan_edit['id_merchan'] . "'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table align="center">
        <h1>Data Merchandise</h1>
        <br>
        <tr>
            <td>Nama Merchandise</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="nama_merchan" value="<?php echo @$merchan_edit['nama_merchan']; ?>"></td>
        </tr>
        <tr>
            <td>Harga Merchandise</td>
            <td> : </td>
            <td><input type="number" name="harga_merchan" value="<?php echo @$merchan_edit['harga_merchan']; ?>"></td>
        </tr>
        <tr>
            <td>Foto Merchandise</td>
            <td> : </td>
            <td>
                <?php if (!empty($merchan_edit['foto_merchan'])): ?>
                    <img src="<?= $merchan_edit['foto_merchan']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_merchan">
                <?php else: ?>
                    <input type="file" name="foto_merchan">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Detail Merchandise</td>
            <td> : </td>
            <td><textarea name="detail_merchan" rows="5" cols="50"><?php echo @$merchan_edit['detail_merchan']; ?></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="SIMPAN" class="button-primary">
    <input type="reset" value="BATAL" class="button-primary" onclick="window.location.href='index.php?page=merchan_show'">
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