<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	function __construct(){
    parent::__construct();
  }

	function json_verify($data, $code) {
		if($this->session->userdata('user_role') != '1' || $this->session->userdata('user_role') == NULL) {
			return $this->returnJson(['response' => 'You are not authorized', 'code' => 403], 403);
		} else {
			return $this->returnJson($data, $code);
		}
	}

	function get_visitor(){
		$data = $this->ajax_models->ajax_get_visitor();
		$this->json_verify($data, 200);
	}

	function get_user(){
		$data = $this->ajax_models->ajax_get_users();
		$this->json_verify($data, 200);
	}

	function get_seminar_liked_by_peserta(){
		$data = $this->ajax_models->ajax_get_seminar_liked_by_peserta();
		$this->json_verify($data, 200);
	}

	function get_persentase($args){
		if($args == 'seminar') {
			$data = $this->ajax_models->ajax_get_persentase_seminar();
		} else if($args == 'pengguna') {
			$data = $this->ajax_models->ajax_get_persentase_pengguna();
		} else if($args == 'sentimen') {
			$data = $this->ajax_models->ajax_get_persentase_sentimen();
		} else {
			$this->json_verify(['response' => 'Oops'], 404);	
			
		}
		$this->json_verify($data, 200);
	}

}
