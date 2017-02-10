<?php
// created: 2014-09-03 10:48:14
$subpanel_layout['list_fields'] = array (
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
  
);