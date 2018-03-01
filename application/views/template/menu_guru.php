	
<aside class="main-sidebar">
		   <section class="sidebar">
     
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->nama;?></p>
          <a href="profil"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
			<ul class="sidebar-menu">
			<li class="header">MENU GURU</li>
			
			<li><a href="<?php echo base_url('welcome'); ?>"><i class="fa fa-home text-aqua"></i><span>Beranda</span></a></li>

			<li><a href="<?php echo base_url('guru_m'); ?>"><i class="fa fa-table text-aqua"></i><span>Kehadiran Guru</span></a></li>

			
				
       		</ul>
       	</section>
       </aside>
