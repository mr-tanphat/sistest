<?php    
    class ContactsViewLoginPortal extends SugarView{
        var $bean2;        
        function ContactsViewLoginPortal(){      
            $this->bean2 = new Contact();   
            $this->record = $_REQUEST['record'] ;
            $this->bean2->retrieve($this->record);
            parent::display();
        }

        function display(){    
            include_once("custom/include/utils/RestHelper.php");              
            $client = new RestHelper();  
            $session_id = $client->getSessionID($this->bean2->user_id);
            if($session_id) {
                $url = $GLOBALS['sugar_config']['portal_url']."/user/login?MSID=$session_id";
                header("Location: $url");
            } else {
                echo "<h3>This students can't login in portal!</h3>";  
            }    
        }
    }
?>
