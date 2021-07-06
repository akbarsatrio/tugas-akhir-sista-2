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
		$data = $this->visitor_models->ajax_get_visitor();
		$this->json_verify($data, 200);
	}

	function get_user(){
		$data = $this->user_models->ajax_get_users();
		$this->json_verify($data, 200);
	}

}
