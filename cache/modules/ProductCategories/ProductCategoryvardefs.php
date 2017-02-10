<?php 
 $GLOBALS["dictionary"]["ProductCategory"]=array (
  'table' => 'product_categories',
  'comment' => 'Used to categorize products in the product catalog',
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
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'required' => false,
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'required' => true,
      'comment' => 'Date record created',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'required' => true,
      'comment' => 'Date record last modified',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED_ID',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED_ID',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'comment' => 'User who created record',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_LIST_NAME',
      'type' => 'name',
      'dbType' => 'varchar',
      'len' => '50',
      'comment' => 'Name of the product category',
      'importable' => 'required',
    ),
    'list_order' => 
    array (
      'name' => 'list_order',
      'vname' => 'LBL_LIST_ORDER',
      'type' => 'int',
      'len' => '4',
      'comment' => 'Order within list',
      'importable' => 'required',
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full desscription of the category',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_USER_NAME',
      'type' => 'varchar',
      'len' => '36',
      'comment' => 'The id of the user who owns the product category',
      'reportable' => true,
    ),
    'parent_id' => 
    array (
      'name' => 'parent_id',
      'vname' => 'LBL_PARENT_NAME',
      'type' => 'varchar',
      'len' => '36',
      'comment' => 'Parent category of this item; used for multi-tiered categorization',
      'reportable' => true,
    ),
    'categories' => 
    array (
      'name' => 'categories',
      'type' => 'link',
      'relationship' => 'member_categories',
      'module' => 'ProductCategories',
      'bean_name' => 'ProductCategory',
      'source' => 'non-db',
      'vname' => 'LBL_CATEGORIES',
    ),
    'parent_name' => 
    array (
      'name' => 'parent_name',
      'type' => 'varchar',
      'source' => 'non-db',
    ),
    'type' => 
    array (
      'name' => 'type',
      'type' => 'varchar',
      'source' => 'non-db',
    ),
  ),
  'acls' => 
  array (
    'SugarACLAdminOnly' => 
    array (
      'adminFor' => 'Products',
      'allowUserRead' => true,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'product_categoriespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_productcategories',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'name',
        1 => 'deleted',
      ),
    ),
  ),
  'relationships' => 
  array (
    'member_categories' => 
    array (
      'lhs_module' => 'ProductCategories',
      'lhs_table' => 'product_categories',
      'lhs_key' => 'id',
      'rhs_module' => 'ProductCategories',
      'rhs_table' => 'product_categories',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'related_calc_fields' => 
  array (
  ),
  'custom_fields' => false,
);