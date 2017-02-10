<?php
// created: 2014-09-05 14:55:29
$subpanel_layout['list_fields'] = array (
  'class_id' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CLASS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'vname' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_STATUS',
    'width' => '10%',
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
    'vname' => 'LBL_TEAMS',
    'id' => 'TEAM_ID',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Teams',
    'target_record_key' => 'team_id',
  ),
  'content' => 
  array (
    'name' => 'content',
    'usage' => 'query_only',
  ),
);