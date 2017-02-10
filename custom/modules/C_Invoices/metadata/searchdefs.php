<?php
$module_name = 'C_Invoices';
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
      'invoice_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INVOICE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'invoice_date',
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
      'contacts_c_invoices_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_CONTACTS_C_INVOICES_1_FROM_CONTACTS_TITLE',
        'id' => 'CONTACTS_C_INVOICES_1CONTACTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'contacts_c_invoices_1_name',
      ),
      'c_invoices_opportunities_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_C_INVOICES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
        'id' => 'C_INVOICES_OPPORTUNITIES_1OPPORTUNITIES_IDB',
        'width' => '10%',
        'default' => true,
        'name' => 'c_invoices_opportunities_1_name',
      ),
      'amount' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_AMOUNT',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'amount',
      ),
      'balance' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_BALANCE',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'balance',
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
      'status' => 
      array (
        'type' => 'enum',
        'default' => true,
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
        'default' => true,
        'name' => 'invoice_date',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'studio' => 
        array (
          'portaleditview' => false,
        ),
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
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
