<?php

  include '../connect.php';

  $kode_guru = $_GET['kode_guru'];

  $query = "DELETE FROM t_guru WHERE kode_guru = $kode_guru";

  $result = mysqli_query($connect, $query);

  $num = mysqli_affected_rows($connect);

  if($num > 0)
  {
    echo "<script>alert('Data berhasil dihapus!'); window.location='read.php'</script>";
  }
  else
  {
    echo "<script>alert('Data gagal dihapus!'); window.location='read.php'</script>";
  }
 ?>
