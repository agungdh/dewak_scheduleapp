
<aside class="main-sidebar">
		   <section class="sidebar">
     
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->nama;?></p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
		<ul class="sidebar-menu">
			<li class="header">MENU ADMIN</li>
			<!-- <font color="aqua"><marquee scrolldelay=350>Aplikasi Pendistribusian Raskin</marquee></font> -->
			<li><a href="<?php echo base_url('welcome'); ?>"><i class="fa fa-home text-aqua"></i><span>Beranda</span></a></li>

       		 <li><a href="<?php echo base_url('guru'); ?>"><i class="fa fa-table text-aqua"></i><span>Data Guru	</span></a></li>

			<li><a href="<?php echo base_url('mapel'); ?>"><i class="fa fa-table text-aqua"></i><span>Mata Pelajaran</span></a></li>
			
			<li><a href="<?php echo base_url('Kelas'); ?>"><i class="fa fa-table text-aqua"></i><span>Kelas</span></a></li>

			<li><a href="<?php echo base_url('jurusan'); ?>"><i class="fa fa-table text-aqua"></i><span>Jurusan</span></a></li>

			<li><a href="<?php echo base_url('jadwal'); ?>"><i class="fa fa-table text-aqua"></i><span>Jadwal</span></a></li>

			<li><a href="<?php echo base_url('jadwal/kehadiran_guru'); ?>"><i class="fa fa-table text-aqua"></i><span>Kehadiran Guru</span></a></li>

			
			<li><a href="<?php echo base_url('User'); ?>"><i class="fa fa-users text-aqua"></i><span>User</span></a></li>


		</ul>
	</section>
</aside>


			
