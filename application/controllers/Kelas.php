<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
            redirect(base_url());
        }

        if($this->session->level != 1) {
            redirect(base_url('welcome'));
        }
		$this->load->model('m_kelas');
		$this->load->library('dompdf_gen');
	}

	public function index() {
		$data_kelas = $this->m_kelas->lihat_data_kelas();

		$this->load->view('template/template', array("isi" => "Kelas/tampil_data" , "data"=> array("data_kelas" => $data_kelas)));
	
	}

	function tambah(){

		$this ->load->view('template/template',array("isi" => "Kelas/tambah_data"));
	}

		function tambah_data(){
		$id_kelas =$this->input->post('id_kelas');
		$Nama_kelas = $this->input->post('Nama_kelas');
		$id_jurusan = $this->input->post('id_jurusan');

		//log
		 helper_log("add", "User melakukan penambahan data kelas");
		$this->m_kelas->tambah_data($id_kelas, $Nama_kelas,$id_jurusan);

		redirect(base_url('kelas'));
	}
	function hapus($id_kelas){
		$this->m_kelas->hapus_data($id_kelas);

		//log
		 helper_log("hapus", "User melakukan penghapusan data kelas");
		redirect(base_url('kelas'));
	}
	function edit($id_kelas=null){
		$edit_kelas = $this->m_kelas->ambil_data($id_kelas);

		$this->load->view('template/template',array("isi" => "Kelas/ubah_data", "data_kelas" => $edit_kelas));

	}

	function update_data(){
		$Nama_kelas = $this->input->post('Nama_kelas');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_kelas = $this->input->post('id_kelas');
		
		//log
		 helper_log("edit", "User melakukan edit data kelas");
		$this->m_kelas->ubah_data($id_kelas,$Nama_kelas,$id_jurusan);
		redirect(base_url('kelas'));

	}
	function export_pdf(){
	$data_kelas= $this->m_kelas->cetakpdf();
	$this->load->view('kelas/pdf_kelas',array("data_kelas"=> $data_kelas));
		
		$paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data_kelas dan jurusan.pdf", array('Attachment'=>0)); 
}
	function export_excel(){
	$data_kelas = $this->m_kelas->excel();
	$this->load->view('kelas/excel_kelas',array("data_kelas"=>$data_kelas));

	}
}