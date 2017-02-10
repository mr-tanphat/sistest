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

$dictionary['J_StudentSituations'] = array(
	'table'=>'j_studentsituations',
	'audited'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
  'type' => 
  array (
    'required' => true,
    'name' => 'type',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
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
    'len' => 100,
    'size' => '20',
    'options' => 'type_student_situation_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'hours_enroll' => 
  array (
    'required' => true,
    'name' => 'hours_enroll',
    'vname' => 'LBL_HOURS_ENROLL',
    'type' => 'decimal',
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
    'len' => '13',
    'size' => '20',
    'enable_range_search' => false,
    'precision' => '2',
  ),
  'hours_outstanding' => 
  array (
    'required' => true,
    'name' => 'hours_outstanding',
    'vname' => 'LBL_HOURS_OUTSTANDING',
    'type' => 'decimal',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'false',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '13',
    'size' => '20',
    'enable_range_search' => false,
    'precision' => '2',
  ),
  'hour_delay' => 
  array (
    'required' => false,
    'name' => 'hour_delay',
    'vname' => 'LBL_HOUR_DELAY',
    'type' => 'decimal',
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
    'len' => '13',
    'size' => '20',
    'enable_range_search' => false,
    'precision' => '2',
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
VardefManager::createVardef('J_StudentSituations','J_StudentSituations', array('basic','team_security','assignable'));