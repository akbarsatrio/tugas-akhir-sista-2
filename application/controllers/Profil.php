<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	protected $classname = 'profil';

	function __construct() {
		parent::__construct();
		$this->access($this->classname, $this->session->userdata('user_role'));
	}

	function index() {
		$rules = [];
		foreach (array_keys($this->input->post()) as $key) $rules[$key] = 'required';
		if($this->auto_validation($this->input->post(), $rules) == true){
			$data = [
				'user_name' => $this->input->post('nama'),
				'user_nim' => $this->input->post('nim'),
				'user_prodi' => $this->input->post('prodi'),
				'user_angkatan' => $this->input->post('angkatan'),
				'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];

			if($_FILES["image"]['name']) {
				$path = FCPATH."/assets/img/uploads/{$this->classname}/";
				$input = 'image';
				if(!is_dir($path)) mkdir($path, 0777, true);
				$check_images = $this->user_models->get_user(['id_user' => $this->session->userdata('user_id')])->row('user_image');
				if($check_images) $this->delete_image($this->classname, $check_images);
				$this->upload_image($path, $input, $this->classname);
				$data['user_image'] = $this->upload->data('file_name');
			}

			if($this->user_models->put_user($data, ['id_user' => $this->session->userdata('user_id')]) == TRUE) {
				$this->session->set_flashdata('success', $this->alert_template("Sukses mengubah profil", "primary"));
				$this->session->set_userdata(['user_password' => $this->input->post('password')]);
			} else {
				$this->session->set_flashdata('success', $this->alert_template("Terjadi kesalahan saat mengubah profil", "danger"));
			}
			redirect('profil');
		} else {
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'profil';
			$data['content'] = [
				'title' => 'Profil | SISTA - Sistem Informasi Seminar Tugas Akhir',
				'profile' => $this->user_models->get_user(['id_user' => $this->session->userdata('user_id')])->row()
			];
			$this->load->view('layouts/base', $data);
		}
	}
}
