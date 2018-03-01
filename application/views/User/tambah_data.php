
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH DATA USER</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('User/tambah_data'); ?>" enctype="multipart/form-data" >
    <div class="box-body">


     <div class="form-group">
      <label for="nama">Nama User</label>
          <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama User" name="nama">          
    </div>

    <div class="form-group">
      <label for="username">Username</label>
     <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username">          
    </div>

    <div class="form-group">
      <label for="password">Password</label>
     <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">          
    </div>

    <div class="form-group">
      <label for="ulangi_password">Ulangi Password</label>
       <input type="password" class="form-control" id="ulangi_password" placeholder="Isi Ulangi Password" name="ulangi_password">          
    </div>

<div class="form-group">
      <label for="level">Level</label>
         <select name="level" id="level" class="form-control" >
              <option>  </option>
              <option value="1">ADMIN/OPERATOR</option>
              <option value="2">GURU</option>
              
         </select>
     </div>

   <!--  <div class="form-group">
      <label for="level">Level</label>
     <input type="text" class="form-control" id="level" placeholder="Masukkan Level User" name="level">          
    </div>
 -->
    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('user'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#nama").val()) === "" || $.trim($("#username").val()) === "" || $.trim($("#password").val()) === "" || $.trim($("#ulangi_password").val()) === "" || $.trim($("#level").val()) === "" ) {
        alert('Data masih kosong !!!');
    return false;
    }

    if ($.trim($("#password").val()) != $.trim($("#ulangi_password").val()) ) {
        alert('Password tidak sama !!!');
    return false;
    }
});

</script>