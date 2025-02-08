<?php
include "../config/connection.php";

// Retrieve data if editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $galeri_ambil = mysqli_query($koneksi, "SELECT * FROM galeri WHERE id_galeri = '$id'") or die(mysqli_error($koneksi));
    $galeri_edit = mysqli_fetch_array($galeri_ambil);
}
?>

<form action="gallery_process.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id' value='" . $galeri_edit['id_galeri'] . "'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table align="center">
        <h1>Data Galeri</h1>
        <br>
        <tr>
            <td>Judul Galeri</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="judul_galeri" value="<?php echo @$galeri_edit['judul_galeri']; ?>"></td>
        </tr>
        <tr>
            <td>Tanggal Galeri</td>
            <td> : </td>
            <td><input type="date" name="tgl_galeri" value="<?php echo @$galeri_edit['tgl_galeri']; ?>"></td>
        </tr>
        <tr>
            <td>Foto Galeri</td>
            <td> : </td>
            <td>
                <?php if (!empty($galeri_edit['foto_galeri'])): ?>
                    <img src="<?= $galeri_edit['foto_galeri']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_galeri">
                <?php else: ?>
                    <input type="file" name="foto_galeri">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Detail Galeri</td>
            <td> : </td>
            <td><textarea name="detail_galeri" rows="5" cols="50"><?php echo @$galeri_edit['detail_galeri']; ?></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="SIMPAN" class="button-primary">
    <input type="reset" value="BATAL" class="button-primary" onclick="window.location.href='index.php?page=gallery_show'">
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