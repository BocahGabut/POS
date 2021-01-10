<div class="horizontal-menu-wrapper">
  <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-tachometer"></i><span data-i18n="Dashboard">Dashboard</span></a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/transaksi"><i class="fa fa-tachometer"></i><span data-i18n="Transmasuk">Barang Masuk</span></a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'barang' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/barang"><i class="fa fa-bar-chart"></i><span data-i18n="Barang">Barang</span></a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'kategori' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/kategori"><i class="fa fa-tag"></i><span data-i18n="kategori">Kategori</span></a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'diskon' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/diskon"><i class="fa fa-money"></i><span data-i18n="guru">Diskon</span></a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'user' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/user"><i class="fa fa-user"></i><span data-i18n="guru">User</span></a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'pesan' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/pesan"><i class="fa fa-envelope-o"></i><span data-i18n="guru">Pesan</span>
            <i class="font-medium-5 feather icon-mail mr-50"></i>
            <?php
            $result = $this->db->get_where('barang', 'stock <= min_stock or stock >= max_stock');
            if ($result->num_rows() <> 0) {
            ?>
              <span class="badge badge-danger badge-pill float-right"><?php echo $result->num_rows() ?></span>
            <?php } ?>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'lap_keluar' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/lap_keluar"><i class="fa fa-user"></i><span data-i18n="guru">Laporan Keluar</span></a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'pengaturan' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/pengaturan"><i class="fa fa-cog"></i><span data-i18n="guru">Pengaturan</span></a>
        </li>
      </ul>
    </div>
  </div>
</div>