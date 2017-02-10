<?php
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

$dictionary['J_Intenvorydetail'] = array(
	'table'=>'j_intenvorydetail',
	'audited'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
  'quantity' => 
  array (
    'required' => false,
    'name' => 'quantity',
    'vname' => 'LBL_QUANTITY',
    'type' => 'int',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '255',
    'size' => '20',
    'enable_range_search' => false,
    'disable_num_format' => '',
    'min' => false,
    'max' => false,
  ),
  'inventory_id' => 
  array (
    'required' => false,
    'name' => 'inventory_id',
    'vname' => 'LBL_INVENTORY_ID',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '255',
    'size' => '20',
  ),
  'price' => 
  array (
    'required' => false,
    'name' => 'price',
    'vname' => 'LBL_PRICE',
    'type' => 'currency',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 26,
    'size' => '20',
    'enable_range_search' => false,
    'precision' => 6,
  ),
  'currency_id' => 
  array (
    'required' => false,
    'name' => 'currency_id',
    'vname' => 'LBL_CURRENCY',
    'type' => 'currency_id',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 36,
    'size' => '20',
    'dbType' => 'id',
    'studio' => 'visible',
    'function' => 
    array (
      'name' => 'getCurrencyDropDown',
      'returns' => 'html',
    ),
  ),
  'amount' => 
  array (
    'required' => false,
    'name' => 'amount',
    'vname' => 'LBL_AMOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 26,
    'size' => '20',
    'enable_range_search' => false,
    'precision' => 6,
  ),
),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('J_Intenvorydetail','J_Intenvorydetail', array('basic','team_security','assignable'));