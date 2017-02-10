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
  'from_contacts_payment' => 
  array (
    'id' => '3d720d73-ddd2-f43e-759e-55ae107aa5d9',
    'relationship_name' => 'from_contacts_payment',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'from_student_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'c_payments_modified_user' => 
  array (
    'id' => 'e6b6b28a-af39-8cf9-2ea3-55ae10d5037a',
    'relationship_name' => 'c_payments_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
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
  'c_payments_created_by' => 
  array (
    'id' => 'e6f81d64-28ba-bcb2-4037-55ae1085c200',
    'relationship_name' => 'c_payments_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
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
  'c_payments_assigned_user' => 
  array (
    'id' => 'e8048730-c524-9d13-f1bb-55ae106d5b19',
    'relationship_name' => 'c_payments_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
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
  'accounts_c_payments_1' => 
  array (
    'id' => 'acacda7a-648c-ef0f-7d06-55ae10a660a9',
    'relationship_name' => 'accounts_c_payments_1',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'join_table' => 'accounts_c_payments_1_c',
    'join_key_lhs' => 'accounts_c_payments_1accounts_ida',
    'join_key_rhs' => 'accounts_c_payments_1c_payments_idb',
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
  'contacts_c_payments_1' => 
  array (
    'id' => 'ae30ad49-606a-9b5c-9d7d-55ae10273c53',
    'relationship_name' => 'contacts_c_payments_1',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'join_table' => 'contacts_c_payments_1_c',
    'join_key_lhs' => 'contacts_c_payments_1contacts_ida',
    'join_key_rhs' => 'contacts_c_payments_1c_payments_idb',
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
  'contacts_c_payments_2' => 
  array (
    'id' => 'ae7b4778-27bc-8987-7782-55ae105d2ab5',
    'relationship_name' => 'contacts_c_payments_2',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'join_table' => 'contacts_c_payments_2_c',
    'join_key_lhs' => 'contacts_c_payments_2contacts_ida',
    'join_key_rhs' => 'contacts_c_payments_2c_payments_idb',
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
  'c_invoices_c_payments_1' => 
  array (
    'id' => 'b1c7f32c-181b-74e0-93f3-55ae10b40cf0',
    'relationship_name' => 'c_invoices_c_payments_1',
    'lhs_module' => 'C_Invoices',
    'lhs_table' => 'c_invoices',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'join_table' => 'c_invoices_c_payments_1_c',
    'join_key_lhs' => 'c_invoices_c_payments_1c_invoices_ida',
    'join_key_rhs' => 'c_invoices_c_payments_1c_payments_idb',
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
  'c_sponsors_c_payments_1' => 
  array (
    'id' => 'b509f76d-06b1-67d8-6546-55ae1045a2a1',
    'relationship_name' => 'c_sponsors_c_payments_1',
    'lhs_module' => 'C_Sponsors',
    'lhs_table' => 'c_sponsors',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'join_table' => 'c_sponsors_c_payments_1_c',
    'join_key_lhs' => 'c_sponsors_c_payments_1c_sponsors_ida',
    'join_key_rhs' => 'c_sponsors_c_payments_1c_payments_idb',
    'relationship_type' => 'one-to-one',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'leads_c_payments_1' => 
  array (
    'id' => 'b7372bf5-af02-2dc4-78c6-55ae103b457b',
    'relationship_name' => 'leads_c_payments_1',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Payments',
    'rhs_table' => 'c_payments',
    'rhs_key' => 'id',
    'join_table' => 'leads_c_payments_1_c',
    'join_key_lhs' => 'leads_c_payments_1leads_ida',
    'join_key_rhs' => 'leads_c_payments_1c_payments_idb',
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
  'c_payments_c_refunds_1' => 
  array (
    'lhs_module' => 'C_Payments',
    'rhs_module' => 'C_Refunds',
    'relationship_type' => 'one-to-one',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'c_payments_c_refunds_1',
  ),
);