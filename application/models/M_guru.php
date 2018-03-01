<?php
class M_guru extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_data_guru() {
		$sql = "SELECT * FROM tb_guru";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}

	function tambah($NIP,$Nama,$No_hp){

		$sql = "call p_guru(?,?,?);";

		$this->db->query($sql,array($NIP,$Nama,$No_hp));
	}

	function edit_data_guru($Nama,$No_hp,$NIP){

		$sql = "call ep_guru(?,?,?);";

		$this->db->query($sql,array($Nama,$No_hp,$NIP));
	}

	function ambil_data_guru($NIP){
		$sql = "SELECT * FROM tb_guru where NIP=?";
		$query = $this->db->query($sql, array($NIP));
		$row = $query->row();

		return $row;
	}

	// hapus data guru

	function hapus_data_guru($NIP){
		$sql = "call dp_guru(?);";
		$query = $this->db->query($sql,array($NIP));
	}

	function cetakpdf() {
		$sql = "SELECT * FROM tb_guru";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
	function excel() {
		$sql = "SELECT * FROM tb_guru";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
		function tambah_guru($NIP, $Nama, $No_hp){
		$sql = "call p_guru(?,?,?);";
		$query = $this->db->query($sql, array($NIP, $Nama, $No_hp));
	}

}
?>