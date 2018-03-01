
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH DATA MATA PELAJARAN</font></strong></h4>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('mapel/tambah_data'); ?>" enctype="multipart/form-data" >
    <div class="box-body">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="id_mapel">ID Mata Pelajaran</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" class="form-control" id="id_mapel" placeholder="Isi id mapel"  name="id_mapel" required="required" >  
                </div>
                <!-- /.input group -->
           </div>
           <div class="form-group">
             <label for="Mata_pelajaran">Mata pelajaran</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                       <input type="text" class="form-control" id="Mata_pelajaran" placeholder="Isi Mata pelajaran" name="Mata_pelajaran" required="required">
                </div>
                <!-- /.input group -->
              </div>
          </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="lama_mapel">Lama Mata Pelajaran</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control" id="lama_mapel" maxlength="2" placeholder="Isi Lama Mata pelajaran" name="lama_mapel" required="required">
                </div>
                <!-- /.input group -->
           </div>
           <div class="form-group">
              <label for="Tahun_ajar">Tahun Ajaran</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control" id="Tahun_ajar" placeholder="Isi Tahun Ajaran (yyyy/yyyy)" name="Tahun_ajar" required="required">  
                </div>
                <!-- /.input group -->
           </div>
        </div>

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
    if ($.trim($("#id_mapel").val()) === "" || $.trim($("#Mata_pelajaran").val()) === "" || $.trim($("#lama_mapel").val()) === "" || $.trim($("#Tahun_ajar").val()) === "") {
        alert('Data masih kosong !!!');
    return false;
    }
});

</script>