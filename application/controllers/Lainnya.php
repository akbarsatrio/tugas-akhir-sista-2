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

	function detail_penilaian($params = NULL){
		if($params == 'delete') {
			$rules = [];
			foreach (array_keys($this->input->post()) as $key) $rules[$key] = 'required';
			$data = [
				'id' => $this->input->post('detail_penilaian_id')
			];

			if($this->auto_validation($this->input->post(), $rules) == true){
				$this->penilaian_models->delete_penilaian($data);
				$this->session->set_flashdata('msg', $this->alert_template("Sukses", "primary"));
			} else {
				$this->session->set_flashdata('msg', $this->alert_template("Terjadi kesalahan", "danger"));
			}

			redirect('lainnya/detail-penilaian');

		} else {
			$rules = [];
			foreach (array_keys($this->input->post()) as $key) $rules[$key] = 'required';
			if($this->auto_validation($this->input->post(), $rules) == true){
				$data = [
					'dosen_id' => $this->input->post('dosen_id'),
					'penilaian_id' => $this->input->post('penilaian_id'),
					'seminar_id' => $this->input->post('seminar_id'),
					'nilai' => $this->input->post('nilai'),
				];

				if($this->penilaian_models->post_penilaian($data) == TRUE) {
					$this->session->set_flashdata('msg', $this->alert_template("Sukses", "primary"));
				} else {
					$this->session->set_flashdata('msg', $this->alert_template("Terjadi kesalahan", "danger"));
				}
				redirect('lainnya/detail-penilaian');
			} else {
				$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
				$data['pages'] = 'detail-penilaian';
				$data['content'] = [
					'title' => 'Detail Penilaian | SISTA - Sistem Informasi Seminar Tugas Akhir',
					'penilaian' => $this->penilaian_models->get_penilaian()->result(),
					'dosen' => $this->dosen_models->get_dosen()->result(),
					'seminar' => $this->seminar_models->get_seminar()->result(),
					'dosen' => $this->dosen_models->get_dosen()->result(),
					'penilaian2' => $this->db->get('penilaian')->result()
				];
				$this->load->view('layouts/base', $data);
			}
		}
	}
}
