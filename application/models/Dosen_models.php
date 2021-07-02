<?php

class Dosen_models extends CI_Model{
	protected $dosen = 'dosen';

	function get_dosen($where = []) {
		$this->db->select("{$this->dosen}.*")
		->from("{$this->dosen}");
		if($where != NULL) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	function put_dosen($data, $where = []){
		return $this->db->update("{$this->dosen}", $data, $where) ? true : false;
	}

	function post_dosen($data) {
		return $this->db->insert("{$this->dosen}", $data) ? true : false;
	}

	function delete_dosen($where = []) {
		return $this->db->delete("{$this->dosen}", $where) ? true : false;
	}
}
