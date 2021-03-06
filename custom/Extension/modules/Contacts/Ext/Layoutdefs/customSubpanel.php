<?php
$layout_defs["Contacts"]["subpanel_setup"]["contact_studentsituations"] = array (
    'order' => 52,
    'module' => 'J_StudentSituations',
    'subpanel_name' => 'default',
    'title_key' => 'LBL_SUPPANEL_STUDENT_SITUATION',
    'sort_order' => 'desc',
    'sort_by' => 'end_study',
    'get_subpanel_data' => 'ju_studentsituations',
    'top_buttons' =>
    array (
    ),
);
//display subpanel gradebookdetail by Lam Hai
$layout_defs["Contacts"]["subpanel_setup"]['student_j_gradebookdetail'] = array (
  'order' => 100,
  'module' => 'J_GradebookDetail',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GRADEBOOK_DETAIL',
  'get_subpanel_data' => 'student_j_gradebookdetail',
  'top_buttons' =>
  array (
  ),
);
//end

$layout_defs["Contacts"]["subpanel_setup"]["contact_vouchers"] = array (
    'order' => 101,
    'module' => 'J_Voucher',
    'subpanel_name' => 'default',
    'title_key' => 'Vouchers',
    'sort_order' => 'desc',
    'sort_by' => 'end_date',
    'get_subpanel_data' => 'ju_vouchers',
    'top_buttons' =>
    array (
    ),
);
?>
