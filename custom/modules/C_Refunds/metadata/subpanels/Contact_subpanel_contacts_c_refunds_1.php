<?php
// created: 2014-12-22 10:31:48
$subpanel_layout['list_fields'] = array (
  'document_name' => 
  array (
    'name' => 'document_name',
    'vname' => 'LBL_LIST_DOCUMENT_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
  ),
  'refund_amount' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_REFUND_AMOUNT',
    'currency_format' => true,
    'width' => '15%',
    'default' => true,
    'sortable' => false,
  ),
  'refund_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'vname' => 'LBL_REFUND_TYPE',
    'width' => '10%',
  ),
  'refond_method' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_REFOND_METHOD',
    'width' => '10%',
  ),
  'refund_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_REFUND_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'currency_id' => 
  array (
    'name' => 'currency_id',
    'usage' => 'query_only',
  ),
);