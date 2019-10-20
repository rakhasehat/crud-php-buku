<?php

  $host = "localhost";
  $db = "manajemen_sekolah";
  $username = "root";
  $password = "";

  $connect = mysqli_connect($host, $username, $password, $db);

  if (!($connect)) {
    echo "Koneksi ke database gagal" . mysqli_connect_error();
  }
 ?>
