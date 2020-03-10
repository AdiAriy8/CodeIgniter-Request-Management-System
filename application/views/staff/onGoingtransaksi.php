<!-- Begin Page Content -->
<div class="container-fluid">
  <?php $this->load->view('alert') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php echo $pages?></h1>
  <!-- <a href="<?php echo base_url()?>index.php/Barang/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>  Create New</a> -->
</div>
<!-- Content Row -->
<div class="row">
  <div class="col-12">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead align='center'>
              <tr>
                <th>ID Req.</th>
                <th>Staff</th>
                <th>Supplier</th>
                <th>Status</th>
                <th>Tgl Request</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot align='center'>
              <tr>
                <th>ID Req.</th>
                <th>Staff</th>
                <th>Supplier</th>
                <th>Status</th>
                <th>Tgl Request</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
            <?php foreach ($value->result_array() as $row):?>
              <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['nama_staff']?></td>
                <td><?php echo $row['nama_supplier']?></td>
                <td><?php echo $row['status']?></td>
                <td><?php echo $row['tgl_request']?></td>
                <td align = "center">
                  <a href="<?php echo base_url()?>index.php/Transaksi/get/<?php echo $row['id']?>" class="btn btn-success btn-circle btn-sm">
                    <i class="fas fa-eye"></i>
                  </a>
                </td>
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