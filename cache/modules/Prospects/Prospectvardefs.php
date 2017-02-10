<?php 
 $GLOBALS["dictionary"]["Prospect"]=array (
  'table' => 'prospects',
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
      'rname' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'fields' => 
      array (
        0 => 'last_name',
        1 => 'first_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '255',
      'db_concat_fields' => 
      array (
        0 => 'last_name',
        1 => 'first_name',
      ),
      'importable' => 'false',
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
      'relationship' => 'prospects_created_by',
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
      'relationship' => 'prospects_modified_user',
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
      'relationship' => 'prospects_assigned_user',
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
      'relationship' => 'prospects_team',
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
      'relationship' => 'prospects_team_count_relationship',
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
      'relationship' => 'prospects_teams',
      'bean_filter_field' => 'team_set_id',
      'rhs_key_override' => true,
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'link_class' => 'TeamSetLink',
      'link_file' => 'modules/Teams/TeamSetLink.php',
      'studio' => 'false',
      'reportable' => false,
    ),
    'salutation' => 
    array (
      'name' => 'salutation',
      'vname' => 'LBL_SALUTATION',
      'type' => 'enum',
      'options' => 'salutation_dom',
      'massupdate' => false,
      'len' => '255',
      'comment' => 'Contact salutation (e.g., Mr, Ms)',
    ),
    'first_name' => 
    array (
      'name' => 'first_name',
      'vname' => 'LBL_FIRST_NAME',
      'type' => 'varchar',
      'len' => '100',
      'required' => true,
      'unified_search' => false,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'First name of the contact',
      'merge_filter' => 'disabled',
      'comments' => 'First name of the contact',
      'importable' => 'true',
      'calculated' => false,
    ),
    'last_name' => 
    array (
      'name' => 'last_name',
      'vname' => 'LBL_LAST_NAME',
      'type' => 'varchar',
      'len' => '100',
      'unified_search' => false,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'Last name of the contact',
      'merge_filter' => 'disabled',
      'required' => false,
      'importable' => 'true',
      'comments' => 'Last name of the contact',
      'calculated' => false,
    ),
    'full_name' => 
    array (
      'name' => 'full_name',
      'rname' => 'full_name',
      'vname' => 'LBL_NAME',
      'type' => 'fullname',
      'fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '510',
      'db_concat_fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'title' => 
    array (
      'name' => 'title',
      'vname' => 'LBL_TITLE',
      'type' => 'varchar',
      'len' => '100',
      'comment' => 'The title of the contact',
    ),
    'department' => 
    array (
      'name' => 'department',
      'vname' => 'LBL_DEPARTMENT',
      'type' => 'varchar',
      'len' => '255',
      'comment' => 'The department of the contact',
      'merge_filter' => 'enabled',
    ),
    'do_not_call' => 
    array (
      'name' => 'do_not_call',
      'vname' => 'LBL_DO_NOT_CALL',
      'type' => 'bool',
      'default' => '0',
      'massupdate' => false,
    ),
    'phone_home' => 
    array (
      'name' => 'phone_home',
      'vname' => 'LBL_HOME_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Home phone number of the contact',
      'merge_filter' => 'enabled',
    ),
    'email' => 
    array (
      'name' => 'email',
      'type' => 'email',
      'query_type' => 'default',
      'source' => 'non-db',
      'operator' => 'subquery',
      'subquery' => 'SELECT eabr.bean_id FROM email_addr_bean_rel eabr JOIN email_addresses ea ON (ea.id = eabr.email_address_id) WHERE eabr.deleted=0 AND ea.email_address LIKE',
      'db_field' => 
      array (
        0 => 'id',
      ),
      'vname' => 'LBL_ANY_EMAIL',
      'studio' => 
      array (
        'visible' => false,
        'searchview' => true,
      ),
      'required' => true,
    ),
    'phone_mobile' => 
    array (
      'name' => 'phone_mobile',
      'vname' => 'LBL_MOBILE_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => false,
      'audited' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Mobile phone number of the contact',
      'merge_filter' => 'disabled',
      'comments' => 'Mobile phone number of the contact',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'calculated' => false,
      'required' => true,
      'importable' => 'required',
    ),
    'phone_work' => 
    array (
      'name' => 'phone_work',
      'vname' => 'LBL_OFFICE_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'audited' => true,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Work phone number of the contact',
      'merge_filter' => 'enabled',
    ),
    'phone_other' => 
    array (
      'name' => 'phone_other',
      'vname' => 'LBL_OTHER_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Other phone number for the contact',
      'merge_filter' => 'enabled',
    ),
    'phone_fax' => 
    array (
      'name' => 'phone_fax',
      'vname' => 'LBL_FAX_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Contact fax number',
      'merge_filter' => 'enabled',
    ),
    'email1' => 
    array (
      'name' => 'email1',
      'vname' => 'LBL_EMAIL_ADDRESS',
      'type' => 'varchar',
      'function' => 
      array (
        'name' => 'getEmailAddressWidget',
        'returns' => 'html',
      ),
      'source' => 'non-db',
      'group' => 'email1',
      'merge_filter' => 'disabled',
      'required' => false,
      'studio' => 
      array (
        'editview' => true,
        'editField' => true,
        'searchview' => false,
        'popupsearch' => false,
      ),
      'full_text_search' => 
      array (
        'boost' => 3,
        'analyzer' => 'whitespace',
      ),
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'calculated' => false,
      'importable' => 'true',
    ),
    'email2' => 
    array (
      'name' => 'email2',
      'vname' => 'LBL_OTHER_EMAIL_ADDRESS',
      'type' => 'varchar',
      'function' => 
      array (
        'name' => 'getEmailAddressWidget',
        'returns' => 'html',
      ),
      'source' => 'non-db',
      'group' => 'email2',
      'merge_filter' => 'enabled',
      'studio' => 'false',
    ),
    'invalid_email' => 
    array (
      'name' => 'invalid_email',
      'vname' => 'LBL_INVALID_EMAIL',
      'source' => 'non-db',
      'type' => 'bool',
      'massupdate' => false,
      'studio' => 'false',
    ),
    'email_opt_out' => 
    array (
      'name' => 'email_opt_out',
      'vname' => 'LBL_EMAIL_OPT_OUT',
      'source' => 'non-db',
      'type' => 'bool',
      'massupdate' => false,
      'studio' => 'false',
    ),
    'primary_address_street' => 
    array (
      'name' => 'primary_address_street',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'group' => 'primary_address',
      'comment' => 'Street address for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_street_2' => 
    array (
      'name' => 'primary_address_street_2',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'primary_address_street_3' => 
    array (
      'name' => 'primary_address_street_3',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'primary_address_city' => 
    array (
      'name' => 'primary_address_city',
      'vname' => 'LBL_PRIMARY_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'primary_address',
      'comment' => 'City for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_state' => 
    array (
      'name' => 'primary_address_state',
      'vname' => 'LBL_PRIMARY_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'primary_address',
      'comment' => 'State for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_postalcode' => 
    array (
      'name' => 'primary_address_postalcode',
      'vname' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'primary_address',
      'comment' => 'Postal code for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_country' => 
    array (
      'name' => 'primary_address_country',
      'vname' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
      'type' => 'varchar',
      'group' => 'primary_address',
      'comment' => 'Country for primary address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_street' => 
    array (
      'name' => 'alt_address_street',
      'vname' => 'LBL_ALT_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'group' => 'alt_address',
      'comment' => 'Street address for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_street_2' => 
    array (
      'name' => 'alt_address_street_2',
      'vname' => 'LBL_ALT_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'alt_address_street_3' => 
    array (
      'name' => 'alt_address_street_3',
      'vname' => 'LBL_ALT_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'alt_address_city' => 
    array (
      'name' => 'alt_address_city',
      'vname' => 'LBL_ALT_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'alt_address',
      'comment' => 'City for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_state' => 
    array (
      'name' => 'alt_address_state',
      'vname' => 'LBL_ALT_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'alt_address',
      'comment' => 'State for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_postalcode' => 
    array (
      'name' => 'alt_address_postalcode',
      'vname' => 'LBL_ALT_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'alt_address',
      'comment' => 'Postal code for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_country' => 
    array (
      'name' => 'alt_address_country',
      'vname' => 'LBL_ALT_ADDRESS_COUNTRY',
      'type' => 'varchar',
      'group' => 'alt_address',
      'comment' => 'Country for alternate address',
      'merge_filter' => 'enabled',
    ),
    'assistant' => 
    array (
      'name' => 'assistant',
      'vname' => 'LBL_ASSISTANT',
      'type' => 'varchar',
      'len' => '150',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 2,
      ),
      'comment' => 'Name of the assistant of the contact',
      'merge_filter' => 'enabled',
    ),
    'assistant_phone' => 
    array (
      'name' => 'assistant_phone',
      'vname' => 'LBL_ASSISTANT_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'group' => 'assistant',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Phone number of the assistant of the contact',
      'merge_filter' => 'enabled',
    ),
    'email_addresses_primary' => 
    array (
      'name' => 'email_addresses_primary',
      'type' => 'link',
      'relationship' => 'prospects_email_addresses_primary',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
    ),
    'email_addresses' => 
    array (
      'name' => 'email_addresses',
      'type' => 'link',
      'relationship' => 'prospects_email_addresses',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESSES',
      'reportable' => false,
      'rel_fields' => 
      array (
        'primary_address' => 
        array (
          'type' => 'bool',
        ),
      ),
    ),
    'email_addresses_non_primary' => 
    array (
      'name' => 'email_addresses_non_primary',
      'type' => 'email',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_NON_PRIMARY',
      'studio' => false,
      'reportable' => false,
      'massupdate' => false,
    ),
    'tracker_key' => 
    array (
      'name' => 'tracker_key',
      'vname' => 'LBL_TRACKER_KEY',
      'type' => 'int',
      'len' => '11',
      'required' => true,
      'auto_increment' => true,
      'importable' => 'false',
      'studio' => 
      array (
        'editview' => false,
      ),
    ),
    'converted' => 
    array (
      'name' => 'converted',
      'vname' => 'LBL_CONVERTED',
      'type' => 'bool',
      'default' => '',
      'comment' => 'Has Lead been converted to a Contact (and other Sugar objects)',
      'massupdate' => true,
    ),
    'birthdate' => 
    array (
      'name' => 'birthdate',
      'vname' => 'LBL_BIRTHDATE',
      'massupdate' => false,
      'type' => 'date',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'birthmonth' => 
    array (
      'required' => false,
      'name' => 'birthmonth',
      'vname' => 'LBL_BIRTH_MONTH',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => 'Birth Month',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => 5,
      'size' => '20',
      'options' => 'birth_month_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'full_target_name' => 
    array (
      'required' => false,
      'name' => 'full_target_name',
      'vname' => 'LBL_FULL_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'len' => '250',
      'size' => '20',
    ),
    'lead_id' => 
    array (
      'name' => 'lead_id',
      'type' => 'id',
      'reportable' => false,
      'vname' => 'LBL_LEAD_ID',
    ),
    'account_name' => 
    array (
      'name' => 'account_name',
      'vname' => 'LBL_ACCOUNT_NAME',
      'type' => 'varchar',
      'len' => '150',
    ),
    'campaign_id' => 
    array (
      'name' => 'campaign_id',
      'comment' => 'Campaign that generated lead',
      'vname' => 'LBL_CAMPAIGN_ID',
      'rname' => 'id',
      'id_name' => 'campaign_id',
      'type' => 'id',
      'table' => 'campaigns',
      'isnull' => 'true',
      'module' => 'Campaigns',
      'reportable' => false,
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
    ),
    'campaign_name' => 
    array (
      'name' => 'campaign_name',
      'rname' => 'name',
      'id_name' => 'campaign_id',
      'vname' => 'LBL_CAMPAIGN',
      'type' => 'relate',
      'link' => 'campaign_prospects',
      'table' => 'campaigns',
      'isnull' => 'true',
      'module' => 'Campaigns',
      'source' => 'non-db',
      'additionalFields' => 
      array (
        'id' => 'campaign_id',
      ),
    ),
    'campaigns' => 
    array (
      'name' => 'campaigns',
      'type' => 'link',
      'relationship' => 'prospect_campaign_log',
      'module' => 'CampaignLog',
      'bean_name' => 'CampaignLog',
      'source' => 'non-db',
      'vname' => 'LBL_CAMPAIGNLOG',
    ),
    'campaign_prospects' => 
    array (
      'name' => 'campaign_prospects',
      'type' => 'link',
      'relationship' => 'campaign_prospects',
      'module' => 'Campaigns',
      'bean_name' => 'Campaigns',
      'source' => 'non-db',
      'vname' => 'LBL_CAMPAIGN',
    ),
    'prospect_lists' => 
    array (
      'name' => 'prospect_lists',
      'type' => 'link',
      'relationship' => 'prospect_list_prospects',
      'module' => 'ProspectLists',
      'source' => 'non-db',
      'vname' => 'LBL_PROSPECT_LIST',
    ),
    'calls' => 
    array (
      'name' => 'calls',
      'type' => 'link',
      'relationship' => 'prospect_calls',
      'source' => 'non-db',
      'vname' => 'LBL_CALLS',
    ),
    'meetings' => 
    array (
      'name' => 'meetings',
      'type' => 'link',
      'relationship' => 'prospect_meetings',
      'source' => 'non-db',
      'vname' => 'LBL_MEETINGS',
    ),
    'notes' => 
    array (
      'name' => 'notes',
      'type' => 'link',
      'relationship' => 'prospect_notes',
      'source' => 'non-db',
      'vname' => 'LBL_NOTES',
    ),
    'tasks' => 
    array (
      'name' => 'tasks',
      'type' => 'link',
      'relationship' => 'prospect_tasks',
      'source' => 'non-db',
      'vname' => 'LBL_TASKS',
    ),
    'emails' => 
    array (
      'name' => 'emails',
      'type' => 'link',
      'relationship' => 'emails_prospects_rel',
      'source' => 'non-db',
      'vname' => 'LBL_EMAILS',
    ),
    'status' => 
    array (
      'name' => 'status',
      'vname' => 'LBL_STATUS',
      'type' => 'enum',
      'len' => '100',
      'options' => 'target_status_dom',
      'default' => 'New',
      'comment' => 'Status of the target',
      'massupdate' => false,
    ),
    'bc_survey_submission_prospects' => 
    array (
      'name' => 'bc_survey_submission_prospects',
      'type' => 'link',
      'relationship' => 'bc_survey_submission_prospects',
      'source' => 'non-db',
      'module' => 'bc_survey_submission',
      'bean_name' => false,
      'side' => 'right',
      'vname' => 'LBL_BC_SURVEY_SUBMISSION_PROSPECTS_FROM_BC_SURVEY_SUBMISSION_TITLE',
    ),
    'j_school_prospects_1' => 
    array (
      'name' => 'j_school_prospects_1',
      'type' => 'link',
      'relationship' => 'j_school_prospects_1',
      'source' => 'non-db',
      'module' => 'J_School',
      'bean_name' => 'J_School',
      'side' => 'right',
      'vname' => 'LBL_J_SCHOOL_PROSPECTS_1_FROM_PROSPECTS_TITLE',
      'id_name' => 'j_school_prospects_1j_school_ida',
      'link-type' => 'one',
    ),
    'j_school_prospects_1_name' => 
    array (
      'name' => 'j_school_prospects_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_J_SCHOOL_PROSPECTS_1_FROM_J_SCHOOL_TITLE',
      'save' => true,
      'id_name' => 'j_school_prospects_1j_school_ida',
      'link' => 'j_school_prospects_1',
      'table' => 'j_school',
      'module' => 'J_School',
      'rname' => 'name',
    ),
    'j_school_prospects_1j_school_ida' => 
    array (
      'name' => 'j_school_prospects_1j_school_ida',
      'type' => 'id',
      'source' => 'non-db',
      'vname' => 'LBL_J_SCHOOL_PROSPECTS_1_FROM_PROSPECTS_TITLE_ID',
      'id_name' => 'j_school_prospects_1j_school_ida',
      'link' => 'j_school_prospects_1',
      'table' => 'j_school',
      'module' => 'J_School',
      'rname' => 'id',
      'reportable' => false,
      'side' => 'right',
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'hideacl' => true,
    ),
    'bc_survey_prospects' => 
    array (
      'name' => 'bc_survey_prospects',
      'type' => 'link',
      'relationship' => 'bc_survey_prospects',
      'source' => 'non-db',
      'module' => 'bc_survey',
      'bean_name' => false,
      'vname' => 'LBL_BC_SURVEY_PROSPECTS_FROM_BC_SURVEY_TITLE',
    ),
    'potential' => 
    array (
      'name' => 'potential',
      'vname' => 'LBL_POTENTIAL',
      'type' => 'enum',
      'comments' => '',
      'help' => '',
      'default' => 'Low',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'unified_search' => false,
      'massupdate' => false,
      'merge_filter' => 'disabled',
      'len' => 20,
      'size' => '20',
      'options' => 'level_lead_list',
      'studio' => 'visible',
    ),
    'working_date' => 
    array (
      'name' => 'working_date',
      'vname' => 'LBL_WORKING_DATE',
      'type' => 'date',
      'required' => true,
      'massupdate' => false,
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'calculated' => false,
      'size' => '20',
      'display_default' => 'now',
      'source' => 'non-db',
    ),
    'lead_source' => 
    array (
      'name' => 'lead_source',
      'vname' => 'LBL_LEAD_SOURCE',
      'type' => 'enum',
      'options' => 'lead_source_list',
      'len' => '100',
      'massupdate' => true,
      'required' => true,
    ),
    'lead_source_description' => 
    array (
      'name' => 'lead_source_description',
      'type' => 'text',
      'rows' => '2',
      'cols' => '30',
      'studio' => 'visible',
      'vname' => 'LBL_SOURCE_DESCRIPTION',
    ),
    'age' => 
    array (
      'name' => 'age',
      'type' => 'varchar',
      'len' => '30',
      'studio' => 'visible',
      'vname' => 'LBL_CONTACT_AGE',
    ),
    'guardian_phone' => 
    array (
      'name' => 'guardian_phone',
      'vname' => 'LBL_GUARDIAN_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => '50',
    ),
    'guardian_name' => 
    array (
      'name' => 'guardian_name',
      'vname' => 'LBL_GUARDIAN_NAME',
      'type' => 'varchar',
      'len' => '100',
      'comment' => '',
      'merge_filter' => 'disabled',
    ),
    'team_type' => 
    array (
      'name' => 'team_type',
      'vname' => 'LBL_TEAM_TYPE',
      'type' => 'enum',
      'importable' => 'false',
      'reportable' => true,
      'len' => 30,
      'size' => '20',
      'options' => 'type_team_list',
      'studio' => 'visible',
      'massupdate' => 0,
    ),
    'gender' => 
    array (
      'name' => 'gender',
      'vname' => 'LBL_GENDER',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => ' ',
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
      'len' => 20,
      'size' => '20',
      'options' => 'gender_lead_list',
      'studio' => 'visible',
      'dbType' => 'enum',
      'required' => false,
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'prospectspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    'team_set_prospects' => 
    array (
      'name' => 'idx_prospects_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
    ),
    0 => 
    array (
      'name' => 'prospect_auto_tracker_key',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tracker_key',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_prospects_last_first',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'last_name',
        1 => 'first_name',
        2 => 'phone_mobile',
        3 => 'deleted',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_prospecs_del_last',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'last_name',
        1 => 'deleted',
      ),
    ),
    3 => 
    array (
      'name' => 'idx_prospects_id_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'id',
        1 => 'deleted',
      ),
    ),
    4 => 
    array (
      'name' => 'idx_prospects_assigned',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'assigned_user_id',
      ),
    ),
  ),
  'relationships' => 
  array (
    'prospects_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Prospects',
      'rhs_table' => 'prospects',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'prospects_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Prospects',
      'rhs_table' => 'prospects',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'prospects_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Prospects',
      'rhs_table' => 'prospects',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'prospects_team_count_relationship' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'team_sets',
      'lhs_key' => 'id',
      'rhs_module' => 'Prospects',
      'rhs_table' => 'prospects',
      'rhs_key' => 'team_set_id',
      'relationship_type' => 'one-to-many',
    ),
    'prospects_teams' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'team_set_id',
      'rhs_module' => 'Teams',
      'rhs_table' => 'teams',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_sets_teams',
      'join_key_lhs' => 'team_set_id',
      'join_key_rhs' => 'team_id',
    ),
    'prospects_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'Prospects',
      'rhs_table' => 'prospects',
      'rhs_key' => 'team_id',
      'relationship_type' => 'one-to-many',
    ),
    'prospects_email_addresses' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'id',
      'rhs_module' => 'EmailAddresses',
      'rhs_table' => 'email_addresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'email_addr_bean_rel',
      'join_key_lhs' => 'bean_id',
      'join_key_rhs' => 'email_address_id',
      'relationship_role_column' => 'bean_module',
      'relationship_role_column_value' => 'Prospects',
    ),
    'prospects_email_addresses_primary' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'id',
      'rhs_module' => 'EmailAddresses',
      'rhs_table' => 'email_addresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'email_addr_bean_rel',
      'join_key_lhs' => 'bean_id',
      'join_key_rhs' => 'email_address_id',
      'relationship_role_column' => 'primary_address',
      'relationship_role_column_value' => '1',
    ),
    'prospect_tasks' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Prospects',
    ),
    'prospect_notes' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Prospects',
    ),
    'prospect_meetings' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Prospects',
    ),
    'prospect_calls' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Prospects',
    ),
    'prospect_emails' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Prospects',
    ),
    'prospect_campaign_log' => 
    array (
      'lhs_module' => 'Prospects',
      'lhs_table' => 'prospects',
      'lhs_key' => 'id',
      'rhs_module' => 'CampaignLog',
      'rhs_table' => 'campaign_log',
      'rhs_key' => 'target_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'target_type',
      'relationship_role_column_value' => 'Prospects',
    ),
  ),
  'name_format_map' => 
  array (
    'f' => 'first_name',
    'l' => 'last_name',
    's' => 'salutation',
    't' => 'title',
  ),
  'visibility' => 
  array (
    'TeamSecurity' => true,
  ),
  'templates' => 
  array (
    'person' => 'person',
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