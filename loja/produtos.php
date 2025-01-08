<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Produtos</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
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
                <li><a href="../index.php" class="active">Inicio</a></li>
                <li><a href="#">Loja</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="#">Contato</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="../core/user.php">Minha Conta</a></li>
                <?php else: ?>
                    <li><a href="../core/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Loja de Itens</h3>
          <span class="breadcrumb"><a href="#">Inicio</a>  >  <a href="#">Loja</a>  >Itens</span>
        </div>
      </div>
    </div>
  </div>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/isotope.min.js"></script>
  <script src="../assets/js/owl-carousel.js"></script>
  <script src="../assets/js/counter.js"></script>
  <script src="../assets/js/custom.js"></script>
  </body>
</html>