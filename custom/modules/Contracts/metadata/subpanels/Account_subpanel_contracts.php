<?php
// created: 2015-02-27 16:50:27
$subpanel_layout['list_fields'] = array (
  'contract_id' =>
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CONTRACT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'module' => 'Contacts',
    'width' => '15%',
    'default' => true,
  ),
  'status' =>
  array (
    'name' => 'status',
    'vname' => 'LBL_LIST_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'total_contract_value' =>
  array (
    'type' => 'currency',
    'vname' => 'LBL_TOTAL_CONTRACT_VALUE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'amount_per_student' =>
  array (
    'type' => 'currency',
    'vname' => 'LBL_AMOUNT_PER_STUDENT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'study_duration' =>
  array (
    'type' => 'decimal',
    'vname' => 'LBL_STUDY_DURATION',
    'width' => '10%',
    'default' => true,
  ),
  'customer_signed_date' =>
  array (
    'type' => 'date',
    'vname' => 'LBL_CUSTOMER_SIGNED_DATE',
    'width' => '10%',
    'default' => true,
  ),
      'team_name' =>
    array (
        'width' => '10%',
        'vname' => 'LBL_TEAM',
        'widget_class' => 'SubPanelDetailViewLink',
        'default' => true,
    ),
  'currency_id' =>
  array (
    'name' => 'currency_id',
    'usage' => 'query_only',
  ),
);