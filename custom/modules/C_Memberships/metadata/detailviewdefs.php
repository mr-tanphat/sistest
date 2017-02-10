<?php
$module_name = 'C_Memberships';
$viewdefs[$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
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
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'picture',
          1 => 
          array (
            'name' => 'name_on_card',
            'customLabel' => '{$STUDENT_LABEL}',
            'customCode' => '{$STUDENT_INFO}',
          ),
        ),
        1 => 
        array (
          0 => 'description',
        ),
        2 => 
        array (
          0 => 'team_name',
          
        ),
      ),
    ),
  ),
);
