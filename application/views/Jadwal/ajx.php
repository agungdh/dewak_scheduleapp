<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Aplikasi Shecudule CAS</title>
  
  
      <link rel="stylesheet" href=" <?php echo base_url() . "assets/"; ?>css/style.css">
<link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>ikon.jpg" type="image/vnd.microsoft.icon">
<script type="text/javascript" src="<?php echo base_url('assets/jquery-3.3.1.min.js'); ?>"></script>
  
</head>

<body>
<center><a href=" <?php echo base_url('welcome') ?>"><img src="<?php echo base_url() . "assets/"; ?>logo.png" style="height: 150px; width: 300px; margin-right: 5px;"></a></center>
  <h1><span class="blue"></span><b>JADWAL<b><span class="blue"></span> <span class="yellow"><b>SMK CAS<b></span></h1>
<h2><B><i>Rajabasa Bandar Lampung</i></B></h2>
<div id="dewaganteng12345678910tapiboong">
	
</div>  
  

</body>

</html>

<script type="text/javascript">
function ambil_data() {
	$.post('<?php echo base_url("web/ajx"); ?>',
		{
			
		},
		function(data,status)
		{
			$("#dewaganteng12345678910tapiboong").html(data);
		}
	);
}
</script>
