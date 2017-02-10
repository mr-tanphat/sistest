<?php 
 $GLOBALS["dictionary"]["Worksheet"]=array (
  'table' => 'worksheet',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_WK_ID',
      'type' => 'id',
      'reportable' => false,
      'comment' => 'Unique identifier',
    ),
    'user_id' => 
    array (
      'name' => 'user_id',
      'vname' => 'LBL_WK_USER_ID',
      'type' => 'id',
      'comment' => 'User to which this worksheet pertains',
    ),
    'timeperiod_id' => 
    array (
      'name' => 'timeperiod_id',
      'vname' => 'LBL_WK_TIMEPERIOD_ID',
      'type' => 'enum',
      'dbType' => 'id',
      'reportable' => true,
      'function' => 'getTimePeriodsDropDownForForecasts',
      'comment' => 'ID of the associated time period for this worksheet',
    ),
    'forecast_type' => 
    array (
      'name' => 'forecast_type',
      'vname' => 'LBL_WK_FORECAST_TYPE',
      'type' => 'varchar',
      'len' => 100,
      'comment' => 'Indicator of whether worksheet is direct or rollup',
    ),
    'related_id' => 
    array (
      'name' => 'related_id',
      'vname' => 'LBL_WK_RELATED_ID',
      'type' => 'id',
      'comment' => 'User ID or Opportunity ID for this worksheet',
    ),
    'related_forecast_type' => 
    array (
      'name' => 'related_forecast_type',
      'vname' => 'LBL_WK_FORECAST_TYPE',
      'type' => 'varchar',
      'len' => 100,
      'reportable' => false,
      'comment' => 'Direct or rollup, or null if related_id is an Opportunity',
    ),
    'currency_id' => 
    array (
      'name' => 'currency_id',
      'vname' => 'LBL_CURRENCY',
      'type' => 'id',
      'required' => true,
    ),
    'base_rate' => 
    array (
      'name' => 'base_rate',
      'vname' => 'LBL_BASE_RATE',
      'type' => 'double',
      'required' => true,
    ),
    'best_case' => 
    array (
      'name' => 'best_case',
      'vname' => 'LBL_BEST_CASE_VALUE',
      'type' => 'currency',
      'comment' => 'Best case worksheet amount',
    ),
    'likely_case' => 
    array (
      'name' => 'likely_case',
      'vname' => 'LBL_LIKELY_CASE_VALUE',
      'type' => 'currency',
      'comment' => 'Likely case worksheet amount',
    ),
    'worst_case' => 
    array (
      'name' => 'worst_case',
      'vname' => 'LBL_WORST_CASE_VALUE',
      'type' => 'currency',
      'comment' => 'Worst case worksheet amount',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'comment' => 'Date record modified',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED_USER_ID',
      'type' => 'id',
      'len' => 36,
      'comment' => 'User ID that last modified record',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'commit_stage' => 
    array (
      'name' => 'commit_stage',
      'vname' => 'LBL_COMMIT_STAGE',
      'type' => 'enum',
      'options' => 'commit_stage_dom',
      'len' => '20',
      'comment' => 'The bucket stage that the opportunity belongs to',
    ),
    'op_probability' => 
    array (
      'name' => 'op_probability',
      'vname' => 'LBL_OW_PROBABILITY',
      'type' => 'int',
      'dbType' => 'double',
      'comment' => 'Worksheet Placeholder for the probability of closure',
      'validation' => 
      array (
        'type' => 'range',
        'min' => 0,
        'max' => 100,
      ),
      'default' => '0',
    ),
    'quota' => 
    array (
      'name' => 'quota',
      'vname' => 'LBL_AMOUNT',
      'type' => 'currency',
      'reportable' => true,
      'importable' => 'required',
      'comment' => 'Worksheet placeholder for quota amount',
    ),
    'version' => 
    array (
      'name' => 'version',
      'vname' => 'LBL_WK_VERSION',
      'type' => 'int',
      'default' => 1,
      'studio' => false,
      'comment' => 'Worksheet version - draft = 0',
    ),
    'revision' => 
    array (
      'name' => 'revision',
      'vname' => 'LBL_WK_REVISION',
      'type' => 'double',
      'default' => 0,
      'studio' => false,
      'comment' => 'Revision # - microtime of save.',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'worksheetpk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_worksheet_user_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'user_id',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_worksheet_rel_id_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'related_id',
        1 => 'user_id',
        2 => 'deleted',
        3 => 'version',
        4 => 'revision',
      ),
    ),
  ),
  'related_calc_fields' => 
  array (
  ),
);