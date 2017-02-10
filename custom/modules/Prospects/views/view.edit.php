<?php 

class ProspectsViewEdit extends ViewEdit {

    function ProspectsViewEdit(){
        parent::ViewEdit();
    }

    function preDisplay(){
        parent::preDisplay();
    }
    public function display()
    {
        $team_id 	= $GLOBALS['current_user']->team_id;
        $_type = $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$team_id}'");
        if($_type == 'Junior'){
            //generate Lead Source
            $html_lead_source = '<select name="lead_source" id="lead_source">';
            $html_lead_source .= get_select_options_with_id($GLOBALS['app_list_strings']['lead_source_list'], $this->bean->lead_source);
            $html_lead_source .= '<select/>';
        }else{
            //generate Lead Source
            $html_lead_source = '<select name="lead_source" id="lead_source">';
            $html_lead_source .= get_select_options_with_id($GLOBALS['app_list_strings']['lead_source_list'], $this->bean->lead_source);
            $html_lead_source .= '<select/>'; 
        }
        $this->ss->assign('lead_source', $html_lead_source);
        $this->bean->assigned_user_name = get_assigned_user_name($this->bean->assigned_user_id);

        $color = '';       
        switch($this->bean->status) { 
            case 'New':     
                $color = "textbg_green"; 
                break;
            case 'In Process':     
                $color = "textbg_blue"; 
                break;        
            case 'Dead':     
                $color = "textbg_black"; 
                break;  
            case 'Converted':     
                $color = "textbg_red"; 
                break;
        }
        $this->ss->assign('STATUS',"<span class='$color'>{$this->bean->status}</span>");
        parent::display();
    }
}

?>