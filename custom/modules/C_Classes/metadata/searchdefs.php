<?php
$module_name = 'C_Classes';
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
      'type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type',
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
    ),
    'advanced_search' => 
    array (
      'class_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CLASS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'class_id',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'max' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MAX',
        'width' => '10%',
        'name' => 'max',
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
      'stage_2' => 
      array (
        'type' => 'multienum',
        'label' => 'LBL_STAGE_CONNECT_SKILL',
        'width' => '10%',
        'default' => true,
        'name' => 'stage_2',
      ),
      'level' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_LEVEL',
        'width' => '10%',
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
      'kind_of_course' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_KIND_OF_COURSE',
        'width' => '10%',
        'name' => 'kind_of_course',
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
