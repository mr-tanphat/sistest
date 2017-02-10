<?php
$popupMeta = array (
    'moduleMain' => 'C_Classes',
    'varName' => 'C_Classes',
    'orderBy' => 'c_classes.name',
    'whereClauses' => array (
  'name' => 'c_classes.name',
  'class_id' => 'c_classes.class_id',
  'level' => 'c_classes.level',
  'start_date' => 'c_classes.start_date',
  'end_date' => 'c_classes.end_date',
  'type' => 'c_classes.type',
  'kind_of_course' => 'c_classes.kind_of_course',
  'stage_2' => 'c_classes.stage_2',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'class_id',
  8 => 'level',
  9 => 'start_date',
  10 => 'end_date',
  11 => 'type',
  12 => 'kind_of_course',
  13 => 'stage_2',
),
    'searchdefs' => array (
  'class_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CLASS_ID',
    'width' => '10%',
    'name' => 'class_id',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'stage_2' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_STAGE_CONNECT_SKILL',
    'width' => '10%',
    'name' => 'stage_2',
  ),
  'level' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_LEVEL',
    'width' => '10%',
    'name' => 'level',
  ),
  'start_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'name' => 'start_date',
  ),
  'end_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_DATE',
    'width' => '10%',
    'name' => 'end_date',
  ),
  'type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type',
  ),
  'kind_of_course' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_KIND_OF_COURSE',
    'width' => '10%',
    'name' => 'kind_of_course',
  ),
),
    'listviewdefs' => array (
  'CLASS_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CLASS_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'class_id',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'STAGE_2' => 
  array (
    'type' => 'multienum',
    'label' => 'LBL_STAGE_CONNECT_SKILL',
    'width' => '10%',
    'default' => true,
  ),
  'LEVEL' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_LEVEL',
    'width' => '10%',
    'name' => 'level',
  ),
  'START_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'start_date',
  ),
  'END_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'end_date',
  ),
  'KIND_OF_COURSE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_KIND_OF_COURSE',
    'width' => '10%',
    'name' => 'kind_of_course',
  ),
),
);
