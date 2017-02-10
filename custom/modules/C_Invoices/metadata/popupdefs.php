<?php
$popupMeta = array (
    'moduleMain' => 'C_Invoices',
    'varName' => 'C_Invoices',
    'orderBy' => 'c_invoices.name',
    'whereClauses' => array (
  'name' => 'c_invoices.name',
  'contacts_c_invoices_1_name' => 'c_invoices.contacts_c_invoices_1_name',
  'accounts_c_invoices_1_name' => 'c_invoices.accounts_c_invoices_1_name',
  'c_invoices_opportunities_1_name' => 'c_invoices.c_invoices_opportunities_1_name',
  'amount' => 'c_invoices.amount',
  'balance' => 'c_invoices.balance',
  'status' => 'c_invoices.status',
  'invoice_date' => 'c_invoices.invoice_date',
),
    'searchInputs' => array (
  1 => 'name',
  3 => 'status',
  4 => 'contacts_c_invoices_1_name',
  5 => 'accounts_c_invoices_1_name',
  6 => 'c_invoices_opportunities_1_name',
  7 => 'amount',
  8 => 'balance',
  9 => 'invoice_date',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'contacts_c_invoices_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_C_INVOICES_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_C_INVOICES_1CONTACTS_IDA',
    'width' => '10%',
    'name' => 'contacts_c_invoices_1_name',
  ),
  'accounts_c_invoices_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_C_INVOICES_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_C_INVOICES_1ACCOUNTS_IDA',
    'width' => '10%',
    'name' => 'accounts_c_invoices_1_name',
  ),
  'c_invoices_opportunities_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_INVOICES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'C_INVOICES_OPPORTUNITIES_1OPPORTUNITIES_IDB',
    'width' => '10%',
    'name' => 'c_invoices_opportunities_1_name',
  ),
  'amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'amount',
  ),
  'balance' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_BALANCE',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'balance',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status',
  ),
  'invoice_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INVOICE_DATE',
    'width' => '10%',
    'name' => 'invoice_date',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'C_INVOICES_OPPORTUNITIES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => false,
    'label' => 'LBL_C_INVOICES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'C_INVOICES_OPPORTUNITIES_1OPPORTUNITIES_IDB',
    'width' => '20%',
    'default' => true,
    'name' => 'c_invoices_opportunities_1_name',
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status',
  ),
  'BALANCE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_BALANCE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'balance',
  ),
  'INVOICE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INVOICE_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'invoice_date',
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
    'name' => 'created_by_name',
  ),
),
);
