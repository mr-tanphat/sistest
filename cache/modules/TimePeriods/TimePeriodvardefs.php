<?php 
 $GLOBALS["dictionary"]["TimePeriod"]=array (
  'table' => 'timeperiods',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_NAME',
      'type' => 'varchar',
      'len' => '36',
      'required' => true,
      'reportable' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_TP_NAME',
      'dbType' => 'varchar',
      'type' => 'timeperiod',
      'function' => 'get_timeperiods_dom',
      'len' => '36',
      'isnull' => 'false',
      'importable' => 'required',
    ),
    'parent_id' => 
    array (
      'name' => 'parent_id',
      'vname' => 'LBL_PARENT_ID',
      'type' => 'id',
      'id_name' => 'id',
      'table' => 'timeperiods',
      'reportable' => false,
    ),
    'start_date' => 
    array (
      'name' => 'start_date',
      'vname' => 'LBL_TP_START_DATE',
      'type' => 'date',
      'isnull' => 'false',
      'importable' => 'required',
    ),
    'start_date_timestamp' => 
    array (
      'name' => 'start_date_timestamp',
      'vname' => 'LBL_TP_START_DATE_TIMESTAMP',
      'type' => 'int',
      'len' => '14',
      'required' => true,
      'enable_range_search' => true,
      'studio' => false,
    ),
    'end_date' => 
    array (
      'name' => 'end_date',
      'vname' => 'LBL_TP_END_DATE',
      'type' => 'date',
      'isnull' => 'false',
      'importable' => 'required',
    ),
    'end_date_timestamp' => 
    array (
      'name' => 'end_date_timestamp',
      'vname' => 'LBL_TP_START_DATE_TIMESTAMP',
      'type' => 'int',
      'len' => '14',
      'required' => true,
      'enable_range_search' => true,
      'studio' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'vname' => 'LBL_CREATED_BY',
      'type' => 'varchar',
      'len' => '36',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'reportable' => false,
    ),
    'is_fiscal' => 
    array (
      'name' => 'is_fiscal',
      'default' => 0,
      'vname' => 'LBL_TP_IS_FISCAL',
      'type' => 'bool',
    ),
    'is_fiscal_year' => 
    array (
      'name' => 'is_fiscal_year',
      'default' => 0,
      'vname' => 'LBL_TP_IS_FISCAL_YEAR',
      'type' => 'bool',
    ),
    'leaf_cycle' => 
    array (
      'name' => 'leaf_cycle',
      'vname' => 'LBL_LEAF_CYCLE',
      'type' => 'int',
      'len' => '2',
      'studio' => false,
    ),
    'type' => 
    array (
      'name' => 'type',
      'vname' => 'LBL_TP_TYPE',
      'type' => 'enum',
      'options' => 'time_period_dom',
      'len' => '255',
      'audited' => true,
      'comment' => 'Time Period to be Forecast over',
      'merge_filter' => 'enabled',
      'importable' => 'required',
      'required' => true,
      'default' => '',
    ),
    'forecast_schedules' => 
    array (
      'name' => 'forecast_schedules',
      'type' => 'link',
      'relationship' => 'timeperiod_forecast_schedules',
      'source' => 'non-db',
    ),
    'related_timeperiods' => 
    array (
      'name' => 'related_timeperiods',
      'type' => 'link',
      'relationship' => 'related_timeperiods',
      'link_type' => 'many',
      'side' => 'left',
      'source' => 'non-db',
    ),
  ),
  'acls' => 
  array (
    'SugarACLAdminOnly' => 
    array (
      'adminFor' => 'Forecasts',
      'allowUserRead' => true,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'timeperiodspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_timestamps',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'id',
        1 => 'start_date_timestamp',
        2 => 'end_date_timestamp',
      ),
    ),
  ),
  'relationships' => 
  array (
    'timeperiod_forecast_schedules' => 
    array (
      'lhs_module' => 'TimePeriods',
      'lhs_table' => 'timeperiods',
      'lhs_key' => 'id',
      'rhs_module' => 'Forecasts',
      'rhs_table' => 'forecast_schedule',
      'rhs_key' => 'timeperiod_id',
      'relationship_type' => 'one-to-many',
    ),
    'related_timeperiods' => 
    array (
      'lhs_module' => 'TimePeriods',
      'lhs_table' => 'timeperiods',
      'lhs_key' => 'id',
      'rhs_module' => 'TimePeriods',
      'rhs_table' => 'timeperiods',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'related_calc_fields' => 
  array (
  ),
  'custom_fields' => false,
);