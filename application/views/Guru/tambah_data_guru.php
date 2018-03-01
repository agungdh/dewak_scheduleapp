<?php
if ($this->input->get('foto_kosong') == 1) {
  ?>
  <script type="text/javascript">
    alert('Gagal Menyimpan. Foto KOSONG !!!');
  </script>
  <?php
}
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH DATA GURU</font></strong></h4>

    <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('Guru/tambah_data'); ?>" enctype="multipart/form-data" >
    <div class="box-body">
       <div class="row">
        <div class="col-md-6">
          <div class="form-group">
             <label>NIP*</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" id="NIP"  value="" class="form-control " placeholder="NIP " minlength="18" maxlength="18" name="NIP" onkeypress=" return hanyaangka(event)" required="required" >
                </div>
                <!-- /.input group -->
           </div>
           <div class="form-group">
             <label for="Nama">Nama</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                     <input type="text" id="Nama" name="Nama" value="" class="form-control " placeholder="Masukan Nama Anda " required="required" >
                </div>
                <!-- /.input group -->
              </div>
          </div>

        <div class="col-md-6">
          <div class="form-group">
             <label for="No_hp" >No Hp</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" id="No_hp" placeholder="Isi No Handpone (08xxxxxxxxxx)" minlength="10" maxlength="13" name="No_hp" required="required"> 
                </div>
                <!-- /.input group -->
           </div>
           <div class="form-group">
             <label for="foto">Foto</label>
                <div class="input-group">
                  
                     <input type="file" id="foto" name="foto"   >
                </div>
                <!-- /.input group -->
              </div>
          </div>

    </div>

  </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-primary" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('guru'); ?>" class="btn btn-danger">Batal</a>
    </div>
  </form>
</div>
</div><!-- /.box -->

<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#NIP").val()) === "" || $.trim($("#Nama").val()) === "" || $.trim($("#No_hp").val()) === "" || $.trim($("#foto").val()) === "No file selected. ") {
        alert('Data masih kosong !!!');
    return false;
    }
});

function hanyaangka(evt){

var charCode = (evt.which) ? evt.which : event.KeyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
  return false;
  return true;

}
</script>