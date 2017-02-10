<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-04-12 00:59:44
$dictionary["C_Packages"]["fields"]["c_programs_c_packages_1"] = array (
  'name' => 'c_programs_c_packages_1',
  'type' => 'link',
  'relationship' => 'c_programs_c_packages_1',
  'source' => 'non-db',
  'module' => 'C_Programs',
  'bean_name' => 'C_Programs',
  'side' => 'right',
  'vname' => 'LBL_C_PROGRAMS_C_PACKAGES_1_FROM_C_PACKAGES_TITLE',
  'id_name' => 'c_programs_c_packages_1c_programs_ida',
  'link-type' => 'one',
);
$dictionary["C_Packages"]["fields"]["c_programs_c_packages_1_name"] = array (
  'name' => 'c_programs_c_packages_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_PROGRAMS_C_PACKAGES_1_FROM_C_PROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'c_programs_c_packages_1c_programs_ida',
  'link' => 'c_programs_c_packages_1',
  'table' => 'c_programs',
  'module' => 'C_Programs',
  'rname' => 'name',
);
$dictionary["C_Packages"]["fields"]["c_programs_c_packages_1c_programs_ida"] = array (
  'name' => 'c_programs_c_packages_1c_programs_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_PROGRAMS_C_PACKAGES_1_FROM_C_PACKAGES_TITLE_ID',
  'id_name' => 'c_programs_c_packages_1c_programs_ida',
  'link' => 'c_programs_c_packages_1',
  'table' => 'c_programs',
  'module' => 'C_Programs',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


//Create by leduytan - New field 
$dictionary["C_Packages"]["fields"]["expire_duration"] = array (
   'required' => false,
   'name' => 'expire_duration',
   'vname' => 'LBL_EXPIRE_DURATION',
   'type'=>'enum',
   'options'=>'expire_duration_list',
   'len' => '20',
);

$dictionary["C_Packages"]["fields"]["start_date"] = array (
                'required' => false,
                'name' => 'start_date',
                'vname' => 'LBL_START_DATE',
                'type' => 'date',
                'massupdate' => 0,
                'no_default' => false,
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
                'size' => '20',
                'enable_range_search' => true,
                'options' => 'date_range_search_dom',
            );
$dictionary["C_Packages"]["fields"]["end_date"] = array (
                'required' => false,
                'name' => 'end_date',
                'vname' => 'LBL_END_DATE',
                'type' => 'date',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
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
//end


// created: 2014-04-12 01:02:18
$dictionary["C_Packages"]["fields"]["c_packages_opportunities_1"] = array (
  'name' => 'c_packages_opportunities_1',
  'type' => 'link',
  'relationship' => 'c_packages_opportunities_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_C_PACKAGES_OPPORTUNITIES_1_FROM_C_PACKAGES_TITLE',
  'id_name' => 'c_packages_opportunities_1c_packages_ida',
  'link-type' => 'many',
  'side' => 'left',
);

?>