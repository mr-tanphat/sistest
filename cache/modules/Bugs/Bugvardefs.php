<?php 
 $GLOBALS["dictionary"]["Bug"]=array (
  'table' => 'bugs',
  'audited' => true,
  'comment' => 'Bugs are defects in products and services',
  'duplicate_merge' => true,
  'unified_search' => true,
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
      'vname' => 'LBL_SUBJECT',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'audited' => true,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'The short description of the bug',
      'merge_filter' => 'selected',
      'required' => true,
      'importable' => 'required',
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
      'cols' => 80,
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
      'relationship' => 'bugs_created_by',
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
      'relationship' => 'bugs_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
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
      'relationship' => 'bugs_assigned_user',
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
      'relationship' => 'bugs_team',
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
      'relationship' => 'bugs_team_count_relationship',
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
      'relationship' => 'bugs_teams',
      'bean_filter_field' => 'team_set_id',
      'rhs_key_override' => true,
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'link_class' => 'TeamSetLink',
      'link_file' => 'modules/Teams/TeamSetLink.php',
      'studio' => 'false',
      'reportable' => false,
    ),
    'bug_number' => 
    array (
      'name' => 'bug_number',
      'vname' => 'LBL_NUMBER',
      'type' => 'int',
      'readonly' => true,
      'len' => 11,
      'required' => true,
      'auto_increment' => true,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'Visual unique identifier',
      'duplicate_merge' => 'disabled',
      'disable_num_format' => true,
      'studio' => 
      array (
        'quickcreate' => false,
      ),
    ),
    'type' => 
    array (
      'name' => 'type',
      'vname' => 'LBL_TYPE',
      'type' => 'enum',
      'options' => 'bug_type_dom',
      'len' => 255,
      'comment' => 'The type of issue (ex: issue, feature)',
      'merge_filter' => 'enabled',
      'sortable' => true,
    ),
    'status' => 
    array (
      'name' => 'status',
      'vname' => 'LBL_STATUS',
      'type' => 'enum',
      'options' => 'bug_status_dom',
      'len' => 100,
      'audited' => true,
      'comment' => 'The status of the issue',
      'merge_filter' => 'enabled',
      'sortable' => true,
    ),
    'priority' => 
    array (
      'name' => 'priority',
      'vname' => 'LBL_PRIORITY',
      'type' => 'enum',
      'options' => 'bug_priority_dom',
      'len' => 100,
      'audited' => true,
      'comment' => 'An indication of the priorty of the issue',
      'merge_filter' => 'enabled',
      'sortable' => true,
    ),
    'resolution' => 
    array (
      'name' => 'resolution',
      'vname' => 'LBL_RESOLUTION',
      'type' => 'enum',
      'options' => 'bug_resolution_dom',
      'len' => 255,
      'audited' => true,
      'comment' => 'An indication of how the issue was resolved',
      'merge_filter' => 'enabled',
      'sortable' => true,
    ),
    'system_id' => 
    array (
      'name' => 'system_id',
      'vname' => 'LBL_SYSTEM_ID',
      'type' => 'int',
      'comment' => 'The offline client device that created the bug',
    ),
    'work_log' => 
    array (
      'name' => 'work_log',
      'vname' => 'LBL_WORK_LOG',
      'type' => 'text',
      'comment' => 'Free-form text used to denote activities of interest',
    ),
    'found_in_release' => 
    array (
      'name' => 'found_in_release',
      'type' => 'enum',
      'function' => 'getReleaseDropDown',
      'vname' => 'LBL_FOUND_IN_RELEASE',
      'reportable' => false,
      'comment' => 'The software or service release that manifested the bug',
      'duplicate_merge' => 'disabled',
      'audited' => true,
      'studio' => 
      array (
        'fields' => 'false',
        'listview' => false,
        'wirelesslistview' => false,
        'portaleditview' => false,
        'portaldetailview' => false,
        'portallistview' => false,
      ),
      'massupdate' => true,
    ),
    'release_name' => 
    array (
      'name' => 'release_name',
      'rname' => 'name',
      'vname' => 'LBL_FOUND_IN_RELEASE',
      'type' => 'relate',
      'dbType' => 'varchar',
      'group' => 'found_in_release',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'releases',
      'merge_filter' => 'enabled',
      'id_name' => 'found_in_release',
      'module' => 'Releases',
      'link' => 'release_link',
      'massupdate' => false,
      'studio' => 
      array (
        'editview' => false,
        'detailview' => false,
        'quickcreate' => false,
        'basic_search' => false,
        'advanced_search' => false,
        'wirelesseditview' => false,
        'wirelessdetailview' => false,
        'wirelesslistview' => 'visible',
        'wireless_basic_search' => false,
        'wireless_advanced_search' => false,
        'portaleditview' => false,
        'portaldetailview' => 'visible',
        'portallistview' => 'visible',
        'portalsearchview' => false,
      ),
    ),
    'fixed_in_release' => 
    array (
      'name' => 'fixed_in_release',
      'type' => 'enum',
      'function' => 'getReleaseDropDown',
      'vname' => 'LBL_FIXED_IN_RELEASE',
      'reportable' => false,
      'comment' => 'The software or service release that corrected the bug',
      'duplicate_merge' => 'disabled',
      'audited' => true,
      'studio' => 
      array (
        'fields' => 'false',
        'listview' => false,
        'wirelesslistview' => false,
        'portaleditview' => false,
        'portaldetailview' => false,
        'portallistview' => false,
      ),
      'massupdate' => true,
    ),
    'fixed_in_release_name' => 
    array (
      'name' => 'fixed_in_release_name',
      'rname' => 'name',
      'group' => 'fixed_in_release',
      'id_name' => 'fixed_in_release',
      'vname' => 'LBL_FIXED_IN_RELEASE',
      'type' => 'relate',
      'table' => 'releases',
      'isnull' => 'false',
      'massupdate' => false,
      'module' => 'Releases',
      'dbType' => 'varchar',
      'len' => 36,
      'source' => 'non-db',
      'link' => 'fixed_in_release_link',
      'studio' => 
      array (
        'editview' => false,
        'detailview' => false,
        'quickcreate' => false,
        'basic_search' => false,
        'advanced_search' => false,
        'wirelesseditview' => false,
        'wirelessdetailview' => false,
        'wirelesslistview' => 'visible',
        'wireless_basic_search' => false,
        'wireless_advanced_search' => false,
        'portaleditview' => false,
        'portaldetailview' => 'visible',
        'portallistview' => 'visible',
        'portalsearchview' => false,
      ),
    ),
    'source' => 
    array (
      'name' => 'source',
      'vname' => 'LBL_SOURCE',
      'type' => 'enum',
      'options' => 'source_dom',
      'len' => 255,
      'comment' => 'An indicator of how the bug was entered (ex: via web, email, etc.)',
    ),
    'product_category' => 
    array (
      'name' => 'product_category',
      'vname' => 'LBL_PRODUCT_CATEGORY',
      'type' => 'enum',
      'options' => 'product_category_dom',
      'len' => 255,
      'comment' => 'Where the bug was discovered (ex: Accounts, Contacts, Leads)',
      'sortable' => true,
    ),
    'portal_viewable' => 
    array (
      'name' => 'portal_viewable',
      'vname' => 'LBL_SHOW_IN_PORTAL',
      'type' => 'bool',
      'default' => 0,
      'reportable' => false,
    ),
    'tasks' => 
    array (
      'name' => 'tasks',
      'type' => 'link',
      'relationship' => 'bug_tasks',
      'source' => 'non-db',
      'vname' => 'LBL_TASKS',
    ),
    'notes' => 
    array (
      'name' => 'notes',
      'type' => 'link',
      'relationship' => 'bug_notes',
      'source' => 'non-db',
      'vname' => 'LBL_NOTES',
    ),
    'meetings' => 
    array (
      'name' => 'meetings',
      'type' => 'link',
      'relationship' => 'bug_meetings',
      'source' => 'non-db',
      'vname' => 'LBL_MEETINGS',
    ),
    'calls' => 
    array (
      'name' => 'calls',
      'type' => 'link',
      'relationship' => 'bug_calls',
      'source' => 'non-db',
      'vname' => 'LBL_CALLS',
    ),
    'emails' => 
    array (
      'name' => 'emails',
      'type' => 'link',
      'relationship' => 'emails_bugs_rel',
      'source' => 'non-db',
      'vname' => 'LBL_EMAILS',
    ),
    'documents' => 
    array (
      'name' => 'documents',
      'type' => 'link',
      'relationship' => 'documents_bugs',
      'source' => 'non-db',
      'vname' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
    ),
    'contacts' => 
    array (
      'name' => 'contacts',
      'type' => 'link',
      'relationship' => 'contacts_bugs',
      'source' => 'non-db',
      'vname' => 'LBL_CONTACTS',
    ),
    'accounts' => 
    array (
      'name' => 'accounts',
      'type' => 'link',
      'relationship' => 'accounts_bugs',
      'source' => 'non-db',
      'vname' => 'LBL_ACCOUNTS',
    ),
    'cases' => 
    array (
      'name' => 'cases',
      'type' => 'link',
      'relationship' => 'cases_bugs',
      'source' => 'non-db',
      'vname' => 'LBL_CASES',
    ),
    'project' => 
    array (
      'name' => 'project',
      'type' => 'link',
      'relationship' => 'projects_bugs',
      'source' => 'non-db',
      'vname' => 'LBL_PROJECTS',
    ),
    'release_link' => 
    array (
      'name' => 'release_link',
      'type' => 'link',
      'relationship' => 'bugs_release',
      'vname' => 'LBL_FOUND_IN_RELEASE',
      'link_type' => 'one',
      'module' => 'Releases',
      'bean_name' => 'Release',
      'source' => 'non-db',
    ),
    'fixed_in_release_link' => 
    array (
      'name' => 'fixed_in_release_link',
      'type' => 'link',
      'relationship' => 'bugs_fixed_in_release',
      'vname' => 'LBL_FIXED_IN_RELEASE',
      'link_type' => 'one',
      'module' => 'Releases',
      'bean_name' => 'Release',
      'source' => 'non-db',
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'bugspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    'team_set_bugs' => 
    array (
      'name' => 'idx_bugs_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
    ),
    'number' => 
    array (
      'name' => 'bugsnumk',
      'type' => 'unique',
      'fields' => 
      array (
        0 => 'bug_number',
      ),
    ),
    0 => 
    array (
      'name' => 'bug_number',
      'type' => 'unique',
      'fields' => 
      array (
        0 => 'bug_number',
        1 => 'system_id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_bug_name',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'name',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_bugs_assigned_user',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'assigned_user_id',
      ),
    ),
  ),
  'relationships' => 
  array (
    'bugs_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Bugs',
      'rhs_table' => 'bugs',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'bugs_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Bugs',
      'rhs_table' => 'bugs',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'bugs_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Bugs',
      'rhs_table' => 'bugs',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'bugs_team_count_relationship' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'team_sets',
      'lhs_key' => 'id',
      'rhs_module' => 'Bugs',
      'rhs_table' => 'bugs',
      'rhs_key' => 'team_set_id',
      'relationship_type' => 'one-to-many',
    ),
    'bugs_teams' => 
    array (
      'lhs_module' => 'Bugs',
      'lhs_table' => 'bugs',
      'lhs_key' => 'team_set_id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_sets_teams',
      'join_key_lhs' => 'team_set_id',
      'join_key_rhs' => 'team_id',
    ),
    'bugs_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'Bugs',
      'rhs_table' => 'bugs',
      'rhs_key' => 'team_id',
      'relationship_type' => 'one-to-many',
    ),
    'bug_tasks' => 
    array (
      'lhs_module' => 'Bugs',
      'lhs_table' => 'bugs',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Bugs',
    ),
    'bug_meetings' => 
    array (
      'lhs_module' => 'Bugs',
      'lhs_table' => 'bugs',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Bugs',
    ),
    'bug_calls' => 
    array (
      'lhs_module' => 'Bugs',
      'lhs_table' => 'bugs',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Bugs',
    ),
    'bug_emails' => 
    array (
      'lhs_module' => 'Bugs',
      'lhs_table' => 'bugs',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Bugs',
    ),
    'bug_notes' => 
    array (
      'lhs_module' => 'Bugs',
      'lhs_table' => 'bugs',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Bugs',
    ),
    'bugs_release' => 
    array (
      'lhs_module' => 'Releases',
      'lhs_table' => 'releases',
      'lhs_key' => 'id',
      'rhs_module' => 'Bugs',
      'rhs_table' => 'bugs',
      'rhs_key' => 'found_in_release',
      'relationship_type' => 'one-to-many',
    ),
    'bugs_fixed_in_release' => 
    array (
      'lhs_module' => 'Releases',
      'lhs_table' => 'releases',
      'lhs_key' => 'id',
      'rhs_module' => 'Bugs',
      'rhs_table' => 'bugs',
      'rhs_key' => 'fixed_in_release',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'name_format_map' => 
  array (
  ),
  'visibility' => 
  array (
    'TeamSecurity' => true,
  ),
  'templates' => 
  array (
    'issue' => 'issue',
    'team_security' => 'team_security',
    'assignable' => 'assignable',
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