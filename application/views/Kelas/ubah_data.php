
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH DATA KELAS</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('kelas/update_data'); ?>" enctype="multipart/form-data">
    <div class="box-body">

      <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $data_kelas->id_kelas; ?>">


    <div class="form-group">
      <label for="Nama_kelas">Nama Kelas</label>
          <input type="text" class="form-control" id="Nama_kelas" placeholder="" name="Nama_kelas" value="<?php echo $data_kelas->Nama_kelas; ?>" >          
    </div>


        <div class="form-group">
      <label for="id_jurusan">Nama Jurusan</label>
          <select name ="id_jurusan" type="text" class="form-control">
      <option><?php echo $data_kelas->nama_jurusan; ?></option>
      <?php
      mysql_connect("localhost", "root","");
      mysql_select_db("jadwal_cas");
      $sql =mysql_query("SELECT * FROM tb_jurusan order by id_jurusan ASC");
      if (mysql_num_rows($sql) !=0){
        while ($data = mysql_fetch_assoc($sql)) {
          echo '<option value='.$data["id_jurusan"].'>'.$data['nama_jurusan'].'</option>';
        }
      }
      ?> 
      </select>           
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('kelas'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->


<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#id_kelas").val()) === "" || $.trim($("#Nama_kelas").val()) === "" || $.trim($("#Tipe_kelas").val()) === "" $.trim($("#id_jurusan").val()) === "" ) {
        alert('Data masih kosong !!!');
    return false;
    }
});

</script>