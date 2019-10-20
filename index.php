<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel=icon type="image/png" href="login/img/logoku.png">
    <meta charset="utf-8">
    <title>Get Started</title>
    <style type="text/css">
    body{
      margin: 0 auto;
      padding: 0;
      background-image: url(img/3.jpg);
      background-size: cover;
      color: #F8F9F9;
    }

    .overlay{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 30, 0.5);
    }

    h1{
      position: absolute;
      top: 28%;
      left: 33%;
      font-size: 60px;
    }
    p{
      font-size: 30px;
      position: absolute;
      top: 45%;
      left: 37.5%;
    }

    .get{
      font-size: 20px;
      position: absolute;
      left: 43%;
      top: 60%;
      width: 150px;
      height: 50px;
      border: none;
      border-radius: 8px;
      background-color: #A9CCE3;
      outline: none;
    }

    .get:hover{
      border: 2px solid white;
      cursor: pointer;
      background: transparent;
      color: white;
      outline: none;
    }

    img{
      position: absolute;
      left: 50%;
      top: 10%;
      height: 150px;
    }

    .sekolah{
      height: 200px;
      position: absolute;
      left: 34%;
      top: 8%;
    }
    </style>
  </head>
  <body>
    <section>
      <div class="overlay">
        <img src="img/logo sekolah.png" class="sekolah">
        <img src="img/flow-chart.png">
    <h1>Manajemen Siswa</h1>
    <p>Mulailah mengelola data!</p>
    <form action="login/form-login.php" method="post">
      <input type="submit" value="Get Started" class="get">
    </form>
    </div>
    </section>
  </body>
</html>
