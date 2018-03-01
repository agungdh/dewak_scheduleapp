<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
		parent::__construct();

		 if ($this->session->login != true) {
            redirect(base_url());
        }
        
		$this->load->model('m_profil');		
	}

	function index() {
		$data_user = $this->m_profil->ambil_data_profil();
		
		$this->load->view("template/template", array("isi"=>"User/profil", "data"=>$data_user));
	}

	function edit_foto($idusers){
		$foto = $this->m_profil->ambil_data_profil($idusers);
		
		//$this->load->view('Masyarakat/edit',array("data_rakyat" => $data_masyarakat));

		$this->load->view('template/template',array("isi" => "User/edit_foto", "edit" => $foto));
	}

	function ubah_foto(){
		$nama =$this->input->post('nama');
		$idusers =$this->input->post('idusers');

		$this->m_profil->ubah_profil($nama,$idusers);

		$ekstensi_diperbolehkan	= array('jpg', 'png', 'bmp');
			$nama = $_FILES['foto']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];	
 

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5242880){			
					if(move_uploaded_file($file_tmp, 'berkas/user/'.$idusers.'.jpg')){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						// echo 'GAGAL MENGUPLOAD FILE';
						redirect(base_url('profil/edit_foto?upload_gagal=1'));
					}
				}else{
					redirect(base_url('profil/edit_foto?file_kebesaran=1'));	
					// echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				redirect(base_url('profil/edit_foto?ekstensi_salah=1'));	
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}

	//log
		 helper_log("edit", "User melakukan ubah foto profil");

	redirect(base_url('profil'));

	}

	function ubah_profil(){
		$nama = $this->m_profil->ubah_profil();


		$this->session->set_userdata('nama', $nama);

		redirect(base_url('welcome'));
	}

	function ganti_password() {
		$this->load->view("template/template", array("isi"=>"User/ubah_pass_profil"));
	}

	function ubah_password() {
		$password = $this->input->post('password');
		$idusers = $this->input->post('idusers');

		$this->m_profil->ubah_password($password,$idusers);

		//log
		 helper_log("edit", "User melakukan ubah password");
		redirect(base_url('welcome'));
	}

}
