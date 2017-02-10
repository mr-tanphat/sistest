<?php
    $hook_version = 1; 
    $hook_array = Array(); 
    $hook_array['before_save'] = Array(); 
    $hook_array['before_save'][] = Array(1, 'Add Code', 'custom/include/_helper/AddCode.php','Code', 'addCode');  
   // $hook_array['before_save'][] = Array(2, 'Custom Class', 'custom/modules/C_Classes/logic_class.php','CustomClass', 'CustomClass'); 
    
    $hook_array['after_delete'] = Array();
    $hook_array['after_delete'][] = Array(1, 'Delete session', 'custom/modules/C_Classes/afterDelete.php','handleDelete', 'deleteSession'); 
    
    $hook_array['process_record'] = Array(); 
    $hook_array['process_record'][] = Array(1, 'Color Status', 'custom/modules/C_Classes/listview_color.php','listColor', 'listColor'); 
        ?>