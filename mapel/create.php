<?php

  include '../connect.php';

  $kode_mapel = $_POST['kode_mapel'];
  $mapel = $_POST['mapel'];
  $alokasi_waktu = $_POST['alokasi_waktu'];
  $semester = $_POST['semester'];
  $kode_guru = $_POST['kode_guru'];

  $query = "INSERT INTO t_mapel
            VALUES('$kode_mapel','$mapel','$alokasi_waktu','$semester',$kode_guru)";

  $result = mysqli_query($connect, $query);

  $num = mysqli_affected_rows($connect);

  if ($num > 0)
  {
      echo "<script>alert('Data berhasil ditambah!'); window.location='read.php'</script>";
  }
  else
  {
    echo "<script>alert('Data gagal ditambah!'); window.location='read.php'</script>";
  }
?>
