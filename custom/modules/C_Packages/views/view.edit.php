<?php 

    class C_PackagesViewEdit extends ViewEdit {

        function C_PackagesViewEdit(){
            parent::ViewEdit();
        }

        function preDisplay(){
            parent::preDisplay();
        }
        public function display()
        {
            global $beanFiles;
            $taxrate = new TaxRate();

            if(!isset($this->bean->id) || empty($this->bean->id)){
                //Check NEWID
                $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold"> New </span>');

            }else{
                //Check NEWID
                $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold"> '.$this->bean->package_id.'</span>'); 
            }

            parent::display();
        }
    }

?>