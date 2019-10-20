<?php

  include '../connect.php';

  $kode_mapel = $_GET['kode_mapel'];
  $query = "DELETE FROM t_mapel WHERE kode_mapel = '$kode_mapel'";

  $result = mysqli_query($connect, $query);

  $num = mysqli_affected_rows($connect);

  if ($num > 0) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='read.php'</script>";
  }
  else {
    echo "<script>alert('Data gagal dihapus!'); window.location='read.php'</script>";
  }
 ?>
