<?php
$dashletData['C_PaymentsDashlet']['searchFields'] = array (
  'start_pay' => 
  array (
    'default' => '',
  ),
  'end_pay' => 
  array (
    'default' => '',
  ),
);
$dashletData['C_PaymentsDashlet']['columns'] = array (
  'contacts_c_payments_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_C_PAYMENTS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_C_PAYMENTS_1CONTACTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'payment_amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_PAYMENT_AMOUNT',
    'currency_format' => true,
    'width' => '20%',
    'default' => true,
    'name' => 'payment_amount',
  ),
  'start_pay' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_PAY',
    'width' => '10%',
    'default' => true,
    'name' => 'start_pay',
  ),
  'end_pay' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_PAY',
    'width' => '10%',
    'default' => true,
    'name' => 'end_pay',
  ),
  'c_invoices_c_payments_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_INVOICES_C_PAYMENTS_1_FROM_C_INVOICES_TITLE',
    'id' => 'C_INVOICES_C_PAYMENTS_1C_INVOICES_IDA',
    'width' => '10%',
    'default' => false,
    'name' => 'c_invoices_c_payments_1_name',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status',
  ),
);
