<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/



$subpanel_layout = array(
	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Quotes'),
	),

	'where' => '',
	
	

	'list_fields' => array(
		'name'=>array(
			'vname' => 'LBL_LIST_QUOTE_NAME',
			'widget_class' => 'SubPanelDetailViewLink',
			'width' => '40%',
		),
		'account_name'=>array(
			'vname' => 'LBL_LIST_ACCOUNT_NAME',
			'widget_class' => 'SubPanelDetailViewLink',
			'module' => 'Accounts',
			'width' => '32%',
			'target_record_key' => 'account_id',
			'target_module' => 'Accounts',
            'sortable' => false,
		),
		'total_usdollar'=>array(
			'vname' => 'LBL_LIST_AMOUNT_USDOLLAR',
			'width' => '10%',
		),
		'date_quote_expected_closed'=>array(
			'name' => 'date_quote_expected_closed',
			'vname' => 'LBL_LIST_DATE_QUOTE_EXPECTED_CLOSED',
			'width' => '10%',
		),
		'edit_button'=>array(
			'vname' => 'LBL_EDIT_BUTTON',
			'widget_class' => 'SubPanelEditButton',
		 	'module' => 'Quotes',
	 		'width' => '4%',
		),
		'currency_id'=>array(
			'usage'=>'query_only',
		),
	),
);
?>