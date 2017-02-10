<?php
$module_name = 'J_School';
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
    ),
    'advanced_search' => 
    array (
      'short_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SHORT_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'short_name',
      ),
      'address_address_street' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_STREET',
        'width' => '10%',
        'default' => true,
        'name' => 'address_address_street',
      ),
      'address_address_city' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_CITY',
        'width' => '10%',
        'default' => true,
        'name' => 'address_address_city',
      ),
      'level' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_LEVEL',
        'width' => '10%',
        'default' => true,
        'name' => 'level',
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
      'team_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'studio' => 'visible',
        'label' => 'LBL_TEAMS',
        'id' => 'TEAM_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'team_name',
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
