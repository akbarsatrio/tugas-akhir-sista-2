<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	protected $classname = 'tentang';

	function __construct() {
		parent::__construct();
		$this->access($this->classname, $this->session->userdata('user_role'));
	}
	
	function index() {
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'tentang';
		$data['content'] = [
			'title' => 'Tentang | SISTA - Sistem Informasi Seminar Tugas Akhir',
		];
		$this->load->view('layouts/base', $data);
	}
}
