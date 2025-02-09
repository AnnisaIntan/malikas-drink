<div class="header-container">
  <h1>Admin Web</h1>
  <button class="button-primary">
    <a href='index.php?page=admin_add'>Create Data</a>
  </button>
</div>

<table id="THIStable" class="display" style="text-align:center;">
  <thead>
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Name</th>
      <th>Address</th>
      <th>Number Phone</th>
      <th>Photo</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "../config/connection.php";
    $no = 1;
    $tampil_admin = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id");
    while ($hasil = mysqli_fetch_array($tampil_admin)) {
      echo "<tr>";
      echo "<td>$no</td>";
      echo "<td>" . htmlspecialchars($hasil['user_name']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['nama_admin']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['alamat_admin']) . "</td>";
      echo "<td>" . htmlspecialchars($hasil['no_telp_admin']) . "</td>";
      echo "<td><img src='" . htmlspecialchars($hasil['foto_admin']) . "' class='gambar'></td>";
      echo "<td class='action-buttons'>
            <a href='index.php?page=admin_read&id=" . $hasil['id'] . "'><button class='button-primary'>Read</button></a> <br>
            <a href='index.php?page=admin_add&id=" . $hasil['id'] . "'><button class='button-primary'>Update</button></a> <br>
            <a href='admin_process.php?status=hapus&id=" . $hasil['id'] . "' onclick=\"return confirm('Are you sure to delete this row?');\"><button class='button-primary'>Delete</button></a>
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
    console.log("Document ready, initializing DataTable...");

    if ($.fn.DataTable) {
      console.log("DataTable plugin found!");
      $('#THIStable').DataTable();
    } else {
      console.error("DataTable plugin is NOT loaded.");
    }
  });
</script>