<?php
$layout_defs["J_Payment"]["subpanel_setup"]["payment_paymentdetails"] = array (
    'order' => 10,
    'module' => 'J_PaymentDetail',
    'subpanel_name' => 'default',
    'title_key' => 'LBL_PAYMENT_DETAIL',
    'sort_order' => 'asc',
    'sort_by' => 'name',
    'get_subpanel_data' => 'paymentdetail_link',
    'top_buttons' => 
    array (
    ),
);

$layout_defs["J_Payment"]["subpanel_setup"]["j_payment_j_sponsor"] = array (
    'order' => 2,
    'module' => 'J_Sponsor',
    'subpanel_name' => 'default',
    'title_key' => 'LBL_SPONSOR',
    'sort_order' => 'asc',
    'sort_by' => 'name',
    'get_subpanel_data' => 'ju_sponsor',
    'top_buttons' => 
    array (
    ),
);
$layout_defs["J_Payment"]["subpanel_setup"]["j_payment_studentsituations"] = array (
    'order' => 3,
    'module' => 'J_StudentSituations',
    'subpanel_name' => 'default',
    'title_key' => 'LBL_STUDENT_SITUATION_SUPPANEL',
    'sort_order' => 'asc',
    'sort_by' => 'type',
    'get_subpanel_data' => 'ju_studentsituations',
    'top_buttons' => 
    array (
    ),
);
?>