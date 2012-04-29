<?php
/**
 * LDAP Shortcuts Partial
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
?>
<nav id="shortcuts">
	<h6><?php echo lang('cp_shortcuts_title'); ?></h6>
	
	<ul>
		<li><?php echo anchor('admin/ldap'	, 'LDAP Settings') ?></li>
		<!--<li><?php echo anchor('admin/sample/create_item'	, lang('sample.create_item'), 'class="add"') ?></li>-->
	</ul>
	<br class="clear-both" />
</nav>
