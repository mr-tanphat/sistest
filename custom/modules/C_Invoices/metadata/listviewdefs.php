<?php
$module_name = 'C_Invoices';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'customCode' => '<a href="index.php?module=C_Invoices&return_module=C_Invoices&action=DetailView&record={$ID}"><span class="textbg_blue">{$NAME}</span></a>',
  ),
  'c_invoices_opportunities_1_name' => 
  array (
    'type' => 'relate',
    'link' => false,
    'label' => 'LBL_ENROLLMENT',
    'id' => 'C_INVOICES_OPPORTUNITIES_1OPPORTUNITIES_IDB',
    'width' => '20%',
    'default' => true,
    'customCode' => '<a href="index.php?module=C_Invoices&return_module=C_Invoices&action=DetailView&record={$ID}">{$C_INVOICES_OPPORTUNITIES_1_NAME}</a>',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'balance' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_BALANCE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
  ),
  'invoice_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INVOICE_NUMBER',
    'width' => '10%',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'portaleditview' => false,
    ),
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'contacts_c_invoices_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_C_INVOICES_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_C_INVOICES_1CONTACTS_IDA',
    'width' => '10%',
    'default' => false,
  ),
  'invoice_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INVOICE_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'modified_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
  'payment_attempts' => 
  array (
    'type' => 'int',
    'label' => 'LBL_PAYMENT_ATTEMPTS',
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
  'due_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DUE_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'tax' => 
  array (
    'type' => 'int',
    'label' => 'LBL_TAX',
    'width' => '10%',
    'default' => false,
  ),
  'discount' => 
  array (
    'type' => 'int',
    'label' => 'LBL_DISCOUNT',
    'width' => '10%',
    'default' => false,
  ),
  'accounts_c_invoices_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_C_INVOICES_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_C_INVOICES_1ACCOUNTS_IDA',
    'width' => '10%',
    'default' => false,
  ),
);
