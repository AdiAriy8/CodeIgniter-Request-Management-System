<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="<?php echo base_url()?>index.php/Report" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 animated fadeInUp">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User (Staff)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_staff?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 animated fadeInUp">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User (Supplier)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_supplier?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

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

  <script>
    var value_chart = new Array();
    var value_budget = new Array();
    var sum_chart = 0;
    var sum_budget = 0;
    let swap;
  </script>

  <!-- loop total request -->
  <?php 
    foreach($Map_chart_year as $row){ ?>
      <script type="text/javascript">
        swap = "<?php echo $row; ?>";
        value_chart.push(swap);
        sum_chart += Number(swap);
      </script>
      
    <?php 
    }
  ?>

  <!-- loop budget -->
  <?php 
    foreach($Map_budget_year as $row){ ?>
      <script type="text/javascript">
        swap = "<?php echo $row; ?>";
        value_budget.push(swap);
        sum_budget += Number(swap);
      </script>
      
    <?php 
    }
  ?>
  <!-- Content Row -->
  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-6">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Transaction Chart - <?php echo $year;?></h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Tahun:</div>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/Panel/getChart/2019">2019</a>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/Panel/getChart/2020">2020</a>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/Panel/getChart/2021">2021</a>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/Panel/getChart/2022">2022</a>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/Panel/getChart/2023">2023</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="col-xl-3 col-lg-3">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Transaction Overview - <?php echo $year;?></h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="mt-4 text-center small">
            <span class="mr-2">
              <i class="fas fa-circle text-primary"></i> Request
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-danger"></i> Budget
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-lg-3 animated fadeInRight">
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