<?php
class M_mapel extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_data_mapel() {
		$sql = "SELECT * FROM tb_mapel";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}

	function ambil_data($id_mapel){
		$sql = "SELECT * from tb_mapel WHERE id_mapel=?";
		$query = $this->db->query($sql,array($id_mapel));
		$row = $query->row();
		return $row;	
	}

	function ubah_data($Mata_pelajaran,$lama_mapel,$Tahun_ajar,$id_mapel){
		$sql = "call ep_mapel(?,?,?,?);";
		$query =$this->db->query($sql,array($Mata_pelajaran,$lama_mapel,$Tahun_ajar,$id_mapel));
	}

	function hapus_data($id_mapel){
		$sql =" call dp_mapel(?);";
		$query = $this->db->query($sql,array($id_mapel));
	}

	function tambah_data($id_mapel,$Mata_pelajaran,$lama_mapel,$Tahun_ajar){
		$sql ="call p_mapel(?,?,?,?);";
		$query = $this->db->query($sql,array($id_mapel,$Mata_pelajaran,$lama_mapel,$Tahun_ajar));
	}

	function cetakpdf() {
	$sql = "SELECT * FROM tb_mapel";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
		function excel() {
		$sql = "SELECT * FROM tb_mapel";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
}

