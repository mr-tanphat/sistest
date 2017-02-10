<?php
// created: 2014-03-28 15:45:52
$dictionary['Lead']['fields']['gender']=array (
	'name' => 'gender',
	'vname' => 'LBL_GENDER',
	'type' => 'enum',
	'massupdate' => 0,
	'default' => ' ',
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
$dictionary['Lead']['fields']['nationality']=array (
	'name' => 'nationality',
	'vname' => 'LBL_NATIONALITY',
	'type' => 'varchar',
	'len' => '100',
	'comment' => '',
	'merge_filter' => 'disabled',
);
$dictionary['Lead']['fields']['occupation']=array (
	'name' => 'occupation',
	'vname' => 'LBL_OCCUPATION',
	'type' => 'varchar',
	'len' => '255',
	'comment' => ''
);
$dictionary['Lead']['fields']['speaking']=array (
	'name' => 'speaking',
	'vname' => 'LBL_SPEAKING',
	'dbType' => 'decimal',
	'type' => 'decimal',
	'len' => '5,2',
);
$dictionary['Lead']['fields']['writing']=array (
	'name' => 'writing',
	'vname' => 'LBL_WRITING',
	'dbType' => 'decimal',
	'type' => 'decimal',
	'len' => '5,2',
);
$dictionary['Lead']['fields']['listening']=array (
	'name' => 'listening',
	'vname' => 'LBL_LISTENING',
	'dbType' => 'decimal',
	'type' => 'decimal',
	'len' => '5,2',
);
$dictionary['Lead']['fields']['reading']=array (
	'name' => 'reading',
	'vname' => 'LBL_READING',
	'dbType' => 'decimal',
	'type' => 'decimal',
	'len' => '5,2',
);
$dictionary['Lead']['fields']['gpa']=array (
	'name' => 'gpa',
	'vname' => 'LBL_GPA',
	'dbType' => 'decimal',
	'type' => 'decimal',
	'len' => '5,2',
);
$dictionary['Lead']['fields']['level']=array (
	'name' => 'level',
	'vname' => 'LBL_LEVEL_SCORE',
	'type' => 'enum',
	'comments' => '',
	'help' => '',
	'default' => '',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => false,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'len' => 30,
	'size' => '20',
	'options' => 'level_score_list',
	'studio' => 'visible',
	'massupdate' => false,
);  
$dictionary['Lead']['fields']['potential']=array (
	'name' => 'potential',
	'vname' => 'LBL_POTENTIAL',
	'type' => 'enum',
	'comments' => '',
	'help' => '',
	'default' => 'Interested',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => false,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'len' => 20,
	'size' => '20',
	'options' => 'level_lead_list',
	'studio' => 'visible',
);
$dictionary['Lead']['fields']['working_date']=array (
	'name' => 'working_date',
	'vname' => 'LBL_WORKING_DATE',
	'type' => 'date',
	'massupdate' => false,
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => false,
	'reportable' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'calculated' => false,
	'size' => '20',
	'enable_range_search' => true,
	'options' => 'date_range_search_dom',
);

$dictionary['Lead']['fields']['guardian_name']=array (
	'name' => 'guardian_name',
	'vname' => 'LBL_GUARDIAN_NAME',
	'type' => 'varchar',
	'len' => '100',
	'comment' => '',
	'merge_filter' => 'disabled',
);

$dictionary['Lead']['fields']['guardian_email']=array (
	'name' => 'guardian_email',
	'vname' => 'LBL_GUARDIAN_EMAIL',
	'type' => 'varchar',
	'len' => '100',
	'comment' => '',
	'merge_filter' => 'disabled',
);

$dictionary['Lead']['fields']['guardian_phone']=array (
	'name' => 'guardian_phone',
	'vname' => 'LBL_GUARDIAN_PHONE',
	'type' => 'phone',
	'dbType' => 'varchar',
	'len' => '50',
);
$dictionary["Lead"]["fields"]["issues_content"] = array (
	'name' => 'issues_content',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_ISSUES_CONTENT',
);
$dictionary["Lead"]["fields"]["issues_fee"] = array (
	'name' => 'issues_fee',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_ISSUES_FEE',
);
$dictionary["Lead"]["fields"]["issues_other"] = array (
	'name' => 'issues_other',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_ISSUES_OTHER',
);
$dictionary["Lead"]["fields"]["school_name"] = array (
	'name' => 'school_name',
	'vname' => 'LBL_SCHOOL_NAME',
	'type' => 'varchar',
	'options' => 'schools_list',
	'len' => '200',
);
$dictionary['Lead']['fields']['stage']=array (
	'name' => 'stage',
	'vname' => 'LBL_STAGE_SCORE',
	'type' => 'enum',
	'comments' => '',
	'help' => '',
	'default' => '',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => false,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'len' => 30,
	'size' => '20',
	'options' => 'stage_score_list',
	'studio' => 'visible',
	'massupdate' => 0,
);
$dictionary['Lead']['fields']['nick_name']=array (
	'name' => 'nick_name',
	'vname' => 'LBL_NICK_NAME',
	'type' => 'varchar',
	'len' => '100',
	'comment' => ''
);
$dictionary['Lead']['fields']['other_mobile']=array (
	'name' => 'other_mobile',
	'vname' => 'LBL_OTHER_MOBILE',
	'type' => 'phone',
	'dbType' => 'varchar',
	'len' => '50',
);
$dictionary["Lead"]["fields"]["age"] = array (
	'name' => 'age',
	'type' => 'varchar',
	'len' => '30',
	'studio' => 'visible',
	'vname'=> 'LBL_CONTACT_AGE',
);

// create by leduytan 13/09/2014
$dictionary['Lead']['fields']['voucher_code'] = array(
	'name' => 'voucher_code',
	'type' => 'varchar',
	'len' => 30,
	'vname' => 'LBL_VOUCHERS',
	'studio' => 'visible',
);

// Relationship Lead ( 1 - n ) Delivery Revenue
$dictionary['Lead']['relationships']['lead_revenue'] = array(
	'lhs_module'        => 'Leads',
	'lhs_table'            => 'leads',
	'lhs_key'            => 'id',
	'rhs_module'        => 'C_DeliveryRevenue',
	'rhs_table'            => 'c_deliveryrevenue',
	'rhs_key'            => 'lead_id',
	'relationship_type'    => 'one-to-many',
);

$dictionary['Lead']['fields']['lead_revenue'] = array(
	'name' => 'lead_revenue',
	'type' => 'link',
	'relationship' => 'lead_revenue',
	'module' => 'C_DeliveryRevenue',
	'bean_name' => 'C_DeliveryRevenue',
	'source' => 'non-db',
	'vname' => 'LBL_DELIVERY_REVENUE',
);
//END: Relationship Lead ( 1 - n ) Delivery Revenue   

// Relationship Lead ( 1 - n ) Carry Forward
$dictionary['Lead']['relationships']['lead_forward'] = array(
	'lhs_module'        => 'Leads',
	'lhs_table'            => 'leads',
	'lhs_key'            => 'id',
	'rhs_module'        => 'C_Carryforward',
	'rhs_table'            => 'c_carryforward',
	'rhs_key'            => 'lead_id',
	'relationship_type'    => 'one-to-many',
);

$dictionary['Lead']['fields']['lead_forward'] = array(
	'name' => 'lead_forward',
	'type' => 'link',
	'relationship' => 'lead_forward',
	'module' => 'C_Carryforward',
	'bean_name' => 'C_Carryforward',
	'source' => 'non-db',
	'vname' => 'LBL_CARRYFORWARD',
);
//END: Relationship Student ( 1 - n ) Carry Forward

$dictionary['Lead']['fields']['last_name']['required']=true;
$dictionary['Lead']['fields']['phone_mobile']['required']=true;

$dictionary["Lead"]["fields"]["class_name"] = array (
	'name' => 'class_name',
	'vname' => 'LBL_CLASS_NAME',
	'type' => 'varchar',
	'len' => '200',
);
$dictionary['Lead']['fields']['class_year'] = array (
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
$dictionary['Lead']['fields']['preferred_kind_of_course'] = array (
	'name' => 'preferred_kind_of_course',
	'vname' => 'LBL_PREFERRED_KIND_OF_COURSE',
	'type' => 'enum',
	'default' => '',
	'comments' => 'comment',
	'help' => 'help',
	'importable' => 'true',
	'duplicate_merge' => 'enabled',
	'duplicate_merge_dom_value' => '1',
	'audited' => true,
	'reportable' => true,
	'len' => 100,
	'size' => '20',
	'options' => 'full_kind_of_course_list',
	'studio' => 'visible',
	'dependency' => false,
	'massupdate' => false,
);
$dictionary['Lead']['fields']['company_name'] = array (
	'name' => 'company_name',
	'vname' => 'LBL_COMPANY_NAME',
	'type' => 'varchar',
	'len' => '255',
	'unified_search' => true,
	'full_text_search' => array('boost' => 3),
);
$dictionary['Lead']['fields']['custom_button'] = array (
	'name' => 'custom_button',
	'vname' => 'LBL_CUSTOM_BUTTON',
	'type' => 'varchar',
	'studio' => 'visible',
	'source' => 'non-db',
);

//add team type
$dictionary['Lead']['fields']['team_type'] = array(
	'name' => 'team_type',
	'vname' => 'LBL_TEAM_TYPE',
	'type' => 'enum',
	'importable' => 'true',
	'reportable' => true,
	'len' => 100,
	'size' => '20',
	'options' => 'type_team_list',
	'studio' => 'visible',
    'massupdate' => 0,
); 
// END: add team type 

//Custom Relationship JUNIOR. Student - SMS  By Lap Nguyen
$dictionary['Lead']['fields']['leads_sms'] = array (
    'name' => 'leads_sms',
    'type' => 'link',
    'relationship' => 'lead_smses',
    'module' => 'C_SMS',
    'bean_name' => 'C_SMS',
    'source' => 'non-db',
    'vname' => 'LBL_LEAD_SMS',
);
$dictionary['Lead']['relationships']['lead_smses'] = array (
    'lhs_module'        => 'Leads',
    'lhs_table'            => 'leads',
    'lhs_key'            => 'id',
    'rhs_module'        => 'C_SMS',
    'rhs_table'            => 'c_sms',
    'rhs_key'            => 'parent_id',
    'relationship_type'    => 'one-to-many',
);

$dictionary['Lead']['fields']['contact_rela'] = array (
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
$dictionary["Lead"]["fields"]["relationship"] = array ( 
	'name'      => 'relationship',
	'vname'     => 'LBL_RELATIONSHIP',
	'type'      => 'text',
	'source' => 'non-db',
	'studio'    => 'visible',
);
$dictionary["Lead"]["fields"]["describe_relationship"] = array ( 
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

$dictionary["Lead"]["fields"]["study_apollo_before"] = array (
	'name' => 'study_apollo_before',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_STUDY_APOLLO_BEFORE',
	'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Lead"]["fields"]["study_other_before"] = array (
	'name' => 'study_other_before',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_STUDY_OTHER_BEFORE',
	'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Lead"]["fields"]["time_study_english"] = array (
	'name' => 'time_study_english',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_TIME_STUDY_ENGLISH',
	'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Lead"]["fields"]["study_with_before"] = array (
	'name' => 'study_with_before',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_STUDY_WITH_BEFORE',
	'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Lead"]["fields"]["strong_skills"] = array (
	'name' => 'strong_skills',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_STRONG_SKILLS',
	'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Lead"]["fields"]["weak_skills"] = array (
	'name' => 'weak_skills',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_WEAK_SKILLS',
	'rows' => '4',
	'cols' => '40',
    'required'=>true,
);
$dictionary["Lead"]["fields"]["expectation"] = array (
	'name' => 'expectation',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_EXPECTATION',
	'rows' => '4',
	'cols' => '40',
);
$dictionary["Lead"]["fields"]["other_note"] = array (
	'name' => 'other_note',
	'type' => 'text',
	'studio' => 'visible',
	'vname'=> 'LBL_OTHER_NOTE',
	'rows' => '4',
	'cols' => '40',
);

//Custom Relationship JUNIOR. Student - StudentSituation  By Nhi Vo
$dictionary['Lead']['fields']['ju_studentsituations'] = array (
	'name' => 'ju_studentsituations',
	'type' => 'link',
	'relationship' => 'lead_studentsituations',
	'module' => 'J_StudentSituations',
	'bean_name' => 'J_StudentSituations',
	'source' => 'non-db',
	'vname' => 'LBL_LEAD_SITUATION',
);
$dictionary['Lead']['relationships']['lead_studentsituations'] = array (
	'lhs_module'        => 'Leads',
	'lhs_table'            => 'leads',
	'lhs_key'            => 'id',
	'rhs_module'        => 'J_StudentSituations',
	'rhs_table'            => 'j_studentsituations',
	'rhs_key'            => 'lead_id',
	'relationship_type'    => 'one-to-many',
);

//Add Relationship Lead - Payment (Thu tiền Placement Test) 
$dictionary['Lead']['relationships']['lead_payments'] = array(
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'J_Payment',
    'rhs_table' => 'j_payment',
    'rhs_key' => 'lead_id',
    'relationship_type' => 'one-to-many'
);
$dictionary['Lead']['fields']['payment_link'] = array(
    'name' => 'payment_link',
    'type' => 'link',
    'relationship' => 'lead_payments',
    'module' => 'J_Payment',
    'bean_name' => 'J_Payment',
    'source' => 'non-db',
    'vname' => 'LBL_PAYMENT_NAME',
);