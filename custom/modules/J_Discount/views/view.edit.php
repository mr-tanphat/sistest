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


class J_DiscountViewEdit extends ViewEdit
{
    public function __construct()
    {
        parent::ViewEdit();
        $this->useForSubpanel = true;
        $this->useModuleQuickCreateTemplate = true;
    }
    public function display(){
        $reward ='';

        if(!isset($this->bean->id) || empty($this->bean->id)){
            $sql  = "SELECT id, name, type FROM j_discount WHERE deleted=0"; 
            $result = $GLOBALS['db']->query($sql); 
            // add gift
            $book_no = getHtmlAddRow('','',true);
            $book  = getHtmlAddRow('','',false);
            // add partnership
            $pa_no = getHtmlAddRowPa('','',true);
            $pa  = getHtmlAddRowPa('','',false); 

        }
        else{
            $sql  = "SELECT id, name, type FROM j_discount WHERE id NOT LIKE '".$this->bean->id."' AND deleted=0 "; 
            $result = $GLOBALS['db']->query($sql); 
            // add gift 
            $book_no = getHtmlAddRow('','',true);
            $content=json_decode(htmlspecialchars_decode($this->bean->content), true);
            foreach ($content as $key => $value) { 
                $book  .= getHtmlAddRow($key,$value,false); 
            }
            //add partnership
            $pa_no = getHtmlAddRowPa('','',true);
            $this->bean->load_relationship('j_discount_j_partnership_1');
            $partnership= $this->bean->j_discount_j_partnership_1->getBeans(); 
            foreach ($partnership as $part) { 
                $pa  .= getHtmlAddRowPa($part->id,$part->name,false); 
            }
        }

        // Do not apply with options - by Tung Bui
        $arrayNotApplyWith = json_decode(html_entity_decode($this->bean->disable_list),true);

        // Show "do not apply with" options 
        $html .= '<table class="table-striped" name="tb_discount_schema[]" id="tb_discount_schema">';
        $html .= '<tbody style="display: block; border: 1px solid lightgray; height: 200px; overflow-y: scroll"> <tr> <td><input type="checkbox" id="checkall" title="Select all"/></td>
        <th> Select all</th> </tr> ';

        //Add row "Reward"
        if ($this->bean->type != "Reward"){
            $checkProp = "";
            if (in_array("Reward",$arrayNotApplyWith)) $checkProp = "checked";
            $html .= '<tr ><td><input type="checkbox" name="check_schema[]" value= "Reward" '.$checkProp.'/></td>
            <td>Reward</td></tr>'; 
        }

        //Add row "Partnership"
        if ($this->bean->type != "Partnership"){
            $checkProp = "";
            if (in_array("Partnership",$arrayNotApplyWith)) $checkProp = "checked";
            $html .= '<tr ><td><input type="checkbox" name="check_schema[]" value= "Partnership" '.$checkProp.'/></td>
            <td>Partnership</td></tr>'; 
        }

        //Other discount
        while($row2 = $GLOBALS['db']->fetchByAssoc($result)){
            if ($row2['type'] != "Reward" && $row2['type'] != "Partnership"){
                $checkProp = "";
                if (in_array($row2['id'],$arrayNotApplyWith)) $checkProp = "checked";
                $html .= '<tr ><td><input type="checkbox" name="check_schema[]" value= "'.$row2['id'].'" '.$checkProp.'/></td>
                <td>'.$row2['name'].'</td></tr>';    
            }
        }
        $html .= '</tbody></table>';

        $this->ss->assign('SCHEMA_TABLE', $html); 
        $this->ss->assign('BOOK_NO', $book_no);
        $this->ss->assign('BOOK', $book);
        $this->ss->assign('PA_NO', $pa_no);
        $this->ss->assign('PA', $pa);

        parent::display();   
    }
}

// Generate Add row template Gift
function getHtmlAddRow( $id, $data, $showing){
    if($showing)                            
        $display = 'style="display:none;"';    
    $tpl_addrow  = "<tr class='row_tpl' $display  >";
    $tpl_addrow .= '<td nowrap align="center">
    <div><input name="book_name[]" value="'.$data['book_name'].'" class="book_name" type="text" style="margin-right: 10px;">
    <input name="book_id[]" value="'.$id.'"  class="book_id" type="hidden"><button type="button" class="btn_choose_book" onclick="clickChooseBook($(this))" ><img src="themes/default/images/id-ff-select.png"></button>
    <input name="qty_book[]" value="'.$data['qty_book'].'" class="qty_book" type="text" style="width:50px; font-weight: bold; color: rgb(165, 42, 42); text-align: right;">
    </div>
    </td>';
    $tpl_addrow .= "<td align='center'><button type='button' class='btn btn-danger btnRemove'>Remove</button></td>";
    $tpl_addrow .= '</tr>';
    return $tpl_addrow;
}
// Generate Add row template Partnership
function getHtmlAddRowPa( $pa_id, $pa_name, $showing){
    if($showing)                            
        $display = 'style="display:none;"';    
    $tpl_addrow  = "<tr class='row' $display  >";
    $tpl_addrow .= '<td nowrap align="center">
    <div><input name="pa_name[]" value="'.$pa_name.'" class="pa_name" type="text" style="margin-right: 10px;">
    <input name="pa_id[]" value="'.$pa_id.'"  class="pa_id" type="hidden"><button type="button" class="btn_choose_pa" onclick="clickChoosePa($(this))" ><img src="themes/default/images/id-ff-select.png"></button>
    </div>
    </td>';
    $tpl_addrow .= "<td align='center'><button type='button' class='btn btn-danger btn_Remove'>Remove</button></td>";
    $tpl_addrow .= '</tr>';
    return $tpl_addrow;
}