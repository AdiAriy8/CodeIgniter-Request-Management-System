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
    <form class="user" method="post" accept-charset="utf-8" action="<?php echo base_url()?>index.php/User/update">
      <div class="form-group">
        <input type="text" name="id" class="form-control" id="id" value="<?php echo $ret->id ?>" readonly hidden required>
      </div>
      <div class="form-group">
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name..." value="<?php echo $ret->nama ?>" required>
      </div>
      <div class="form-group">
        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Full address..." value="<?php echo $ret->alamat ?>" required>
      </div>
      <div class="form-group">
        <input type="text" name="company" class="form-control" id="company" placeholder="Enter Full company..." value="<?php echo $ret->perusahaan ?>" required>
      </div>
      <div class="form-group">
        <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Enter Full Phone Number..." value="<?php echo $ret->no_telp ?>" required>
      </div>
      <div class="form-group">
        <div class="form-group">
          <select class="form-control" name="group" id="group">
            <?php 
              foreach($group->result_array() as $row) { 
                if($ret->group == $row['id']){
                  echo '<option value="'.$row['id'].'" Selected>'.$row['name'].'</option>';
                }else{
                  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
              } 
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <input type="email" name="email" readonly class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?php echo $ret->email ?>" required>
      </div>
      <hr>
      <div class="text-center">
        <h6 class="h6 mb-0 text-gray-800">Ganti Password</h6>
        <br>
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Confirm Password">
      </div>
      <input type="submit" value="Submit" class="btn btn-primary btn-user btn-block">
    </form>
  </div>
</div>

<!-- /.container-fluid -->