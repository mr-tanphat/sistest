<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



    class C_RefundsViewEdit extends ViewEdit
    {
        /**
        * @see SugarView::display()
        */
        public function display()
        {
            if(!isset($this->bean->id) && $this->bean->id=='') $this->ss->assign('NEWID', '<b style="color:red;">New</b>'); 
            else $this->ss->assign('NEWID', '<b style="color:red;">'.$this->bean->document_name.'</b>');
            if(!empty($_GET['contact_id'])){
                $contact = BeanFactory::getBean('Contacts', $_GET['contact_id']);
                $this->bean->contacts_c_refunds_1contacts_ida = $_GET['contact_id'];
                $this->bean->contacts_c_refunds_1_name = $contact->name;
                
                $this->ss->assign('current_team_id', $contact->team_id);
                if($_GET['type'] == 'Transfer-out'){
                    $this->bean->refund_type = 'Transfer out';
                }
                if($_GET['type'] == 'Moving-out'){
                    $this->bean->refund_type = 'Moving out';
                }
            }



            //Add Option Team - 13/08/2014 - by MTN
            $sql = "SELECT id, name FROM teams WHERE private = 0 AND deleted = 0 AND id != 1 AND team_type = 'Adult'";
            $result = $GLOBALS['db']->query($sql);
            $html = '<option></option>';

            while($row = $GLOBALS['db']->fetchbyAssoc($result)){
                $html .= '<option id = "'.$row['id'].'" value = "'.$row['name'].'" >'.$row['name'].'</option>';
            }
            $this->ss->assign('CENTER_OPTIONS', $html);

            //Not edit when refunded - 14/08/2014 - by MTN
            if(isset($this->bean->id)){
                echo '
                <script type="text/javascript">
                alert(SUGAR.language.get("C_Refunds", "LBL_EDIT_ALERT"));
                location.href=\'index.php?module=C_Refunds&action=DetailView&record='.$this->bean->id.'\';
                </script>';
                die(); 
            }

            parent::display();   
        }
    }
?>
