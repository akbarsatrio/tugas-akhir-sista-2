<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['pages'] = 'home';
		$data['content'] = [
			'title' => 'Home | SISTA - Sistem Informasi Seminar Tugas Akhir',
		];
		$this->load->view('layouts/base', $data);
	}

	function login() {
		if($this->input->get('redirect')) $this->session->set_userdata(['redirect' => $this->input->get('redirect')]);
		if($this->auto_validation($this->input->post(), ['email' => 'required', 'password' => 'required']) == TRUE){
			$this->_auth();
		} else {
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'login';
			$data['content'] = [
				'title' => 'Masuk | SISTA - Sistem Informasi Seminar Tugas Akhir'
			];
			$this->load->view('layouts/base', $data);
		}
	}

	private function _auth(){
		$check_user = $this->user_models->get_user(['user_email' => $this->input->post('email')])->row();
		if($check_user) {
			if(password_verify($this->input->post('password'), $check_user->user_password)) {
				$session = [
					'user_email' => $this->input->post('email'),
					'user_password' => $this->input->post('password'),
					'user_role' => $check_user->role_id,
					'is_login' => TRUE
				];
				$this->session->set_userdata($session);
				if($this->session->userdata('redirect')) {
					redirect($this->session->userdata('redirect'));
					$this->session->unset_userdata('redirect');
				} else {
					$this->session->set_flashdata('success', $this->alert_template("Login berhasil, selamat datang {$check_user->user_name}", 'primary'));
					redirect('profil');
				}
			} else {
				$this->session->set_flashdata('error', $this->alert_template('Password salah!', 'danger'));
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error', $this->alert_template('Akun tidak tersedia', 'danger'));
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
