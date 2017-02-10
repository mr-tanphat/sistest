<?php 
 $GLOBALS["dictionary"]["Document"]=array (
  'table' => 'documents',
  'unified_search' => true,
  'full_text_search' => true,
  'unified_search_default_enabled' => true,
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
      'source' => 'non-db',
      'type' => 'varchar',
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
      'relationship' => 'documents_created_by',
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
      'relationship' => 'documents_modified_user',
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
      'relationship' => 'documents_assigned_user',
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
      'relationship' => 'documents_team',
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
      'relationship' => 'documents_team_count_relationship',
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
      'relationship' => 'documents_teams',
      'bean_filter_field' => 'team_set_id',
      'rhs_key_override' => true,
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'link_class' => 'TeamSetLink',
      'link_file' => 'modules/Teams/TeamSetLink.php',
      'studio' => 'false',
      'reportable' => false,
    ),
    'document_name' => 
    array (
      'name' => 'document_name',
      'vname' => 'LBL_DOCUMENT_NAME',
      'type' => 'varchar',
      'len' => '255',
      'required' => true,
      'importable' => 'required',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
    ),
    'doc_id' => 
    array (
      'name' => 'doc_id',
      'vname' => 'LBL_DOC_ID',
      'type' => 'varchar',
      'len' => '100',
      'comment' => 'Document ID from documents web server provider',
      'importable' => false,
      'studio' => 'false',
    ),
    'doc_type' => 
    array (
      'name' => 'doc_type',
      'vname' => 'LBL_DOC_TYPE',
      'type' => 'enum',
      'function' => 'getDocumentsExternalApiDropDown',
      'len' => '100',
      'comment' => 'Document type (ex: Google, box.net, IBM SmartCloud)',
      'popupHelp' => 'LBL_DOC_TYPE_POPUP',
      'massupdate' => false,
      'options' => 'eapm_list',
      'default' => 'Sugar',
      'studio' => 
      array (
        'wirelesseditview' => false,
        'wirelessdetailview' => false,
        'wirelesslistview' => false,
        'wireless_basic_search' => false,
      ),
    ),
    'doc_url' => 
    array (
      'name' => 'doc_url',
      'vname' => 'LBL_DOC_URL',
      'type' => 'varchar',
      'len' => '255',
      'comment' => 'Document URL from documents web server provider',
      'importable' => false,
      'massupdate' => false,
      'studio' => 'false',
    ),
    'filename' => 
    array (
      'name' => 'filename',
      'vname' => 'LBL_FILENAME',
      'type' => 'file',
      'source' => 'non-db',
      'comment' => 'The filename of the document attachment',
      'required' => true,
      'noChange' => true,
      'allowEapm' => true,
      'fileId' => 'document_revision_id',
      'docType' => 'doc_type',
      'docUrl' => 'doc_url',
      'docId' => 'doc_id',
    ),
    'active_date' => 
    array (
      'name' => 'active_date',
      'vname' => 'LBL_DOC_ACTIVE_DATE',
      'type' => 'date',
      'importable' => 'required',
      'required' => true,
      'display_default' => 'now',
    ),
    'exp_date' => 
    array (
      'name' => 'exp_date',
      'vname' => 'LBL_DOC_EXP_DATE',
      'type' => 'date',
    ),
    'category_id' => 
    array (
      'name' => 'category_id',
      'vname' => 'LBL_SF_CATEGORY',
      'type' => 'enum',
      'len' => 100,
      'options' => 'document_category_dom',
      'reportable' => true,
    ),
    'subcategory_id' => 
    array (
      'name' => 'subcategory_id',
      'vname' => 'LBL_SF_SUBCATEGORY',
      'type' => 'enum',
      'len' => 100,
      'options' => 'document_subcategory_dom',
      'reportable' => true,
    ),
    'status_id' => 
    array (
      'name' => 'status_id',
      'vname' => 'LBL_DOC_STATUS_ID',
      'type' => 'enum',
      'len' => 100,
      'options' => 'document_status_dom',
      'reportable' => false,
    ),
    'status' => 
    array (
      'name' => 'status',
      'vname' => 'LBL_DOC_STATUS',
      'type' => 'varchar',
      'source' => 'non-db',
      'comment' => 'Document status for Meta-Data framework',
    ),
    'document_revision_id' => 
    array (
      'name' => 'document_revision_id',
      'vname' => 'LBL_DOCUMENT_REVISION_ID',
      'type' => 'id',
      'len' => '36',
      'reportable' => false,
    ),
    'revisions' => 
    array (
      'name' => 'revisions',
      'type' => 'link',
      'relationship' => 'document_revisions',
      'source' => 'non-db',
      'vname' => 'LBL_REVISIONS',
    ),
    'revision' => 
    array (
      'name' => 'revision',
      'vname' => 'LBL_DOC_VERSION',
      'type' => 'varchar',
      'reportable' => false,
      'required' => true,
      'source' => 'non-db',
      'importable' => 'required',
      'default' => '1',
    ),
    'last_rev_created_name' => 
    array (
      'name' => 'last_rev_created_name',
      'vname' => 'LBL_LAST_REV_CREATOR',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'last_rev_mime_type' => 
    array (
      'name' => 'last_rev_mime_type',
      'vname' => 'LBL_LAST_REV_MIME_TYPE',
      'type' => 'varchar',
      'reportable' => false,
      'studio' => 'false',
      'source' => 'non-db',
    ),
    'latest_revision' => 
    array (
      'name' => 'latest_revision',
      'vname' => 'LBL_LATEST_REVISION',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'last_rev_create_date' => 
    array (
      'name' => 'last_rev_create_date',
      'type' => 'date',
      'table' => 'document_revisions',
      'link' => 'revisions',
      'join_name' => 'document_revisions',
      'vname' => 'LBL_LAST_REV_CREATE_DATE',
      'rname' => 'date_entered',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'contracts' => 
    array (
      'name' => 'contracts',
      'type' => 'link',
      'relationship' => 'contracts_documents',
      'source' => 'non-db',
      'vname' => 'LBL_CONTRACTS',
    ),
    'leads' => 
    array (
      'name' => 'leads',
      'type' => 'link',
      'relationship' => 'leads_documents',
      'source' => 'non-db',
      'vname' => 'LBL_LEADS',
    ),
    'accounts' => 
    array (
      'name' => 'accounts',
      'type' => 'link',
      'relationship' => 'documents_accounts',
      'source' => 'non-db',
      'vname' => 'LBL_ACCOUNTS_SUBPANEL_TITLE',
    ),
    'contacts' => 
    array (
      'name' => 'contacts',
      'type' => 'link',
      'relationship' => 'documents_contacts',
      'source' => 'non-db',
      'vname' => 'LBL_CONTACTS_SUBPANEL_TITLE',
    ),
    'opportunities' => 
    array (
      'name' => 'opportunities',
      'type' => 'link',
      'relationship' => 'documents_opportunities',
      'source' => 'non-db',
      'vname' => 'LBL_OPPORTUNITIES_SUBPANEL_TITLE',
    ),
    'cases' => 
    array (
      'name' => 'cases',
      'type' => 'link',
      'relationship' => 'documents_cases',
      'source' => 'non-db',
      'vname' => 'LBL_CASES_SUBPANEL_TITLE',
    ),
    'bugs' => 
    array (
      'name' => 'bugs',
      'type' => 'link',
      'relationship' => 'documents_bugs',
      'source' => 'non-db',
      'vname' => 'LBL_BUGS_SUBPANEL_TITLE',
    ),
    'quotes' => 
    array (
      'name' => 'quotes',
      'type' => 'link',
      'relationship' => 'documents_quotes',
      'source' => 'non-db',
      'vname' => 'LBL_QUOTES_SUBPANEL_TITLE',
    ),
    'products' => 
    array (
      'name' => 'products',
      'type' => 'link',
      'relationship' => 'documents_products',
      'source' => 'non-db',
      'vname' => 'LBL_PRODUCTS_SUBPANEL_TITLE',
    ),
    'related_doc_id' => 
    array (
      'name' => 'related_doc_id',
      'vname' => 'LBL_RELATED_DOCUMENT_ID',
      'reportable' => false,
      'dbType' => 'id',
      'type' => 'varchar',
      'len' => '36',
    ),
    'related_doc_name' => 
    array (
      'name' => 'related_doc_name',
      'vname' => 'LBL_DET_RELATED_DOCUMENT',
      'type' => 'relate',
      'table' => 'documents',
      'id_name' => 'related_doc_id',
      'module' => 'Documents',
      'source' => 'non-db',
      'comment' => 'The related document name for Meta-Data framework',
    ),
    'related_doc_rev_id' => 
    array (
      'name' => 'related_doc_rev_id',
      'vname' => 'LBL_RELATED_DOCUMENT_REVISION_ID',
      'reportable' => false,
      'dbType' => 'id',
      'type' => 'varchar',
      'len' => '36',
    ),
    'related_doc_rev_number' => 
    array (
      'name' => 'related_doc_rev_number',
      'vname' => 'LBL_DET_RELATED_DOCUMENT_VERSION',
      'type' => 'varchar',
      'source' => 'non-db',
      'comment' => 'The related document version number for Meta-Data framework',
    ),
    'is_template' => 
    array (
      'name' => 'is_template',
      'vname' => 'LBL_IS_TEMPLATE',
      'type' => 'bool',
      'default' => 0,
      'reportable' => false,
    ),
    'template_type' => 
    array (
      'name' => 'template_type',
      'vname' => 'LBL_TEMPLATE_TYPE',
      'type' => 'enum',
      'len' => 100,
      'options' => 'document_template_type_dom',
      'reportable' => false,
    ),
    'latest_revision_name' => 
    array (
      'name' => 'latest_revision_name',
      'vname' => 'LBL_LASTEST_REVISION_NAME',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'selected_revision_name' => 
    array (
      'name' => 'selected_revision_name',
      'vname' => 'LBL_SELECTED_REVISION_NAME',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'contract_status' => 
    array (
      'name' => 'contract_status',
      'vname' => 'LBL_CONTRACT_STATUS',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'contract_name' => 
    array (
      'name' => 'contract_name',
      'vname' => 'LBL_CONTRACT_NAME',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'linked_id' => 
    array (
      'name' => 'linked_id',
      'vname' => 'LBL_LINKED_ID',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'selected_revision_id' => 
    array (
      'name' => 'selected_revision_id',
      'vname' => 'LBL_SELECTED_REVISION_ID',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'latest_revision_id' => 
    array (
      'name' => 'latest_revision_id',
      'vname' => 'LBL_LATEST_REVISION_ID',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
    'selected_revision_filename' => 
    array (
      'name' => 'selected_revision_filename',
      'vname' => 'LBL_SELECTED_REVISION_FILENAME',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'non-db',
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'documentspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    'team_set_documents' => 
    array (
      'name' => 'idx_documents_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
    ),
    0 => 
    array (
      'name' => 'idx_doc_cat',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'category_id',
        1 => 'subcategory_id',
      ),
    ),
  ),
  'relationships' => 
  array (
    'documents_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'documents_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'documents_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'documents_team_count_relationship' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'team_sets',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'team_set_id',
      'relationship_type' => 'one-to-many',
    ),
    'documents_teams' => 
    array (
      'lhs_module' => 'Documents',
      'lhs_table' => 'documents',
      'lhs_key' => 'team_set_id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_sets_teams',
      'join_key_lhs' => 'team_set_id',
      'join_key_rhs' => 'team_id',
    ),
    'documents_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'team_id',
      'relationship_type' => 'one-to-many',
    ),
    'document_revisions' => 
    array (
      'lhs_module' => 'Documents',
      'lhs_table' => 'documents',
      'lhs_key' => 'id',
      'rhs_module' => 'DocumentRevisions',
      'rhs_table' => 'document_revisions',
      'rhs_key' => 'document_id',
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