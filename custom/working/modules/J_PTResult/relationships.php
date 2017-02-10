<?php
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

$relationships = array (
  'j_ptresult_modified_user' => 
  array (
    'id' => '9e14089c-fba6-4386-e0cc-55dd79b00b5f',
    'relationship_name' => 'j_ptresult_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'modified_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'j_ptresult_created_by' => 
  array (
    'id' => '9e4cf323-300f-b91c-0dd5-55dd79843499',
    'relationship_name' => 'j_ptresult_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'created_by',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'j_ptresult_assigned_user' => 
  array (
    'id' => '9f49cfc5-ee75-eac8-9e18-55dd7916bd53',
    'relationship_name' => 'j_ptresult_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'assigned_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'j_ptresult_contacts_1' => 
  array (
    'id' => 'ce47556f-10ad-6e47-d95f-55dd794da4b4',
    'relationship_name' => 'j_ptresult_contacts_1',
    'lhs_module' => 'J_PTResult',
    'lhs_table' => 'j_ptresult',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'join_table' => 'j_ptresult_contacts_1_c',
    'join_key_lhs' => 'j_ptresult_contacts_1j_ptresult_ida',
    'join_key_rhs' => 'j_ptresult_contacts_1contacts_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'j_ptresult_leads_1' => 
  array (
    'id' => 'ce7fc03d-c304-cf45-8967-55dd79cfa1b9',
    'relationship_name' => 'j_ptresult_leads_1',
    'lhs_module' => 'J_PTResult',
    'lhs_table' => 'j_ptresult',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'join_table' => 'j_ptresult_leads_1_c',
    'join_key_lhs' => 'j_ptresult_leads_1j_ptresult_ida',
    'join_key_rhs' => 'j_ptresult_leads_1leads_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'meetings_j_ptresult_1' => 
  array (
    'id' => 'd075931c-e8bf-7198-6fb0-55dd7913694e',
    'relationship_name' => 'meetings_j_ptresult_1',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'J_PTResult',
    'rhs_table' => 'j_ptresult',
    'rhs_key' => 'id',
    'join_table' => 'meetings_j_ptresult_1_c',
    'join_key_lhs' => 'meetings_j_ptresult_1meetings_ida',
    'join_key_rhs' => 'meetings_j_ptresult_1j_ptresult_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
);