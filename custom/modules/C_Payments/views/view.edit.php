<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/


class C_PaymentsViewEdit extends ViewEdit
{
    /**
      * @see SugarView::display()
      */
     public function display()
     {
//         if(isset($this->bean->id)){
//             echo '
//             <script type="text/javascript">
//                alert(SUGAR.language.get("C_Payments", "LBL_EDIT_ALERT"));
//                location.href=\'index.php?module=C_Payments&action=DetailView&record='.$this->bean->id.'\';
//             </script>';
//             die(); 
//         }

         if(!isset($this->bean->id) && $this->bean->id=='') $this->ss->assign('NEWID', '<b>New</b>'); 
         else $this->ss->assign('NEWID', '<b>'.$this->bean->name.'</b>');
         parent::display();   
     }
}
?>
