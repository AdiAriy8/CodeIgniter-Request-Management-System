<!-- Begin Page Content -->
<div class="container-fluid">
  <?php $this->load->view('alert')?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php echo $pages ?></h1>
</div>
<!-- Content Row -->
<div class="row">
  <div class="col-12">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Generate Report</h6>
      </div>
      <div class="card-body">
        <!-- filter report -->
        <div class="row col-12">
          <form class="user" method="post" accept-charset="utf-8" action="<?php echo base_url() ?>index.php/Report/generate">
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                Start Date
                <input type="date" name="start_date" class="form-control" id="start_date" value = <?php echo isset($start_date) ? $start_date  : '' ?>>
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                End Date
                <input type="date" name="end_date" class="form-control" id="end_date" value = <?php echo isset($end_date) ? $end_date  : '' ?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="New" name="New" value="New" <?php echo in_array('New', $status) ? 'checked' : '' ?> >
                  <label class="custom-control-label" for="New">New</label>
                </div>
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="Process" name="Process" value="Process" <?php echo in_array('Process', $status) ? 'checked' : '' ?> >
                  <label class="custom-control-label" for="Process">Process</label>
                </div>
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="Send" name="Send" value="Send" <?php echo in_array('Send', $status) ? 'checked' : '' ?> >
                  <label class="custom-control-label" for="Send">Send</label>
                </div>
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="Received" name="Received" value="Received" <?php echo in_array('Received', $status) ? 'checked' : '' ?> >
                  <label class="custom-control-label" for="Received">Received</label>
                </div>
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="Cancel By Staff" name="CancelStaff" value="Reject_By_Staff" <?php echo in_array('Reject_By_Staff', $status) ? 'checked' : '' ?> >
                  <label class="custom-control-label" for="Cancel By Staff">Reject by Staff</label>
                </div>
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="Cancel by Supplier" name="CancelSupplier" value="Reject_By_Supplier" <?php echo in_array('Reject_By_Supplier', $status) ? 'checked' : '' ?> >
                  <label class="custom-control-label" for="Cancel by Supplier">Reject by Supplier</label>
                </div>
              </div>
            </div>
            <input type="submit" name = "Show" value="Show" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <input type="submit" name = "Generate" value="Generate" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if (isset($value)) {?>
<!-- result -->
<div class="row">
  <div class="col-12">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead align='center'>
              <tr>
                <th>No</th>
                <th>ID Req.</th>
                <th>Staff</th>
                <th>Supplier</th>
                <th>Status</th>
                <th>Tgl Request</th>
                <th>Tgl Selesai</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $no = 1;
              foreach ($value->result_array() as $row): ?>
              <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['nama_staff'] ?></td>
                <td><?php echo $row['nama_supplier'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['tgl_request'] ?></td>
                <td><?php echo $row['tgl_selesai'] ?></td>
                <td><?php echo 'Rp ' . number_format($row['total']) ?></td>
                <td align = "center">
                  <a href="<?php echo base_url() ?>index.php/Transaksi/get/<?php echo $row['id'] ?>" class="btn btn-success btn-circle btn-sm">
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
<?php }?>