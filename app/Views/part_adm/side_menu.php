<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="<?=base_url ('template/dist/img/Logo.jpg')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Dimsumku</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url ('template/dist/img/avatar.png')?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">ADMIN</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url ('/dashboard');?>#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
        <li class="nav-item">    
          <a href="<?= base_url('/kategori'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tags text-warning"></i>
            <p>
              Kategori 
              <span class="right badge badge-success"></span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/barang'); ?>" class="nav-link">
            <i class="nav-icon fas fa-box-open text-success"></i>
            <p>
              Barang
              <span class="right badge badge-success"></span>
            </p>
          </a>
        </li>

        <!-- Menu Transaksi ditambahkan di bawah Barang -->
        <li class="nav-item">
          <a href="<?= base_url('/transaksi'); ?>" class="nav-link">
            <i class="nav-icon fas fa-exchange-alt text-info"></i>
            <p>
              Transaksi
              <span class="right badge badge-info"></span>
            </p>
          </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
          <a href="<?= base_url('/logout'); ?>" class="nav-link bg-danger">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>

        <?php
        if (session()->get('hak_akses') == 'admin') {
        ?>
        <li class="nav-item">
        <?php
        }
        ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>