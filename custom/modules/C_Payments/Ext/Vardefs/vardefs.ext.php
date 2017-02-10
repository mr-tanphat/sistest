<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-04-12 00:31:10
$dictionary["C_Payments"]["fields"]["accounts_c_payments_1"] = array (
  'name' => 'accounts_c_payments_1',
  'type' => 'link',
  'relationship' => 'accounts_c_payments_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_C_PAYMENTS_1_FROM_C_PAYMENTS_TITLE',
  'id_name' => 'accounts_c_payments_1accounts_ida',
  'link-type' => 'one',
);
$dictionary["C_Payments"]["fields"]["accounts_c_payments_1_name"] = array (
  'name' => 'accounts_c_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_PAYMENTS_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_c_payments_1accounts_ida',
  'link' => 'accounts_c_payments_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["C_Payments"]["fields"]["accounts_c_payments_1accounts_ida"] = array (
  'name' => 'accounts_c_payments_1accounts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_C_PAYMENTS_1_FROM_C_PAYMENTS_TITLE_ID',
  'id_name' => 'accounts_c_payments_1accounts_ida',
  'link' => 'accounts_c_payments_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


 // created: 2015-07-21 11:37:04
$dictionary['C_Payments']['fields']['description']['comments']='Full text of the note';
$dictionary['C_Payments']['fields']['description']['merge_filter']='disabled';
$dictionary['C_Payments']['fields']['description']['calculated']=false;
$dictionary['C_Payments']['fields']['description']['rows']='4';
$dictionary['C_Payments']['fields']['description']['cols']='60';

 

// created: 2014-04-12 00:27:35
$dictionary["C_Payments"]["fields"]["contacts_c_payments_1"] = array (
  'name' => 'contacts_c_payments_1',
  'type' => 'link',
  'relationship' => 'contacts_c_payments_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_STUDENT_NAME',
  'id_name' => 'contacts_c_payments_1contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Payments"]["fields"]["contacts_c_payments_1_name"] = array (
  'name' => 'contacts_c_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_STUDENT_NAME',
  'save' => true,
  'id_name' => 'contacts_c_payments_1contacts_ida',
  'link' => 'contacts_c_payments_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Payments"]["fields"]["contacts_c_payments_1contacts_ida"] = array (
  'name' => 'contacts_c_payments_1contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_STUDENT_NAME',
  'id_name' => 'contacts_c_payments_1contacts_ida',
  'link' => 'contacts_c_payments_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-06-18 09:48:49
$dictionary["C_Payments"]["fields"]["contacts_c_payments_2"] = array (
  'name' => 'contacts_c_payments_2',
  'type' => 'link',
  'relationship' => 'contacts_c_payments_2',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_C_PAYMENTS_2_FROM_C_PAYMENTS_TITLE',
  'id_name' => 'contacts_c_payments_2contacts_ida',
  'link-type' => 'one',
);
$dictionary["C_Payments"]["fields"]["contacts_c_payments_2_name"] = array (
  'name' => 'contacts_c_payments_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_PAYMENTS_2_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_c_payments_2contacts_ida',
  'link' => 'contacts_c_payments_2',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Payments"]["fields"]["contacts_c_payments_2contacts_ida"] = array (
  'name' => 'contacts_c_payments_2contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_C_PAYMENTS_2_FROM_C_PAYMENTS_TITLE_ID',
  'id_name' => 'contacts_c_payments_2contacts_ida',
  'link' => 'contacts_c_payments_2',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-07-21 16:29:24
$dictionary["C_Payments"]["fields"]["c_payments_c_refunds_1"] = array (
  'name' => 'c_payments_c_refunds_1',
  'type' => 'link',
  'relationship' => 'c_payments_c_refunds_1',
  'source' => 'non-db',
  'module' => 'C_Refunds',
  'bean_name' => 'C_Refunds',
  'vname' => 'LBL_C_PAYMENTS_C_REFUNDS_1_FROM_C_REFUNDS_TITLE',
  'id_name' => 'c_payments_c_refunds_1c_refunds_idb',
);
$dictionary["C_Payments"]["fields"]["c_payments_c_refunds_1_name"] = array (
  'name' => 'c_payments_c_refunds_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_PAYMENTS_C_REFUNDS_1_FROM_C_REFUNDS_TITLE',
  'save' => true,
  'id_name' => 'c_payments_c_refunds_1c_refunds_idb',
  'link' => 'c_payments_c_refunds_1',
  'table' => 'c_refunds',
  'module' => 'C_Refunds',
  'rname' => 'document_name',
);
$dictionary["C_Payments"]["fields"]["c_payments_c_refunds_1c_refunds_idb"] = array (
  'name' => 'c_payments_c_refunds_1c_refunds_idb',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_PAYMENTS_C_REFUNDS_1_FROM_C_REFUNDS_TITLE_ID',
  'id_name' => 'c_payments_c_refunds_1c_refunds_idb',
  'link' => 'c_payments_c_refunds_1',
  'table' => 'c_refunds',
  'module' => 'C_Refunds',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'left',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2014-12-10 14:10:59
$dictionary["C_Payments"]["fields"]["c_sponsors_c_payments_1"] = array (
  'name' => 'c_sponsors_c_payments_1',
  'type' => 'link',
  'relationship' => 'c_sponsors_c_payments_1',
  'source' => 'non-db',
  'module' => 'C_Sponsors',
  'bean_name' => 'C_Sponsors',
  'vname' => 'LBL_C_SPONSORS_C_PAYMENTS_1_FROM_C_SPONSORS_TITLE',
  'id_name' => 'c_sponsors_c_payments_1c_sponsors_ida',
);
$dictionary["C_Payments"]["fields"]["c_sponsors_c_payments_1_name"] = array (
  'name' => 'c_sponsors_c_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_SPONSORS_C_PAYMENTS_1_FROM_C_SPONSORS_TITLE',
  'save' => true,
  'id_name' => 'c_sponsors_c_payments_1c_sponsors_ida',
  'link' => 'c_sponsors_c_payments_1',
  'table' => 'c_sponsors',
  'module' => 'C_Sponsors',
  'rname' => 'name',
);
$dictionary["C_Payments"]["fields"]["c_sponsors_c_payments_1c_sponsors_ida"] = array (
  'name' => 'c_sponsors_c_payments_1c_sponsors_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_SPONSORS_C_PAYMENTS_1_FROM_C_SPONSORS_TITLE_ID',
  'id_name' => 'c_sponsors_c_payments_1c_sponsors_ida',
  'link' => 'c_sponsors_c_payments_1',
  'table' => 'c_sponsors',
  'module' => 'C_Sponsors',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'left',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2014-04-12 00:20:01
$dictionary["C_Payments"]["fields"]["c_invoices_c_payments_1"] = array (
  'name' => 'c_invoices_c_payments_1',
  'type' => 'link',
  'relationship' => 'c_invoices_c_payments_1',
  'source' => 'non-db',
  'module' => 'C_Invoices',
  'bean_name' => 'C_Invoices',
  'side' => 'right',
  'vname' => 'LBL_C_INVOICES_C_PAYMENTS_1_FROM_C_PAYMENTS_TITLE',
  'id_name' => 'c_invoices_c_payments_1c_invoices_ida',
  'link-type' => 'one',
);
$dictionary["C_Payments"]["fields"]["c_invoices_c_payments_1_name"] = array (
  'name' => 'c_invoices_c_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_INVOICES_C_PAYMENTS_1_FROM_C_INVOICES_TITLE',
  'save' => true,
  'id_name' => 'c_invoices_c_payments_1c_invoices_ida',
  'link' => 'c_invoices_c_payments_1',
  'table' => 'c_invoices',
  'module' => 'C_Invoices',
  'rname' => 'name',
);
$dictionary["C_Payments"]["fields"]["c_invoices_c_payments_1c_invoices_ida"] = array (
  'name' => 'c_invoices_c_payments_1c_invoices_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_INVOICES_C_PAYMENTS_1_FROM_C_PAYMENTS_TITLE_ID',
  'id_name' => 'c_invoices_c_payments_1c_invoices_ida',
  'link' => 'c_invoices_c_payments_1',
  'table' => 'c_invoices',
  'module' => 'C_Invoices',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


    $dictionary["C_Payments"]["fields"]["subtotal"] = array (
        'name' => 'subtotal',
        'vname' => 'LBL_SUBTOTAL',
        'type' => 'currency',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'len' => 26,
        'size' => '20',
        'precision' => 2,
        'options' => 'numeric_range_search_dom',
    );
    $dictionary["C_Payments"]["fields"]["view_discount"] = array (
        'name' => 'view_discount',
        'vname' => 'LBL_VIEW_DISCOUNT',
        'type' => 'currency',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'len' => 16,
        'size' => '20',
        'precision' => 2,
        'options' => 'numeric_range_search_dom',
    );



// created: 2014-09-28 15:16:06
$dictionary["C_Payments"]["fields"]["leads_c_payments_1"] = array (
  'name' => 'leads_c_payments_1',
  'type' => 'link',
  'relationship' => 'leads_c_payments_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'side' => 'right',
  'vname' => 'LBL_LEADS_C_PAYMENTS_1_FROM_C_PAYMENTS_TITLE',
  'id_name' => 'leads_c_payments_1leads_ida',
  'link-type' => 'one',
);
$dictionary["C_Payments"]["fields"]["leads_c_payments_1_name"] = array (
  'name' => 'leads_c_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_C_PAYMENTS_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_c_payments_1leads_ida',
  'link' => 'leads_c_payments_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["C_Payments"]["fields"]["leads_c_payments_1leads_ida"] = array (
  'name' => 'leads_c_payments_1leads_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_C_PAYMENTS_1_FROM_C_PAYMENTS_TITLE_ID',
  'id_name' => 'leads_c_payments_1leads_ida',
  'link' => 'leads_c_payments_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);

?>