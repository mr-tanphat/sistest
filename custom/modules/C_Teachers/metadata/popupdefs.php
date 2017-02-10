<?php
$popupMeta = array (
    'moduleMain' => 'C_Teachers',
    'varName' => 'C_Teachers',
    'orderBy' => 'c_teachers.first_name, c_teachers.last_name',
    'whereClauses' => array (
  'teacher_id' => 'c_teachers.teacher_id',
  'full_teacher_name' => 'c_teachers.full_teacher_name',
  'phone_mobile' => 'c_teachers.phone_mobile',
  'email' => 'c_teachers.email',
  'contract_date' => 'c_teachers.contract_date',
  'contract_until' => 'c_teachers.contract_until',
  'date_modified' => 'c_teachers.date_modified',
  'date_entered' => 'c_teachers.date_entered',
  'teacher_type' => 'c_teachers.teacher_type',
  'team_name' => 'c_teachers.team_name',
),
    'searchInputs' => array (
  2 => 'teacher_id',
  3 => 'full_teacher_name',
  4 => 'phone_mobile',
  5 => 'email',
  6 => 'contract_date',
  7 => 'contract_until',
  8 => 'date_modified',
  9 => 'date_entered',
  10 => 'teacher_type',
  11 => 'team_name',
),
    'searchdefs' => array (
  'teacher_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TEACHER_ID',
    'width' => '10%',
    'name' => 'teacher_id',
  ),
  'full_teacher_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FULL_NAME',
    'width' => '10%',
    'name' => 'full_teacher_name',
  ),
  'phone_mobile' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'name' => 'phone_mobile',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
  ),
  'contract_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONTRACT_DATE',
    'width' => '10%',
    'name' => 'contract_date',
  ),
  'contract_until' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONTRACT_UNTIL',
    'width' => '10%',
    'name' => 'contract_until',
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
    'name' => 'date_modified',
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
    'name' => 'date_entered',
  ),
  'teacher_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TEACHER_TYPE',
    'width' => '10%',
    'name' => 'teacher_type',
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
);
