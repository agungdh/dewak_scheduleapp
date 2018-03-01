<?php
class M_kelas extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_data_kelas() {
		$sql = "SELECT * FROM kelasjur";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}
	function tambah_data($id_kelas,$Nama_kelas,$id_jurusan){
		$sql ="call p_kelas(?,?,?);";
		$query = $this->db->query($sql,array($id_kelas,$Nama_kelas,$id_jurusan));
	}
		function hapus_data($id_kelas){
		$sql =" call dp_kelas(?);";
		$query = $this->db->query($sql,array($id_kelas));
	}
		function ambil_data($id_kelas){
		$sql = "SELECT * from kelasjur WHERE id_kelas=?";
		$query = $this->db->query($sql,array($id_kelas));
		$row = $query->row();
		return $row;	
	}

	function ubah_data($Nama_kelas,$id_jurusan,$id_kelas){
		$sql = "call ep_kelas(?,?,?);";
		$query =$this->db->query($sql,array($Nama_kelas,$id_jurusan,$id_kelas));
	}
	function cetakpdf() {
	$sql = "SELECT * FROM kelasjur";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
		function excel() {
		$sql = "SELECT * FROM kelasjur";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
}