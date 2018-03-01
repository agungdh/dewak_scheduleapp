

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH STATUS KEHADIRAN</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('guru_m/update_data_hadir'); ?>" enctype="multipart/form-data">
    <div class="box-body">

    <div class="form-group">
       <input type="hidden" class="form-control" id="id_jadwal" placeholder="" name="id_jadwal" value="<?php echo $data_jadwal->id_jadwal; ?>" >     
    </div>

    <div class="form-group">
      <label for="status">Status Kehadiran</label>
         <select name="status" id="status" class="form-control" >
              <option> <?php echo $data_jadwal->status; ?>  </option>
              <option>Hadir</option>
              <option>Tidak Hadir</option>
              
         </select>
     </div>

    <div class="form-group">
      <label for="keterangan">Keterangan</label>
          <input type="text" class="form-control" id="keterangan" placeholder="" name="keterangan" value="<?php echo $data_jadwal->keterangan; ?>" >          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->


