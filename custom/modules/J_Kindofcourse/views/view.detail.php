<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class J_KindofcourseViewDetail extends ViewDetail {
    function J_KindofcourseViewDetail(){
        parent::ViewDetail();
    }
    function display() {
        //get list levels to array
        $tmpContent = json_decode(html_entity_decode($this->bean->content),true);
        $levelConfigHtml = '<table style="width:70%"><thead><tr>';
        $levelConfigHtml .= '<th>'.translate('LBL_LEVEL','J_Kindofcourse').'</th>';
        $levelConfigHtml .= '<th>'.translate('LBL_MODULE','J_Kindofcourse').'</th>';
        $levelConfigHtml .= '<th>'.translate('LBL_HOURS','J_Kindofcourse').'</th>';
        $levelConfigHtml .= '<th>'.translate('LBL_TEST_1','J_Kindofcourse').'</th>';
        $levelConfigHtml .= '<th>'.translate('LBL_TEST_2','J_Kindofcourse').'</th>';
        $levelConfigHtml .= '<th>'.translate('LBL_FINAL_TEST','J_Kindofcourse').'</th>';
        $levelConfigHtml .= '</tr><tbody>';

        foreach($tmpContent as $key => $value){
            $levelConfigHtml .= '<tr>';
            $levelConfigHtml .= '<td style="text-align:center;width:20%">'.$value['levels'].'</td>';
            $levelConfigHtml .= '<td style="text-align:center;width:20%">'.implode(",", $value['modules']).'</td>';
            $levelConfigHtml .= '<td style="text-align:center;width:15%">'.$value['hours'].'</td>';
            $levelConfigHtml .= '<td style="text-align:center;width:15%">'.$value['test_1'].'</td>';
            $levelConfigHtml .= '<td style="text-align:center;width:15%">'.$value['test_2'].'</td>';
            $levelConfigHtml .= '<td style="text-align:center;width:15%">'.$value['final_test'].'</td>';
            $levelConfigHtml .= '</tr>';
        }
        $levelConfigHtml .= '</tbody></table>';

        $this->ss->assign('LEVEL_CONFIG',$levelConfigHtml);
        $team_type = getTeamType($this->bean->team_id);    
        $this->ss->assign('team_type',$team_type);
        parent::display();
    }
}
?>