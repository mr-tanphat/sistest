<?php 
 $GLOBALS["dictionary"]["ProductBundle"]=array (
  'table' => 'product_bundles',
  'comment' => 'Quote groups',
  'fields' => 
  array (
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
      'relationship' => 'productbundles_team',
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
      'relationship' => 'productbundles_team_count_relationship',
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
      'relationship' => 'productbundles_teams',
      'bean_filter_field' => 'team_set_id',
      'rhs_key_override' => true,
      'source' => 'non-db',
      'vname' => 'LBL_TEAMS',
      'link_class' => 'TeamSetLink',
      'link_file' => 'modules/Teams/TeamSetLink.php',
      'studio' => 'false',
      'reportable' => false,
    ),
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_NAME',
      'type' => 'id',
      'required' => true,
      'reportable' => false,
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
      'vname' => 'LBL_ASSIGNED_TO',
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
      'vname' => 'LBL_ASSIGNED_TO',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'comment' => 'User who created record',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'dbType' => 'varchar',
      'type' => 'name',
      'len' => '255',
      'comment' => 'Name of the group',
    ),
    'bundle_stage' => 
    array (
      'name' => 'bundle_stage',
      'vname' => 'LBL_BUNDLE_STAGE',
      'type' => 'varchar',
      'len' => '255',
      'comment' => 'Processing stage of the group (ex: Draft)',
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Group description',
    ),
    'tax' => 
    array (
      'name' => 'tax',
      'vname' => 'LBL_TAX',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Tax rate applied to items in the group',
    ),
    'tax_usdollar' => 
    array (
      'name' => 'tax_usdollar',
      'vname' => 'LBL_TAX_USDOLLAR',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Total tax for all items in group in USD',
    ),
    'total' => 
    array (
      'name' => 'total',
      'vname' => 'LBL_TOTAL',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Total amount for all items in the group',
    ),
    'total_usdollar' => 
    array (
      'name' => 'total_usdollar',
      'vname' => 'LBL_TOTAL_USDOLLAR',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Total amount for all items in the group in USD',
    ),
    'subtotal_usdollar' => 
    array (
      'name' => 'subtotal_usdollar',
      'vname' => 'LBL_SUBTOTAL_USDOLLAR',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Group total minus tax and shipping in USD',
    ),
    'shipping_usdollar' => 
    array (
      'name' => 'shipping_usdollar',
      'vname' => 'LBL_SHIPPING',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Shipping charge for group in USD',
    ),
    'deal_tot' => 
    array (
      'name' => 'deal_tot',
      'vname' => 'LBL_DEAL_TOT',
      'type' => 'decimal',
      'len' => '26,2',
      'disable_num_format' => true,
      'comment' => 'discount amount',
    ),
    'deal_tot_usdollar' => 
    array (
      'name' => 'deal_tot_usdollar',
      'vname' => 'LBL_DEAL_TOT',
      'type' => 'decimal',
      'len' => '26,2',
      'disable_num_format' => true,
      'comment' => 'discount amount',
    ),
    'new_sub' => 
    array (
      'name' => 'new_sub',
      'vname' => 'LBL_NEW_SUB',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Group total minus discount and tax and shipping',
    ),
    'new_sub_usdollar' => 
    array (
      'name' => 'new_sub_usdollar',
      'vname' => 'LBL_NEW_SUB',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Group total minus discount and tax and shipping',
    ),
    'subtotal' => 
    array (
      'name' => 'subtotal',
      'vname' => 'LBL_SUBTOTAL',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Group total minus tax and shipping',
    ),
    'shipping' => 
    array (
      'name' => 'shipping',
      'vname' => 'LBL_SHIPPING',
      'type' => 'decimal',
      'len' => '26,6',
      'disable_num_format' => true,
      'comment' => 'Shipping charge for group',
    ),
    'currency_id' => 
    array (
      'name' => 'currency_id',
      'type' => 'currency_id',
      'dbType' => 'id',
      'required' => false,
      'reportable' => false,
      'default' => '-99',
      'comment' => 'Currency used',
    ),
    'products' => 
    array (
      'name' => 'products',
      'type' => 'link',
      'relationship' => 'product_bundle_product',
      'module' => 'Products',
      'bean_name' => 'Product',
      'source' => 'non-db',
      'rel_fields' => 
      array (
        'product_index' => 
        array (
          'type' => 'integer',
        ),
      ),
      'vname' => 'LBL_PRODUCTS',
    ),
    'quotes' => 
    array (
      'name' => 'quotes',
      'type' => 'link',
      'relationship' => 'product_bundle_quote',
      'module' => 'Quotes',
      'bean_name' => 'Quote',
      'source' => 'non-db',
      'rel_fields' => 
      array (
        'bundle_index' => 
        array (
          'type' => 'integer',
        ),
      ),
      'relationship_fields' => 
      array (
        'bundle_index' => 'bundle_index',
      ),
      'vname' => 'LBL_QUOTES',
    ),
    'product_bundle_notes' => 
    array (
      'name' => 'product_bundle_notes',
      'type' => 'link',
      'relationship' => 'product_bundle_note',
      'module' => 'ProductBundleNotes',
      'bean_name' => 'ProductBundleNote',
      'source' => 'non-db',
      'rel_fields' => 
      array (
        'note_index' => 
        array (
          'type' => 'integer',
        ),
      ),
      'vname' => 'LBL_NOTES',
    ),
  ),
  'indices' => 
  array (
    'team_set_product_bundles' => 
    array (
      'name' => 'idx_product_bundles_tmst_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'team_set_id',
      ),
    ),
    0 => 
    array (
      'name' => 'procuct_bundlespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_products_bundles',
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
    'productbundles_team_count_relationship' => 
    array (
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
    ),
    'productbundles_team' => 
    array (
      'lhs_module' => 'Teams',
      'lhs_table' => 'teams',
      'lhs_key' => 'id',
      'rhs_module' => 'ProductBundles',
      'rhs_table' => 'product_bundles',
      'rhs_key' => 'team_id',
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
  ),
  'related_calc_fields' => 
  array (
  ),
  'custom_fields' => false,
);