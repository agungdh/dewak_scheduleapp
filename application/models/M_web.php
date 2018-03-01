<?php
class M_web extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_jadwal_perhari() {
			
			$tgl=date('l');
			date_default_timezone_set('Asia/Jakarta');
			$jam=date('h:i:s');
			$sql = "SELECT * FROM jadwal_perhari ";
			$query = $this->db->query($sql);
			$row = $query->result();

			return $row;
		}
	}
