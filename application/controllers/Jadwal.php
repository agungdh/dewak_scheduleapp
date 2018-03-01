<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
            redirect(base_url());
        }

        if($this->session->level != 1) {
            redirect(base_url('welcome'));
        }
		$this->load->model('m_jadwal');
		$this->load->library('dompdf_gen');
	}

	 function index() {
		$data_jadwal = $this->m_jadwal->lihat_jadwal();

		$data_jadwal_perhari = $this->m_jadwal->lihat_jadwal_perhari();

		$data_jadwal_cas['data_jadwal'] = $data_jadwal;
		$data_jadwal_cas['data_jadwal_perhari'] = $data_jadwal_perhari;

		$this->load->view('template/template', array("isi" => "Jadwal/jadwal_guru" , "data" => $data_jadwal_cas));
	
	}



	function kehadiran_guru(){

	$data_jadwalH = $this->m_jadwal->lihat_jadwalA();

	$data_jadwalT = $this->m_jadwal->lihat_jadwalB();

	$data_jadwal['data_jadwalH'] = $data_jadwalH ;
	$data_jadwal['data_jadwalT'] =$data_jadwalT;

	$this->load->view('template/template', array("isi" => "Jadwal/tampil_data" , "data" => $data_jadwal));
	
	}

	function edits($id_jadwal=null){
		$edit_jadwal = $this->m_jadwal->ambil_data($id_jadwal);

		$this->load->view('template/template',array("isi" => "Jadwal/ubah_data", "data_jadwal" => $edit_jadwal));

	}

	function tambah(){
		$this->load->view('template/template',array("isi" => "Jadwal/tambah_data"));
	}

	function tambah_data(){
		$id_jadwal = $this->input->post('id_jadwal');
		$hari = $this->input->post('hari');
		$id_waktu= $this->input->post('id_waktu');
		$NIP =$this->input->post('NIP');
		$id_mapel =$this->input->post('id_mapel');
		$id_kelas =$this->input->post('id_kelas');
		$status =$this->input->post('status');

		$this->m_jadwal->tambah_data($id_jadwal,$hari,$id_waktu,$NIP,$id_mapel,$id_kelas,$status);

		//log
		helper_log("add", "User Melakukan Penambahan data jadwal");
		redirect(base_url('jadwal'));
	}

	function edit($id_jadwal=null){
		$edit_jadwal = $this->m_jadwal->ambil_data($id_jadwal);

		$this->load->view('template/template',array("isi" => "Jadwal/ubah_data", "data_jadwal" => $edit_jadwal));

	}

	function edit_kehadiran($id_jadwal=null){
		$edit_jadwal = $this->m_jadwal->ambil_data($id_jadwal);

		$this->load->view('template/template',array("isi" => "Jadwal/ubah_data_hadir", "data_jadwal" => $edit_jadwal));

	}

	function update_data_hadir(){
		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$id_jadwal = $this->input->post('id_jadwal');

		$this ->m_jadwal->update_data_hadir($id_jadwal,$status,$keterangan);

		//log
		helper_log("edit", "User pelakukan edit data_kehadiran");

		redirect (base_url('jadwal/kehadiran_guru'));

	}

	function update_data(){
		$hari = $this->input->post('hari');
		$id_waktu= $this->input->post('id_waktu');
		$NIP =$this->input->post('NIP');
		$id_mapel =$this->input->post('id_mapel');
		$id_kelas = $this->input->post('id_kelas');
		$id_jadwal = $this->input->post('id_jadwal');
		
		//log
		helper_log("edit", "User pelakukan edit data jadwal");
		$this->m_jadwal->ubah_data($id_jadwal,$hari,$id_waktu,$NIP,$id_mapel,$id_kelas);
		redirect(base_url('jadwal'));

	}

	function hapus($id_jadwal){
		$this->m_jadwal->hapus_data($id_jadwal);
		//log
		helper_log("hapus", "User melakukan penghapusan data_jadwal");

		redirect(base_url('jadwal'));
	}


	function detail($id_jadwal){
		$data_detail = $this->m_jadwal->ambil_data($id_jadwal);
		
		//$this->load->view('Masyarakat/edit',array("data_rakyat" => $data_masyarakat));

		$this->load->view('template/template',array("isi" => "Jadwal/detail_tampil_data", "data_jadwal_detail" => $data_detail));
	}
	function export_pdf(){
	$data_jadwal= $this->m_jadwal->cetakpdf();
	$this->load->view('jadwal/pdf_jadwal',array("data_jadwal"=> $data_jadwal));
		
		$paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("jadwal.pdf", array('Attachment'=>0)); 

}
	function export_excel(){
		$data_jadwal = $this->m_jadwal->excel();
		$this->load->view('jadwal/excel_jadwal',array("data_jadwal"=>$data_jadwal));

	}
	function pdf_hadir(){
	$data_jadwal= $this->m_jadwal->pdfhadir();
	$this->load->view('jadwal/pdf_hadir',array("data_jadwal"=> $data_jadwal));
		
		$paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data_jadwal_hadir.pdf", array('Attachment'=>0)); 

}
	function pdf_tidakhadir(){
	$data_jadwal= $this->m_jadwal->pdftidakhadir();
	$this->load->view('jadwal/pdf_tidakhadir',array("data_jadwal"=> $data_jadwal));
		
		$paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data_jadwal_tidak_hadir.pdf", array('Attachment'=>0)); 

}
	function excel_hadir(){
			$data_jadwal = $this->m_jadwal->pdfhadir();
			$this->load->view('jadwal/excel_hadir',array("data_jadwal"=>$data_jadwal));
	}
	function excel_tidakhadir(){
			$data_jadwal = $this->m_jadwal->pdftidakhadir();
			$this->load->view('jadwal/tidakhadir',array("data_jadwal"=>$data_jadwal));
	}

	//IMPORT JADWAL
	function impor(){
		$this->load->view('template/template',array("isi" => "Jadwal/import"));
	}

	function aksi_impor(){
		$this->load->library('excelreader/Excel_reader');
		if ($_FILES['excel']['size']==0) {
			redirect(base_url('jadwal/impor?file_kosong=1'));	
		}

			$a="data_jadwal";
			$ekstensi_diperbolehkan	= array('xls');
			$nama = $_FILES['excel']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			//awal
			//tengah
			//akhir
			//end() -> akhir
			$ukuran	= $_FILES['excel']['size'];
			$file_tmp = $_FILES['excel']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5242880){			
					if(move_uploaded_file($file_tmp, 'berkas/temp/'.$a.'.xls')){
						// echo 'FILE BERHASIL DI UPLOAD';
					}else{
						// echo 'GAGAL MENGUPLOAD FILE';
						redirect(base_url('jadwal/impor?upload_gagal=1'));
					}
				}else{
					redirect(base_url('jadwal/impor?file_kebesaran=1'));	
					// echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				redirect(base_url('jadwal/impor?ekstensi_salah=1'));	
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		
		$this->excel_reader->setOutputEncoding('230787');
		$this->excel_reader->read('berkas/temp/'.$a.'.xls');
		$id_jadwal = $this->input->post('id_jadwal');

		$data = $this->excel_reader->sheets[0];
		// echo $data['cells'][3][1]; //['cells'][bawah][samping]
		// echo "<br>";
		// echo $data['numRows']; //jumah baris (bawah)
		$status = 'Hadir';
		for ($i=12; $i <= $data['numRows']; $i++) { 
			// echo $data['cells'][$i][1] . "<br>";
			$this->m_jadwal->tambah_data($id_jadwal,$data['cells'][$i][1],$data['cells'][$i][2],$data['cells'][$i][3],$data['cells'][$i][4],$data['cells'][$i][5],$status);
		}

		//log
		helper_log("edit", "User melakukan penambahan data melalui import data jadwal");
		
		redirect(base_url('jadwal'));	


	}

}