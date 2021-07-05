<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_seminar extends CI_Controller {

	protected $classname = 'daftar-seminar';

	function __construct() {
		parent::__construct();
		$this->access($this->classname, $this->session->userdata('user_role'));
	}

	function index() {
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = 'daftar-seminar-kelola-ta';
		$data['content'] = [
			'title' => 'Daftar Seminar | SISTA - Sistem Informasi Seminar Tugas Akhir',
			'jadwal' => $this->seminar_models->get_seminar()->result(),
		];
		$this->load->view('layouts/base', $data);
	}

	function put($id){
		if($this->seminar_models->get_seminar(['seminar_ta.id' => $id])->num_rows()){
			$rules = [];
			foreach (array_keys($this->input->post()) as $key) $rules[$key] = 'required';
			if($this->auto_validation($this->input->post(), $rules) == TRUE) {
				$data = [
					'tanggal' => $this->input->post('tangsel'),
					'jam' => $this->input->post('jamsem'),
					'kategori_seminar_id' => $this->input->post('seminar'),
					'nim' => $this->input->post('nim'),
					'nama_mahasiswa' => $this->input->post('nama'),
					'judul' => $this->input->post('judul'),
					'lokasi' => $this->input->post('lokasi'),
					'pembimbing_id' => $this->input->post('pembimbing'),
					'penguji1_id' => $this->input->post('penguji1'),
					'penguji2_id' => $this->input->post('penguji2'),
				];
				if($this->seminar_models->put_seminar($data, ['id' => $id]) == TRUE) {
					$this->session->set_flashdata('msg', $this->alert_template("Sukses mengubah seminar", "primary"));
				} else {
					$this->session->set_flashdata('msg', $this->alert_template("Terjadi kesalahan saat mengubah seminar", "danger"));
				}
				redirect('daftar-seminar');
			} else {
				$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
				$data['pages'] = 'daftar-seminar-detail';
				$data['content'] = [
					'title' => 'Detail Seminar | SISTA - Sistem Informasi Seminar Tugas Akhir',
					'dosen' => $this->dosen_models->get_dosen()->result(),
					'seminar' => $this->seminar_models->get_seminar(['seminar_ta.id' => $id])->row(),
					'kategori' => $this->kategori_models->get_kategori()->result(),
				];
				$this->load->view('layouts/base', $data);
			}
		} else {
			$this->state('Waduh, ada yang salah nih!', 'Tautan yang kamu cari tidak tersedia', 'error.svg', 404);
		}
	}

	function post(){
		$rules = [];
		foreach (array_keys($this->input->post()) as $key) $rules[$key] = 'required';
		if($this->auto_validation($this->input->post(), $rules) == TRUE) {
			$data = [
				'tanggal' => $this->input->post('tangsel'),
				'jam' => $this->input->post('jamsem'),
				'kategori_seminar_id' => $this->input->post('seminar'),
				'nim' => $this->input->post('nim'),
				'nama_mahasiswa' => $this->input->post('nama'),
				'judul' => $this->input->post('judul'),
				'lokasi' => $this->input->post('lokasi'),
				'pembimbing_id' => $this->input->post('pembimbing'),
				'penguji1_id' => $this->input->post('penguji1'),
				'penguji2_id' => $this->input->post('penguji2'),
			];
			if($this->seminar_models->post_seminar($data) == TRUE) {
				$this->session->set_flashdata('msg', $this->alert_template("Sukses menambahkan seminar baru", "primary"));
			} else {
				$this->session->set_flashdata('msg', $this->alert_template("Terjadi kesalahan saat menambahkan seminar", "danger"));
			}
			redirect('daftar-seminar');
		} else {
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

	function delete(){
		if($this->seminar_models->delete_seminar(['id' => $this->input->post('seminar_id')])) {
			$this->session->set_flashdata('msg', $this->alert_template("Sukses menghapus seminar dengan ID {$this->input->post('seminar_id')}", "primary"));
		} else {
			$this->session->set_flashdata('msg', $this->alert_template("Terjadi kesalahan saat menghapus data", "danger"));
		}
		redirect('daftar-seminar');
	}

	function peserta($id = NULL, $params = NULL) {
		if($this->seminar_models->get_seminar(['seminar_ta.id' => $id])->num_rows()){
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
				$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
				$data['pages'] = 'daftar-seminar-kelola-peserta';
				$data['content'] = [
					'title' => 'Daftar Seminar | SISTA - Sistem Informasi Seminar Tugas Akhir',
					'jadwal' => $this->seminar_models->get_seminar(['seminar_ta.id' => $id])->row(),
					'peserta' => $this->p_seminar_models->get_p_seminar(['seminar_id' => $id])->result()
				];
				$this->load->view('layouts/base', $data);
			}
		} else {
			$this->state('Waduh, ada yang salah nih!', 'Tautan yang kamu cari tidak tersedia', 'error.svg', 404);
		}
	}
}
