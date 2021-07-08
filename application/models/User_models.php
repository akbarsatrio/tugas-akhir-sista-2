<?php

class User_models extends CI_Model{
	protected $table = 'tbl_users';

	function get_user($where = []) {
		$this->db->select("{$this->table}.*")
		->from("{$this->table}");
		if($where != NULL) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	function put_user($data, $where = []){
		return $this->db->update("{$this->table}", $data, $where) ? true : false;
	}

	function post_user($data) {
		return $this->db->insert("{$this->table}", $data) ? true : false;
	}

	function delete_user($where = []) {
		return $this->db->delete("{$this->table}", $where) ? true : false;
	}
}
