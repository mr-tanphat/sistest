<?php
    $hook_version = 1; 
    $hook_array = Array(); 
    // position, file, function 
    $hook_array['before_save'] = Array();  
    $hook_array['before_save'][] = Array(1, 'Add Code', 'modules/C_ConfigID/AutoCode.php', 'AutoCode', 'addCode');
    $hook_array['before_save'][] = Array(2, 'Create New Payment', 'custom/modules/C_Payments/handleSavePay.php', 'handleSavePay', 'createPayment');  
    $hook_array['before_delete'] = Array(); 
    $hook_array['before_delete'][] = Array(1, 'Delete A Payment', 'custom/modules/C_Payments/handleSavePay.php', 'handleSavePay', 'deletePayment');  

    $hook_array['process_record'] = Array(); 
    $hook_array['process_record'][] = Array(1, 'Color Status', 'custom/modules/C_Payments/listview_color.php','ListviewLogicHookPay', 'listviewcolor_Pay');
?>