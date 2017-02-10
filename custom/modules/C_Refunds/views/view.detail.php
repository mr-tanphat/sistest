<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');

    class C_RefundsViewDetail extends ViewDetail
    {

        public function display()
        {   
            unset($this->dv->defs['templateMeta']['form']['buttons']['0']); 
            parent::display();   
        }
    }
