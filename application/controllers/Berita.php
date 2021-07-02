<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	protected $classname = 'berita';

	function index() {
		$this->access($this->classname, $this->session->userdata('user_role'));
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'berita';
		$data['content'] = [
			'title' => 'Berita | SISTA - Sistem Informasi Seminar Tugas Akhir',
		];
		$this->load->view('layouts/base', $data);
	}

	function page($args, $id = NULL){
		$this->access($this->classname, $this->session->userdata('user_role'));
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = "berita-{$args}";
		$data['content'] = [
			'title' => "Berita {$args} | SISTA - Sistem Informasi Seminar Tugas Akhir",
		];
		$this->load->view('layouts/base', $data);
	}
}
