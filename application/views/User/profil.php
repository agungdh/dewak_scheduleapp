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
      <h4><strong><font color=blue>PROFIL</font></strong></h4>
    </div><!-- /.box-header -->
    <!-- form start -->
      <div class="box-body">

    <form role="form" method="post" action="<?php echo base_url('profil/ubah_profil') ?>" name="form" id="form">
                  <!-- text input -->
                  <input type="hidden" name="idusers" value="<?php echo $this->session->idusers; ?>">

                      <div class="form-group">
                        <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Isi nama" name="nama" value="<?php echo $data['nama']; ?>">          
                      </div>

                      <div class="form-group">
                        <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Isi Username" disabled name="username" value="<?php echo $data['username']; ?>">          
                      </div>

              <article class="content-box">
                   <label for="foto">Foto</label>
                      <div class="">
                          <div class="col-5">
                             <figure class="img-box"> <a href="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" class="lightbox-image" data-gal="prettyPhoto[2] "> <img src="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" alt="" width="140" height="140"> </a> </figure>
                        </div>
               </article>

               <a class="btn btn-info btn-xs" href="<?php echo base_url('profil/edit_foto/'.$this->session->idusers); ?>"> <i class="fa fa-pencil"></i> ubah foto</a>

                  <div class="form-group">
                    <label><a href="<?php echo base_url('profil/ganti_password'); ?>">Ganti Password</a></label>
                  </div>                  

        <input class="btn btn-primary" type="submit" name="proses" value="Ubah">
        <a href="<?php echo base_url(); ?>" class="btn btn-primary" name="kembali" >Kembali</a>
    </form>
    </div><!-- /.boxbody -->
  </div><!-- /.box -->

  <script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#nama").val()) === "") {
        alert('Data masih kosong !!!');
    return false;
    }
});

</script>