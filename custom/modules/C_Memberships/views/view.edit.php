<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class C_MembershipsViewEdit extends ViewEdit
    {
        /**
        * @see SugarView::display()
        */
        public function display()
        {
            if($this->bean->type == "Student"){
                $ct = BeanFactory::getBean('Contacts',$this->bean->c_memberships_contacts_2contacts_idb);
                $this->ss->assign('BIRTHDATE',$ct->birthdate);
                $this->ss->assign('EMAIL1',$ct->email1);
                $this->ss->assign('MOBILE',$ct->phone_mobile);
                if(!empty($ct->picture)){
                    $html = "<img id='img_picture' name='img_picture' style='width:220px;' src='index.php?entryPoint=download&amp;id={$ct->picture}&amp;type=SugarFieldImage&amp;isTempFile=1'>";
                    $this->ss->assign('IMAGE_URL',$html);
                    $this->ss->assign('no_image','0');
                }else{
                    $this->ss->assign('IMAGE_URL','<img name="no_image" src="themes/default/images/noimage.jpg">');
                    $this->ss->assign('no_image','1');
                }
            }else{
                $ct = BeanFactory::getBean('Leads',$this->bean->c_memberships_leads_1leads_idb);
                $this->ss->assign('BIRTHDATE',$ct->birthdate);
                $this->ss->assign('EMAIL1',$ct->email1);
                $this->ss->assign('MOBILE',$ct->phone_mobile); 
            }
            parent::display();   
        }
    }
?>
