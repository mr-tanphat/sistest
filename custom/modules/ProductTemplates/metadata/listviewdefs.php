<?php
$listViewDefs['ProductTemplates'] = 
array (
  'name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
  ),
  'unit' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_UNIT',
    'width' => '10%',
    'default' => true,
  ),
  'type_name' => 
  array (
    'width' => '7%',
    'label' => 'LBL_LIST_TYPE',
    'link' => false,
    'sortable' => true,
    'default' => true,
  ),
  'discount_price' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_DISCOUNT_PRICE',
    'currency_format' => true,
    'width' => '8%',
    'default' => true,
  ),
  'status2' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_STATUS_2',
    'width' => '10%',
    'default' => true,
  ),
  'date_available' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_AVAILABLE',
    'width' => '10%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '15%',
    'default' => true,
  ),
  'cost_price' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_COST_PRICE',
    'currency_format' => true,
    'width' => '8%',
    'default' => false,
  ),
  'supplier' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_SUPPLIER',
    'width' => '8%',
  ),
  'code' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => false,
  ),
);
