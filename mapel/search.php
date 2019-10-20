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
$query = "SELECT kode_mapel, mapel, alokasi_waktu, semester, nama_guru
          FROM t_mapel left join t_guru
          USING (kode_guru)
          WHERE $kategori LIKE '%$cari%'
          ORDER BY (mapel)";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows ($result);

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <link rel=icon type="image/png" href="../login/img/logoku.png">
     <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
     <link rel="stylesheet" href="../css/master.css?v=1.1">
   <title>Data Mapel</title>
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
   <form action="search.php" method="get" class="search">
     <input class="cari" type="search" name="cari" placeholder="Search Here ...">
     <select name="kategori" class="caribox">
       <option value="kode_mapel">Kode Mapel</option>
       <option value="mapel">Mapel</option>
       <option value="semester">Semester</option>
       <option value="nama_guru">Guru Pengajar</option>
     </select>
     <input class="sumbit" type="submit" value="Cari">
   </form>
     </div>
     <div class="wrapper">
             <h2>Data Mapel</h2>
     <table class="mapel">
       <thead>
       <tr>
         <th>No.</th>
         <th>Kode</th>
         <th>Mapel</th>
         <th>Alokasi Waktu</th>
         <th>Semester</th>
         <th>Guru Pengajar</th>
         <th colspan="2">Aksi</th>
       </tr>
     </thead>
       <?php
       if ($num > 0) {
         $no = 1;
         while ($data = mysqli_fetch_assoc($result)) { ?>
<tbody>
           <tr>
             <td class="no"> <?php echo $no; ?></td>
             <td> <?php echo $data['kode_mapel'] ?> </td>
             <td> <?php echo $data['mapel'] ?> </td>
             <td> <?php echo $data['alokasi_waktu'] ?> </td>
             <td> <?php echo $data['semester'] ?> </td>
             <td>
                 <?php
                   if($data['nama_guru'] != NULL )
                   {
                     echo $data['nama_guru'];
                   }
                   else { echo "-"; }
                  ?>
             </td>
               <td><a class="edit" href="form-update.php?kode_mapel=<?php echo $data['kode_mapel']; ?>">Edit </a></td>
               <td><a class="hapus" href="delete.php?kode_mapel=<?php echo $data['kode_mapel']; ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">Hapus</a></td>
           </tr>
           </tbody>
           <?php
           $no++;
         }
       }
       else {
         echo "<tr> <td colspan='8'> Tidak ada data </td></tr>";
       }
       ?>
     </table>
   </div>
     <br>
       <form action="../mapel/read.php" method="post">
         <button type="submit" name="kembali" class="submet">Kembali</button>
       </form>
   </body>
 </html>
