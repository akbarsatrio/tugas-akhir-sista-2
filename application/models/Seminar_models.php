<?php

class Seminar_models extends CI_Model{
	protected $seminar = 'seminar_ta';
	protected $kategori_s = 'kategori_seminar';
	protected $peserta_s = 'peserta_seminar';
	protected $dosen = 'dosen';

	function get_seminar($where = []) {
		$this->db->select("{$this->seminar}.id AS seminar_id, {$this->seminar}.*, {$this->kategori_s}.id, {$this->kategori_s}.nama AS kategori_nama, {$this->dosen}.id, {$this->dosen}.nama AS dosen_nama, d1.nama AS dosen1_nama, d2.nama AS dosen2_nama")
		->from("{$this->seminar}")
		->join("{$this->kategori_s}", "{$this->kategori_s}.id = {$this->seminar}.kategori_seminar_id")
		->join("{$this->dosen}", "{$this->dosen}.id = {$this->seminar}.pembimbing_id")
		->join("{$this->dosen} as d1", "d1.id = {$this->seminar}.penguji1_id")
		->join("{$this->dosen} as d2", "d2.id = {$this->seminar}.penguji2_id");
		if($where != NULL) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	function put_seminar($data, $where = []){
		return $this->db->update("{$this->seminar}", $data, $where) ? true : false;
	}

	function post_seminar($data) {
		return $this->db->insert("{$this->seminar}", $data) ? true : false;
	}

	function delete_seminar($where = []) {
		return $this->db->delete("{$this->seminar}", $where) ? true : false;
	}

	function ajax_get_seminar_liked_by_peserta(){
		$get_data = $this->db->select("*, {$this->kategori_s}.id AS kategori_id, {$this->kategori_s}.nama AS kategori_nama, COUNT({$this->peserta_s}.seminar_id) AS total")
		->from("{$this->kategori_s}")
		->join("{$this->seminar}", "{$this->seminar}.kategori_seminar_id = {$this->kategori_s}.id")
		->join("{$this->peserta_s}", "{$this->peserta_s}.seminar_id = {$this->seminar}.id", "LEFT")
		->group_by("{$this->kategori_s}.nama")
		->order_by("{$this->kategori_s}.nama", 'ASC')
		->get()
		->result();

		$data = [];			
		foreach ($get_data as $value) {
				array_push($data, ['x' => $value->kategori_nama, 'y' => $value->total]);
		}
		return $data;
	}

	function ajax_get_persentase(){
		$get_data = $this->db->select("*, {$this->kategori_s}.id AS kategori_id, {$this->kategori_s}.nama AS kategori_nama, COUNT({$this->peserta_s}.seminar_id) AS total")
		->from("{$this->kategori_s}")
		->join("{$this->seminar}", "{$this->seminar}.kategori_seminar_id = {$this->kategori_s}.id")
		->join("{$this->peserta_s}", "{$this->peserta_s}.seminar_id = {$this->seminar}.id", "LEFT")
		->group_by("{$this->kategori_s}.nama")
		->order_by("{$this->kategori_s}.nama", 'ASC')
		->get()
		->result();

		$data = [];			
		foreach ($get_data as $value) {
				array_push($data, ['x' => $value->kategori_nama, 'y' => $value->total]);
		}
		return $data;
	}
}
