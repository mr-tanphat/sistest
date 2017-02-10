<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class AccountsViewEdit extends ViewEdit
    {
        
        public function display()
        {
            if(!isset($this->bean->id) || empty($this->bean->id)){
              $this->ss->assign('ACCOUNT_ID', '<span style="color:red;font-weight:bold"> New </span>');  
            }else{
              $this->ss->assign('ACCOUNT_ID', '<span style="color:red;font-weight:bold"> '.$this->bean->account_id.'</span>');  
            }
            parent::display();   
        }
    }
?>
