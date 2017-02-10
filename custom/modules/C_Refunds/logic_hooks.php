<?php
    $hook_version = 1; 
    $hook_array = Array(); 
    // position, file, function                          
    $hook_array['before_save'] = Array();  
    $hook_array['before_save'][] = Array(1, 'Add Code', 'custom/include/_helper/AddCode.php', 'Code', 'addCode');
    $hook_array['before_save'][] = Array(2, 'Custom Save', 'custom/modules/C_Refunds/handleSaveRefund.php', 'handleSaveRefund', 'handleSaveRefund');
    
    $hook_array['process_record'] = Array(); 
    $hook_array['process_record'][] = Array(1, 'Color Status', 'custom/modules/C_Refunds/listview_color.php','ListviewLogicHookRef', 'listviewcolor_Ref');
?>