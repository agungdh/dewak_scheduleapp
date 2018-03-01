<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
            redirect(base_url());
        }

        if($this->session->level != 1) {
            redirect(base_url('welcome'));
        }
		$this->load->model('m_mapel');
		$this->load->library('dompdf_gen');
	}

	public function index() {
		$data_mapel = $this->m_mapel->lihat_data_mapel();


		$this->load->view('template/template', array("isi" => "Mapel/tampil_data" , "data"=> array("data_mapel" => $data_mapel)));
	
	}

	function tambah(){

		$this->load->view("template/template", array("isi"=>"Mapel/tambah_data_Mapel"));
	}

	function tambah_data(){
		$id_mapel =$this->input->post('id_mapel');
		$Mata_pelajaran = $this->input->post('Mata_pelajaran');
		$lama_mapel = $this->input->post('lama_mapel');
		$Tahun_ajar = $this->input->post('Tahun_ajar');

		//log
		 helper_log("add", "User melakukan penambahan data jurusan");
		$this->m_mapel->tambah_data($id_mapel,$Mata_pelajaran,$lama_mapel,$Tahun_ajar);

		redirect(base_url('mapel'));
	}

	function edit($id_mapel=null){
		$edit_mapel = $this->m_mapel->ambil_data($id_mapel);

		$this->load->view('template/template',array("isi" => "Mapel/ubah_data", "data_mapel" => $edit_mapel));

	}

	function update_data(){
		$Mapel = $this->input->post('Mata_pelajaran');
		$lama_mapel = $this->input->post('lama_mapel');
		$thn_ajr = $this->input->post('Tahun_ajar');
		$id_mapel =$this->input->post('id_mapel');

		//log
		 helper_log("edit", "User melakukan penghapusan data jurusan");
		$this->m_mapel->ubah_data($id_mapel,$Mapel,$lama_mapel,$thn_ajr);
		redirect(base_url('mapel'));

	}

	function hapus($id_mapel){
		$this->m_mapel->hapus_data($id_mapel);

		//log
		 helper_log("hapus", "User melakukan penghapusan data jurusan");
		redirect(base_url('mapel'));
	}

	function export_pdf(){
		$data_mapel= $this->m_mapel->cetakpdf();
		$this->load->view('mapel/pdf_mapel',array("data_mapel"=> $data_mapel));
		
		$paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data_mapel.pdf", array('Attachment'=>0)); 

}
	function export_excel(){
		$data_mapel = $this->m_mapel->excel();
		$this->load->view('mapel/excel_mapel',array("data_mapel"=>$data_mapel));

}

}