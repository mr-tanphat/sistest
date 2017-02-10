<?php
    $hook_version = 1; 
    $hook_array = Array(); 
    
    $hook_array['before_save'] = Array(); 
    $hook_array['before_save'][] = Array(1, 'Add Code', 'custom/include/_helper/AddCode.php','Code', 'addCode');  
    $hook_array['before_save'][] = Array(2, 'Cancel and create new Invoices', 'custom/modules/C_Invoices/handleSaveInv.php','handleSaveInv', 'duplicateInvoices'); 
    
    $hook_array['process_record'] = Array(); 
    $hook_array['process_record'][] = Array(1, 'Color Status', 'custom/modules/C_Invoices/listview_color.php','ListviewLogicHookInv', 'listviewcolor_Inv');
?>