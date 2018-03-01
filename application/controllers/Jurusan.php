<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
            redirect(base_url());
        }

        if($this->session->level != 1) {
            redirect(base_url('welcome'));
        }
		$this->load->model('m_jurusan');
		$this->load->library('dompdf_gen');
	}

	public function index() {
		$data_jurusan = $this->m_jurusan->lihat_data_jurusan();

		$this->load->view('template/template', array("isi" => "Jurusan/tampil_data" , "data"=> array("data_jurusan" => $data_jurusan)));
	
	}
	function hapus($id_jurusan){
		$this->m_jurusan->hapus_data($id_jurusan);

		//log
		 helper_log("hapus", "User melakukan penghapusan data jurusan");
		redirect(base_url('jurusan'));
	}
	function tambah(){

		$this ->load->view('template/template',array("isi" => "Jurusan/tambah_data"));
	}

		function tambah_data(){
		$id_jurusan =$this->input->post('id_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');

		$this->m_jurusan->tambah_data($id_jurusan, $nama_jurusan);
 		
 		//log
 		 helper_log("add", "User melakukan Penambahan data Jurusan");
		redirect(base_url('jurusan'));
	}
	function edit($id_jurusan=null){
		$edit_jurusan = $this->m_jurusan->ambil_data($id_jurusan);

		$this->load->view('template/template',array("isi" => "Jurusan/ubah_data", "data_jurusan" => $edit_jurusan));

	}

	function update_data(){
		$nama_jurusan = $this->input->post('nama_jurusan');
		$id_jurusan = $this->input->post('id_jurusan');
		
		//log
 		 helper_log("edit", "User melakukan edit data jurusan");
		$this->m_jurusan->ubah_data($id_jurusan,$nama_jurusan);
		redirect(base_url('jurusan'));

	}

	function export_pdf(){
		$data_jurusan= $this->m_jurusan->cetakpdf();
		$this->load->view('jurusan/pdf_jurusan',array("data_jurusan"=> $data_jurusan));
		
		$paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data_jurusan.pdf", array('Attachment'=>0)); 
}
	function export_excel(){
		$data_jurusan=$this->m_jurusan->excel();
		$this->load->view('jurusan/excel_jurusan',array("data_jurusan"=>$data_jurusan));
	}
}
