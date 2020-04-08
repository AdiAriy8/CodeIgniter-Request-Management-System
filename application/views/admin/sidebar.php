<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>">
  <div class="sidebar-brand-icon rotate-n-15">
    IATK
  </div>
  <div class="sidebar-brand-text mx-3"><?php echo site_title_short ?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo $this->uri->segment(1) == 'Panel' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Charts -->
<li class="nav-item <?php echo $this->uri->segment(1) == 'User' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()?>index.php/User">
    <i class="fas fa-fw fa-user"></i>
    <span>Users</span></a>
</li>


<li class="nav-item <?php echo $this->uri->segment(1) == 'Barang' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()?>index.php/Barang">
    <i class="fas fa-fw fa-archive"></i>
    <span>Barang</span></a>
</li>


<li class="nav-item <?php echo $this->uri->segment(1) == 'Transaksi' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()?>index.php/Transaksi">
    <i class="fas fa-fw fa-arrows-alt-h"></i>
    <span>Transaksi</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(1) == 'Report' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()?>index.php/Report">
    <i class="fas fa-fw fa-book"></i>
    <span>Report</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(1) == 'Budget' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()?>index.php/Budget">
    <i class="fas fa-coins"></i>
    <span>Budgeting</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
