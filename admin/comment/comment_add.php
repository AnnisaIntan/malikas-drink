<?php
include "../config/connection.php";

// Retrieve data if editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $komentar_ambil = mysqli_query($koneksi, "SELECT * FROM komentar WHERE id_komentar = '$id'") or die(mysqli_error($koneksi));
    $komentar_edit = mysqli_fetch_array($komentar_ambil);
}
?>

<form action="<?php echo 'index.php?page=comment_process'; ?>" method="post">
    <?php
    if (isset($_GET['id'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id' value='" . $komentar_edit['id_komentar'] . "'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table align="center">
        <h1>Data Komentar</h1>
        <br>
        <tr>
            <td>Nama Tamu</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="nama_tamu" value="<?php echo @$komentar_edit['nama_tamu']; ?>"></td>
        </tr>
        <tr>
            <td>Tanggal Komentar</td>
            <td> : </td>
            <td><input type="date" name="tgl_komentar" value="<?php echo @$komentar_edit['tgl_komentar']; ?>"></td>
        </tr>
        <tr>
            <td>Komentar</td>
            <td> : </td>
            <td><textarea name="komentar" rows="5" cols="50"><?php echo @$komentar_edit['komentar']; ?></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="SIMPAN" class="button-primary">
    <input type="reset" value="BATAL" class="button-primary" onclick="window.location.href='index.php?page=comment_show'">
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