<?php
include "../config/connection.php";

// Retrieve data if editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $berita_ambil = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = '$id'") or die(mysqli_error($koneksi));
    $berita_edit = mysqli_fetch_array($berita_ambil);
}
?>

<form action="<?php echo 'index.php?page=news_process'; ?>" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id' value='" . $berita_edit['id'] . "'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table align="center">
        <h1>Data News</h1>
        <br>
        <tr>
            <td>Judul Berita</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="judul_berita" value="<?php echo @$berita_edit['judul_berita']; ?>"></td>
        </tr>
        <tr>
            <td>Foto Berita</td>
            <td> : </td>
            <td>
                <?php if (!empty($berita_edit['foto_berita'])): ?>
                    <img src="<?= $berita_edit['foto_berita']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_berita">
                <?php else: ?>
                    <input type="file" name="foto_berita">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Detail Berita</td>
            <td> : </td>
            <td><textarea name="detail_berita" rows="5" cols="50"><?php echo @$berita_edit['detail_berita']; ?></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="SIMPAN" class="button-primary">
    <input type="reset" value="BATAL" class="button-primary" onclick="window.location.href='index.php?page=news_show'">
</form>

<style>
    :root {
        --bg: #025464;
        --color: #F8F1F1;
        --tr1: #E57C23;
        --tr2: #E8AA42;
    }

    input, textarea {
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