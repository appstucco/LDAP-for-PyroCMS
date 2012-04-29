<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * LDAP Model Class
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

class Ldap_m extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	//get all items
	public function get_settings()
	{
		$sql = "SELECT * 
				FROM ".$this->db->dbprefix('settings_ldap')."";

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function add_settings($data){
		
		$this->db->set('uid', $data['uid']);
		$this->db->set('pass', $data['pass']);
		$this->db->set('host', $data['host']);
		$this->db->set('basehost', $data['basehost']);
		$this->db->set('ip', $data['ip']);
		$this->db->set('port', $data['port']);
		$this->db->set('ou', htmlspecialchars_decode($data['ou']));
		$this->db->set('dc', $data['dc']);
		$this->db->set('use_AD', $data['use_AD']);

       $this->db->insert('settings_ldap');
	   return $this->db->insert_id();
	}
	
	public function update_settings($input){
			
		$data = array(
               'uid' => $input['uid'],
               'pass' => $input['pass'],
               'host' => $input['host'],
               'basehost' => $input['basehost'],
               'ip' => $input['ip'],
               'port' => $input['port'],
               'ou' => htmlspecialchars_decode($input['ou']),
               'dc' => $input['dc'],
               'use_AD' => $input['use_AD'],
            );

		$this->db->where('id', $input['id']);
		$this->db->update('settings_ldap', $data);
		
	}
	


}
