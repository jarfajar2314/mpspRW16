<!-- Main Sidebar Container -->
<style>
    .bgPrimary{
        background-color: #e76f51 !important;
        /* background-color: #0275d8 !important; */
    }
    .bb-white{
        border-bottom: 1px solid rgba(0, 0, 0, .2) !important;
        /* border-bottom: 1px solid #f7f7f7 !important; */
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4 bgPrimary">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bb-white">
      <img src="<?= base_url() ?>/resources/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light text-light">MPSP RW 16</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <style>
            .nav-link.active{
              /* Orange Yellow Crayola */
              /* background-color: #e9c46a !important;   */
              /* Persian Green */
              background-color: #2a9d8f !important;
            }
          </style>

          <!-- All -->
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="/<?php echo($level)?>/dashboard" class="nav-link <?php echo($_SERVER['REQUEST_URI']== '/' . $level . '/dashboard' ? "active" : ""); ?>">
              <i class="nav-icon fas fa-th text-light"></i>
              <p class="text-light">Dashboard</p>
            </a>
          </li>

          <!-- RT & RW Only -->
          <?php if ($level == 'rt' || $level == 'rw' ) : ?>
          <!-- Daftar Surat -->
          <li class="nav-item">
            <a href="/<?php echo($level)?>/daftar-surat" class="nav-link <?php echo($_SERVER['REQUEST_URI']== '/' . $level . '/daftar-surat' ? "active" : ""); ?>">
              <i class="nav-icon fas fa-file-alt text-light"></i>
              <p class="text-light">Daftar Surat</p>
            </a>
          </li>
          
          <!-- Verifikasi Akun -->
          <li class="nav-item">
            <a href="/<?php echo($level)?>/verifikasi-akun" class="nav-link <?php echo($_SERVER['REQUEST_URI']== '/' . $level . '/verifikasi-akun' ? "active" : ""); ?>">
              <i class="nav-icon fas fa-user text-light"></i>
              <p class="text-light">Verifikasi Akun</p>
            </a>
          </li>
          <?php endif ?>

          <!-- RW Only -->
          <?php if ($level == 'rw') : ?>
          <!-- Laporan Pemalsuan -->
          <li class="nav-item">
            <a href="/rw/laporan-pemalsuan" class="nav-link <?php echo($_SERVER['REQUEST_URI']=='/rw/laporan-pemalsuan' ? "active" : ""); ?>">
              <i class="nav-icon fas fa-file-signature text-light"></i>
              <p class="text-light">Laporan Pemalsuan</p>
            </a>
          </li>
          <?php endif ?>

          <!-- Warga only -->
          <?php if ($level == 'warga') : ?>
            <!-- Persyaratan -->
            <li class="nav-item">
            <a href="<?php echo base_url('warga/persyaratan') ?>" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/warga/persyaratan' ? "active" : ""); ?>">
              <i class="nav-icon fas fa-file-alt text-light"></i>
              <p class="text-light">Persyaratan</p>
            </a>
          </li>
          <?php endif ?>
          
          <!-- None -->
          <?php if ($level != 'warga') : ?>

          <?php endif ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo($title); ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- content here -->

    </section>
    <!-- /.content -->