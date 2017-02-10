<?php 
			
$admin_option_defs = array();

$admin_option_defs['Administration']['config1'] = array(
				'icon_AdminMobile',
				'Gateway Settings',
				"Configures a provider's gateway details",
				'./index.php?module=Administration&action=smsConfig'
		); 

$admin_option_defs['Administration']['config2']= array(
				'icon_AdminMobile',
				'SMS & Modules Relationship',
				'Customize the related modules for SMS module',
				'./index.php?module=Administration&action=customUsage'
		);
		
$admin_option_defs['Administration']['config3'] = array(
				'icon_AdminMobile',
				'Field selector',
				'Select phone numbers that are SMS capable',
				'./index.php?module=Administration&action=smsPhone'
		);  
		 
// $admin_option_defs['Administration']['config5']= array(
				// 'icon_AdminMobile',
				// 'SMS Macro',
				// 'Sets SMS macro for every module',
				// './index.php?module=Administration&action=smsProvider&option=macro'
		// );
				
$admin_group_header[]= array(
				'Short Message Service (SMS)',
				'',
				false,
				$admin_option_defs, 
				'A module that integrates short messaging service.'
		);
		
?>