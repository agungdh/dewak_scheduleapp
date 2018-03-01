<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "responsive": true,
          "processing": true,
        } );
      } );

</script>



<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>Jadwal Guru </font></strong></h4>
  <a class="btn btn-info " href="<?php echo base_url('Jadwal/tambah'); ?>"><i class="fa fa-plus"></i> Tambah</a> <a href='<?php echo base_url("jadwal/impor"); ?>'><button class="btn btn-primary"><i class="fa fa-plus"></i> Import Jadwal</button></a>
   <a href='<?php echo base_url("jadwal/export_excel/"); ?>'><button style="margin-left: 10px " class="btn btn-success pull-right"><i class="fa fa-file-excel-o  "></i> Export Excel</button></a>
  <a href='<?php echo base_url("jadwal/export_pdf/"); ?>'><button class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o  "></i> Export PDF</button></a> 
  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
  </div><!-- /.box-header -->
 
    <div class="box-body">

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
         
        <th>NIP</th>
        <th>Nama Guru</th>
        <th>Hari</th>
        <th>Mata Pelajaran</th>
        <th>Kelas</th>
        <th>Lama Ngajar</th>
        <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php 
        foreach ($data_jadwal as $items) {
          ?>

          <?php
            $day = $items->hari;;
            switch ($day) {
            case 'Sunday' : $hari = "Minggu"; break;
            case 'Monday' : $hari = "Senin"; break;
            case 'Tuesday' : $hari = "Selasa"; break;
            case 'Wednesday' : $hari = "Rabu"; break;
            case 'Thursday' : $hari = "Kamis"; break;
            case 'Friday' : $hari = "Jum'at"; break;
            case 'Saturday' : $hari = "Sabtu"; break;
            default : $hari = "";
            }
            ?>
          <tr>
           
            <td><?php echo $items->NIP; ?></td>
            <td><?php echo $items->Nama; ?></td>
             <td><?php echo $hari; ?></td>
            <td><?php echo $items->Mata_pelajaran;?></td>
            <td><?php echo $items->nama_kelas?></td>
            <td><?php echo $items->lama_mapel.' Jam'?></td>

            <td><a class="btn btn-info btn-xs" href="<?php echo base_url('jadwal/detail/'.$items->id_jadwal); ?>"> <i class="fa fa-share"></i> Detail</a> <a class="btn btn-primary btn-xs" href="<?php echo base_url('jadwal/edit/'.$items->id_jadwal); ?>"><i class="fa fa-pencil"></i> Update</a> <a class="btn btn-danger btn-xs" href="<?php echo base_url('jadwal/hapus/'.$items->id_jadwal); ?>" onclick="return confirm('Yakin Ingin Menghapus Data ini ?')" ><i class="fa fa-trash-o"></i> Delete</a> 
          </td> 
          </tr>
          <?php
        }
      ?>

      </tbody>
      
    </table>
  </div><!-- /.boxbody -->

</div><!-- /.box -->


<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
        var dataTable = $('#lookup1').DataTable( {
          "responsive": true,
          "processing": true,
        } );
      } );

</script>


<?php
$day = date ("l");
switch ($day) {
case 'Sunday' : $hari = "Minggu"; break;
case 'Monday' : $hari = "Senin"; break;
case 'Tuesday' : $hari = "Selasa"; break;
case 'Wednesday' : $hari = "Rabu"; break;
case 'Thursday' : $hari = "Kamis"; break;
case 'Friday' : $hari = "Jum'at"; break;
case 'Saturday' : $hari = "Sabtu"; break;
default : $hari = "";
}
?>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>Jadwal Guru pada hari <?php echo $hari; ?>  </font></strong></h4>
  <a class="btn btn-info " href="<?php echo base_url('Jadwal/tambah'); ?>"><i class="fa fa-plus"></i> Tambah</a>
  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
  </div><!-- /.box-header -->
 
    <div class="box-body">

    <table id="lookup1" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
         
        <th>NIP</th>
        <th>Nama Guru</th>
        <th>Hari</th>
        <th>Mata Pelajaran</th>
        <th>Kelas</th>
        <th>Lama Ngajar</th>
        </tr>
      </thead>

      <tbody>
        <?php 
        foreach ($data_jadwal_perhari as $items) {
          ?>
          <tr>
           
            <td><?php echo $items->NIP; ?></td>
            <?php 
            $stat = $items->status; 
            if ($stat ==='Hadir') {
              echo "<td bgcolor='aqua'><b>". $items->Nama."</b></td>"; 
            }
            else{
                echo "<td bgcolor='red'><b>". $items->Nama."</b></td>";
            }

             ?>
             <td><?php echo $hari; ?></td>
            <td><?php echo $items->Mata_pelajaran;?></td>
            <td><?php echo $items->nama_kelas?></td>
            <td><?php echo $items->lama_mapel.' Jam'?></td>

            <td>
          </td> 
          </tr>
          <?php
        }
      ?>

      </tbody>
      
    </table>
  </div><!-- /.boxbody -->

</div><!-- /.box -->