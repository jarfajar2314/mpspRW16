  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav d-flex">
      <!-- Toggle BUtton -->
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block align-self-center">
        <h4 class="m-0">Manajemen Pengajuan Surat Pengantar RW 16</h4>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?= base_url() ?>/resources/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php
                                            $session = \Config\Services::session();
                                            echo $session->get('nama');
                                            ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?= base_url() ?>/resources/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            <p>
              <?php
              $session = \Config\Services::session();
              echo $session->get('nama');
              ?>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <a href="<?php echo base_url('/') ?>" class="btn btn-default btn-flat">Profile</a>
            <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat float-right">Log Out</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->