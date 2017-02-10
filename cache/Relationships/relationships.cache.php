<?php 
 $relationships = array (
  'accounts_bugs' => 
  array (
    'name' => 'accounts_bugs',
    'table' => 'accounts_bugs',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'account_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'bug_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'required' => false,
        'default' => '0',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'accounts_bugspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_acc_bug_acc',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'account_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_acc_bug_bug',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bug_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_account_bug',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'account_id',
          1 => 'bug_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'accounts_bugs' => 
      array (
        'lhs_module' => 'Accounts',
        'lhs_table' => 'accounts',
        'lhs_key' => 'id',
        'rhs_module' => 'Bugs',
        'rhs_table' => 'bugs',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'accounts_bugs',
        'join_key_lhs' => 'account_id',
        'join_key_rhs' => 'bug_id',
      ),
    ),
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Bugs',
    'rhs_table' => 'bugs',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'accounts_bugs',
    'join_key_lhs' => 'account_id',
    'join_key_rhs' => 'bug_id',
  ),
  'accounts_contacts' => 
  array (
    'name' => 'accounts_contacts',
    'table' => 'accounts_contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'account_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'required' => false,
        'default' => '0',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'accounts_contactspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_account_contact',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'account_id',
          1 => 'contact_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_contid_del_accid',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contact_id',
          1 => 'deleted',
          2 => 'account_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'accounts_contacts' => 
      array (
        'lhs_module' => 'Accounts',
        'lhs_table' => 'accounts',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'accounts_contacts',
        'join_key_lhs' => 'account_id',
        'join_key_rhs' => 'contact_id',
      ),
    ),
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'accounts_contacts',
    'join_key_lhs' => 'account_id',
    'join_key_rhs' => 'contact_id',
  ),
  'accounts_opportunities' => 
  array (
    'name' => 'accounts_opportunities',
    'table' => 'accounts_opportunities',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'opportunity_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'account_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'accounts_opportunitiespk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_account_opportunity',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'account_id',
          1 => 'opportunity_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_oppid_del_accid',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'opportunity_id',
          1 => 'deleted',
          2 => 'account_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'accounts_opportunities' => 
      array (
        'lhs_module' => 'Accounts',
        'lhs_table' => 'accounts',
        'lhs_key' => 'id',
        'rhs_module' => 'Opportunities',
        'rhs_table' => 'opportunities',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'accounts_opportunities',
        'join_key_lhs' => 'account_id',
        'join_key_rhs' => 'opportunity_id',
      ),
    ),
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'accounts_opportunities',
    'join_key_lhs' => 'account_id',
    'join_key_rhs' => 'opportunity_id',
  ),
  'calls_contacts' => 
  array (
    'name' => 'calls_contacts',
    'table' => 'calls_contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'call_id',
        'type' => 'id',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'contact_id',
        'type' => 'id',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'required',
        'type' => 'varchar',
        'len' => '1',
        'default' => '1',
      ),
      4 => 
      array (
        'name' => 'accept_status',
        'type' => 'varchar',
        'len' => '25',
        'default' => 'none',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'calls_contactspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_con_call_call',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'call_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_con_call_con',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contact_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_call_contact',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'call_id',
          1 => 'contact_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'calls_contacts' => 
      array (
        'lhs_module' => 'Calls',
        'lhs_table' => 'calls',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'calls_contacts',
        'join_key_lhs' => 'call_id',
        'join_key_rhs' => 'contact_id',
      ),
    ),
    'lhs_module' => 'Calls',
    'lhs_table' => 'calls',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'calls_contacts',
    'join_key_lhs' => 'call_id',
    'join_key_rhs' => 'contact_id',
  ),
  'calls_users' => 
  array (
    'name' => 'calls_users',
    'table' => 'calls_users',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'call_id',
        'type' => 'id',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'user_id',
        'type' => 'id',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'required',
        'type' => 'varchar',
        'len' => '1',
        'default' => '1',
      ),
      4 => 
      array (
        'name' => 'accept_status',
        'type' => 'varchar',
        'len' => '25',
        'default' => 'none',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'calls_userspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_usr_call_call',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'call_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_usr_call_usr',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'user_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_call_users',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'call_id',
          1 => 'user_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'calls_users' => 
      array (
        'lhs_module' => 'Calls',
        'lhs_table' => 'calls',
        'lhs_key' => 'id',
        'rhs_module' => 'Users',
        'rhs_table' => 'users',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'calls_users',
        'join_key_lhs' => 'call_id',
        'join_key_rhs' => 'user_id',
      ),
    ),
    'lhs_module' => 'Calls',
    'lhs_table' => 'calls',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'calls_users',
    'join_key_lhs' => 'call_id',
    'join_key_rhs' => 'user_id',
  ),
  'calls_leads' => 
  array (
    'name' => 'calls_leads',
    'table' => 'calls_leads',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'call_id',
        'type' => 'id',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'lead_id',
        'type' => 'id',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'required',
        'type' => 'varchar',
        'len' => '1',
        'default' => '1',
      ),
      4 => 
      array (
        'name' => 'accept_status',
        'type' => 'varchar',
        'len' => '25',
        'default' => 'none',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'calls_leadspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_lead_call_call',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'call_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_lead_call_lead',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'lead_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_call_lead',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'call_id',
          1 => 'lead_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'calls_leads' => 
      array (
        'lhs_module' => 'Calls',
        'lhs_table' => 'calls',
        'lhs_key' => 'id',
        'rhs_module' => 'Leads',
        'rhs_table' => 'leads',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'calls_leads',
        'join_key_lhs' => 'call_id',
        'join_key_rhs' => 'lead_id',
      ),
    ),
    'lhs_module' => 'Calls',
    'lhs_table' => 'calls',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'calls_leads',
    'join_key_lhs' => 'call_id',
    'join_key_rhs' => 'lead_id',
  ),
  'cases_bugs' => 
  array (
    'name' => 'cases_bugs',
    'table' => 'cases_bugs',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'case_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'bug_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'cases_bugspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_cas_bug_cas',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'case_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_cas_bug_bug',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bug_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_case_bug',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'case_id',
          1 => 'bug_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'cases_bugs' => 
      array (
        'lhs_module' => 'Cases',
        'lhs_table' => 'cases',
        'lhs_key' => 'id',
        'rhs_module' => 'Bugs',
        'rhs_table' => 'bugs',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'cases_bugs',
        'join_key_lhs' => 'case_id',
        'join_key_rhs' => 'bug_id',
      ),
    ),
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'id',
    'rhs_module' => 'Bugs',
    'rhs_table' => 'bugs',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'cases_bugs',
    'join_key_lhs' => 'case_id',
    'join_key_rhs' => 'bug_id',
  ),
  'contacts_bugs' => 
  array (
    'name' => 'contacts_bugs',
    'table' => 'contacts_bugs',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'bug_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'contact_role',
        'type' => 'varchar',
        'len' => '50',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_bugspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_con_bug_con',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contact_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_con_bug_bug',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bug_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_contact_bug',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contact_id',
          1 => 'bug_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'contacts_bugs' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'Bugs',
        'rhs_table' => 'bugs',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_bugs',
        'join_key_lhs' => 'contact_id',
        'join_key_rhs' => 'bug_id',
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Bugs',
    'rhs_table' => 'bugs',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_bugs',
    'join_key_lhs' => 'contact_id',
    'join_key_rhs' => 'bug_id',
  ),
  'contacts_cases' => 
  array (
    'name' => 'contacts_cases',
    'table' => 'contacts_cases',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'case_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'contact_role',
        'type' => 'varchar',
        'len' => '50',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_casespk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_con_case_con',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contact_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_con_case_case',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'case_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_contacts_cases',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contact_id',
          1 => 'case_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'contacts_cases' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'Cases',
        'rhs_table' => 'cases',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_cases',
        'join_key_lhs' => 'contact_id',
        'join_key_rhs' => 'case_id',
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_cases',
    'join_key_lhs' => 'contact_id',
    'join_key_rhs' => 'case_id',
  ),
  'contacts_users' => 
  array (
    'name' => 'contacts_users',
    'table' => 'contacts_users',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'user_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_userspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_con_users_con',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contact_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_con_users_user',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'user_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_contacts_users',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contact_id',
          1 => 'user_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'contacts_users' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'Users',
        'rhs_table' => 'users',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_users',
        'join_key_lhs' => 'contact_id',
        'join_key_rhs' => 'user_id',
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_users',
    'join_key_lhs' => 'contact_id',
    'join_key_rhs' => 'user_id',
  ),
  'emails_accounts_rel' => 
  array (
    'name' => 'emails_accounts_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Accounts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_bugs_rel' => 
  array (
    'name' => 'emails_bugs_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Bugs',
    'rhs_table' => 'bugs',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Bugs',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_cases_rel' => 
  array (
    'name' => 'emails_cases_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Cases',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_contacts_rel' => 
  array (
    'name' => 'emails_contacts_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_leads_rel' => 
  array (
    'name' => 'emails_leads_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Leads',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_opportunities_rel' => 
  array (
    'name' => 'emails_opportunities_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Opportunities',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_tasks_rel' => 
  array (
    'name' => 'emails_tasks_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Tasks',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_users_rel' => 
  array (
    'name' => 'emails_users_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Users',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_project_task_rel' => 
  array (
    'name' => 'emails_project_task_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'ProjectTask',
    'rhs_table' => 'project_task',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'ProjectTask',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_projects_rel' => 
  array (
    'name' => 'emails_projects_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Project',
    'rhs_table' => 'project',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Project',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_prospects_rel' => 
  array (
    'name' => 'emails_prospects_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Prospects',
    'rhs_table' => 'prospects',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Prospects',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'emails_quotes' => 
  array (
    'name' => 'emails_quotes',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Quotes',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'email_id',
        'type' => 'varchar',
        'dbType' => 'id',
        'len' => '36',
        'comment' => 'FK to emails table',
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'dbType' => 'id',
        'type' => 'varchar',
        'len' => '36',
        'comment' => 'FK to various beans\'s tables',
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => '100',
        'comment' => 'bean\'s Module',
      ),
      4 => 
      array (
        'name' => 'campaign_data',
        'type' => 'text',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'meetings_contacts' => 
  array (
    'name' => 'meetings_contacts',
    'table' => 'meetings_contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'meeting_id',
        'type' => 'id',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'contact_id',
        'type' => 'id',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'required',
        'type' => 'varchar',
        'len' => '1',
        'default' => '1',
      ),
      4 => 
      array (
        'name' => 'accept_status',
        'type' => 'varchar',
        'len' => '25',
        'default' => 'none',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
      7 => 
      array (
        'name' => 'attendance',
        'type' => 'varchar',
        'len' => '1',
        'default' => '0',
      ),
      8 => 
      array (
        'name' => 'enrollment_id',
        'type' => 'id',
        'len' => '36',
      ),
      9 => 
      array (
        'name' => 'contract_id',
        'type' => 'id',
        'len' => '36',
      ),
      10 => 
      array (
        'name' => 'situation_id',
        'type' => 'id',
        'len' => '36',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'meetings_contactspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_con_mtg_mtg',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'meeting_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_con_mtg_con',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contact_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_meeting_contact',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'meeting_id',
          1 => 'contact_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'meetings_contacts' => 
      array (
        'lhs_module' => 'Meetings',
        'lhs_table' => 'meetings',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'meetings_contacts',
        'join_key_lhs' => 'meeting_id',
        'join_key_rhs' => 'contact_id',
      ),
    ),
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'meetings_contacts',
    'join_key_lhs' => 'meeting_id',
    'join_key_rhs' => 'contact_id',
  ),
  'meetings_users' => 
  array (
    'name' => 'meetings_users',
    'table' => 'meetings_users',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'meeting_id',
        'type' => 'id',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'user_id',
        'type' => 'id',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'required',
        'type' => 'varchar',
        'len' => '1',
        'default' => '1',
      ),
      4 => 
      array (
        'name' => 'accept_status',
        'type' => 'varchar',
        'len' => '25',
        'default' => 'none',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'meetings_userspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_usr_mtg_mtg',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'meeting_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_usr_mtg_usr',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'user_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_meeting_users',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'meeting_id',
          1 => 'user_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'meetings_users' => 
      array (
        'lhs_module' => 'Meetings',
        'lhs_table' => 'meetings',
        'lhs_key' => 'id',
        'rhs_module' => 'Users',
        'rhs_table' => 'users',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'meetings_users',
        'join_key_lhs' => 'meeting_id',
        'join_key_rhs' => 'user_id',
      ),
    ),
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'meetings_users',
    'join_key_lhs' => 'meeting_id',
    'join_key_rhs' => 'user_id',
  ),
  'meetings_leads' => 
  array (
    'name' => 'meetings_leads',
    'table' => 'meetings_leads',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'meeting_id',
        'type' => 'id',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'lead_id',
        'type' => 'id',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'required',
        'type' => 'varchar',
        'len' => '1',
        'default' => '1',
      ),
      4 => 
      array (
        'name' => 'accept_status',
        'type' => 'varchar',
        'len' => '25',
        'default' => 'none',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'meetings_leadspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_lead_meeting_meeting',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'meeting_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_lead_meeting_lead',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'lead_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_meeting_lead',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'meeting_id',
          1 => 'lead_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'meetings_leads' => 
      array (
        'lhs_module' => 'Meetings',
        'lhs_table' => 'meetings',
        'lhs_key' => 'id',
        'rhs_module' => 'Leads',
        'rhs_table' => 'leads',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'meetings_leads',
        'join_key_lhs' => 'meeting_id',
        'join_key_rhs' => 'lead_id',
      ),
    ),
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'meetings_leads',
    'join_key_lhs' => 'meeting_id',
    'join_key_rhs' => 'lead_id',
  ),
  'opportunities_contacts' => 
  array (
    'name' => 'opportunities_contacts',
    'table' => 'opportunities_contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'opportunity_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'contact_role',
        'type' => 'varchar',
        'len' => '50',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'opportunities_contactspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_con_opp_con',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contact_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_con_opp_opp',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'opportunity_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_opportunities_contacts',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'opportunity_id',
          1 => 'contact_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'opportunities_contacts' => 
      array (
        'lhs_module' => 'Opportunities',
        'lhs_table' => 'opportunities',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'opportunities_contacts',
        'join_key_lhs' => 'opportunity_id',
        'join_key_rhs' => 'contact_id',
      ),
    ),
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'opportunities_contacts',
    'join_key_lhs' => 'opportunity_id',
    'join_key_rhs' => 'contact_id',
  ),
  'team_sets_teams' => 
  array (
    'name' => 'team_sets_teams',
    'table' => 'team_sets_teams',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'idx_ud_id',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_ud_set_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'team_set_id',
          1 => 'team_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_ud_team_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'team_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_ud_team_set_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'team_set_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'team_sets_teams' => 
      array (
        'lhs_module' => 'TeamSets',
        'lhs_table' => 'team_sets',
        'lhs_key' => 'id',
        'rhs_module' => 'Teams',
        'rhs_table' => 'teams',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'team_sets_teams',
        'join_key_lhs' => 'team_set_id',
        'join_key_rhs' => 'team_id',
      ),
    ),
    'lhs_module' => 'TeamSets',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
  ),
  'tracker_user_id' => 
  array (
    'name' => 'tracker_user_id',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'TrackerSessions',
    'rhs_table' => 'tracker',
    'rhs_key' => 'user_id',
    'relationship_type' => 'one-to-many',
  ),
  'tracker_tracker_queries' => 
  array (
    'name' => 'tracker_tracker_queries',
    'table' => 'tracker_tracker_queries',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'int',
        'len' => '11',
        'isnull' => 'false',
        'auto_increment' => true,
        'reportable' => false,
      ),
      'monitor_id' => 
      array (
        'name' => 'monitor_id',
        'type' => 'id',
        'len' => '36',
      ),
      'query_id' => 
      array (
        'name' => 'query_id',
        'type' => 'id',
        'len' => '36',
      ),
      'date_modified' => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'tracker_tracker_queriespk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_tracker_tq_monitor',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'monitor_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_tracker_tq_query',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'query_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'tracker_tracker_queries' => 
      array (
        'lhs_module' => 'Trackers',
        'lhs_table' => 'tracker',
        'lhs_key' => 'monitor_id',
        'rhs_module' => 'TrackerQueries',
        'rhs_table' => 'tracker_queries',
        'rhs_key' => 'query_id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'tracker_tracker_queries',
        'join_key_lhs' => 'monitor_id',
        'join_key_rhs' => 'query_id',
      ),
    ),
    'lhs_module' => 'Trackers',
    'lhs_table' => 'tracker',
    'lhs_key' => 'monitor_id',
    'rhs_module' => 'TrackerQueries',
    'rhs_table' => 'tracker_queries',
    'rhs_key' => 'query_id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'tracker_tracker_queries',
    'join_key_lhs' => 'monitor_id',
    'join_key_rhs' => 'query_id',
  ),
  'prospect_list_campaigns' => 
  array (
    'name' => 'prospect_list_campaigns',
    'table' => 'prospect_list_campaigns',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'prospect_list_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'campaign_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'prospect_list_campaignspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_pro_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'prospect_list_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_cam_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'campaign_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_prospect_list_campaigns',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'prospect_list_id',
          1 => 'campaign_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'prospect_list_campaigns' => 
      array (
        'lhs_module' => 'ProspectLists',
        'lhs_table' => 'prospect_lists',
        'lhs_key' => 'id',
        'rhs_module' => 'Campaigns',
        'rhs_table' => 'campaigns',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'prospect_list_campaigns',
        'join_key_lhs' => 'prospect_list_id',
        'join_key_rhs' => 'campaign_id',
      ),
    ),
    'lhs_module' => 'ProspectLists',
    'lhs_table' => 'prospect_lists',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'prospect_list_campaigns',
    'join_key_lhs' => 'prospect_list_id',
    'join_key_rhs' => 'campaign_id',
  ),
  'prospect_list_contacts' => 
  array (
    'name' => 'prospect_list_contacts',
    'lhs_module' => 'ProspectLists',
    'lhs_table' => 'prospect_lists',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'prospect_lists_prospects',
    'join_key_lhs' => 'prospect_list_id',
    'join_key_rhs' => 'related_id',
    'relationship_role_column' => 'related_type',
    'relationship_role_column_value' => 'Contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'prospect_list_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'related_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'related_type',
        'type' => 'varchar',
        'len' => '25',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
  ),
  'prospect_list_prospects' => 
  array (
    'name' => 'prospect_list_prospects',
    'lhs_module' => 'ProspectLists',
    'lhs_table' => 'prospect_lists',
    'lhs_key' => 'id',
    'rhs_module' => 'Prospects',
    'rhs_table' => 'prospects',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'prospect_lists_prospects',
    'join_key_lhs' => 'prospect_list_id',
    'join_key_rhs' => 'related_id',
    'relationship_role_column' => 'related_type',
    'relationship_role_column_value' => 'Prospects',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'prospect_list_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'related_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'related_type',
        'type' => 'varchar',
        'len' => '25',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
  ),
  'prospect_list_leads' => 
  array (
    'name' => 'prospect_list_leads',
    'lhs_module' => 'ProspectLists',
    'lhs_table' => 'prospect_lists',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'prospect_lists_prospects',
    'join_key_lhs' => 'prospect_list_id',
    'join_key_rhs' => 'related_id',
    'relationship_role_column' => 'related_type',
    'relationship_role_column_value' => 'Leads',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'prospect_list_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'related_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'related_type',
        'type' => 'varchar',
        'len' => '25',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
  ),
  'prospect_list_users' => 
  array (
    'name' => 'prospect_list_users',
    'lhs_module' => 'ProspectLists',
    'lhs_table' => 'prospect_lists',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'prospect_lists_prospects',
    'join_key_lhs' => 'prospect_list_id',
    'join_key_rhs' => 'related_id',
    'relationship_role_column' => 'related_type',
    'relationship_role_column_value' => 'Users',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'prospect_list_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'related_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'related_type',
        'type' => 'varchar',
        'len' => '25',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
  ),
  'prospect_list_accounts' => 
  array (
    'name' => 'prospect_list_accounts',
    'lhs_module' => 'ProspectLists',
    'lhs_table' => 'prospect_lists',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'prospect_lists_prospects',
    'join_key_lhs' => 'prospect_list_id',
    'join_key_rhs' => 'related_id',
    'relationship_role_column' => 'related_type',
    'relationship_role_column_value' => 'Accounts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'prospect_list_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'related_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'related_type',
        'type' => 'varchar',
        'len' => '25',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
  ),
  'roles_users' => 
  array (
    'name' => 'roles_users',
    'table' => 'roles_users',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'role_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'user_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'roles_userspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_ru_role_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'role_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_ru_user_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'user_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'roles_users' => 
      array (
        'lhs_module' => 'Roles',
        'lhs_table' => 'roles',
        'lhs_key' => 'id',
        'rhs_module' => 'Users',
        'rhs_table' => 'users',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'roles_users',
        'join_key_lhs' => 'role_id',
        'join_key_rhs' => 'user_id',
      ),
    ),
    'lhs_module' => 'Roles',
    'lhs_table' => 'roles',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'roles_users',
    'join_key_lhs' => 'role_id',
    'join_key_rhs' => 'user_id',
  ),
  'projects_bugs' => 
  array (
    'name' => 'projects_bugs',
    'table' => 'projects_bugs',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'bug_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'project_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'projects_bugs_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_proj_bug_proj',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'project_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_proj_bug_bug',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bug_id',
        ),
      ),
      3 => 
      array (
        'name' => 'projects_bugs_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'project_id',
          1 => 'bug_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'projects_bugs' => 
      array (
        'lhs_module' => 'Project',
        'lhs_table' => 'project',
        'lhs_key' => 'id',
        'rhs_module' => 'Bugs',
        'rhs_table' => 'bugs',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'projects_bugs',
        'join_key_lhs' => 'project_id',
        'join_key_rhs' => 'bug_id',
      ),
    ),
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Bugs',
    'rhs_table' => 'bugs',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'projects_bugs',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'bug_id',
  ),
  'projects_cases' => 
  array (
    'name' => 'projects_cases',
    'table' => 'projects_cases',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'case_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'project_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'projects_cases_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_proj_case_proj',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'project_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_proj_case_case',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'case_id',
        ),
      ),
      3 => 
      array (
        'name' => 'projects_cases_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'project_id',
          1 => 'case_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'projects_cases' => 
      array (
        'lhs_module' => 'Project',
        'lhs_table' => 'project',
        'lhs_key' => 'id',
        'rhs_module' => 'Cases',
        'rhs_table' => 'cases',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'projects_cases',
        'join_key_lhs' => 'project_id',
        'join_key_rhs' => 'case_id',
      ),
    ),
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'projects_cases',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'case_id',
  ),
  'projects_products' => 
  array (
    'name' => 'projects_products',
    'table' => 'projects_products',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'product_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'project_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'projects_products_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_proj_prod_project',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'project_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_proj_prod_product',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'product_id',
        ),
      ),
      3 => 
      array (
        'name' => 'projects_products_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'project_id',
          1 => 'product_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'projects_products' => 
      array (
        'lhs_module' => 'Project',
        'lhs_table' => 'project',
        'lhs_key' => 'id',
        'rhs_module' => 'Products',
        'rhs_table' => 'products',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'projects_products',
        'join_key_lhs' => 'project_id',
        'join_key_rhs' => 'product_id',
      ),
    ),
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'projects_products',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'product_id',
  ),
  'projects_accounts' => 
  array (
    'name' => 'projects_accounts',
    'table' => 'projects_accounts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'account_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'project_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'projects_accounts_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_proj_acct_proj',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'project_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_proj_acct_acct',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'account_id',
        ),
      ),
      3 => 
      array (
        'name' => 'projects_accounts_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'project_id',
          1 => 'account_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'projects_accounts' => 
      array (
        'lhs_module' => 'Project',
        'lhs_table' => 'project',
        'lhs_key' => 'id',
        'rhs_module' => 'Accounts',
        'rhs_table' => 'accounts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'projects_accounts',
        'join_key_lhs' => 'project_id',
        'join_key_rhs' => 'account_id',
      ),
    ),
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'projects_accounts',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'account_id',
  ),
  'projects_contacts' => 
  array (
    'name' => 'projects_contacts',
    'table' => 'projects_contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'project_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'projects_contacts_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_proj_con_proj',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'project_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_proj_con_con',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contact_id',
        ),
      ),
      3 => 
      array (
        'name' => 'projects_contacts_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'project_id',
          1 => 'contact_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'projects_contacts' => 
      array (
        'lhs_module' => 'Project',
        'lhs_table' => 'project',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'projects_contacts',
        'join_key_lhs' => 'project_id',
        'join_key_rhs' => 'contact_id',
      ),
    ),
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'projects_contacts',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'contact_id',
  ),
  'projects_opportunities' => 
  array (
    'name' => 'projects_opportunities',
    'table' => 'projects_opportunities',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'opportunity_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'project_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'projects_opportunities_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_proj_opp_proj',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'project_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_proj_opp_opp',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'opportunity_id',
        ),
      ),
      3 => 
      array (
        'name' => 'projects_opportunities_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'project_id',
          1 => 'opportunity_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'projects_opportunities' => 
      array (
        'lhs_module' => 'Project',
        'lhs_table' => 'project',
        'lhs_key' => 'id',
        'rhs_module' => 'Opportunities',
        'rhs_table' => 'opportunities',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'projects_opportunities',
        'join_key_lhs' => 'project_id',
        'join_key_rhs' => 'opportunity_id',
      ),
    ),
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'projects_opportunities',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'opportunity_id',
  ),
  'product_bundle_note' => 
  array (
    'name' => 'product_bundle_note',
    'table' => 'product_bundle_note',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
      3 => 
      array (
        'name' => 'bundle_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      4 => 
      array (
        'name' => 'note_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      5 => 
      array (
        'name' => 'note_index',
        'type' => 'int',
        'len' => '11',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'prod_bundl_notepk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_pbn_bundle',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bundle_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_pbn_note',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'note_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_pbn_pb_nb',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'note_id',
          1 => 'bundle_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'product_bundle_note' => 
      array (
        'lhs_module' => 'ProductBundles',
        'lhs_table' => 'product_bundles',
        'lhs_key' => 'id',
        'rhs_module' => 'ProductBundleNotes',
        'rhs_table' => 'product_bundle_note',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'product_bundle_note',
        'join_key_lhs' => 'bundle_id',
        'join_key_rhs' => 'note_id',
      ),
    ),
    'lhs_module' => 'ProductBundles',
    'lhs_table' => 'product_bundles',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductBundleNotes',
    'rhs_table' => 'product_bundle_note',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'product_bundle_note',
    'join_key_lhs' => 'bundle_id',
    'join_key_rhs' => 'note_id',
  ),
  'product_bundle_product' => 
  array (
    'name' => 'product_bundle_product',
    'table' => 'product_bundle_product',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
      3 => 
      array (
        'name' => 'bundle_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      4 => 
      array (
        'name' => 'product_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      5 => 
      array (
        'name' => 'product_index',
        'type' => 'int',
        'len' => '11',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'prod_bundl_prodpk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_pbp_bundle',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bundle_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_pbp_quote',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'product_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_pbp_bq',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'product_id',
          1 => 'bundle_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'product_bundle_product' => 
      array (
        'lhs_module' => 'ProductBundles',
        'lhs_table' => 'product_bundles',
        'lhs_key' => 'id',
        'rhs_module' => 'Products',
        'rhs_table' => 'products',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'product_bundle_product',
        'join_key_lhs' => 'bundle_id',
        'join_key_rhs' => 'product_id',
      ),
    ),
    'lhs_module' => 'ProductBundles',
    'lhs_table' => 'product_bundles',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'product_bundle_product',
    'join_key_lhs' => 'bundle_id',
    'join_key_rhs' => 'product_id',
  ),
  'product_bundle_quote' => 
  array (
    'name' => 'product_bundle_quote',
    'table' => 'product_bundle_quote',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
      3 => 
      array (
        'name' => 'bundle_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      4 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      5 => 
      array (
        'name' => 'bundle_index',
        'type' => 'int',
        'len' => '11',
        'default' => 0,
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'prod_bundl_quotepk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_pbq_bundle',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bundle_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_pbq_quote',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'quote_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_pbq_bq',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'quote_id',
          1 => 'bundle_id',
        ),
      ),
      4 => 
      array (
        'name' => 'bundle_index_idx',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bundle_index',
        ),
      ),
    ),
    'relationships' => 
    array (
      'product_bundle_quote' => 
      array (
        'lhs_module' => 'ProductBundles',
        'lhs_table' => 'product_bundles',
        'lhs_key' => 'id',
        'rhs_module' => 'Quotes',
        'rhs_table' => 'quotes',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'product_bundle_quote',
        'join_key_lhs' => 'bundle_id',
        'join_key_rhs' => 'quote_id',
      ),
    ),
    'lhs_module' => 'ProductBundles',
    'lhs_table' => 'product_bundles',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'product_bundle_quote',
    'join_key_lhs' => 'bundle_id',
    'join_key_rhs' => 'quote_id',
  ),
  'product_product' => 
  array (
    'name' => 'product_product',
    'table' => 'product_product',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
      3 => 
      array (
        'name' => 'parent_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      4 => 
      array (
        'name' => 'child_id',
        'type' => 'varchar',
        'len' => '36',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'prod_prodpk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_pp_parent',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'parent_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_pp_child',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'child_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'product_product' => 
      array (
        'lhs_module' => 'Products',
        'lhs_table' => 'products',
        'lhs_key' => 'id',
        'rhs_module' => 'Products',
        'rhs_table' => 'products',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'product_product',
        'join_key_lhs' => 'parent_id',
        'join_key_rhs' => 'child_id',
        'reverse' => '1',
      ),
    ),
    'lhs_module' => 'Products',
    'lhs_table' => 'products',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'product_product',
    'join_key_lhs' => 'parent_id',
    'join_key_rhs' => 'child_id',
    'reverse' => '1',
  ),
  'quotes_billto_accounts' => 
  array (
    'name' => 'quotes_billto_accounts',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'true_relationship_type' => 'one-to-many',
    'join_table' => 'quotes_accounts',
    'join_key_rhs' => 'quote_id',
    'join_key_lhs' => 'account_id',
    'relationship_role_column' => 'account_role',
    'relationship_role_column_value' => 'Bill To',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'account_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'account_role',
        'type' => 'varchar',
        'len' => '20',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'quotes_shipto_accounts' => 
  array (
    'name' => 'quotes_shipto_accounts',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'true_relationship_type' => 'one-to-many',
    'join_table' => 'quotes_accounts',
    'join_key_rhs' => 'quote_id',
    'join_key_lhs' => 'account_id',
    'relationship_role_column' => 'account_role',
    'relationship_role_column_value' => 'Ship To',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'account_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'account_role',
        'type' => 'varchar',
        'len' => '20',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'quotes_contacts_shipto' => 
  array (
    'name' => 'quotes_contacts_shipto',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'true_relationship_type' => 'one-to-many',
    'join_table' => 'quotes_contacts',
    'join_key_rhs' => 'quote_id',
    'join_key_lhs' => 'contact_id',
    'relationship_role_column' => 'contact_role',
    'relationship_role_column_value' => 'Ship To',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'contact_role',
        'type' => 'varchar',
        'len' => '20',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'quotes_contacts_billto' => 
  array (
    'name' => 'quotes_contacts_billto',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'true_relationship_type' => 'one-to-many',
    'join_table' => 'quotes_contacts',
    'join_key_rhs' => 'quote_id',
    'join_key_lhs' => 'contact_id',
    'relationship_role_column' => 'contact_role',
    'relationship_role_column_value' => 'Bill To',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'contact_role',
        'type' => 'varchar',
        'len' => '20',
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'quotes_opportunities' => 
  array (
    'name' => 'quotes_opportunities',
    'table' => 'quotes_opportunities',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'opportunity_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'quotes_opportunitiespk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_opp_qte_opp',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'opportunity_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_quote_oportunities',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'quote_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'quotes_opportunities' => 
      array (
        'lhs_module' => 'Quotes',
        'lhs_table' => 'quotes',
        'lhs_key' => 'id',
        'rhs_module' => 'Opportunities',
        'rhs_table' => 'opportunities',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'quotes_opportunities',
        'join_key_lhs' => 'quote_id',
        'join_key_rhs' => 'opportunity_id',
      ),
    ),
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'quotes_opportunities',
    'join_key_lhs' => 'quote_id',
    'join_key_rhs' => 'opportunity_id',
  ),
  'contracts_opportunities' => 
  array (
    'name' => 'contracts_opportunities',
    'table' => 'contracts_opportunities',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'opportunity_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'contract_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contracts_opp_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contracts_opp_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contract_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'contracts_opportunities' => 
      array (
        'lhs_module' => 'Contracts',
        'lhs_table' => 'contracts',
        'lhs_key' => 'id',
        'rhs_module' => 'Opportunities',
        'rhs_table' => 'opportunities',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contracts_opportunities',
        'join_key_lhs' => 'contract_id',
        'join_key_rhs' => 'opportunity_id',
      ),
    ),
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contracts_opportunities',
    'join_key_lhs' => 'contract_id',
    'join_key_rhs' => 'opportunity_id',
  ),
  'contracts_contacts' => 
  array (
    'name' => 'contracts_contacts',
    'table' => 'contracts_contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'contact_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'contract_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contracts_contacts_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contracts_contacts_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contact_id',
          1 => 'contract_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'contracts_contacts' => 
      array (
        'lhs_module' => 'Contracts',
        'lhs_table' => 'contracts',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contracts_contacts',
        'join_key_lhs' => 'contract_id',
        'join_key_rhs' => 'contact_id',
      ),
    ),
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contracts_contacts',
    'join_key_lhs' => 'contract_id',
    'join_key_rhs' => 'contact_id',
  ),
  'contracts_quotes' => 
  array (
    'name' => 'contracts_quotes',
    'table' => 'contracts_quotes',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'contract_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contracts_quot_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contracts_quot_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contract_id',
          1 => 'quote_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'contracts_quotes' => 
      array (
        'lhs_module' => 'Contracts',
        'lhs_table' => 'contracts',
        'lhs_key' => 'id',
        'rhs_module' => 'Quotes',
        'rhs_table' => 'quotes',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contracts_quotes',
        'join_key_lhs' => 'contract_id',
        'join_key_rhs' => 'quote_id',
      ),
    ),
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contracts_quotes',
    'join_key_lhs' => 'contract_id',
    'join_key_rhs' => 'quote_id',
  ),
  'contracts_products' => 
  array (
    'name' => 'contracts_products',
    'table' => 'contracts_products',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'product_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'contract_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contracts_prod_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contracts_prod_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contract_id',
          1 => 'product_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'contracts_products' => 
      array (
        'lhs_module' => 'Contracts',
        'lhs_table' => 'contracts',
        'lhs_key' => 'id',
        'rhs_module' => 'Products',
        'rhs_table' => 'products',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contracts_products',
        'join_key_lhs' => 'contract_id',
        'join_key_rhs' => 'product_id',
      ),
    ),
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contracts_products',
    'join_key_lhs' => 'contract_id',
    'join_key_rhs' => 'product_id',
  ),
  'projects_quotes' => 
  array (
    'name' => 'projects_quotes',
    'table' => 'projects_quotes',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'project_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'projects_quotes_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_proj_quote_proj',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'project_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_proj_quote_quote',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'quote_id',
        ),
      ),
      3 => 
      array (
        'name' => 'projects_quotes_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'project_id',
          1 => 'quote_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'projects_quotes' => 
      array (
        'lhs_module' => 'Project',
        'lhs_table' => 'project',
        'lhs_key' => 'id',
        'rhs_module' => 'Quotes',
        'rhs_table' => 'quotes',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'projects_quotes',
        'join_key_lhs' => 'project_id',
        'join_key_rhs' => 'quote_id',
      ),
    ),
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'projects_quotes',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'quote_id',
  ),
  'users_holidays' => 
  array (
    'name' => 'users_holidays',
    'table' => 'users_holidays',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'user_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'holiday_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'users_holidays_pk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_user_holi_user',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'user_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_user_holi_holi',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'holiday_id',
        ),
      ),
      3 => 
      array (
        'name' => 'users_quotes_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'user_id',
          1 => 'holiday_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'users_holidays' => 
      array (
        'lhs_module' => 'Users',
        'lhs_table' => 'users',
        'lhs_key' => 'id',
        'rhs_module' => 'Holidays',
        'rhs_table' => 'holidays',
        'rhs_key' => 'person_id',
        'relationship_type' => 'one-to-many',
        'relationship_role_column' => 'related_module',
        'relationship_role_column_value' => NULL,
      ),
    ),
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Holidays',
    'rhs_table' => 'holidays',
    'rhs_key' => 'person_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'related_module',
    'relationship_role_column_value' => NULL,
  ),
  'acl_roles_actions' => 
  array (
    'name' => 'acl_roles_actions',
    'table' => 'acl_roles_actions',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'role_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'action_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'access_override',
        'type' => 'int',
        'len' => '3',
        'required' => false,
      ),
      4 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      5 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'acl_roles_actionspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_acl_role_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'role_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_acl_action_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'action_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_aclrole_action',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'role_id',
          1 => 'action_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'acl_roles_actions' => 
      array (
        'lhs_module' => 'ACLRoles',
        'lhs_table' => 'acl_roles',
        'lhs_key' => 'id',
        'rhs_module' => 'ACLActions',
        'rhs_table' => 'acl_actions',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'acl_roles_actions',
        'join_key_lhs' => 'role_id',
        'join_key_rhs' => 'action_id',
      ),
    ),
    'lhs_module' => 'ACLRoles',
    'lhs_table' => 'acl_roles',
    'lhs_key' => 'id',
    'rhs_module' => 'ACLActions',
    'rhs_table' => 'acl_actions',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'acl_roles_actions',
    'join_key_lhs' => 'role_id',
    'join_key_rhs' => 'action_id',
  ),
  'acl_roles_users' => 
  array (
    'name' => 'acl_roles_users',
    'table' => 'acl_roles_users',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'role_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'user_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'acl_roles_userspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_aclrole_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'role_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_acluser_id',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'user_id',
        ),
      ),
      3 => 
      array (
        'name' => 'idx_aclrole_user',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'role_id',
          1 => 'user_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'acl_roles_users' => 
      array (
        'lhs_module' => 'ACLRoles',
        'lhs_table' => 'acl_roles',
        'lhs_key' => 'id',
        'rhs_module' => 'Users',
        'rhs_table' => 'users',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'acl_roles_users',
        'join_key_lhs' => 'role_id',
        'join_key_rhs' => 'user_id',
      ),
    ),
    'lhs_module' => 'ACLRoles',
    'lhs_table' => 'acl_roles',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'acl_roles_users',
    'join_key_lhs' => 'role_id',
    'join_key_rhs' => 'user_id',
  ),
  'email_marketing_prospect_lists' => 
  array (
    'name' => 'email_marketing_prospect_lists',
    'table' => 'email_marketing_prospect_lists',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'prospect_list_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'email_marketing_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      3 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      4 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'email_mp_listspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'email_mp_prospects',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'email_marketing_id',
          1 => 'prospect_list_id',
        ),
      ),
    ),
    'relationships' => 
    array (
      'email_marketing_prospect_lists' => 
      array (
        'lhs_module' => 'EmailMarketing',
        'lhs_table' => 'email_marketing',
        'lhs_key' => 'id',
        'rhs_module' => 'ProspectLists',
        'rhs_table' => 'prospect_lists',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'email_marketing_prospect_lists',
        'join_key_lhs' => 'email_marketing_id',
        'join_key_rhs' => 'prospect_list_id',
      ),
    ),
    'lhs_module' => 'EmailMarketing',
    'lhs_table' => 'email_marketing',
    'lhs_key' => 'id',
    'rhs_module' => 'ProspectLists',
    'rhs_table' => 'prospect_lists',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'email_marketing_prospect_lists',
    'join_key_lhs' => 'email_marketing_id',
    'join_key_rhs' => 'prospect_list_id',
  ),
  'contracts_documents' => 
  array (
    'name' => 'contracts_documents',
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'Documents',
    'rhs_table' => 'documents',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'linked_documents',
    'join_key_lhs' => 'parent_id',
    'join_key_rhs' => 'document_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Contracts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'parent_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'parent_type',
        'type' => 'varchar',
        'len' => '25',
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      4 => 
      array (
        'name' => 'document_revision_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'leads_documents' => 
  array (
    'name' => 'leads_documents',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Documents',
    'rhs_table' => 'documents',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'linked_documents',
    'join_key_lhs' => 'parent_id',
    'join_key_rhs' => 'document_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Leads',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'parent_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'parent_type',
        'type' => 'varchar',
        'len' => '25',
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      4 => 
      array (
        'name' => 'document_revision_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'contracttype_documents' => 
  array (
    'name' => 'contracttype_documents',
    'lhs_module' => 'ContractTypes',
    'lhs_table' => 'contract_types',
    'lhs_key' => 'id',
    'rhs_module' => 'Documents',
    'rhs_table' => 'documents',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'linked_documents',
    'join_key_lhs' => 'parent_id',
    'join_key_rhs' => 'document_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'ContracTemplates',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => '36',
      ),
      1 => 
      array (
        'name' => 'parent_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      2 => 
      array (
        'name' => 'parent_type',
        'type' => 'varchar',
        'len' => '25',
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      4 => 
      array (
        'name' => 'document_revision_id',
        'type' => 'varchar',
        'len' => '36',
      ),
      5 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      6 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => false,
      ),
    ),
  ),
  'documents_accounts' => 
  array (
    'name' => 'documents_accounts',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'documents_accounts' => 
      array (
        'lhs_module' => 'Documents',
        'lhs_table' => 'documents',
        'lhs_key' => 'id',
        'rhs_module' => 'Accounts',
        'rhs_table' => 'accounts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'documents_accounts',
        'join_key_lhs' => 'document_id',
        'join_key_rhs' => 'account_id',
      ),
    ),
    'table' => 'documents_accounts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'id',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'account_id',
        'type' => 'id',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'documents_accountsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'documents_accounts_account_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'account_id',
          1 => 'document_id',
        ),
      ),
      2 => 
      array (
        'name' => 'documents_accounts_document_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'document_id',
          1 => 'account_id',
        ),
      ),
    ),
    'lhs_module' => 'Documents',
    'lhs_table' => 'documents',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'documents_accounts',
    'join_key_lhs' => 'document_id',
    'join_key_rhs' => 'account_id',
  ),
  'documents_contacts' => 
  array (
    'name' => 'documents_contacts',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'documents_contacts' => 
      array (
        'lhs_module' => 'Documents',
        'lhs_table' => 'documents',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'documents_contacts',
        'join_key_lhs' => 'document_id',
        'join_key_rhs' => 'contact_id',
      ),
    ),
    'table' => 'documents_contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'id',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contact_id',
        'type' => 'id',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'documents_contactsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'documents_contacts_contact_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contact_id',
          1 => 'document_id',
        ),
      ),
      2 => 
      array (
        'name' => 'documents_contacts_document_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'document_id',
          1 => 'contact_id',
        ),
      ),
    ),
    'lhs_module' => 'Documents',
    'lhs_table' => 'documents',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'documents_contacts',
    'join_key_lhs' => 'document_id',
    'join_key_rhs' => 'contact_id',
  ),
  'documents_opportunities' => 
  array (
    'name' => 'documents_opportunities',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'documents_opportunities' => 
      array (
        'lhs_module' => 'Documents',
        'lhs_table' => 'documents',
        'lhs_key' => 'id',
        'rhs_module' => 'Opportunities',
        'rhs_table' => 'opportunities',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'documents_opportunities',
        'join_key_lhs' => 'document_id',
        'join_key_rhs' => 'opportunity_id',
      ),
    ),
    'table' => 'documents_opportunities',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'id',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'opportunity_id',
        'type' => 'id',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'documents_opportunitiesspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'idx_docu_opps_oppo_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'opportunity_id',
          1 => 'document_id',
        ),
      ),
      2 => 
      array (
        'name' => 'idx_docu_oppo_docu_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'document_id',
          1 => 'opportunity_id',
        ),
      ),
    ),
    'lhs_module' => 'Documents',
    'lhs_table' => 'documents',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'documents_opportunities',
    'join_key_lhs' => 'document_id',
    'join_key_rhs' => 'opportunity_id',
  ),
  'documents_cases' => 
  array (
    'name' => 'documents_cases',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'documents_cases' => 
      array (
        'lhs_module' => 'Documents',
        'lhs_table' => 'documents',
        'lhs_key' => 'id',
        'rhs_module' => 'Cases',
        'rhs_table' => 'cases',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'documents_cases',
        'join_key_lhs' => 'document_id',
        'join_key_rhs' => 'case_id',
      ),
    ),
    'table' => 'documents_cases',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'id',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'case_id',
        'type' => 'id',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'documents_casesspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'documents_cases_case_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'case_id',
          1 => 'document_id',
        ),
      ),
      2 => 
      array (
        'name' => 'documents_cases_document_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'document_id',
          1 => 'case_id',
        ),
      ),
    ),
    'lhs_module' => 'Documents',
    'lhs_table' => 'documents',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'documents_cases',
    'join_key_lhs' => 'document_id',
    'join_key_rhs' => 'case_id',
  ),
  'documents_bugs' => 
  array (
    'name' => 'documents_bugs',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'documents_bugs' => 
      array (
        'lhs_module' => 'Documents',
        'lhs_table' => 'documents',
        'lhs_key' => 'id',
        'rhs_module' => 'Bugs',
        'rhs_table' => 'bugs',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'documents_bugs',
        'join_key_lhs' => 'document_id',
        'join_key_rhs' => 'bug_id',
      ),
    ),
    'table' => 'documents_bugs',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'id',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bug_id',
        'type' => 'id',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'documents_bugsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'documents_bugs_bug_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bug_id',
          1 => 'document_id',
        ),
      ),
      2 => 
      array (
        'name' => 'documents_bugs_document_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'document_id',
          1 => 'bug_id',
        ),
      ),
    ),
    'lhs_module' => 'Documents',
    'lhs_table' => 'documents',
    'lhs_key' => 'id',
    'rhs_module' => 'Bugs',
    'rhs_table' => 'bugs',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'documents_bugs',
    'join_key_lhs' => 'document_id',
    'join_key_rhs' => 'bug_id',
  ),
  'documents_products' => 
  array (
    'name' => 'documents_products',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'documents_products' => 
      array (
        'lhs_module' => 'Documents',
        'lhs_table' => 'documents',
        'lhs_key' => 'id',
        'rhs_module' => 'Products',
        'rhs_table' => 'products',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'documents_products',
        'join_key_lhs' => 'document_id',
        'join_key_rhs' => 'product_id',
      ),
    ),
    'table' => 'documents_products',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'id',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'product_id',
        'type' => 'id',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'documents_productsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'documents_products_product_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'product_id',
          1 => 'document_id',
        ),
      ),
      2 => 
      array (
        'name' => 'documents_products_document_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'document_id',
          1 => 'product_id',
        ),
      ),
    ),
    'lhs_module' => 'Documents',
    'lhs_table' => 'documents',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'documents_products',
    'join_key_lhs' => 'document_id',
    'join_key_rhs' => 'product_id',
  ),
  'documents_quotes' => 
  array (
    'name' => 'documents_quotes',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'documents_quotes' => 
      array (
        'lhs_module' => 'Documents',
        'lhs_table' => 'documents',
        'lhs_key' => 'id',
        'rhs_module' => 'Quotes',
        'rhs_table' => 'quotes',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'documents_quotes',
        'join_key_lhs' => 'document_id',
        'join_key_rhs' => 'quote_id',
      ),
    ),
    'table' => 'documents_quotes',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'document_id',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'quote_id',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'documents_quotesspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'documents_quotes_quote_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'quote_id',
          1 => 'document_id',
        ),
      ),
      2 => 
      array (
        'name' => 'documents_quotes_document_id',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'document_id',
          1 => 'quote_id',
        ),
      ),
    ),
    'lhs_module' => 'Documents',
    'lhs_table' => 'documents',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'documents_quotes',
    'join_key_lhs' => 'document_id',
    'join_key_rhs' => 'quote_id',
  ),
  'bc_survey_automizer_bc_automizer_condition' => 
  array (
    'name' => 'bc_survey_automizer_bc_automizer_condition',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_automizer_bc_automizer_condition' => 
      array (
        'lhs_module' => 'bc_survey_automizer',
        'lhs_table' => 'bc_survey_automizer',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_automizer_condition',
        'rhs_table' => 'bc_automizer_condition',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_automizer_bc_automizer_condition_c',
        'join_key_lhs' => 'bc_survey_3b38tomizer_ida',
        'join_key_rhs' => 'bc_survey_3650ndition_idb',
      ),
    ),
    'table' => 'bc_survey_automizer_bc_automizer_condition_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_3b38tomizer_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_3650ndition_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_automizer_bc_automizer_conditionspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_automizer_bc_automizer_condition_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_3b38tomizer_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_automizer_bc_automizer_condition_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_3650ndition_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_automizer',
    'lhs_table' => 'bc_survey_automizer',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_automizer_condition',
    'rhs_table' => 'bc_automizer_condition',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_automizer_bc_automizer_condition_c',
    'join_key_lhs' => 'bc_survey_3b38tomizer_ida',
    'join_key_rhs' => 'bc_survey_3650ndition_idb',
  ),
  'leads_c_payments_1' => 
  array (
    'name' => 'leads_c_payments_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'leads_c_payments_1' => 
      array (
        'lhs_module' => 'Leads',
        'lhs_table' => 'leads',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Payments',
        'rhs_table' => 'c_payments',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'leads_c_payments_1_c',
        'join_key_lhs' => 'leads_c_payments_1leads_ida',
        'join_key_rhs' => 'leads_c_payments_1c_payments_idb',
      ),
    ),
    'table' => 'leads_c_payments_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'leads_c_payments_1leads_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'leads_c_payments_1c_payments_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'leads_c_payments_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'leads_c_payments_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'leads_c_payments_1leads_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'leads_c_payments_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'leads_c_payments_1c_payments_idb',
        ),
      ),
    ),
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'leads_c_payments_1_c',
    'join_key_lhs' => 'leads_c_payments_1leads_ida',
    'join_key_rhs' => 'leads_c_payments_1c_payments_idb',
  ),
  'j_studentsituations_c_sms' => 
  array (
    'name' => 'j_studentsituations_c_sms',
    'relationships' => 
    array (
      'j_studentsituations_c_sms' => 
      array (
        'lhs_module' => 'J_StudentSituations',
        'lhs_table' => 'j_studentsituations',
        'lhs_key' => 'id',
        'rhs_module' => 'C_SMS',
        'rhs_table' => 'c_sms',
        'rhs_key' => 'parent_id',
        'relationship_type' => 'one-to-many',
        'relationship_role_column' => 'parent_type',
        'relationship_role_column_value' => 'J_StudentSituations',
      ),
    ),
    'fields' => '',
    'indices' => '',
    'table' => '',
    'lhs_module' => 'J_StudentSituations',
    'lhs_table' => 'j_studentsituations',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'J_StudentSituations',
  ),
  'leads_leads_1' => 
  array (
    'name' => 'leads_leads_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'leads_leads_1' => 
      array (
        'lhs_module' => 'Leads',
        'lhs_table' => 'leads',
        'lhs_key' => 'id',
        'rhs_module' => 'Leads',
        'rhs_table' => 'leads',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'leads_leads_1_c',
        'join_key_lhs' => 'leads_leads_1leads_ida',
        'join_key_rhs' => 'leads_leads_1leads_idb',
      ),
    ),
    'table' => 'leads_leads_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'leads_leads_1leads_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'leads_leads_1leads_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'leads_leads_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'leads_leads_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'leads_leads_1leads_ida',
          1 => 'leads_leads_1leads_idb',
        ),
      ),
    ),
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'leads_leads_1_c',
    'join_key_lhs' => 'leads_leads_1leads_ida',
    'join_key_rhs' => 'leads_leads_1leads_idb',
  ),
  'j_class_j_gradebook_1' => 
  array (
    'name' => 'j_class_j_gradebook_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_class_j_gradebook_1' => 
      array (
        'lhs_module' => 'J_Class',
        'lhs_table' => 'j_class',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Gradebook',
        'rhs_table' => 'j_gradebook',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_class_j_gradebook_1_c',
        'join_key_lhs' => 'j_class_j_gradebook_1j_class_ida',
        'join_key_rhs' => 'j_class_j_gradebook_1j_gradebook_idb',
      ),
    ),
    'table' => 'j_class_j_gradebook_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_class_j_gradebook_1j_class_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_class_j_gradebook_1j_gradebook_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_class_j_gradebook_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_class_j_gradebook_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_class_j_gradebook_1j_class_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_class_j_gradebook_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_class_j_gradebook_1j_gradebook_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Gradebook',
    'rhs_table' => 'j_gradebook',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_class_j_gradebook_1_c',
    'join_key_lhs' => 'j_class_j_gradebook_1j_class_ida',
    'join_key_rhs' => 'j_class_j_gradebook_1j_gradebook_idb',
  ),
  'c_teachers_j_gradebook_1' => 
  array (
    'name' => 'c_teachers_j_gradebook_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_teachers_j_gradebook_1' => 
      array (
        'lhs_module' => 'C_Teachers',
        'lhs_table' => 'c_teachers',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Gradebook',
        'rhs_table' => 'j_gradebook',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_teachers_j_gradebook_1_c',
        'join_key_lhs' => 'c_teachers_j_gradebook_1c_teachers_ida',
        'join_key_rhs' => 'c_teachers_j_gradebook_1j_gradebook_idb',
      ),
    ),
    'table' => 'c_teachers_j_gradebook_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_teachers_j_gradebook_1c_teachers_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_teachers_j_gradebook_1j_gradebook_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_teachers_j_gradebook_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_teachers_j_gradebook_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_teachers_j_gradebook_1c_teachers_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_teachers_j_gradebook_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_teachers_j_gradebook_1j_gradebook_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Gradebook',
    'rhs_table' => 'j_gradebook',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_teachers_j_gradebook_1_c',
    'join_key_lhs' => 'c_teachers_j_gradebook_1c_teachers_ida',
    'join_key_rhs' => 'c_teachers_j_gradebook_1j_gradebook_idb',
  ),
  'j_coursefee_j_payment_1' => 
  array (
    'name' => 'j_coursefee_j_payment_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_coursefee_j_payment_1' => 
      array (
        'lhs_module' => 'J_Coursefee',
        'lhs_table' => 'j_coursefee',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Payment',
        'rhs_table' => 'j_payment',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_coursefee_j_payment_1_c',
        'join_key_lhs' => 'j_coursefee_j_payment_1j_coursefee_ida',
        'join_key_rhs' => 'j_coursefee_j_payment_1j_payment_idb',
      ),
    ),
    'table' => 'j_coursefee_j_payment_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_coursefee_j_payment_1j_coursefee_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_coursefee_j_payment_1j_payment_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_coursefee_j_payment_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_coursefee_j_payment_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_coursefee_j_payment_1j_coursefee_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_coursefee_j_payment_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_coursefee_j_payment_1j_payment_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Coursefee',
    'lhs_table' => 'j_coursefee',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_coursefee_j_payment_1_c',
    'join_key_lhs' => 'j_coursefee_j_payment_1j_coursefee_ida',
    'join_key_rhs' => 'j_coursefee_j_payment_1j_payment_idb',
  ),
  'j_discount_j_discount_1' => 
  array (
    'name' => 'j_discount_j_discount_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_discount_j_discount_1' => 
      array (
        'lhs_module' => 'J_Discount',
        'lhs_table' => 'j_discount',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Discount',
        'rhs_table' => 'j_discount',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_discount_j_discount_1_c',
        'join_key_lhs' => 'j_discount_j_discount_1j_discount_ida',
        'join_key_rhs' => 'j_discount_j_discount_1j_discount_idb',
      ),
    ),
    'table' => 'j_discount_j_discount_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_discount_j_discount_1j_discount_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_discount_j_discount_1j_discount_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_discount_j_discount_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_discount_j_discount_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_discount_j_discount_1j_discount_ida',
          1 => 'j_discount_j_discount_1j_discount_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Discount',
    'lhs_table' => 'j_discount',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Discount',
    'rhs_table' => 'j_discount',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_discount_j_discount_1_c',
    'join_key_lhs' => 'j_discount_j_discount_1j_discount_ida',
    'join_key_rhs' => 'j_discount_j_discount_1j_discount_idb',
  ),
  'j_class_j_feedback_1' => 
  array (
    'name' => 'j_class_j_feedback_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_class_j_feedback_1' => 
      array (
        'lhs_module' => 'J_Class',
        'lhs_table' => 'j_class',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Feedback',
        'rhs_table' => 'j_feedback',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_class_j_feedback_1_c',
        'join_key_lhs' => 'j_class_j_feedback_1j_class_ida',
        'join_key_rhs' => 'j_class_j_feedback_1j_feedback_idb',
      ),
    ),
    'table' => 'j_class_j_feedback_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_class_j_feedback_1j_class_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_class_j_feedback_1j_feedback_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_class_j_feedback_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_class_j_feedback_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_class_j_feedback_1j_class_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_class_j_feedback_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_class_j_feedback_1j_feedback_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_class_j_feedback_1_c',
    'join_key_lhs' => 'j_class_j_feedback_1j_class_ida',
    'join_key_rhs' => 'j_class_j_feedback_1j_feedback_idb',
  ),
  'bc_survey_submission_accounts' => 
  array (
    'name' => 'bc_survey_submission_accounts',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_submission_accounts' => 
      array (
        'lhs_module' => 'Accounts',
        'lhs_table' => 'accounts',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_submission',
        'rhs_table' => 'bc_survey_submission',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_submission_accounts_c',
        'join_key_lhs' => 'bc_survey_submission_accountsaccounts_ida',
        'join_key_rhs' => 'bc_survey_submission_accountsbc_survey_submission_idb',
      ),
    ),
    'table' => 'bc_survey_submission_accounts_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_submission_accountsaccounts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_submission_accountsbc_survey_submission_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_submission_accountsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_submission_accounts_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_submission_accountsaccounts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_submission_accounts_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_submission_accountsbc_survey_submission_idb',
        ),
      ),
    ),
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_submission_accounts_c',
    'join_key_lhs' => 'bc_survey_submission_accountsaccounts_ida',
    'join_key_rhs' => 'bc_survey_submission_accountsbc_survey_submission_idb',
  ),
  'bc_survey_submission_users' => 
  array (
    'name' => 'bc_survey_submission_users',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_submission_users' => 
      array (
        'lhs_module' => 'Users',
        'lhs_table' => 'users',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_submission',
        'rhs_table' => 'bc_survey_submission',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_submission_users_c',
        'join_key_lhs' => 'bc_survey_submission_usersusers_ida',
        'join_key_rhs' => 'bc_survey_submission_usersbc_survey_submission_idb',
      ),
    ),
    'table' => 'bc_survey_submission_users_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_submission_usersusers_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_submission_usersbc_survey_submission_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_submission_usersspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_submission_users_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_submission_usersusers_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_submission_users_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_submission_usersbc_survey_submission_idb',
        ),
      ),
    ),
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_submission_users_c',
    'join_key_lhs' => 'bc_survey_submission_usersusers_ida',
    'join_key_rhs' => 'bc_survey_submission_usersbc_survey_submission_idb',
  ),
  'j_payment_j_inventory_1' => 
  array (
    'name' => 'j_payment_j_inventory_1',
    'true_relationship_type' => 'one-to-one',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_payment_j_inventory_1' => 
      array (
        'lhs_module' => 'J_Payment',
        'lhs_table' => 'j_payment',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Inventory',
        'rhs_table' => 'j_inventory',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_payment_j_inventory_1_c',
        'join_key_lhs' => 'j_payment_j_inventory_1j_payment_ida',
        'join_key_rhs' => 'j_payment_j_inventory_1j_inventory_idb',
      ),
    ),
    'table' => 'j_payment_j_inventory_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_payment_j_inventory_1j_payment_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_payment_j_inventory_1j_inventory_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_payment_j_inventory_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_payment_j_inventory_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_payment_j_inventory_1j_payment_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_payment_j_inventory_1_idb2',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_payment_j_inventory_1j_inventory_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_payment_j_inventory_1_c',
    'join_key_lhs' => 'j_payment_j_inventory_1j_payment_ida',
    'join_key_rhs' => 'j_payment_j_inventory_1j_inventory_idb',
  ),
  'contacts_j_payment_1' => 
  array (
    'name' => 'contacts_j_payment_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contacts_j_payment_1' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Payment',
        'rhs_table' => 'j_payment',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_j_payment_1_c',
        'join_key_lhs' => 'contacts_j_payment_1contacts_ida',
        'join_key_rhs' => 'contacts_j_payment_1j_payment_idb',
      ),
    ),
    'table' => 'contacts_j_payment_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contacts_j_payment_1contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contacts_j_payment_1j_payment_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_j_payment_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contacts_j_payment_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contacts_j_payment_1contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'contacts_j_payment_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contacts_j_payment_1j_payment_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_j_payment_1_c',
    'join_key_lhs' => 'contacts_j_payment_1contacts_ida',
    'join_key_rhs' => 'contacts_j_payment_1j_payment_idb',
  ),
  'contacts_c_invoices_1' => 
  array (
    'name' => 'contacts_c_invoices_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contacts_c_invoices_1' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Invoices',
        'rhs_table' => 'c_invoices',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_c_invoices_1_c',
        'join_key_lhs' => 'contacts_c_invoices_1contacts_ida',
        'join_key_rhs' => 'contacts_c_invoices_1c_invoices_idb',
      ),
    ),
    'table' => 'contacts_c_invoices_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contacts_c_invoices_1contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contacts_c_invoices_1c_invoices_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_c_invoices_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contacts_c_invoices_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contacts_c_invoices_1contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'contacts_c_invoices_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contacts_c_invoices_1c_invoices_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Invoices',
    'rhs_table' => 'c_invoices',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_c_invoices_1_c',
    'join_key_lhs' => 'contacts_c_invoices_1contacts_ida',
    'join_key_rhs' => 'contacts_c_invoices_1c_invoices_idb',
  ),
  'contacts_c_payments_2' => 
  array (
    'name' => 'contacts_c_payments_2',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contacts_c_payments_2' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Payments',
        'rhs_table' => 'c_payments',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_c_payments_2_c',
        'join_key_lhs' => 'contacts_c_payments_2contacts_ida',
        'join_key_rhs' => 'contacts_c_payments_2c_payments_idb',
      ),
    ),
    'table' => 'contacts_c_payments_2_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contacts_c_payments_2contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contacts_c_payments_2c_payments_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_c_payments_2spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contacts_c_payments_2_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contacts_c_payments_2contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'contacts_c_payments_2_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contacts_c_payments_2c_payments_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_c_payments_2_c',
    'join_key_lhs' => 'contacts_c_payments_2contacts_ida',
    'join_key_rhs' => 'contacts_c_payments_2c_payments_idb',
  ),
  'c_sponsors_c_payments_1' => 
  array (
    'name' => 'c_sponsors_c_payments_1',
    'true_relationship_type' => 'one-to-one',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_sponsors_c_payments_1' => 
      array (
        'lhs_module' => 'C_Sponsors',
        'lhs_table' => 'c_sponsors',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Payments',
        'rhs_table' => 'c_payments',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_sponsors_c_payments_1_c',
        'join_key_lhs' => 'c_sponsors_c_payments_1c_sponsors_ida',
        'join_key_rhs' => 'c_sponsors_c_payments_1c_payments_idb',
      ),
    ),
    'table' => 'c_sponsors_c_payments_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_sponsors_c_payments_1c_sponsors_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_sponsors_c_payments_1c_payments_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_sponsors_c_payments_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_sponsors_c_payments_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_sponsors_c_payments_1c_sponsors_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_sponsors_c_payments_1_idb2',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_sponsors_c_payments_1c_payments_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Sponsors',
    'lhs_table' => 'c_sponsors',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_sponsors_c_payments_1_c',
    'join_key_lhs' => 'c_sponsors_c_payments_1c_sponsors_ida',
    'join_key_rhs' => 'c_sponsors_c_payments_1c_payments_idb',
  ),
  'j_discount_j_partnership_1' => 
  array (
    'name' => 'j_discount_j_partnership_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_discount_j_partnership_1' => 
      array (
        'lhs_module' => 'J_Discount',
        'lhs_table' => 'j_discount',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Partnership',
        'rhs_table' => 'j_partnership',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_discount_j_partnership_1_c',
        'join_key_lhs' => 'j_discount_j_partnership_1j_discount_ida',
        'join_key_rhs' => 'j_discount_j_partnership_1j_partnership_idb',
      ),
    ),
    'table' => 'j_discount_j_partnership_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_discount_j_partnership_1j_discount_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_discount_j_partnership_1j_partnership_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_discount_j_partnership_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_discount_j_partnership_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_discount_j_partnership_1j_discount_ida',
          1 => 'j_discount_j_partnership_1j_partnership_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Discount',
    'lhs_table' => 'j_discount',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Partnership',
    'rhs_table' => 'j_partnership',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_discount_j_partnership_1_c',
    'join_key_lhs' => 'j_discount_j_partnership_1j_discount_ida',
    'join_key_rhs' => 'j_discount_j_partnership_1j_partnership_idb',
  ),
  'bc_survey_submission_bc_survey' => 
  array (
    'name' => 'bc_survey_submission_bc_survey',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_submission_bc_survey' => 
      array (
        'lhs_module' => 'bc_survey',
        'lhs_table' => 'bc_survey',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_submission',
        'rhs_table' => 'bc_survey_submission',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_submission_bc_survey_c',
        'join_key_lhs' => 'bc_survey_submission_bc_surveybc_survey_ida',
        'join_key_rhs' => 'bc_survey_submission_bc_surveybc_survey_submission_idb',
      ),
    ),
    'table' => 'bc_survey_submission_bc_survey_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_submission_bc_surveybc_survey_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_submission_bc_surveybc_survey_submission_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_submission_bc_surveyspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_submission_bc_survey_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_submission_bc_surveybc_survey_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_submission_bc_survey_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_submission_bc_surveybc_survey_submission_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey',
    'lhs_table' => 'bc_survey',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_submission_bc_survey_c',
    'join_key_lhs' => 'bc_survey_submission_bc_surveybc_survey_ida',
    'join_key_rhs' => 'bc_survey_submission_bc_surveybc_survey_submission_idb',
  ),
  'bc_survey_leads' => 
  array (
    'name' => 'bc_survey_leads',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'bc_survey_leads' => 
      array (
        'lhs_module' => 'bc_survey',
        'lhs_table' => 'bc_survey',
        'lhs_key' => 'id',
        'rhs_module' => 'Leads',
        'rhs_table' => 'leads',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_leads_c',
        'join_key_lhs' => 'bc_survey_leadsbc_survey_ida',
        'join_key_rhs' => 'bc_survey_leadsleads_idb',
      ),
    ),
    'table' => 'bc_survey_leads_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_leadsbc_survey_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_leadsleads_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_leadsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_leads_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_leadsbc_survey_ida',
          1 => 'bc_survey_leadsleads_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey',
    'lhs_table' => 'bc_survey',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_leads_c',
    'join_key_lhs' => 'bc_survey_leadsbc_survey_ida',
    'join_key_rhs' => 'bc_survey_leadsleads_idb',
  ),
  'leads_contacts_1' => 
  array (
    'name' => 'leads_contacts_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'leads_contacts_1' => 
      array (
        'lhs_module' => 'Leads',
        'lhs_table' => 'leads',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'leads_contacts_1_c',
        'join_key_lhs' => 'leads_contacts_1leads_ida',
        'join_key_rhs' => 'leads_contacts_1contacts_idb',
      ),
    ),
    'table' => 'leads_contacts_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'leads_contacts_1leads_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'leads_contacts_1contacts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'leads_contacts_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'leads_contacts_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'leads_contacts_1leads_ida',
          1 => 'leads_contacts_1contacts_idb',
        ),
      ),
    ),
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'leads_contacts_1_c',
    'join_key_lhs' => 'leads_contacts_1leads_ida',
    'join_key_rhs' => 'leads_contacts_1contacts_idb',
  ),
  'j_coursefee_j_class_1' => 
  array (
    'name' => 'j_coursefee_j_class_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_coursefee_j_class_1' => 
      array (
        'lhs_module' => 'J_Coursefee',
        'lhs_table' => 'j_coursefee',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Class',
        'rhs_table' => 'j_class',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_coursefee_j_class_1_c',
        'join_key_lhs' => 'j_coursefee_j_class_1j_coursefee_ida',
        'join_key_rhs' => 'j_coursefee_j_class_1j_class_idb',
      ),
    ),
    'table' => 'j_coursefee_j_class_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_coursefee_j_class_1j_coursefee_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_coursefee_j_class_1j_class_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_coursefee_j_class_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_coursefee_j_class_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_coursefee_j_class_1j_coursefee_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_coursefee_j_class_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_coursefee_j_class_1j_class_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Coursefee',
    'lhs_table' => 'j_coursefee',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_coursefee_j_class_1_c',
    'join_key_lhs' => 'j_coursefee_j_class_1j_coursefee_ida',
    'join_key_rhs' => 'j_coursefee_j_class_1j_class_idb',
  ),
  'bc_submission_data_bc_survey_answers' => 
  array (
    'name' => 'bc_submission_data_bc_survey_answers',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_submission_data_bc_survey_answers' => 
      array (
        'lhs_module' => 'bc_survey_answers',
        'lhs_table' => 'bc_survey_answers',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_submission_data',
        'rhs_table' => 'bc_submission_data',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_submission_data_bc_survey_answers_c',
        'join_key_lhs' => 'bc_submission_data_bc_survey_answersbc_survey_answers_ida',
        'join_key_rhs' => 'bc_submission_data_bc_survey_answersbc_submission_data_idb',
      ),
    ),
    'table' => 'bc_submission_data_bc_survey_answers_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_submission_data_bc_survey_answersbc_survey_answers_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_submission_data_bc_survey_answersbc_submission_data_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_submission_data_bc_survey_answersspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_submission_data_bc_survey_answers_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_submission_data_bc_survey_answersbc_survey_answers_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_submission_data_bc_survey_answers_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_submission_data_bc_survey_answersbc_submission_data_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_answers',
    'lhs_table' => 'bc_survey_answers',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_submission_data',
    'rhs_table' => 'bc_submission_data',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_submission_data_bc_survey_answers_c',
    'join_key_lhs' => 'bc_submission_data_bc_survey_answersbc_survey_answers_ida',
    'join_key_rhs' => 'bc_submission_data_bc_survey_answersbc_submission_data_idb',
  ),
  'c_classes_opportunities_1' => 
  array (
    'name' => 'c_classes_opportunities_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_classes_opportunities_1' => 
      array (
        'lhs_module' => 'C_Classes',
        'lhs_table' => 'c_classes',
        'lhs_key' => 'id',
        'rhs_module' => 'Opportunities',
        'rhs_table' => 'opportunities',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_classes_opportunities_1_c',
        'join_key_lhs' => 'c_classes_opportunities_1c_classes_ida',
        'join_key_rhs' => 'c_classes_opportunities_1opportunities_idb',
      ),
    ),
    'table' => 'c_classes_opportunities_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_classes_opportunities_1c_classes_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_classes_opportunities_1opportunities_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_classes_opportunities_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_classes_opportunities_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_classes_opportunities_1c_classes_ida',
          1 => 'c_classes_opportunities_1opportunities_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Classes',
    'lhs_table' => 'c_classes',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_classes_opportunities_1_c',
    'join_key_lhs' => 'c_classes_opportunities_1c_classes_ida',
    'join_key_rhs' => 'c_classes_opportunities_1opportunities_idb',
  ),
  'contracts_meetings_1' => 
  array (
    'name' => 'contracts_meetings_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contracts_meetings_1' => 
      array (
        'lhs_module' => 'Contracts',
        'lhs_table' => 'contracts',
        'lhs_key' => 'id',
        'rhs_module' => 'Meetings',
        'rhs_table' => 'meetings',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contracts_meetings_1_c',
        'join_key_lhs' => 'contracts_meetings_1contracts_ida',
        'join_key_rhs' => 'contracts_meetings_1meetings_idb',
      ),
    ),
    'table' => 'contracts_meetings_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contracts_meetings_1contracts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contracts_meetings_1meetings_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contracts_meetings_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contracts_meetings_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contracts_meetings_1contracts_ida',
          1 => 'contracts_meetings_1meetings_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contracts_meetings_1_c',
    'join_key_lhs' => 'contracts_meetings_1contracts_ida',
    'join_key_rhs' => 'contracts_meetings_1meetings_idb',
  ),
  'contacts_c_payments_1' => 
  array (
    'name' => 'contacts_c_payments_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contacts_c_payments_1' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Payments',
        'rhs_table' => 'c_payments',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_c_payments_1_c',
        'join_key_lhs' => 'contacts_c_payments_1contacts_ida',
        'join_key_rhs' => 'contacts_c_payments_1c_payments_idb',
      ),
    ),
    'table' => 'contacts_c_payments_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contacts_c_payments_1contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contacts_c_payments_1c_payments_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_c_payments_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contacts_c_payments_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contacts_c_payments_1contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'contacts_c_payments_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contacts_c_payments_1c_payments_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_c_payments_1_c',
    'join_key_lhs' => 'contacts_c_payments_1contacts_ida',
    'join_key_rhs' => 'contacts_c_payments_1c_payments_idb',
  ),
  'contacts_j_feedback_1' => 
  array (
    'name' => 'contacts_j_feedback_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contacts_j_feedback_1' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Feedback',
        'rhs_table' => 'j_feedback',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_j_feedback_1_c',
        'join_key_lhs' => 'contacts_j_feedback_1contacts_ida',
        'join_key_rhs' => 'contacts_j_feedback_1j_feedback_idb',
      ),
    ),
    'table' => 'contacts_j_feedback_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contacts_j_feedback_1contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contacts_j_feedback_1j_feedback_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_j_feedback_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contacts_j_feedback_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contacts_j_feedback_1contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'contacts_j_feedback_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contacts_j_feedback_1j_feedback_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_j_feedback_1_c',
    'join_key_lhs' => 'contacts_j_feedback_1contacts_ida',
    'join_key_rhs' => 'contacts_j_feedback_1j_feedback_idb',
  ),
  'contacts_c_refunds_1' => 
  array (
    'name' => 'contacts_c_refunds_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contacts_c_refunds_1' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Refunds',
        'rhs_table' => 'c_refunds',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_c_refunds_1_c',
        'join_key_lhs' => 'contacts_c_refunds_1contacts_ida',
        'join_key_rhs' => 'contacts_c_refunds_1c_refunds_idb',
      ),
    ),
    'table' => 'contacts_c_refunds_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contacts_c_refunds_1contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contacts_c_refunds_1c_refunds_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_c_refunds_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contacts_c_refunds_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contacts_c_refunds_1contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'contacts_c_refunds_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contacts_c_refunds_1c_refunds_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Refunds',
    'rhs_table' => 'c_refunds',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_c_refunds_1_c',
    'join_key_lhs' => 'contacts_c_refunds_1contacts_ida',
    'join_key_rhs' => 'contacts_c_refunds_1c_refunds_idb',
  ),
  'c_classes_c_rooms_1' => 
  array (
    'name' => 'c_classes_c_rooms_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_classes_c_rooms_1' => 
      array (
        'lhs_module' => 'C_Classes',
        'lhs_table' => 'c_classes',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Rooms',
        'rhs_table' => 'c_rooms',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_classes_c_rooms_1_c',
        'join_key_lhs' => 'c_classes_c_rooms_1c_classes_ida',
        'join_key_rhs' => 'c_classes_c_rooms_1c_rooms_idb',
      ),
    ),
    'table' => 'c_classes_c_rooms_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_classes_c_rooms_1c_classes_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_classes_c_rooms_1c_rooms_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_classes_c_rooms_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_classes_c_rooms_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_classes_c_rooms_1c_classes_ida',
          1 => 'c_classes_c_rooms_1c_rooms_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Classes',
    'lhs_table' => 'c_classes',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Rooms',
    'rhs_table' => 'c_rooms',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_classes_c_rooms_1_c',
    'join_key_lhs' => 'c_classes_c_rooms_1c_classes_ida',
    'join_key_rhs' => 'c_classes_c_rooms_1c_rooms_idb',
  ),
  'accounts_c_payments_1' => 
  array (
    'name' => 'accounts_c_payments_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'accounts_c_payments_1' => 
      array (
        'lhs_module' => 'Accounts',
        'lhs_table' => 'accounts',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Payments',
        'rhs_table' => 'c_payments',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'accounts_c_payments_1_c',
        'join_key_lhs' => 'accounts_c_payments_1accounts_ida',
        'join_key_rhs' => 'accounts_c_payments_1c_payments_idb',
      ),
    ),
    'table' => 'accounts_c_payments_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'accounts_c_payments_1accounts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'accounts_c_payments_1c_payments_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'accounts_c_payments_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'accounts_c_payments_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'accounts_c_payments_1accounts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'accounts_c_payments_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'accounts_c_payments_1c_payments_idb',
        ),
      ),
    ),
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'accounts_c_payments_1_c',
    'join_key_lhs' => 'accounts_c_payments_1accounts_ida',
    'join_key_rhs' => 'accounts_c_payments_1c_payments_idb',
  ),
  'bc_survey_submission_contacts' => 
  array (
    'name' => 'bc_survey_submission_contacts',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_submission_contacts' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_submission',
        'rhs_table' => 'bc_survey_submission',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_submission_contacts_c',
        'join_key_lhs' => 'bc_survey_submission_contactscontacts_ida',
        'join_key_rhs' => 'bc_survey_submission_contactsbc_survey_submission_idb',
      ),
    ),
    'table' => 'bc_survey_submission_contacts_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_submission_contactscontacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_submission_contactsbc_survey_submission_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_submission_contactsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_submission_contacts_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_submission_contactscontacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_submission_contacts_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_submission_contactsbc_survey_submission_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_submission_contacts_c',
    'join_key_lhs' => 'bc_survey_submission_contactscontacts_ida',
    'join_key_rhs' => 'bc_survey_submission_contactsbc_survey_submission_idb',
  ),
  'j_class_leads_1' => 
  array (
    'name' => 'j_class_leads_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_class_leads_1' => 
      array (
        'lhs_module' => 'J_Class',
        'lhs_table' => 'j_class',
        'lhs_key' => 'id',
        'rhs_module' => 'Leads',
        'rhs_table' => 'leads',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_class_leads_1_c',
        'join_key_lhs' => 'j_class_leads_1j_class_ida',
        'join_key_rhs' => 'j_class_leads_1leads_idb',
      ),
    ),
    'table' => 'j_class_leads_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_class_leads_1j_class_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_class_leads_1leads_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_class_leads_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_class_leads_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_class_leads_1j_class_ida',
          1 => 'j_class_leads_1leads_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_class_leads_1_c',
    'join_key_lhs' => 'j_class_leads_1j_class_ida',
    'join_key_rhs' => 'j_class_leads_1leads_idb',
  ),
  'contact_c_sms' => 
  array (
    'name' => 'contact_c_sms',
    'relationships' => 
    array (
      'contact_c_sms' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'C_SMS',
        'rhs_table' => 'c_sms',
        'rhs_key' => 'parent_id',
        'relationship_type' => 'one-to-many',
        'relationship_role_column' => 'parent_type',
        'relationship_role_column_value' => 'Contacts',
      ),
    ),
    'fields' => '',
    'indices' => '',
    'table' => '',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Contacts',
  ),
  'j_class_j_class_1' => 
  array (
    'name' => 'j_class_j_class_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_class_j_class_1' => 
      array (
        'lhs_module' => 'J_Class',
        'lhs_table' => 'j_class',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Class',
        'rhs_table' => 'j_class',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_class_j_class_1_c',
        'join_key_lhs' => 'j_class_j_class_1j_class_ida',
        'join_key_rhs' => 'j_class_j_class_1j_class_idb',
      ),
    ),
    'table' => 'j_class_j_class_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_class_j_class_1j_class_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_class_j_class_1j_class_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_class_j_class_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_class_j_class_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_class_j_class_1j_class_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_class_j_class_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_class_j_class_1j_class_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_class_j_class_1_c',
    'join_key_lhs' => 'j_class_j_class_1j_class_ida',
    'join_key_rhs' => 'j_class_j_class_1j_class_idb',
  ),
  'j_payment_j_discount_1' => 
  array (
    'name' => 'j_payment_j_discount_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_payment_j_discount_1' => 
      array (
        'lhs_module' => 'J_Payment',
        'lhs_table' => 'j_payment',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Discount',
        'rhs_table' => 'j_discount',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_payment_j_discount_1_c',
        'join_key_lhs' => 'j_payment_j_discount_1j_payment_ida',
        'join_key_rhs' => 'j_payment_j_discount_1j_discount_idb',
      ),
    ),
    'table' => 'j_payment_j_discount_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_payment_j_discount_1j_payment_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_payment_j_discount_1j_discount_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_payment_j_discount_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_payment_j_discount_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_payment_j_discount_1j_payment_ida',
          1 => 'j_payment_j_discount_1j_discount_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Discount',
    'rhs_table' => 'j_discount',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_payment_j_discount_1_c',
    'join_key_lhs' => 'j_payment_j_discount_1j_payment_ida',
    'join_key_rhs' => 'j_payment_j_discount_1j_discount_idb',
  ),
  'j_payment_j_payment_1' => 
  array (
    'name' => 'j_payment_j_payment_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_payment_j_payment_1' => 
      array (
        'lhs_module' => 'J_Payment',
        'lhs_table' => 'j_payment',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Payment',
        'rhs_table' => 'j_payment',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_payment_j_payment_1_c',
        'join_key_lhs' => 'j_payment_j_payment_1j_payment_ida',
        'join_key_rhs' => 'j_payment_j_payment_1j_payment_idb',
      ),
    ),
    'table' => 'j_payment_j_payment_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_payment_j_payment_1j_payment_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_payment_j_payment_1j_payment_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
      5 => 
      array (
        'name' => 'hours',
        'type' => 'decimal',
        'len' => 13,
        'precision' => '2',
      ),
      6 => 
      array (
        'name' => 'amount',
        'type' => 'decimal',
        'len' => 20,
        'precision' => '2',
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_payment_j_payment_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_payment_j_payment_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_payment_j_payment_1j_payment_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_payment_j_payment_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_payment_j_payment_1j_payment_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_payment_j_payment_1_c',
    'join_key_lhs' => 'j_payment_j_payment_1j_payment_ida',
    'join_key_rhs' => 'j_payment_j_payment_1j_payment_idb',
  ),
  'j_class_contacts_1' => 
  array (
    'name' => 'j_class_contacts_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_class_contacts_1' => 
      array (
        'lhs_module' => 'J_Class',
        'lhs_table' => 'j_class',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_class_contacts_1_c',
        'join_key_lhs' => 'j_class_contacts_1j_class_ida',
        'join_key_rhs' => 'j_class_contacts_1contacts_idb',
      ),
    ),
    'table' => 'j_class_contacts_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_class_contacts_1j_class_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_class_contacts_1contacts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_class_contacts_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_class_contacts_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_class_contacts_1j_class_ida',
          1 => 'j_class_contacts_1contacts_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_class_contacts_1_c',
    'join_key_lhs' => 'j_class_contacts_1j_class_ida',
    'join_key_rhs' => 'j_class_contacts_1contacts_idb',
  ),
  'bc_survey_pages_bc_survey_template' => 
  array (
    'name' => 'bc_survey_pages_bc_survey_template',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_pages_bc_survey_template' => 
      array (
        'lhs_module' => 'bc_survey_template',
        'lhs_table' => 'bc_survey_template',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_pages',
        'rhs_table' => 'bc_survey_pages',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_pages_bc_survey_template_c',
        'join_key_lhs' => 'bc_survey_pages_bc_survey_templatebc_survey_template_ida',
        'join_key_rhs' => 'bc_survey_pages_bc_survey_templatebc_survey_pages_idb',
      ),
    ),
    'table' => 'bc_survey_pages_bc_survey_template_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_templatebc_survey_template_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_templatebc_survey_pages_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_templatespk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_template_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_pages_bc_survey_templatebc_survey_template_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_template_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_pages_bc_survey_templatebc_survey_pages_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_template',
    'lhs_table' => 'bc_survey_template',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_pages',
    'rhs_table' => 'bc_survey_pages',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_pages_bc_survey_template_c',
    'join_key_lhs' => 'bc_survey_pages_bc_survey_templatebc_survey_template_ida',
    'join_key_rhs' => 'bc_survey_pages_bc_survey_templatebc_survey_pages_idb',
  ),
  'bc_survey_users' => 
  array (
    'name' => 'bc_survey_users',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'bc_survey_users' => 
      array (
        'lhs_module' => 'bc_survey',
        'lhs_table' => 'bc_survey',
        'lhs_key' => 'id',
        'rhs_module' => 'Users',
        'rhs_table' => 'users',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_users_c',
        'join_key_lhs' => 'bc_survey_usersbc_survey_ida',
        'join_key_rhs' => 'bc_survey_usersusers_idb',
      ),
    ),
    'table' => 'bc_survey_users_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_usersbc_survey_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_usersusers_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_usersspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_users_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_usersbc_survey_ida',
          1 => 'bc_survey_usersusers_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey',
    'lhs_table' => 'bc_survey',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_users_c',
    'join_key_lhs' => 'bc_survey_usersbc_survey_ida',
    'join_key_rhs' => 'bc_survey_usersusers_idb',
  ),
  'c_invoices_opportunities_1' => 
  array (
    'name' => 'c_invoices_opportunities_1',
    'true_relationship_type' => 'one-to-one',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_invoices_opportunities_1' => 
      array (
        'lhs_module' => 'C_Invoices',
        'lhs_table' => 'c_invoices',
        'lhs_key' => 'id',
        'rhs_module' => 'Opportunities',
        'rhs_table' => 'opportunities',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_invoices_opportunities_1_c',
        'join_key_lhs' => 'c_invoices_opportunities_1c_invoices_ida',
        'join_key_rhs' => 'c_invoices_opportunities_1opportunities_idb',
      ),
    ),
    'table' => 'c_invoices_opportunities_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_invoices_opportunities_1c_invoices_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_invoices_opportunities_1opportunities_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_invoices_opportunities_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_invoices_opportunities_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_invoices_opportunities_1c_invoices_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_invoices_opportunities_1_idb2',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_invoices_opportunities_1opportunities_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Invoices',
    'lhs_table' => 'c_invoices',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_invoices_opportunities_1_c',
    'join_key_lhs' => 'c_invoices_opportunities_1c_invoices_ida',
    'join_key_rhs' => 'c_invoices_opportunities_1opportunities_idb',
  ),
  'c_classes_contracts_1' => 
  array (
    'name' => 'c_classes_contracts_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_classes_contracts_1' => 
      array (
        'lhs_module' => 'C_Classes',
        'lhs_table' => 'c_classes',
        'lhs_key' => 'id',
        'rhs_module' => 'Contracts',
        'rhs_table' => 'contracts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_classes_contracts_1_c',
        'join_key_lhs' => 'c_classes_contracts_1c_classes_ida',
        'join_key_rhs' => 'c_classes_contracts_1contracts_idb',
      ),
    ),
    'table' => 'c_classes_contracts_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_classes_contracts_1c_classes_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_classes_contracts_1contracts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_classes_contracts_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_classes_contracts_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_classes_contracts_1c_classes_ida',
          1 => 'c_classes_contracts_1contracts_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Classes',
    'lhs_table' => 'c_classes',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_classes_contracts_1_c',
    'join_key_lhs' => 'c_classes_contracts_1c_classes_ida',
    'join_key_rhs' => 'c_classes_contracts_1contracts_idb',
  ),
  'bc_survey_pages_bc_survey_questions' => 
  array (
    'name' => 'bc_survey_pages_bc_survey_questions',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_pages_bc_survey_questions' => 
      array (
        'lhs_module' => 'bc_survey_pages',
        'lhs_table' => 'bc_survey_pages',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_questions',
        'rhs_table' => 'bc_survey_questions',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_pages_bc_survey_questions_c',
        'join_key_lhs' => 'bc_survey_pages_bc_survey_questionsbc_survey_pages_ida',
        'join_key_rhs' => 'bc_survey_pages_bc_survey_questionsbc_survey_questions_idb',
      ),
    ),
    'table' => 'bc_survey_pages_bc_survey_questions_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_questionsbc_survey_pages_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_questionsbc_survey_questions_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_questionsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_questions_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_pages_bc_survey_questionsbc_survey_pages_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_questions_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_pages_bc_survey_questionsbc_survey_questions_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_pages',
    'lhs_table' => 'bc_survey_pages',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_questions',
    'rhs_table' => 'bc_survey_questions',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_pages_bc_survey_questions_c',
    'join_key_lhs' => 'bc_survey_pages_bc_survey_questionsbc_survey_pages_ida',
    'join_key_rhs' => 'bc_survey_pages_bc_survey_questionsbc_survey_questions_idb',
  ),
  'c_classes_contacts_1' => 
  array (
    'name' => 'c_classes_contacts_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_classes_contacts_1' => 
      array (
        'lhs_module' => 'C_Classes',
        'lhs_table' => 'c_classes',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_classes_contacts_1_c',
        'join_key_lhs' => 'c_classes_contacts_1c_classes_ida',
        'join_key_rhs' => 'c_classes_contacts_1contacts_idb',
      ),
    ),
    'table' => 'c_classes_contacts_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_classes_contacts_1c_classes_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_classes_contacts_1contacts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_classes_contacts_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_classes_contacts_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_classes_contacts_1c_classes_ida',
          1 => 'c_classes_contacts_1contacts_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Classes',
    'lhs_table' => 'c_classes',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_classes_contacts_1_c',
    'join_key_lhs' => 'c_classes_contacts_1c_classes_ida',
    'join_key_rhs' => 'c_classes_contacts_1contacts_idb',
  ),
  'opportunities_c_refunds_1' => 
  array (
    'name' => 'opportunities_c_refunds_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'opportunities_c_refunds_1' => 
      array (
        'lhs_module' => 'Opportunities',
        'lhs_table' => 'opportunities',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Refunds',
        'rhs_table' => 'c_refunds',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'opportunities_c_refunds_1_c',
        'join_key_lhs' => 'opportunities_c_refunds_1opportunities_ida',
        'join_key_rhs' => 'opportunities_c_refunds_1c_refunds_idb',
      ),
    ),
    'table' => 'opportunities_c_refunds_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'opportunities_c_refunds_1opportunities_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'opportunities_c_refunds_1c_refunds_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'opportunities_c_refunds_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'opportunities_c_refunds_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'opportunities_c_refunds_1opportunities_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'opportunities_c_refunds_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'opportunities_c_refunds_1c_refunds_idb',
        ),
      ),
    ),
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Refunds',
    'rhs_table' => 'c_refunds',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'opportunities_c_refunds_1_c',
    'join_key_lhs' => 'opportunities_c_refunds_1opportunities_ida',
    'join_key_rhs' => 'opportunities_c_refunds_1c_refunds_idb',
  ),
  'users_j_marketingplan_2' => 
  array (
    'name' => 'users_j_marketingplan_2',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'users_j_marketingplan_2' => 
      array (
        'lhs_module' => 'Users',
        'lhs_table' => 'users',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Marketingplan',
        'rhs_table' => 'j_marketingplan',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'users_j_marketingplan_2_c',
        'join_key_lhs' => 'users_j_marketingplan_2users_ida',
        'join_key_rhs' => 'users_j_marketingplan_2j_marketingplan_idb',
      ),
    ),
    'table' => 'users_j_marketingplan_2_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'users_j_marketingplan_2users_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'users_j_marketingplan_2j_marketingplan_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'users_j_marketingplan_2spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'users_j_marketingplan_2_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'users_j_marketingplan_2users_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'users_j_marketingplan_2_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'users_j_marketingplan_2j_marketingplan_idb',
        ),
      ),
    ),
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Marketingplan',
    'rhs_table' => 'j_marketingplan',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'users_j_marketingplan_2_c',
    'join_key_lhs' => 'users_j_marketingplan_2users_ida',
    'join_key_rhs' => 'users_j_marketingplan_2j_marketingplan_idb',
  ),
  'c_packages_opportunities_1' => 
  array (
    'name' => 'c_packages_opportunities_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_packages_opportunities_1' => 
      array (
        'lhs_module' => 'C_Packages',
        'lhs_table' => 'c_packages',
        'lhs_key' => 'id',
        'rhs_module' => 'Opportunities',
        'rhs_table' => 'opportunities',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_packages_opportunities_1_c',
        'join_key_lhs' => 'c_packages_opportunities_1c_packages_ida',
        'join_key_rhs' => 'c_packages_opportunities_1opportunities_idb',
      ),
    ),
    'table' => 'c_packages_opportunities_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_packages_opportunities_1c_packages_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_packages_opportunities_1opportunities_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_packages_opportunities_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_packages_opportunities_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_packages_opportunities_1c_packages_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_packages_opportunities_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_packages_opportunities_1opportunities_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Packages',
    'lhs_table' => 'c_packages',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_packages_opportunities_1_c',
    'join_key_lhs' => 'c_packages_opportunities_1c_packages_ida',
    'join_key_rhs' => 'c_packages_opportunities_1opportunities_idb',
  ),
  'bc_survey_pages_bc_survey' => 
  array (
    'name' => 'bc_survey_pages_bc_survey',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_pages_bc_survey' => 
      array (
        'lhs_module' => 'bc_survey',
        'lhs_table' => 'bc_survey',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_pages',
        'rhs_table' => 'bc_survey_pages',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_pages_bc_survey_c',
        'join_key_lhs' => 'bc_survey_pages_bc_surveybc_survey_ida',
        'join_key_rhs' => 'bc_survey_pages_bc_surveybc_survey_pages_idb',
      ),
    ),
    'table' => 'bc_survey_pages_bc_survey_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_pages_bc_surveybc_survey_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_pages_bc_surveybc_survey_pages_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_pages_bc_surveyspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_pages_bc_surveybc_survey_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_pages_bc_survey_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_pages_bc_surveybc_survey_pages_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey',
    'lhs_table' => 'bc_survey',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_pages',
    'rhs_table' => 'bc_survey_pages',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_pages_bc_survey_c',
    'join_key_lhs' => 'bc_survey_pages_bc_surveybc_survey_ida',
    'join_key_rhs' => 'bc_survey_pages_bc_surveybc_survey_pages_idb',
  ),
  'j_class_c_teachers_1' => 
  array (
    'name' => 'j_class_c_teachers_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_class_c_teachers_1' => 
      array (
        'lhs_module' => 'J_Class',
        'lhs_table' => 'j_class',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Teachers',
        'rhs_table' => 'c_teachers',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_class_c_teachers_1_c',
        'join_key_lhs' => 'j_class_c_teachers_1j_class_ida',
        'join_key_rhs' => 'j_class_c_teachers_1c_teachers_idb',
      ),
    ),
    'table' => 'j_class_c_teachers_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_class_c_teachers_1j_class_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_class_c_teachers_1c_teachers_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_class_c_teachers_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_class_c_teachers_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_class_c_teachers_1j_class_ida',
          1 => 'j_class_c_teachers_1c_teachers_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Teachers',
    'rhs_table' => 'c_teachers',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_class_c_teachers_1_c',
    'join_key_lhs' => 'j_class_c_teachers_1j_class_ida',
    'join_key_rhs' => 'j_class_c_teachers_1c_teachers_idb',
  ),
  'c_contacts_leads_1' => 
  array (
    'name' => 'c_contacts_leads_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_contacts_leads_1' => 
      array (
        'lhs_module' => 'C_Contacts',
        'lhs_table' => 'c_contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'Leads',
        'rhs_table' => 'leads',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_contacts_leads_1_c',
        'join_key_lhs' => 'c_contacts_leads_1c_contacts_ida',
        'join_key_rhs' => 'c_contacts_leads_1leads_idb',
      ),
    ),
    'table' => 'c_contacts_leads_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_contacts_leads_1c_contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_contacts_leads_1leads_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_contacts_leads_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_contacts_leads_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_contacts_leads_1c_contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_contacts_leads_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_contacts_leads_1leads_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Contacts',
    'lhs_table' => 'c_contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_contacts_leads_1_c',
    'join_key_lhs' => 'c_contacts_leads_1c_contacts_ida',
    'join_key_rhs' => 'c_contacts_leads_1leads_idb',
  ),
  'c_programs_c_classes_1' => 
  array (
    'name' => 'c_programs_c_classes_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_programs_c_classes_1' => 
      array (
        'lhs_module' => 'C_Programs',
        'lhs_table' => 'c_programs',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Classes',
        'rhs_table' => 'c_classes',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_programs_c_classes_1_c',
        'join_key_lhs' => 'c_programs_c_classes_1c_programs_ida',
        'join_key_rhs' => 'c_programs_c_classes_1c_classes_idb',
      ),
    ),
    'table' => 'c_programs_c_classes_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_programs_c_classes_1c_programs_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_programs_c_classes_1c_classes_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_programs_c_classes_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_programs_c_classes_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_programs_c_classes_1c_programs_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_programs_c_classes_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_programs_c_classes_1c_classes_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Programs',
    'lhs_table' => 'c_programs',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Classes',
    'rhs_table' => 'c_classes',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_programs_c_classes_1_c',
    'join_key_lhs' => 'c_programs_c_classes_1c_programs_ida',
    'join_key_rhs' => 'c_programs_c_classes_1c_classes_idb',
  ),
  'c_contacts_contacts_1' => 
  array (
    'name' => 'c_contacts_contacts_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_contacts_contacts_1' => 
      array (
        'lhs_module' => 'C_Contacts',
        'lhs_table' => 'c_contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_contacts_contacts_1_c',
        'join_key_lhs' => 'c_contacts_contacts_1c_contacts_ida',
        'join_key_rhs' => 'c_contacts_contacts_1contacts_idb',
      ),
    ),
    'table' => 'c_contacts_contacts_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_contacts_contacts_1c_contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_contacts_contacts_1contacts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_contacts_contacts_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_contacts_contacts_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_contacts_contacts_1c_contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_contacts_contacts_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_contacts_contacts_1contacts_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Contacts',
    'lhs_table' => 'c_contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_contacts_contacts_1_c',
    'join_key_lhs' => 'c_contacts_contacts_1c_contacts_ida',
    'join_key_rhs' => 'c_contacts_contacts_1contacts_idb',
  ),
  'users_j_marketingplan_1' => 
  array (
    'name' => 'users_j_marketingplan_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'users_j_marketingplan_1' => 
      array (
        'lhs_module' => 'Users',
        'lhs_table' => 'users',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Marketingplan',
        'rhs_table' => 'j_marketingplan',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'users_j_marketingplan_1_c',
        'join_key_lhs' => 'users_j_marketingplan_1users_ida',
        'join_key_rhs' => 'users_j_marketingplan_1j_marketingplan_idb',
      ),
    ),
    'table' => 'users_j_marketingplan_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'users_j_marketingplan_1users_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'users_j_marketingplan_1j_marketingplan_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'users_j_marketingplan_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'users_j_marketingplan_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'users_j_marketingplan_1users_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'users_j_marketingplan_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'users_j_marketingplan_1j_marketingplan_idb',
        ),
      ),
    ),
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Marketingplan',
    'rhs_table' => 'j_marketingplan',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'users_j_marketingplan_1_c',
    'join_key_lhs' => 'users_j_marketingplan_1users_ida',
    'join_key_rhs' => 'users_j_marketingplan_1j_marketingplan_idb',
  ),
  'contacts_contacts_1' => 
  array (
    'name' => 'contacts_contacts_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contacts_contacts_1' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_contacts_1_c',
        'join_key_lhs' => 'contacts_contacts_1contacts_ida',
        'join_key_rhs' => 'contacts_contacts_1contacts_idb',
      ),
    ),
    'table' => 'contacts_contacts_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contacts_contacts_1contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contacts_contacts_1contacts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_contacts_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contacts_contacts_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contacts_contacts_1contacts_ida',
          1 => 'contacts_contacts_1contacts_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_contacts_1_c',
    'join_key_lhs' => 'contacts_contacts_1contacts_ida',
    'join_key_rhs' => 'contacts_contacts_1contacts_idb',
  ),
  'meetings_j_ptresult_1' => 
  array (
    'name' => 'meetings_j_ptresult_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'meetings_j_ptresult_1' => 
      array (
        'lhs_module' => 'Meetings',
        'lhs_table' => 'meetings',
        'lhs_key' => 'id',
        'rhs_module' => 'J_PTResult',
        'rhs_table' => 'j_ptresult',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'meetings_j_ptresult_1_c',
        'join_key_lhs' => 'meetings_j_ptresult_1meetings_ida',
        'join_key_rhs' => 'meetings_j_ptresult_1j_ptresult_idb',
      ),
    ),
    'table' => 'meetings_j_ptresult_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'meetings_j_ptresult_1meetings_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'meetings_j_ptresult_1j_ptresult_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'meetings_j_ptresult_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'meetings_j_ptresult_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'meetings_j_ptresult_1meetings_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'meetings_j_ptresult_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'meetings_j_ptresult_1j_ptresult_idb',
        ),
      ),
    ),
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'meetings_j_ptresult_1_c',
    'join_key_lhs' => 'meetings_j_ptresult_1meetings_ida',
    'join_key_rhs' => 'meetings_j_ptresult_1j_ptresult_idb',
  ),
  'bc_survey_prospects' => 
  array (
    'name' => 'bc_survey_prospects',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'bc_survey_prospects' => 
      array (
        'lhs_module' => 'bc_survey',
        'lhs_table' => 'bc_survey',
        'lhs_key' => 'id',
        'rhs_module' => 'Prospects',
        'rhs_table' => 'prospects',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_prospects_c',
        'join_key_lhs' => 'bc_survey_prospectsbc_survey_ida',
        'join_key_rhs' => 'bc_survey_prospectsprospects_idb',
      ),
    ),
    'table' => 'bc_survey_prospects_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_prospectsbc_survey_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_prospectsprospects_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_prospectsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_prospects_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_prospectsbc_survey_ida',
          1 => 'bc_survey_prospectsprospects_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey',
    'lhs_table' => 'bc_survey',
    'lhs_key' => 'id',
    'rhs_module' => 'Prospects',
    'rhs_table' => 'prospects',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_prospects_c',
    'join_key_lhs' => 'bc_survey_prospectsbc_survey_ida',
    'join_key_rhs' => 'bc_survey_prospectsprospects_idb',
  ),
  'opportunities_meetings_1' => 
  array (
    'name' => 'opportunities_meetings_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'opportunities_meetings_1' => 
      array (
        'lhs_module' => 'Opportunities',
        'lhs_table' => 'opportunities',
        'lhs_key' => 'id',
        'rhs_module' => 'Meetings',
        'rhs_table' => 'meetings',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'opportunities_meetings_1_c',
        'join_key_lhs' => 'opportunities_meetings_1opportunities_ida',
        'join_key_rhs' => 'opportunities_meetings_1meetings_idb',
      ),
    ),
    'table' => 'opportunities_meetings_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'opportunities_meetings_1opportunities_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'opportunities_meetings_1meetings_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'opportunities_meetings_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'opportunities_meetings_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'opportunities_meetings_1opportunities_ida',
          1 => 'opportunities_meetings_1meetings_idb',
        ),
      ),
    ),
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'opportunities_meetings_1_c',
    'join_key_lhs' => 'opportunities_meetings_1opportunities_ida',
    'join_key_rhs' => 'opportunities_meetings_1meetings_idb',
  ),
  'j_ptresult_c_sms' => 
  array (
    'name' => 'j_ptresult_c_sms',
    'relationships' => 
    array (
      'j_ptresult_c_sms' => 
      array (
        'lhs_module' => 'J_PTResult',
        'lhs_table' => 'j_ptresult',
        'lhs_key' => 'id',
        'rhs_module' => 'C_SMS',
        'rhs_table' => 'c_sms',
        'rhs_key' => 'parent_id',
        'relationship_type' => 'one-to-many',
        'relationship_role_column' => 'parent_type',
        'relationship_role_column_value' => 'J_PTResult',
      ),
    ),
    'fields' => '',
    'indices' => '',
    'table' => '',
    'lhs_module' => 'J_PTResult',
    'lhs_table' => 'j_ptresult',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'J_PTResult',
  ),
  'bc_survey_automizer_bc_automizer_actions' => 
  array (
    'name' => 'bc_survey_automizer_bc_automizer_actions',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_automizer_bc_automizer_actions' => 
      array (
        'lhs_module' => 'bc_survey_automizer',
        'lhs_table' => 'bc_survey_automizer',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_automizer_actions',
        'rhs_table' => 'bc_automizer_actions',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_automizer_bc_automizer_actions_c',
        'join_key_lhs' => 'bc_survey_automizer_bc_automizer_actionsbc_survey_automizer_ida',
        'join_key_rhs' => 'bc_survey_automizer_bc_automizer_actionsbc_automizer_actions_idb',
      ),
    ),
    'table' => 'bc_survey_automizer_bc_automizer_actions_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_automizer_bc_automizer_actionsbc_survey_automizer_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_automizer_bc_automizer_actionsbc_automizer_actions_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_automizer_bc_automizer_actionsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_automizer_bc_automizer_actions_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_automizer_bc_automizer_actionsbc_survey_automizer_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_automizer_bc_automizer_actions_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_automizer_bc_automizer_actionsbc_automizer_actions_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_automizer',
    'lhs_table' => 'bc_survey_automizer',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_automizer_actions',
    'rhs_table' => 'bc_automizer_actions',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_automizer_bc_automizer_actions_c',
    'join_key_lhs' => 'bc_survey_automizer_bc_automizer_actionsbc_survey_automizer_ida',
    'join_key_rhs' => 'bc_survey_automizer_bc_automizer_actionsbc_automizer_actions_idb',
  ),
  'bc_survey_template_bc_survey_questions' => 
  array (
    'name' => 'bc_survey_template_bc_survey_questions',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_template_bc_survey_questions' => 
      array (
        'lhs_module' => 'bc_survey_template',
        'lhs_table' => 'bc_survey_template',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_questions',
        'rhs_table' => 'bc_survey_questions',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_template_bc_survey_questions_c',
        'join_key_lhs' => 'bc_survey_template_bc_survey_questionsbc_survey_template_ida',
        'join_key_rhs' => 'bc_survey_template_bc_survey_questionsbc_survey_questions_idb',
      ),
    ),
    'table' => 'bc_survey_template_bc_survey_questions_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_template_bc_survey_questionsbc_survey_template_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_template_bc_survey_questionsbc_survey_questions_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_template_bc_survey_questionsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_template_bc_survey_questions_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_template_bc_survey_questionsbc_survey_template_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_template_bc_survey_questions_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_template_bc_survey_questionsbc_survey_questions_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_template',
    'lhs_table' => 'bc_survey_template',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_questions',
    'rhs_table' => 'bc_survey_questions',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_template_bc_survey_questions_c',
    'join_key_lhs' => 'bc_survey_template_bc_survey_questionsbc_survey_template_ida',
    'join_key_rhs' => 'bc_survey_template_bc_survey_questionsbc_survey_questions_idb',
  ),
  'c_memberships_contacts_2' => 
  array (
    'name' => 'c_memberships_contacts_2',
    'true_relationship_type' => 'one-to-one',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_memberships_contacts_2' => 
      array (
        'lhs_module' => 'C_Memberships',
        'lhs_table' => 'c_memberships',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_memberships_contacts_2_c',
        'join_key_lhs' => 'c_memberships_contacts_2c_memberships_ida',
        'join_key_rhs' => 'c_memberships_contacts_2contacts_idb',
      ),
    ),
    'table' => 'c_memberships_contacts_2_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_memberships_contacts_2c_memberships_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_memberships_contacts_2contacts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_memberships_contacts_2spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_memberships_contacts_2_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_memberships_contacts_2c_memberships_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_memberships_contacts_2_idb2',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_memberships_contacts_2contacts_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Memberships',
    'lhs_table' => 'c_memberships',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_memberships_contacts_2_c',
    'join_key_lhs' => 'c_memberships_contacts_2c_memberships_ida',
    'join_key_rhs' => 'c_memberships_contacts_2contacts_idb',
  ),
  'lead_c_sms' => 
  array (
    'name' => 'lead_c_sms',
    'relationships' => 
    array (
      'lead_c_sms' => 
      array (
        'lhs_module' => 'Leads',
        'lhs_table' => 'leads',
        'lhs_key' => 'id',
        'rhs_module' => 'C_SMS',
        'rhs_table' => 'c_sms',
        'rhs_key' => 'parent_id',
        'relationship_type' => 'one-to-many',
        'relationship_role_column' => 'parent_type',
        'relationship_role_column_value' => 'Leads',
      ),
    ),
    'fields' => '',
    'indices' => '',
    'table' => '',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Leads',
  ),
  'contacts_j_ptresult_1' => 
  array (
    'name' => 'contacts_j_ptresult_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contacts_j_ptresult_1' => 
      array (
        'lhs_module' => 'Contacts',
        'lhs_table' => 'contacts',
        'lhs_key' => 'id',
        'rhs_module' => 'J_PTResult',
        'rhs_table' => 'j_ptresult',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contacts_j_ptresult_1_c',
        'join_key_lhs' => 'contacts_j_ptresult_1contacts_ida',
        'join_key_rhs' => 'contacts_j_ptresult_1j_ptresult_idb',
      ),
    ),
    'table' => 'contacts_j_ptresult_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contacts_j_ptresult_1contacts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contacts_j_ptresult_1j_ptresult_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contacts_j_ptresult_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contacts_j_ptresult_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'contacts_j_ptresult_1contacts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'contacts_j_ptresult_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contacts_j_ptresult_1j_ptresult_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contacts_j_ptresult_1_c',
    'join_key_lhs' => 'contacts_j_ptresult_1contacts_ida',
    'join_key_rhs' => 'contacts_j_ptresult_1j_ptresult_idb',
  ),
  'bc_survey_submission_leads' => 
  array (
    'name' => 'bc_survey_submission_leads',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_submission_leads' => 
      array (
        'lhs_module' => 'Leads',
        'lhs_table' => 'leads',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_submission',
        'rhs_table' => 'bc_survey_submission',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_submission_leads_c',
        'join_key_lhs' => 'bc_survey_submission_leadsleads_ida',
        'join_key_rhs' => 'bc_survey_submission_leadsbc_survey_submission_idb',
      ),
    ),
    'table' => 'bc_survey_submission_leads_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_submission_leadsleads_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_submission_leadsbc_survey_submission_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_submission_leadsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_submission_leads_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_submission_leadsleads_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_submission_leads_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_submission_leadsbc_survey_submission_idb',
        ),
      ),
    ),
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_submission_leads_c',
    'join_key_lhs' => 'bc_survey_submission_leadsleads_ida',
    'join_key_rhs' => 'bc_survey_submission_leadsbc_survey_submission_idb',
  ),
  'contracts_j_class_1' => 
  array (
    'name' => 'contracts_j_class_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'contracts_j_class_1' => 
      array (
        'lhs_module' => 'Contracts',
        'lhs_table' => 'contracts',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Class',
        'rhs_table' => 'j_class',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'contracts_j_class_1_c',
        'join_key_lhs' => 'contracts_j_class_1contracts_ida',
        'join_key_rhs' => 'contracts_j_class_1j_class_idb',
      ),
    ),
    'table' => 'contracts_j_class_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'contracts_j_class_1contracts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'contracts_j_class_1j_class_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'contracts_j_class_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'contracts_j_class_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'contracts_j_class_1contracts_ida',
          1 => 'contracts_j_class_1j_class_idb',
        ),
      ),
    ),
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'contracts_j_class_1_c',
    'join_key_lhs' => 'contracts_j_class_1contracts_ida',
    'join_key_rhs' => 'contracts_j_class_1j_class_idb',
  ),
  'c_memberships_leads_1' => 
  array (
    'name' => 'c_memberships_leads_1',
    'true_relationship_type' => 'one-to-one',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_memberships_leads_1' => 
      array (
        'lhs_module' => 'C_Memberships',
        'lhs_table' => 'c_memberships',
        'lhs_key' => 'id',
        'rhs_module' => 'Leads',
        'rhs_table' => 'leads',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_memberships_leads_1_c',
        'join_key_lhs' => 'c_memberships_leads_1c_memberships_ida',
        'join_key_rhs' => 'c_memberships_leads_1leads_idb',
      ),
    ),
    'table' => 'c_memberships_leads_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_memberships_leads_1c_memberships_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_memberships_leads_1leads_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_memberships_leads_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_memberships_leads_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_memberships_leads_1c_memberships_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_memberships_leads_1_idb2',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_memberships_leads_1leads_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Memberships',
    'lhs_table' => 'c_memberships',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_memberships_leads_1_c',
    'join_key_lhs' => 'c_memberships_leads_1c_memberships_ida',
    'join_key_rhs' => 'c_memberships_leads_1leads_idb',
  ),
  'j_school_leads_1' => 
  array (
    'name' => 'j_school_leads_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_school_leads_1' => 
      array (
        'lhs_module' => 'J_School',
        'lhs_table' => 'j_school',
        'lhs_key' => 'id',
        'rhs_module' => 'Leads',
        'rhs_table' => 'leads',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_school_leads_1_c',
        'join_key_lhs' => 'j_school_leads_1j_school_ida',
        'join_key_rhs' => 'j_school_leads_1leads_idb',
      ),
    ),
    'table' => 'j_school_leads_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_school_leads_1j_school_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_school_leads_1leads_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_school_leads_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_school_leads_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_school_leads_1j_school_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_school_leads_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_school_leads_1leads_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_School',
    'lhs_table' => 'j_school',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_school_leads_1_c',
    'join_key_lhs' => 'j_school_leads_1j_school_ida',
    'join_key_rhs' => 'j_school_leads_1leads_idb',
  ),
  'users_j_feedback_2' => 
  array (
    'name' => 'users_j_feedback_2',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'users_j_feedback_2' => 
      array (
        'lhs_module' => 'Users',
        'lhs_table' => 'users',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Feedback',
        'rhs_table' => 'j_feedback',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'users_j_feedback_2_c',
        'join_key_lhs' => 'users_j_feedback_2users_ida',
        'join_key_rhs' => 'users_j_feedback_2j_feedback_idb',
      ),
    ),
    'table' => 'users_j_feedback_2_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'users_j_feedback_2users_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'users_j_feedback_2j_feedback_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'users_j_feedback_2spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'users_j_feedback_2_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'users_j_feedback_2users_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'users_j_feedback_2_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'users_j_feedback_2j_feedback_idb',
        ),
      ),
    ),
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'users_j_feedback_2_c',
    'join_key_lhs' => 'users_j_feedback_2users_ida',
    'join_key_rhs' => 'users_j_feedback_2j_feedback_idb',
  ),
  'bc_survey_bc_survey_template' => 
  array (
    'name' => 'bc_survey_bc_survey_template',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_bc_survey_template' => 
      array (
        'lhs_module' => 'bc_survey_template',
        'lhs_table' => 'bc_survey_template',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey',
        'rhs_table' => 'bc_survey',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_bc_survey_template_c',
        'join_key_lhs' => 'bc_survey_bc_survey_templatebc_survey_template_ida',
        'join_key_rhs' => 'bc_survey_bc_survey_templatebc_survey_idb',
      ),
    ),
    'table' => 'bc_survey_bc_survey_template_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_bc_survey_templatebc_survey_template_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_bc_survey_templatebc_survey_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_bc_survey_templatespk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_bc_survey_template_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_bc_survey_templatebc_survey_template_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_bc_survey_template_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_bc_survey_templatebc_survey_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_template',
    'lhs_table' => 'bc_survey_template',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey',
    'rhs_table' => 'bc_survey',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_bc_survey_template_c',
    'join_key_lhs' => 'bc_survey_bc_survey_templatebc_survey_template_ida',
    'join_key_rhs' => 'bc_survey_bc_survey_templatebc_survey_idb',
  ),
  'bc_survey_contacts' => 
  array (
    'name' => 'bc_survey_contacts',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'bc_survey_contacts' => 
      array (
        'lhs_module' => 'bc_survey',
        'lhs_table' => 'bc_survey',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_contacts_c',
        'join_key_lhs' => 'bc_survey_contactsbc_survey_ida',
        'join_key_rhs' => 'bc_survey_contactscontacts_idb',
      ),
    ),
    'table' => 'bc_survey_contacts_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_contactsbc_survey_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_contactscontacts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_contactsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_contacts_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_contactsbc_survey_ida',
          1 => 'bc_survey_contactscontacts_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey',
    'lhs_table' => 'bc_survey',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_contacts_c',
    'join_key_lhs' => 'bc_survey_contactsbc_survey_ida',
    'join_key_rhs' => 'bc_survey_contactscontacts_idb',
  ),
  'bc_survey_answers_bc_survey_questions' => 
  array (
    'name' => 'bc_survey_answers_bc_survey_questions',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_answers_bc_survey_questions' => 
      array (
        'lhs_module' => 'bc_survey_questions',
        'lhs_table' => 'bc_survey_questions',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_answers',
        'rhs_table' => 'bc_survey_answers',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_answers_bc_survey_questions_c',
        'join_key_lhs' => 'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida',
        'join_key_rhs' => 'bc_survey_answers_bc_survey_questionsbc_survey_answers_idb',
      ),
    ),
    'table' => 'bc_survey_answers_bc_survey_questions_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_answers_bc_survey_questionsbc_survey_answers_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_answers_bc_survey_questionsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_answers_bc_survey_questions_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_answers_bc_survey_questions_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_answers_bc_survey_questionsbc_survey_answers_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_questions',
    'lhs_table' => 'bc_survey_questions',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_answers',
    'rhs_table' => 'bc_survey_answers',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_answers_bc_survey_questions_c',
    'join_key_lhs' => 'bc_survey_answers_bc_survey_questionsbc_survey_questions_ida',
    'join_key_rhs' => 'bc_survey_answers_bc_survey_questionsbc_survey_answers_idb',
  ),
  'c_payments_c_refunds_1' => 
  array (
    'name' => 'c_payments_c_refunds_1',
    'true_relationship_type' => 'one-to-one',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_payments_c_refunds_1' => 
      array (
        'lhs_module' => 'C_Payments',
        'lhs_table' => 'c_payments',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Refunds',
        'rhs_table' => 'c_refunds',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_payments_c_refunds_1_c',
        'join_key_lhs' => 'c_payments_c_refunds_1c_payments_ida',
        'join_key_rhs' => 'c_payments_c_refunds_1c_refunds_idb',
      ),
    ),
    'table' => 'c_payments_c_refunds_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_payments_c_refunds_1c_payments_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_payments_c_refunds_1c_refunds_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_payments_c_refunds_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_payments_c_refunds_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_payments_c_refunds_1c_payments_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_payments_c_refunds_1_idb2',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_payments_c_refunds_1c_refunds_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Payments',
    'lhs_table' => 'c_payments',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Refunds',
    'rhs_table' => 'c_refunds',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_payments_c_refunds_1_c',
    'join_key_lhs' => 'c_payments_c_refunds_1c_payments_ida',
    'join_key_rhs' => 'c_payments_c_refunds_1c_refunds_idb',
  ),
  'leads_j_ptresult_1' => 
  array (
    'name' => 'leads_j_ptresult_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'leads_j_ptresult_1' => 
      array (
        'lhs_module' => 'Leads',
        'lhs_table' => 'leads',
        'lhs_key' => 'id',
        'rhs_module' => 'J_PTResult',
        'rhs_table' => 'j_ptresult',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'leads_j_ptresult_1_c',
        'join_key_lhs' => 'leads_j_ptresult_1leads_ida',
        'join_key_rhs' => 'leads_j_ptresult_1j_ptresult_idb',
      ),
    ),
    'table' => 'leads_j_ptresult_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'leads_j_ptresult_1leads_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'leads_j_ptresult_1j_ptresult_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'leads_j_ptresult_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'leads_j_ptresult_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'leads_j_ptresult_1leads_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'leads_j_ptresult_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'leads_j_ptresult_1j_ptresult_idb',
        ),
      ),
    ),
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'leads_j_ptresult_1_c',
    'join_key_lhs' => 'leads_j_ptresult_1leads_ida',
    'join_key_rhs' => 'leads_j_ptresult_1j_ptresult_idb',
  ),
  'j_school_contacts_1' => 
  array (
    'name' => 'j_school_contacts_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_school_contacts_1' => 
      array (
        'lhs_module' => 'J_School',
        'lhs_table' => 'j_school',
        'lhs_key' => 'id',
        'rhs_module' => 'Contacts',
        'rhs_table' => 'contacts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_school_contacts_1_c',
        'join_key_lhs' => 'j_school_contacts_1j_school_ida',
        'join_key_rhs' => 'j_school_contacts_1contacts_idb',
      ),
    ),
    'table' => 'j_school_contacts_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_school_contacts_1j_school_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_school_contacts_1contacts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_school_contacts_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_school_contacts_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_school_contacts_1j_school_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_school_contacts_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_school_contacts_1contacts_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_School',
    'lhs_table' => 'j_school',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_school_contacts_1_c',
    'join_key_lhs' => 'j_school_contacts_1j_school_ida',
    'join_key_rhs' => 'j_school_contacts_1contacts_idb',
  ),
  'bc_survey_submission_prospects' => 
  array (
    'name' => 'bc_survey_submission_prospects',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_submission_prospects' => 
      array (
        'lhs_module' => 'Prospects',
        'lhs_table' => 'prospects',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_submission',
        'rhs_table' => 'bc_survey_submission',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_submission_prospects_c',
        'join_key_lhs' => 'bc_survey_submission_prospectsprospects_ida',
        'join_key_rhs' => 'bc_survey_submission_prospectsbc_survey_submission_idb',
      ),
    ),
    'table' => 'bc_survey_submission_prospects_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_submission_prospectsprospects_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_submission_prospectsbc_survey_submission_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_submission_prospectsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_submission_prospects_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_submission_prospectsprospects_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_submission_prospects_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_submission_prospectsbc_survey_submission_idb',
        ),
      ),
    ),
    'lhs_module' => 'Prospects',
    'lhs_table' => 'prospects',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_submission_prospects_c',
    'join_key_lhs' => 'bc_survey_submission_prospectsprospects_ida',
    'join_key_rhs' => 'bc_survey_submission_prospectsbc_survey_submission_idb',
  ),
  'bc_survey_bc_survey_questions' => 
  array (
    'name' => 'bc_survey_bc_survey_questions',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_survey_bc_survey_questions' => 
      array (
        'lhs_module' => 'bc_survey',
        'lhs_table' => 'bc_survey',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_survey_questions',
        'rhs_table' => 'bc_survey_questions',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_bc_survey_questions_c',
        'join_key_lhs' => 'bc_survey_bc_survey_questionsbc_survey_ida',
        'join_key_rhs' => 'bc_survey_bc_survey_questionsbc_survey_questions_idb',
      ),
    ),
    'table' => 'bc_survey_bc_survey_questions_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_bc_survey_questionsbc_survey_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_bc_survey_questionsbc_survey_questions_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_bc_survey_questionsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_bc_survey_questions_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_survey_bc_survey_questionsbc_survey_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_survey_bc_survey_questions_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_bc_survey_questionsbc_survey_questions_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey',
    'lhs_table' => 'bc_survey',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_questions',
    'rhs_table' => 'bc_survey_questions',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_bc_survey_questions_c',
    'join_key_lhs' => 'bc_survey_bc_survey_questionsbc_survey_ida',
    'join_key_rhs' => 'bc_survey_bc_survey_questionsbc_survey_questions_idb',
  ),
  'c_classes_c_teachers_1' => 
  array (
    'name' => 'c_classes_c_teachers_1',
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_classes_c_teachers_1' => 
      array (
        'lhs_module' => 'C_Classes',
        'lhs_table' => 'c_classes',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Teachers',
        'rhs_table' => 'c_teachers',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_classes_c_teachers_1_c',
        'join_key_lhs' => 'c_classes_c_teachers_1c_classes_ida',
        'join_key_rhs' => 'c_classes_c_teachers_1c_teachers_idb',
      ),
    ),
    'table' => 'c_classes_c_teachers_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_classes_c_teachers_1c_classes_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_classes_c_teachers_1c_teachers_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_classes_c_teachers_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_classes_c_teachers_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_classes_c_teachers_1c_classes_ida',
          1 => 'c_classes_c_teachers_1c_teachers_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Classes',
    'lhs_table' => 'c_classes',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Teachers',
    'rhs_table' => 'c_teachers',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_classes_c_teachers_1_c',
    'join_key_lhs' => 'c_classes_c_teachers_1c_classes_ida',
    'join_key_rhs' => 'c_classes_c_teachers_1c_teachers_idb',
  ),
  'bc_submission_data_bc_survey_questions' => 
  array (
    'name' => 'bc_submission_data_bc_survey_questions',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_submission_data_bc_survey_questions' => 
      array (
        'lhs_module' => 'bc_survey_questions',
        'lhs_table' => 'bc_survey_questions',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_submission_data',
        'rhs_table' => 'bc_submission_data',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_submission_data_bc_survey_questions_c',
        'join_key_lhs' => 'bc_submission_data_bc_survey_questionsbc_survey_questions_ida',
        'join_key_rhs' => 'bc_submission_data_bc_survey_questionsbc_submission_data_idb',
      ),
    ),
    'table' => 'bc_submission_data_bc_survey_questions_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_submission_data_bc_survey_questionsbc_survey_questions_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_submission_data_bc_survey_questionsbc_submission_data_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_submission_data_bc_survey_questionsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_submission_data_bc_survey_questions_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_submission_data_bc_survey_questionsbc_survey_questions_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_submission_data_bc_survey_questions_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_submission_data_bc_survey_questionsbc_submission_data_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_questions',
    'lhs_table' => 'bc_survey_questions',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_submission_data',
    'rhs_table' => 'bc_submission_data',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_submission_data_bc_survey_questions_c',
    'join_key_lhs' => 'bc_submission_data_bc_survey_questionsbc_survey_questions_ida',
    'join_key_rhs' => 'bc_submission_data_bc_survey_questionsbc_submission_data_idb',
  ),
  'j_school_prospects_1' => 
  array (
    'name' => 'j_school_prospects_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_school_prospects_1' => 
      array (
        'lhs_module' => 'J_School',
        'lhs_table' => 'j_school',
        'lhs_key' => 'id',
        'rhs_module' => 'Prospects',
        'rhs_table' => 'prospects',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_school_prospects_1_c',
        'join_key_lhs' => 'j_school_prospects_1j_school_ida',
        'join_key_rhs' => 'j_school_prospects_1prospects_idb',
      ),
    ),
    'table' => 'j_school_prospects_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_school_prospects_1j_school_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_school_prospects_1prospects_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_school_prospects_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_school_prospects_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_school_prospects_1j_school_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_school_prospects_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_school_prospects_1prospects_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_School',
    'lhs_table' => 'j_school',
    'lhs_key' => 'id',
    'rhs_module' => 'Prospects',
    'rhs_table' => 'prospects',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_school_prospects_1_c',
    'join_key_lhs' => 'j_school_prospects_1j_school_ida',
    'join_key_rhs' => 'j_school_prospects_1prospects_idb',
  ),
  'c_teachers_j_teachercontract_1' => 
  array (
    'name' => 'c_teachers_j_teachercontract_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_teachers_j_teachercontract_1' => 
      array (
        'lhs_module' => 'C_Teachers',
        'lhs_table' => 'c_teachers',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Teachercontract',
        'rhs_table' => 'j_teachercontract',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_teachers_j_teachercontract_1_c',
        'join_key_lhs' => 'c_teachers_j_teachercontract_1c_teachers_ida',
        'join_key_rhs' => 'c_teachers_j_teachercontract_1j_teachercontract_idb',
      ),
    ),
    'table' => 'c_teachers_j_teachercontract_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_teachers_j_teachercontract_1c_teachers_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_teachers_j_teachercontract_1j_teachercontract_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_teachers_j_teachercontract_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_teachers_j_teachercontract_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_teachers_j_teachercontract_1c_teachers_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_teachers_j_teachercontract_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_teachers_j_teachercontract_1j_teachercontract_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Teachercontract',
    'rhs_table' => 'j_teachercontract',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_teachers_j_teachercontract_1_c',
    'join_key_lhs' => 'c_teachers_j_teachercontract_1c_teachers_ida',
    'join_key_rhs' => 'c_teachers_j_teachercontract_1j_teachercontract_idb',
  ),
  'c_programs_c_packages_1' => 
  array (
    'name' => 'c_programs_c_packages_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_programs_c_packages_1' => 
      array (
        'lhs_module' => 'C_Programs',
        'lhs_table' => 'c_programs',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Packages',
        'rhs_table' => 'c_packages',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_programs_c_packages_1_c',
        'join_key_lhs' => 'c_programs_c_packages_1c_programs_ida',
        'join_key_rhs' => 'c_programs_c_packages_1c_packages_idb',
      ),
    ),
    'table' => 'c_programs_c_packages_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_programs_c_packages_1c_programs_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_programs_c_packages_1c_packages_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_programs_c_packages_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_programs_c_packages_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_programs_c_packages_1c_programs_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_programs_c_packages_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_programs_c_packages_1c_packages_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Programs',
    'lhs_table' => 'c_programs',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_programs_c_packages_1_c',
    'join_key_lhs' => 'c_programs_c_packages_1c_programs_ida',
    'join_key_rhs' => 'c_programs_c_packages_1c_packages_idb',
  ),
  'accounts_c_invoices_1' => 
  array (
    'name' => 'accounts_c_invoices_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'accounts_c_invoices_1' => 
      array (
        'lhs_module' => 'Accounts',
        'lhs_table' => 'accounts',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Invoices',
        'rhs_table' => 'c_invoices',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'accounts_c_invoices_1_c',
        'join_key_lhs' => 'accounts_c_invoices_1accounts_ida',
        'join_key_rhs' => 'accounts_c_invoices_1c_invoices_idb',
      ),
    ),
    'table' => 'accounts_c_invoices_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'accounts_c_invoices_1accounts_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'accounts_c_invoices_1c_invoices_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'accounts_c_invoices_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'accounts_c_invoices_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'accounts_c_invoices_1accounts_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'accounts_c_invoices_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'accounts_c_invoices_1c_invoices_idb',
        ),
      ),
    ),
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Invoices',
    'rhs_table' => 'c_invoices',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'accounts_c_invoices_1_c',
    'join_key_lhs' => 'accounts_c_invoices_1accounts_ida',
    'join_key_rhs' => 'accounts_c_invoices_1c_invoices_idb',
  ),
  'c_invoices_c_payments_1' => 
  array (
    'name' => 'c_invoices_c_payments_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'c_invoices_c_payments_1' => 
      array (
        'lhs_module' => 'C_Invoices',
        'lhs_table' => 'c_invoices',
        'lhs_key' => 'id',
        'rhs_module' => 'C_Payments',
        'rhs_table' => 'c_payments',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'c_invoices_c_payments_1_c',
        'join_key_lhs' => 'c_invoices_c_payments_1c_invoices_ida',
        'join_key_rhs' => 'c_invoices_c_payments_1c_payments_idb',
      ),
    ),
    'table' => 'c_invoices_c_payments_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'c_invoices_c_payments_1c_invoices_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'c_invoices_c_payments_1c_payments_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'c_invoices_c_payments_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'c_invoices_c_payments_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'c_invoices_c_payments_1c_invoices_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'c_invoices_c_payments_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'c_invoices_c_payments_1c_payments_idb',
        ),
      ),
    ),
    'lhs_module' => 'C_Invoices',
    'lhs_table' => 'c_invoices',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'c_invoices_c_payments_1_c',
    'join_key_lhs' => 'c_invoices_c_payments_1c_invoices_ida',
    'join_key_rhs' => 'c_invoices_c_payments_1c_payments_idb',
  ),
  'bc_submission_data_bc_survey_submission' => 
  array (
    'name' => 'bc_submission_data_bc_survey_submission',
    'true_relationship_type' => 'one-to-many',
    'relationships' => 
    array (
      'bc_submission_data_bc_survey_submission' => 
      array (
        'lhs_module' => 'bc_survey_submission',
        'lhs_table' => 'bc_survey_submission',
        'lhs_key' => 'id',
        'rhs_module' => 'bc_submission_data',
        'rhs_table' => 'bc_submission_data',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_submission_data_bc_survey_submission_c',
        'join_key_lhs' => 'bc_submission_data_bc_survey_submissionbc_survey_submission_ida',
        'join_key_rhs' => 'bc_submission_data_bc_survey_submissionbc_submission_data_idb',
      ),
    ),
    'table' => 'bc_submission_data_bc_survey_submission_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_submission_data_bc_survey_submissionbc_survey_submission_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_submission_data_bc_survey_submissionbc_submission_data_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_submission_data_bc_survey_submissionspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_submission_data_bc_survey_submission_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'bc_submission_data_bc_survey_submissionbc_survey_submission_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'bc_submission_data_bc_survey_submission_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_submission_data_bc_survey_submissionbc_submission_data_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey_submission',
    'lhs_table' => 'bc_survey_submission',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_submission_data',
    'rhs_table' => 'bc_submission_data',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_submission_data_bc_survey_submission_c',
    'join_key_lhs' => 'bc_submission_data_bc_survey_submissionbc_survey_submission_ida',
    'join_key_rhs' => 'bc_submission_data_bc_survey_submissionbc_submission_data_idb',
  ),
  'j_partnership_j_payment_1' => 
  array (
    'name' => 'j_partnership_j_payment_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'j_partnership_j_payment_1' => 
      array (
        'lhs_module' => 'J_Partnership',
        'lhs_table' => 'j_partnership',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Payment',
        'rhs_table' => 'j_payment',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'j_partnership_j_payment_1_c',
        'join_key_lhs' => 'j_partnership_j_payment_1j_partnership_ida',
        'join_key_rhs' => 'j_partnership_j_payment_1j_payment_idb',
      ),
    ),
    'table' => 'j_partnership_j_payment_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'j_partnership_j_payment_1j_partnership_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'j_partnership_j_payment_1j_payment_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'j_partnership_j_payment_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'j_partnership_j_payment_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'j_partnership_j_payment_1j_partnership_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'j_partnership_j_payment_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'j_partnership_j_payment_1j_payment_idb',
        ),
      ),
    ),
    'lhs_module' => 'J_Partnership',
    'lhs_table' => 'j_partnership',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'j_partnership_j_payment_1_c',
    'join_key_lhs' => 'j_partnership_j_payment_1j_partnership_ida',
    'join_key_rhs' => 'j_partnership_j_payment_1j_payment_idb',
  ),
  'users_j_feedback_1' => 
  array (
    'name' => 'users_j_feedback_1',
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' => 
    array (
      'users_j_feedback_1' => 
      array (
        'lhs_module' => 'Users',
        'lhs_table' => 'users',
        'lhs_key' => 'id',
        'rhs_module' => 'J_Feedback',
        'rhs_table' => 'j_feedback',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'users_j_feedback_1_c',
        'join_key_lhs' => 'users_j_feedback_1users_ida',
        'join_key_rhs' => 'users_j_feedback_1j_feedback_idb',
      ),
    ),
    'table' => 'users_j_feedback_1_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'users_j_feedback_1users_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'users_j_feedback_1j_feedback_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'users_j_feedback_1spk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'users_j_feedback_1_ida1',
        'type' => 'index',
        'fields' => 
        array (
          0 => 'users_j_feedback_1users_ida',
        ),
      ),
      2 => 
      array (
        'name' => 'users_j_feedback_1_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'users_j_feedback_1j_feedback_idb',
        ),
      ),
    ),
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'users_j_feedback_1_c',
    'join_key_lhs' => 'users_j_feedback_1users_ida',
    'join_key_rhs' => 'users_j_feedback_1j_feedback_idb',
  ),
  'c_teachers_c_sms' => 
  array (
    'name' => 'c_teachers_c_sms',
    'relationships' => 
    array (
      'c_teachers_c_sms' => 
      array (
        'lhs_module' => 'C_Teachers',
        'lhs_table' => 'c_teachers',
        'lhs_key' => 'id',
        'rhs_module' => 'C_SMS',
        'rhs_table' => 'c_sms',
        'rhs_key' => 'parent_id',
        'relationship_type' => 'one-to-many',
        'relationship_role_column' => 'parent_type',
        'relationship_role_column_value' => 'C_Teachers',
      ),
    ),
    'fields' => '',
    'indices' => '',
    'table' => '',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'C_Teachers',
  ),
  'bc_survey_accounts' => 
  array (
    'name' => 'bc_survey_accounts',
    'true_relationship_type' => 'many-to-many',
    'relationships' => 
    array (
      'bc_survey_accounts' => 
      array (
        'lhs_module' => 'bc_survey',
        'lhs_table' => 'bc_survey',
        'lhs_key' => 'id',
        'rhs_module' => 'Accounts',
        'rhs_table' => 'accounts',
        'rhs_key' => 'id',
        'relationship_type' => 'many-to-many',
        'join_table' => 'bc_survey_accounts_c',
        'join_key_lhs' => 'bc_survey_accountsbc_survey_ida',
        'join_key_rhs' => 'bc_survey_accountsaccounts_idb',
      ),
    ),
    'table' => 'bc_survey_accounts_c',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'varchar',
        'len' => 36,
      ),
      1 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      2 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '1',
        'default' => '0',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bc_survey_accountsbc_survey_ida',
        'type' => 'varchar',
        'len' => 36,
      ),
      4 => 
      array (
        'name' => 'bc_survey_accountsaccounts_idb',
        'type' => 'varchar',
        'len' => 36,
      ),
    ),
    'indices' => 
    array (
      0 => 
      array (
        'name' => 'bc_survey_accountsspk',
        'type' => 'primary',
        'fields' => 
        array (
          0 => 'id',
        ),
      ),
      1 => 
      array (
        'name' => 'bc_survey_accounts_alt',
        'type' => 'alternate_key',
        'fields' => 
        array (
          0 => 'bc_survey_accountsbc_survey_ida',
          1 => 'bc_survey_accountsaccounts_idb',
        ),
      ),
    ),
    'lhs_module' => 'bc_survey',
    'lhs_table' => 'bc_survey',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'bc_survey_accounts_c',
    'join_key_lhs' => 'bc_survey_accountsbc_survey_ida',
    'join_key_rhs' => 'bc_survey_accountsaccounts_idb',
  ),
  'user_direct_reports' => 
  array (
    'name' => 'user_direct_reports',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'reports_to_id',
    'relationship_type' => 'one-to-many',
  ),
  'users_users_signatures' => 
  array (
    'name' => 'users_users_signatures',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'UserSignature',
    'rhs_table' => 'users_signatures',
    'rhs_key' => 'user_id',
    'relationship_type' => 'one-to-many',
  ),
  'users_email_addresses' => 
  array (
    'name' => 'users_email_addresses',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailAddresses',
    'rhs_table' => 'email_addresses',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'email_addr_bean_rel',
    'join_key_lhs' => 'bean_id',
    'join_key_rhs' => 'email_address_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Users',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'users_email_addresses_primary' => 
  array (
    'name' => 'users_email_addresses_primary',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
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
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'users_team_count_relationship' => 
  array (
    'name' => 'users_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'users_teams' => 
  array (
    'name' => 'users_teams',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'users_forecasts' => 
  array (
    'name' => 'users_forecasts',
    'rhs_module' => 'Forecasts',
    'rhs_table' => 'forecasts',
    'rhs_key' => 'user_id',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'forecast_type',
    'relationship_role_column_value' => 'Rollup',
  ),
  'users_quotas' => 
  array (
    'name' => 'users_quotas',
    'rhs_module' => 'Quotas',
    'rhs_table' => 'quotas',
    'rhs_key' => 'user_id',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'quota_type',
    'relationship_role_column_value' => 'Direct',
  ),
  'users_worksheets' => 
  array (
    'name' => 'users_worksheets',
    'rhs_module' => 'Worksheet',
    'rhs_table' => 'worksheet',
    'rhs_key' => 'related_id',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'related_forecast_type',
    'relationship_role_column_value' => 'Direct',
  ),
  'users_team_sets' => 
  array (
    'name' => 'users_team_sets',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_id',
    'join_key_rhs' => 'team_set_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'users_team' => 
  array (
    'name' => 'users_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'default_team',
    'relationship_type' => 'one-to-many',
  ),
  'team_teams' => 
  array (
    'name' => 'team_teams',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'leads_modified_user' => 
  array (
    'name' => 'leads_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'leads_created_by' => 
  array (
    'name' => 'leads_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'leads_assigned_user' => 
  array (
    'name' => 'leads_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'leads_team_count_relationship' => 
  array (
    'name' => 'leads_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'leads_teams' => 
  array (
    'name' => 'leads_teams',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'leads_team' => 
  array (
    'name' => 'leads_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'leads_email_addresses' => 
  array (
    'name' => 'leads_email_addresses',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailAddresses',
    'rhs_table' => 'email_addresses',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'email_addr_bean_rel',
    'join_key_lhs' => 'bean_id',
    'join_key_rhs' => 'email_address_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Leads',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'leads_email_addresses_primary' => 
  array (
    'name' => 'leads_email_addresses_primary',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
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
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'lead_direct_reports' => 
  array (
    'name' => 'lead_direct_reports',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'reports_to_id',
    'relationship_type' => 'one-to-many',
  ),
  'lead_tasks' => 
  array (
    'name' => 'lead_tasks',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Leads',
  ),
  'lead_notes' => 
  array (
    'name' => 'lead_notes',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Leads',
  ),
  'lead_meetings' => 
  array (
    'name' => 'lead_meetings',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Leads',
  ),
  'lead_calls' => 
  array (
    'name' => 'lead_calls',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Leads',
  ),
  'lead_emails' => 
  array (
    'name' => 'lead_emails',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Leads',
  ),
  'lead_campaign_log' => 
  array (
    'name' => 'lead_campaign_log',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'CampaignLog',
    'rhs_table' => 'campaign_log',
    'rhs_key' => 'target_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'target_type',
    'relationship_role_column_value' => 'Leads',
  ),
  'lead_revenue' => 
  array (
    'name' => 'lead_revenue',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'lead_id',
    'relationship_type' => 'one-to-many',
  ),
  'lead_forward' => 
  array (
    'name' => 'lead_forward',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'lead_id',
    'relationship_type' => 'one-to-many',
  ),
  'lead_smses' => 
  array (
    'name' => 'lead_smses',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'lead_studentsituations' => 
  array (
    'name' => 'lead_studentsituations',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'lead_id',
    'relationship_type' => 'one-to-many',
  ),
  'lead_payments' => 
  array (
    'name' => 'lead_payments',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'lead_id',
    'relationship_type' => 'one-to-many',
  ),
  'cases_modified_user' => 
  array (
    'name' => 'cases_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'cases_created_by' => 
  array (
    'name' => 'cases_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'cases_assigned_user' => 
  array (
    'name' => 'cases_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'cases_team_count_relationship' => 
  array (
    'name' => 'cases_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'cases_teams' => 
  array (
    'name' => 'cases_teams',
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'cases_team' => 
  array (
    'name' => 'cases_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'case_calls' => 
  array (
    'name' => 'case_calls',
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Cases',
  ),
  'case_tasks' => 
  array (
    'name' => 'case_tasks',
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Cases',
  ),
  'case_notes' => 
  array (
    'name' => 'case_notes',
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Cases',
  ),
  'case_meetings' => 
  array (
    'name' => 'case_meetings',
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Cases',
  ),
  'case_emails' => 
  array (
    'name' => 'case_emails',
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Cases',
  ),
  'bugs_modified_user' => 
  array (
    'name' => 'bugs_modified_user',
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
    'name' => 'bugs_created_by',
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
    'name' => 'bugs_assigned_user',
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
    'name' => 'bugs_team_count_relationship',
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
    'name' => 'bugs_teams',
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
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'bugs_team' => 
  array (
    'name' => 'bugs_team',
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
    'name' => 'bug_tasks',
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
    'name' => 'bug_meetings',
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
    'name' => 'bug_calls',
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
    'name' => 'bug_emails',
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
    'name' => 'bug_notes',
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
    'name' => 'bugs_release',
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
    'name' => 'bugs_fixed_in_release',
    'lhs_module' => 'Releases',
    'lhs_table' => 'releases',
    'lhs_key' => 'id',
    'rhs_module' => 'Bugs',
    'rhs_table' => 'bugs',
    'rhs_key' => 'fixed_in_release',
    'relationship_type' => 'one-to-many',
  ),
  'prospectlists_assigned_user' => 
  array (
    'name' => 'prospectlists_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'prospectlists',
    'rhs_table' => 'prospect_lists',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'prospectlists_team_count_relationship' => 
  array (
    'name' => 'prospectlists_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'ProspectLists',
    'rhs_table' => 'prospect_lists',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'prospectlists_teams' => 
  array (
    'name' => 'prospectlists_teams',
    'lhs_module' => 'ProspectLists',
    'lhs_table' => 'prospect_lists',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'prospectlists_team' => 
  array (
    'name' => 'prospectlists_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'ProspectLists',
    'rhs_table' => 'prospect_lists',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'prospects_modified_user' => 
  array (
    'name' => 'prospects_modified_user',
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
    'name' => 'prospects_created_by',
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
    'name' => 'prospects_assigned_user',
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
    'name' => 'prospects_team_count_relationship',
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
    'name' => 'prospects_teams',
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
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'prospects_team' => 
  array (
    'name' => 'prospects_team',
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
    'name' => 'prospects_email_addresses',
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
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'prospects_email_addresses_primary' => 
  array (
    'name' => 'prospects_email_addresses_primary',
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
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'prospect_tasks' => 
  array (
    'name' => 'prospect_tasks',
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
    'name' => 'prospect_notes',
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
    'name' => 'prospect_meetings',
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
    'name' => 'prospect_calls',
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
    'name' => 'prospect_emails',
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
    'name' => 'prospect_campaign_log',
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
  'project_team_count_relationship' => 
  array (
    'name' => 'project_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Project',
    'rhs_table' => 'project',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'project_teams' => 
  array (
    'name' => 'project_teams',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'project_team' => 
  array (
    'name' => 'project_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Project',
    'rhs_table' => 'project',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'projects_notes' => 
  array (
    'name' => 'projects_notes',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Project',
  ),
  'projects_tasks' => 
  array (
    'name' => 'projects_tasks',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Project',
  ),
  'projects_meetings' => 
  array (
    'name' => 'projects_meetings',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Project',
  ),
  'projects_calls' => 
  array (
    'name' => 'projects_calls',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Project',
  ),
  'projects_emails' => 
  array (
    'name' => 'projects_emails',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Project',
  ),
  'projects_project_tasks' => 
  array (
    'name' => 'projects_project_tasks',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'ProjectTask',
    'rhs_table' => 'project_task',
    'rhs_key' => 'project_id',
    'relationship_type' => 'one-to-many',
  ),
  'projects_assigned_user' => 
  array (
    'name' => 'projects_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Project',
    'rhs_table' => 'project',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'projects_modified_user' => 
  array (
    'name' => 'projects_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Project',
    'rhs_table' => 'project',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'projects_created_by' => 
  array (
    'name' => 'projects_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Project',
    'rhs_table' => 'project',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'projects_users_resources' => 
  array (
    'name' => 'projects_users_resources',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'project_resources',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'resource_id',
    'relationship_role_column' => 'resource_type',
    'relationship_role_column_value' => 'Users',
  ),
  'projects_contacts_resources' => 
  array (
    'name' => 'projects_contacts_resources',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'project_resources',
    'join_key_lhs' => 'project_id',
    'join_key_rhs' => 'resource_id',
    'relationship_role_column' => 'resource_type',
    'relationship_role_column_value' => 'Contacts',
  ),
  'projects_holidays' => 
  array (
    'name' => 'projects_holidays',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Holidays',
    'rhs_table' => 'holidays',
    'rhs_key' => 'related_module_id',
    'relationship_type' => 'one-to-many',
  ),
  'projecttask_team_count_relationship' => 
  array (
    'name' => 'projecttask_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'ProjectTask',
    'rhs_table' => 'project_task',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'projecttask_teams' => 
  array (
    'name' => 'projecttask_teams',
    'lhs_module' => 'ProjectTask',
    'lhs_table' => 'project_task',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'projecttask_team' => 
  array (
    'name' => 'projecttask_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'ProjectTask',
    'rhs_table' => 'project_task',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'project_tasks_notes' => 
  array (
    'name' => 'project_tasks_notes',
    'lhs_module' => 'ProjectTask',
    'lhs_table' => 'project_task',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'ProjectTask',
  ),
  'project_tasks_tasks' => 
  array (
    'name' => 'project_tasks_tasks',
    'lhs_module' => 'ProjectTask',
    'lhs_table' => 'project_task',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'ProjectTask',
  ),
  'project_tasks_meetings' => 
  array (
    'name' => 'project_tasks_meetings',
    'lhs_module' => 'ProjectTask',
    'lhs_table' => 'project_task',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'ProjectTask',
  ),
  'project_tasks_calls' => 
  array (
    'name' => 'project_tasks_calls',
    'lhs_module' => 'ProjectTask',
    'lhs_table' => 'project_task',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'ProjectTask',
  ),
  'project_tasks_emails' => 
  array (
    'name' => 'project_tasks_emails',
    'lhs_module' => 'ProjectTask',
    'lhs_table' => 'project_task',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'ProjectTask',
  ),
  'project_tasks_assigned_user' => 
  array (
    'name' => 'project_tasks_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ProjectTask',
    'rhs_table' => 'project_task',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'project_tasks_modified_user' => 
  array (
    'name' => 'project_tasks_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ProjectTask',
    'rhs_table' => 'project_task',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'project_tasks_created_by' => 
  array (
    'name' => 'project_tasks_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ProjectTask',
    'rhs_table' => 'project_task',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'campaigns_modified_user' => 
  array (
    'name' => 'campaigns_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaigns_created_by' => 
  array (
    'name' => 'campaigns_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'campaigns_assigned_user' => 
  array (
    'name' => 'campaigns_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaigns_team_count_relationship' => 
  array (
    'name' => 'campaigns_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaigns_teams' => 
  array (
    'name' => 'campaigns_teams',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'campaigns_team' => 
  array (
    'name' => 'campaigns_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_accounts' => 
  array (
    'name' => 'campaign_accounts',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_contacts' => 
  array (
    'name' => 'campaign_contacts',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_leads' => 
  array (
    'name' => 'campaign_leads',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_prospects' => 
  array (
    'name' => 'campaign_prospects',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'Prospects',
    'rhs_table' => 'prospects',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_opportunities' => 
  array (
    'name' => 'campaign_opportunities',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_email_marketing' => 
  array (
    'name' => 'campaign_email_marketing',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailMarketing',
    'rhs_table' => 'email_marketing',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_emailman' => 
  array (
    'name' => 'campaign_emailman',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailMan',
    'rhs_table' => 'emailman',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_campaignlog' => 
  array (
    'name' => 'campaign_campaignlog',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'CampaignLog',
    'rhs_table' => 'campaign_log',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_assigned_user' => 
  array (
    'name' => 'campaign_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_modified_user' => 
  array (
    'name' => 'campaign_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_sponsors' => 
  array (
    'name' => 'campaign_sponsors',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Sponsors',
    'rhs_table' => 'c_sponsors',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'email_template_email_marketings' => 
  array (
    'name' => 'email_template_email_marketings',
    'lhs_module' => 'EmailTemplates',
    'lhs_table' => 'email_templates',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailMarketing',
    'rhs_table' => 'email_marketing',
    'rhs_key' => 'template_id',
    'relationship_type' => 'one-to-many',
  ),
  'campaignlog_contact' => 
  array (
    'name' => 'campaignlog_contact',
    'lhs_module' => 'CampaignLog',
    'lhs_table' => 'campaign_log',
    'lhs_key' => 'related_id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'one-to-many',
  ),
  'campaignlog_lead' => 
  array (
    'name' => 'campaignlog_lead',
    'lhs_module' => 'CampaignLog',
    'lhs_table' => 'campaign_log',
    'lhs_key' => 'related_id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'relationship_type' => 'one-to-many',
  ),
  'campaignlog_created_opportunities' => 
  array (
    'name' => 'campaignlog_created_opportunities',
    'lhs_module' => 'CampaignLog',
    'lhs_table' => 'campaign_log',
    'lhs_key' => 'related_id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'relationship_type' => 'one-to-many',
  ),
  'campaignlog_targeted_users' => 
  array (
    'name' => 'campaignlog_targeted_users',
    'lhs_module' => 'CampaignLog',
    'lhs_table' => 'campaign_log',
    'lhs_key' => 'target_id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'one-to-many',
  ),
  'campaignlog_sent_emails' => 
  array (
    'name' => 'campaignlog_sent_emails',
    'lhs_module' => 'CampaignLog',
    'lhs_table' => 'campaign_log',
    'lhs_key' => 'related_id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'id',
    'relationship_type' => 'one-to-many',
  ),
  'campaign_campaigntrakers' => 
  array (
    'name' => 'campaign_campaigntrakers',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'CampaignTrackers',
    'rhs_table' => 'campaign_trkrs',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'schedulers_modified_user' => 
  array (
    'name' => 'schedulers_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Schedulers',
    'rhs_table' => 'schedulers',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'schedulers_created_by' => 
  array (
    'name' => 'schedulers_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Schedulers',
    'rhs_table' => 'schedulers',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'schedulers_created_by_rel' => 
  array (
    'name' => 'schedulers_created_by_rel',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Schedulers',
    'rhs_table' => 'schedulers',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-one',
  ),
  'schedulers_modified_user_id_rel' => 
  array (
    'name' => 'schedulers_modified_user_id_rel',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Schedulers',
    'rhs_table' => 'schedulers',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'schedulers_jobs_rel' => 
  array (
    'name' => 'schedulers_jobs_rel',
    'lhs_module' => 'Schedulers',
    'lhs_table' => 'schedulers',
    'lhs_key' => 'id',
    'rhs_module' => 'SchedulersJobs',
    'rhs_table' => 'job_queue',
    'rhs_key' => 'scheduler_id',
    'relationship_type' => 'one-to-many',
  ),
  'schedulersjobs_assigned_user' => 
  array (
    'name' => 'schedulersjobs_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'SchedulersJobs',
    'rhs_table' => 'schedulersjobs',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'contacts_modified_user' => 
  array (
    'name' => 'contacts_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'contacts_created_by' => 
  array (
    'name' => 'contacts_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'contacts_assigned_user' => 
  array (
    'name' => 'contacts_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'contacts_team_count_relationship' => 
  array (
    'name' => 'contacts_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'contacts_teams' => 
  array (
    'name' => 'contacts_teams',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'contacts_team' => 
  array (
    'name' => 'contacts_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'contacts_email_addresses' => 
  array (
    'name' => 'contacts_email_addresses',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailAddresses',
    'rhs_table' => 'email_addresses',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'email_addr_bean_rel',
    'join_key_lhs' => 'bean_id',
    'join_key_rhs' => 'email_address_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Contacts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'contacts_email_addresses_primary' => 
  array (
    'name' => 'contacts_email_addresses_primary',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
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
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'contact_direct_reports' => 
  array (
    'name' => 'contact_direct_reports',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'reports_to_id',
    'relationship_type' => 'one-to-many',
  ),
  'contact_leads' => 
  array (
    'name' => 'contact_leads',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'contact_id',
    'relationship_type' => 'one-to-many',
  ),
  'contact_notes' => 
  array (
    'name' => 'contact_notes',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'contact_id',
    'relationship_type' => 'one-to-many',
  ),
  'contact_tasks' => 
  array (
    'name' => 'contact_tasks',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'contact_id',
    'relationship_type' => 'one-to-many',
  ),
  'contact_tasks_parent' => 
  array (
    'name' => 'contact_tasks_parent',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Contacts',
  ),
  'contact_products' => 
  array (
    'name' => 'contact_products',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'contact_id',
    'relationship_type' => 'one-to-many',
  ),
  'contact_campaign_log' => 
  array (
    'name' => 'contact_campaign_log',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'CampaignLog',
    'rhs_table' => 'campaign_log',
    'rhs_key' => 'target_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'target_type',
    'relationship_role_column_value' => 'Contacts',
  ),
  'student_attendances' => 
  array (
    'name' => 'student_attendances',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Attendance',
    'rhs_table' => 'c_attendance',
    'rhs_key' => 'student_id',
    'relationship_type' => 'one-to-many',
  ),
  'student_revenue' => 
  array (
    'name' => 'student_revenue',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'student_id',
    'relationship_type' => 'one-to-many',
  ),
  'student_forward' => 
  array (
    'name' => 'student_forward',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'student_id',
    'relationship_type' => 'one-to-many',
  ),
  'contact_studentsituations' => 
  array (
    'name' => 'contact_studentsituations',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'student_id',
    'relationship_type' => 'one-to-many',
  ),
  'contact_vouchers' => 
  array (
    'name' => 'contact_vouchers',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Voucher',
    'rhs_table' => 'j_voucher',
    'rhs_key' => 'student_id',
    'relationship_type' => 'one-to-many',
  ),
  'contact_smses' => 
  array (
    'name' => 'contact_smses',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'student_j_inventory' => 
  array (
    'name' => 'student_j_inventory',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'to_corp_id',
    'relationship_type' => 'one-to-many',
  ),
  'student_j_gradebookdetail' => 
  array (
    'name' => 'student_j_gradebookdetail',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookDetail',
    'rhs_table' => 'j_gradebookdetail',
    'rhs_key' => 'student_id',
    'relationship_type' => 'one-to-many',
  ),
  'accounts_modified_user' => 
  array (
    'name' => 'accounts_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'accounts_created_by' => 
  array (
    'name' => 'accounts_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'accounts_assigned_user' => 
  array (
    'name' => 'accounts_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'accounts_team_count_relationship' => 
  array (
    'name' => 'accounts_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'accounts_teams' => 
  array (
    'name' => 'accounts_teams',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'accounts_team' => 
  array (
    'name' => 'accounts_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'accounts_email_addresses' => 
  array (
    'name' => 'accounts_email_addresses',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailAddresses',
    'rhs_table' => 'email_addresses',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'email_addr_bean_rel',
    'join_key_lhs' => 'bean_id',
    'join_key_rhs' => 'email_address_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'Accounts',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'accounts_email_addresses_primary' => 
  array (
    'name' => 'accounts_email_addresses_primary',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
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
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'member_accounts' => 
  array (
    'name' => 'member_accounts',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'account_cases' => 
  array (
    'name' => 'account_cases',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Cases',
    'rhs_table' => 'cases',
    'rhs_key' => 'account_id',
    'relationship_type' => 'one-to-many',
  ),
  'account_tasks' => 
  array (
    'name' => 'account_tasks',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Accounts',
  ),
  'account_notes' => 
  array (
    'name' => 'account_notes',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Accounts',
  ),
  'account_meetings' => 
  array (
    'name' => 'account_meetings',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Accounts',
  ),
  'account_calls' => 
  array (
    'name' => 'account_calls',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Accounts',
  ),
  'account_emails' => 
  array (
    'name' => 'account_emails',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Accounts',
  ),
  'account_leads' => 
  array (
    'name' => 'account_leads',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'account_id',
    'relationship_type' => 'one-to-many',
  ),
  'account_campaign_log' => 
  array (
    'name' => 'account_campaign_log',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'CampaignLog',
    'rhs_table' => 'campaign_log',
    'rhs_key' => 'target_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'target_type',
    'relationship_role_column_value' => 'Accounts',
  ),
  'supplier_j_inventory' => 
  array (
    'name' => 'supplier_j_inventory',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'from_supplier_id',
    'relationship_type' => 'one-to-many',
  ),
  'corp_j_inventory' => 
  array (
    'name' => 'corp_j_inventory',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'to_corp_id',
    'relationship_type' => 'one-to-many',
  ),
  'account_payments' => 
  array (
    'name' => 'account_payments',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'account_id',
    'relationship_type' => 'one-to-many',
  ),
  'opportunities_modified_user' => 
  array (
    'name' => 'opportunities_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'opportunities_created_by' => 
  array (
    'name' => 'opportunities_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'opportunities_assigned_user' => 
  array (
    'name' => 'opportunities_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'opportunities_team_count_relationship' => 
  array (
    'name' => 'opportunities_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'opportunities_teams' => 
  array (
    'name' => 'opportunities_teams',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'opportunities_team' => 
  array (
    'name' => 'opportunities_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'opportunity_calls' => 
  array (
    'name' => 'opportunity_calls',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Opportunities',
  ),
  'opportunity_meetings' => 
  array (
    'name' => 'opportunity_meetings',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Opportunities',
  ),
  'opportunity_tasks' => 
  array (
    'name' => 'opportunity_tasks',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Opportunities',
  ),
  'opportunity_notes' => 
  array (
    'name' => 'opportunity_notes',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Opportunities',
  ),
  'opportunity_emails' => 
  array (
    'name' => 'opportunity_emails',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Opportunities',
  ),
  'opportunity_leads' => 
  array (
    'name' => 'opportunity_leads',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'opportunity_id',
    'relationship_type' => 'one-to-many',
  ),
  'opportunity_currencies' => 
  array (
    'name' => 'opportunity_currencies',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'currency_id',
    'rhs_module' => 'Currencies',
    'rhs_table' => 'currencies',
    'rhs_key' => 'id',
    'relationship_type' => 'one-to-many',
  ),
  'opportunities_campaign' => 
  array (
    'name' => 'opportunities_campaign',
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
  ),
  'opportunities_products' => 
  array (
    'name' => 'opportunities_products',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'opportunity_id',
    'relationship_type' => 'one-to-many',
  ),
  'enrollment_delivery' => 
  array (
    'name' => 'enrollment_delivery',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'enrollment_id',
    'relationship_type' => 'one-to-many',
  ),
  'enrollment_carry' => 
  array (
    'name' => 'enrollment_carry',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'enrollment_id',
    'relationship_type' => 'one-to-many',
  ),
  'emailtemplates_team_count_relationship' => 
  array (
    'name' => 'emailtemplates_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailTemplates',
    'rhs_table' => 'email_templates',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'emailtemplates_teams' => 
  array (
    'name' => 'emailtemplates_teams',
    'lhs_module' => 'EmailTemplates',
    'lhs_table' => 'email_templates',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'emailtemplates_team' => 
  array (
    'name' => 'emailtemplates_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailTemplates',
    'rhs_table' => 'email_templates',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'emailtemplates_assigned_user' => 
  array (
    'name' => 'emailtemplates_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailTemplates',
    'rhs_table' => 'email_templates',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'emailtemplate_sms' => 
  array (
    'name' => 'emailtemplate_sms',
    'lhs_module' => 'EmailTemplates',
    'lhs_table' => 'email_templates',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'template_id',
    'relationship_type' => 'one-to-many',
  ),
  'notes_assigned_user' => 
  array (
    'name' => 'notes_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'notes_team_count_relationship' => 
  array (
    'name' => 'notes_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'notes_teams' => 
  array (
    'name' => 'notes_teams',
    'lhs_module' => 'Notes',
    'lhs_table' => 'notes',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'notes_team' => 
  array (
    'name' => 'notes_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'notes_modified_user' => 
  array (
    'name' => 'notes_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'notes_created_by' => 
  array (
    'name' => 'notes_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'calls_modified_user' => 
  array (
    'name' => 'calls_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'calls_created_by' => 
  array (
    'name' => 'calls_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'calls_assigned_user' => 
  array (
    'name' => 'calls_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'calls_team_count_relationship' => 
  array (
    'name' => 'calls_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'calls_teams' => 
  array (
    'name' => 'calls_teams',
    'lhs_module' => 'Calls',
    'lhs_table' => 'calls',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'calls_team' => 
  array (
    'name' => 'calls_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'calls_notes' => 
  array (
    'name' => 'calls_notes',
    'lhs_module' => 'Calls',
    'lhs_table' => 'calls',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Calls',
  ),
  'emails_team_count_relationship' => 
  array (
    'name' => 'emails_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'emails_teams' => 
  array (
    'name' => 'emails_teams',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'emails_team' => 
  array (
    'name' => 'emails_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'emails_assigned_user' => 
  array (
    'name' => 'emails_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'emails_modified_user' => 
  array (
    'name' => 'emails_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'emails_created_by' => 
  array (
    'name' => 'emails_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'emails_notes_rel' => 
  array (
    'name' => 'emails_notes_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'emails_meetings_rel' => 
  array (
    'name' => 'emails_meetings_rel',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'meetings_modified_user' => 
  array (
    'name' => 'meetings_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'meetings_created_by' => 
  array (
    'name' => 'meetings_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'meetings_assigned_user' => 
  array (
    'name' => 'meetings_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'meetings_team_count_relationship' => 
  array (
    'name' => 'meetings_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'meetings_teams' => 
  array (
    'name' => 'meetings_teams',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'meetings_team' => 
  array (
    'name' => 'meetings_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'meetings_notes' => 
  array (
    'name' => 'meetings_notes',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Meetings',
  ),
  'meeting_attendances' => 
  array (
    'name' => 'meeting_attendances',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Attendance',
    'rhs_table' => 'c_attendance',
    'rhs_key' => 'meeting_id',
    'relationship_type' => 'one-to-many',
  ),
  'session_revenue' => 
  array (
    'name' => 'session_revenue',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'session_id',
    'relationship_type' => 'one-to-many',
  ),
  'tasks_modified_user' => 
  array (
    'name' => 'tasks_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'tasks_created_by' => 
  array (
    'name' => 'tasks_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'tasks_assigned_user' => 
  array (
    'name' => 'tasks_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'tasks_team_count_relationship' => 
  array (
    'name' => 'tasks_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'tasks_teams' => 
  array (
    'name' => 'tasks_teams',
    'lhs_module' => 'Tasks',
    'lhs_table' => 'tasks',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'tasks_team' => 
  array (
    'name' => 'tasks_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'tasks_notes' => 
  array (
    'name' => 'tasks_notes',
    'lhs_module' => 'Tasks',
    'lhs_table' => 'tasks',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'tracker_monitor_id' => 
  array (
    'name' => 'tracker_monitor_id',
    'lhs_module' => 'TrackerPerfs',
    'lhs_table' => 'tracker_perf',
    'lhs_key' => 'monitor_id',
    'rhs_module' => 'Trackers',
    'rhs_table' => 'tracker',
    'rhs_key' => 'monitor_id',
    'relationship_type' => 'one-to-one',
  ),
  'documents_modified_user' => 
  array (
    'name' => 'documents_modified_user',
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
    'name' => 'documents_created_by',
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
    'name' => 'documents_assigned_user',
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
    'name' => 'documents_team_count_relationship',
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
    'name' => 'documents_teams',
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
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'documents_team' => 
  array (
    'name' => 'documents_team',
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
    'name' => 'document_revisions',
    'lhs_module' => 'Documents',
    'lhs_table' => 'documents',
    'lhs_key' => 'id',
    'rhs_module' => 'DocumentRevisions',
    'rhs_table' => 'document_revisions',
    'rhs_key' => 'document_id',
    'relationship_type' => 'one-to-many',
  ),
  'revisions_created_by' => 
  array (
    'name' => 'revisions_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'DocumentRevisions',
    'rhs_table' => 'document_revisions',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'inboundemail_team_count_relationship' => 
  array (
    'name' => 'inboundemail_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'InboundEmail',
    'rhs_table' => 'inbound_email',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'inboundemail_teams' => 
  array (
    'name' => 'inboundemail_teams',
    'lhs_module' => 'InboundEmail',
    'lhs_table' => 'inbound_email',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'inboundemail_team' => 
  array (
    'name' => 'inboundemail_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'InboundEmail',
    'rhs_table' => 'inbound_email',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'inbound_email_created_by' => 
  array (
    'name' => 'inbound_email_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'InboundEmail',
    'rhs_table' => 'inbound_email',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-one',
  ),
  'inbound_email_modified_user_id' => 
  array (
    'name' => 'inbound_email_modified_user_id',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'InboundEmail',
    'rhs_table' => 'inbound_email',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-one',
  ),
  'savedsearch_team_count_relationship' => 
  array (
    'name' => 'savedsearch_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'SavedSearch',
    'rhs_table' => 'saved_search',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'savedsearch_teams' => 
  array (
    'name' => 'savedsearch_teams',
    'lhs_module' => 'SavedSearch',
    'lhs_table' => 'saved_search',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'savedsearch_team' => 
  array (
    'name' => 'savedsearch_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'SavedSearch',
    'rhs_table' => 'saved_search',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'saved_search_assigned_user' => 
  array (
    'name' => 'saved_search_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'SavedSearch',
    'rhs_table' => 'saved_search',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'reports_team_count_relationship' => 
  array (
    'name' => 'reports_team_count_relationship',
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
    'name' => 'reports_teams',
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
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'reports_team' => 
  array (
    'name' => 'reports_team',
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
    'name' => 'report_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Reports',
    'rhs_table' => 'saved_reports',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'team_memberships' => 
  array (
    'name' => 'team_memberships',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_memberships',
    'join_key_lhs' => 'team_id',
    'join_key_rhs' => 'user_id',
  ),
  'teamfrom_j_inventory' => 
  array (
    'name' => 'teamfrom_j_inventory',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'from_team_id',
    'relationship_type' => 'one-to-many',
  ),
  'teamto_j_inventory' => 
  array (
    'name' => 'teamto_j_inventory',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'to_team_id',
    'relationship_type' => 'one-to-many',
  ),
  'quotes_modified_user' => 
  array (
    'name' => 'quotes_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'quotes_created_by' => 
  array (
    'name' => 'quotes_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'quotes_assigned_user' => 
  array (
    'name' => 'quotes_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'quotes_team_count_relationship' => 
  array (
    'name' => 'quotes_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'quotes_teams' => 
  array (
    'name' => 'quotes_teams',
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'quotes_team' => 
  array (
    'name' => 'quotes_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'quote_tasks' => 
  array (
    'name' => 'quote_tasks',
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Tasks',
    'rhs_table' => 'tasks',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Quotes',
  ),
  'quote_notes' => 
  array (
    'name' => 'quote_notes',
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Quotes',
  ),
  'quote_meetings' => 
  array (
    'name' => 'quote_meetings',
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Quotes',
  ),
  'quote_calls' => 
  array (
    'name' => 'quote_calls',
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Quotes',
  ),
  'quote_emails' => 
  array (
    'name' => 'quote_emails',
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Emails',
    'rhs_table' => 'emails',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Quotes',
  ),
  'quote_products' => 
  array (
    'name' => 'quote_products',
    'lhs_module' => 'Quotes',
    'lhs_table' => 'quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'quote_id',
    'relationship_type' => 'one-to-many',
  ),
  'products_modified_user' => 
  array (
    'name' => 'products_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'products_created_by' => 
  array (
    'name' => 'products_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'products_team_count_relationship' => 
  array (
    'name' => 'products_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'products_teams' => 
  array (
    'name' => 'products_teams',
    'lhs_module' => 'Products',
    'lhs_table' => 'products',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'products_team' => 
  array (
    'name' => 'products_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'product_notes' => 
  array (
    'name' => 'product_notes',
    'lhs_module' => 'Products',
    'lhs_table' => 'products',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Products',
  ),
  'products_accounts' => 
  array (
    'name' => 'products_accounts',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'account_id',
    'relationship_type' => 'one-to-many',
  ),
  'product_categories' => 
  array (
    'name' => 'product_categories',
    'lhs_module' => 'ProductCategories',
    'lhs_table' => 'product_categories',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'category_id',
    'relationship_type' => 'one-to-many',
  ),
  'product_types' => 
  array (
    'name' => 'product_types',
    'lhs_module' => 'ProductTypes',
    'lhs_table' => 'product_types',
    'lhs_key' => 'id',
    'rhs_module' => 'Products',
    'rhs_table' => 'products',
    'rhs_key' => 'type_id',
    'relationship_type' => 'one-to-many',
  ),
  'products_worksheet' => 
  array (
    'name' => 'products_worksheet',
    'lhs_module' => 'Products',
    'lhs_table' => 'products',
    'lhs_key' => 'id',
    'rhs_module' => 'Worksheet',
    'rhs_table' => 'worksheet',
    'rhs_key' => 'related_id',
    'relationship_type' => 'one-to-many',
  ),
  'productbundles_team_count_relationship' => 
  array (
    'name' => 'productbundles_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductBundles',
    'rhs_table' => 'product_bundles',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'productbundles_teams' => 
  array (
    'name' => 'productbundles_teams',
    'lhs_module' => 'ProductBundles',
    'lhs_table' => 'product_bundles',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'productbundles_team' => 
  array (
    'name' => 'productbundles_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductBundles',
    'rhs_table' => 'product_bundles',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'product_templates_product_categories' => 
  array (
    'name' => 'product_templates_product_categories',
    'lhs_module' => 'ProductCategories',
    'lhs_table' => 'product_categories',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductTemplates',
    'rhs_table' => 'product_templates',
    'rhs_key' => 'category_id',
    'relationship_type' => 'one-to-many',
  ),
  'product_templates_product_types' => 
  array (
    'name' => 'product_templates_product_types',
    'lhs_module' => 'ProductTypes',
    'lhs_table' => 'product_types',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductTemplates',
    'rhs_table' => 'product_templates',
    'rhs_key' => 'type_id',
    'relationship_type' => 'one-to-many',
  ),
  'product_templates_manufacturers' => 
  array (
    'name' => 'product_templates_manufacturers',
    'lhs_module' => 'Manufacturers',
    'lhs_table' => 'manufacturers',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductTemplates',
    'rhs_table' => 'product_templates',
    'rhs_key' => 'manufacturer_id',
    'relationship_type' => 'one-to-many',
  ),
  'product_templates_modified_user' => 
  array (
    'name' => 'product_templates_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductTemplates',
    'rhs_table' => 'product_templates',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'product_templates_created_by' => 
  array (
    'name' => 'product_templates_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductTemplates',
    'rhs_table' => 'product_templates',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'inventoryline_book' => 
  array (
    'name' => 'inventoryline_book',
    'lhs_module' => 'ProductTemplate',
    'lhs_table' => 'product_templates',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventorydetail',
    'rhs_table' => 'j_inventorydetail',
    'rhs_key' => 'book_id',
    'relationship_type' => 'one-to-many',
  ),
  'member_categories' => 
  array (
    'name' => 'member_categories',
    'lhs_module' => 'ProductCategories',
    'lhs_table' => 'product_categories',
    'lhs_key' => 'id',
    'rhs_module' => 'ProductCategories',
    'rhs_table' => 'product_categories',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'shipper_quotes' => 
  array (
    'name' => 'shipper_quotes',
    'lhs_module' => 'Shippers',
    'lhs_table' => 'shippers',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'shipper_id',
    'relationship_type' => 'one-to-many',
  ),
  'teamnotices_team_count_relationship' => 
  array (
    'name' => 'teamnotices_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'TeamNotices',
    'rhs_table' => 'team_notices',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'teamnotices_teams' => 
  array (
    'name' => 'teamnotices_teams',
    'lhs_module' => 'TeamNotices',
    'lhs_table' => 'team_notices',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'teamnotices_team' => 
  array (
    'name' => 'teamnotices_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'TeamNotices',
    'rhs_table' => 'team_notices',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'timeperiod_forecast_schedules' => 
  array (
    'name' => 'timeperiod_forecast_schedules',
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
    'name' => 'related_timeperiods',
    'lhs_module' => 'TimePeriods',
    'lhs_table' => 'timeperiods',
    'lhs_key' => 'id',
    'rhs_module' => 'TimePeriods',
    'rhs_table' => 'timeperiods',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecasts_created_by' => 
  array (
    'name' => 'forecasts_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Forecasts',
    'rhs_table' => 'forecasts',
    'rhs_key' => 'user_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecastworksheets_modified_user' => 
  array (
    'name' => 'forecastworksheets_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastWorksheets',
    'rhs_table' => 'forecastworksheets',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecastworksheets_created_by' => 
  array (
    'name' => 'forecastworksheets_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastWorksheets',
    'rhs_table' => 'forecastworksheets',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'forecastworksheets_assigned_user' => 
  array (
    'name' => 'forecastworksheets_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastWorksheets',
    'rhs_table' => 'forecastworksheets',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecastworksheets_team_count_relationship' => 
  array (
    'name' => 'forecastworksheets_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastWorksheets',
    'rhs_table' => 'forecast_worksheets',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecastworksheets_teams' => 
  array (
    'name' => 'forecastworksheets_teams',
    'lhs_module' => 'ForecastWorksheets',
    'lhs_table' => 'forecast_worksheets',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'forecastworksheets_team' => 
  array (
    'name' => 'forecastworksheets_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastWorksheets',
    'rhs_table' => 'forecast_worksheets',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecastmanagerworksheets_modified_user' => 
  array (
    'name' => 'forecastmanagerworksheets_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastManagerWorksheets',
    'rhs_table' => 'forecastmanagerworksheets',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecastmanagerworksheets_created_by' => 
  array (
    'name' => 'forecastmanagerworksheets_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastManagerWorksheets',
    'rhs_table' => 'forecastmanagerworksheets',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'forecastmanagerworksheets_assigned_user' => 
  array (
    'name' => 'forecastmanagerworksheets_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastManagerWorksheets',
    'rhs_table' => 'forecastmanagerworksheets',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecastmanagerworksheets_team_count_relationship' => 
  array (
    'name' => 'forecastmanagerworksheets_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastManagerWorksheets',
    'rhs_table' => 'forecast_manager_worksheets',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'forecastmanagerworksheets_teams' => 
  array (
    'name' => 'forecastmanagerworksheets_teams',
    'lhs_module' => 'ForecastManagerWorksheets',
    'lhs_table' => 'forecast_manager_worksheets',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'forecastmanagerworksheets_team' => 
  array (
    'name' => 'forecastmanagerworksheets_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'ForecastManagerWorksheets',
    'rhs_table' => 'forecast_manager_worksheets',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'workflow_triggers' => 
  array (
    'name' => 'workflow_triggers',
    'lhs_module' => 'WorkFlow',
    'lhs_table' => 'workflow',
    'lhs_key' => 'id',
    'rhs_module' => 'WorkFlowTriggerShells',
    'rhs_table' => 'workflow_triggershells',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'frame_type',
    'relationship_role_column_value' => 'Primary',
    'relationship_type' => 'one-to-many',
  ),
  'workflow_trigger_filters' => 
  array (
    'name' => 'workflow_trigger_filters',
    'lhs_module' => 'WorkFlow',
    'lhs_table' => 'workflow',
    'lhs_key' => 'id',
    'rhs_module' => 'WorkFlowTriggerShells',
    'rhs_table' => 'workflow_triggershells',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'frame_type',
    'relationship_role_column_value' => 'Secondary',
    'relationship_type' => 'one-to-many',
  ),
  'workflow_alerts' => 
  array (
    'name' => 'workflow_alerts',
    'lhs_module' => 'WorkFlow',
    'lhs_table' => 'workflow',
    'lhs_key' => 'id',
    'rhs_module' => 'WorkFlowAlertShells',
    'rhs_table' => 'workflow_alertshells',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'workflow_actions' => 
  array (
    'name' => 'workflow_actions',
    'lhs_module' => 'WorkFlow',
    'lhs_table' => 'workflow',
    'lhs_key' => 'id',
    'rhs_module' => 'WorkFlowActionShells',
    'rhs_table' => 'workflow_actionshells',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'past_triggers' => 
  array (
    'name' => 'past_triggers',
    'lhs_module' => 'WorkFlowTriggerShells',
    'lhs_table' => 'workflow_triggershells',
    'lhs_key' => 'id',
    'rhs_module' => 'Expressions',
    'rhs_table' => 'expressions',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'past_trigger',
    'relationship_type' => 'one-to-many',
  ),
  'future_triggers' => 
  array (
    'name' => 'future_triggers',
    'lhs_module' => 'WorkFlowTriggerShells',
    'lhs_table' => 'workflow_triggershells',
    'lhs_key' => 'id',
    'rhs_module' => 'Expressions',
    'rhs_table' => 'expressions',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'future_trigger',
    'relationship_type' => 'one-to-many',
  ),
  'trigger_expressions' => 
  array (
    'name' => 'trigger_expressions',
    'lhs_module' => 'WorkFlowTriggerShells',
    'lhs_table' => 'workflow_triggershells',
    'lhs_key' => 'id',
    'rhs_module' => 'Expressions',
    'rhs_table' => 'expressions',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'expression',
    'relationship_type' => 'one-to-many',
  ),
  'alert_components' => 
  array (
    'name' => 'alert_components',
    'lhs_module' => 'WorkFlowAlertShells',
    'lhs_table' => 'workflow_alertshells',
    'lhs_key' => 'id',
    'rhs_module' => 'WorkFlowAlerts',
    'rhs_table' => 'workflow_alerts',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'expressions' => 
  array (
    'name' => 'expressions',
    'lhs_module' => 'WorkFlowAlerts',
    'lhs_table' => 'workflow_alerts',
    'lhs_key' => 'id',
    'rhs_module' => 'Expressions',
    'rhs_table' => 'expressions',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'filter',
    'relationship_type' => 'one-to-many',
  ),
  'rel1_alert_fil' => 
  array (
    'name' => 'rel1_alert_fil',
    'lhs_module' => 'WorkFlowAlerts',
    'lhs_table' => 'workflow_alerts',
    'lhs_key' => 'id',
    'rhs_module' => 'Expressions',
    'rhs_table' => 'expressions',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'rel1_alert_fil',
    'relationship_type' => 'one-to-many',
  ),
  'rel2_alert_fil' => 
  array (
    'name' => 'rel2_alert_fil',
    'lhs_module' => 'WorkFlowAlerts',
    'lhs_table' => 'workflow_alerts',
    'lhs_key' => 'id',
    'rhs_module' => 'Expressions',
    'rhs_table' => 'expressions',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'rel2_alert_fil',
    'relationship_type' => 'one-to-many',
  ),
  'actions' => 
  array (
    'name' => 'actions',
    'lhs_module' => 'WorkFlowActionShells',
    'lhs_table' => 'workflow_actionshells',
    'lhs_key' => 'id',
    'rhs_module' => 'WorkFlowActions',
    'rhs_table' => 'workflow_actions',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'action_bridge' => 
  array (
    'name' => 'action_bridge',
    'lhs_module' => 'WorkFlowActionShells',
    'lhs_table' => 'workflow_actionshells',
    'lhs_key' => 'id',
    'rhs_module' => 'WorkFlow',
    'rhs_table' => 'workflow',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
  ),
  'rel1_action_fil' => 
  array (
    'name' => 'rel1_action_fil',
    'lhs_module' => 'WorkFlowActionShells',
    'lhs_table' => 'workflow_actionshells',
    'lhs_key' => 'id',
    'rhs_module' => 'Expressions',
    'rhs_table' => 'expressions',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'rel1_action_fil',
    'relationship_type' => 'one-to-many',
  ),
  'member_expressions' => 
  array (
    'name' => 'member_expressions',
    'lhs_module' => 'Expressions',
    'lhs_table' => 'expressions',
    'lhs_key' => 'id',
    'rhs_module' => 'Expressions',
    'rhs_table' => 'expressions',
    'rhs_key' => 'parent_exp_id',
    'relationship_type' => 'one-to-many',
  ),
  'contracts_modified_user' => 
  array (
    'name' => 'contracts_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'contracts_created_by' => 
  array (
    'name' => 'contracts_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'contracts_assigned_user' => 
  array (
    'name' => 'contracts_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'contracts_team_count_relationship' => 
  array (
    'name' => 'contracts_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'contracts_teams' => 
  array (
    'name' => 'contracts_teams',
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'contracts_team' => 
  array (
    'name' => 'contracts_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'contract_paymentdetails' => 
  array (
    'name' => 'contract_paymentdetails',
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PaymentDetail',
    'rhs_table' => 'j_paymentdetail',
    'rhs_key' => 'contract_id',
    'relationship_type' => 'one-to-many',
  ),
  'contract_j_payment' => 
  array (
    'name' => 'contract_j_payment',
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'contract_id',
    'relationship_type' => 'one-to-many',
  ),
  'contracts_contract_types' => 
  array (
    'name' => 'contracts_contract_types',
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'type',
    'rhs_module' => 'ContractTypes',
    'rhs_table' => 'contract_types',
    'rhs_key' => 'id',
    'relationship_type' => 'one-to-many',
  ),
  'contract_notes' => 
  array (
    'name' => 'contract_notes',
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Contracts',
    'relationship_type' => 'one-to-many',
  ),
  'account_contracts' => 
  array (
    'name' => 'account_contracts',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'account_id',
    'relationship_type' => 'one-to-many',
  ),
  'contract_delivery' => 
  array (
    'name' => 'contract_delivery',
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'contract_id',
    'relationship_type' => 'one-to-many',
  ),
  'contract_contract_move' => 
  array (
    'name' => 'contract_contract_move',
    'lhs_module' => 'Contracts',
    'lhs_table' => 'contracts',
    'lhs_key' => 'id',
    'rhs_module' => 'Contracts',
    'rhs_table' => 'contracts',
    'rhs_key' => 'from_contract_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbdocuments_team_count_relationship' => 
  array (
    'name' => 'kbdocuments_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocuments',
    'rhs_table' => 'kbdocuments',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbdocuments_teams' => 
  array (
    'name' => 'kbdocuments_teams',
    'lhs_module' => 'KBDocuments',
    'lhs_table' => 'kbdocuments',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'kbdocuments_team' => 
  array (
    'name' => 'kbdocuments_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocuments',
    'rhs_table' => 'kbdocuments',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbdocument_revisions' => 
  array (
    'name' => 'kbdocument_revisions',
    'lhs_module' => 'KBDocuments',
    'lhs_table' => 'kbdocuments',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocumentRevisions',
    'rhs_table' => 'kbdocument_revisions',
    'rhs_key' => 'kbdocument_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbdocuments_modified_user' => 
  array (
    'name' => 'kbdocuments_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocuments',
    'rhs_table' => 'kbdocuments',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbdocuments_created_by' => 
  array (
    'name' => 'kbdocuments_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocuments',
    'rhs_table' => 'kbdocuments',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'kb_assigned_user' => 
  array (
    'name' => 'kb_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocuments',
    'rhs_table' => 'kbdocuments',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbdoc_approver_user' => 
  array (
    'name' => 'kbdoc_approver_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocuments',
    'rhs_table' => 'kbdocuments',
    'rhs_key' => 'kbdoc_approver_id',
    'relationship_type' => 'one-to-many',
  ),
  'case_kbdocuments' => 
  array (
    'name' => 'case_kbdocuments',
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocuments',
    'rhs_table' => 'kbdocuments',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Cases',
  ),
  'email_kbdocuments' => 
  array (
    'name' => 'email_kbdocuments',
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocuments',
    'rhs_table' => 'kbdocuments',
    'rhs_key' => 'parent_id',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Emails',
  ),
  'kbrev_revisions_created_by' => 
  array (
    'name' => 'kbrev_revisions_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocumentRevisions',
    'rhs_table' => 'kbdocument_revisions',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'kbtags_team_count_relationship' => 
  array (
    'name' => 'kbtags_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'KBTags',
    'rhs_table' => 'kbtags',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbtags_teams' => 
  array (
    'name' => 'kbtags_teams',
    'lhs_module' => 'KBTags',
    'lhs_table' => 'kbtags',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'kbtags_team' => 
  array (
    'name' => 'kbtags_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'KBTags',
    'rhs_table' => 'kbtags',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbdocumentkbtags_team_count_relationship' => 
  array (
    'name' => 'kbdocumentkbtags_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocumentKBTags',
    'rhs_table' => 'kbdocuments_kbtags',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbdocumentkbtags_teams' => 
  array (
    'name' => 'kbdocumentkbtags_teams',
    'lhs_module' => 'KBDocumentKBTags',
    'lhs_table' => 'kbdocuments_kbtags',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'kbdocumentkbtags_team' => 
  array (
    'name' => 'kbdocumentkbtags_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocumentKBTags',
    'rhs_table' => 'kbdocuments_kbtags',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbrevisions_created_by' => 
  array (
    'name' => 'kbrevisions_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'KBDocumentKBTags',
    'rhs_table' => 'kbdocuments_kbtags',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'kbcontents_team_count_relationship' => 
  array (
    'name' => 'kbcontents_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'KBContents',
    'rhs_table' => 'kbcontents',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'kbcontents_teams' => 
  array (
    'name' => 'kbcontents_teams',
    'lhs_module' => 'KBContents',
    'lhs_table' => 'kbcontents',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'kbcontents_team' => 
  array (
    'name' => 'kbcontents_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'KBContents',
    'rhs_table' => 'kbcontents',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'customqueries_team_count_relationship' => 
  array (
    'name' => 'customqueries_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'CustomQueries',
    'rhs_table' => 'custom_queries',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'customqueries_teams' => 
  array (
    'name' => 'customqueries_teams',
    'lhs_module' => 'CustomQueries',
    'lhs_table' => 'custom_queries',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'customqueries_team' => 
  array (
    'name' => 'customqueries_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'CustomQueries',
    'rhs_table' => 'custom_queries',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'datasets_team_count_relationship' => 
  array (
    'name' => 'datasets_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'DataSets',
    'rhs_table' => 'data_sets',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'datasets_teams' => 
  array (
    'name' => 'datasets_teams',
    'lhs_module' => 'DataSets',
    'lhs_table' => 'data_sets',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'datasets_team' => 
  array (
    'name' => 'datasets_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'DataSets',
    'rhs_table' => 'data_sets',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'reportmaker_team_count_relationship' => 
  array (
    'name' => 'reportmaker_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'ReportMaker',
    'rhs_table' => 'report_maker',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'reportmaker_teams' => 
  array (
    'name' => 'reportmaker_teams',
    'lhs_module' => 'ReportMaker',
    'lhs_table' => 'report_maker',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'reportmaker_team' => 
  array (
    'name' => 'reportmaker_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'ReportMaker',
    'rhs_table' => 'report_maker',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'sugarfeed_modified_user' => 
  array (
    'name' => 'sugarfeed_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'SugarFeed',
    'rhs_table' => 'sugarfeed',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'sugarfeed_created_by' => 
  array (
    'name' => 'sugarfeed_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'SugarFeed',
    'rhs_table' => 'sugarfeed',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'sugarfeed_team_count_relationship' => 
  array (
    'name' => 'sugarfeed_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'SugarFeed',
    'rhs_table' => 'sugarfeed',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'sugarfeed_teams' => 
  array (
    'name' => 'sugarfeed_teams',
    'lhs_module' => 'SugarFeed',
    'lhs_table' => 'sugarfeed',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'sugarfeed_team' => 
  array (
    'name' => 'sugarfeed_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'SugarFeed',
    'rhs_table' => 'sugarfeed',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'sugarfeed_assigned_user' => 
  array (
    'name' => 'sugarfeed_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'SugarFeed',
    'rhs_table' => 'sugarfeed',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'notifications_modified_user' => 
  array (
    'name' => 'notifications_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Notifications',
    'rhs_table' => 'notifications',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'notifications_created_by' => 
  array (
    'name' => 'notifications_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Notifications',
    'rhs_table' => 'notifications',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'notifications_assigned_user' => 
  array (
    'name' => 'notifications_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Notifications',
    'rhs_table' => 'notifications',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'eapm_modified_user' => 
  array (
    'name' => 'eapm_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'EAPM',
    'rhs_table' => 'eapm',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'eapm_created_by' => 
  array (
    'name' => 'eapm_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'EAPM',
    'rhs_table' => 'eapm',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'eapm_assigned_user' => 
  array (
    'name' => 'eapm_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'EAPM',
    'rhs_table' => 'eapm',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'oauthkeys_modified_user' => 
  array (
    'name' => 'oauthkeys_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'OAuthKeys',
    'rhs_table' => 'oauthkeys',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'oauthkeys_created_by' => 
  array (
    'name' => 'oauthkeys_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'OAuthKeys',
    'rhs_table' => 'oauthkeys',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'oauthkeys_assigned_user' => 
  array (
    'name' => 'oauthkeys_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'OAuthKeys',
    'rhs_table' => 'oauthkeys',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'consumer_tokens' => 
  array (
    'name' => 'consumer_tokens',
    'lhs_module' => 'OAuthKeys',
    'lhs_table' => 'oauth_consumer',
    'lhs_key' => 'id',
    'rhs_module' => 'OAuthTokens',
    'rhs_table' => 'oauth_tokens',
    'rhs_key' => 'consumer',
    'relationship_type' => 'one-to-many',
  ),
  'oauthtokens_assigned_user' => 
  array (
    'name' => 'oauthtokens_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'OAuthTokens',
    'rhs_table' => 'oauth_tokens',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'contacts_oauthtokens' => 
  array (
    'name' => 'contacts_oauthtokens',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'OAuthTokens',
    'rhs_table' => 'oauth_tokens',
    'rhs_key' => 'contact_id',
    'relationship_type' => 'one-to-many',
  ),
  'sugarfavorites_modified_user' => 
  array (
    'name' => 'sugarfavorites_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'SugarFavorites',
    'rhs_table' => 'sugarfavorites',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'sugarfavorites_created_by' => 
  array (
    'name' => 'sugarfavorites_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'SugarFavorites',
    'rhs_table' => 'sugarfavorites',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'sugarfavorites_assigned_user' => 
  array (
    'name' => 'sugarfavorites_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'SugarFavorites',
    'rhs_table' => 'sugarfavorites',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'pdfmanager_modified_user' => 
  array (
    'name' => 'pdfmanager_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'PdfManager',
    'rhs_table' => 'pdfmanager',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'pdfmanager_created_by' => 
  array (
    'name' => 'pdfmanager_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'PdfManager',
    'rhs_table' => 'pdfmanager',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'pdfmanager_team_count_relationship' => 
  array (
    'name' => 'pdfmanager_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'PdfManager',
    'rhs_table' => 'pdfmanager',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'pdfmanager_teams' => 
  array (
    'name' => 'pdfmanager_teams',
    'lhs_module' => 'PdfManager',
    'lhs_table' => 'pdfmanager',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'pdfmanager_team' => 
  array (
    'name' => 'pdfmanager_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'PdfManager',
    'rhs_table' => 'pdfmanager',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'pdfmanager_assigned_user' => 
  array (
    'name' => 'pdfmanager_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'PdfManager',
    'rhs_table' => 'pdfmanager',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_voucher_modified_user' => 
  array (
    'name' => 'j_voucher_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Voucher',
    'rhs_table' => 'j_voucher',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_voucher_created_by' => 
  array (
    'name' => 'j_voucher_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Voucher',
    'rhs_table' => 'j_voucher',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_voucher_team_count_relationship' => 
  array (
    'name' => 'j_voucher_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Voucher',
    'rhs_table' => 'j_voucher',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_voucher_teams' => 
  array (
    'name' => 'j_voucher_teams',
    'lhs_module' => 'J_Voucher',
    'lhs_table' => 'j_voucher',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_voucher_team' => 
  array (
    'name' => 'j_voucher_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Voucher',
    'rhs_table' => 'j_voucher',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_voucher_assigned_user' => 
  array (
    'name' => 'j_voucher_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Voucher',
    'rhs_table' => 'j_voucher',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_sponsor_vouchers' => 
  array (
    'name' => 'j_sponsor_vouchers',
    'lhs_module' => 'J_Voucher',
    'lhs_table' => 'j_voucher',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Sponsor',
    'rhs_table' => 'j_sponsor',
    'rhs_key' => 'voucher_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timekeeping_modified_user' => 
  array (
    'name' => 'c_timekeeping_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'c_Timekeeping',
    'rhs_table' => 'c_timekeeping',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timekeeping_created_by' => 
  array (
    'name' => 'c_timekeeping_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'c_Timekeeping',
    'rhs_table' => 'c_timekeeping',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_timekeeping_team_count_relationship' => 
  array (
    'name' => 'c_timekeeping_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'c_Timekeeping',
    'rhs_table' => 'c_timekeeping',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timekeeping_teams' => 
  array (
    'name' => 'c_timekeeping_teams',
    'lhs_module' => 'c_Timekeeping',
    'lhs_table' => 'c_timekeeping',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_timekeeping_team' => 
  array (
    'name' => 'c_timekeeping_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'c_Timekeeping',
    'rhs_table' => 'c_timekeeping',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timekeeping_assigned_user' => 
  array (
    'name' => 'c_timekeeping_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'c_Timekeeping',
    'rhs_table' => 'c_timekeeping',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_helptextconfig_modified_user' => 
  array (
    'name' => 'c_helptextconfig_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_HelpTextConfig',
    'rhs_table' => 'c_helptextconfig',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_helptextconfig_created_by' => 
  array (
    'name' => 'c_helptextconfig_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_HelpTextConfig',
    'rhs_table' => 'c_helptextconfig',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_helptextconfig_assigned_user' => 
  array (
    'name' => 'c_helptextconfig_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_HelpTextConfig',
    'rhs_table' => 'c_helptextconfig',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_paymentdetail_modified_user' => 
  array (
    'name' => 'j_paymentdetail_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PaymentDetail',
    'rhs_table' => 'j_paymentdetail',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_paymentdetail_created_by' => 
  array (
    'name' => 'j_paymentdetail_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PaymentDetail',
    'rhs_table' => 'j_paymentdetail',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_paymentdetail_team_count_relationship' => 
  array (
    'name' => 'j_paymentdetail_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PaymentDetail',
    'rhs_table' => 'j_paymentdetail',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_paymentdetail_teams' => 
  array (
    'name' => 'j_paymentdetail_teams',
    'lhs_module' => 'J_PaymentDetail',
    'lhs_table' => 'j_paymentdetail',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_paymentdetail_team' => 
  array (
    'name' => 'j_paymentdetail_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PaymentDetail',
    'rhs_table' => 'j_paymentdetail',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_paymentdetail_assigned_user' => 
  array (
    'name' => 'j_paymentdetail_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PaymentDetail',
    'rhs_table' => 'j_paymentdetail',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_coursefee_modified_user' => 
  array (
    'name' => 'j_coursefee_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Coursefee',
    'rhs_table' => 'j_coursefee',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_coursefee_created_by' => 
  array (
    'name' => 'j_coursefee_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Coursefee',
    'rhs_table' => 'j_coursefee',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_coursefee_team_count_relationship' => 
  array (
    'name' => 'j_coursefee_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Coursefee',
    'rhs_table' => 'j_coursefee',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_coursefee_teams' => 
  array (
    'name' => 'j_coursefee_teams',
    'lhs_module' => 'J_Coursefee',
    'lhs_table' => 'j_coursefee',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_coursefee_team' => 
  array (
    'name' => 'j_coursefee_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Coursefee',
    'rhs_table' => 'j_coursefee',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_coursefee_assigned_user' => 
  array (
    'name' => 'j_coursefee_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Coursefee',
    'rhs_table' => 'j_coursefee',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_duplicationdetection_modified_user' => 
  array (
    'name' => 'c_duplicationdetection_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DuplicationDetection',
    'rhs_table' => 'c_duplicationdetection',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_duplicationdetection_created_by' => 
  array (
    'name' => 'c_duplicationdetection_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DuplicationDetection',
    'rhs_table' => 'c_duplicationdetection',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_duplicationdetection_assigned_user' => 
  array (
    'name' => 'c_duplicationdetection_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DuplicationDetection',
    'rhs_table' => 'c_duplicationdetection',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_fieldhighlighter_modified_user' => 
  array (
    'name' => 'c_fieldhighlighter_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_FieldHighlighter',
    'rhs_table' => 'c_fieldhighlighter',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_fieldhighlighter_created_by' => 
  array (
    'name' => 'c_fieldhighlighter_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_FieldHighlighter',
    'rhs_table' => 'c_fieldhighlighter',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_fieldhighlighter_assigned_user' => 
  array (
    'name' => 'c_fieldhighlighter_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_FieldHighlighter',
    'rhs_table' => 'c_fieldhighlighter',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_marketingplan_modified_user' => 
  array (
    'name' => 'j_marketingplan_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Marketingplan',
    'rhs_table' => 'j_marketingplan',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_marketingplan_created_by' => 
  array (
    'name' => 'j_marketingplan_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Marketingplan',
    'rhs_table' => 'j_marketingplan',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_marketingplan_team_count_relationship' => 
  array (
    'name' => 'j_marketingplan_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Marketingplan',
    'rhs_table' => 'j_marketingplan',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_marketingplan_teams' => 
  array (
    'name' => 'j_marketingplan_teams',
    'lhs_module' => 'J_Marketingplan',
    'lhs_table' => 'j_marketingplan',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_marketingplan_team' => 
  array (
    'name' => 'j_marketingplan_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Marketingplan',
    'rhs_table' => 'j_marketingplan',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_marketingplan_assigned_user' => 
  array (
    'name' => 'j_marketingplan_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Marketingplan',
    'rhs_table' => 'j_marketingplan',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_partnership_modified_user' => 
  array (
    'name' => 'j_partnership_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Partnership',
    'rhs_table' => 'j_partnership',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_partnership_created_by' => 
  array (
    'name' => 'j_partnership_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Partnership',
    'rhs_table' => 'j_partnership',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_partnership_team_count_relationship' => 
  array (
    'name' => 'j_partnership_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Partnership',
    'rhs_table' => 'j_partnership',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_partnership_teams' => 
  array (
    'name' => 'j_partnership_teams',
    'lhs_module' => 'J_Partnership',
    'lhs_table' => 'j_partnership',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_partnership_team' => 
  array (
    'name' => 'j_partnership_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Partnership',
    'rhs_table' => 'j_partnership',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_partnership_assigned_user' => 
  array (
    'name' => 'j_partnership_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Partnership',
    'rhs_table' => 'j_partnership',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timesheet_modified_user' => 
  array (
    'name' => 'c_timesheet_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Timesheet',
    'rhs_table' => 'c_timesheet',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timesheet_created_by' => 
  array (
    'name' => 'c_timesheet_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Timesheet',
    'rhs_table' => 'c_timesheet',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_timesheet_team_count_relationship' => 
  array (
    'name' => 'c_timesheet_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Timesheet',
    'rhs_table' => 'c_timesheet',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timesheet_teams' => 
  array (
    'name' => 'c_timesheet_teams',
    'lhs_module' => 'C_Timesheet',
    'lhs_table' => 'c_timesheet',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_timesheet_team' => 
  array (
    'name' => 'c_timesheet_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Timesheet',
    'rhs_table' => 'c_timesheet',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timesheet_assigned_user' => 
  array (
    'name' => 'c_timesheet_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Timesheet',
    'rhs_table' => 'c_timesheet',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_timesheet_meeting' => 
  array (
    'name' => 'c_timesheet_meeting',
    'lhs_module' => 'C_Timesheet',
    'lhs_table' => 'c_timesheet',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'timesheet_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_configinvoiceno_modified_user' => 
  array (
    'name' => 'j_configinvoiceno_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_ConfigInvoiceNo',
    'rhs_table' => 'j_configinvoiceno',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_configinvoiceno_created_by' => 
  array (
    'name' => 'j_configinvoiceno_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_ConfigInvoiceNo',
    'rhs_table' => 'j_configinvoiceno',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_configinvoiceno_team_count_relationship' => 
  array (
    'name' => 'j_configinvoiceno_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_ConfigInvoiceNo',
    'rhs_table' => 'j_configinvoiceno',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_configinvoiceno_teams' => 
  array (
    'name' => 'j_configinvoiceno_teams',
    'lhs_module' => 'J_ConfigInvoiceNo',
    'lhs_table' => 'j_configinvoiceno',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_configinvoiceno_team' => 
  array (
    'name' => 'j_configinvoiceno_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_ConfigInvoiceNo',
    'rhs_table' => 'j_configinvoiceno',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_configinvoiceno_assigned_user' => 
  array (
    'name' => 'j_configinvoiceno_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_ConfigInvoiceNo',
    'rhs_table' => 'j_configinvoiceno',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_commission_modified_user' => 
  array (
    'name' => 'c_commission_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Commission',
    'rhs_table' => 'c_commission',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_commission_created_by' => 
  array (
    'name' => 'c_commission_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Commission',
    'rhs_table' => 'c_commission',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_commission_team_count_relationship' => 
  array (
    'name' => 'c_commission_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Commission',
    'rhs_table' => 'c_commission',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_commission_teams' => 
  array (
    'name' => 'c_commission_teams',
    'lhs_module' => 'C_Commission',
    'lhs_table' => 'c_commission',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_commission_team' => 
  array (
    'name' => 'c_commission_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Commission',
    'rhs_table' => 'c_commission',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_commission_assigned_user' => 
  array (
    'name' => 'c_commission_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Commission',
    'rhs_table' => 'c_commission',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_kindofcourse_modified_user' => 
  array (
    'name' => 'j_kindofcourse_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Kindofcourse',
    'rhs_table' => 'j_kindofcourse',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_kindofcourse_created_by' => 
  array (
    'name' => 'j_kindofcourse_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Kindofcourse',
    'rhs_table' => 'j_kindofcourse',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_kindofcourse_team_count_relationship' => 
  array (
    'name' => 'j_kindofcourse_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Kindofcourse',
    'rhs_table' => 'j_kindofcourse',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_kindofcourse_teams' => 
  array (
    'name' => 'j_kindofcourse_teams',
    'lhs_module' => 'J_Kindofcourse',
    'lhs_table' => 'j_kindofcourse',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_kindofcourse_team' => 
  array (
    'name' => 'j_kindofcourse_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Kindofcourse',
    'rhs_table' => 'j_kindofcourse',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_kindofcourse_assigned_user' => 
  array (
    'name' => 'j_kindofcourse_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Kindofcourse',
    'rhs_table' => 'j_kindofcourse',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'kindofcourse_class' => 
  array (
    'name' => 'kindofcourse_class',
    'lhs_module' => 'J_Kindofcourse',
    'lhs_table' => 'j_kindofcourse',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'koc_id',
    'relationship_type' => 'one-to-many',
  ),
  'kindofcourse_gradeconfig' => 
  array (
    'name' => 'kindofcourse_gradeconfig',
    'lhs_module' => 'J_Kindofcourse',
    'lhs_table' => 'j_kindofcourse',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookConfig',
    'rhs_table' => 'j_gradebookconfig',
    'rhs_key' => 'koc_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_sponsor_modified_user' => 
  array (
    'name' => 'j_sponsor_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Sponsor',
    'rhs_table' => 'j_sponsor',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_sponsor_created_by' => 
  array (
    'name' => 'j_sponsor_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Sponsor',
    'rhs_table' => 'j_sponsor',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_sponsor_team_count_relationship' => 
  array (
    'name' => 'j_sponsor_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Sponsor',
    'rhs_table' => 'j_sponsor',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_sponsor_teams' => 
  array (
    'name' => 'j_sponsor_teams',
    'lhs_module' => 'J_Sponsor',
    'lhs_table' => 'j_sponsor',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_sponsor_team' => 
  array (
    'name' => 'j_sponsor_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Sponsor',
    'rhs_table' => 'j_sponsor',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_sponsor_assigned_user' => 
  array (
    'name' => 'j_sponsor_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Sponsor',
    'rhs_table' => 'j_sponsor',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_classes_modified_user' => 
  array (
    'name' => 'c_classes_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Classes',
    'rhs_table' => 'c_classes',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_classes_created_by' => 
  array (
    'name' => 'c_classes_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Classes',
    'rhs_table' => 'c_classes',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_classes_team_count_relationship' => 
  array (
    'name' => 'c_classes_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Classes',
    'rhs_table' => 'c_classes',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_classes_teams' => 
  array (
    'name' => 'c_classes_teams',
    'lhs_module' => 'C_Classes',
    'lhs_table' => 'c_classes',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_classes_team' => 
  array (
    'name' => 'c_classes_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Classes',
    'rhs_table' => 'c_classes',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_classes_assigned_user' => 
  array (
    'name' => 'c_classes_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Classes',
    'rhs_table' => 'c_classes',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'classes_meetings' => 
  array (
    'name' => 'classes_meetings',
    'lhs_module' => 'C_Classes',
    'lhs_table' => 'c_classes',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'class_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_class_modified_user' => 
  array (
    'name' => 'j_class_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_class_created_by' => 
  array (
    'name' => 'j_class_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_class_team_count_relationship' => 
  array (
    'name' => 'j_class_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_class_teams' => 
  array (
    'name' => 'j_class_teams',
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_class_team' => 
  array (
    'name' => 'j_class_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_class_assigned_user' => 
  array (
    'name' => 'j_class_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Class',
    'rhs_table' => 'j_class',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_class_meetings' => 
  array (
    'name' => 'j_class_meetings',
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'ju_class_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_class_studentsituations' => 
  array (
    'name' => 'j_class_studentsituations',
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'ju_class_id',
    'relationship_type' => 'one-to-many',
  ),
  'move_classes_studentsituations' => 
  array (
    'name' => 'move_classes_studentsituations',
    'lhs_module' => 'J_Class',
    'lhs_table' => 'j_class',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'move_class_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_studentsituations_modified_user' => 
  array (
    'name' => 'j_studentsituations_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_studentsituations_created_by' => 
  array (
    'name' => 'j_studentsituations_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_studentsituations_team_count_relationship' => 
  array (
    'name' => 'j_studentsituations_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_studentsituations_teams' => 
  array (
    'name' => 'j_studentsituations_teams',
    'lhs_module' => 'J_StudentSituations',
    'lhs_table' => 'j_studentsituations',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_studentsituations_team' => 
  array (
    'name' => 'j_studentsituations_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_studentsituations_assigned_user' => 
  array (
    'name' => 'j_studentsituations_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'situation_revenues' => 
  array (
    'name' => 'situation_revenues',
    'lhs_module' => 'J_StudentSituations',
    'lhs_table' => 'j_studentsituations',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'situation_id',
    'relationship_type' => 'one-to-many',
  ),
  'relate_situation' => 
  array (
    'name' => 'relate_situation',
    'lhs_module' => 'J_StudentSituations',
    'lhs_table' => 'j_studentsituations',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'relate_situation_id',
    'relationship_type' => 'one-to-many',
  ),
  'situation_delay_payment_delay' => 
  array (
    'name' => 'situation_delay_payment_delay',
    'lhs_module' => 'J_StudentSituations',
    'lhs_table' => 'j_studentsituations',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'delay_situation_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_carryforward_modified_user' => 
  array (
    'name' => 'c_carryforward_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_carryforward_created_by' => 
  array (
    'name' => 'c_carryforward_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_carryforward_team_count_relationship' => 
  array (
    'name' => 'c_carryforward_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_carryforward_teams' => 
  array (
    'name' => 'c_carryforward_teams',
    'lhs_module' => 'C_Carryforward',
    'lhs_table' => 'c_carryforward',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_carryforward_team' => 
  array (
    'name' => 'c_carryforward_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_carryforward_assigned_user' => 
  array (
    'name' => 'c_carryforward_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_configid_modified_user' => 
  array (
    'name' => 'c_configid_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_ConfigID',
    'rhs_table' => 'c_configid',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_configid_created_by' => 
  array (
    'name' => 'c_configid_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_ConfigID',
    'rhs_table' => 'c_configid',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_configid_assigned_user' => 
  array (
    'name' => 'c_configid_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_ConfigID',
    'rhs_table' => 'c_configid',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_contacts_modified_user' => 
  array (
    'name' => 'c_contacts_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Contacts',
    'rhs_table' => 'c_contacts',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_contacts_created_by' => 
  array (
    'name' => 'c_contacts_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Contacts',
    'rhs_table' => 'c_contacts',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_contacts_team_count_relationship' => 
  array (
    'name' => 'c_contacts_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Contacts',
    'rhs_table' => 'c_contacts',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_contacts_teams' => 
  array (
    'name' => 'c_contacts_teams',
    'lhs_module' => 'C_Contacts',
    'lhs_table' => 'c_contacts',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_contacts_team' => 
  array (
    'name' => 'c_contacts_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Contacts',
    'rhs_table' => 'c_contacts',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_contacts_assigned_user' => 
  array (
    'name' => 'c_contacts_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Contacts',
    'rhs_table' => 'c_contacts',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebook_modified_user' => 
  array (
    'name' => 'j_gradebook_modified_user',
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
    'name' => 'j_gradebook_created_by',
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
    'name' => 'j_gradebook_team_count_relationship',
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
    'name' => 'j_gradebook_teams',
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
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_gradebook_team' => 
  array (
    'name' => 'j_gradebook_team',
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
    'name' => 'j_gradebook_assigned_user',
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
    'name' => 'j_gradebook_j_gradebookdetail',
    'lhs_module' => 'J_Gradebook',
    'lhs_table' => 'j_gradebook',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookDetail',
    'rhs_table' => 'j_gradebookdetail',
    'rhs_key' => 'gradebook_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookconfig_modified_user' => 
  array (
    'name' => 'j_gradebookconfig_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookConfig',
    'rhs_table' => 'j_gradebookconfig',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookconfig_created_by' => 
  array (
    'name' => 'j_gradebookconfig_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookConfig',
    'rhs_table' => 'j_gradebookconfig',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookconfig_team_count_relationship' => 
  array (
    'name' => 'j_gradebookconfig_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookConfig',
    'rhs_table' => 'j_gradebookconfig',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookconfig_teams' => 
  array (
    'name' => 'j_gradebookconfig_teams',
    'lhs_module' => 'J_GradebookConfig',
    'lhs_table' => 'j_gradebookconfig',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_gradebookconfig_team' => 
  array (
    'name' => 'j_gradebookconfig_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookConfig',
    'rhs_table' => 'j_gradebookconfig',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookconfig_assigned_user' => 
  array (
    'name' => 'j_gradebookconfig_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookConfig',
    'rhs_table' => 'j_gradebookconfig',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookdetail_modified_user' => 
  array (
    'name' => 'j_gradebookdetail_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookDetail',
    'rhs_table' => 'j_gradebookdetail',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookdetail_created_by' => 
  array (
    'name' => 'j_gradebookdetail_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookDetail',
    'rhs_table' => 'j_gradebookdetail',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookdetail_team_count_relationship' => 
  array (
    'name' => 'j_gradebookdetail_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookDetail',
    'rhs_table' => 'j_gradebookdetail',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookdetail_teams' => 
  array (
    'name' => 'j_gradebookdetail_teams',
    'lhs_module' => 'J_GradebookDetail',
    'lhs_table' => 'j_gradebookdetail',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_gradebookdetail_team' => 
  array (
    'name' => 'j_gradebookdetail_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookDetail',
    'rhs_table' => 'j_gradebookdetail',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_gradebookdetail_assigned_user' => 
  array (
    'name' => 'j_gradebookdetail_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_GradebookDetail',
    'rhs_table' => 'j_gradebookdetail',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_submission_data_modified_user' => 
  array (
    'name' => 'bc_submission_data_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_submission_data',
    'rhs_table' => 'bc_submission_data',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_submission_data_created_by' => 
  array (
    'name' => 'bc_submission_data_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_submission_data',
    'rhs_table' => 'bc_submission_data',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_submission_data_assigned_user' => 
  array (
    'name' => 'bc_submission_data_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_submission_data',
    'rhs_table' => 'bc_submission_data',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_submission_modified_user' => 
  array (
    'name' => 'bc_survey_submission_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_submission_created_by' => 
  array (
    'name' => 'bc_survey_submission_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_submission_assigned_user' => 
  array (
    'name' => 'bc_survey_submission_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_submission',
    'rhs_table' => 'bc_survey_submission',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_template_modified_user' => 
  array (
    'name' => 'bc_survey_template_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_template',
    'rhs_table' => 'bc_survey_template',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_template_created_by' => 
  array (
    'name' => 'bc_survey_template_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_template',
    'rhs_table' => 'bc_survey_template',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_template_assigned_user' => 
  array (
    'name' => 'bc_survey_template_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_template',
    'rhs_table' => 'bc_survey_template',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_modified_user' => 
  array (
    'name' => 'bc_survey_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey',
    'rhs_table' => 'bc_survey',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_created_by' => 
  array (
    'name' => 'bc_survey_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey',
    'rhs_table' => 'bc_survey',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_assigned_user' => 
  array (
    'name' => 'bc_survey_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey',
    'rhs_table' => 'bc_survey',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_questions_modified_user' => 
  array (
    'name' => 'bc_survey_questions_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_questions',
    'rhs_table' => 'bc_survey_questions',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_questions_created_by' => 
  array (
    'name' => 'bc_survey_questions_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_questions',
    'rhs_table' => 'bc_survey_questions',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_questions_assigned_user' => 
  array (
    'name' => 'bc_survey_questions_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_questions',
    'rhs_table' => 'bc_survey_questions',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_pages_modified_user' => 
  array (
    'name' => 'bc_survey_pages_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_pages',
    'rhs_table' => 'bc_survey_pages',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_pages_created_by' => 
  array (
    'name' => 'bc_survey_pages_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_pages',
    'rhs_table' => 'bc_survey_pages',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_pages_assigned_user' => 
  array (
    'name' => 'bc_survey_pages_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_pages',
    'rhs_table' => 'bc_survey_pages',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_answers_modified_user' => 
  array (
    'name' => 'bc_survey_answers_modified_user',
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
    'name' => 'bc_survey_answers_created_by',
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
    'name' => 'bc_survey_answers_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_answers',
    'rhs_table' => 'bc_survey_answers',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_automizer_modified_user' => 
  array (
    'name' => 'bc_survey_automizer_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_automizer',
    'rhs_table' => 'bc_survey_automizer',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_automizer_created_by' => 
  array (
    'name' => 'bc_survey_automizer_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_automizer',
    'rhs_table' => 'bc_survey_automizer',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_survey_automizer_assigned_user' => 
  array (
    'name' => 'bc_survey_automizer_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_survey_automizer',
    'rhs_table' => 'bc_survey_automizer',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_automizer_condition_modified_user' => 
  array (
    'name' => 'bc_automizer_condition_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_automizer_condition',
    'rhs_table' => 'bc_automizer_condition',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_automizer_condition_created_by' => 
  array (
    'name' => 'bc_automizer_condition_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_automizer_condition',
    'rhs_table' => 'bc_automizer_condition',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_automizer_condition_assigned_user' => 
  array (
    'name' => 'bc_automizer_condition_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_automizer_condition',
    'rhs_table' => 'bc_automizer_condition',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_automizer_actions_modified_user' => 
  array (
    'name' => 'bc_automizer_actions_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_automizer_actions',
    'rhs_table' => 'bc_automizer_actions',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'bc_automizer_actions_created_by' => 
  array (
    'name' => 'bc_automizer_actions_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_automizer_actions',
    'rhs_table' => 'bc_automizer_actions',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'bc_automizer_actions_assigned_user' => 
  array (
    'name' => 'bc_automizer_actions_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'bc_automizer_actions',
    'rhs_table' => 'bc_automizer_actions',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_teachers_modified_user' => 
  array (
    'name' => 'c_teachers_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Teachers',
    'rhs_table' => 'c_teachers',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_teachers_created_by' => 
  array (
    'name' => 'c_teachers_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Teachers',
    'rhs_table' => 'c_teachers',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_teachers_team_count_relationship' => 
  array (
    'name' => 'c_teachers_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Teachers',
    'rhs_table' => 'c_teachers',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_teachers_teams' => 
  array (
    'name' => 'c_teachers_teams',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_teachers_team' => 
  array (
    'name' => 'c_teachers_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Teachers',
    'rhs_table' => 'c_teachers',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_teachers_assigned_user' => 
  array (
    'name' => 'c_teachers_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Teachers',
    'rhs_table' => 'c_teachers',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_teachers_email_addresses' => 
  array (
    'name' => 'c_teachers_email_addresses',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'EmailAddresses',
    'rhs_table' => 'email_addresses',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'email_addr_bean_rel',
    'join_key_lhs' => 'bean_id',
    'join_key_rhs' => 'email_address_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'C_Teachers',
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'c_teachers_email_addresses_primary' => 
  array (
    'name' => 'c_teachers_email_addresses_primary',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
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
    'fields' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'type' => 'id',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email_address_id',
        'type' => 'id',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'bean_id',
        'type' => 'id',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'bean_module',
        'type' => 'varchar',
        'len' => 100,
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'primary_address',
        'type' => 'bool',
        'default' => '0',
      ),
      5 => 
      array (
        'name' => 'reply_to_address',
        'type' => 'bool',
        'default' => '0',
      ),
      6 => 
      array (
        'name' => 'date_created',
        'type' => 'datetime',
      ),
      7 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      8 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'default' => 0,
      ),
    ),
  ),
  'teacher_holidays' => 
  array (
    'name' => 'teacher_holidays',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'Holidays',
    'rhs_table' => 'holidays',
    'rhs_key' => 'teacher_id',
    'relationship_type' => 'one-to-many',
  ),
  'teachers_meetings' => 
  array (
    'name' => 'teachers_meetings',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'teacher_id',
    'relationship_type' => 'one-to-many',
  ),
  'teachers_cover_meetings' => 
  array (
    'name' => 'teachers_cover_meetings',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'teacher_cover_id',
    'relationship_type' => 'one-to-many',
  ),
  'timesheet_teacher' => 
  array (
    'name' => 'timesheet_teacher',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Timesheet',
    'rhs_table' => 'c_timesheet',
    'rhs_key' => 'teacher_id',
    'relationship_type' => 'one-to-many',
  ),
  'teacher_timekeeping' => 
  array (
    'name' => 'teacher_timekeeping',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'c_Timekeeping',
    'rhs_table' => 'c_timekeeping',
    'rhs_key' => 'teacher_id',
    'relationship_type' => 'one-to-many',
  ),
  'teacher_j_inventory' => 
  array (
    'name' => 'teacher_j_inventory',
    'lhs_module' => 'C_Teachers',
    'lhs_table' => 'c_teachers',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'to_teacher_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_invoices_modified_user' => 
  array (
    'name' => 'c_invoices_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Invoices',
    'rhs_table' => 'c_invoices',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_invoices_created_by' => 
  array (
    'name' => 'c_invoices_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Invoices',
    'rhs_table' => 'c_invoices',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_invoices_team_count_relationship' => 
  array (
    'name' => 'c_invoices_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Invoices',
    'rhs_table' => 'c_invoices',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_invoices_teams' => 
  array (
    'name' => 'c_invoices_teams',
    'lhs_module' => 'C_Invoices',
    'lhs_table' => 'c_invoices',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_invoices_team' => 
  array (
    'name' => 'c_invoices_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Invoices',
    'rhs_table' => 'c_invoices',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_invoices_assigned_user' => 
  array (
    'name' => 'c_invoices_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Invoices',
    'rhs_table' => 'c_invoices',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_keyboardsetting_modified_user' => 
  array (
    'name' => 'c_keyboardsetting_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_KeyboardSetting',
    'rhs_table' => 'c_keyboardsetting',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_keyboardsetting_created_by' => 
  array (
    'name' => 'c_keyboardsetting_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_KeyboardSetting',
    'rhs_table' => 'c_keyboardsetting',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_keyboardsetting_assigned_user' => 
  array (
    'name' => 'c_keyboardsetting_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_KeyboardSetting',
    'rhs_table' => 'c_keyboardsetting',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_packages_modified_user' => 
  array (
    'name' => 'c_packages_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_packages_created_by' => 
  array (
    'name' => 'c_packages_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_packages_team_count_relationship' => 
  array (
    'name' => 'c_packages_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_packages_teams' => 
  array (
    'name' => 'c_packages_teams',
    'lhs_module' => 'C_Packages',
    'lhs_table' => 'c_packages',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_packages_team' => 
  array (
    'name' => 'c_packages_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_packages_assigned_user' => 
  array (
    'name' => 'c_packages_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventorydetail_modified_user' => 
  array (
    'name' => 'j_inventorydetail_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventorydetail',
    'rhs_table' => 'j_inventorydetail',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventorydetail_created_by' => 
  array (
    'name' => 'j_inventorydetail_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventorydetail',
    'rhs_table' => 'j_inventorydetail',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventorydetail_team_count_relationship' => 
  array (
    'name' => 'j_inventorydetail_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventorydetail',
    'rhs_table' => 'j_inventorydetail',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventorydetail_teams' => 
  array (
    'name' => 'j_inventorydetail_teams',
    'lhs_module' => 'J_Inventorydetail',
    'lhs_table' => 'j_inventorydetail',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_inventorydetail_team' => 
  array (
    'name' => 'j_inventorydetail_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventorydetail',
    'rhs_table' => 'j_inventorydetail',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventorydetail_assigned_user' => 
  array (
    'name' => 'j_inventorydetail_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventorydetail',
    'rhs_table' => 'j_inventorydetail',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_deliveryrevenue_modified_user' => 
  array (
    'name' => 'c_deliveryrevenue_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_deliveryrevenue_created_by' => 
  array (
    'name' => 'c_deliveryrevenue_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_deliveryrevenue_team_count_relationship' => 
  array (
    'name' => 'c_deliveryrevenue_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_deliveryrevenue_teams' => 
  array (
    'name' => 'c_deliveryrevenue_teams',
    'lhs_module' => 'C_DeliveryRevenue',
    'lhs_table' => 'c_deliveryrevenue',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_deliveryrevenue_team' => 
  array (
    'name' => 'c_deliveryrevenue_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_deliveryrevenue_assigned_user' => 
  array (
    'name' => 'c_deliveryrevenue_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_attendance_modified_user' => 
  array (
    'name' => 'c_attendance_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Attendance',
    'rhs_table' => 'c_attendance',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_attendance_created_by' => 
  array (
    'name' => 'c_attendance_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Attendance',
    'rhs_table' => 'c_attendance',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_attendance_team_count_relationship' => 
  array (
    'name' => 'c_attendance_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Attendance',
    'rhs_table' => 'c_attendance',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_attendance_teams' => 
  array (
    'name' => 'c_attendance_teams',
    'lhs_module' => 'C_Attendance',
    'lhs_table' => 'c_attendance',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_attendance_team' => 
  array (
    'name' => 'c_attendance_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Attendance',
    'rhs_table' => 'c_attendance',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_attendance_assigned_user' => 
  array (
    'name' => 'c_attendance_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Attendance',
    'rhs_table' => 'c_attendance',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_ptresult_modified_user' => 
  array (
    'name' => 'j_ptresult_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_ptresult_created_by' => 
  array (
    'name' => 'j_ptresult_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_ptresult_team_count_relationship' => 
  array (
    'name' => 'j_ptresult_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_ptresult_teams' => 
  array (
    'name' => 'j_ptresult_teams',
    'lhs_module' => 'J_PTResult',
    'lhs_table' => 'j_ptresult',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_ptresult_team' => 
  array (
    'name' => 'j_ptresult_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_ptresult_assigned_user' => 
  array (
    'name' => 'j_ptresult_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_modified_user' => 
  array (
    'name' => 'j_payment_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_created_by' => 
  array (
    'name' => 'j_payment_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_team_count_relationship' => 
  array (
    'name' => 'j_payment_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_teams' => 
  array (
    'name' => 'j_payment_teams',
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_payment_team' => 
  array (
    'name' => 'j_payment_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_assigned_user' => 
  array (
    'name' => 'j_payment_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_carryforward' => 
  array (
    'name' => 'j_payment_carryforward',
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Carryforward',
    'rhs_table' => 'c_carryforward',
    'rhs_key' => 'payment_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_studentsituations' => 
  array (
    'name' => 'j_payment_studentsituations',
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'J_StudentSituations',
    'rhs_table' => 'j_studentsituations',
    'rhs_key' => 'payment_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_j_sponsor' => 
  array (
    'name' => 'j_payment_j_sponsor',
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Sponsor',
    'rhs_table' => 'j_sponsor',
    'rhs_key' => 'payment_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_payment_moving_transfer' => 
  array (
    'name' => 'j_payment_moving_transfer',
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'payment_out_id',
    'relationship_type' => 'one-to-many',
  ),
  'payment_paymentdetails' => 
  array (
    'name' => 'payment_paymentdetails',
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PaymentDetail',
    'rhs_table' => 'j_paymentdetail',
    'rhs_key' => 'payment_id',
    'relationship_type' => 'one-to-many',
  ),
  'ju_payment_revenue' => 
  array (
    'name' => 'ju_payment_revenue',
    'lhs_module' => 'J_Payment',
    'lhs_table' => 'j_payment',
    'lhs_key' => 'id',
    'rhs_module' => 'C_DeliveryRevenue',
    'rhs_table' => 'c_deliveryrevenue',
    'rhs_key' => 'ju_payment_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_rooms_modified_user' => 
  array (
    'name' => 'c_rooms_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Rooms',
    'rhs_table' => 'c_rooms',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_rooms_created_by' => 
  array (
    'name' => 'c_rooms_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Rooms',
    'rhs_table' => 'c_rooms',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_rooms_team_count_relationship' => 
  array (
    'name' => 'c_rooms_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Rooms',
    'rhs_table' => 'c_rooms',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_rooms_teams' => 
  array (
    'name' => 'c_rooms_teams',
    'lhs_module' => 'C_Rooms',
    'lhs_table' => 'c_rooms',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_rooms_team' => 
  array (
    'name' => 'c_rooms_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Rooms',
    'rhs_table' => 'c_rooms',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_rooms_assigned_user' => 
  array (
    'name' => 'c_rooms_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Rooms',
    'rhs_table' => 'c_rooms',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'rooms_meetings' => 
  array (
    'name' => 'rooms_meetings',
    'lhs_module' => 'C_Rooms',
    'lhs_table' => 'c_rooms',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'room_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_discount_modified_user' => 
  array (
    'name' => 'j_discount_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Discount',
    'rhs_table' => 'j_discount',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_discount_created_by' => 
  array (
    'name' => 'j_discount_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Discount',
    'rhs_table' => 'j_discount',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_discount_team_count_relationship' => 
  array (
    'name' => 'j_discount_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Discount',
    'rhs_table' => 'j_discount',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_discount_teams' => 
  array (
    'name' => 'j_discount_teams',
    'lhs_module' => 'J_Discount',
    'lhs_table' => 'j_discount',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_discount_team' => 
  array (
    'name' => 'j_discount_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Discount',
    'rhs_table' => 'j_discount',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_discount_assigned_user' => 
  array (
    'name' => 'j_discount_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Discount',
    'rhs_table' => 'j_discount',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_sponsor_j_discounts' => 
  array (
    'name' => 'j_sponsor_j_discounts',
    'lhs_module' => 'J_Sponsor',
    'lhs_table' => 'j_sponsor',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Discount',
    'rhs_table' => 'j_discount',
    'rhs_key' => 'discount_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_school_modified_user' => 
  array (
    'name' => 'j_school_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_School',
    'rhs_table' => 'j_school',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_school_created_by' => 
  array (
    'name' => 'j_school_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_School',
    'rhs_table' => 'j_school',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_school_assigned_user' => 
  array (
    'name' => 'j_school_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_School',
    'rhs_table' => 'j_school',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_refunds_modified_user' => 
  array (
    'name' => 'c_refunds_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Refunds',
    'rhs_table' => 'c_refunds',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_refunds_created_by' => 
  array (
    'name' => 'c_refunds_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Refunds',
    'rhs_table' => 'c_refunds',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_refunds_team_count_relationship' => 
  array (
    'name' => 'c_refunds_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Refunds',
    'rhs_table' => 'c_refunds',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_refunds_teams' => 
  array (
    'name' => 'c_refunds_teams',
    'lhs_module' => 'C_Refunds',
    'lhs_table' => 'c_refunds',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_refunds_team' => 
  array (
    'name' => 'c_refunds_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Refunds',
    'rhs_table' => 'c_refunds',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_refunds_assigned_user' => 
  array (
    'name' => 'c_refunds_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Refunds',
    'rhs_table' => 'c_refunds',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_payments_modified_user' => 
  array (
    'name' => 'c_payments_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_payments_created_by' => 
  array (
    'name' => 'c_payments_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_payments_team_count_relationship' => 
  array (
    'name' => 'c_payments_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_payments_teams' => 
  array (
    'name' => 'c_payments_teams',
    'lhs_module' => 'C_Payments',
    'lhs_table' => 'c_payments',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_payments_team' => 
  array (
    'name' => 'c_payments_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_payments_assigned_user' => 
  array (
    'name' => 'c_payments_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_targetconfig_modified_user' => 
  array (
    'name' => 'j_targetconfig_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Targetconfig',
    'rhs_table' => 'j_targetconfig',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_targetconfig_created_by' => 
  array (
    'name' => 'j_targetconfig_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Targetconfig',
    'rhs_table' => 'j_targetconfig',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_targetconfig_team_count_relationship' => 
  array (
    'name' => 'j_targetconfig_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Targetconfig',
    'rhs_table' => 'j_targetconfig',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_targetconfig_teams' => 
  array (
    'name' => 'j_targetconfig_teams',
    'lhs_module' => 'J_Targetconfig',
    'lhs_table' => 'j_targetconfig',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_targetconfig_team' => 
  array (
    'name' => 'j_targetconfig_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Targetconfig',
    'rhs_table' => 'j_targetconfig',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_targetconfig_assigned_user' => 
  array (
    'name' => 'j_targetconfig_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Targetconfig',
    'rhs_table' => 'j_targetconfig',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_feedback_modified_user' => 
  array (
    'name' => 'j_feedback_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_feedback_created_by' => 
  array (
    'name' => 'j_feedback_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_feedback_team_count_relationship' => 
  array (
    'name' => 'j_feedback_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_feedback_teams' => 
  array (
    'name' => 'j_feedback_teams',
    'lhs_module' => 'J_Feedback',
    'lhs_table' => 'j_feedback',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_feedback_team' => 
  array (
    'name' => 'j_feedback_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_feedback_assigned_user' => 
  array (
    'name' => 'j_feedback_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Feedback',
    'rhs_table' => 'j_feedback',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_memberships_modified_user' => 
  array (
    'name' => 'c_memberships_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Memberships',
    'rhs_table' => 'c_memberships',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_memberships_created_by' => 
  array (
    'name' => 'c_memberships_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Memberships',
    'rhs_table' => 'c_memberships',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_memberships_team_count_relationship' => 
  array (
    'name' => 'c_memberships_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Memberships',
    'rhs_table' => 'c_memberships',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_memberships_teams' => 
  array (
    'name' => 'c_memberships_teams',
    'lhs_module' => 'C_Memberships',
    'lhs_table' => 'c_memberships',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_memberships_team' => 
  array (
    'name' => 'c_memberships_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Memberships',
    'rhs_table' => 'c_memberships',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_memberships_assigned_user' => 
  array (
    'name' => 'c_memberships_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Memberships',
    'rhs_table' => 'c_memberships',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventory_modified_user' => 
  array (
    'name' => 'j_inventory_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventory_created_by' => 
  array (
    'name' => 'j_inventory_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventory_team_count_relationship' => 
  array (
    'name' => 'j_inventory_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventory_teams' => 
  array (
    'name' => 'j_inventory_teams',
    'lhs_module' => 'J_Inventory',
    'lhs_table' => 'j_inventory',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_inventory_team' => 
  array (
    'name' => 'j_inventory_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_inventory_assigned_user' => 
  array (
    'name' => 'j_inventory_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventory',
    'rhs_table' => 'j_inventory',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'inventorylines' => 
  array (
    'name' => 'inventorylines',
    'lhs_module' => 'J_Inventory',
    'lhs_table' => 'j_inventory',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Inventorydetail',
    'rhs_table' => 'j_inventorydetail',
    'rhs_key' => 'inventory_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_teachercontract_modified_user' => 
  array (
    'name' => 'j_teachercontract_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Teachercontract',
    'rhs_table' => 'j_teachercontract',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_teachercontract_created_by' => 
  array (
    'name' => 'j_teachercontract_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Teachercontract',
    'rhs_table' => 'j_teachercontract',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'j_teachercontract_team_count_relationship' => 
  array (
    'name' => 'j_teachercontract_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Teachercontract',
    'rhs_table' => 'j_teachercontract',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_teachercontract_teams' => 
  array (
    'name' => 'j_teachercontract_teams',
    'lhs_module' => 'J_Teachercontract',
    'lhs_table' => 'j_teachercontract',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'j_teachercontract_team' => 
  array (
    'name' => 'j_teachercontract_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Teachercontract',
    'rhs_table' => 'j_teachercontract',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'j_teachercontract_assigned_user' => 
  array (
    'name' => 'j_teachercontract_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Teachercontract',
    'rhs_table' => 'j_teachercontract',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_sms_modified_user' => 
  array (
    'name' => 'c_sms_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_sms_created_by' => 
  array (
    'name' => 'c_sms_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_sms_team_count_relationship' => 
  array (
    'name' => 'c_sms_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_sms_teams' => 
  array (
    'name' => 'c_sms_teams',
    'lhs_module' => 'C_SMS',
    'lhs_table' => 'c_sms',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_sms_team' => 
  array (
    'name' => 'c_sms_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_sms_assigned_user' => 
  array (
    'name' => 'c_sms_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_SMS',
    'rhs_table' => 'c_sms',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_reports_modified_user' => 
  array (
    'name' => 'c_reports_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Reports',
    'rhs_table' => 'c_reports',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_reports_created_by' => 
  array (
    'name' => 'c_reports_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Reports',
    'rhs_table' => 'c_reports',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_reports_team_count_relationship' => 
  array (
    'name' => 'c_reports_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Reports',
    'rhs_table' => 'c_reports',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_reports_teams' => 
  array (
    'name' => 'c_reports_teams',
    'lhs_module' => 'C_Reports',
    'lhs_table' => 'c_reports',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_reports_team' => 
  array (
    'name' => 'c_reports_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Reports',
    'rhs_table' => 'c_reports',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_reports_assigned_user' => 
  array (
    'name' => 'c_reports_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Reports',
    'rhs_table' => 'c_reports',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_sponsors_modified_user' => 
  array (
    'name' => 'c_sponsors_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Sponsors',
    'rhs_table' => 'c_sponsors',
    'rhs_key' => 'modified_user_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_sponsors_created_by' => 
  array (
    'name' => 'c_sponsors_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Sponsors',
    'rhs_table' => 'c_sponsors',
    'rhs_key' => 'created_by',
    'relationship_type' => 'one-to-many',
  ),
  'c_sponsors_team_count_relationship' => 
  array (
    'name' => 'c_sponsors_team_count_relationship',
    'lhs_module' => 'Teams',
    'lhs_table' => 'team_sets',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Sponsors',
    'rhs_table' => 'c_sponsors',
    'rhs_key' => 'team_set_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_sponsors_teams' => 
  array (
    'name' => 'c_sponsors_teams',
    'lhs_module' => 'C_Sponsors',
    'lhs_table' => 'c_sponsors',
    'lhs_key' => 'team_set_id',
    'rhs_module' => 'Teams',
    'rhs_table' => 'teams',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'team_sets_teams',
    'join_key_lhs' => 'team_set_id',
    'join_key_rhs' => 'team_id',
    'fields' => 
    array (
      'id' => 
      array (
        'name' => 'id',
        'vname' => 'LBL_ID',
        'type' => 'id',
        'required' => true,
      ),
      0 => 
      array (
        'name' => 'team_set_id',
        'type' => 'id',
      ),
      1 => 
      array (
        'name' => 'team_id',
        'type' => 'id',
      ),
      2 => 
      array (
        'name' => 'date_modified',
        'type' => 'datetime',
      ),
      3 => 
      array (
        'name' => 'deleted',
        'type' => 'bool',
        'len' => '',
        'default' => '0',
      ),
    ),
  ),
  'c_sponsors_team' => 
  array (
    'name' => 'c_sponsors_team',
    'lhs_module' => 'Teams',
    'lhs_table' => 'teams',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Sponsors',
    'rhs_table' => 'c_sponsors',
    'rhs_key' => 'team_id',
    'relationship_type' => 'one-to-many',
  ),
  'c_sponsors_assigned_user' => 
  array (
    'name' => 'c_sponsors_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Sponsors',
    'rhs_table' => 'c_sponsors',
    'rhs_key' => 'assigned_user_id',
    'relationship_type' => 'one-to-many',
  ),
);