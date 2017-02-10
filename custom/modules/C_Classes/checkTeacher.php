<?php
// create by leduytan - Check Teacher Controller
    function checkTeacher(){
        global $current_user;
        $ss = new Sugar_Smarty();
         //Get Teacher Option
        $sql = "SELECT teacher_id ,id, last_name, first_name, team_id, salutation, title, phone_mobile, team_set_id FROM c_teachers WHERE deleted = 0"; 
        $result = $GLOBALS['db']->query($sql);
        
        $ss->assign("MOD", $GLOBALS['mod_strings']);
        return $ss->fetch('custom/modules/C_Classes/tpls/checkTeacher.tpl');  
       
        }  
    echo  checkTeacher();