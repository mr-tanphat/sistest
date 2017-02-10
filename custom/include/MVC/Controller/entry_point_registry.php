<?php
    $entry_point_registry['ajaxLoadItems'] = array('file' => 'custom/include/utils/AjaxLoadItems.php' , 'auth' => '1');
    $entry_point_registry['ajaxChangeDate'] = array('file' => 'custom/modules/Opportunities/ajaxChangeDate.php' , 'auth' => '1');
    $entry_point_registry['getRelateField'] = array('file' => 'custom/include/utils/getRelateField.php' , 'auth' => '1');
    
    $entry_point_registry['AutoCreateGradeBook'] = array('file' => 'custom/modules/C_Gradebook/cron_auto_create.php' , 'auth' => '1');
    
    $entry_point_registry['Monitor'] = array('file' => 'custom/modules/C_Attendance/attendanceMonitor.php' , 'auth' => '1');
    $entry_point_registry['AjaxMonitor'] = array('file' => 'custom/modules/C_Attendance/ajax_post_code.php' , 'auth' => '1');
    
    $entry_point_registry['Calculate_expire_date'] = array('file' => 'custom/modules/C_Classes/cron_expire_date.php' , 'auth' => '1');
    $entry_point_registry['updateClosedClass'] = array('file' => 'custom/modules/C_Classes/cron_closedate.php' , 'auth' => '1');
    
    $entry_point_registry['SendingData'] = array('file' => 'custom/include/utils/SendingData.php' , 'auth' => '0');
                       
//    $entry_point_registry['class_junior'] = array('file' => 'custom/modules/J_Class/handleCron.php' , 'auth' => '0');             //Đã chuyển nhà vào Scheduler - Ko xài Entrypoint vì lý do bảo mật
//    $entry_point_registry['payment_junior'] = array('file' => 'custom/modules/J_Payment/handleCron.php' , 'auth' => '0');
//    $entry_point_registry['student_junior'] = array('file' => 'custom/modules/Contacts/handleCron.php' , 'auth' => '0');
    
//    $entry_point_registry['SMS_birthdate'] = array('file' => 'custom/modules/C_SMS/cron_happy_birthday.php' , 'auth' => '0');
//    $entry_point_registry['SMS_remind_payment'] = array('file' => 'custom/modules/C_SMS/cron_remind_payment.php' , 'auth' => '0');
//    $entry_point_registry['lead_import_portal'] = array('file' => 'custom/modules/Leads/lead_import_portal.php' , 'auth' => '0');
    
    $entry_point_registry['GetJSLanguage'] = array('file' => 'custom/include/utils/GetJSLanguage.php' , 'auth' => false);
//    $entry_point_registry['updateStatusContacts'] = array('file' => 'custom/modules/Contacts/updateStatusStudents.php' , 'auth' => false);
    $entry_point_registry['getAvatar'] = array('file' => 'getAvatar.php', 'auth' => false);
    
    ?>