<?php
$module_name = 'J_School';
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
            'name' => 'short_name',
            'label' => 'LBL_SHORT_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'level',
            'studio' => 'visible',
            'label' => 'LBL_LEVEL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'address_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'address',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
      ),
    ),
  ),
);
