<div class="header-container">
  <h1>Creator</h1>
  <button class="button-primary">
    <a href='index.php?page=creator_add'>Create Data</a>
  </button>
</div>

<table id="THIStable" class="display" style="text-align:center;">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pembuat</th>
      <th>Pendidikan Pembuat</th>
      <th>Foto</th>
      <th>Detail</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "../config/connection.php";
    $no = 1;
    $tampil_pembuat = mysqli_query($koneksi, "SELECT * FROM pembuat ORDER BY id_pembuat DESC");
    while ($hasil = mysqli_fetch_array($tampil_pembuat)) {
      echo "<tr>";
      echo "<td>$no</td>";
      echo "<td>" . htmlspecialchars($hasil['nama_pembuat']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['pendidikan_pembuat']) . "</td>";
      echo "<td><img src='" . htmlspecialchars($hasil['foto_pembuat']) . "' class='gambar'></td>";
      echo "<td>" . nl2br(htmlspecialchars(substr($hasil['detail_pembuat'], 0, 100))) . "...</td>";
      echo "<td class='action-buttons'>
            <a href='index.php?page=creator_read&id=" . $hasil['id_pembuat'] . "'><button class='button-primary'>Read</button></a>
            <a href='index.php?page=creator_add&id=" . $hasil['id_pembuat'] . "'><button class='button-primary'>Update</button></a> <br>
            <a href='creator_process.php?status=hapus&id=" . $hasil['id_pembuat'] . "' onclick=\"return confirm('Are you sure to delete this row?');\"><button class='button-primary'>Delete</button></a>
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