<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class C_InvoicesViewEdit extends ViewEdit
    {
        /**
        * @see SugarView::display()
        */
        public function display()
        {
            if($this->ev->isDuplicate==false)
            {
                echo '
                <script type="text/javascript">
                alert(SUGAR.language.get("C_Invoices", "LBL_EDIT_ALERT"));
                location.href=\'index.php?module=C_Invoices&return_module=C_Invoices&action=DetailView&record='.$this->bean->id.'\';
                </script>';
                die();   
            }
            parent::display();   
        }
    }
?>
