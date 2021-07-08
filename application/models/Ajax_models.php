<?php

class Ajax_models extends CI_Model{
	protected $seminar = 'seminar_ta';
	protected $kategori_s = 'kategori_seminar';
	protected $peserta_s = 'peserta_seminar';
	protected $dosen = 'dosen';
	protected $user = 'tbl_users';
	protected $visitor = 'tbl_visitors';
	protected $penilaian = 'detail_penilaian';

	function ajax_get_visitor(){
		$get = $this->db->select("{$this->visitor}.visitor_ip as ip, {$this->visitor}.created_at as period, COUNT(*) as total, COUNT(DISTINCT {$this->visitor}.visitor_ip) as unique_visitor")
		->from("{$this->visitor}")
		->group_by('period')
		->order_by('period', 'ASC')
		->get()
		->result();
		$data['visitor'] = [];
		$data['unique_visitor'] = [];
		foreach ($get as $key => $value) {
			array_push($data['visitor'], ['x' => $value->period, 'y' => $value->total]);
			array_push($data['unique_visitor'], ['x' => $value->period, 'y' => $value->unique_visitor]);
		}
		return $data;
	}

	function count_visitor(){
		$get = $this->db->get($this->visitor)
		->num_rows();
		return $get;
	}

	function get_recent_visitor($limit = NULL){
		$get = $this->db->select("{$this->visitor}.visitor_ip as ip, {$this->visitor}.visitor_time as time,")
		->from("{$this->visitor}")
		->order_by('id_visitor', 'DESC')
		->limit($limit)
		->get()
		->result();
		return $get;
	}

	function ajax_get_users(){
		$get_register = $this->db->select("{$this->user}.month_created as period, COUNT(*) as total")
		->from("{$this->user}")
		->group_by('period')
		->order_by('period', 'ASC')
		->get()
		->result();

		$get_unverified = $this->db->select("{$this->user}.is_verified as is_verified, {$this->user}.month_created as period, COUNT(case is_verified when 0 then true else null end) as total")
		->from("{$this->user}")
		->group_by('period')
		->order_by('period', 'ASC')
		->get()
		->result();

		$data['register'] = [];
		$data['unverified'] = [];
		foreach ($get_register as $key => $value) array_push($data['register'], ['x' => explode('-', explode(' ', $value->period)[0])[0]."-".explode('-', explode(' ', $value->period)[0])[1], 'y' => $value->total]);
		foreach ($get_unverified as $key => $value) array_push($data['unverified'], ['x' => explode('-', explode(' ', $value->period)[0])[0]."-".explode('-', explode(' ', $value->period)[0])[1], 'y' => $value->total]);

		return $data;
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

	function ajax_get_persentase_seminar(){
		$get_data = $this->db->select("*, {$this->kategori_s}.id AS kategori_id, {$this->kategori_s}.nama AS kategori_nama, COUNT({$this->seminar}.id) AS total")
		->from("{$this->kategori_s}")
		->join("{$this->seminar}", "{$this->seminar}.kategori_seminar_id = {$this->kategori_s}.id")
		->group_by("{$this->kategori_s}.nama")
		->order_by("{$this->kategori_s}.nama", 'ASC')
		->get()
		->result();

		$data['series'] = [];
		$data['labels'] = [];
		foreach ($get_data as $value) {
			array_push($data['series'], (int) $value->total);
			array_push($data['labels'], $value->kategori_nama);
		}
		return $data;
	}

	function ajax_get_persentase_pengguna(){
		$get_data = $this->db->select("*, COUNT(*) AS total")
		->from("{$this->user}")
		->group_by("{$this->user}.user_angkatan")
		->order_by("{$this->user}.user_angkatan", 'ASC')
		->get()
		->result();

		$data['series'] = [];
		$data['labels'] = [];
		foreach ($get_data as $value) {
			array_push($data['series'], (int) $value->total);
			array_push($data['labels'], $value->user_angkatan);
		}
		return $data;
	}

	function ajax_get_persentase_kehaidran(){
		$get_data = $this->db->select("*, {$this->kategori_s}.id AS kategori_id, {$this->kategori_s}.nama AS kategori_nama, COUNT({$this->seminar}.id) AS total")
		->from("{$this->kategori_s}")
		->join("{$this->seminar}", "{$this->seminar}.kategori_seminar_id = {$this->kategori_s}.id")
		->group_by("{$this->kategori_s}.nama")
		->order_by("{$this->kategori_s}.nama", 'ASC')
		->get()
		->result();

		$data['series'] = [];
		$data['labels'] = [];
		foreach ($get_data as $value) {
			array_push($data['series'], (int) $value->total);
			array_push($data['labels'], $value->kategori_nama);
		}
		return $data;
	}

	function ajax_get_persentase_sentimen(){
		$get_data = $this->db->select("*, AVG({$this->penilaian}.nilai) AS total")
		->from("{$this->penilaian}")
		->get()
		->result();

		$data['series'] = [];
		$data['labels'] = [];
		foreach ($get_data as $value) {
			array_push($data['series'], (int) $value->total);
			switch ($value->total) {
				case $value->total >= 85:
					$msg = 'Sangat Baik';
					break;
				case $value->total >= 75:
					$msg = 'Baik';
					break;
				case $value->total >= 50:
					$msg = 'Buruk';
					break;
				case $value->total < 50:
					$msg = 'Sangat Buruk';
					break;
				default:
					break;
			}
			array_push($data['labels'], $msg);
		}
		return $data;
	}

}
