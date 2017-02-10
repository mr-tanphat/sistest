<?php

class ContactsViewEdit extends ViewEdit {

    function ContactsViewEdit(){
        parent::ViewEdit();
    }

    function preDisplay(){
        parent::preDisplay();
    }
    public function display()
    {
        global $beanFiles, $current_user;
        //Handle Convert Lead to Student
        if(!empty($_REQUEST['return_id']) && $_REQUEST['return_module'] == 'Leads'){
            $lead = BeanFactory::getBean('Leads', $_REQUEST['return_id']);
            foreach ($lead->field_defs as $keyField => $aFieldName)
                $this->bean->$keyField = $lead->$keyField;

            //fix by Trung 2016.01.12
            $this->bean->j_school_contacts_1_name = $lead->j_school_leads_1_name;
            $this->bean->j_school_contacts_1j_school_ida = $lead->j_school_leads_1j_school_ida;

            $this->bean->id = '';
            $this->bean->assigned_user_id = $lead->assigned_user_id;
            $this->bean->assigned_user_name = get_assigned_user_name($this->bean->assigned_user_id);
        }


        if(!isset($this->bean->id) || empty($this->bean->id)){
            //Check NEWID
            $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold"> New </span>');
            //Relationship
            $rela_no = getHtmlAddRow('','','','',true);
            $rela  = getHtmlAddRow('','','','',false);

        }else{
            //Check NEWID
            $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold" id = "student_id">'.$this->bean->contact_id.'</span>');
            //Relationship
            $rela_no = getHtmlAddRow('','','','',true);
            $this->bean->load_relationship('contacts_contacts_1');
            $relationship_student= $this->bean->contacts_contacts_1->getBeans();
            $this->bean->load_relationship('leads_contacts_1');
            $relationship_lead= $this->bean->leads_contacts_1->getBeans();
            if(count($relationship_student) !=''){
                foreach ($relationship_student as $relation) {
                    $sql = "SELECT related FROM contacts_contacts_1_c WHERE contacts_contacts_1contacts_ida='".$this->bean->id."' AND contacts_contacts_1contacts_idb='".$relation->id."' AND DELETED=0 ";
                    $related = $GLOBALS['db']->getone($sql);
                    $rela  .= getHtmlAddRow($relation->id,$relation->name,$related,'Contacts',false);
                }
            }
            if(count($relationship_lead) !=''){
                foreach ($relationship_lead as $relation) {
                    $sql = "SELECT related FROM leads_contacts_1_c WHERE leads_contacts_1leads_ida='".$relation->id."' AND leads_contacts_1contacts_idb='".$this->bean->id."' AND DELETED=0 ";
                    $related = $GLOBALS['db']->getone($sql);
                    $rela  .= getHtmlAddRow($relation->id,$relation->name,$related, 'Leads',false);
                }
            }
            if($rela == ''){
                $rela  = getHtmlAddRow('','','','',false);
            }

        }
        $assigned_user_id_2= $this->bean->assigned_user_id;
        $this->ss->assign('assigned_user_id_2', $assigned_user_id_2);
        $status ='';
        $html = '';
        if($this->bean->nationality == 'Việt Nam' || $this->bean->id=='' || !isset($this->bean->id)){
            $html .= '<label style="display: inline-block;"><input name="radio_national" value="Việt Nam" id="vietnam_national" type="radio" checked = "checked"> Việt Nam</label> &nbsp';
            $html .= '<label style="display: inline-block;"><input value="" name="radio_national" id="other_national" type="radio" > Other</label> &nbsp;';
            $html .= '<input type="text" style="display:none" name="nationality" id="nationality" size="30" maxlength="255" value="'.$this->bean->nationality.'">';
            $status .= '<label>Waiting for class</label>' ;
        } else {
            $html .= '<label style="display: inline-block;"><input name="radio_national" value="Việt Nam" id="vietnam_national" type="radio"> Việt Nam</label> &nbsp';
            $html .= '<label style="display: inline-block;"><input value="" name="radio_national" id="other_national" type="radio" checked = "checked"> Other</label> &nbsp;';
            $html .= '<input type="text" name="nationality" id="nationality" size="30" maxlength="255" value="'.$this->bean->nationality.'">';
            $status .= '<label>'.$this->bean->contact_status.'</label>' ;
        }

        //contact parent
        $con = '';
        $this->bean->load_relationship('c_contacts_contacts_1');
        $contact= $this->bean->c_contacts_contacts_1->getBeans();
        if(!empty($contact))
            foreach ($contact as $C){
                $con .= '<input type="text" name="guardian_phone" id="guardian_phone" size="30" maxlength="100" value="'.$C->mobile_phone.'"/>' ;
        }
        else  $con .= '<input type="text" name="guardian_phone" id="guardian_phone" size="30" maxlength="100" value=""/>' ;

        //company
        $com = '';
        $com .= '<input name="company_name" id="company_name" type="text"  value="">
        <input name="company_id" id="company_id" type="hidden"  value="">
        <button type="button" name="choose_company" id="choose_company" ><img src="themes/default/images/id-ff-select.png"></button>
        <button type="button" name="clr_company" id="clr_company" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, \'company_name\', \'company_id\');"><img src="themes/default/images/id-ff-clear.png"></button>';

        $team_id     = $this->bean->team_id;
        if(empty($team_id)) $team_id = $GLOBALS['current_user']->team_id;
        $_type 		= $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$team_id}'");
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

        $this->ss->assign('team_type',$_type);
        $this->ss->assign('html_koc',$html_koc);
        $this->ss->assign('lead_source',$html_lead_source);
        $this->ss->assign('NATIONALITY', $html);
        $this->ss->assign('RELATIONSHIP', $rela);
        $this->ss->assign('RELATIONSHIP_NO', $rela_no);
        $this->ss->assign('STATUS', $status);
        $this->ss->assign('COMPANY', $com);

        echo getVersionedScript('modules/Contacts/Contact.js');
        echo '<script language="javascript">';
        echo 'addToValidateComparison(\'EditView\', \'portal_password\', \'varchar\', false, SUGAR.language.get(\'app_strings\', \'ERR_SQS_NO_MATCH_FIELD\') + SUGAR.language.get(\'Contacts\', \'LBL_PORTAL_PASSWORD\'), \'portal_password1\');';
        echo 'addToValidateVerified(\'EditView\', \'portal_name_verified\', \'bool\', false, SUGAR.language.get(\'app_strings\', \'ERR_EXISTING_PORTAL_USERNAME\'));';
        echo 'YAHOO.util.Event.onDOMReady(function() {YAHOO.util.Event.on(\'portal_name\', \'blur\', validatePortalName);YAHOO.util.Event.on(\'portal_name\', \'keydown\', handleKeyDown);});';
        echo '</script>';

        //Navigate Form Base convert Lead -> Student
        if (!empty($_REQUEST['return_id']) &&  $_REQUEST['return_module'] =='Leads'){
            $this->ss->assign('lead_id', $_REQUEST['return_id']);
            $_REQUEST['return_module'] 	= 'Contacts';
            $_REQUEST['return_id'] 		= '';
        }
        //add script auto Complete
        // echo "include("/custom/include/javascripts/AutoComplete/src/js/textext.core.js");";
        //end
        $this->bean->guardian_name = $this->bean->guardian_name?$this->bean->guardian_name:"";
        $default_parent = array(
            'guardian_name' => $this->bean->c_contacts_contacts_1_name?$this->bean->c_contacts_contacts_1_name:$this->bean->guardian_name,
            'c_contacts_contacts_1c_contacts_ida' => $this->bean->c_contacts_contacts_1c_contacts_ida?$this->bean->c_contacts_contacts_1c_contacts_ida:"",
            'c_contacts_contacts_1_name' => $this->bean->c_contacts_contacts_1_name?$this->bean->c_contacts_contacts_1_name:$this->bean->guardian_name,
            'phone_mobile' => $this->bean->phone_mobile?$this->bean->phone_mobile:"",
            'primary_address_street' => $this->bean->primary_address_street?$this->bean->primary_address_street:"",
            'email1' => $this->bean->email1?$this->bean->email1:"",
        );
        echo '<script language="javascript">
        var default_parent = '.(json_encode($default_parent)).';

        </script>';
        parent::display();
    }
}
// Generate Add row template
function getHtmlAddRow( $student_id, $student_name, $related, $select, $showing){
    if($showing)
        $display = 'style="display:none;"';
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
            $tpl_addrow .= '<option value="'.$key.'" selected> '.$value.' </option>'  ; }
        else
            $tpl_addrow .= '<option value="'.$key.'"> '.$value.' </option>'  ;
    }
    $tpl_addrow .=  '</select></td>';
    $tpl_addrow .= '<td nowrap align="center">
    <input name="student_name[]" value="'.$student_name.'" class="student_name" type="text" style="margin-right: 10px;"><input name="student_id[]" value="'.$student_id.'"  class="student_id" type="hidden">
    <span class="id-ff multiple">
    <button type="button" class="btn_choose_student" onclick="clickChooseStudent($(this))" ><img src="themes/default/images/id-ff-select.png"></button>
    <button type="button" name="btn_clr_student_name" id="btn_clr_student_name" onclick="clickClearStudent($(this))"><img src="themes/default/images/id-ff-clear.png"></button><br><br></span>
    </td>';
    $tpl_addrow .= "<td align='center'><input name='jsons[]' value='$json' class='jsons' type='hidden'><button type='button' class='btn btn-danger btnRemove'>Remove</button></td>";
    $tpl_addrow .= '</tr>';
    return $tpl_addrow;
}