<?php
$module_name = 'C_Classes';
$listViewDefs[$module_name] = 
array (
  'class_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CLASS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'start_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'end_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_DATE',
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
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => false,
  ),
  'number_of_students' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUMBER_OF_STUDENTS',
    'width' => '10%',
    'default' => false,
  ),
  'stage_2' => 
  array (
    'type' => 'multienum',
    'label' => 'LBL_STAGE_CONNECT_SKILL',
    'width' => '10%',
    'default' => false,
  ),
  'level' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_LEVEL',
    'width' => '10%',
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
