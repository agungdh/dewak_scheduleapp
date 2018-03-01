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
    <h4><strong><font color=blue>UBAH DATA MAPEL</font></strong></h4>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('mapel/update_data'); ?>" enctype="multipart/form-data">
    <div class="box-body">

      <input type="hidden" name="id_mapel" id="id_mapel" value="<?php echo $data_mapel->id_mapel; ?>">


    <div class="form-group">
      <label for="Mata_pelajaran">Mata pelajaran</label>
          <input type="text" class="form-control" id="Mata_pelajaran" placeholder="Isi Mata_pelajaran" name="Mata_pelajaran" value="<?php echo $data_mapel->Mata_pelajaran; ?>" >          
    </div>

    <div class="form-group">
      <label for="lama_mapel">Lama Mapel</label>
          <input type="text" class="form-control" id="lama_mapel" placeholder="Isi lama mapel" name="lama_mapel" value="<?php echo $data_mapel->lama_mapel; ?>" >          
    </div>

    <div class="form-group">
      <label for="Tahun_ajar">Tahun Ajaran</label>
          <input type="text" class="form-control" id="Tahun_ajar" placeholder="Isi Tahuan Ajaran (YYYY/YYYY)" name="Tahun_ajar" value="<?php echo $data_mapel->Tahun_ajar; ?>" >          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('mapel'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->


<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#id_mapel").val()) === "" || $.trim($("#Mata_pelajaran").val()) === "" || $.trim($("#lama_mapel").val()) === "" $.trim($("#Tahun_ajar").val()) === "" ) {
        alert('Data masih kosong !!!');
    return false;
    }
});

</script>