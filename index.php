<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Slow Down</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/anim.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>
<body>
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
<?php

session_start(); 
?>

<header class="header-area header-sticky">
    <div class="container">
        <nav class="main-nav">
            <a href="index.php" class="logo">
                <img src="assets/images/logo.png" alt="" style="width: 158px;">
            </a>
            <ul class="nav">
                <li><a href="index.php" class="active">Inicio</a></li>
                <li><a href="#">Loja</a></li>
                <li><a href="loja/produtos.php">Produtos</a></li>
                <li><a href="#">Contato</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="core/user.php">Minha Conta</a></li>
                <?php else: ?>
                    <li><a href="core/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

  <!-- ***** Header Area End ***** -->

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Bem vindo(a)</h6>
            <h2>SLOW DOWN RPG</h2>
            <p>um servidor RPG que redefine sua experiência de jogo. Aqui, convidamos você a desacelerar e mergulhar em um mundo rico e envolvente, onde cada momento conta e cada escolha tem um impacto.</p>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Oque você esta procurando?" id='searchText' name="searchKeyword" onkeypress="handle" />
                <button role="button">Procurar</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div id="avatar-container" class="right-image">
              <img src="assets/images/avatar.png" alt="">
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="https://discord.gg/gh3GStXzHf">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-01.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Baixar</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="https://discord.gg/gh3GStXzHf">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-02.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Minha Conta</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="https://discord.gg/gh3GStXzHf">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-03.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Forum</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="https://discord.gg/gh3GStXzHf">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-04.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Sobre</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>
