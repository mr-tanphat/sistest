<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once 'include/MVC/View/views/view.list.php';

    class C_PaymentsViewList extends ViewList
    {
        public function preDisplay()
        {
            parent::preDisplay();

            # Hide Quick Edit Pencil
            $this->lv->quickViewLinks = false;
            $this->lv->showMassupdateFields = false;
            $this->lv->mergeduplicates = false;
            $this->lv->delete = false;
        }
}