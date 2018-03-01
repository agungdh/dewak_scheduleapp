<style type="text/css">
  .wrapper {
  overflow:hidden;
  position:relative;
}

/*----- boxes -----*/

.img-box {
  display:inline-block;
  padding:3px;
  background:#fff;
  border:1px solid #d9d9d9;
  border-radius:3px;
  margin-bottom:12px;
}
/* Lightbox image */

a.border {
  padding:6px;
  background:#dededa;
  display:inline-block;
}

</style>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH DATA JURUSAN</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('jurusan/update_data'); ?>" enctype="multipart/form-data">
    <div class="box-body">
<div class="form-group">
   <input type="hidden" class="form-control" id="id_jurusan" placeholder="" name="id_jurusan" value="<?php echo $data_jurusan->id_jurusan; ?>" >     
</div>

    <div class="form-group">
      <label for="nama_jurusan">Nama Jurusan</label>
          <input type="text" class="form-control" id="nama_jurusan" placeholder="" name="nama_jurusan" value="<?php echo $data_jurusan->nama_jurusan; ?>" >          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('jurusan'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->


<script type="text/javascript">

$('#form').submit(function() 
{
    if ( $.trim($("#nama_jurusan").val()) === "" ) {
        alert('Data masih kosong !!!');
    return false;
    }
});

</script>