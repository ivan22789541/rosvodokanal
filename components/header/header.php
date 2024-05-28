<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rosvodokanal.ru</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
</head>
<body>
     <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">rosvodakanal@mail.ru</a>
        <i class="bi bi-phone"></i> +7 (495) 514 02 11
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
 
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php"><img src="./assets/img/logo.png" alt=""></a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php#hero">Главная</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">О нас</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Услуги</a></li>
          <li><a class="nav-link scrollto" href="index.php#departments">Вопросы</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Контакты</a></li>
          <li><a class="nav-link scrollto" href="form.php">Заявка</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="auth"><a href="auth.php" class="appointment-btn"><span class="d-none d-md-inline">Войти</span></a></div>
      <div class="auth_user"><a href="status.php" class="appointment-btn auth_user"><span class="d-none d-md-inline"><?= $_SESSION['user']['fullname'] ?></span></a></div>
      <?php
                        
      if(isset($_SESSION['user']['fullname'])) {
          echo "<style>.auth {display: none}; .auth_user {display: block;}</style>";
      } else {
          echo "<style>.auth_user {display: none;}</style>";
      }
      
      ?>
    </div>
  </header><!-- End Header -->
</body>
</html>