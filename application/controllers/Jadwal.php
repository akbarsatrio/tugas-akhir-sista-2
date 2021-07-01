<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function index() {
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'jadwal';
		$data['content'] = [
			'title' => 'Jadwal | SISTA - Sistem Informasi Seminar Tugas Akhir',
			'jadwal' => $this->jadwal_models->get_jadwal()->result()
		];
		$this->load->view('layouts/base', $data);
	}

	function detail($id, $params = NULL){
		if($params == 'daftar') {
			$this->gatekeeper(current_url());
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'jadwal-daftar';
			$data['content'] = [
				'title' => 'Daftar | SISTA - Sistem Informasi Seminar Tugas Akhir',
				'jadwal' => $this->jadwal_models->get_jadwal(['id' => $id])->row()
			];
			$this->load->view('layouts/base', $data);
		} else {
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'jadwal-detail';
			$data['content'] = [
				'title' => 'Detail | SISTA - Sistem Informasi Seminar Tugas Akhir',
				'jadwal' => $this->jadwal_models->get_jadwal(['seminar_ta.id' => $id])->row()
			];
			$this->load->view('layouts/base', $data);
		}
	}
}
