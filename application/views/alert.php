<?php
if ($this->session->flashdata('status')) {
    $status = $this->session->flashdata('status');?>
      <div id='alert' class = "<?php $status == "failed" ? $status = "alert" : $status = "alert info";
    echo $status?> ">
        <span class="closebtn">&times;</span>
         <?php echo $this->session->flashdata('messages') ?>
      </div>

     <script>
        setTimeout(function() 
          { $('#alert').delay(3000).fadeOut(1000)},
        );
     </script>

<?php } ?>