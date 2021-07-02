<?php

class Menu_models extends CI_Model {
	protected $menu = 'tbl_menu';
	protected $access_menu = 'tbl_menu_access';
	protected $role = 'tbl_role';

	function get_menu($role_id = NULL){
		$this->db->select("{$this->menu}.*")
		->from($this->access_menu)
		->join($this->menu, "{$this->menu}.id_menu = {$this->access_menu}.menu_id")
		->join($this->role, "{$this->role}.id_role = {$this->access_menu}.role_id")
		->where("{$this->menu}.parent_id =", "0");
		if($role_id != NULL){
			$this->db->where("{$this->access_menu}.role_id =", $role_id);
		} else {
			$this->db->where("{$this->access_menu}.role_id =", 2);
		}
		return $this->db->get();
	}

	function get_menu_access($where){
		$this->db->select("{$this->menu}.*")
		->from($this->access_menu)
		->join($this->menu, "{$this->menu}.id_menu = {$this->access_menu}.menu_id")
		->join($this->role, "{$this->role}.id_role = {$this->access_menu}.role_id")
		->where("{$this->menu}.parent_id =", "0");
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get();
	}

	function get_sub_menu($role_id = NULL){
		$this->db->select("{$this->menu}.*")
		->from($this->access_menu)
		->join($this->menu, "{$this->menu}.id_menu = {$this->access_menu}.menu_id")
		->join($this->role, "{$this->role}.id_role = {$this->access_menu}.role_id")
		->where("{$this->menu}.parent_id >", "0");
		if($role_id != NULL){
			$this->db->where("{$this->access_menu}.role_id =", $role_id);
		} else {
			$this->db->where("{$this->access_menu}.role_id =", 2);
		}
		return $this->db->get();
	}
}
