<!-- Begin Page Content -->
<div class="container-fluid">
  <?php $this->load->view('alert') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php echo $pages?></h1>
</div>
<!-- Content Row -->
<div class="row">
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
    <!-- DataTales Example -->
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Request Barang</h6>
      </div>
      <div class="card-body">
        <div>     
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead align='center'>
                <tr>
                  <th>Nama Barang</th>
                  <th>Quantity</th>
                  <th>Harga</th>
                  <th>Sub Total</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($cart->result_array() as $row):?>
                <tr>
                  <td><?php echo $row['nama']?></td>
                  <td><?php echo $row['qty']?></td>
                  <td align="right"><?php echo 'Rp '.number_format($row['harga'])?></td>
                  <td align="right"><?php echo 'Rp '.number_format($row['qty'] * $row['harga'])?></td>
                  <td align = "center">
                    <a href="#" data-toggle="modal" data-target="#deleteCart" class="btn btn-circle btn-sm btn-danger" onclick="setIDDelete(<?php echo $row['id']?>)">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
              
          <form class="user" method="post" accept-charset="utf-8" action="<?php echo base_url()?>index.php/Transaksi/CreateRequest">
            <div class="form-group">
            <textarea name="noted" class="form-control" placeholder="Tambahkan catatan..." rows="5"></textarea>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
          </form>
          
        </div>
        <br>
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
    <div class="card shadow">
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
                <th>#</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($barang->result_array() as $row):?>
              <tr>
                <td><?php echo $row['nama']?></td>
                <td align = "right"><?php echo 'Rp '.number_format($row['harga'])?></td>
                <td><?php echo $row['desc']?></td>
                <td><?php echo $row['supplier']?></td>
                <td align = "center">
                  <a href="#" data-toggle="modal" data-target="#addCart" class="btn btn-circle btn-sm btn-primary" onclick="setID(<?php echo $row['id']?>)">
                    <i class="fas fa-plus"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach;?>
            </tbody>
          </table>
        </div>
        <br>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Add Cart Modal-->
<div class="modal fade" id="addCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Ke daftar request</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form class="user" method="post" accept-charset="utf-8" action="<?php echo base_url()?>index.php/Transaksi/addCart">
        <div class="col-12">
          <br>
          <input type="hidden" readonly name="id_barang" id="id_barang">
          <div class="d-flex align-items-center justify-content-center">
            <div class="form-group row">
              <div class="col-sm-4">
                <div class="d-inline-flex p-2">Quantity</div>
              </div>
              <div class="col-sm-8">
                <input type="number" value = 1 min = 1 name="qty" class="form-control form-control-user" id="qty" placeholder="Quantity">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" value="Submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Cart Modal-->
<div class="modal fade" id="deleteCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus daftar request?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form class="user" method="post" accept-charset="utf-8" action="<?php echo base_url()?>index.php/Transaksi/deleteCart">
        <div class="col-12">
          <input type="hidden" readonly name="id_det_request" id="id_det_request">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" value="Submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function setID(Id) {
    document.getElementById("id_barang").value = Id;
  };

  function setIDDelete(Id) {
    document.getElementById("id_det_request").value = Id;
  };
</script>