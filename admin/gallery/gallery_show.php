<div class="header-container">
  <h1>Gallery</h1>
  <button class="button-primary">
    <a href='index.php?page=gallery_add'>Create Data</a>
  </button>
</div>

<table id="THIStable" class="display" style="text-align:center;">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul Galeri</th>
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
    $tampil_galeri = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id_galeri DESC");
    while ($hasil = mysqli_fetch_array($tampil_galeri)) {
      echo "<tr>";
      echo "<td>$no</td>";
      echo "<td>" . htmlspecialchars($hasil['judul_galeri']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['tgl_galeri']) . "</td>";
      echo "<td><img src='" . htmlspecialchars($hasil['foto_galeri']) . "' class='gambar'></td>";
      echo "<td>" . nl2br(htmlspecialchars(substr($hasil['detail_galeri'], 0, 100))) . "...</td>";
      echo "<td class='action-buttons'>
            <a href='index.php?page=gallery_read&id=" . $hasil['id_galeri'] . "'><button class='button-primary'>Read</button></a>
            <a href='index.php?page=gallery_add&id=" . $hasil['id_galeri'] . "'><button class='button-primary'>Update</button></a> <br>
            <a href='index.php?page=gallery_process&id=" . $hasil['id_galeri'] . "' onclick=\"return confirm('Are you sure to delete this row?');\"><button class='button-primary'>Delete</button></a>
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