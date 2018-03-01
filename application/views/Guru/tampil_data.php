
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
    <h4><strong><font color=blue>Data Guru</font></strong></h4>
      <a class="btn btn-info " href="<?php echo base_url('guru/tambah'); ?>"><i class="fa fa-plus"></i> Tambah</a> <a href='<?php echo base_url("guru/impor"); ?>'><button class="btn btn-primary"><i class="fa fa-plus"></i> Import Data Guru</button></a>  <a href='<?php echo base_url("guru/export_excel/"); ?>'><button style="margin-left: 10px " class="btn btn-success pull-right"><i class="fa fa-file-excel-o  "></i> Export Excel</button></a>
  <a href='<?php echo base_url("guru/export_pdf/"); ?>'><button class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o  "></i> Export PDF</button></a> 
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
				<th>Nama</th>
				<th>No HP</th>
				<th>Aksi</th>
        </tr>
      </thead>

      <tbody>
      	<?php 
				foreach ($data_guru as $items) {
					?>
					<tr>
						<td><?php echo $items->NIP; ?></td>
						<td><?php echo $items->Nama; ?></td>
						<td><?php echo $items->No_hp; ?></td>
						<td><a class="btn btn-primary btn-xs" href="<?php echo base_url('guru/edit/'.$items->NIP); ?>"><i class="fa fa-pencil"></i> Update</a> <a class="btn btn-danger btn-xs" href="<?php echo base_url('guru/hapus/'.$items->NIP); ?>" onclick="return confirm('Yakin Ingin Menghapus Data ini ?')" ><i class="fa fa-trash-o"></i> Delete</a> 
					</td>
						
					</tr>
					<?php
				}
			?>

      </tbody>
      
    </table>
  </div><!-- /.boxbody -->

</div><!-- /.box -->