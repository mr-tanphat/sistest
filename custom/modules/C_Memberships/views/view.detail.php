<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');

    class C_MembershipsViewDetail extends ViewDetail {

        function C_MembershipsViewDetail(){
            parent::ViewDetail();
        }

        function display() {
            if(isset($this->bean->id) || !empty($this->bean->id)){
                if($this->bean->type == "Student")
                {
                    $ct = BeanFactory::getBean('Contacts',$this->bean->c_memberships_contacts_2contacts_idb);
                    $this->bean->picture = $ct->picture;
                    $html = "<span class='textbg_dream'>{$this->bean->name}</span>";
                    $html .= '<br><b>'.$this->bean->type.'</b>';
                    $html .= "<br><a href='index.php?module=Contacts&action=DetailView&record={$this->bean->c_memberships_contacts_2contacts_idb}'>{$this->bean->name_on_card}</a>";
                    $html .= "<br>{$ct->phone_mobile}";
                    $html .= "<br>{$ct->email1}";
                    $html .= "<br>{$ct->birthdate}";
                    $this->ss->assign('STUDENT_INFO',$html);
                    $this->ss->assign('STUDENT_LABEL','Membership Code:<br>Membership Type:<br>Owner:<br>Mobile:<br>Email:<br>Birthdate:');

                }else{
                    $ct = BeanFactory::getBean('Leads',$this->bean->c_memberships_leads_1leads_idb);
                    $html = "<span class='textbg_yellow_light'>{$this->bean->name}</span>";
                    $html .= '<br><b>'.$this->bean->type.'</b>';
                    $html .= "<br><a href='index.php?module=Leads&action=DetailView&record={$this->bean->c_memberships_leads_1leads_idb}'>{$this->bean->name_on_card}</a>";
                    
                    $this->ss->assign('STUDENT_INFO',$html);
                    $this->ss->assign('STUDENT_LABEL','Membership Code:<br>Membership Type:<br>Owner:');
                }
            }
            parent::display();
        }
    }
?>