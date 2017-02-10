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

$dictionary['C_Opplines'] = array(
	'table'=>'c_opplines',
	'audited'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_NAME',
    'type' => 'name',
    'link' => true,
    'dbType' => 'varchar',
    'len' => '255',
    'unified_search' => false,
    'full_text_search' => 
    array (
      'boost' => 3,
    ),
    'required' => false,
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'merge_filter' => 'disabled',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'calculated' => false,
    'size' => '20',
  ),
  'price' => 
  array (
    'required' => true,
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
    'audited' => false,
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
  'quatity' => 
  array (
    'required' => true,
    'name' => 'quatity',
    'vname' => 'LBL_QUATITY',
    'type' => 'int',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '5',
    'size' => '20',
    'enable_range_search' => false,
    'disable_num_format' => '',
    'min' => 0,
    'max' => false,
    'validation' => 
    array (
      'type' => 'range',
      'min' => 0,
      'max' => false,
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
    'audited' => false,
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
VardefManager::createVardef('C_Opplines','C_Opplines', array('basic','team_security','assignable'));