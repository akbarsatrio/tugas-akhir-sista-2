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

	function ajax_get_users(){
		$get_register = $this->db->select("{$this->table}.month_created as period, COUNT(*) as total")
		->from("{$this->table}")
		->group_by('period')
		->order_by('period', 'ASC')
		->get()
		->result();

		$get_unverified = $this->db->select("{$this->table}.is_verified as is_verified, {$this->table}.month_created as period, COUNT(case is_verified when 0 then true else null end) as total")
		->from("{$this->table}")
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
}
