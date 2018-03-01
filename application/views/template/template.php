<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <?php $this->load->view('template/meta'); ?>
  </head>


  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php $this->load->view('template/logo'); ?>


        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <?php if($this->session->login == true) { ?>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">
					  <?php 
						//echo 'Hi: ' . $_SESSION['namauser']; 
            echo " " . $this->session->nama . " !!!";
					  ?>
				  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" class="img-circle" alt="User Image">
                    <p>
                      <b><?php echo $this->session->nama; //echo $_SESSION['user_login']; ?></b>
                      <small><?php echo " Username :". $this->session->username; //echo $_SESSION['namauser']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a class="btn btn-info" href="<?php echo base_url("profil") ?>"> <i class="fa fa-user"></i> Profile</a>
                    </div>
                    <div class="pull-right">
                      <a class="btn btn-danger" href="<?php echo base_url("logout") ?>"> <i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>

              </li>
                <?php } else { ?>
                <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="<?php echo base_url("login"); ?>" class="dropdown-toggle">
                  
            <?php 
            echo "Login Here";
            ?>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo base_url('berkas/user/'.$this->session->idusers.'.jpg'); ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->nama; //echo $_SESSION['user_login']; ?>
                      <small><?php echo $this->session->username; //echo $_SESSION['namauser']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url("profil") ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url("logout") ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>

              </li>
                <?php } ?>

            </ul>
          </div>
        </nav>
      </header>
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- search form (Optional) -->
          <!--
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          -->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
			   <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      
    <?php

     if ($this->session->level == 1 ){
      $this->load->view('template/menu_utama'); 
    //helper_log("logins", "User Login");

    }
    
    if ($this->session->level == 2 ) {
      $this->load->view('template/menu_guru'); 
    } 

    ?>
      
    </ul><!-- /.sidebar-menu -->

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          <h1>
            Aplikasi Schedule CAS
            <small><marquee scrolldelay=250><?php echo date('l, d F Y');?></marquee></small>
          </h1>
<!--           
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Here</li>
          </ol>
 -->
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <?php $this->load->view('template/ok'); ?>
          <?php $this->load->view('template/error'); ?>

					<?php isset($data) ?  $this->load->view($isi,$data) : $this->load->view($isi); ?>

        </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
    <?php $this->load->view('template/foot'); ?>

    <!-- REQUIRED JS SCRIPTS -->


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
