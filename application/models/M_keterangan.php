<?php
class M_keterangan extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_data() {
		$sql = "SELECT * FROM jadwal_guru_ngajar";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}
}