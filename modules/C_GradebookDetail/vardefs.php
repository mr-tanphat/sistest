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

$dictionary['C_GradebookDetail'] = array(
	'table'=>'c_gradebookdetail',
	'audited'=>false,
		'duplicate_merge'=>true,
		'fields'=>array (
  'score1' => 
  array (
    'name' => 'score1',
    'vname' => 'LBL_SCORE1',
    'massupdate' => 0,
    'importable' => 'true',
    'reportable' => true,
    'type' => 'varchar',
    'len' => '30',
  ),
  'score2' => 
  array (
    'name' => 'score2',
    'vname' => 'LBL_SCORE2',
    'massupdate' => 0,
    'importable' => 'true',
    'reportable' => true,
    'type' => 'varchar',
    'len' => '30',
  ),
  'score3' => 
  array (
    'name' => 'score3',
    'vname' => 'LBL_SCORE3',
    'massupdate' => 0,
    'importable' => 'true',
    'reportable' => true,
    'type' => 'varchar',
    'len' => '30',
  ),
  'score4' => 
  array (
    'name' => 'score4',
    'vname' => 'LBL_SCORE4',
    'massupdate' => 0,
    'importable' => 'true',
    'reportable' => true,
    'type' => 'varchar',
    'len' => '30',
  ),
  'score5' => 
  array (
    'name' => 'score5',
    'vname' => 'LBL_SCORE5',
    'massupdate' => 0,
    'importable' => 'true',
    'reportable' => true,
    'type' => 'varchar',
    'len' => '30',
  ),
  'total1' => 
  array (
    'name' => 'total1',
    'vname' => 'LBL_TOTAL1',
    'massupdate' => 0,
    'importable' => 'true',
    'reportable' => true,
    'type' => 'varchar',
    'len' => '550',
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
VardefManager::createVardef('C_GradebookDetail','C_GradebookDetail', array('basic','team_security','assignable'));