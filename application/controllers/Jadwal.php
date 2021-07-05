<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	
	protected $classname = 'jadwal';

	function __construct() {
		parent::__construct();
		$this->access($this->classname, $this->session->userdata('user_role'));
	}

	function index() {
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'jadwal';
		$data['content'] = [
			'title' => 'Jadwal | SISTA - Sistem Informasi Seminar Tugas Akhir',
			'jadwal' => $this->seminar_models->get_seminar()->result()
		];
		$this->load->view('layouts/base', $data);
	}

	function detail($id, $params = NULL){
		if($params == 'daftar') {
			$this->gatekeeper(current_url());
			$rules = [
				'nim' => 'required',
				'nama' => 'required'
			];
			if($this->auto_validation($this->input->post(), $rules) == TRUE) {
				$data = [
					'nim' => $this->input->post('nim'),
					'nama' => $this->input->post('nama'),
					'seminar_id' => $id,
				];
				$this->p_seminar_models->post_p_seminar($data);
				$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
				$data['pages'] = 'jadwal-daftar-success';
				$data['content'] = [
					'title' => 'Sukses Daftar | SISTA - Sistem Informasi Seminar Tugas Akhir',
					'jadwal' => $this->seminar_models->get_seminar(['seminar_ta.id' => $id])->row()
				];
				$this->load->view('layouts/base', $data);
			}	else {
				$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
				$data['pages'] = 'jadwal-daftar';
				$data['content'] = [
					'title' => 'Detail | SISTA - Sistem Informasi Seminar Tugas Akhir',
					'jadwal' => $this->seminar_models->get_seminar(['seminar_ta.id' => $id])->row()
				];
				$this->load->view('layouts/base', $data);
			}
		}	else {
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'jadwal-detail';
			$data['content'] = [
				'title' => 'Detail | SISTA - Sistem Informasi Seminar Tugas Akhir',
				'jadwal' => $this->seminar_models->get_seminar(['seminar_ta.id' => $id])->row()
			];
			$this->load->view('layouts/base', $data);
		}
	}
}
