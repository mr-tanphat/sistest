<?php
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