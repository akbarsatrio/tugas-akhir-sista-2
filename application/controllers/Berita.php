<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	protected $classname = 'berita';

	function __construct() {
		parent::__construct();
		$this->access($this->classname, $this->session->userdata('user_role'));
	}

	function index() {
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'berita';
		$data['content'] = [
			'title' => 'Berita | SISTA - Sistem Informasi Seminar Tugas Akhir',
		];
		$this->load->view('layouts/base', $data);
	}

	function page($args, $id = NULL){
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = "berita-{$args}";
		$data['content'] = [
			'title' => "Berita {$args} | SISTA - Sistem Informasi Seminar Tugas Akhir",
		];
		$this->load->view('layouts/base', $data);
	}
}
