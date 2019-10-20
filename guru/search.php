<?php
session_start();
if (!(isset($_SESSION['user'])))
{
  header("location: ../login/form-login.php");
}
include '../connect.php';

$nama = $_SESSION['user'];

$cari = $_GET['cari'];
$kategori = $_GET['kategori'];

$query = "SELECT * FROM t_guru WHERE $kategori LIKE '%$cari%'";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows ($result);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <script src="validasisearch.js"></script>
<link rel=icon type="image/png" href="../login/img/logoku.png">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/master.css?v=1.1">
    <title>Data Guru</title>
  </head>
  <body>
    <div class="navbar">
      <img src="../img/logo sekolah.png">
        <div class="dropdown">
          <button class="dropbtn">Data
          </button>
    <div class="dropdown-content">
      <a href="../mapel/read.php">Mapel</a>
      <a href="../guru/read.php">Guru</a>
    </div>
  </div>
  <a href="../login/logout.php" name='logout'>Logout</a>
  <h3 class="head">Welcome, <?php echo $nama; ?></h3>
</div>
  <form action="search.php" method="get" class="search">
    <input class="cari" type="search" name="cari" placeholder="Search Here ...">
    <select name="kategori" class="caribox">
      <option value="kode_guru">Kode Guru</option>
      <option value="nama_guru">Nama Guru</option>
    </select>
    <input class="sumbit" id="src" type="submit" value="Cari" onclick="return validasiCari()">
  </form>
  <div class="wrapper">
    <h2>Data Guru</h2>
    <table>
      <thead>
      <tr>
        <th>No.</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Jam</th>
        <th>Alamat</th>
        <th>Telp</th>
        <th>Email</th>
        <th colspan="2">Aksi</th>
      </tr>
      </thead>
      <?php
      if ($num > 0) {
        $no = 1;
        while ($data = mysqli_fetch_assoc($result)) {
          echo "<tbody>";
          echo "<tr>";
          echo "<td>". $no . "</td>";
          echo "<td>" . $data['kode_guru'] . "</td>";
          echo "<td>" . $data['nama_guru'] . "</td>";
          echo "<td>" . $data['jumlah_jam']. "</td>";
          echo "<td>" . $data['alamat'] . "</td>";
          echo "<td>" . $data['telp'] . "</td>";
          echo "<td>" . $data['email'] . "</td>";
          echo "<td><a href ='form-update.php?kode_guru=" . $data['kode_guru'] . "' class='edit'>Edit </a></td>";
          echo "<td><a href = 'delete.php?kode_guru=".$data['kode_guru']."'onclick='return confirm(\" Apakah Anda yakin ingin menghapus data?\")'class='hapu'>Hapus</a></td>";
          echo "</tr>";
          echo "</tbody>";
          $no++;
        }
      }
      else {
        echo "<tr> <td colspan='8'> Tidak ada data </td></tr>";
      }
      ?>
    </table>
<br>
<form action="../guru/read.php" method="post">
  <button type="submit" name="kembali" class="submet">Kembali</button>
</form>
      </div>
  </body>
</html>
