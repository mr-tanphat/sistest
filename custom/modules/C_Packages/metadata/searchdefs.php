<?php
$module_name = 'C_Packages';
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
      'number_of_payments' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NUMBER_OF_PAYMENTS',
        'width' => '10%',
        'name' => 'number_of_payments',
      ),
      'isdiscount' => 
      array (
        'type' => 'bool',
        'label' => 'LBL_ISDISCOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'isdiscount',
      ),
      'favorites_only' => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'package_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PACKAGE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'package_id',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'isdiscount' => 
      array (
        'type' => 'bool',
        'label' => 'LBL_ISDISCOUNT',
        'width' => '10%',
        'default' => true,
        'name' => 'isdiscount',
      ),
      'discount_amount' => 
      array (
        'type' => 'currency',
        'label' => 'LBL_DISCOUNT_AMOUNT',
        'currency_format' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'discount_amount',
      ),
      'number_of_payments' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NUMBER_OF_PAYMENTS',
        'width' => '10%',
        'name' => 'number_of_payments',
      ),
      'total_hours' => 
      array (
        'type' => 'int',
        'label' => 'LBL_TOTAL_HOURS',
        'width' => '10%',
        'default' => true,
        'name' => 'total_hours',
      ),
      'interval_package' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INTERVAL_PACKAGE',
        'width' => '10%',
        'name' => 'interval_package',
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
      'package_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PACKAGE_TYPE',
        'width' => '10%',
        'name' => 'package_type',
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
        'default' => true,
        'name' => 'team_name',
      ),
      'kind_of_course' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_KIND_OF_COURSE',
        'width' => '10%',
        'name' => 'kind_of_course',
      ),
      'start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'start_date',
      ),
      'end_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'end_date',
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
      'date_modified' => 
      array (
        'type' => 'datetime',
        'studio' => 
        array (
          'portaleditview' => false,
        ),
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
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
