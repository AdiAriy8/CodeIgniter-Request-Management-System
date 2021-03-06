<!-- Begin Page Content -->
<div class="container-fluid">
  <?php $this->load->view('alert') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?php echo $pages?></h1>
</div>
<!-- Content Row -->
<div class="row">
  <div class="col-12">
    <form class="user" method="post" accept-charset="utf-8" action="<?php echo base_url()?>index.php/Barang/update">
      <div class="form-group">
        <input type="text" name="id" class="form-control form-control-user" id="id" value="<?php echo $ret->id ?>" readonly hidden required>
      </div>
      <div class="form-group">
        <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Nama Barang" value="<?php echo $ret->nama ?>" required>
      </div>
      <div class="form-group">
        <input type="number" min = 0 name="harga" class="form-control form-control-user" id="harga" placeholder="Harga" value="<?php echo $ret->harga ?>" required>
      </div>
      <div class="form-group">
        <input type="text" name="desc" class="form-control form-control-user" id="desc" placeholder="Deskripsi" value="<?php echo $ret->desc ?>" required>
      </div>
      <input type="submit" value="Submit" class="btn btn-primary btn-user btn-block">
    </form>
  </div>
</div>

<!-- /.container-fluid -->