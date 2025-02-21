<div class="header-container">
  <h1>Game</h1>
</div>

<table id="THIStable" class="display" style="text-align:center;">
  <thead>
    <tr>
      <th>No</th>
      <th>Game Title</th>
      <th>Version</th>
      <th>Specification</th>
      <th>Photo</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "../config/connection.php";
    $no = 1;
    $tampil_game = mysqli_query($koneksi, "SELECT * FROM game ORDER BY id_game DESC");
    while ($hasil = mysqli_fetch_array($tampil_game)) {
      echo "<tr>";
      echo "<td>$no</td>";
      echo "<td>" . htmlspecialchars($hasil['judul_game']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['versi']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['spesifikasi']) . "</td>";
      echo "<td><img src='" . htmlspecialchars($hasil['foto_game']) . "' class='gambar'></td>";
      echo "<td class='action-buttons'>
            <a href='index.php?page=game_read&id=" . $hasil['id_game'] . "'><button class='button-primary'>Read</button></a>
            <a href='index.php?page=game_add&id=" . $hasil['id_game'] . "'><button class='button-primary'>Update</button></a> <br>
            </td>";
      echo "</tr>";
      $no++;
    }
    ?>
  </tbody>
</table>

<script src="../asset/jquery-3.7.1.js"></script>
<link href="../asset/datatables.min.css" rel="stylesheet">
<script src="../asset/datatables.min.js"></script>

<script>
  $(document).ready(function() {
    if ($.fn.DataTable) {
      $('#THIStable').DataTable();
    } else {
      console.error("DataTable plugin is NOT loaded.");
    }
  });
</script>