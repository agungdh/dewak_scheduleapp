<?php
class M_profil extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_data_profil() {
		$sql = "SELECT * from tb_user WHERE idusers=?";
		$query = $this->db->query($sql, array($this->session->idusers));
		$row = $query->row();
		
		$data_user = array('nama' => $row->nama,
		'username' => $row->username);

		return $data_user;
	}

	function ubah_profil(){
		$idusers = $this->input->post('idusers');
		$nama = $this->input->post('nama');
		$sql = "UPDATE tb_user SET nama=?
		WHERE idusers=?";
		$query = $this->db->query($sql, array($nama, $idusers));	
		return $nama;
	}

	function ubah_password($password,$idusers) {

		$sql = "call ep_ubah_pass(?,?); ";
		$query = $this->db->query($sql, array($idusers,$password));
	}
}