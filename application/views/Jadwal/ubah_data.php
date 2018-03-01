

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH DATA JADWAL</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('jadwal/update_data'); ?>" enctype="multipart/form-data">
    <div class="box-body">

    <div class="form-group">
       <input type="hidden" class="form-control" id="id_jadwal" placeholder="" name="id_jadwal" value="<?php echo $data_jadwal->id_jadwal; ?>" >     
    </div>

    <div class="form-group">
      <label for="hari">Hari</label>
         <select name="hari" id="hari" class="form-control" >
              <option> <?php echo $data_jadwal->hari; ?>  </option>
              <option value="Monday">Senin</option>
              <option value="Tuesday">Selasa</option>
              <option value="Wednesday">Rabu</option>
              <option value="Thursday">Kamis</option>
              <option value="Friday">Jumat</option>
              <option value="Saturday">Sabtu</option>
              <option value="Sunday">Minggu</option>
              
         </select>
     </div>

       <div class="form-group">
            <label for="id_waktu"> Masukan Jam Pelajaran</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                    <select name ="id_waktu" id="id_waktu" type="text" class="form-control">
                      <option value="<?php echo $data_jadwal->id_waktu; ?>"><P><?php echo 'Jam ke-' .$data_jadwal->jam_ke.'('.$data_jadwal->jam_awal.' - '.$data_jadwal->jam_akhir.')'; ?></P></option>
                        <?php
                          mysql_connect("localhost", "root","");
                          mysql_select_db("jadwal_cas");
                          $sql =mysql_query("SELECT * FROM tb_waktu order by jam_ke ASC");
                          if (mysql_num_rows($sql) !=0){
                            while ($data = mysql_fetch_assoc($sql)) {
                              echo '<option value='.$data["id_waktu"].'>'.'Jam Ke -'.$data["jam_ke"].'('.$data["jam_awal"].' - '.$data["jam_akhir"].')'.'</option>';
                            }
                          }
                        ?> 
      </select> 
                </div>
                <!-- /.input group -->
           </div>

    <div class="form-group">
      <label for="NIP"> Guru Mengajar</label>
      <select name ="NIP" id="NIP" type="text" class="form-control">
      <option value="<?php echo $data_jadwal->NIP; ?>"><P><?php echo $data_jadwal->Nama; ?></P></option>
          <?php
      mysql_connect("localhost", "root","");
      mysql_select_db("jadwal_cas");
      $sql =mysql_query("SELECT * FROM tb_guru order by Nama ASC");
      if (mysql_num_rows($sql) !=0){
        while ($data = mysql_fetch_assoc($sql)) {
          
          echo '<option value='.$data["NIP"].'>'.$data["Nama"].'</option>';
        }
      }
      ?> 
      </select>           
    </div>

    <div class="form-group">
      <label for="id_mapel"> Mata Pelajaran</label>
      <select name ="id_mapel" id="id_mapel" type="text" class="form-control">
      <option value="<?php echo $data_jadwal->id_mapel; ?>"><P> <?php echo $data_jadwal->nama_kelas; ?></P></option>
          <?php
      mysql_connect("localhost", "root","");
      mysql_select_db("jadwal_cas");
      $sql =mysql_query("SELECT * FROM tb_mapel order by Mata_pelajaran ASC");
      if (mysql_num_rows($sql) !=0){
        while ($data = mysql_fetch_assoc($sql)) {
         echo '<option value='.$data["id_mapel"].'>'.$data["Mata_pelajaran"].'</option>';
        }
      }
      ?> 
      </select>           
    </div>

   <div class="form-group">
      <label for="id_kelas"> Nama Kelas</label>
      <select name ="id_kelas" id="id_kelas" type="text" class="form-control">
      <option value="<?php echo $data_jadwal->id_kelas; ?>"><P> <?php echo $data_jadwal->nama_kelas; ?></P></option>
          <?php
      mysql_connect("localhost", "root","");
      mysql_select_db("jadwal_cas");
      $sql =mysql_query("SELECT * FROM tb_kelas order by id_kelas ASC");
      if (mysql_num_rows($sql) !=0){
        while ($data = mysql_fetch_assoc($sql)) {
         echo '<option value='.$data["id_kelas"].'>'.$data["Nama_kelas"].'</option>';
        }
      }
      ?> 
      </select>           
    </div>


    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->


