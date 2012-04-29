<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * LDAP Module
 * details.php
 * Controls installation of LDAP/AD module to PyroCMS
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

class Module_Ldap extends Module {

	public $version = '1.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Ldap'
			),
			'description' => array(
				'en' => 'AD/LDAP Settings config for integration.'
			),
			'frontend' => FALSE,
			'backend' => TRUE,
			'menu' => 'utilities'
		);
	}

	public function install()
	{
		$this->dbforge->drop_table('ldap');
		
		$settings_ldap = "
			CREATE TABLE ".$this->db->dbprefix('settings_ldap')." (
			`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`uid` VARCHAR( 255 ) NULL ,
			`pass` VARCHAR( 255 ) NULL ,
			`host` VARCHAR( 255 ) NULL ,
			`basehost` VARCHAR( 255 ) NULL ,
			`ip` VARCHAR( 255 ) NULL ,
			`port` VARCHAR( 10 ) NULL ,
			`ou` VARCHAR( 255 ) NULL ,
			`dc` VARCHAR( 255 ) NULL ,
			`use_AD` INT( 1 ) NOT NULL DEFAULT '0'
			) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT = 'Contains a config of AD/LDAP';
		";
		
		if($this->db->query($settings_ldap)){
			return TRUE;
		}
	}

	public function uninstall()
	{
		$this->dbforge->drop_table('settings_ldap');
		$this->db->delete('settings', array('module' => 'Ldap'));
		{
			return TRUE;
		}
		
		
	}


	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}

	public function help()
	{
		// Return a string containing help info
		// You could include a file and return it here.
		return "No documentation has been added for this module.<br />Contact the module developer for assistance.";
	}
}
/* End of file details.php */