<!-- Begin Page Content -->
<div class="container-fluid">
  <?php $this->load->view('alert') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?php echo $pages?></h1>
<span> 
  <a href="<?php echo base_url() ?>index.php/Transaksi/DetailTransaksi/<?php echo $ret->id?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</span>

</div>
<!-- Content Row -->
<div class="row">
  <div class="col-12">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Trx Number - <?php echo $ret->id?></h6>
      </div>
      <div class="card-body">
        <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Request Number</th>
                  <td><?php echo $ret->id?></td>
                </tr>
                <tr>
                  <th>Staff</th>
                  <td><?php echo $ret->nama_staff?></td>
                </tr>
                <tr>
                  <th valign="center">Status</th>
                  <td>
                    <div class="d-flex justify-content-between align-items-center">
                      <div><?php echo $ret->status?></div>
                      <div>
                        <?php if(isset($nextstatus)){ ?>
                          <a href="<?php echo base_url() ?>index.php/Transaksi/ChangeStatus/<?php echo $nextstatus?>/<?php echo $ret->id?>" class="btn btn-sm btn-primary"><?php echo $nextstatus?></a>
                        <?php }?>
                        <?php if($ret->status == 'New'){ ?>
                          <a href="<?php echo base_url() ?>index.php/Transaksi/ChangeStatus/reject/<?php echo $ret->id?>" class="btn btn-sm btn-danger"><?php echo 'Reject'?></a>
                        <?php }?>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Tgl Request</th>
                  <td><?php echo $ret->tgl_request?></td>
                </tr>
                <tr>
                  <th>Tgl Kirim</th>
                  <td><?php echo $ret->tgl_kirim?></td>
                </tr>
                <tr>
                  <th>Tgl Selesai</th>
                  <td><?php echo $ret->tgl_selesai?></td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Supplier</th>
                  <td><?php echo $ret->nama_supplier?></td>
                </tr>
                <tr>
                  <th>Perusahaan</th>
                  <td><?php echo $ret->perusahaan?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><?php echo $ret->alamat?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $ret->email?></td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        </div>
        
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead align='center'>
              <tr>
                <th>No</th>
                <th>NAMA BARANG</th>
                <th>QUANTITY</th>
                <th>HARGA</th>
                <th>SUB TOTAL</th>
              </tr>
            </thead>
            <tbody>
            <?php $total = 0; foreach ($value->result_array() as $row):?>
              <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['nama']?></td>
                <td align = "center"><?php echo $row['qty']?></td>
                <td align = "right"><?php echo 'Rp '.number_format($row['harga'])?></td>
                <td align = "right"><?php echo 'Rp '.number_format($row['harga'] * $row['qty'])?></td>
                <?php 
                  $total += ($row['harga'] * $row['qty']);
                ?>
                
              </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot align='center'>
              <tr>
                <th colspan = 3>GRAND TOTAL</th>
                <th colspan = 2><?php echo 'Rp '.number_format($total)?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /.container-fluid -->