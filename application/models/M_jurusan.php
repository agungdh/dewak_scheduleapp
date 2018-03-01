<?php
class M_Jurusan extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_data_jurusan() {
		$sql = "SELECT * FROM tb_jurusan";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}
	function hapus_data($id_jurusan){
		$sql =" call dp_jurusan(?);";
		$query = $this->db->query($sql,array($id_jurusan));
	}
	function tambah_data($id_jurusan,$nama_jurusan){
		$sql ="call p_jurusan(?,?)";
		$query = $this->db->query($sql, array($id_jurusan,$nama_jurusan));
	}
	function ambil_data($id_jurusan){
		$sql = "SELECT * from tb_jurusan WHERE id_jurusan=?";
		$query = $this->db->query($sql,array($id_jurusan));
		$row = $query->row();
		return $row;	
	}

	function ubah_data($nama_jurusan,$id_jurusan){
		$sql = "call ep_jurusan(?,?);";
		$query =$this->db->query($sql,array($nama_jurusan,$id_jurusan));
	}

	function cetakpdf() {
	$sql = "SELECT * FROM tb_jurusan";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
	function excel() {
	$sql = "SELECT * FROM tb_jurusan";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
}