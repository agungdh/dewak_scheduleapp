<table class="container">
	<thead>
		<tr>
						<th>Jam Awal</th>
						<th>Jam Akhir</th>
						<?php
						foreach ($data_jadwal_perhari as $item) {
							?>
							<th><?php echo $item->nama_kelas; ?></th>
							<?php
						}
						?>
					</tr>
	</thead>
	<tbody>
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
	</tbody>
</table>