<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * CI_Loader
	 *
	 * @var	CI_Loader
	 */
	public $load;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');

		$this->load->library('form_validation');
		$this->load->model([
			'user_models',
			'menu_models',
			'jadwal_models',
			'p_seminar_models',
			'dosen_models',
			'kategori_models'
		]);
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	public function get_menu($role = NULL){
		$data_menu = $this->menu_models->get_menu($role)->result();
		$data_sub_menu = $this->menu_models->get_sub_menu($role)->result();
		$menu = [];
		foreach ($data_menu as $m) { $menu[$m->id_menu] = $m; $m->submenu = array();}
		foreach ($data_sub_menu as $sm) {$menu[$sm->parent_id]->submenu[] = $sm;}
		return $menu;
	}

	public function auto_validation($arr = [], $rule = []) {
		foreach(array_keys($arr) as $key) $this->form_validation->set_rules("$key", ucfirst($key), $rule[$key]);
		return $this->form_validation->run() == FALSE ? false : true;
	}

	public function alert_template($msg = '', $color = 'primary') {
		$alert = "<div class='alert alert-{$color} alert-dismissible fade show' role='alert'>{$msg}<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		return $alert;
	}

	public function gatekeeper($to = NULL){
		if($this->session->userdata('is_login') != TRUE) {
			redirect("login?redirect={$to}");
		} else {
			return true;
		}
	}

	public function access($menu_link, $role_id = NULL){
		$check_valid_menu = $this->menu_models->get_menu_access(['menu_link' => $menu_link, 'role_id' => $role_id ?? 2])->result();
		if($check_valid_menu){
			return true;
		} else {
			redirect();
		}
	}

}
