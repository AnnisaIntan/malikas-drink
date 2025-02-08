<?php
include "../config/connection.php";

// Retrieve data if editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $game_ambil = mysqli_query($koneksi, "SELECT * FROM game WHERE id_game = '$id'") or die(mysqli_error($koneksi));
    $game_edit = mysqli_fetch_array($game_ambil);
}
?>

<form action="game_process.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id' value='" . $game_edit['id_game'] . "'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table align="center">
        <h1>Data Game</h1>
        <br>
        <tr>
            <td>Judul Game</td>
            <td> : </td>
            <td><input type="text" maxlength="128" size="50" name="judul_game" value="<?php echo @$game_edit['judul_game']; ?>"></td>
        </tr>
        <tr>
            <td>Versi</td>
            <td> : </td>
            <td><input type="text" maxlength="50" size="50" name="versi" value="<?php echo @$game_edit['versi']; ?>"></td>
        </tr>
        <tr>
            <td>Spesifikasi</td>
            <td> : </td>
            <td><textarea name="spesifikasi" rows="5" cols="50"><?php echo @$game_edit['spesifikasi']; ?></textarea></td>
        </tr>
        <tr>
            <td>Foto Game</td>
            <td> : </td>
            <td>
                <?php if (!empty($game_edit['foto_game'])): ?>
                    <img src="<?= $game_edit['foto_game']; ?>" width="100" height="100"><br>
                    <input type="checkbox" name="centang" value="1"> Centang jika ingin ganti foto<br>
                    <input type="file" name="foto_game">
                <?php else: ?>
                    <input type="file" name="foto_game">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Detail Game</td>
            <td> : </td>
            <td><textarea name="detail_game" rows="5" cols="50"><?php echo @$game_edit['detail_game']; ?></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="SIMPAN" class="button-primary">
    <input type="reset" value="BATAL" class="button-primary" onclick="window.location.href='index.php?page=game_show'">
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