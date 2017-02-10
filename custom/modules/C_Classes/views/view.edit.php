<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class C_ClassesViewEdit extends ViewEdit
    {
        
        public function display()
        {
            if(!isset($this->bean->id) || empty($this->bean->id)){
              $this->ss->assign('ID', '<span style="color:red;font-weight:bold"> New </span>');  
            }else{
              $this->ss->assign('ID', '<span style="color:red;font-weight:bold"> '.$this->bean->class_id.'</span>');  
            }
            $this->ss->assign('STAGE_2_SELECTED', unencodeMultienum($this->bean->stage_2));
            parent::display();   
        }
    }
?>
