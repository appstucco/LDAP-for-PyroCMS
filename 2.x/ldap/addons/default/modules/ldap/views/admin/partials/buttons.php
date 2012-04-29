<?php
/**
 * LDAP Buttons Partial
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
<?php if(isset($buttons) && is_array($buttons)): ?>

	<?php foreach($buttons as $button ): ?>
		<?php if( $button == 'save' ): ?>
			<button type="submit" name="btnAction" value="save" class="button">
				<span>
					<?php echo lang('buttons.save');?>
				</span>
			</button>

		<?php elseif( $button == 'custom_button' ): ?>
			<button type="submit" name="btnAction" value="custom_button" class="button">
				<span>
					<?php echo lang('sample.custom_button');?>
				</span>
			</button>
			
		<?php endif; ?>
	<?php endforeach; ?>

<?php endif; ?>
