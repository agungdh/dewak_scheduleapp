<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Aplikasi Shecudule CAS</title>
  
  
      <link rel="stylesheet" href=" <?php echo base_url() . "assets/"; ?>css/style.css">
<link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>ikon.jpg" type="image/vnd.microsoft.icon">
  
</head>

<body>
<center><a href=" <?php echo base_url('welcome') ?>"><img src="<?php echo base_url() . "assets/"; ?>logo.png" style="height: 150px; width: 300px; margin-right: 5px;"></a></center>
  <h1><span class="blue"></span><b>JADWAL<b><span class="blue"></span> <span class="yellow"><b>SMK CAS<b></span></h1>
<h2><B><i>Rajabasa Bandar Lampung</i></B></h2>
<table class="container">
	<thead>
		<tr>
						<th>Jam Awal</th>
						<th>Jam Akhir</th>
						<?php
						if ($data_jadwal_perhari != null) {
							foreach ($data_jadwal_perhari as $item) {
								?>
								<th><?php echo $item->nama_kelas; ?></th>
								<?php
							}
						}
						?>
					</tr>
	</thead>
	<tbody>
		
			<?php
			if ($data_jadwal_perhari != null) {
				?>
				<tr>
				<td><?php echo $data_jadwal_perhari[0]->jam_awal; ?></td>
					<td><?php echo $data_jadwal_perhari[0]->jam_akhir; ?></td>
					<?php
					foreach ($data_jadwal_perhari as $item) {
						?>
						
						<?php 
				            $stat = $item->status; 
				            if ($stat ==='Hadir') {
				              echo "<td>". $item->Mata_pelajaran."</b></td></font>"; 
				            }
				            else{
				                echo "<td bgcolor='red'><b><font color='black'>". $item->Mata_pelajaran."</b></td></font>";
				            }

             			?>
						<!-- <td><?php echo $item->Mata_pelajaran; ?></td> -->
						<?php
					}
					?>
		</tr>
				<?php
			}
			?>
					
	</tbody>
</table>
  
  

</body>

</html>


