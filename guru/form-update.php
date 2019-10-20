<?php
session_start();
if (!(isset($_SESSION['user'])))
{
  header("location: ../login/form-login.php");
}

  include '../connect.php';

  $kode_guru = $_GET['kode_guru'];

  $query = "SELECT * FROM t_guru WHERE kode_guru = $kode_guru";

  $result = mysqli_query($connect, $query);

  $row = mysqli_fetch_assoc($result);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel=icon type="image/png" href="../login/img/logoku.png">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/form-update.css">
    <title>Ubah Data Guru</title>
  </head>
  <body>
    <div class="navbar">
        <div class="dropdown">
          <img src="../img/logo sekolah.png">
          <button class="dropbtn">Data
          </button>
    <div class="dropdown-content">
      <a href="../mapel/read.php">Mapel</a>
      <a href="../guru/read.php">Guru</a>
    </div>
  </div>
  <a href="../login/logout.php" name='logout'>Logout</a>
  <h3 class="head">SMK Telkom Malang</h3>
</div>
  <form action="search.php" method="get" class="search">
    <input class="cari" type="search" name="cari" placeholder="Search Here ...">
    <select name="kategori" class="caribox">
      <option value="kode_guru">Kode Guru</option>
      <option value="nama_guru">Nama Guru</option>
    </select>
    <input  class="sumbit" type="submit" value="Cari">
  </form>
    <div class="content">
      <h2>Ubah Data Guru</h2>
      <form class="login" action="update.php" method="post">
          <img src="../img/man-user.png" class="ic1"><input type="text" name="nama_guru" class="in" value="<?php echo $row['nama_guru'];?>"><br><br><br><br>
          <img src="../img/clock-.png" class="ic2"> <input type="number" class="in" name="jumlah_jam" value="<?php echo $row['jumlah_jam'];?>"><br><br><br><br>
          <img src="../img/home.png" class="ic3"> <input type="text" name="alamat" class="in" value="<?php echo $row['alamat'];?>"><br><br><br><br>
        <img src="../img/call.png" class="ic4"><input type="number" name="telp" class="in" value="<?php echo $row['telp'];?>"><br><br><br><br>
          <img src="../img/message.png" class="ic5"> <input type="text" name="email" class="in" value="<?php echo $row['email'];?>"><br><br><br>
          <input type="hidden" name="kode_guru" value="<?php echo $row['kode_guru'];?>">
            <form action="../guru/update.php" method="post">
            <input type="submit" name="btnSimpan" id="btnSimpan" value="Simpan">
          </form>
        <br>
      </form>
      <form action="../guru/read.php" method="post">
        <button type="submit" name="kembali">Kembali</button>
      </form>
    </div>
  </body>
</html>
