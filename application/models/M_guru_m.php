<?php
class M_guru_m extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}
	
	function lihat_jadwal() {
		
		//$tgl=date('l');
		$sql = "SELECT * FROM jadwal_guru_ngajar where NIP=?";
		$query = $this->db->query($sql, array($this->session->username));
		$row = $query->result();

		return $row;
	}

	function ambil_data($id_jadwal){
		$sql = "SELECT * from jadwal_guru_ngajar WHERE id_jadwal=?";
		$query = $this->db->query($sql,array($id_jadwal));
		$row = $query->row();
		return $row;	
	}

	function update_data_hadir($id_jadwal,$status,$keterangan){
		$sql = "call ep_kehadiran(?,?,?);";
		$query = $this->db->query($sql,array($id_jadwal,$status,$keterangan));
	}
}