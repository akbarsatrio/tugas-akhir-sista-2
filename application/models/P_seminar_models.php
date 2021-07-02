<?php

class P_seminar_models extends CI_Model{
	protected $table = 'peserta_seminar';

	function get_p_seminar($where = []) {
		$this->db->select("{$this->table}.*")
		->from("{$this->table}");
		if($where != NULL) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	function put_p_seminar($data, $where = []){
		return $this->db->update("{$this->table}", $data, $where) ? true : false;
	}

	function post_p_seminar($data) {
		return $this->db->insert("{$this->table}", $data) ? true : false;
	}

	function delete_p_seminar($where = []) {
		return $this->db->delete("{$this->table}", $where) ? true : false;
	}
}
