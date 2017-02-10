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

$dictionary['C_Sponsors'] = array(
    'table'=>'c_sponsors',
    'audited'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (
        'is_used' => 
        array (
            'required' => false,
            'name' => 'is_used',
            'vname' => 'LBL_IS_USED',
            'type' => 'bool',
            'massupdate' => 0,
            'default' => '0',
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
            'len' => '255',
            'size' => '20',
        ),
        'expired_date' => 
        array (
            'required' => false,
            'name' => 'expired_date',
            'vname' => 'LBL_EXPIRED_DATE',
            'type' => 'date',
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
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ),
        'issue_date' => 
        array (
            'required' => false,
            'name' => 'issue_date',
            'vname' => 'LBL_ISSUE_DATE',
            'type' => 'date',
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
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
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
            'len' => 13,
            'size' => '20',
            'enable_range_search' => true,
            'options' => 'numeric_range_search_dom',
            'precision' => 2,
        ),
        'sponsor_percent' => 
        array (
            'required' => false,
            'name' => 'sponsor_percent',
            'vname' => 'LBL_SPONSOR_PERCENT',
            'type' => 'decimal',
            'len' => 7,
            'precision' => 2,
        ),
        //Custom Relationship JUNIOR. Payment enrollment  - Sponsor (1-n)  By Nhi Vo
        'enrollment_name' => array(
            'required'  => false,
            'source'    => 'non-db',
            'name'      => 'enrollment_name',
            'vname'     => 'LBL_ENROLLMENT_NAME',
            'type'      => 'relate',
            'rname'     => 'name',
            'id_name'   => 'enrollment_id',
            'join_name' => 'enrollment',
            'link'      => 'enrollment_link',
            'table'     => 'j_payment',
            'isnull'    => 'true',
            'module'    => 'J_Payment',
        ),

        'enrollment_id' => array(
            'name'              => 'enrollment_id',
            'rname'             => 'id',
            'vname'             => 'LBL_ENROLLMENT_ID',
            'type'              => 'id',
            'table'             => 'j_payment',
            'isnull'            => 'true',
            'module'            => 'J_Payment',
            'dbType'            => 'id',
            'reportable'        => false,
            'massupdate'        => false,
            'duplicate_merge'   => 'disabled',
        ),

        'enrollment_link' => array(
            'name'          => 'enrollment_link',
            'type'          => 'link',
            'relationship'  => 'j_payment_c_sponsor',
            'module'        => 'J_Payment',
            'bean_name'     => 'J_Payment',
            'source'        => 'non-db',
            'vname'         => 'LBL_ENROLLMENT_NAME',
        ),

        //Custom Relationship JUNIOR. Payment Campaign  - Sponsor (1-n)  Right Side (n)
        'campaign_id' => array(
            'name' => 'campaign_id',
            'vname' => 'LBL_CAMPAIGN_ID',
            'type' => 'id',
            'table'=> 'Campaign',
            'isnull'=> 'true',
            'module'=> 'Campaign',
            'required'=>false,
            'reportable'=>false,
            'comment' => ''
        ),

        'campaign_name' => array(
            'name' => 'campaign_name',
            'rname' => 'name',
            'id_name' => 'campaign_id',
            'vname' => 'LBL_CAMPAIGN_NAME',
            'type' => 'relate',
            'link' => 'campaign_link',
            'table' => 'campaigns',
            'isnull' => 'true',
            'module' => 'Campaigns',
            'dbType' => 'varchar',
            'len' => 'id',
            'reportable'=>true,
            'source' => 'non-db',
        ),

        'campaign_link' => array(
            'name' => 'campaign_link',
            'type' => 'link',
            'relationship' => 'campaign_sponsors',
            'link_type' => 'one',
            'side' => 'right',
            'source' => 'non-db',
            'vname' => 'LBL_CAMPAIGN_NAME',
        ),
    ),
    'indices' => array (
        array(
            'name' => 'idx_cont_name',
            'type' => 'index',
            'fields' => array('name', 'deleted')
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
VardefManager::createVardef('C_Sponsors','C_Sponsors', array('basic','team_security','assignable'));