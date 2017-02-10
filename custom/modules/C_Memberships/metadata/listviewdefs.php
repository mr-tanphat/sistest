<?php
$module_name = 'C_Memberships';
$listViewDefs[$module_name] = 
array (
  'picture' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PICTURE_FILE',
    'default' => true,
  ),
  'name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'name_on_card' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NAME_ON_CARD',
    'width' => '15%',
    'default' => true,
  ),
    'type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
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
  ),
  'c_memberships_contacts_2_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_CONTACTS_TITLE',
    'id' => 'C_MEMBERSHIPS_CONTACTS_2CONTACTS_IDB',
    'width' => '10%',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
