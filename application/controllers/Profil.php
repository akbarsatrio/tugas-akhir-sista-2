<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	protected $classname = 'profil';

	function index() {
		$this->access($this->classname, $this->session->userdata('user_role'));
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'profil';
		$data['content'] = [
			'title' => 'Profil | SISTA - Sistem Informasi Seminar Tugas Akhir',
		];
		$this->load->view('layouts/base', $data);
	}
}
