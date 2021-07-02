<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_seminar extends CI_Controller {

	protected $classname = 'daftar-seminar';

	function index() {
		$this->access($this->classname, $this->session->userdata('user_role'));
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'daftar-seminar-kelola-ta';
		$data['content'] = [
			'title' => 'Daftar Seminar | SISTA - Sistem Informasi Seminar Tugas Akhir',
			'jadwal' => $this->jadwal_models->get_jadwal()->result(),
		];
		$this->load->view('layouts/base', $data);
	}

	function detail($id, $params = NULL){

	}

	function post(){
		$rules = [];
		foreach (array_keys($this->input->post()) as $key) $rules[$key] = 'required';
		if($this->auto_validation($this->input->post(), $rules) == TRUE) {
			$data = [
				''
			];
			$this->session->set_flashdata('msg', $this->alert_template("Sukses menambahkan seminar baru", "primary"));
			redirect('daftar-seminar');
		} else {
			$this->access($this->classname, $this->session->userdata('user_role'));
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'daftar-seminar';
			$data['content'] = [
				'title' => 'Daftar Seminar | SISTA - Sistem Informasi Seminar Tugas Akhir',
				'dosen' => $this->dosen_models->get_dosen()->result(),
				'kategori' => $this->kategori_models->get_kategori()->result(),
			];
			$this->load->view('layouts/base', $data);
		}
	}

	function peserta($id = NULL, $params = NULL) {
		if($params == 'put'){
			if($this->auto_validation($this->input->post(), ['peserta-id' => 'required', 'peserta-status' => 'required']) == TRUE){
				$data = [
					'kehadiran' => $this->input->post('peserta-status')
				];
				$this->p_seminar_models->put_p_seminar($data, ['id' => $this->input->post('peserta-id')]);
				$this->session->set_flashdata('msg', $this->alert_template("Mengubah data dengan id {$this->input->post('peserta-id')} sukses", "primary"));
				redirect("daftar-seminar/peserta/{$id}");
			} else {
				$this->session->set_flashdata('msg', $this->alert_template("Ada kesalahan saat mengubah data", "danger"));
				redirect("daftar-seminar/peserta/{$id}");
			}
		} else if ($params == 'delete'){
			if($this->auto_validation($this->input->post(), ['peserta-id' => 'required']) == TRUE){
				$this->p_seminar_models->delete_p_seminar(['id' => $this->input->post('peserta-id')]);
				$this->session->set_flashdata('msg', $this->alert_template("Menghapus data dengan id {$this->input->post('peserta-id')} sukses", "primary"));
				redirect("daftar-seminar/peserta/{$id}");
			} else {
				$this->session->set_flashdata('msg', $this->alert_template("Ada kesalahan saat menghapus data", "danger"));
				redirect("daftar-seminar/peserta/{$id}");
			}
		} else {
			$this->access($this->classname, $this->session->userdata('user_role'));
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'daftar-seminar-kelola-peserta';
			$data['content'] = [
				'title' => 'Daftar Seminar | SISTA - Sistem Informasi Seminar Tugas Akhir',
				'jadwal' => $this->jadwal_models->get_jadwal(['seminar_ta.id' => $id])->row(),
				'peserta' => $this->p_seminar_models->get_p_seminar(['seminar_id' => $id])->result()
			];
			$this->load->view('layouts/base', $data);
		}
	}
}
