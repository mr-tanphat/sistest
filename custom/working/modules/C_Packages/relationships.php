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
  'c_programs_c_packages_1' => 
  array (
    'id' => '22f45c19-d87d-f8ab-db98-53482d36541d',
    'relationship_name' => 'c_programs_c_packages_1',
    'lhs_module' => 'C_Programs',
    'lhs_table' => 'c_programs',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
    'rhs_key' => 'id',
    'join_table' => 'c_programs_c_packages_1_c',
    'join_key_lhs' => 'c_programs_c_packages_1c_programs_ida',
    'join_key_rhs' => 'c_programs_c_packages_1c_packages_idb',
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
  'c_packages_modified_user' => 
  array (
    'id' => 'c94ec119-b62b-b008-33f5-53482d6707b3',
    'relationship_name' => 'c_packages_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
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
    'from_studio' => true,
  ),
  'c_packages_created_by' => 
  array (
    'id' => 'cd627361-21f4-2c4d-1642-53482daec34d',
    'relationship_name' => 'c_packages_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
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
    'from_studio' => true,
  ),
  'c_packages_assigned_user' => 
  array (
    'id' => 'e3790c4e-880b-b8dd-91bd-53482d383f13',
    'relationship_name' => 'c_packages_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Packages',
    'rhs_table' => 'c_packages',
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
    'from_studio' => true,
  ),
  'c_packages_opportunities_1' => 
  array (
    'rhs_label' => 'Opportunities',
    'lhs_label' => 'Packages',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'C_Packages',
    'rhs_module' => 'Opportunities',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'c_packages_opportunities_1',
  ),
);