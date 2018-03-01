<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keterangan extends CI_Controller {

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
            redirect(base_url());
        }

        if($this->session->level != 1) {
            redirect(base_url('welcome'));
        }
		$this->load->model('m_keterangan');
	}

	function index(){

	$data_keterangan = $this->m_keterangan->lihat_data();

	$this->load->view('template/template', array("isi" => "Keterangan/tampil_data" , "data"=> array("data_keterangan" => $data_keterangan)));

	}
}
