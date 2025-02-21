<div class="header-container">
  <h1>Comments</h1>
</div>

<table id="THIStable" class="display" style="text-align:center;">
  <thead>
    <tr>
      <th>No</th>
      <th>Guest Name</th>
      <th>Comment Date</th>
      <th>Comment</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "../config/connection.php";
    $no = 1;
    $tampil_komentar = mysqli_query($koneksi, "SELECT * FROM komentar ORDER BY id_komentar DESC");
    while ($hasil = mysqli_fetch_array($tampil_komentar)) {
      echo "<tr>";
      echo "<td>$no</td>";
      echo "<td>" . htmlspecialchars($hasil['nama_tamu']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['tgl_komentar']) . "</td>";
      echo "<td>" . nl2br(htmlspecialchars(substr($hasil['komentar'], 0, 100))) . "...</td>";
      echo "<td class='action-buttons'>
            <a href='index.php?page=comment_read&id=" . $hasil['id_komentar'] . "'><button class='button-primary'>Read</button></a>
            <a href='index.php?page=comment_process&id=" . $hasil['id_komentar'] . "' onclick=\"return confirm('Are you sure to delete this comment?');\"><button class='button-primary'>Delete</button></a>
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