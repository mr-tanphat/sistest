<?php
$module_name = 'C_Packages';
$viewdefs[$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
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
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'package_id',
            'label' => 'LBL_PACKAGE_ID',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'c_programs_c_packages_1_name',
            'label' => 'LBL_C_PROGRAMS_C_PACKAGES_1_FROM_C_PROGRAMS_TITLE',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'interval_package',
            'studio' => 'visible',
            'label' => 'LBL_INTERVAL_PACKAGE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 'name',
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'price',
            'label' => 'LBL_PRICE',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 'description',
        ),
        6 => 
        array (
          0 => 'assigned_user_name',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'team_name',
            'displayParams' => 
            array (
              'display' => true,
            ),
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
