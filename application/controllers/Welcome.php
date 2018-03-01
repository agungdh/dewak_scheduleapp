<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();

		
	}

	public function index() {
		

		 $this->session->login != true ? $this->load->view("template/halaman_login") : $this->load->view("template/template", array("isi"=>"template/halaman_utama"));

		 //log
			//helper_log("logins", "User Login");
	}

}
