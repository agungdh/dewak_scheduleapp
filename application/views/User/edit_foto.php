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
    <h4><strong><font color=blue>UBAH FOTO</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('profil/ubah_foto'); ?>" enctype="multipart/form-data">
    <div class="box-body">

      <input type="hidden" name="idusers" id="idusers" value="<?php echo $this->session->idusers; ?>">
     <input type="hidden" name="nama" id="nama" value="<?php echo $edit['nama']; ?>"> 


 <article class="content-box">
     <label for="foto">Foto</label>
        <div class="">
            <div class="col-5">
               <figure class="img-box"> <a href="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" class="lightbox-image" data-gal="prettyPhoto[2] "> <img src="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" alt="" width="140" height="140"> </a> </figure>
          </div>
     </article>

    <div class="form-group">
      <label for="nama">Ubah Foto</label>
          <input type="file" name="foto">          
    </div

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('profil'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
