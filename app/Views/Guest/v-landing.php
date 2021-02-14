<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo($title)?> • MPSP RW16</title>
  <meta name="robots" content="noindex, nofollow">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS Files -->
  <link href="<?= base_url() ?>/resources/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/resources/plugins/fontawesome-free/css/all.min.css">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>/resources/dist/css/style.css" rel="stylesheet">
  <link href="<?= base_url() ?>/resources/dist/css/style1.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.0.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
  <header id="header" class="">
    <div class="container d-flex justify-content-center justify-content-lg-start">
    <div class="row w-100 justify-content-between align-items-center">
        <div class="col-lg-9 text-white">
            <h1 id="title-text" class="bg-persianGreen p-lg-2 p-4 text-lg-center">
                Manajemen Pengajuan Surat Pengantar 
            </h1>
        </div>
        <div class="col-lg-3 text-white">
            <h3 id="title-text" class="bg-persianGreen p-2 text-center">RW 16 Sariwangi</h3>
        </div>
    </div>


      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <!-- <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#main">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> -->
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Main Section ======= -->
  <section id="main" class="d-flex align-items-lg-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1 mt-4 mt-lg-0 mb-lg-0 mb-5" data-aos="fade-up" data-aos-delay="200">
          <h1>Tentang</h1>
          <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero delectus explicabo maiores nostrum laboriosam et officiis ullam quaerat repudiandae ipsa, voluptatem necessitatibus deleniti eos est sunt excepturi repellat commodi temporibus!</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#" class="btn-get-started">
              <i class="fas fa-exclamation-triangle text-white"></i>
              Lapor Pemalsuan
            </a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 p-lg-5">
            <div class="card p-4 p-lg-5 rounded">
                <div class="mb-2">
                    <h3>Log In</h3>
                    <!-- <p class="mb-2">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                </div>
                <form action="<?php echo base_url('login/proses_login/'); ?>" method="post">
                <div class="form-group first">
                    <label for="username" class="text-left" >NIK</label>
                    <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                </div>
                <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                </div>
                <div class="d-flex mb-4 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Ingat saya</span>
                        <input type="checkbox" checked="checked" name="remember" />
                        <div class="control__indicator"></div>
                    </label>
                    <span class="ml-auto"><a href="#" class="forgot-pass">Lupa Password</a></span>
                </div>
                <input type="submit" value="Log In" class="btn text-white btn-block btn-primary btn-submit">
                <span class="d-block text-left mt-3 mb-2 text-muted">
                    Belum terdaftar? 
                    <a href="/register">Daftar Disini</a>
                </span>
                </form>
            </div>
        </div>

      </div>
    </div>

  </section><!-- End Hero -->


    <!-- jQuery -->
    <script src="<?= base_url() ?>/resources/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Main.js -->
    <script src="<?= base_url() ?>/resources/dist/js/main.js"></script>
</body>
</html>