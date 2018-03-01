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
    <h4><strong><font color=blue>UBAH DATA GURU</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('guru/update_data'); ?>" enctype="multipart/form-data">
    <div class="box-body">

      <input type="hidden" name="NIP" id="NIP" value="<?php echo $data_guru->NIP; ?>">


    <div class="form-group">
      <label for="Nama">Nama</label>
          <input type="text" class="form-control" id="Nama" placeholder="Isi Nama" name="Nama" value="<?php echo $data_guru->Nama; ?>" >          
    </div>

  <div class="form-group">
      <label for="No_hp">No HP</label>
          <input type="text" class="form-control" id="No_hp" placeholder="Isi Nama" name="No_hp" value="<?php echo $data_guru->No_hp; ?>" >          
    </div>


 <article class="content-box">
     <label for="foto">Foto</label>
        <div class="">
            <div class="col-5">
               <figure class="img-box"> <a href="<?php echo base_url('berkas/guru/'.$data_guru->NIP.'.jpg'); ?>" class="lightbox-image" data-gal="prettyPhoto[2] "> <img src="<?php echo base_url('berkas/guru/'.$data_guru->NIP.'.jpg'); ?>" alt="" width="140" height="140"> </a> </figure>
          </div>
     </article>
 <a class="btn btn-info btn-xs" href="<?php echo base_url('guru/edit_foto/'.$data_guru->NIP); ?>"> <i class="fa fa-pencil"></i> ubah foto</a>
    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('guru'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->


<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#NIP").val()) === "" || $.trim($("#Nama").val()) === "" || $.trim($("#No_hp").val()) === "" ) {
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