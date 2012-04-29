<?php
/**
 * LDAP Admin Index View
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
<style type="text/css">
	label { width: 23% !important; }
</style>
<section class="title">
	<h4>LDAP Settings</h4>
</section>

<section class="item">
<?php echo form_open('admin/ldap?action=save', 'class="crud"');?>
<table style="width: 450px; border: 1px solid #eee;">
	<tr>
		<td>User ID:</td>
		<td><input type=text name="uid" value="<?php echo (isset($items[0]->uid)) ? $items[0]->uid : ""; ?>"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type=password name="pass" value="<?php echo (isset($items[0]->pass)) ? $items[0]->pass : ""; ?>" class="frmPass"></td>
	</tr>
	<tr>
		<td>Hostname</td>
		<td><input type=text name="host" value="<?php echo (isset($items[0]->host)) ? $items[0]->host : ""; ?>"></td>
	</tr>
	<tr>
		<td>Base Host</td>
		<td><input type=text name="basehost" value="<?php echo (isset($items[0]->basehost)) ? $items[0]->basehost : ""; ?>"></td>
	</tr>
	<tr>
		<td>IP Address</td>
		<td><input type=text name="ip" value="<?php echo (isset($items[0]->ip)) ? $items[0]->ip : ""; ?>"></td>
	</tr>
	<tr>
		<td>Port:</td>
		<td><input type=text name="port" value="<?php echo (isset($items[0]->port)) ? $items[0]->port : ""; ?>"></td>
	</tr>
	<tr>
		<td>OU:</td>
		<td><input type=text name="ou" value="<?php echo (isset($items[0]->ou)) ? htmlspecialchars($items[0]->ou) : ""; ?>"></td>
	</tr>
	<tr>
		<td>DC:</td>
		<td><input type=text name="dc" value="<?php echo (isset($items[0]->dc)) ? $items[0]->dc : ""; ?>"></td>
	</tr>
	<tr>
		<td>Use Active Directory?</td>
		<td>
			
			<?php
				$options = array(
								'1' => 'YES',
								'0' => 'NO',
								
							);
							
				$selected = "";			
				if(isset($items[0]->use_AD)){
					$selected = $items[0]->use_AD;	
				}
							
				echo form_dropdown('use_AD', $options, $selected);
			?>

		</td>
	</tr>
	<tr>
		<td colspan="2">
			<button class="btn blue" value="save" name="btnAction" type="submit"><span>Save</span></button>
				&nbsp;&nbsp;
			<a class="btn-more" href="/admin/ldap">Cancel</a>
		</td>
	</tr>
</table>
</section>

<?php 
 if(isset($items[0]->id)){
?>
<input type="hidden" name="id" value="<?php echo $items[0]->id; ?>">
<?php } ?>

<?php echo form_close(); ?>