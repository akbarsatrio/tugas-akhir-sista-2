<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	protected $classname = 'home';

	function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
	}

	function index() {
		if($this->session->userdata('user_role') == NULL) {
			$this->db->insert('tbl_visitors', [
				'visitor_ip' => $this->get_client_ip(),
				'visitor_time' => date('H:i:s'),
				'created_at' => date('Y-m-d')
			]);
		}
		$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
		$data['pages'] = $this->session->userdata('user_role') == '1' ? 'home-dosen' : 'home';
		$data['content'] = [
			'title' => 'Home | SISTA - Sistem Informasi Seminar Tugas Akhir',
			'count' => [
				'pengguna' => $this->user_models->get_user()->num_rows(),
				'dosen' => $this->dosen_models->get_dosen()->num_rows(),
				'seminar' => $this->seminar_models->get_seminar()->num_rows(),
				'kategori' => $this->kategori_models->get_kategori()->num_rows()
			]
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

	function daftar(){
		$rules = [
			'nama' => 'required',
			'nim' => 'required',
			'email' => 'required|is_unique[tbl_users.user_email]|trim|valid_email',
			'prodi' => 'required',
			'angkatan' => 'required',
			'password' => 'required',
			'password-confirm' => 'required|matches[password]',
		];
		if($this->auto_validation($this->input->post(), $rules) == TRUE){
			$data = [
				'user_name' => $this->input->post('nama'),
				'user_nim' => $this->input->post('nim'),
				'user_email' => $this->input->post('email'),
				'user_prodi' => $this->input->post('prodi'),
				'user_angkatan' => $this->input->post('angkatan'),
				'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'month_created' => date('Y-m')
			];
			if($this->user_models->post_user($data) == true) {
				$this->state('Yeay, daftar berhasil!', 'Tinggal tunggu konfirmasi dari admin ya, maksimal 1x24jam', 'sukses.svg', 201);
			} else {
				$this->state('Oops, ada kesalahan', 'Kesalahan dalam menginput data, silahkan kembali lagi nanti', 'error.svg', 500);
			}
		} else {
			$data['menu'] = $this->get_menu($this->session->userdata('user_role'));
			$data['pages'] = 'daftar';
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
				if($check_user->is_verified == '1'){
					$session = [
						'user_id' => $check_user->id_user,
						'user_email' => $this->input->post('email'),
						'user_password' => $this->input->post('password'),
						'user_role' => $check_user->role_id,
						'user_nim' => $check_user->user_nim,
						'user_nama' => $check_user->user_name,
						'is_login' => TRUE
					];
					$this->session->set_userdata($session);
					if($this->session->userdata('redirect')) {
						redirect($this->session->userdata('redirect'));
						$this->session->unset_userdata('redirect');
					} else {
						if($this->session->userdata('user_role') != '1'){
							$this->session->set_flashdata('success', $this->alert_template("Login berhasil, selamat datang {$check_user->user_name}", 'primary'));
							redirect('profil');
						} else {
							$this->session->set_flashdata('success', $this->alert_template("Login berhasil, selamat datang {$check_user->user_name}", 'primary'));
							redirect('home');
						}
					}
				} else {
					$this->session->set_flashdata('error', $this->alert_template('Akun belum diverifikasi', 'danger'));
				redirect('login');
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
