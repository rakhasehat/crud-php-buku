<?php
  session_start();
  if (!(isset($_SESSION['user']))) {
    header('location: login/form-login.php');
  }

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel=icon type="image/png" href="../sekolah/login/img/logoku.png">
     <title>WELCOME!</title>
     <style media="screen">
       .we{
         position: absolute;
         top: 40%;
         left: 10%;
         font-size: 70px;
         color: white;
       }
       body{
         background-image: url(../sekolah/img/2.jpeg);
         background-size: cover;
       }
     </style>
   </head>
   <body>
     <?php
     header("Refresh: 2.0; url=guru/read.php");
     $nama = $_SESSION['user'];
     echo "<div class='we'>Welcome $nama!</div>";
     exit;
      ?>
   </body>
 </html>
