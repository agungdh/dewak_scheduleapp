

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH DATA USER</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('user/update_data'); ?>" enctype="multipart/form-data">
    <div class="box-body">

      <input type="hidden" name="idusers" id="idusers" value="<?php echo $data_user->idusers; ?>">


    <div class="form-group">
      <label for="nama">Nama User</label>
          <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?php echo $data_user->nama; ?>" >          
    </div>

     <div class="form-group">
      <label for="username">Username</label>
     <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" value="<?php echo $data_user->username; ?>" >    
    </div>

    <div class="form-group">
      <label for="level">Level</label>
     <input type="text" class="form-control" id="level" placeholder="" name="level" disabled value="<?php 
     $a = $data_user->level;
      if ($a =="1") {
        echo "ADMIN/OPERATOR";
      }
      else{
        echo "GURU";
      }

      ?> ">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('user'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
<!-- 
<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#nama").val()) === "" || $.trim($("#username").val()) === "" || $.trim($("#password").val()) === "" || $.trim($("#ulangi_password").val()) === "" || $.trim($("#level").val()) === "Masukkan Level" ) {
        alert('Data masih kosong !!!');
    return false;
    }

    if ($.trim($("#password").val()) != $.trim($("#ulangi_password").val()) ) {
        alert('Password tidak sama !!!');
    return false;
    }
});

</script> -->