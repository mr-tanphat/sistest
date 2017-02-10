<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-04-12 00:29:43
$dictionary["C_Invoices"]["fields"]["accounts_c_invoices_1"] = array (
  'name' => 'accounts_c_invoices_1',
  'type' => 'link',
  'relationship' => 'accounts_c_invoices_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_C_INVOICES_1_FROM_C_INVOICES_TITLE',
  'id_name' => 'accounts_c_invoices_1accounts_ida',
  'link-type' => 'one',
);
$dictionary["C_Invoices"]["fields"]["accounts_c_invoices_1_name"] = array (
  'name' => 'accounts_c_invoices_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_INVOICES_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_c_invoices_1accounts_ida',
  'link' => 'accounts_c_invoices_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["C_Invoices"]["fields"]["accounts_c_invoices_1accounts_ida"] = array (
  'name' => 'accounts_c_invoices_1accounts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_INVOICES_1_FROM_C_INVOICES_TITLE_ID',
  'id_name' => 'accounts_c_invoices_1accounts_ida',
  'link' => 'accounts_c_invoices_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


 // created: 2014-06-04 14:23:05
$dictionary['C_Invoices']['fields']['amount']['options']='numeric_range_search_dom';
$dictionary['C_Invoices']['fields']['amount']['enable_range_search']='1';

 

 // created: 2014-04-12 11:51:55
$dictionary['C_Invoices']['fields']['name']['full_text_search']=array (
);

 

 // created: 2014-06-04 14:23:38
$dictionary['C_Invoices']['fields']['balance']['options']='numeric_range_search_dom';
$dictionary['C_Invoices']['fields']['balance']['enable_range_search']='1';

 

// created: 2014-04-12 00:24:13
$dictionary["C_Invoices"]["fields"]["c_invoices_opportunities_1"] = array (
  'name' => 'c_invoices_opportunities_1',
  'type' => 'link',
  'relationship' => 'c_invoices_opportunities_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_C_INVOICES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'c_invoices_opportunities_1opportunities_idb',
);
$dictionary["C_Invoices"]["fields"]["c_invoices_opportunities_1_name"] = array (
  'name' => 'c_invoices_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_INVOICES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'c_invoices_opportunities_1opportunities_idb',
  'link' => 'c_invoices_opportunities_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["C_Invoices"]["fields"]["c_invoices_opportunities_1opportunities_idb"] = array (
  'name' => 'c_invoices_opportunities_1opportunities_idb',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_INVOICES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE_ID',
  'id_name' => 'c_invoices_opportunities_1opportunities_idb',
  'link' => 'c_invoices_opportunities_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'left',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2014-04-12 00:20:01
$dictionary["C_Invoices"]["fields"]["c_invoices_c_payments_1"] = array (
  'name' => 'c_invoices_c_payments_1',
  'type' => 'link',
  'relationship' => 'c_invoices_c_payments_1',
  'source' => 'non-db',
  'module' => 'C_Payments',
  'bean_name' => 'C_Payments',
  'vname' => 'LBL_C_INVOICES_C_PAYMENTS_1_FROM_C_INVOICES_TITLE',
  'id_name' => 'c_invoices_c_payments_1c_invoices_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2014-04-12 00:26:05
$dictionary["C_Invoices"]["fields"]["contacts_c_invoices_1"] = array (
  'name' => 'contacts_c_invoices_1',
  'type' => 'link',
  'relationship' => 'contacts_c_invoices_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_INVOICES_1_FROM_C_INVOICES_TITLE',
  'id_name' => 'contacts_c_invoices_1contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Invoices"]["fields"]["contacts_c_invoices_1_name"] = array (
  'name' => 'contacts_c_invoices_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_INVOICES_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_invoices_1contacts_ida',
  'link' => 'contacts_c_invoices_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Invoices"]["fields"]["contacts_c_invoices_1contacts_ida"] = array (
  'name' => 'contacts_c_invoices_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_INVOICES_1_FROM_C_INVOICES_TITLE_ID',
  'id_name' => 'contacts_c_invoices_1contacts_ida',
  'link' => 'contacts_c_invoices_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);

?>