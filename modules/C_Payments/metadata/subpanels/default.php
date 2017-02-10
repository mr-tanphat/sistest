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


$module_name='C_Payments';
$subpanel_layout = array(
	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateButton'),
		array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
	),

	'where' => '',

	'list_fields' => array(
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'payment_amount' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_PAYMENT_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'sortable' => false,
  ),
  'remain' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_REMAIN',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'sortable' => false,
  ),
  
  'payment_method' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_PAYMENT_METHOD',
    'width' => '15%',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_STATUS',
    'width' => '15%',
  ),
  'payment_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_PAYMENT_TYPE',
    'width' => '15%',
  ),
  'payment_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'team_name' => 
  array (
    'type' => 'relate',
    'vname' => 'LBL_TEAM',
    'width' => '15%',
    'default' => true,
  ),
  'currency_id' => 
  array (
    'name' => 'currency_id',
    'usage' => 'query_only',
  ),
	),
);

?>