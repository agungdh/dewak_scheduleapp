<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_log extends CI_Model {
 	function __construct(){
		parent::__construct();		
	}
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tabel_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    function lihat_data() {
		$sql = "SELECT count(*) as jumlah FROM tabel_log";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}

}