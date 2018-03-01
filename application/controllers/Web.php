  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_web');		
	}

	function index() {
		$this->load->view('jadwal/ajx');
	}

	public function ajx() {

		$data_jadwal_perhari = $this->m_web->lihat_jadwal_perhari();

		$piuw = $data_jadwal_perhari != null ? "index" : "kosong";
		$this->load->view("jadwal/".$piuw,array("data_jadwal_perhari" => $data_jadwal_perhari));	
		
	}


}