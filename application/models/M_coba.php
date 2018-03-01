<?php
class M_coba extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_data() {
		$sql = "SELECT * FROM hp";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}

	function add_data($nama,$no_tlp,$alamat)
	{
		$sql ="INSERT INTO HP SET nama= ?,
		no_tlp=?,
		alamat=?";
		 $this->db->query($sql,array($nama,$no_tlp,$alamat));
	}
	function delete_data($id){

		$sql ="DELETE FROM HP
		WHERE id = ?";
		 $this->db->query($sql,array($id));
	}

	function ambil_data_edit($id){

		$sql = "SELECT * FROM hp where id=?";
		$query = $this->db->query($sql, array($id));
		$row = $query->row();

		return $row;
	}

	function update_data($id, $nama, $no_tlp, $alamat){
		$sql = "UPDATE HP SET nama = ?,
		no_tlp = ?,
		alamat = ?
		WHERE id = ?";
			
	
	}

	
}
?>