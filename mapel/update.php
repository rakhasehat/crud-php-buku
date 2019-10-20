<?php

include '../connect.php';

$kode_mapel = $_POST['kode_mapel'];
$mapel = $_POST['mapel'];
$alokasi_waktu = $_POST['alokasi_waktu'];
$semester = $_POST['semester'];
$kode_guru = $_POST['kode_guru'];

  $query ="UPDATE t_mapel SET mapel = '$mapel',
                                 alokasi_waktu = $alokasi_waktu,
                                 semester = $semester,
                                 kode_guru = $kode_guru
         WHERE kode_mapel = '$kode_mapel'";

  $result = mysqli_query($connect,$query);
  $num = mysqli_affected_rows($connect);

  if($num > 0)
  {
    echo "<script>alert('Data berhasil diupdate!'); window.location='read.php'</script>";
  }
  else
  {
    echo "<script>alert('Data gagal diupdate!'); window.location='read.php'</script>";
  }
 ?>
