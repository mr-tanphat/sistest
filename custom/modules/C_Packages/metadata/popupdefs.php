<?php
$popupMeta = array (
    'moduleMain' => 'C_Packages',
    'varName' => 'C_Packages',
    'orderBy' => 'c_packages.name',
    'whereClauses' => array (
  'name' => 'c_packages.name',
  'package_id' => 'c_packages.package_id',
  'kind_of_course' => 'c_packages.kind_of_course',
  'interval_package' => 'c_packages.interval_package',
  'team_name' => 'c_packages.team_name',
),
    'searchInputs' => array (
  1 => 'name',
  8 => 'package_id',
  11 => 'kind_of_course',
  12 => 'interval_package',
  13 => 'team_name',
),
    'searchdefs' => array (
  'package_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PACKAGE_ID',
    'width' => '10%',
    'name' => 'package_id',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'kind_of_course' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_KIND_OF_COURSE',
    'width' => '10%',
    'name' => 'kind_of_course',
  ),
  'interval_package' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_INTERVAL_PACKAGE',
    'width' => '10%',
    'name' => 'interval_package',
  ),
  'team_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'studio' => 
    array (
      'portallistview' => false,
      'portaldetailview' => false,
      'portaleditview' => false,
    ),
    'label' => 'LBL_TEAMS',
    'id' => 'TEAM_ID',
    'width' => '10%',
    'name' => 'team_name',
  ),
),
    'listviewdefs' => array (
  'PACKAGE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PACKAGE_ID',
    'width' => '10%',
    'default' => true,
    'customCode' => '<span class="textbg_blue">{$PACKAGE_ID}</span>',
    'name' => 'package_id',
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'INTERVAL_PACKAGE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INTERVAL_PACKAGE',
    'width' => '10%',
    'name' => 'interval_package',
  ),
  'NUMBER_OF_PAYMENTS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NUMBER_OF_PAYMENTS',
    'width' => '5%',
    'name' => 'number_of_payments',
  ),
  'PRICE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_PRICE',
    'currency_format' => true,
    'width' => '7%',
    'default' => true,
    'name' => 'price',
  ),
  'DISCOUNT_AMOUNT' => 
  array (
    'type' => 'currency',
    'width' => '7%',
    'default' => true,
    'name' => 'discount_amount',
    'label' => 'LBL_ISDISCOUNT',
  ),
  'KIND_OF_COURSE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_KIND_OF_COURSE',
    'width' => '10%',
    'name' => 'kind_of_course',
  ),
  'TEAM_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
    'name' => 'team_name',
  ),
),
);
