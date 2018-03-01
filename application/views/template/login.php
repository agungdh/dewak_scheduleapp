<?php
if ($this->input->get('valid') == '0') {
  ?>
    <script type="text/javascript">
      alert("Password salah");
    </script>
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
 <?php $this->load->view('template/metalogin'); ?>
        

</head>

<body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="">
                    
                </a>
                <span class="right">
                   
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header><br><br>
                <h1>LOGIN<span><br>Aplikasi Pendistribusian Raskin </span></h1>
        <b><i><font color="black" size="5">Desa Pandan Surat Kecamatan Sukoharjo Kabupaten Pringsewu Berbasis Web</font></i></b>
        <nav class="codrops-demos">
        </nav>
            </header>
            <section>       
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form role="form" method="post" name="Formlogin" id="Formlogin" action="<?php echo base_url('login'); ?>">
                                <h3>Masukan Username &amp; Password</h3> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > USERNAME </label>
                                    <input id="username" name="username" required="" type="text" placeholder="username"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">PASSWORD</label>
                                    <input id="password" name="password" required="" type="password" placeholder="password" /> 
                                </p><br>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
                                </p>
                            </form>
                        </div>
                        </div>
            
                    </div>
                </div>  
            </section>
        </div>
    </body>

</html>