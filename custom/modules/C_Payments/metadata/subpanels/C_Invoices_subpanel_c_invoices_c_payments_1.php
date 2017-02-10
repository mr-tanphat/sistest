<?php
// created: 2014-04-25 10:38:38
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
    'width' => '20%',
    'default' => true,
    'sortable' => false,
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_STATUS',
    'width' => '20%',
  ),
    'payment_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_PAYMENT_TYPE',
    'width' => '15%',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '20%',
    'default' => true,
  ),
  'currency_id' => 
  array (
    'name' => 'currency_id',
    'usage' => 'query_only',
  ),
);