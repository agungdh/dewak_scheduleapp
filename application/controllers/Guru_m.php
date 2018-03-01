<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_m extends CI_Controller {

	function __construct(){
		parent::__construct();
		 if ($this->session->login != true) {
            redirect(base_url());
        }

        if($this->session->level != 2) {
            redirect(base_url('welcome'));
        }
		$this->load->model('m_guru_m');
	}

	public function index() {
		$data_guru = $this->m_guru_m->lihat_jadwal();

		$this->load->view("template/template", array("isi"=>"Guru/data_guru", "data_guru"=>$data_guru));
	
	}

	function edit_kehadiran($id_jadwal=null){
		$edit_jadwal = $this->m_guru_m->ambil_data($id_jadwal);

		$this->load->view('template/template',array("isi" => "Guru/ubah_data_hadir", "data_jadwal" => $edit_jadwal));

	}

	function update_data_hadir(){
		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$id_jadwal = $this->input->post('id_jadwal');

		$this ->m_guru_m->update_data_hadir($id_jadwal,$status,$keterangan);

		//log
		helper_log("edit", "User guru Melakukan edit data kehadiran");
		redirect (base_url('guru_m'));

	}
	
}