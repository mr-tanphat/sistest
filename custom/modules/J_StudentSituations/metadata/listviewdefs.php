<?php
$module_name = 'J_StudentSituations';
$listViewDefs[$module_name] = 
array (
  'name' => 
  array (
    'width' => '14%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'start_study' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_STUDY',
    'width' => '10%',
    'default' => true,
  ),
  'end_study' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_STUDY',
    'width' => '10%',
    'default' => true,
  ),
  'total_hour' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_TOTAL_HOUR',
    'width' => '10%',
    'default' => true,
  ),
  'total_amount' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'assigned_user_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
  ),
  'student_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE_STUDENT',
    'width' => '10%',
    'default' => false,
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
);
