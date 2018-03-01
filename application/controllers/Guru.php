<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->login != true) {
            redirect(base_url());
        }

        if($this->session->level != 1) {
            redirect(base_url('welcome'));
        }

		$this->load->model('m_guru');
		$this->load->library('dompdf_gen');
		//$this->load->helper('helper_log');
	}

	public function index() {
		$data_guru = $this->m_guru->lihat_data_guru();


		$this->load->view('template/template', array("isi" => "Guru/tampil_data" , "data"=> array("data_guru" => $data_guru)));
	
	}

	function tambah (){

		$this->load->view("template/template", array("isi"=>"Guru/tambah_data_guru"));
	}

	function tambah_data (){

		if ($_FILES['foto']['size'] == 0) {
			redirect(base_url('Guru/tambah?foto_kosong=1'));
		}

		$NIP =$this->input->post('NIP');
		$Nama =$this->input->post('Nama');
		$No_hp =$this->input->post('No_hp');
	

		$this->m_guru->tambah($NIP,$Nama,$No_hp);

			$ekstensi_diperbolehkan	= array('jpg', 'png', 'bmp');
			$Nama = $_FILES['foto']['name'];
			$x = explode('.', $Nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];

 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5242880){			
					if(move_uploaded_file($file_tmp, 'berkas/guru/'.$NIP.'.jpg')){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						// echo 'GAGAL MENGUPLOAD FILE';
						redirect(base_url('guru/tambah?upload_gagal=1'));
					}
				}else{
					redirect(base_url('guru/tambah?file_kebesaran=1'));	
					// echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				redirect(base_url('guru/tambah?ekstensi_salah=1'));	
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}

			//log
            helper_log("add", "User Melakukan Penambahan data guru");
            

		redirect(base_url('guru'));
	}

	function edit ($NIP) {

		$data_guru = $this->m_guru->ambil_data_guru($NIP);

		$this->load->view('template/template',array("isi" => "Guru/edit", "data_guru" => $data_guru));

	}

	function update_data(){

		$Nama = $this->input->post('Nama');
		$No_hp = $this->input->post('No_hp');
		$NIP = $this->input->post('NIP');

		$this->m_guru->edit_data_guru($NIP,$Nama,$No_hp);

		// contoh panggil helper log
            helper_log("edit", "User melakukan edit data guru");
            //silahkan di ganti2 aja kalimatnya

		redirect(base_url('guru'));
	}

	function edit_foto($NIP){

		$edit_foto_guru = $this->m_guru->ambil_data_guru($NIP);

		$this->load->view('template/template',array("isi"=> "Guru/edit_foto","data_guru" => $edit_foto_guru));

	}

	function ubah_foto(){

		$NIP =$this->input->post('NIP');
		$Nama =$this->input->post('Nama');
		$No_hp = $this->input->post('No_hp');
	

		$this->m_guru->edit_data_guru($NIP,$Nama,$No_hp);

			$ekstensi_diperbolehkan	= array('jpg', 'png', 'bmp');
			$Nama = $_FILES['foto']['name'];
			$x = explode('.', $Nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];

 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5242880){			
					if(move_uploaded_file($file_tmp, 'berkas/guru/'.$NIP.'.jpg')){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						// echo 'GAGAL MENGUPLOAD FILE';
						redirect(base_url('guru/edit_foto/'.$NIP.'?upload_gagal=1'));
					}
				}else{
					redirect(base_url('guru/edit_foto/'.$NIP.'?file_kebesaran=1'));	
					// echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				redirect(base_url('guru/edit_foto/'.$NIP.'?ekstensi_salah=1'));	
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}

			//log
			helper_log("edit", "User melakukan edit foto");

		redirect(base_url('guru/edit/'.$NIP));
	}

	function hapus($NIP){
		$this->m_guru->hapus_data_guru($NIP);

		//log
		helper_log("hapus", "User melakukan penghapusan data Guru");

		redirect(base_url("guru"));
	
	}
	function export_pdf(){
	$data_guru= $this->m_guru->cetakpdf();
	$this->load->view('guru/pdf_guru',array("data_guru"=> $data_guru));
		
		$paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data_guru.pdf", array('Attachment'=>0)); 

}
	function export_excel(){
		$data_guru = $this->m_guru->excel();
		$this->load->view('guru/excel_guru',array("data_guru"=>$data_guru));

	}
	function impor(){
		$this->load->view('template/template',array("isi" => "guru/impor"));
	}

	function aksi_impor(){
		$this->load->library('excelreader/Excel_reader');
		if ($_FILES['excel']['size']==0) {
			redirect(base_url('guru/impor?file_kosong=1'));	
		}

			$a="data_guru";
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
						redirect(base_url('guru/impor?upload_gagal=1'));
					}
				}else{
					redirect(base_url('guru/impor?file_kebesaran=1'));	
					// echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				redirect(base_url('guru/impor?ekstensi_salah=1'));	
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		
		$this->excel_reader->setOutputEncoding('230787');
		$this->excel_reader->read('berkas/temp/'.$a.'.xls');

		$data = $this->excel_reader->sheets[0];
		// echo $data['cells'][3][1]; //['cells'][bawah][samping]
		// echo "<br>";
		// echo $data['numRows']; //jumah baris (bawah)

		for ($i=4; $i <= $data['numRows']; $i++) { 
			// echo $data['cells'][$i][1] . "<br>";
			$this->m_guru->tambah_guru($data['cells'][$i][1],$data['cells'][$i][2],$data['cells'][$i][3]);
		}

		//log
			helper_log("import", "User melakukan penambahan data melalui import data guru");

		redirect(base_url('guru'));	


	}
}

