<?php 
 $GLOBALS["dictionary"]["bc_survey_answers"]=array (
  'table' => 'bc_survey_answers',
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
      'type' => 'text',
      'link' => true,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
      'rows' => 80,
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
      'rows' => '6',
      'cols' => '80',
      'required' => false,
      'massupdate' => 0,
      'no_default' => false,
      'comments' => 'Full text of the note',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'studio' => 'visible',
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
      'relationship' => 'bc_survey_answers_created_by',
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
      'relationship' => 'bc_survey_answers_modified_user',
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
      'relationship' => 'bc_survey_answers_assigned_user',
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
    'answer_sequence' => 
    array (
      'required' => false,
      'name' => 'answer_sequence',
      'vname' => 'LBL_ANSWER_SEQUENCE',
      'type' => 'int',
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
      'len' => '11',
      'size' => '20',
    ),
    'score_weight' => 
    array (
      'required' => false,
      'name' => 'score_weight',
      'vname' => 'LBL_SCORE_WEIGHT',
      'type' => 'int',
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
      'len' => '11',
      'size' => '20',
    ),
    'logic_target' => 
    array (
      'required' => false,
      'name' => 'logic_target',
      'vname' => 'LBL_LOGIC_TARGET',
      'type' => 'text',
      'dbType' => 'varchar',
      'massupdate' => 0,
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 1000,
      'size' => '20',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'logic_action' => 
    array (
      'required' => false,
      'name' => 'logic_action',
      'vname' => 'LBL_LOGIC_ACTION',
      'type' => 'text',
      'dbType' => 'varchar',
      'massupdate' => 0,
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 255,
      'size' => '20',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'bc_survey_answers_bc_survey_questions' => 
    array (
      'name' => 'bc_survey_answers_bc_survey_questions',
      'type' => 'link',
      'relationship' => 'bc_survey_answers_bc_survey_questions',
      'source' => 'non-db',
      'module' => 'bc_survey_questions',
      'bean_name' => false,
      'vname' => 'LBL_BC_SURVEY_ANSWERS_BC_SURVEY_QUESTIONS_FROM_BC_SURVEY_QUESTIONS_TITLE',
      'id_name' => 'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida',
    ),
    'bc_survey_answers_bc_survey_questions_name' => 
    array (
      'name' => 'bc_survey_answers_bc_survey_questions_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_BC_SURVEY_ANSWERS_BC_SURVEY_QUESTIONS_FROM_BC_SURVEY_QUESTIONS_TITLE',
      'save' => true,
      'id_name' => 'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida',
      'link' => 'bc_survey_answers_bc_survey_questions_right',
      'table' => 'bc_survey_questions',
      'module' => 'bc_survey_questions',
      'rname' => 'name',
    ),
    'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida' => 
    array (
      'name' => 'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'LBL_BC_SURVEY_ANSWERS_BC_SURVEY_QUESTIONS_FROM_BC_SURVEY_ANSWERS_TITLE',
      'id_name' => 'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida',
      'link' => 'bc_survey_answers_bc_survey_questions_right',
      'table' => 'bc_survey_questions',
      'module' => 'bc_survey_questions',
      'rname' => 'id',
      'reportable' => false,
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
    ),
    'bc_survey_answers_bc_survey_questions_right' => 
    array (
      'name' => 'bc_survey_answers_bc_survey_questions_right',
      'type' => 'link',
      'relationship' => 'bc_survey_answers_bc_survey_questions',
      'source' => 'non-db',
      'vname' => 'LBL_BC_SURVEY_ANSWERS_BC_SURVEY_QUESTIONS_FROM_BC_SURVEY_ANSWERS_TITLE',
      'id_name' => '_idb',
      'side' => 'right',
    ),
    'bc_submission_data_bc_survey_answers' => 
    array (
      'name' => 'bc_submission_data_bc_survey_answers',
      'type' => 'link',
      'relationship' => 'bc_submission_data_bc_survey_answers',
      'source' => 'non-db',
      'module' => 'bc_submission_data',
      'bean_name' => false,
      'side' => 'right',
      'vname' => 'LBL_BC_SUBMISSION_DATA_BC_SURVEY_ANSWERS_FROM_BC_SUBMISSION_DATA_TITLE',
    ),
  ),
  'relationships' => 
  array (
    'bc_survey_answers_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'bc_survey_answers',
      'rhs_table' => 'bc_survey_answers',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'bc_survey_answers_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'bc_survey_answers',
      'rhs_table' => 'bc_survey_answers',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'bc_survey_answers_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'bc_survey_answers',
      'rhs_table' => 'bc_survey_answers',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'bc_survey_answerspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'name_format_map' => 
  array (
  ),
  'visibility' => 
  array (
  ),
  'templates' => 
  array (
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