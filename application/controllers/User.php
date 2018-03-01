<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
            redirect(base_url());
        }

        if($this->session->level != 1) {
            redirect(base_url('welcome'));
        }
		$this->load->model('m_user');
	}

	public function index() {
		$data_user = $this->m_user->lihat_data_user();

		$this->load->view('template/template', array("isi" => "User/tampil_data" , "data"=> array("data_user" => $data_user)));
	
	}
	function hapus($idusers){
		$this->m_user->hapus_data($idusers);
		//log
		 helper_log("hapus", "User melakukan penghapusan data user");
		redirect(base_url('user'));
	}
	function tambah(){
		$this->load->view('template/template', array("isi" => "User/tambah_data"));
	}
	function tambah_data(){
		$idusers=$this->input->post('idusers');
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$level=$this->input->post('level');

		$this->m_user->tambah_data($idusers,$nama,$username,$password,$level);

		//log
		 helper_log("add", "User melakukan penambahan data user");
		redirect(base_url('user'));
	}
	function edit($idusers=null){
		$edit_user = $this->m_user->ambil_data($idusers);

		$this->load->view('template/template',array("isi" => "User/ubah_data", "data_user" => $edit_user));

	}

	function update_data(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$idusers = $this->input->post('idusers');

		$this->m_user->ubah_data($idusers,$nama,$username);

		//log
		 helper_log("edit", "User melakukan edit data user");
		redirect(base_url('user'));

	}
		function editt($idusers=null){
		$edit_user = $this->m_user->ambil_data_password($idusers);

		$this->load->view('template/template',array("isi" => "User/ubah_password", "data_user" => $edit_user));

	}

	function update_password(){
		$password = $this->input->post('password');
		$idusers = $this->input->post('idusers');

		$this->m_user->ubah_password($idusers,$password);

		//log
		 helper_log("edit", "User melakukan ubah password");
		redirect(base_url('user'));

	}

	function impor(){
		$this->load->view('template/template',array("isi" => "user/impor"));
	}

	function aksi_impor(){
		$this->load->library('excelreader/Excel_reader');
		if ($_FILES['excel']['size']==0) {
			redirect(base_url('user/impor?file_kosong=1'));	
		}

			$a="data_user_guru";
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
						redirect(base_url('user/impor?upload_gagal=1'));
					}
				}else{
					redirect(base_url('user/impor?file_kebesaran=1'));	
					// echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				redirect(base_url('user/impor?ekstensi_salah=1'));	
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		
		$this->excel_reader->setOutputEncoding('230787');
		$this->excel_reader->read('berkas/temp/'.$a.'.xls');

		$data = $this->excel_reader->sheets[0];
		// echo $data['cells'][3][1]; //['cells'][bawah][samping]
		// echo "<br>";
		// echo $data['numRows']; //jumah baris (bawah)

		for ($i=5; $i <= $data['numRows']; $i++) { 
			// echo $data['cells'][$i][1] . "<br>";
			$this->m_user->tambah_user($data['cells'][$i][1],$data['cells'][$i][2],$data['cells'][$i][3]);
		}

		//log
		 helper_log("add", "User melakukan penambahan data user melalui import data excel");
		redirect(base_url('user'));	


	}
}