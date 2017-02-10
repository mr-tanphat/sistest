<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-06-27 15:20:55
$dictionary["C_Classes"]["fields"]["c_programs_c_classes_1"] = array (
  'name' => 'c_programs_c_classes_1',
  'type' => 'link',
  'relationship' => 'c_programs_c_classes_1',
  'source' => 'non-db',
  'module' => 'C_Programs',
  'bean_name' => 'C_Programs',
  'side' => 'right',
  'vname' => 'LBL_C_PROGRAMS_C_CLASSES_1_FROM_C_CLASSES_TITLE',
  'id_name' => 'c_programs_c_classes_1c_programs_ida',
  'link-type' => 'one',
);
$dictionary["C_Classes"]["fields"]["c_programs_c_classes_1_name"] = array (
  'name' => 'c_programs_c_classes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_PROGRAMS_C_CLASSES_1_FROM_C_PROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'c_programs_c_classes_1c_programs_ida',
  'link' => 'c_programs_c_classes_1',
  'table' => 'c_programs',
  'module' => 'C_Programs',
  'rname' => 'name',
);
$dictionary["C_Classes"]["fields"]["c_programs_c_classes_1c_programs_ida"] = array (
  'name' => 'c_programs_c_classes_1c_programs_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_PROGRAMS_C_CLASSES_1_FROM_C_CLASSES_TITLE_ID',
  'id_name' => 'c_programs_c_classes_1c_programs_ida',
  'link' => 'c_programs_c_classes_1',
  'table' => 'c_programs',
  'module' => 'C_Programs',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2014-07-15 14:40:52
$dictionary["C_Classes"]["fields"]["c_classes_contacts_1"] = array (
  'name' => 'c_classes_contacts_1',
  'type' => 'link',
  'relationship' => 'c_classes_contacts_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_C_CLASSES_CONTACTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'c_classes_contacts_1contacts_idb',
);


 // created: 2014-08-12 12:09:11
$dictionary['C_Classes']['fields']['description']['comments']='Full text of the note';
$dictionary['C_Classes']['fields']['description']['merge_filter']='disabled';
$dictionary['C_Classes']['fields']['description']['calculated']=false;
$dictionary['C_Classes']['fields']['description']['rows']='4';
$dictionary['C_Classes']['fields']['description']['cols']='66';

 

    $dictionary["C_Classes"]["fields"]["type"] = array (
        'name' => 'type',
        'vname' => 'LBL_TYPE',
        'type' => 'enum',
        'default' => 'Practice',
        'reportable' => true,
        'len' => 50,
        'size' => '20',
        'options' => 'class_type_list',
    );
    $dictionary["C_Classes"]["fields"]["stage"] = array (
        'name' => 'stage',
        'vname' => 'LBL_STAGE',
        'type' => 'enum',
        'reportable' => true,
        'len' => 50,
        'size' => '20',
        'options' => 'stage_score_list',
    );
    $dictionary["C_Classes"]["fields"]["level"] = array (
        'name' => 'level',
        'vname' => 'LBL_LEVEL',
        'type' => 'enum',
        'default' => '-none-',
        'reportable' => true,
        'len' => 10,
        'size' => '20',
        'options' => 'level_score_list',
    );
    $dictionary["C_Classes"]["fields"]["stage_2"] = array (
        'name' => 'stage_2',
        'vname' => 'LBL_STAGE_CONNECT_SKILL',
        'type' => 'multienum',
        'isMultiSelect' => true,
        'reportable' => true,
        'len' => 170,
        'size' => '20',
        'options' => 'stage_score_list',
    );
    //Custom Relationship. Class - Meeting

    $dictionary['C_Classes']['relationships']['classes_meetings'] = array(
        'lhs_module'        => 'C_Classes',
        'lhs_table'            => 'c_classes',
        'lhs_key'            => 'id',
        'rhs_module'        => 'Meetings',
        'rhs_table'            => 'meetings',
        'rhs_key'            => 'class_id',
        'relationship_type'    => 'one-to-many',
    );

    $dictionary['C_Classes']['fields']['meetings'] = array(
        'name' => 'meetings',
        'type' => 'link',
        'relationship' => 'classes_meetings',
        'module' => 'Meetings',
        'bean_name' => 'Meetings',
        'source' => 'non-db',
        'vname' => 'LBL_MEETING',
    );
    //END: Custom Relationship
    //Field JSON Save Session Detail
    $dictionary['C_Classes']['fields']['content'] = array(
      'name' => 'content',
    'vname' => 'LBL_CONTENT',
    'type' => 'text',
     'reportable' => false,
  );


 // created: 2014-06-27 16:26:48
$dictionary['C_Classes']['fields']['end_date']['calculated']=false;

 

// created: 2014-07-15 14:43:15
$dictionary["C_Classes"]["fields"]["c_classes_c_teachers_1"] = array (
  'name' => 'c_classes_c_teachers_1',
  'type' => 'link',
  'relationship' => 'c_classes_c_teachers_1',
  'source' => 'non-db',
  'module' => 'C_Teachers',
  'bean_name' => 'C_Teachers',
  'vname' => 'LBL_C_CLASSES_C_TEACHERS_1_FROM_C_TEACHERS_TITLE',
  'id_name' => 'c_classes_c_teachers_1c_teachers_idb',
);


// created: 2014-07-15 14:47:51
$dictionary["C_Classes"]["fields"]["c_classes_c_rooms_1"] = array (
  'name' => 'c_classes_c_rooms_1',
  'type' => 'link',
  'relationship' => 'c_classes_c_rooms_1',
  'source' => 'non-db',
  'module' => 'C_Rooms',
  'bean_name' => 'C_Rooms',
  'vname' => 'LBL_C_CLASSES_C_ROOMS_1_FROM_C_ROOMS_TITLE',
  'id_name' => 'c_classes_c_rooms_1c_rooms_idb',
);


// created: 2014-11-12 02:35:22
$dictionary["C_Classes"]["fields"]["c_classes_opportunities_1"] = array (
  'name' => 'c_classes_opportunities_1',
  'type' => 'link',
  'relationship' => 'c_classes_opportunities_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_C_CLASSES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'c_classes_opportunities_1opportunities_idb',
);


// created: 2014-12-02 16:49:45
$dictionary["C_Classes"]["fields"]["c_classes_contracts_1"] = array (
  'name' => 'c_classes_contracts_1',
  'type' => 'link',
  'relationship' => 'c_classes_contracts_1',
  'source' => 'non-db',
  'module' => 'Contracts',
  'bean_name' => 'Contract',
  'vname' => 'LBL_C_CLASSES_CONTRACTS_1_FROM_CONTRACTS_TITLE',
  'id_name' => 'c_classes_contracts_1contracts_idb',
);


 // created: 2015-07-02 10:04:07
$dictionary['C_Classes']['fields']['start_date']['display_default']='';

 
?>