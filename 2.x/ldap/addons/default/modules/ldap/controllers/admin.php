<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * LDAP Admin Controller
 * Controls generic ability to authenticate, bind, and search LDAP/AD
 * 
 * Copyright 2012 AppStucco. This file is part of AppStucco LDAP module bundle. 
 * You should have received a copy of the software license 
 * along with this file. See the file /LICENSE.TXT
 * 
 * If you have questions write an e-mail to info@appstucco.com
 * 
 * @author AppStucco <info@appstucco.com>
 * @link   http://www.appstucco.com/
 * @copyright Copyright AppStucco 2012
 * @version 1.0.0
 * @license MIT License
 * @package LDAP
 * 
 */

class Admin extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();

		// Load all the required classes
		$this->load->model('ldap_m');
		$this->load->library('form_validation');
		$this->lang->load('ldap');

		// Set the validation rules
		/*$this->item_validation_rules = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim|max_length[255]|required'
			),
			array(
				'field' => 'slug',
				'label' => 'Slug',
				'rules' => 'trim|max_length[255]|required'
			)
		);*/

		$this->template->set_partial('shortcuts', 'admin/partials/shortcuts')
						->append_metadata(js('admin.js', 'ldap'))
						->append_metadata(css('admin.css', 'ldap'));
	}

	/**
	 * List all items
	 */
	public function index()
	{

		if(! $this->ion_auth->logged_in() ){
			$this->session->set_flashdata('error', lang('user_logged_out'). "... Please Login to contine.");
			redirect('admin/login');
		}
				
		$items = $this->ldap_m->get_settings();

		$this->form_validation->set_rules('uid', 'UID', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');
		$this->form_validation->set_rules('basehost', 'Base Host', 'trim|required');
		$this->form_validation->set_rules('ip', 'IP Address', 'trim|required');
		$this->form_validation->set_rules('port', 'IP', 'trim|required');
		$this->form_validation->set_rules('ou', 'OU', 'trim|required');
		$this->form_validation->set_rules('DC', 'DC', 'trimrequired');

		if ($this->form_validation->run() == FALSE){
			// Load the view
			$this->data->items =& $items;
			$this->template->title($this->module_details['name'])
							->build('admin/index', $this->data);			
		}
		else{
			if(isset($_GET['action']) && $_GET['action']=='save'){
					
				if(isset($_POST['id']) && $_POST['id'] != ""){
					$this->ldap_m->update_settings($_POST);
				}
				else{
					$this->ldap_m->add_settings($_POST);
				}
				
				$this->session->set_flashdata('success', "LDAP/AD config updated!");	
				redirect('admin/ldap');
				
				
			}			
		}	

		

	}

}
