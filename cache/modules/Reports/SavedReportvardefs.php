<?php 
 $GLOBALS["dictionary"]["SavedReport"]=array (
  'table' => 'saved_reports',
  'favorites' => true,
  'fields' => 
  array (
    'team_id' => 
    array (
      'name' => 'team_id',
      'vname' => 'LBL_TEAM_ID',
      'group' => 'team_name',
      'reportable' => false,
      'dbType' => 'id',
      'type' => 'team_list',
      'audited' => true,
      'comment' => 'Team ID for the account',
    ),
    'team_set_id' => 
    array (
      'name' => 'team_set_id',
      'rname' => 'id',
      'id_name' => 'team_set_id',
      'vname' => 'LBL_TEAM_SET_ID',
      'type' => 'id',
      'audited' => true,
      'studio' => 'false',
      'dbType' => 'id',
    ),
    'team_count' => 
    array (
      'name' => 'team_count',
      'rname' => 'team_count',
      'id_name' => 'team_id',
      'vname' => 'LBL_TEAMS',
      'join_name' => 'ts1',
      'table' => 'teams',
      'type' => 'relate',
      'required' => 'true',
      'isnull' => 'true',
      'module' => 'Teams',
      'link' => 'team_count_link',
      'massupdate' => false,
      'dbType' => 'int',
      'source' => 'non-db',
      'importable' => 'false',
      'reportable' => false,
      'duplicate_merge' => 'disabled',
      'studio' => 'false',
      'hideacl' => true,
    ),
    'team_name' => 
    array (
      'name' => 'team_name',
      'db_concat_fields' => 
      array (
        0 => 'name',
        1 => 'name_2',
      ),
      'sort_on' => 'tj.name',
      'join_name' => 'tj',
      'rname' => 'name',
      'id_name' => 'team_id',
      'vname' => 'LBL_TEAMS',
      'type' => 'relate',
      'required' => 'true',
      'table' => 'teams',
      'isnull' => 'true',
      'module' => 'Teams',
      'link' => 'team_link',
      'massupdate' => false,
      'dbType' => 'varchar',
      'source' => 'non-db',
      'len' => 36,
      'custom_type' => 'teamset',
      'studio' => 
      array (
        'portallistview' => false,
        'portaldetailview' => false,
        'portaleditview' => false,
      ),
    ),
    'team_link' => 
    array (
      'name' => 'team_link',
      'type' => 'link',
      'relationship' => 'reports_team',
      'vname' => 'LBL_TEAMS_LINK',
      'link_type' => 'one',
      'module' => 'Teams',
      'bean_name' => 'Team',
      'source' => 'non-db',
      'duplicate_merge' => 'disabled',
      'studio' => 'false',
    ),
    'team_count_link' => 
    array (
      'name' => 'team_count_link',
      'type' => 'link',
      'relationship' => 'reports_team_count_relationship',
      'link_type' => 'one',
      'module' => 'Teams',
      'bean_name' => 'TeamSet',
      'source' => 'non-db',
      'duplicate_merge' => 'disabled',
      'reportable' => false,
      'studio' => 'false',
    ),
    'teams' => 
    array (
      'name' => 'teams',
      'type' => 'link',
      'relationship' => 'reports_teams',
      'bean_filter_field' => 'team_set_id',
      'rhs_key_override' => true,
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'link_class' => 'TeamSetLink',
      'link_file' => 'modules/Teams/TeamSetLink.php',
      'studio' => 'false',
      'reportable' => false,
    ),
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'varchar',
      'len' => '255',
      'required' => true,
    ),
    'module' => 
    array (
      'name' => 'module',
      'vname' => 'LBL_MODULE',
      'type' => 'varchar',
      'len' => '36',
      'required' => true,
    ),
    'report_type' => 
    array (
      'name' => 'report_type',
      'vname' => 'LBL_REPORT_TYPE',
      'type' => 'varchar',
      'len' => '36',
      'required' => true,
    ),
    'list_of' => 
    array (
      'required' => false,
      'name' => 'list_of',
      'vname' => '',
      'type' => 'multienum',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'size' => '20',
      'studio' => 'visible',
      'rows' => '4',
      'cols' => '20',
      'isMultiSelect' => true,
      'options' => 'report_list_list',
    ),
    'custom_url' => 
    array (
      'name' => 'custom_url',
      'vname' => 'LBL_CUSTOM_URL',
      'type' => 'varchar',
      'len' => '100',
    ),
    'limit_result' => 
    array (
      'name' => 'limit_result',
      'vname' => 'LBL_LIMIT_RESULT',
      'type' => 'varchar',
      'len' => '100',
    ),
    'content' => 
    array (
      'name' => 'content',
      'vname' => 'LBL_CONTENT',
      'type' => 'longtext',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'required' => false,
      'reportable' => false,
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'required' => true,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'required' => true,
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'massupdate' => false,
      'reportable' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_ASSIGNED_TO',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'reportable' => false,
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'type' => 'relate',
      'link' => 'assigned_user_link',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'report_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_ASSIGNED_TO',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
    ),
    'is_published' => 
    array (
      'name' => 'is_published',
      'vname' => 'LBL_IS_PUBLISHED',
      'type' => 'bool',
      'default' => 0,
      'required' => true,
    ),
    'last_run_date' => 
    array (
      'name' => 'last_run_date',
      'rname' => 'date_modified',
      'id_name' => 'date_modified',
      'vname' => 'LBL_REPORT_LAST_RUN_DATE',
      'type' => 'relate',
      'dbType' => 'datetime',
      'table' => 'report_cache',
      'isnull' => 'true',
      'module' => 'Report',
      'reportable' => false,
      'source' => 'non-db',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
      'width' => '15',
    ),
    'chart_type' => 
    array (
      'name' => 'chart_type',
      'vname' => 'LBL_CHART_TYPE',
      'type' => 'varchar',
      'required' => true,
      'default' => 'none',
      'len' => 36,
    ),
    'schedule_type' => 
    array (
      'name' => 'schedule_type',
      'vname' => 'LBL_SCHEDULE_TYPE',
      'type' => 'varchar',
      'len' => '3',
      'default' => 'pro',
    ),
    'favorite' => 
    array (
      'name' => 'favorite',
      'vname' => 'LBL_FAVORITE',
      'type' => 'bool',
      'required' => false,
      'reportable' => false,
    ),
    'is_admin_data' => 
    array (
      'name' => 'is_admin_data',
      'vname' => 'LBL_IS_ADMIN_DATA',
      'type' => 'bool',
      'default' => 0,
      'required' => true,
    ),
    'row_number' => 
    array (
      'name' => 'row_number',
      'vname' => 'LBL_IS_ROW_NUMBER',
      'type' => 'bool',
      'default' => 0,
      'required' => true,
    ),
  ),
  'indices' => 
  array (
    'team_set_saved_reports' => 
    array (
      'name' => 'idx_saved_reports_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
    ),
    0 => 
    array (
      'name' => 'save_reportspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_rep_owner_module_name',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'assigned_user_id',
        1 => 'name',
        2 => 'deleted',
      ),
    ),
  ),
  'relationships' => 
  array (
    'reports_team_count_relationship' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'team_sets',
      'lhs_key' => 'id',
      'rhs_module' => 'Reports',
      'rhs_table' => 'saved_reports',
      'rhs_key' => 'team_set_id',
      'relationship_type' => 'one-to-many',
    ),
    'reports_teams' => 
    array (
      'lhs_module' => 'Reports',
      'lhs_table' => 'saved_reports',
      'lhs_key' => 'team_set_id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_sets_teams',
      'join_key_lhs' => 'team_set_id',
      'join_key_rhs' => 'team_id',
    ),
    'reports_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'Reports',
      'rhs_table' => 'saved_reports',
      'rhs_key' => 'team_id',
      'relationship_type' => 'one-to-many',
    ),
    'report_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Reports',
      'rhs_table' => 'saved_reports',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'name_format_map' => 
  array (
  ),
  'visibility' => 
  array (
    'TeamSecurity' => true,
  ),
  'templates' => 
  array (
    'team_security' => 'team_security',
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