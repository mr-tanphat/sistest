<?php
$module_name = 'J_ConfigInvoiceNo';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'serial_no' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SERIAL_NO',
    'width' => '10%',
    'default' => true,
  ),
  'invoice_no_from' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INVOICE_NO_FORM',
    'width' => '10%',
    'default' => true,
  ),
  'invoice_no_to' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INVOICE_NO_TO',
    'width' => '10%',
    'default' => true,
  ),
  'invoice_no_current' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INVOICE_NO_CURRENT',
    'width' => '10%',
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
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => false,
  ),
);
