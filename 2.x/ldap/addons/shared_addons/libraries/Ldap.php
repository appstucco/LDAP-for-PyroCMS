<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * LDAP Library Class
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

class Ldap {

	/**
	 * ldapAuthenticate function
	 * @param array $ldapconfig   The ldap configuration from the db 
	 * @return object $ds ldap resource
	 * @return boolean false
	 */
	public function ldapAuthenticate($ldapconfig) {
	
	        $ds=@ldap_connect($ldapconfig['host'], $ldapconfig['port']) or die("Cannot connect to ".$ldapconfig['host']);
	        ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
	        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
	        
	        if($ds){
	        	//echo "Connected to ".$ldapconfig['host']."<br>";
				
	        	if($ldapconfig['use_AD'] == true){
	        		//$bind = ldap_bind($ds, $ldapconfig['uid']."@".$ldapconfig['basehost'], $ldapconfig['pass']) or die("LDAP Error: ".ldap_error($ds));
	        		try{
	        			$bind = @ldap_bind($ds, $ldapconfig['uid']."@".$ldapconfig['basehost'], $ldapconfig['pass']);
					}
					catch (Exception $e){
						$error = "Unable to bind: " . $e->getMessage();
						return false;
					}
	        	}
	        	else{
	        		//$bind = ldap_bind($ds, "cn=".$ldapconfig['uid'].",".$ldapconfig['basedn'], $ldapconfig['pass']) or die("LDAP Error: ".ldap_error($ds));
	        		try{	
	        			$bind = @ldap_bind($ds, "cn=".$ldapconfig['uid'].",".$ldapconfig['basedn'], $ldapconfig['pass']);
					}
					catch (Exception $e){
						$error = "Unable to bind: " . $e->getMessage();
						return false;
					}					
	        	}
	        	
	        	if($bind){
	        		//echo "Successfully logged into ".$ldapconfig['host'];
	        		return $ds;
	        	}
	        	else{
	        		return false;
	        	}
	        }
	        else{
	        	return false;
	        }
	
	}
	
	public function ldapUnbind($ds){
		ldap_unbind($ds);
		return;
	}
	
	public function ldapClose($ds){
		ldap_close($ds);
		return;
	}
	
	public function ldapSearch($conn,$basedn,$filter,$attr){

		$search = ldap_search($conn,$basedn,$filter,$attr);
		return $search;
	}
	
	public function ldapGetEntries($conn, $search){
		
		$entries = ldap_get_entries($conn, $search);
		return $entries;
	}

}

/* End of file Ldap.php */