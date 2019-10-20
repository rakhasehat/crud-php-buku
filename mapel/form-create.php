<?php
session_start();
if (!(isset($_SESSION['user'])))
{
  header("location: ../login/form-login.php");
}

include '../connect.php';

$query = "SELECT kode_guru, nama_guru FROM t_guru";

$result = mysqli_query($connect, $query);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Tambah Data</title>
     <script src="validasimapel.js"></script>
     <link rel=icon type="image/png" href="../login/img/logoku.png">
     <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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
       <option value="kode_mapel">Kode Mapel</option>
       <option value="mapel">Mapel</option>
       <option value="semester">Semester</option>
     </select>
     <input class="sumbit" type="submit" value="Cari">
     </form>
     </div>
     <div class="container">
       <div class="content">
         <h2>Tambah Data Mapel</h2>
         <form action="create.php" method="post">
          <img src="../img/kode.png" class="ic1"><input class="in" type="text" name="kode_mapel" value="" placeholder="Kode*" id="kode_mapel">
           <br><br><br>
          <img src="../img/notebook.png" class="ic2"><input class="in" type="text" name="mapel" value="" placeholder="Mata Pelajaran" id="mapel">
           <br><br><br>
          <img src="../img/calendar.png" class="ic4"><input class="in" type="number" name="alokasi_waktu" value="" placeholder="Alokasi Waktu" id="alokasi_waktu">
           <br><br><br>
          <img src="../img/clock.png" class="ic3"> <input class="in" type="number" name="semester" value="" placeholder="Semester" id="semester">
           <br><br><br>
           <label for="kode_guru" class="guru"><b>Guru Pengajar</b></label><br>
           <select name="kode_guru" id="kode_guru" class="box">
             <option value="NULL">Tidak ada pengajar</option>
             <?php
               while ($data = mysqli_fetch_assoc($result)) {
                     ?>
               }
               <option value="<?php echo $data['kode_guru'];?>">
                   <?php echo $data['nama_guru']; ?>
               </option>
                 <?php
               }
              ?>
           </select>
           <br>
           <br>
           <input type="submit" id="src" name="btnSimpan" value="Simpan" onclick="return validasiMapel()">
         </form>
         <form action="../mapel/read.php" method="post">
           <button type="submit" name="kembali">Kembali</button>
         </form>
       </div>
     </div>
     <br>

   </body>
 </html>
