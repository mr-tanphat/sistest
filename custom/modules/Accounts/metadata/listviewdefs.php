<?php
$listViewDefs['Accounts'] = 
array (
  'name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
  ),
  'phone_office' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_PHONE',
    'default' => true,
  ),
  'email1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
  ),
  'billing_address_street' => 
  array (
    'width' => '15%',
    'label' => 'LBL_BILLING_ADDRESS_STREET',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_TEAM',
    'default' => true,
  ),
  'account_type' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TYPE',
    'default' => false,
  ),
  'billing_address_country' => 
  array (
    'width' => '10%',
    'label' => 'LBL_BILLING_ADDRESS_COUNTRY',
    'default' => false,
  ),
  'billing_address_city' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_CITY',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
  ),
  'industry' => 
  array (
    'width' => '10%',
    'label' => 'LBL_INDUSTRY',
    'default' => false,
  ),
  'annual_revenue' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ANNUAL_REVENUE',
    'default' => false,
  ),
  'phone_fax' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PHONE_FAX',
    'default' => false,
  ),
  'billing_address_state' => 
  array (
    'width' => '7%',
    'label' => 'LBL_BILLING_ADDRESS_STATE',
    'default' => false,
  ),
  'billing_address_postalcode' => 
  array (
    'width' => '10%',
    'label' => 'LBL_BILLING_ADDRESS_POSTALCODE',
    'default' => false,
  ),
  'shipping_address_street' => 
  array (
    'width' => '15%',
    'label' => 'LBL_SHIPPING_ADDRESS_STREET',
    'default' => false,
  ),
  'shipping_address_city' => 
  array (
    'width' => '10%',
    'label' => 'LBL_SHIPPING_ADDRESS_CITY',
    'default' => false,
  ),
  'shipping_address_state' => 
  array (
    'width' => '7%',
    'label' => 'LBL_SHIPPING_ADDRESS_STATE',
    'default' => false,
  ),
  'shipping_address_postalcode' => 
  array (
    'width' => '10%',
    'label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE',
    'default' => false,
  ),
  'shipping_address_country' => 
  array (
    'width' => '10%',
    'label' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
    'default' => false,
  ),
  'rating' => 
  array (
    'width' => '10%',
    'label' => 'LBL_RATING',
    'default' => false,
  ),
  'phone_alternate' => 
  array (
    'width' => '10%',
    'label' => 'LBL_OTHER_PHONE',
    'default' => false,
  ),
  'website' => 
  array (
    'width' => '10%',
    'label' => 'LBL_WEBSITE',
    'default' => false,
  ),
  'ownership' => 
  array (
    'width' => '10%',
    'label' => 'LBL_OWNERSHIP',
    'default' => false,
  ),
  'employees' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EMPLOYEES',
    'default' => false,
  ),
  'sic_code' => 
  array (
    'width' => '10%',
    'label' => 'LBL_SIC_CODE',
    'default' => false,
  ),
  'ticker_symbol' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TICKER_SYMBOL',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_MODIFIED',
    'default' => false,
  ),
  'created_by_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
  ),
  'modified_by_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MODIFIED',
    'default' => false,
  ),
);
