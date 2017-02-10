<?php
$module_name = 'C_Sponsors';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'is_used' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_USED',
    'width' => '5%',
  ),
  'sponsor_percent' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_SPONSOR_PERCENT',
    'width' => '10%',
    'default' => true,
  ),
  'amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'issue_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ISSUE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'expired_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EXPIRED_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'campaign_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CAMPAIGN_NAME',
    'id' => 'CAMPAIGN_ID',
    'width' => '10%',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
