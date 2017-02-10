<?php 
 $GLOBALS["dictionary"]["ForecastSchedule"]=array (
  'table' => 'forecast_schedule',
  'acl_fields' => false,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LB_FS_KEY',
      'type' => 'id',
      'required' => true,
      'reportable' => false,
      'comment' => 'Unique identifier',
    ),
    'timeperiod_id' => 
    array (
      'name' => 'timeperiod_id',
      'vname' => 'LBL_FS_TIMEPERIOD_ID',
      'type' => 'id',
      'reportable' => false,
      'comment' => 'ID of the associated time period for this forecast schedule',
    ),
    'user_id' => 
    array (
      'name' => 'user_id',
      'vname' => 'LBL_FS_USER_ID',
      'type' => 'id',
      'reportable' => false,
      'comment' => 'User to which this forecast schedule pertains',
    ),
    'cascade_hierarchy' => 
    array (
      'name' => 'cascade_hierarchy',
      'vname' => 'LBL_FS_CASCADE',
      'type' => 'bool',
      'comment' => 'Flag indicating if a forecast for a manager is propagated to his reports',
    ),
    'forecast_start_date' => 
    array (
      'name' => 'forecast_start_date',
      'vname' => 'LBL_FS_FORECAST_START_DATE',
      'type' => 'date',
      'comment' => 'Starting date for this forecast',
    ),
    'status' => 
    array (
      'name' => 'status',
      'vname' => 'LBL_FS_STATUS',
      'type' => 'enum',
      'len' => 100,
      'options' => 'forecast_schedule_status_dom',
      'comment' => 'Status of this forecast',
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'vname' => 'LBL_FS_CREATED_BY',
      'type' => 'id',
      'len' => '36',
      'comment' => 'User name who created record',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_FS_DATE_ENTERED',
      'type' => 'datetime',
      'comment' => 'Date record created',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_FS_DATE_MODIFIED',
      'type' => 'datetime',
      'comment' => 'Date record modified',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_FS_DELETED',
      'type' => 'bool',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'forecastschedulepk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'related_calc_fields' => 
  array (
  ),
  'custom_fields' => false,
  'acls' => 
  array (
    'SugarACLStatic' => true,
  ),
);