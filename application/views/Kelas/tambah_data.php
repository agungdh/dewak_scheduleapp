<?php
if ($this->input->get('foto_kosong') == 1) {
  ?>
  <script type="text/javascript">
    alert('Foto KOSONG !!!');
  </script>
  <?php
}
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH DATA KELAS</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('Kelas/tambah_data'); ?>" enctype="multipart/form-data" >
    <div class="box-body">

    <div class="form-group">
      <label for="Nama_kelas">NAMA KELAS</label>
          <input type="text" class="form-control" id="Nama_kelas" placeholder="Masukkan Kelas" name="Nama_kelas">          
    </div>

      <div class="form-group">
      <label for="id_jurusan">JURUSAN</label>
      <select name ="id_jurusan" type="text" class="form-control">
      <option><P>Pilih Jurusan</P></option>
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
    if ($.trim($("#Nama_kelas").val()) === "" || $.trim($("#id_jurusan").val()) === "Tidak ada berkas  dipilih ") {
        alert('Data masih kosong !!!');
    return false;
    }
});

</script>