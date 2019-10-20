<?php
session_start();
if (!(isset($_SESSION['user'])))
{
  header("location: ../login/form-login.php");
} ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tambah Data</title>
    <script src="validasiguru.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel=icon type="image/png" href="../login/img/logoku.png">
    <link rel="stylesheet" href="../css/form-create.css">
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
    <h3 class="head">SMK Telkom Malang</h3>
    <form action="search.php" method="get" class="search">
    <input class="cari" type="search" name="cari" placeholder="Search Here ...">
    <select name="kategori" class="caribox">
      <option value="kode_guru">Kode Guru</option>
      <option value="nama_guru">Nama Guru</option>
    </select>
    <input class="sumbit" type="submit" value="Cari" id="src" onclick="return validasiSearch()">
    </form>
    </div>
    <div class="content">
    <form class="login" action="create.php" method="post">
      <h2>Tambah Data Guru</h2>
        <img src="../img/man-user.png" class="ic1"><input class="in" type="text" name="nama_guru" placeholder="Nama Guru" id="nama_guru">
          <br><br><br>
        <img src="../img/clock-.png" class="ic2"><input class="in" type="number" name="jumlah_jam" placeholder="Jumlah Jam" id="jumlah_jam">
          <br><br><br>
        <img src="../img/home.png" class="ic3">  <input class="in" type="text" name="alamat" placeholder="Alamat" id="alamat">
          <br><br><br>
        <img src="../img/call.png" class="ic4">  <input class="in" type="number" name="telp" placeholder="No. Telpon" id="telp">
          <br><br><br>
       <img src="../img/message.png" class="ic5">  <input class="in" type="email" name="email" placeholder="Email" id="email">
          <br><br><br>
      <br>
      <form action="../guru/create.php" method="post">
      <input type="submit" name="btnSimpan" id="src" value="Simpan" onclick="return validasiGuru()">
    </form>
    </form>
    <br>
    <form action="../guru/read.php" method="post">
      <button type="submit" name="kembali">Kembali</button>
    </form>
  </div>
  </body>
</html>
