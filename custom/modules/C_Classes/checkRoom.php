<?php
// create by leduytan - checkRoom controller
    function checkTeacher(){
        $ss = new Sugar_Smarty();
        $ss->assign("MOD", $GLOBALS['mod_strings']);
        return $ss->fetch('custom/modules/C_Classes/tpls/checkRoom.tpl');  
       
        }  
    echo  checkTeacher();