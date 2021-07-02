<?php

class Kategori_models extends CI_Model{
	protected $kategori = 'kategori_seminar';

	function get_kategori($where = []) {
		$this->db->select("{$this->kategori}.*")
		->from("{$this->kategori}");
		if($where != NULL) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	function put_kategori($data, $where = []){
		return $this->db->update("{$this->kategori}", $data, $where) ? true : false;
	}

	function post_kategori($data) {
		return $this->db->insert("{$this->kategori}", $data) ? true : false;
	}

	function delete_kategori($where = []) {
		return $this->db->delete("{$this->kategori}", $where) ? true : false;
	}
}
