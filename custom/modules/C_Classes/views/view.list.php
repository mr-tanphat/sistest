<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once 'include/MVC/View/views/view.list.php';

    class C_ClassesViewList extends ViewList
    {
        public function preDisplay(){
        	parent::preDisplay();
            $this->lv->delete = false;
		}
}