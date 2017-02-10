<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-07-21 16:29:24
$dictionary["C_Refunds"]["fields"]["c_payments_c_refunds_1"] = array (
  'name' => 'c_payments_c_refunds_1',
  'type' => 'link',
  'relationship' => 'c_payments_c_refunds_1',
  'source' => 'non-db',
  'module' => 'C_Payments',
  'bean_name' => 'C_Payments',
  'vname' => 'LBL_C_PAYMENTS_C_REFUNDS_1_FROM_C_PAYMENTS_TITLE',
  'id_name' => 'c_payments_c_refunds_1c_payments_ida',
);
$dictionary["C_Refunds"]["fields"]["c_payments_c_refunds_1_name"] = array (
  'name' => 'c_payments_c_refunds_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_PAYMENTS_C_REFUNDS_1_FROM_C_PAYMENTS_TITLE',
  'save' => true,
  'id_name' => 'c_payments_c_refunds_1c_payments_ida',
  'link' => 'c_payments_c_refunds_1',
  'table' => 'c_payments',
  'module' => 'C_Payments',
  'rname' => 'name',
);
$dictionary["C_Refunds"]["fields"]["c_payments_c_refunds_1c_payments_ida"] = array (
  'name' => 'c_payments_c_refunds_1c_payments_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_PAYMENTS_C_REFUNDS_1_FROM_C_PAYMENTS_TITLE_ID',
  'id_name' => 'c_payments_c_refunds_1c_payments_ida',
  'link' => 'c_payments_c_refunds_1',
  'table' => 'c_payments',
  'module' => 'C_Payments',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'left',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2014-04-18 09:33:01
$dictionary["C_Refunds"]["fields"]["contacts_c_refunds_1"] = array (
  'name' => 'contacts_c_refunds_1',
  'type' => 'link',
  'relationship' => 'contacts_c_refunds_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_C_REFUNDS_TITLE',
  'id_name' => 'contacts_c_refunds_1contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Refunds"]["fields"]["contacts_c_refunds_1_name"] = array (
  'name' => 'contacts_c_refunds_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_refunds_1contacts_ida',
  'link' => 'contacts_c_refunds_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Refunds"]["fields"]["contacts_c_refunds_1contacts_ida"] = array (
  'name' => 'contacts_c_refunds_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_C_REFUNDS_TITLE_ID',
  'id_name' => 'contacts_c_refunds_1contacts_ida',
  'link' => 'contacts_c_refunds_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


 // created: 2014-06-04 16:39:33
$dictionary['C_Refunds']['fields']['refund_amount']['required']=true;
$dictionary['C_Refunds']['fields']['refund_amount']['options']='numeric_range_search_dom';
$dictionary['C_Refunds']['fields']['refund_amount']['enable_range_search']='1';

 

// created: 2014-04-30 19:59:14
$dictionary["C_Refunds"]["fields"]["opportunities_c_refunds_1"] = array (
  'name' => 'opportunities_c_refunds_1',
  'type' => 'link',
  'relationship' => 'opportunities_c_refunds_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_C_REFUNDS_1_FROM_C_REFUNDS_TITLE',
  'id_name' => 'opportunities_c_refunds_1opportunities_ida',
  'link-type' => 'one',
);
$dictionary["C_Refunds"]["fields"]["opportunities_c_refunds_1_name"] = array (
  'name' => 'opportunities_c_refunds_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_C_REFUNDS_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_c_refunds_1opportunities_ida',
  'link' => 'opportunities_c_refunds_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["C_Refunds"]["fields"]["opportunities_c_refunds_1opportunities_ida"] = array (
  'name' => 'opportunities_c_refunds_1opportunities_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_C_REFUNDS_1_FROM_C_REFUNDS_TITLE_ID',
  'id_name' => 'opportunities_c_refunds_1opportunities_ida',
  'link' => 'opportunities_c_refunds_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);

?>