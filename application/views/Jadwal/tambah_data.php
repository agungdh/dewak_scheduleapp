
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH DATA JADWAL</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('jadwal/tambah_data'); ?>" enctype="multipart/form-data" >
    <div class="box-body">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
             <label for="hari">Hari</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <select name="hari" id="hari" class="form-control" >
                      <option value=""> PILIH HARI  </option>
                      <option value="Monday">Senin</option>
                      <option value="Tuesday">Selasa</option>
                      <option value="Wednesday">Rabu</option>
                      <option value="Thursday">Kamis</option>
                      <option value="Friday">Jumat</option>
                      <option value="Saturday">Sabtu</option>
                      <option value="Sunday">Minggu</option>
              
                  </select>

                </div>
                <!-- /.input group -->
           </div>
         <div class="form-group">
            <label for="id_waktu"> Masukan Jam Pelajaran</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                    <select name ="id_waktu" id="id_waktu" type="text" class="form-control">
                      <option value=""><P>PILIH JAM PELAJARAN KE-</P></option>
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
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                    <select name ="NIP" id="NIP" type="text" class="form-control">
                      <option value=""><P>PILIH GURU</P></option>
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
                <!-- /.input group -->
           </div>

          </div>

        <div class="col-md-6">
          
           <div class="form-group">
              <label for="id_mapel"> Mata Pelajaran</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                    <select name ="id_mapel" id="id_mapel" type="text" class="form-control">
                      <option value=""><P>PILIH MATA PELEJARAN</P></option>
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
                <!-- /.input group -->
           </div>

            <div class="form-group">
              <label for="id_kelas"> Nama Kelas</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <select name ="id_kelas" id="id_kelas" type="text" class="form-control">
                      <option value=""><P>PILIH NAMA KELAS</P></option>
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
                <!-- /.input group -->
           </div>
        </div>

    </div>

    
    <div class="form-group">
      
          <input type="hidden" class="form-control" id="status" value="Hadir" name="status" >          
    </div>

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#hari").val()) === "" || $.trim($("#id_waktu").val()) === "" || $.trim($("#NIP").val()) === "" || $.trim($("#id_mapel").val()) === "" || $.trim($("#id_kelas").val()) === "" ) {
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