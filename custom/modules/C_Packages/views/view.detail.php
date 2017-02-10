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


    require_once('include/MVC/View/views/view.detail.php');

    class C_PackagesViewDetail extends ViewDetail
    {
        /**
        * @see SugarView::display()
        *
        * We are overridding the display method to manipulate the portal information.
        * If portal is not enabled then don't show the portal fields.
        */
        public function display()
        {
            if(!empty($this->bean->payment_type_1))
                $this->ss->assign('pay_1',format_number($this->bean->payment_price_1,0,0).' ('.$GLOBALS['app_list_strings']['package_payment_type_list'][$this->bean->payment_type_1].')');
            else
                $this->ss->assign('pay_1',format_number($this->bean->payment_price_1,0,0)); 
            if(!empty($this->bean->payment_type_2))
                $this->ss->assign('pay_2',format_number($this->bean->payment_price_2,0,0).' ('.$GLOBALS['app_list_strings']['package_payment_type_list'][$this->bean->payment_type_2].')');
            else
                $this->ss->assign('pay_2',format_number($this->bean->payment_price_2,0,0)); 
            if(!empty($this->bean->payment_type_3))
                $this->ss->assign('pay_3',format_number($this->bean->payment_price_3,0,0).' ('.$GLOBALS['app_list_strings']['package_payment_type_list'][$this->bean->payment_type_3].')');
            else
                $this->ss->assign('pay_3',format_number($this->bean->payment_price_3,0,0)); 
            if(!empty($this->bean->payment_type_4))
                $this->ss->assign('pay_4',format_number($this->bean->payment_price_4,0,0).' ('.$GLOBALS['app_list_strings']['package_payment_type_list'][$this->bean->payment_type_4].')');
            else
                $this->ss->assign('pay_4',format_number($this->bean->payment_price_4,0,0)); 
            parent::display();
        }
        function _displaySubPanels(){ 
            require_once ('include/SubPanel/SubPanelTiles.php'); 
            $subpanel = new SubPanelTiles($this->bean, $this->module); 

            /*Sub-Panel buttons hiding code*/
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_packages_opportunities_1']['top_buttons'][0]);//hiding create payment
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_packages_opportunities_1']['top_buttons'][1]);//hiding select payment
            echo $subpanel->display(); 
        }
    }
