<?php
$module_name = 'C_Packages';
$listViewDefs[$module_name] = 
array (
  'package_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PACKAGE_ID',
    'width' => '10%',
    'default' => true,
    'customCode' => '<a href="index.php?module=C_Packages&return_module=C_Packages&action=DetailView&record={$ID}"><span class="textbg_blue">{$PACKAGE_ID}</span></a>',
  ),
  'name' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'number_of_payments' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NUMBER_OF_PAYMENTS',
    'width' => '10%',
  ),
  'kind_of_course' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_KIND_OF_COURSE',
    'width' => '10%',
  ),
  'interval_package' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INTERVAL_PACKAGE',
    'width' => '10%',
  ),
  'total_hours' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TOTAL_HOURS',
    'width' => '10%',
  ),
  'price' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_PRICE',
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
  'date_entered' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'portaleditview' => false,
    ),
    'label' => 'LBL_DATE_ENTERED',
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
