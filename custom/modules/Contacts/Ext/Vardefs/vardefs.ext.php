<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-08-05 14:40:26
$dictionary["Contact"]["fields"]["contacts_contacts_1"] = array (
  'name' => 'contacts_contacts_1',
  'type' => 'link',
  'relationship' => 'contacts_contacts_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_CONTACTS_1_FROM_CONTACTS_L_TITLE',
  'id_name' => 'contacts_contacts_1contacts_ida',
);
$dictionary["Contact"]["fields"]["contacts_contacts_1"] = array (
  'name' => 'contacts_contacts_1',
  'type' => 'link',
  'relationship' => 'contacts_contacts_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_CONTACTS_1_FROM_CONTACTS_R_TITLE',
  'id_name' => 'contacts_contacts_1contacts_ida',
);


/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
// created: 2014-10-08 08:28:57
$dictionary["Contact"]["fields"]["bc_survey_contacts"] = array (
  'name' => 'bc_survey_contacts',
  'type' => 'link',
  'relationship' => 'bc_survey_contacts',
  'source' => 'non-db',
  'module' => 'bc_survey',
  'bean_name' => false,
  'vname' => 'LBL_BC_SURVEY_CONTACTS_FROM_BC_SURVEY_TITLE',
);


// created: 2015-08-14 09:21:53
$dictionary["Contact"]["fields"]["j_class_contacts_1"] = array (
  'name' => 'j_class_contacts_1',
  'type' => 'link',
  'relationship' => 'j_class_contacts_1',
  'source' => 'non-db',
  'module' => 'J_Class',
  'bean_name' => 'J_Class',
  'vname' => 'LBL_J_CLASS_CONTACTS_1_FROM_J_CLASS_TITLE',
  'id_name' => 'j_class_contacts_1j_class_ida',
);


// created: 2015-09-23 15:23:34
$dictionary["Contact"]["fields"]["leads_contacts_1"] = array (
  'name' => 'leads_contacts_1',
  'type' => 'link',
  'relationship' => 'leads_contacts_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_CONTACTS_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_contacts_1leads_ida',
);


 // created: 2015-08-05 15:48:31
$dictionary['Contact']['fields']['school_name']['required']=true;
$dictionary['Contact']['fields']['school_name']['merge_filter']='disabled';
$dictionary['Contact']['fields']['school_name']['calculated']=false;

 

// created: 2015-09-07 09:33:54
$dictionary["Contact"]["fields"]["contacts_j_ptresult_1"] = array (
  'name' => 'contacts_j_ptresult_1',
  'type' => 'link',
  'relationship' => 'contacts_j_ptresult_1',
  'source' => 'non-db',
  'module' => 'J_PTResult',
  'bean_name' => 'J_PTResult',
  'vname' => 'LBL_CONTACTS_J_PTRESULT_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_j_ptresult_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


 // created: 2015-09-10 09:41:47
$dictionary['Contact']['fields']['primary_address_city']['required']=false;
$dictionary['Contact']['fields']['primary_address_city']['comments']='City for primary address';
$dictionary['Contact']['fields']['primary_address_city']['merge_filter']='disabled';
$dictionary['Contact']['fields']['primary_address_city']['calculated']=false;

 

 // created: 2015-08-05 15:44:00
$dictionary['Contact']['fields']['description']['comments']='Full text of the note';
$dictionary['Contact']['fields']['description']['merge_filter']='disabled';
$dictionary['Contact']['fields']['description']['calculated']=false;
$dictionary['Contact']['fields']['description']['rows']='4';
$dictionary['Contact']['fields']['description']['cols']='60';

 

 // created: 2015-09-10 09:42:28
$dictionary['Contact']['fields']['primary_address_country']['required']=false;
$dictionary['Contact']['fields']['primary_address_country']['comments']='Country for primary address';
$dictionary['Contact']['fields']['primary_address_country']['merge_filter']='disabled';
$dictionary['Contact']['fields']['primary_address_country']['calculated']=false;

 

// created: 2014-09-16 16:12:19
$dictionary["Contact"]["fields"]["c_memberships_contacts_2"] = array (
  'name' => 'c_memberships_contacts_2',
  'type' => 'link',
  'relationship' => 'c_memberships_contacts_2',
  'source' => 'non-db',
  'module' => 'C_Memberships',
  'bean_name' => 'C_Memberships',
  'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE',
  'id_name' => 'c_memberships_contacts_2c_memberships_ida',
);
$dictionary["Contact"]["fields"]["c_memberships_contacts_2_name"] = array (
  'name' => 'c_memberships_contacts_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE',
  'save' => true,
  'id_name' => 'c_memberships_contacts_2c_memberships_ida',
  'link' => 'c_memberships_contacts_2',
  'table' => 'c_memberships',
  'module' => 'C_Memberships',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["c_memberships_contacts_2c_memberships_ida"] = array (
  'name' => 'c_memberships_contacts_2c_memberships_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE_ID',
  'id_name' => 'c_memberships_contacts_2c_memberships_ida',
  'link' => 'c_memberships_contacts_2',
  'table' => 'c_memberships',
  'module' => 'C_Memberships',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'left',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-06-18 09:48:49
$dictionary["Contact"]["fields"]["contacts_c_payments_2"] = array (
  'name' => 'contacts_c_payments_2',
  'type' => 'link',
  'relationship' => 'contacts_c_payments_2',
  'source' => 'non-db',
  'module' => 'C_Payments',
  'bean_name' => 'C_Payments',
  'vname' => 'LBL_CONTACTS_C_PAYMENTS_2_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_payments_2contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


$dictionary['Contact']['fields']['phone_mobile']['type'] = 'function';
$dictionary['Contact']['fields']['phone_mobile']['function'] = array('name'=>'sms_phone', 'returns'=>'html', 'include'=>'custom/fieldFormat/sms_phone_fields.php');




 // created: 2015-09-13 07:14:26
$dictionary['Contact']['fields']['custom_checkbox_class']['merge_filter']='disabled';
$dictionary['Contact']['fields']['custom_checkbox_class']['calculated']=false;

 

// created: 2015-07-16 08:57:21
$dictionary["Contact"]["fields"]["contacts_j_feedback_1"] = array (
  'name' => 'contacts_j_feedback_1',
  'type' => 'link',
  'relationship' => 'contacts_j_feedback_1',
  'source' => 'non-db',
  'module' => 'J_Feedback',
  'bean_name' => 'J_Feedback',
  'vname' => 'LBL_CONTACTS_J_FEEDBACK_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_j_feedback_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


 // created: 2014-07-23 10:25:28
$dictionary['Contact']['fields']['lead_source']['len']=100;
$dictionary['Contact']['fields']['lead_source']['comments']='How did the contact come about';
$dictionary['Contact']['fields']['lead_source']['merge_filter']='disabled';
$dictionary['Contact']['fields']['lead_source']['calculated']=false;
$dictionary['Contact']['fields']['lead_source']['dependency']=false;

 

// created: 2014-04-18 09:33:01
$dictionary["Contact"]["fields"]["contacts_c_refunds_1"] = array (
  'name' => 'contacts_c_refunds_1',
  'type' => 'link',
  'relationship' => 'contacts_c_refunds_1',
  'source' => 'non-db',
  'module' => 'C_Refunds',
  'bean_name' => 'C_Refunds',
  'vname' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_refunds_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2016-05-23 03:55:52
$dictionary['Contact']['fields']['contact_c_sms'] = array (
								  'name' => 'contact_c_sms',
									'type' => 'link',
									'relationship' => 'contact_c_sms',
									'source'=>'non-db',
									'vname'=>'LBL_C_SMS',
							);



 // created: 2015-08-06 08:45:24
$dictionary['Contact']['fields']['phone_mobile']['required']=true;
$dictionary['Contact']['fields']['phone_mobile']['comments']='Mobile phone number of the contact';
$dictionary['Contact']['fields']['phone_mobile']['merge_filter']='disabled';
$dictionary['Contact']['fields']['phone_mobile']['calculated']=false;

 

/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
// created: 2014-10-08 08:28:57
$dictionary["Contact"]["fields"]["bc_survey_submission_contacts"] = array (
  'name' => 'bc_survey_submission_contacts',
  'type' => 'link',
  'relationship' => 'bc_survey_submission_contacts',
  'source' => 'non-db',
  'module' => 'bc_survey_submission',
  'bean_name' => false,
  'side' => 'right',
  'vname' => 'LBL_BC_SURVEY_SUBMISSION_CONTACTS_FROM_BC_SURVEY_SUBMISSION_TITLE',
);


// created: 2015-08-05 12:10:56
$dictionary["Contact"]["fields"]["j_school_contacts_1"] = array (
  'name' => 'j_school_contacts_1',
  'type' => 'link',
  'relationship' => 'j_school_contacts_1',
  'source' => 'non-db',
  'module' => 'J_School',
  'bean_name' => 'J_School',
  'side' => 'right',
  'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'j_school_contacts_1j_school_ida',
  'link-type' => 'one',
);
$dictionary["Contact"]["fields"]["j_school_contacts_1_name"] = array (
  'name' => 'j_school_contacts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_J_SCHOOL_TITLE',
  'save' => true,
  'id_name' => 'j_school_contacts_1j_school_ida',
  'link' => 'j_school_contacts_1',
  'table' => 'j_school',
  'module' => 'J_School',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["j_school_contacts_1j_school_ida"] = array (
  'name' => 'j_school_contacts_1j_school_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_CONTACTS_TITLE_ID',
  'id_name' => 'j_school_contacts_1j_school_ida',
  'link' => 'j_school_contacts_1',
  'table' => 'j_school',
  'module' => 'J_School',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-08-06 14:27:38
$dictionary["Contact"]["fields"]["c_contacts_contacts_1"] = array (
  'name' => 'c_contacts_contacts_1',
  'type' => 'link',
  'relationship' => 'c_contacts_contacts_1',
  'source' => 'non-db',
  'module' => 'C_Contacts',
  'bean_name' => 'C_Contacts',
  'side' => 'right',
  'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'c_contacts_contacts_1c_contacts_ida',
  'link-type' => 'one',
);
$dictionary["Contact"]["fields"]["c_contacts_contacts_1_name"] = array (
  'name' => 'c_contacts_contacts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_C_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'c_contacts_contacts_1c_contacts_ida',
  'link' => 'c_contacts_contacts_1',
  'table' => 'c_contacts',
  'module' => 'C_Contacts',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["c_contacts_contacts_1c_contacts_ida"] = array (
  'name' => 'c_contacts_contacts_1c_contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_CONTACTS_TITLE_ID',
  'id_name' => 'c_contacts_contacts_1c_contacts_ida',
  'link' => 'c_contacts_contacts_1',
  'table' => 'c_contacts',
  'module' => 'C_Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2014-04-12 00:26:05
$dictionary["Contact"]["fields"]["contacts_c_invoices_1"] = array (
  'name' => 'contacts_c_invoices_1',
  'type' => 'link',
  'relationship' => 'contacts_c_invoices_1',
  'source' => 'non-db',
  'module' => 'C_Invoices',
  'bean_name' => 'C_Invoices',
  'vname' => 'LBL_CONTACTS_C_INVOICES_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_invoices_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


 // created: 2015-09-10 09:42:14
$dictionary['Contact']['fields']['primary_address_state']['required']=false;
$dictionary['Contact']['fields']['primary_address_state']['comments']='State for primary address';
$dictionary['Contact']['fields']['primary_address_state']['merge_filter']='disabled';
$dictionary['Contact']['fields']['primary_address_state']['calculated']=false;

 

// created: 2014-03-28 15:45:52
$dictionary['Contact']['fields']['picture'] = array(
    'name' => 'picture',
    'vname' => 'LBL_PICTURE_FILE',
    'type' => 'image',
    'dbtype' => 'varchar',
    'comment' => 'Picture file',
    'len' => 255,
    'width' => '120',
    'height' => '',
    'border' => '',
);
$dictionary['Contact']['fields']['gender']=array (
    'name' => 'gender',
    'vname' => 'LBL_GENDER',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
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
    'required'=>true,
);
$dictionary['Contact']['fields']['nationality']=array (
    'name' => 'nationality',
    'vname' => 'LBL_NATIONALITY',
    'type' => 'varchar',
    'len' => '100',
    'comment' => '',
    'merge_filter' => 'disabled',
);
$dictionary['Contact']['fields']['occupation']=array (
    'name' => 'occupation',
    'vname' => 'LBL_OCCUPATION',
    'type' => 'varchar',
    'len' => '255',
    'comment' => ''
);
$dictionary['Contact']['fields']['nick_name']=array (
    'name' => 'nick_name',
    'vname' => 'LBL_NICK_NAME',
    'type' => 'varchar',
    'len' => '100',
    'comment' => ''
);
$dictionary['Contact']['fields']['other_mobile']=array (
    'name' => 'other_mobile',
    'vname' => 'LBL_OTHER_MOBILE',
    'type' => 'phone',
    'dbType' => 'varchar',
    'len' => '50',
);
$dictionary['Contact']['fields']['password_generated']=array (
    'name' => 'password_generated',
    'vname' => 'LBL_PASS',
    'type' => 'varchar',
    'len' => '50',
);
$dictionary["Contact"]["fields"]["issues_content"] = array (
    'name' => 'issues_content',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_ISSUES_CONTENT',
);
$dictionary["Contact"]["fields"]["issues_fee"] = array (
    'name' => 'issues_fee',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_ISSUES_FEE',
);
$dictionary["Contact"]["fields"]["issues_other"] = array (
    'name' => 'issues_other',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_ISSUES_OTHER',
);
$dictionary["Contact"]["fields"]["free_balance"] = array (
    'name' => 'free_balance',
    'vname' => 'LBL_FREE_BALANCE',
    'type' => 'currency',
    'dbType' => 'double',
    'default' => 0,
    'duplicate_merge'=>'disabled',
    'enable_range_search' => true,
    'options' => 'numeric_range_search_dom',
    'audited' => false,
);

$dictionary["Contact"]["fields"]["school_name"] = array (
    'name' => 'school_name',
    'vname' => 'LBL_SCHOOL_NAME',
    'type' => 'varchar',
    'len' => '200',
);
$dictionary["Contact"]["fields"]["class_name"] = array (
    'name' => 'class_name',
    'vname' => 'LBL_CLASS_NAME',
    'type' => 'varchar',
    'len' => '200',
);
$dictionary['Contact']['fields']['class_year'] = array (
    'name' => 'class_year',
    'vname' => 'LBL_CLASS_YEAR',
    'type' => 'int',
    'dbType' => 'varchar',
    'len' => 5,
    'size' => '5',
    'enable_range_search' => true,
    'options' => 'numeric_range_search_dom',
    'studio'    => 'visible',
    'massupdate' => false,
);

$dictionary["Contact"]["fields"]["closed_date"] = array (
    'name' => 'closed_date',
    'vname' => 'LBL_CLOSED_DATE',
    'type' => 'date',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
    'massupdate' => 0,
);

$dictionary["Contact"]["fields"]["contact_status"] = array (
    'name' => 'contact_status',
    'vname' => 'LBL_CONTACT_STATUS',
    'type' => 'enum',
    'comments' => '',
    'help' => '',
    'default' => 'Waiting for class',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => 20,
    'size' => '20',
    'options' => 'contact_status_list',
    'studio' => 'visible',
    'massupdate' => 0,
);

$dictionary["Contact"]["fields"]["type"] = array (
    'name' => 'type',
    'vname' => 'LBL_TYPE',
    'massupdate' => 0,
    'type' => 'enum',
    'default' => 'Public',
    'len' => '20',
    'options' => 'student_type_list',
    'studio' => 'visible',
);
//Bo sung field non-db cho import HV vao contract
$dictionary["Contact"]["fields"]["checkbox"] = array (
    'name' => 'checkbox',
    'vname' => 'LBL_CHECKBOX',
    'type'        => 'varchar',
    'len'        => '1',
    'source'    => 'non-db',
    'reportable' => false,
    'studio'=>true,
);
$dictionary["Contact"]["fields"]["subpanel_button"] = array (
    'name' => 'subpanel_button',
    'vname' => 'LBL_SUBPANEL_BUTTON',
    'type'        => 'varchar',
    'len'        => '1',
    'source'    => 'non-db',
    'reportable' => false,
    'studio'=>true,
);

//Add new field - 30/07/2014 - by MTN
$dictionary['Contact']['fields']['current_stage']=array (
    'name' => 'current_stage',
    'vname' => 'LBL_CURRENT_STAGE',
    'type' => 'enum',
    'reportable' => true,
    'len' => 50,
    'size' => '20',
    'options' => 'stage_score_list',
    'massupdate' => false,
);

$dictionary['Contact']['fields']['current_level']=array (
    'name' => 'current_level',
    'vname' => 'LBL_CURRENT_LEVEL',
    'type' => 'enum',
    'default' => '1',
    'reportable' => true,
    'len' => 2,
    'size' => '20',
    'options' => 'level_score_list',
    'massupdate' => 0,
);
// Relationship Student ( 1 - n ) Attendance - Lap Nguyen
$dictionary['Contact']['relationships']['student_attendances'] = array(
    'lhs_module'        => 'Contacts',
    'lhs_table'            => 'contacts',
    'lhs_key'            => 'id',
    'rhs_module'        => 'C_Attendance',
    'rhs_table'            => 'c_attendance',
    'rhs_key'            => 'student_id',
    'relationship_type'    => 'one-to-many',
);

$dictionary['Contact']['fields']['student_attendances'] = array(
    'name' => 'student_attendances',
    'type' => 'link',
    'relationship' => 'student_attendances',
    'module' => 'C_Attendance',
    'bean_name' => 'C_Attendance',
    'source' => 'non-db',
    'vname' => 'LBL_ATTENDANCE',
);
// END: Relationship Student ( 1 - n ) Attendance - Lap Nguyen


// Relationship Student ( 1 - n ) Delivery Revenue
$dictionary['Contact']['relationships']['student_revenue'] = array(
    'lhs_module'        => 'Contacts',
    'lhs_table'            => 'contacts',
    'lhs_key'            => 'id',
    'rhs_module'        => 'C_DeliveryRevenue',
    'rhs_table'            => 'c_deliveryrevenue',
    'rhs_key'            => 'student_id',
    'relationship_type'    => 'one-to-many',
);

$dictionary['Contact']['fields']['student_revenue'] = array(
    'name' => 'student_revenue',
    'type' => 'link',
    'relationship' => 'student_revenue',
    'module' => 'C_DeliveryRevenue',
    'bean_name' => 'C_DeliveryRevenue',
    'source' => 'non-db',
    'vname' => 'LBL_DELIVERY_REVENUE',
);
//END: Relationship Student ( 1 - n ) Delivery Revenue

// Relationship Student ( 1 - n ) Carry Forward
$dictionary['Contact']['relationships']['student_forward'] = array(
    'lhs_module'        => 'Contacts',
    'lhs_table'            => 'contacts',
    'lhs_key'            => 'id',
    'rhs_module'        => 'C_Carryforward',
    'rhs_table'            => 'c_carryforward',
    'rhs_key'            => 'student_id',
    'relationship_type'    => 'one-to-many',
);

$dictionary['Contact']['fields']['student_forward'] = array(
    'name' => 'student_forward',
    'type' => 'link',
    'relationship' => 'student_forward',
    'module' => 'C_Carryforward',
    'bean_name' => 'C_Carryforward',
    'source' => 'non-db',
    'vname' => 'LBL_CARRYFORWARD',
);
$dictionary['Contact']['fields']['lead_source_description'] = array(
    'name' => 'lead_source_description',
    'vname' => 'LBL_LEAD_SOURCE_DESCRIPTION',
    'type' => 'text',
    'group'=>'lead_source',
    'comment' => 'Description of the lead source',
    'rows' => '4',
	'cols' => '40',
);
//END: Relationship Student ( 1 - n ) Carry Forward

$dictionary['Contact']['fields']['last_name']['required']=true;
$dictionary['Contact']['fields']['guardian_name']=array (
    'name' => 'guardian_name',
    'vname' => 'LBL_GUARDIAN_NAME',
    'type' => 'varchar',
    'len' => '100',
    'comment' => '',
    'merge_filter' => 'disabled',
);

$dictionary['Contact']['fields']['guardian_email']=array (
    'name' => 'guardian_email',
    'vname' => 'LBL_GUARDIAN_EMAIL',
    'type' => 'varchar',
    'len' => '100',
    'comment' => '',
    'merge_filter' => 'disabled',
);

$dictionary['Contact']['fields']['guardian_phone']=array (
    'name' => 'guardian_phone',
    'vname' => 'LBL_GUARDIAN_PHONE',
    'type' => 'varchar',
    'len' => '100',
    'comment' => '',
    'merge_filter' => 'disabled',
);
$dictionary["Contact"]["fields"]["relationship"] = array (
    'name'      => 'relationship',
    'vname'     => 'LBL_RELATIONSHIP',
    'type'      => 'text',
    'source' => 'non-db',
    'studio'    => 'visible',
);
$dictionary["Contact"]["fields"]["describe_relationship"] = array (
    'name'      => 'describe_relationship',
    'vname'     => 'LBL_DESCRIBE_RELATIONSHIP',
    'type'      => 'text',
    'help' => 'help',
    'importable' => 'true',
    'duplicate_merge' => 'enabled',
    'duplicate_merge_dom_value' => '1',
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '4',
	'cols' => '40',
);
$dictionary['Contact']['fields']['preferred_kind_of_course'] = array (
    'name' => 'preferred_kind_of_course',
    'vname' => 'LBL_PREFERRED_KIND_OF_COURSE',
    'type' => 'enum',
    'massupdate' => false,
    'default' => '',
    'comments' => 'comment',
    'help' => 'help',
    'importable' => 'true',
    'duplicate_merge' => 'enabled',
    'duplicate_merge_dom_value' => '1',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'full_kind_of_course_list',
    'studio' => 'visible',
    'dependency' => false,
);
$dictionary['Contact']['fields']['company_name'] = array (
    'name' => 'company_name',
    'vname' => 'LBL_COMPANY_NAME',
    'type' => 'varchar',
    'len' => '255',
    'unified_search' => true,
    'full_text_search' => array('boost' => 3),
);
$dictionary['Contact']['fields']['contact_rela'] = array (
    'name' => 'contact_rela',
    'vname' => 'LBL_CONTACT_RELA',
    'type' => 'enum',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => 20,
    'size' => '20',
    'options' => 'rela_contacts_list',
    'studio' => 'visible',
    'massupdate' => 0,
);
$dictionary["Contact"]["fields"]["study_apollo_before"] = array (
    'name' => 'study_apollo_before',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_STUDY_APOLLO_BEFORE',
    'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Contact"]["fields"]["study_other_before"] = array (
    'name' => 'study_other_before',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_STUDY_OTHER_BEFORE',
    'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Contact"]["fields"]["time_study_english"] = array (
    'name' => 'time_study_english',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_TIME_STUDY_ENGLISH',
    'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Contact"]["fields"]["study_with_before"] = array (
    'name' => 'study_with_before',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_STUDY_WITH_BEFORE',
    'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Contact"]["fields"]["strong_skills"] = array (
    'name' => 'strong_skills',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_STRONG_SKILLS',
    'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Contact"]["fields"]["weak_skills"] = array (
    'name' => 'weak_skills',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_WEAK_SKILLS',
    'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Contact"]["fields"]["expectation"] = array (
    'name' => 'expectation',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_EXPECTATION',
    'rows' => '4',
	'cols' => '40',
);
$dictionary["Contact"]["fields"]["other_note"] = array (
    'name' => 'other_note',
    'type' => 'text',
    'studio' => 'visible',
    'vname'=> 'LBL_OTHER_NOTE',
    'rows' => '4',
	'cols' => '40',
);

//Custom Relationship JUNIOR. Student - StudentSituation  By Lap Nguyen
$dictionary['Contact']['fields']['ju_studentsituations'] = array (
    'name' => 'ju_studentsituations',
    'type' => 'link',
    'relationship' => 'contact_studentsituations',
    'module' => 'J_StudentSituations',
    'bean_name' => 'J_StudentSituations',
    'source' => 'non-db',
    'vname' => 'LBL_STUDENT_SITUATION',
);
$dictionary['Contact']['relationships']['contact_studentsituations'] = array (
    'lhs_module'        => 'Contacts',
    'lhs_table'            => 'contacts',
    'lhs_key'            => 'id',
    'rhs_module'        => 'J_StudentSituations',
    'rhs_table'            => 'j_studentsituations',
    'rhs_key'            => 'student_id',
    'relationship_type'    => 'one-to-many',
);

//Custom Relationship JUNIOR. Student - Voucher  By Lap Nguyen
$dictionary['Contact']['fields']['ju_vouchers'] = array (
    'name' => 'ju_vouchers',
    'type' => 'link',
    'relationship' => 'contact_vouchers',
    'module' => 'J_Voucher',
    'bean_name' => 'J_Voucher',
    'source' => 'non-db',
    'vname' => 'LBL_VOUCHER',
);
$dictionary['Contact']['relationships']['contact_vouchers'] = array (
    'lhs_module'        => 'Contacts',
    'lhs_table'            => 'contacts',
    'lhs_key'            => 'id',
    'rhs_module'        => 'J_Voucher',
    'rhs_table'            => 'j_voucher',
    'rhs_key'            => 'student_id',
    'relationship_type'    => 'one-to-many',
);

//Custom Relationship JUNIOR. Student - SMS  By Lap Nguyen
$dictionary['Contact']['fields']['contacts_sms'] = array (
    'name' => 'contacts_sms',
    'type' => 'link',
    'relationship' => 'contact_smses',
    'module' => 'C_SMS',
    'bean_name' => 'C_SMS',
    'source' => 'non-db',
    'vname' => 'LBL_STUDENT_SMS',
);
$dictionary['Contact']['relationships']['contact_smses'] = array (
    'lhs_module'        => 'Contacts',
    'lhs_table'            => 'contacts',
    'lhs_key'            => 'id',
    'rhs_module'        => 'C_SMS',
    'rhs_table'            => 'c_sms',
    'rhs_key'            => 'parent_id',
    'relationship_type'    => 'one-to-many',
);
//add team type
$dictionary['Contact']['fields']['team_type'] = array(
    'name' => 'team_type',
    'vname' => 'LBL_TEAM_TYPE_STUDENT',
    'type' => 'enum',
    'importable' => 'true',
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'type_team_list',
    'studio' => 'visible',
);
// END: add team type

///// Custom checkbox sms
$dictionary['Contact']['fields']['custom_checkbox_class'] =
array (
    'name' => 'custom_checkbox_class',
    'vname' => 'LBL_CHECKBOX',
    'type'        => 'varchar',
    'len'        => '1',
    'source'    => 'non-db',
    'reportable' => false,
    'studio'=>true,
);


//Add some field for report by Hoang Quyen
$dictionary["Contact"]["fields"]["age"] = array (
    'name' => 'age',
    'type' => 'varchar',
    'len' => '30',
    'studio' => 'visible',
    'vname'=> 'LBL_CONTACT_AGE',
);
$dictionary["Contact"]["fields"]["pt_date"] = array (
    'name' => 'pt_date',
    'type' => 'varchar',
    'len' => '50',
    'studio' => 'visible',
    'vname'=> 'LBL_PT_DATE',
);
$dictionary["Contact"]["fields"]["demo_date"] = array (
    'name' => 'demo_date',
    'type' => 'varchar',
    'len' => '50',
    'studio' => 'visible',
    'vname'=> 'LBL_DEMO_DATE',
);
$dictionary["Contact"]["fields"]["payment_type"] = array (
    'name' => 'payment_type',
    'type' => 'varchar',
    'len' => '50',
    'studio' => 'visible',
    'vname'=> 'LBL_PAYMENT_METHOD',
);

//------------ Add by Tung Bui -------------------//
$dictionary['Contact']['fields']['sms_today'] = array (
    'name' => 'sms_today',
    'vname' => 'LBL_SMS_TODAY',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => true,
    'full_text_search' => array('boost' => 3),
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '50',
    'size' => '20',
);

//Somes file for check attendance
$dictionary['Contact']['fields']['contact_attendance'] =
array (
    'name' => 'contact_attendance',
    'rname' => 'id',
    'relationship_fields'=>array(
        'meeting_id' => 'attendance_id',
        'attendance' => 'display_attendance'
    ),
    'vname' => 'LBL_CONTACT_ATTENDANCE',
    'type' => 'relate',
    'link' => 'meetings',
    'link_type' => 'relationship_info',
    'join_link_name' => 'meetings_contacts',
    'source' => 'non-db',
    'importable' => 'false',
    'duplicate_merge'=> 'disabled',
    'studio' => false,
);
$dictionary['Contact']['fields']['display_attendance'] =
array(
    'massupdate' => false,
    'name' => 'display_attendance',
    'type' => 'varchar',
    'studio' => 'false',
    'source' => 'non-db',
    'vname' => 'LBL_ATTENDANCE',
    'importable' => 'false',
);
$dictionary['Contact']['fields']['attendance_id'] =
array(
    'name' => 'attendance_id',
    'type' => 'varchar',
    'source' => 'non-db',
    'vname' => 'LBL_ATTENDANCE_ID',
    'studio' => array('listview' => false),
);
$dictionary['Contact']['fields']['situation_type'] =
array(
    'massupdate' => false,
    'name' => 'situation_type',
    'type' => 'varchar',
    'studio' => 'false',
    'source' => 'non-db',
    'vname' => 'LBL_SITUATION_TYPE',
    'importable' => 'false',
);
//------------ END - Add by Tung Bui -------------------//

$dictionary['Contact']['relationships']['student_j_inventory'] = array(
    'lhs_module'        => 'Contacts',
    'lhs_table'            => 'contacts',
    'lhs_key'            => 'id',
    'rhs_module'        => 'J_Inventory',
    'rhs_table'            => 'j_inventory',
    'rhs_key'            => 'to_corp_id',
    'relationship_type'    => 'one-to-many',
);

$dictionary['Contact']['fields']['student_j_inventory'] = array(
    'name' => 'student_j_inventory',
    'type' => 'link',
    'relationship' => 'student_j_inventory',
    'module' => 'J_Inventory',
    'bean_name' => 'J_Inventory',
    'source' => 'non-db',
    'vname' => 'LBL_J_INVENTORY',
);
$dictionary['Contact']['fields']['student_j_gradebookdetail'] = array(
    'name' => 'student_j_gradebookdetail',
    'type' => 'link',
    'relationship' => 'student_j_gradebookdetail',
    'module' => 'J_GradebookDetail',
    'bean_name' => 'J_GradebookDetail',
    'source' => 'non-db',
    'vname' => 'LBL_GRADEBOOK_DETAIL',
);
$dictionary['Contact']['relationships']['student_j_gradebookdetail'] = array(
    'lhs_module'        => 'Contacts',
    'lhs_table'            => 'contacts',
    'lhs_key'            => 'id',
    'rhs_module'        => 'J_GradebookDetail',
    'rhs_table'            => 'j_gradebookdetail',
    'rhs_key'            => 'student_id',
    'relationship_type'    => 'one-to-many',
);

// created: 2014-07-15 14:40:52
$dictionary["Contact"]["fields"]["c_classes_contacts_1"] = array (
  'name' => 'c_classes_contacts_1',
  'type' => 'link',
  'relationship' => 'c_classes_contacts_1',
  'source' => 'non-db',
  'module' => 'C_Classes',
  'bean_name' => 'C_Classes',
  'vname' => 'LBL_C_CLASSES_CONTACTS_1_FROM_C_CLASSES_TITLE',
  'id_name' => 'c_classes_contacts_1c_classes_ida',
);


// created: 2014-04-12 00:27:35
$dictionary["Contact"]["fields"]["contacts_c_payments_1"] = array (
  'name' => 'contacts_c_payments_1',
  'type' => 'link',
  'relationship' => 'contacts_c_payments_1',
  'source' => 'non-db',
  'module' => 'C_Payments',
  'bean_name' => 'C_Payments',
  'vname' => 'LBL_CONTACTS_C_PAYMENTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_payments_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
$dictionary['Contact']['fields']['email1']['required'] = true;



 // created: 2015-08-05 15:47:38
$dictionary['Contact']['fields']['birthdate']['required']=true;
$dictionary['Contact']['fields']['birthdate']['comments']='The birthdate of the contact';
$dictionary['Contact']['fields']['birthdate']['merge_filter']='disabled';
$dictionary['Contact']['fields']['birthdate']['calculated']=false;
$dictionary['Contact']['fields']['birthdate']['enable_range_search']=true;
$dictionary['Contact']['fields']['birthdate']['options']='date_range_search_dom';

 

// created: 2015-07-14 16:44:03
$dictionary["Contact"]["fields"]["contacts_j_payment_1"] = array (
  'name' => 'contacts_j_payment_1',
  'type' => 'link',
  'relationship' => 'contacts_j_payment_1',
  'source' => 'non-db',
  'module' => 'J_Payment',
  'bean_name' => 'J_Payment',
  'vname' => 'LBL_CONTACTS_J_PAYMENT_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_j_payment_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


 // created: 2015-08-29 12:04:49
$dictionary['Contact']['fields']['primary_address_street']['required']=true;
$dictionary['Contact']['fields']['primary_address_street']['comments']='Street address for primary address';
$dictionary['Contact']['fields']['primary_address_street']['merge_filter']='disabled';
$dictionary['Contact']['fields']['primary_address_street']['calculated']=false;

 
?>