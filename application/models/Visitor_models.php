<?php

class Visitor_models extends CI_Model {
	protected $table = 'tbl_visitors';

	function ajax_get_visitor(){
		$get = $this->db->select("{$this->table}.visitor_ip as ip, {$this->table}.created_at as period, COUNT(*) as total, COUNT(DISTINCT {$this->table}.visitor_ip) as unique_visitor")
		->from("{$this->table}")
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
		$get = $this->db->get($this->table)
		->num_rows();
		return $get;
	}

	function get_recent_visitor($limit = NULL){
		$get = $this->db->select("{$this->table}.visitor_ip as ip, {$this->table}.visitor_time as time,")
		->from("{$this->table}")
		->order_by('id_visitor', 'DESC')
		->limit($limit)
		->get()
		->result();
		return $get;
	}

}
