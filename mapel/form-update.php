<?php
session_start();
if (!(isset($_SESSION['user'])))
{
  header("location: ../login/form-login.php");
}

include '../connect.php';

$kode_mapel = $_GET['kode_mapel'];

$query = "SELECT kode_mapel, mapel, alokasi_waktu, semester, t_mapel.kode_guru, nama_guru
          FROM t_mapel LEFT JOIN t_guru USING(kode_guru)
          WHERE kode_mapel = '$kode_mapel'";

$result = mysqli_query($connect, $query);

$data_guru = mysqli_fetch_assoc($result);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Data</title>
    <link rel=icon type="image/png" href="../login/img/logoku.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/form-update.css">
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
      <option value="kode_mapel">Kode Mapel</option>
      <option value="mapel">Mapel</option>
      <option value="semester">Semester</option>
    </select>
    <input class="sumbit" type="submit" value="Cari">
  </form>
    </div>
    <div class="content">
    <h2>Update Data Mapel</h2>
    <form action="update.php" method="post">
      <img src="../img/kode.png" class="ic1"><input class="in" type="text" name="kode_mapel" value="<?php echo $data_guru['kode_mapel']; ?>" readonly> <br><br><br><br>
      <img src="../img/notebook.png" class="ic2"><input class="in" type="text" name="mapel" value="<?php echo $data_guru['mapel']; ?>"> <br><br><br><br>
      <img src="../img/calendar.png" class="ic3"><input class="in" type="number" name="alokasi_waktu" value="<?php echo $data_guru['alokasi_waktu']; ?>"> <br><br><br><br>
      <img src="../img/clock.png" class="ic4"><input class="in" type="number" name="semester" value="<?php echo $data_guru['semester']; ?>"><br><br><br>
      <label for="kode_guru" class="guru"><b>Guru Pengajar</b></label>
      <select name="kode_guru" id="kode_guru" class="box">
        <option value="NULL">Tidak ada pengajar</option>
        <?php
        $query2 = "SELECT kode_guru,nama_guru FROM t_guru";
        $result2 = mysqli_query($connect,$query2);
        while($data = mysqli_fetch_assoc($result2)) { ?>
        <option value="<?php echo $data['kode_guru']; ?>" <?php if($data_guru['kode_guru'] == $data['kode_guru']) {echo "selected";} ?>>
            <?php echo $data['nama_guru']; ?>
        </option>
        <?php }
    ?>
      </select>
      <br>
      <input type="submit" name="btnSimpan" value="Simpan">
    </form>
    <form action="../mapel/read.php" method="post">
      <button type="submit" name="kembali">Kembali</button>
    </form>
      </div>
  </body>
</html>
