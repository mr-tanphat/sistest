<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class J_KindofcourseViewEdit extends ViewEdit{
    const MAX_BOOK_NAME = 3;
    public function __construct(){                      
        parent::ViewEdit();
    }

    public function preDisplay() {
        parent::preDisplay();
        echo '<script> var max_book_name='.self::MAX_BOOK_NAME.'</script>';
    }

    public function display(){
        $team_type = $GLOBALS['current_user']->team_type; 
        if(!empty($this->bean->team_id))
            $team_type = getTeamType($this->bean->team_id);    
        $this->ss->assign('team_type',$team_type); 
        $maxBook = J_KindofcourseViewEdit::MAX_BOOK_NAME;
        //Chèn một dòng display none trên cùng
        $levelItems = generateEmptyRow(false);

        if (empty($this->bean->content)){                   
            // Nếu content trống thì generate một dòng trống
            $levelItems .= generateEmptyRow(true);
        }
        else {
            // Nếu có content thì generate cho content    
            $content = json_decode(html_entity_decode($this->bean->content),true);    

            foreach($content as $key => $value){
                $ssLevelItem = new Sugar_Smarty();
                $ssLevelItem->assign("DISPLAY","");
                $ssLevelItem->assign("LEVEL_OPTIONS", get_select_options_with_id($GLOBALS['app_list_strings']['level_junior_program_list'],$value['levels']));
                $ssLevelItem->assign("MODULE_OPTIONS", get_select_options_with_id($GLOBALS['app_list_strings']['module_junior_program_list'],$value['modules']));
                $ssLevelItem->assign("HOURS", $value['hours']);
                $ssLevelItem->assign("TEST_1", $value['test_1']);
                $ssLevelItem->assign("TEST_2", $value['test_2']);
                $ssLevelItem->assign("FINAL_TEST", $value['final_test']);
                $ssLevelItem->assign("JSON", json_encode($value));
                $levelItems .= $ssLevelItem->fetch('custom/modules/J_Kindofcourse/tpls/levelConfigItem.tpl');
            }
        }              

        // Assign tpl level config
        $ssLevelConfig = new Sugar_Smarty();
        $ssLevelConfig->assign("TBODY", $levelItems);
        $ssLevelConfig->assign("MOD", $GLOBALS['mod_strings']);
        $levelConfigHtml = $ssLevelConfig->fetch('custom/modules/J_Kindofcourse/tpls/levelConfig.tpl');

        $this->ss->assign('LEVEL_CONFIG',$levelConfigHtml);





        parent::display();
    }
}
// Generate Add row template
function generateEmptyRow($show){
    $ssLevelItem = new Sugar_Smarty();
    if ($show)$ssLevelItem->assign("DISPLAY", "");
    else $ssLevelItem->assign("DISPLAY", "style='display:none;'");

    $ssLevelItem->assign("LEVEL_OPTIONS", get_select_options_with_id($GLOBALS['app_list_strings']['level_junior_program_list'],""));
    $ssLevelItem->assign("MODULE_OPTIONS", get_select_options_with_id($GLOBALS['app_list_strings']['module_junior_program_list'],""));
    $ssLevelItem->assign("TEST_1", "");
    $ssLevelItem->assign("TEST_2", "");
    $ssLevelItem->assign("FINAL_TEST", "");
    $ssLevelItem->assign("JSON", "");
    return $ssLevelItem->fetch('custom/modules/J_Kindofcourse/tpls/levelConfigItem.tpl');
}