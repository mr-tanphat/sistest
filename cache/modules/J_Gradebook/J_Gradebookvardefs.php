<?php 
 $GLOBALS["dictionary"]["J_Gradebook"]=array (
  'table' => 'j_gradebook',
  'audited' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'studio' => 
      array (
        'portaleditview' => false,
      ),
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'studio' => 
      array (
        'portaleditview' => false,
      ),
      'options' => 'date_range_search_dom',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 4,
      'cols' => 25,
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
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'j_gradebook_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'j_gradebook_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
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
      'relationship' => 'j_gradebook_team',
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
      'relationship' => 'j_gradebook_team_count_relationship',
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
      'relationship' => 'j_gradebook_teams',
      'bean_filter_field' => 'team_set_id',
      'rhs_key_override' => true,
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'link_class' => 'TeamSetLink',
      'link_file' => 'modules/Teams/TeamSetLink.php',
      'studio' => 'false',
      'reportable' => false,
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'j_gradebook_assigned_user',
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
    'type' => 
    array (
      'name' => 'type',
      'vname' => 'LBL_TYPE',
      'type' => 'enum',
      'len' => '20',
      'options' => 'gradeconfig_type_options',
    ),
    'status' => 
    array (
      'name' => 'status',
      'vname' => 'LBL_STATUS',
      'type' => 'enum',
      'len' => '20',
      'default' => 'Not Approval',
      'options' => 'gradebook_status_options',
    ),
    'date_input' => 
    array (
      'name' => 'date_input',
      'vname' => 'LBL_DATE_INPUT',
      'type' => 'date',
      'display_default' => 'now',
    ),
    'j_gradebook_j_gradebookdetail' => 
    array (
      'name' => 'j_gradebook_j_gradebookdetail',
      'type' => 'link',
      'relationship' => 'j_gradebook_j_gradebookdetail',
      'module' => 'J_GradebookDetail',
      'bean_name' => 'J_GradebookDetail',
      'source' => 'non-db',
      'vname' => 'LBL_GRADEBOOK_DETAIL',
    ),
    'weight' => 
    array (
      'name' => 'weight',
      'vname' => 'LBL_WEIGHT',
      'type' => 'int',
      'default' => 0,
    ),
    'grade_config' => 
    array (
      'name' => 'grade_config',
      'vname' => 'LBL_CONFIG',
      'type' => 'text',
    ),
    'date_confirm' => 
    array (
      'name' => 'date_confirm',
      'vname' => 'LBL_DATE_CONFIRM',
      'type' => 'date',
    ),
    'j_class_j_gradebook_1' => 
    array (
      'name' => 'j_class_j_gradebook_1',
      'type' => 'link',
      'relationship' => 'j_class_j_gradebook_1',
      'source' => 'non-db',
      'module' => 'J_Class',
      'bean_name' => 'J_Class',
      'side' => 'right',
      'vname' => 'LBL_J_CLASS_J_GRADEBOOK_1_FROM_J_CLASS_TITLE',
      'id_name' => 'j_class_j_gradebook_1j_class_ida',
      'link-type' => 'one',
    ),
    'j_class_j_gradebook_1_name' => 
    array (
      'name' => 'j_class_j_gradebook_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_J_CLASS_J_GRADEBOOK_1_FROM_J_CLASS_TITLE',
      'save' => true,
      'required' => true,
      'id_name' => 'j_class_j_gradebook_1j_class_ida',
      'link' => 'j_class_j_gradebook_1',
      'table' => 'j_class',
      'module' => 'J_Class',
      'rname' => 'name',
    ),
    'j_class_j_gradebook_1j_class_ida' => 
    array (
      'name' => 'j_class_j_gradebook_1j_class_ida',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'LBL_J_CLASS_J_GRADEBOOK_1_FROM_J_GRADEBOOK_TITLE_ID',
      'id_name' => 'j_class_j_gradebook_1j_class_ida',
      'link' => 'j_class_j_gradebook_1',
      'table' => 'j_class',
      'module' => 'J_Class',
      'rname' => 'id',
      'reportable' => false,
      'side' => 'right',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
      'required' => true,
    ),
    'c_teachers_j_gradebook_1' => 
    array (
      'name' => 'c_teachers_j_gradebook_1',
      'type' => 'link',
      'relationship' => 'c_teachers_j_gradebook_1',
      'source' => 'non-db',
      'module' => 'C_Teachers',
      'bean_name' => 'C_Teachers',
      'side' => 'right',
      'vname' => 'LBL_C_TEACHERS_J_GRADEBOOK_1_FROM_C_TEACHERS_TITLE',
      'id_name' => 'c_teachers_j_gradebook_1c_teachers_ida',
      'link-type' => 'one',
    ),
    'c_teachers_j_gradebook_1_name' => 
    array (
      'name' => 'c_teachers_j_gradebook_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_C_TEACHERS_J_GRADEBOOK_1_FROM_C_TEACHERS_TITLE',
      'save' => true,
      'id_name' => 'c_teachers_j_gradebook_1c_teachers_ida',
      'link' => 'c_teachers_j_gradebook_1',
      'table' => 'c_teachers',
      'module' => 'C_Teachers',
      'rname' => 'name',
      'db_concat_fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
    ),
    'c_teachers_j_gradebook_1c_teachers_ida' => 
    array (
      'name' => 'c_teachers_j_gradebook_1c_teachers_ida',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'LBL_C_TEACHERS_J_GRADEBOOK_1_FROM_J_GRADEBOOK_TITLE_ID',
      'id_name' => 'c_teachers_j_gradebook_1c_teachers_ida',
      'link' => 'c_teachers_j_gradebook_1',
      'table' => 'c_teachers',
      'module' => 'C_Teachers',
      'rname' => 'id',
      'reportable' => false,
      'side' => 'right',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
    ),
  ),
  'relationships' => 
  array (
    'j_gradebook_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'J_Gradebook',
      'rhs_table' => 'j_gradebook',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'j_gradebook_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'J_Gradebook',
      'rhs_table' => 'j_gradebook',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'j_gradebook_team_count_relationship' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'team_sets',
      'lhs_key' => 'id',
      'rhs_module' => 'J_Gradebook',
      'rhs_table' => 'j_gradebook',
      'rhs_key' => 'team_set_id',
      'relationship_type' => 'one-to-many',
    ),
    'j_gradebook_teams' => 
    array (
      'lhs_module' => 'J_Gradebook',
      'lhs_table' => 'j_gradebook',
      'lhs_key' => 'team_set_id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_sets_teams',
      'join_key_lhs' => 'team_set_id',
      'join_key_rhs' => 'team_id',
    ),
    'j_gradebook_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'J_Gradebook',
      'rhs_table' => 'j_gradebook',
      'rhs_key' => 'team_id',
      'relationship_type' => 'one-to-many',
    ),
    'j_gradebook_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'J_Gradebook',
      'rhs_table' => 'j_gradebook',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'j_gradebook_j_gradebookdetail' => 
    array (
      'lhs_module' => 'J_Gradebook',
      'lhs_table' => 'j_gradebook',
      'lhs_key' => 'id',
      'rhs_module' => 'J_GradebookDetail',
      'rhs_table' => 'j_gradebookdetail',
      'rhs_key' => 'gradebook_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'j_gradebookpk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    'team_set_j_gradebook' => 
    array (
      'name' => 'idx_j_gradebook_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
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
    'assignable' => 'assignable',
    'team_security' => 'team_security',
    'basic' => 'basic',
  ),
  'favorites' => true,
  'related_calc_fields' => 
  array (
  ),
  'custom_fields' => false,
  'acls' => 
  array (
    'SugarACLStatic' => true,
  ),
);