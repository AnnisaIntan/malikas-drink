<div class="header-container">
  <h1>News</h1>
  <button class="button-primary">
    <a href='index.php?page=news_add'>Create Data</a>
  </button>
</div>

<table id="THIStable" class="display" style="text-align:center;">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul Berita</th>
      <th>Tanggal</th>
      <th>Foto</th>
      <th>Detail</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "../config/connection.php";
    $no = 1;
    $tampil_berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
    while ($hasil = mysqli_fetch_array($tampil_berita)) {
      echo "<tr>";
      echo "<td>$no</td>";
      echo "<td>" . htmlspecialchars($hasil['judul_berita']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['tgl_berita']) . "</td>";
      echo "<td><img src='" . htmlspecialchars($hasil['foto_berita']) . "' class='gambar'></td>";
      echo "<td>" . nl2br(htmlspecialchars(substr($hasil['detail_berita'], 0, 100))) . "...</td>";
      echo "<td class='action-buttons'>
            <a href='index.php?page=news_read&id=" . $hasil['id'] . "'><button class='button-primary'>Read</button></a>
            <a href='index.php?page=news_add&id=" . $hasil['id'] . "'><button class='button-primary'>Update</button></a> <br>
            <a href='news_process.php?status=hapus&id=" . $hasil['id'] . "' onclick=\"return confirm('Are you sure to delete this row?');\"><button class='button-primary'>Delete</button></a>
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