<?php
$popupMeta = array (
    'moduleMain' => 'C_Refunds',
    'varName' => 'C_Refunds',
    'orderBy' => 'c_refunds.name',
    'whereClauses' => array (
  'name' => 'c_refunds.name',
  'document_name' => 'c_refunds.document_name',
  'contacts_c_refunds_1_name' => 'c_refunds.contacts_c_refunds_1_name',
  'opportunities_c_refunds_1_name' => 'c_refunds.opportunities_c_refunds_1_name',
  'refund_amount' => 'c_refunds.refund_amount',
  'refund_date' => 'c_refunds.refund_date',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'document_name',
  5 => 'contacts_c_refunds_1_name',
  6 => 'opportunities_c_refunds_1_name',
  7 => 'refund_amount',
  8 => 'refund_date',
),
    'searchdefs' => array (
  'document_name' => 
  array (
    'name' => 'document_name',
    'width' => '10%',
  ),
  'name' => 
  array (
    'type' => 'varchar',
    'label' => 'name',
    'width' => '10%',
    'name' => 'name',
  ),
  'contacts_c_refunds_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_C_REFUNDS_1CONTACTS_IDA',
    'width' => '10%',
    'name' => 'contacts_c_refunds_1_name',
  ),
  'opportunities_c_refunds_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_OPPORTUNITIES_C_REFUNDS_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'OPPORTUNITIES_C_REFUNDS_1OPPORTUNITIES_IDA',
    'width' => '10%',
    'name' => 'opportunities_c_refunds_1_name',
  ),
  'refund_amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_REFUND_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'refund_amount',
  ),
  'refund_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_REFUND_DATE',
    'width' => '10%',
    'name' => 'refund_date',
  ),
),
);
