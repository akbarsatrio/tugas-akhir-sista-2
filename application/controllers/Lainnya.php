<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lainnya extends CI_Controller {

	protected $classname = 'profil';

	function __construct() {
		parent::__construct();
		$this->access($this->classname, $this->session->userdata('user_role'));
		if($this->session->userdata('is_login') != TRUE) redirect('login');
	}

	function index(){
		redirect();
	}

	function verifikasi_akun() {
		$rules = [];
		foreach (array_keys($this->input->post()) as $key) $rules[$key] = 'required';
		if($this->auto_validation($this->input->post(), $rules) == true){
			$data = [
				'id_user' => $this->input->post('user_id'),
			];

			if($this->user_models->put_user(['is_verified' => 1], ['id_user' => $data['id_user']]) == TRUE) {
				$this->session->set_flashdata('msg', $this->alert_template("Sukses", "primary"));
				$this->session->set_userdata(['user_password' => $this->input->post('password')]);
			} else {
				$this->session->set_flashdata('msg', $this->alert_template("Terjadi kesalahan", "danger"));
			}
			redirect('lainnya/verifikasi-akun');
		} else {
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'verifikasi-akun';
			$data['content'] = [
				'title' => 'Verifikasi Akun | SISTA - Sistem Informasi Seminar Tugas Akhir',
				'akun' => $this->user_models->get_user(['is_verified' => 0])->result()
			];
			$this->load->view('layouts/base', $data);
		}
	}

	function kategori_seminar(){
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'kategori-seminar';
		$data['content'] = [
			'title' => 'Kategori Seminar | SISTA - Sistem Informasi Seminar Tugas Akhir',
		];
		$this->load->view('layouts/base', $data);
	}

	function data_dosen(){
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'data-dosen';
		$data['content'] = [
			'title' => 'Data Dosen | SISTA - Sistem Informasi Seminar Tugas Akhir',
		];
		$this->load->view('layouts/base', $data);
	}
}
