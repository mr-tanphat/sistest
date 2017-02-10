<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');     

    require_once('include/MVC/View/views/view.detail.php');

    class J_GradebookConfigViewDetail extends ViewDetail {

        function J_GradebookConfigViewDetail(){
            parent::ViewDetail();
        }

        function preDisplay(){
            parent::preDisplay(); 
            $this->ss->assign('CONTENT', $this->bean->getConfigHTML())  ;
        }          
    }  