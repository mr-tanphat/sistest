<?php

    function classSchedule(){
        $ss = new Sugar_Smarty();
        $ss->assign("MOD", $GLOBALS['mod_strings']);
        if(isset($_GET['class_id'])){
            $class = BeanFactory::getBean('C_Classes',$_GET['class_id']);
            $ss->assign("CONTENT", $class->content);
            $ss->assign("END", $class->end_date);
            $ss->assign("START", $class->start_date);
            $ss->assign("CLASS_TYPE", $class->type);
            $ss->assign("CLASS_NAME", $class->name);
            $ss->assign("CLASS_ID", $class->id);
        }
        return $ss->fetch('custom/modules/C_Classes/tpls/classSchedule.tpl');
    }  
    echo  classSchedule();