<?php
$module_name = 'C_Invoices';
$viewdefs[$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="contacts_c_invoices_1contacts_ida" id="contacts_c_invoices_1contacts_ida" value="{$fields.contacts_c_invoices_1contacts_ida.value}">',
          1 => '<input type="hidden" name="old_opp_id" id="old_opp_id" value="{$fields.c_invoices_opportunities_1opportunities_idb.value}">',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'invoice_date',
            'label' => 'LBL_INVOICE_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'c_invoices_opportunities_1_name',
            'label' => 'LBL_C_INVOICES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'is_company',
            'label' => 'LBL_IS_COMPANY',
          ),
          1 => 
          array (
            'name' => 'company_name',
            'label' => 'LBL_COMPANY_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'tax_code',
            'label' => 'LBL_TAX_CODE',
          ),
          1 => 
          array (
            'name' => 'company_address',
            'label' => 'LBL_COMPANY_ADDRESS',
          ),
        ),
      ),
    ),
  ),
);
