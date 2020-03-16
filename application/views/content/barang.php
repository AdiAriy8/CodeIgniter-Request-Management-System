<!-- Begin Page Content -->
<div class="container-fluid">
  <?php $this->load->view('alert') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php echo $pages?></h1>
  <?php if($sess['group'] == 3) { ?>
    <a href="<?php echo base_url()?>index.php/Barang/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>  Create New</a>
  <?php } ?>
  
</div>
<!-- Content Row -->
<div class="row">
  <div class="col-12">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead align='center'>
              <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Desc.</th>
                <th>Supplier</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($value->result_array() as $row):?>
              <tr>
                <td><?php echo $row['nama']?></td>
                <td align = "right"><?php echo 'Rp '.number_format($row['harga'])?></td>
                <td><?php echo $row['desc']?></td>
                <td><?php echo $row['supplier']?></td>
              </tr>
            <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /.container-fluid -->