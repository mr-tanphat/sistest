<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');

    class J_SchoolViewDetail extends ViewDetail {

        function J_SchoolViewDetail(){
            parent::ViewDetail();
        }
        function display() {
            $this->ss->assign('school_id', '<span class="textbg_blue">'.$this->bean->school_id.'</span>'); 
            parent::display();
        }
    }
?>