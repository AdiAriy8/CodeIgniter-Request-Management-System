<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo $this->uri->segment(1) == 'Panel' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard Supplier</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Charts -->
<li class="nav-item <?php echo $this->uri->segment(1) == 'User' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()."index.php/User/staff" ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Users</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(1) == 'Barang' ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()."index.php/Barang/".$type?>">
    <i class="fas fa-fw fa-archive"></i>
    <span>Barang</span></a>
</li>


<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
  Transaksi
</div>

<li class="nav-item <?php echo $this->uri->segment(1) == 'Transaksi' && ($this->uri->segment(2) == '' || ($this->uri->segment(2) == $type && $this->uri->segment(3) == '') || $this->uri->segment(2) == 'get') ? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()."index.php/Transaksi/".$type?>">
    <i class="fas fa-fw fa-arrows-alt-h"></i>
    <span>Transaksi</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(1) == 'Transaksi' && $this->uri->segment(3) == 'New'? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()."index.php/Transaksi/".$type."/New"?>">
    <i class="fas fa-fw fa-history"></i>
    <span>Pending</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(1) == 'Transaksi' && $this->uri->segment(3) == 'Process'? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()."index.php/Transaksi/".$type."/Process"?>">
    <i class="fas fa-fw fa-history"></i>
    <span>Diproses</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(1) == 'Transaksi' && $this->uri->segment(3) == 'Send'? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()."index.php/Transaksi/".$type."/Send"?>">
    <i class="fas fa-fw fa-history"></i>
    <span>Dikirim</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(1) == 'Transaksi' && $this->uri->segment(3) == 'Finish'? 'active' : ''?>">
  <a class="nav-link" href="<?php echo base_url()."index.php/Transaksi/".$type."/Finish"?>">
    <i class="fas fa-fw fa-history"></i>
    <span>Selesai</span></a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
