<?php
class M_jadwal extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function lihat_jadwal() {
		$sql = "SELECT * FROM jadwal_guru_ngajar";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}

	function lihat_jadwal_perhari() {
		
		$tgl=date('l');
		$sql = "SELECT * FROM jadwal_guru_ngajar where hari = '$tgl'";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}

	function lihat_jadwalA() {
		$sql = "SELECT * FROM jadwal_guru_ngajar where status='Hadir' ";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}

		function lihat_jadwalB() {
		$sql = "SELECT * FROM jadwal_guru_ngajar where status='Tidak Hadir' ";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
	}


	function tambah_data($id_jadwal,$hari,$id_waktu,$NIP,$id_mapel,$id_kelas,$status){
		$sql = "call p_jadwal(?,?,?,?,?,?,?)" ;
		$query =$this->db->query($sql,array($id_jadwal,$hari,$id_waktu,$NIP,$id_mapel,$id_kelas,$status));

	}

	function ambil_data($id_jadwal){
		$sql = "SELECT * from jadwal_guru_ngajar WHERE id_jadwal=?";
		$query = $this->db->query($sql,array($id_jadwal));
		$row = $query->row();
		return $row;	
	}

	function ambil_data2(){
		$sql = "SELECT * FROM tb_guru_mengajar order by id_guru_mengajar ASC";
		$query = $this->db->query($sql,array());
		$row = $query->row();
		return $row;	
	}


	function ubah_data($hari,$id_waktu,$NIP,$id_mapel,$id_kelas,$id_jadwal){
		$sql = "call ep_jadwal(?,?,?,?,?,?);";
		$query =$this->db->query($sql,array($hari,$id_waktu,$NIP,$id_mapel,$id_kelas,$id_jadwal));
	}

	function hapus_data($id_jadwal){
		$sql =" call dp_jadwal(?);";
		$query = $this->db->query($sql,array($id_jadwal));
	}

	function update_data_hadir($id_jadwal,$status,$keterangan){
		$sql = "call ep_kehadiran(?,?,?);";
		$query = $this->db->query($sql,array($id_jadwal,$status,$keterangan));
	}
	function cetakpdf() {
		$sql = "SELECT * FROM jadwal_guru_ngajar";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
		function excel() {
		$sql = "SELECT * FROM jadwal_guru_ngajar";
		$query = $this->db->query($sql);
		$row = $query->result();
		return $row;
	}
	function pdfhadir() {
		$sql = "SELECT * FROM jadwal_guru_ngajar where status='Hadir' ; ";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
}
	function pdftidakhadir() {
		$sql = "SELECT * FROM jadwal_guru_ngajar where status='Tidak Hadir' ; ";
		$query = $this->db->query($sql);
		$row = $query->result();

		return $row;
}
}