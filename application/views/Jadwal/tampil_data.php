
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
    <h4><strong><font color=blue> Guru Hadir</font></strong></h4>
     <a href='<?php echo base_url("jadwal/excel_hadir/"); ?>'><button style="margin-left: 10px " class="btn btn-success pull-right"><i class="fa fa-file-excel-o  "></i> Export Excel</button></a>
    <a href='<?php echo base_url("jadwal/pdf_hadir/"); ?>'><button class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o  "></i> Export PDF</button></a> 
    <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="colapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
 
  </div><!-- /.box-header -->
 
    <div class="box-body">

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
         
        <th>Nama Guru</th>
        <th>Hari</th>
        <th>Mata Pelajaran</th>
        <th>Kelas</th> 
        <th>Lama Ngajar</th>
        <th>Status</th>  
        <th>Keterangan</th>
        <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php 
        foreach ($data_jadwalH as $items) {
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
           
            <td><?php echo $items->Nama; ?></td>
             <td><?php echo $hari; ?></td>
            <td><?php echo $items->Mata_pelajaran;?></td>
            <td><?php echo $items->nama_kelas?></td>
            <td><?php echo $items->lama_mapel." Jam";?></td>
            <td><?php echo $items->status;?></td>
             <td><?php echo $items->keterangan;?></td>
            <td><a class="btn btn-info btn-xs" href="<?php echo base_url('jadwal/edit_kehadiran/'.$items->id_jadwal); ?>"><i class="fa fa-pencil"></i> Edit Kehadiran</a> 
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

<div class="box box-danger">
  <div class="box-header with-border">
    <h4><strong><font color=blue> Guru Tidak Hadir</font></strong></h4>
  <a href='<?php echo base_url("jadwal/excel_tidakhadir/"); ?>'><button style="margin-left: 10px " class="btn btn-success pull-right"><i class="fa fa-file-excel-o  "></i> Export Excel</button></a>
  <a href='<?php echo base_url("jadwal/pdf_tidakhadir/"); ?>'><button class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o  "></i> Export PDF</button></a> 
    <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
    
  </div><!-- /.box-header -->
 
    <div class="box-body">

    <table id="lookup1" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
         
        <th>Nama Guru</th>
        <th>Hari</th>
        <th>Mata Pelajaran</th>
        <th>Kelas</th> 
        <th>Lama Ngajar</th>
        <th>Status</th>  
        <th>Keterangan</th>
        <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php 
        foreach ($data_jadwalT as $itemss) {
          ?>
          <?php
            $day = $itemss->hari;;
            switch ($day) {
            case 'Sunday' : $harik = "Minggu"; break;
            case 'Monday' : $harik = "Senin"; break;
            case 'Tuesday' : $harik = "Selasa"; break;
            case 'Wednesday' : $harik = "Rabu"; break;
            case 'Thursday' : $harik = "Kamis"; break;
            case 'Friday' : $harik = "Jum'at"; break;
            case 'Saturday' : $harik = "Sabtu"; break;
            default : $harik = "";
            }
            ?>
          <tr>
           
            <td><?php echo $itemss->Nama; ?></td>
             <td><?php echo $harik; ?></td>
            <td><?php echo $itemss->Mata_pelajaran;?></td>
            <td><?php echo $itemss->nama_kelas?></td>
            <td><?php echo $itemss->lama_mapel." Jam";?></td>
            <td><?php echo $itemss->status;?></td>
            <td><?php echo $itemss->keterangan;?></td>
            <td><a class="btn btn-info btn-xs" href="<?php echo base_url('jadwal/edit_kehadiran/'.$itemss->id_jadwal); ?>"><i class="fa fa-pencil"></i> Edit Kehadiran</a> 
          </td> 
          </tr>
          <?php
        }
      ?>

      </tbody>
      
    </table>
  </div><!-- /.boxbody -->

</div><!-- /.box -->