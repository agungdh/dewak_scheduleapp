
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

    <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
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
        foreach ($data_guru as $items) {
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
            <td><a class="btn btn-info btn-xs" href="<?php echo base_url('guru_m/edit_kehadiran/'.$items->id_jadwal); ?>"><i class="fa fa-pencil"></i> Edit Kehadiran</a>
          </td> 
          </tr>
          <?php
        }
      ?>

      </tbody>
      
    </table>
  </div><!-- /.boxbody -->

</div><!-- /.box -->
