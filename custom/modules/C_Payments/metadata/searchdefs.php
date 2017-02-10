<?php
$module_name = 'C_Payments';
$searchdefs[$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status',
      ),
      'payment_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PAYMENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'payment_date',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'contacts_c_payments_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_CONTACTS_C_PAYMENTS_1_FROM_CONTACTS_TITLE',
        'id' => 'CONTACTS_C_PAYMENTS_1CONTACTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'contacts_c_payments_1_name',
      ),
      'payment_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PAYMENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'payment_date',
      ),
      'c_invoices_c_payments_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_C_INVOICES_C_PAYMENTS_1_FROM_C_INVOICES_TITLE',
        'id' => 'C_INVOICES_C_PAYMENTS_1C_INVOICES_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'c_invoices_c_payments_1_name',
      ),
      'payment_amount' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_PAYMENT_AMOUNT',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'payment_amount',
      ),
      'payment_method' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PAYMENT_METHOD',
        'width' => '10%',
        'name' => 'payment_method',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status',
      ),
      'payment_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_PAYMENT_TYPE',
        'width' => '10%',
        'name' => 'payment_type',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'width' => '10%',
        'default' => true,
      ),
      'invoice_num' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_INVOICE_NUM',
        'width' => '10%',
        'default' => true,
        'name' => 'invoice_num',
      ),
      'serial_num' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_SERIAL_NUM',
        'width' => '10%',
        'default' => true,
        'name' => 'serial_num',
      ),
      'printed' => 
      array (
        'type' => 'bool',
        'label' => 'LBL_PRINTED',
        'width' => '10%',
        'default' => true,
        'name' => 'printed',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
