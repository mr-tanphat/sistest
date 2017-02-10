<?php 
 //WARNING: The contents of this file are auto-generated

 
			
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
		


/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

$admin_option_defs = array();

$admin_option_defs['Administration']['license_configuration_link'] = array(
    '',
    'LBL_LICENSE_CONFIGURATION',
    'LBL_LICENSE_CONFIGURATION_DESC',
    './index.php?module=bc_survey&action=license'
);

$admin_option_defs['Administration']['healthstatus'] = array(
    '',
     'LBL_HEALTH_CHECK',
    'LBL_HEALTH_CHECK_DESC',
    'index.php?module=bc_survey&action=healthstatus'
);

$admin_option_defs['Administration']['bc_survey_automizer'] = array(
    '',
     'LBL_SURVEY_AUTOMIZER',
    'LBL_AUTOMIZER_DESC',
    'index.php?module=bc_survey_automizer&action=ListView'
);
$admin_option_defs['Administration']['survey_smtp'] = array(
    '',
     'LBL_SURVEY_SMTP_SETTING',
    'LBL_SURVEY_SMTP_SETTING_DESC',
    'index.php?module=Administration&action=surveysmtp'
);
$admin_group_header[] = array(
    'LBL_SURVEY_CONF_TITLE',
    '',
    false,
    $admin_option_defs,
    'LBL_LICENSE_CONFIGURATION_TITLE'
);

?>