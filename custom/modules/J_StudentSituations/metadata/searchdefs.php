<?php
$module_name = 'J_StudentSituations';
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
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'type' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'type',
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
        'default' => true,
        'width' => '10%',
      ),
      'start_study' => 
      array (
        'type' => 'date',
        'label' => 'LBL_START_STUDY',
        'width' => '10%',
        'default' => true,
        'name' => 'start_study',
      ),
      'end_study' => 
      array (
        'type' => 'date',
        'label' => 'LBL_END_STUDY',
        'width' => '10%',
        'default' => true,
        'name' => 'end_study',
      ),
      'ju_class_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_JU_CLASS_NAME',
        'id' => 'JU_CLASS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'ju_class_name',
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
