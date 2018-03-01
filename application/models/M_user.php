<?php
class M_user extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_data_user() {
		$sql = "SELECT * FROM tb_user";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}
	function hapus_data($idusers){
		$sql =" call dp_users(?);";
		$query = $this->db->query($sql,array($idusers));
	}
	function tambah_data($idusers,$nama,$username,$password,$level){
		$sql="call p_user (?,?,?,?,?);";
		$query = $this->db->query($sql,array($idusers,$nama,$username,$password,$level));
	}
	
	function ambil_data($idusers){
	$sql = "SELECT * from tb_user WHERE idusers=?";
		$query = $this->db->query($sql,array($idusers));
		$row = $query->row();
		return $row;
	}
	function ubah_data($nama,$username,$idusers){
		$sql="call ep_user (?,?,?);";
		$query = $this->db->query($sql,array($nama,$username,$idusers));
	}
	function ambil_data_password($idusers){
	$sql = "SELECT * from tb_user WHERE idusers=?";
		$query = $this->db->query($sql,array($idusers));
		$row = $query->row();
		return $row;
	}
	function ubah_password($password,$idusers){
		$sql="call ep_ubah_pass (?,?);";
		$query = $this->db->query($sql,array($password,$idusers));
	}

	function tambah_user($nama, $username, $password){
		$sql = "call p_userguru(?,?,?);";
		$query = $this->db->query($sql, array($nama, $username, $password));
	}
}