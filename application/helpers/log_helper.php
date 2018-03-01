<?php
function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();
 
    if (strtolower($tipe) == "logins"){
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = 1;
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe   = 2;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = 3;
    }
    elseif(strtolower($tipe) == "import"){
        $log_tipe  = 4;
    }
    elseif(strtolower($tipe) == "hapus"){
        $log_tipe  = 5;
    }
    else{
        $log_tipe  = 6;
    }
 

    $ip=$_SERVER['REMOTE_ADDR'];
    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    // paramter
    $param['log_user']      = $CI->session->userdata('username');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;
    $param['log_namapc']    = $hostname; 
    $param['log_ip']        =$ip ;
   

    //load model log
    $CI->load->model('m_log');
 
    //save to database
    $CI->m_log->save_log($param);
 
}