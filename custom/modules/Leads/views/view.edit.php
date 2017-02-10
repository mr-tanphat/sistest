<?php

class LeadsViewEdit extends ViewEdit {

    function LeadsViewEdit(){
        parent::ViewEdit();
    }

    function preDisplay(){
        parent::preDisplay();
    }
    public function display()
    {
        global $current_user;
        if(!empty($_REQUEST['return_id']) && $_REQUEST['return_module'] == 'Prospects'){
            $prospect = BeanFactory::getBean('Prospects', $_REQUEST['return_id']);
            foreach ($prospect->field_defs as $keyField => $aFieldName)
                $this->bean->$keyField = $prospect->$keyField;

            $this->bean->j_school_leads_1_name = $prospect->j_school_prospects_1_name;
            $this->bean->j_school_leads_1j_school_ida = $prospect->j_school_prospects_1j_school_ida;

            $this->bean->id = '';
            $this->bean->assigned_user_id = $prospect->assigned_user_id;
            $this->bean->assigned_user_name = get_assigned_user_name($this->bean->assigned_user_id);
        }

        $html = '';
        $status ='';
        if( empty($this->bean->id) ){
            $html .= '<label style="display: inline-block;"><input name="radio_national" value="Việt Nam" id="vietnam_national" type="radio" checked = "checked"> Việt Nam</label> &nbsp';
            $html .= '<label style="display: inline-block;"><input value="" name="radio_national" id="other_national" type="radio" > Other</label> &nbsp;';
            $html .= '<input type="text" style="display:none" name="nationality" id="nationality" size="30" maxlength="255" value="'.$this->bean->nationality.'">';
            $status .= '<label>New</label>' ;
            //Relationship
            $rela_no = getHtmlAddRow('','','','',true);
            $rela  = getHtmlAddRow('','','','',false);
        }
        else {
            $html .= '<label style="display: inline-block;"><input name="radio_national" value="Việt Nam" id="vietnam_national" type="radio"> Việt Nam</label> &nbsp';
            $html .= '<label style="display: inline-block;"><input value="" name="radio_national" id="other_national" type="radio" checked = "checked"> Other</label> &nbsp;';
            $html .= '<input type="text" name="nationality" id="nationality" size="30" maxlength="255" value="'.$this->bean->nationality.'">';
            $status .= '<label>'.$this->bean->status.'</label>' ;

            //Relationship
            $rela_no = getHtmlAddRow('','','','',true);
            $this->bean->load_relationship('leads_leads_1');
            $relationship_lead		= $this->bean->leads_leads_1->getBeans();

            $this->bean->load_relationship('leads_contacts_1');
            $relationship_student	= $this->bean->leads_contacts_1->getBeans();

            if(count($relationship_student) !=''){
                foreach ($relationship_student as $relation) {
                    $sql = "SELECT related FROM leads_contacts_1_c WHERE leads_contacts_1leads_ida='".$this->bean->id."' AND leads_contacts_1contacts_idb='".$relation->id."' AND DELETED=0 ";
                    $related = $GLOBALS['db']->getOne($sql);
                    $rela  .= getHtmlAddRow($relation->id,$relation->name,$related,'Contacts',false);
                }
            }
            if(count($relationship_lead) !=''){
                foreach ($relationship_lead as $relation) {
                    $sql = "SELECT related FROM leads_leads_1_c WHERE leads_leads_1leads_ida='".$this->bean->id."' AND leads_leads_1leads_idb='".$relation->id."' AND DELETED=0 ";
                    $related = $GLOBALS['db']->getOne($sql);
                    $rela  .= getHtmlAddRow($relation->id,$relation->name,$related, 'Leads',false);
                }
            }
            if($rela == '')
                $rela  = getHtmlAddRow('','','','',false);


            //company
            //            $this->bean->load_relationship('accounts');
            //            $corporates = reset($this->bean->accounts->getBeans());

        }
        $assigned_user_id_2= $this->bean->assigned_user_id;
        $this->ss->assign('assigned_user_id_2', $assigned_user_id_2);
        $this->ss->assign('RELATIONSHIP', $rela);
        $this->ss->assign('RELATIONSHIP_NO', $rela_no);

        $team_id 	= $this->bean->team_id;
        if(empty($team_id)) $team_id = $GLOBALS['current_user']->team_id;
        $_type = $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$team_id}'");
        if($_type == 'Junior'){
            //generate Prefered kind of course
            $html_koc = '<select name="preferred_kind_of_course" id="preferred_kind_of_course">';
            $html_koc .= get_select_options_with_id($GLOBALS['app_list_strings']['kind_of_course_junior_program_list'], $this->bean->preferred_kind_of_course);
            $html_koc .= '<select/>';
            //generate Lead Source
            $html_lead_source = '<select name="lead_source" id="lead_source">';
            $html_lead_source .= get_select_options_with_id($GLOBALS['app_list_strings']['lead_source_list'], $this->bean->lead_source);
            $html_lead_source .= '<select/>';
        }else{
            //generate Prefered kind of course
            $html_koc = '<select name="preferred_kind_of_course" id="preferred_kind_of_course">';
            $html_koc .= get_select_options_with_id($GLOBALS['app_list_strings']['kind_of_course_360_list'], $this->bean->preferred_kind_of_course);
            $html_koc .= '<select/>';
            //generate Lead Source
            $html_lead_source = '<select name="lead_source" id="lead_source">';
            $html_lead_source .= get_select_options_with_id($GLOBALS['app_list_strings']['lead_source_list'], $this->bean->lead_source);
            $html_lead_source .= '<select/>';
        }

        $this->ss->assign('NATIONALITY', $html);
        $this->ss->assign('STATUS', $status);
        $this->ss->assign('html_koc',$html_koc);
        $this->ss->assign('lead_source', $html_lead_source);

        //Navigate Form Base convert Target -> Lead
        if(!empty($_REQUEST['prospect_id'])){
            $_REQUEST['return_module'] 	= 'Leads';
            $_REQUEST['return_id'] 		= '';
            $this->bean->status = 'New';
            $this->bean->potential = 'Interested';
        }
        if($_REQUEST['isDuplicate'] == "true"){
            $this->bean->status = 'New';
        }

        parent::display();
    }
}

// Generate Add row template
function getHtmlAddRow( $rela_id, $rela_name, $related, $select, $showing){
    if($showing){
        $display = 'style="display:none;"';
    }
    $tpl_addrow  = "<tr class='row_tpl' $display  >";
    $tpl_addrow  .= '<td><select name="select[]" id="select">';
    if($select == 'Leads'){
        $tpl_addrow  .= '<option value="Leads" selected>Lead</option> <option value="Contacts">Student</option></select></td>';
    }
    else if($select == 'Contacts'){
        $tpl_addrow  .= '<option value="Contacts" selected>Student</option> <option value="Leads">Lead</option></select></td>';
    }
    else {
        $tpl_addrow  .= '<option value="Leads">Lead</option>
        <option value="Contacts">Student</option></select></td>';
    }
    $tpl_addrow .= '<td><select name="select_rela[]" class="select_rela"> ';
    $rela= $GLOBALS['app_list_strings']['rela_contacts_list'];
    foreach($rela as $key => $value){
        if($related==$key){
            $tpl_addrow .= '<option value="'.$key.'" selected> '.$value.' </option>';}
        else
            $tpl_addrow .= '<option value="'.$key.'"> '.$value.' </option>'  ;
    }
    $tpl_addrow .=  '</select></td>';
    $tpl_addrow .= '<td nowrap align="center">
    <input name="rela_name[]" value="'.$rela_name.'" class="rela_name" type="text" style="margin-right: 10px;"><input name="rela_id[]" value="'.$rela_id.'"  class="rela_id" type="hidden">
    <span class="id-ff multiple">
    <button type="button" class="btn_choose_rela button firstChild" onclick="clickChooseRela($(this))"><img src="themes/default/images/id-ff-select.png"></button>
    <button type="button" name="btn_clr_rela_name button lastChild" id="btn_clr_rela_name" onclick="clickClearRela($(this))"><img src="themes/default/images/id-ff-clear.png"></button></span>
    </td>';
    $tpl_addrow .= "<td align='center'><input name='jsons[]' value='$json' class='jsons' type='hidden'><button type='button' class='btn btn-danger btnRemove'>Remove</button></td>";
    $tpl_addrow .= '</tr>';
    return $tpl_addrow;
}