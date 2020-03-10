<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 animated fadeInUp">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Barang</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_barang?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-archive fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 animated fadeInUp">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_trx?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-arrows-alt-h fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">
    <!-- Content Column -->
    <div class="col-xl-6 col-lg-12 col-md-12 animated fadeInUp">
      <!-- Project Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Request</h6>
        </div>
        <div class="card-body">
          <h4 class="small font-weight-bold">Baru <span class="float-right"><?php echo $New?>%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $New?>%" aria-valuenow="<?php echo $New?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Diproses <span class="float-right"><?php echo $Process?>%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $Process?>%" aria-valuenow="<?php echo $Process?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Dikirm <span class="float-right"><?php echo $Send?>%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $Send?>%" aria-valuenow="<?php echo $Send?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Dibatalkan <span class="float-right"><?php echo $Reject?>%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $Reject?>%" aria-valuenow="<?php echo $Reject?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Selesai <span class="float-right"><?php echo $Received?>%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $Received?>%" aria-valuenow="<?php echo $Received?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->