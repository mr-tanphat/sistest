<?php
$module_name = 'C_Payments';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'customCode' => '<a href="index.php?module=C_Payments&return_module=C_Payments&action=DetailView&record={$ID}"><span class="textbg_blue">{$NAME}</span></a>',
  ),
  'payment_method' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PAYMENT_METHOD',
    'width' => '15%',
  ),
  'payment_amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_PAYMENT_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'payment_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'c_invoices_c_payments_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_INVOICES_C_PAYMENTS_1_FROM_C_INVOICES_TITLE',
    'id' => 'C_INVOICES_C_PAYMENTS_1C_INVOICES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => false,
  ),
  'payment_attempt' => 
  array (
    'type' => 'int',
    'label' => 'LBL_PAYMENT_ATTEMPT',
    'width' => '10%',
    'default' => false,
  ),
  'card_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CARD_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'payment_balance' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_PAYMENT_BALANCE',
    'currency_format' => true,
    'width' => '10%',
    'default' => false,
  ),
  'card_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CARD_TYPE',
    'width' => '10%',
  ),
  'accounts_c_payments_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_C_PAYMENTS_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_C_PAYMENTS_1ACCOUNTS_IDA',
    'width' => '10%',
    'default' => false,
  ),
  'card_number' => 
  array (
    'type' => 'int',
    'label' => 'LBL_CARD_NUMBER',
    'width' => '10%',
    'default' => false,
  ),
  'contacts_c_payments_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_C_PAYMENTS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_C_PAYMENTS_1CONTACTS_IDA',
    'width' => '10%',
    'default' => false,
  ),
  'remaining' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_REMAINING',
    'currency_format' => true,
    'width' => '10%',
    'default' => false,
  ),
  'created_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => false,
  ),
  'expiration_date' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EXPIRATION_DATE',
    'width' => '10%',
  ),
  'expiration_year' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EXPIRATION_YEAR',
    'width' => '10%',
  ),
);
