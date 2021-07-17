<?php

class Penilaian_models extends CI_Model{
	protected $detail_penilaian = 'detail_penilaian';
	protected $penilaian = 'penilaian';
	protected $dosen = 'dosen';
	protected $seminar = 'seminar_ta';

	function get_penilaian($where = []) {
		$this->db->select("{$this->detail_penilaian}.*, {$this->detail_penilaian}.id AS detail_penilaian_id, {$this->penilaian}.nama AS penilaian_nama, {$this->dosen}.nama AS dosen_nama, {$this->seminar}.judul AS judul")
		->from("{$this->detail_penilaian}")
		->join("{$this->penilaian}", "{$this->penilaian}.id = {$this->detail_penilaian}.penilaian_id")
		->join("{$this->dosen}", "{$this->dosen}.id = {$this->detail_penilaian}.dosen_id")
		->join("{$this->seminar}", "{$this->seminar}.id = {$this->detail_penilaian}.seminar_id");
		if($where != NULL) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	function post_penilaian($data) {
		return $this->db->insert("{$this->detail_penilaian}", $data) ? true : false;
	}

	function delete_penilaian($where = []) {
		return $this->db->delete("{$this->detail_penilaian}", $where) ? true : false;
	}
}
