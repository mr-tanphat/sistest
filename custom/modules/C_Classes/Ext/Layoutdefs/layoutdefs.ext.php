<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2014-07-15 14:40:52
$layout_defs["C_Classes"]["subpanel_setup"]['c_classes_contacts_1'] = array (
  'order' => 50,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_C_CLASSES_CONTACTS_1_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'c_classes_contacts_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopSelectStudentButton',
    ),
  ),
);


    $layout_defs["C_Classes"]["subpanel_setup"]["classes_meetings"] = array (
        'order' => 100,
        'module' => 'Meetings',
        'subpanel_name' => 'default',
        'title_key' => 'LBL_MEETING',
        'sort_order' => 'asc',
        'sort_by' => 'date_start',
        'get_subpanel_data' => 'meetings',
        'top_buttons' => 
        array (
            0 => 
            array (
                'widget_class' => 'SubPanelDeleteAllSessionButton',
            ),
        ),
    );



 // created: 2014-07-15 14:43:15
$layout_defs["C_Classes"]["subpanel_setup"]['c_classes_c_teachers_1'] = array (
  'order' => 100,
  'module' => 'C_Teachers',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_C_CLASSES_C_TEACHERS_1_FROM_C_TEACHERS_TITLE',
  'get_subpanel_data' => 'c_classes_c_teachers_1',
  'top_buttons' => 
        array (
            0 => 
            array (
                'widget_class' => 'SubPanelTeacherAllButton',
            ),
        ),
);


 // created: 2014-07-15 14:47:51
$layout_defs["C_Classes"]["subpanel_setup"]['c_classes_c_rooms_1'] = array (
  'order' => 100,
  'module' => 'C_Rooms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_C_CLASSES_C_ROOMS_1_FROM_C_ROOMS_TITLE',
  'get_subpanel_data' => 'c_classes_c_rooms_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


 // created: 2014-11-12 02:35:22
//$layout_defs["C_Classes"]["subpanel_setup"]['c_classes_opportunities_1'] = array (
//  'order' => 100,
//  'module' => 'Opportunities',
//  'subpanel_name' => 'default',
//  'sort_order' => 'asc',
//  'sort_by' => 'id',
//  'title_key' => 'LBL_C_CLASSES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
//  'get_subpanel_data' => 'c_classes_opportunities_1',
//);


 // created: 2014-12-02 16:49:45
//$layout_defs["C_Classes"]["subpanel_setup"]['c_classes_contracts_1'] = array (
//  'order' => 100,
//  'module' => 'Contracts',
//  'subpanel_name' => 'default',
//  'sort_order' => 'asc',
//  'sort_by' => 'id',
//  'title_key' => 'LBL_C_CLASSES_CONTRACTS_1_FROM_CONTRACTS_TITLE',
//  'get_subpanel_data' => 'c_classes_contracts_1',
//  'top_buttons' => 
//  array (
//    0 => 
//    array (
//      'widget_class' => 'SubPanelTopButtonQuickCreate',
//    ),
//    1 => 
//    array (
//      'widget_class' => 'SubPanelTopSelectButton',
//      'mode' => 'MultiSelect',
//    ),
//  ),
//);


//auto-generated file DO NOT EDIT
$layout_defs['C_Classes']['subpanel_setup']['c_classes_c_teachers_1']['override_subpanel_name'] = 'C_Classes_subpanel_c_classes_c_teachers_1';


//auto-generated file DO NOT EDIT
$layout_defs['C_Classes']['subpanel_setup']['c_classes_contacts_1']['override_subpanel_name'] = 'C_Classes_subpanel_c_classes_contacts_1';


//auto-generated file DO NOT EDIT
$layout_defs['C_Classes']['subpanel_setup']['c_classes_c_rooms_1']['override_subpanel_name'] = 'C_Classes_subpanel_c_classes_c_rooms_1';


//auto-generated file DO NOT EDIT
$layout_defs['C_Classes']['subpanel_setup']['classes_meetings']['override_subpanel_name'] = 'C_Classes_subpanel_classes_meetings';

?>