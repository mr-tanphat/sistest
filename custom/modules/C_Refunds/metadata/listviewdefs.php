<?php
$module_name = 'C_Refunds';
$OBJECT_NAME = 'C_REFUNDS';
$listViewDefs[$module_name] = 
array (
  'document_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'link' => true,
    'default' => true,
    'customCode' => '<a href="index.php?module=C_Refunds&return_module=C_Refunds&action=DetailView&record={$ID}"><span class="textbg_blue">{$DOCUMENT_NAME}</span></a>',
  ),
  'contacts_c_refunds_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_C_REFUNDS_1CONTACTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'refund_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_REFUND_TYPE',
    'width' => '10%',
  ),
  'refund_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_REFUND_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'refund_amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_REFUND_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'refond_method' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_REFOND_METHOD',
    'width' => '10%',
  ),
  'currency_id' => 
  array (
    'type' => 'currency_id',
    'studio' => 'visible',
    'label' => 'LBL_CURRENCY',
    'width' => '10%',
    'default' => false,
  ),
  'amount_usd' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT_USD',
    'currency_format' => true,
    'width' => '10%',
    'default' => false,
  ),
  'refund_address_street' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_REFUND_ADDRESS_STREET',
    'width' => '10%',
    'default' => false,
  ),
  'team_name' => 
  array (
    'width' => '2%',
    'label' => 'LBL_LIST_TEAM',
    'default' => false,
    'sortable' => false,
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
  'modified_by_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MODIFIED_USER',
    'module' => 'Users',
    'id' => 'USERS_ID',
    'default' => false,
    'sortable' => false,
    'related_fields' => 
    array (
      0 => 'modified_user_id',
    ),
  ),
);
