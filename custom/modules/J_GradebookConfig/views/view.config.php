<?php
    class J_GradebookConfigViewConfig extends SugarView{        
        function J_GradebookConfigViewConfig(){      
            $this->bean2 = new J_GradebookConfig();
            $this->bean2->retrieve($_REQUEST['record']);
            parent::display();
        }

        function display(){ 
            include_once("custom/modules/J_GradebookConfig/GradebookConfigFunctions.php");    
            include_once("custom/include/_helper/junior_gradebook_utils.php");                         
            global $db, $mod_strings, $app_list_strings,$app_strings,$timedate;

            $ss = new Sugar_Smarty(); 
            $ss->assign('MOD',$mod_strings);
            $ss->assign('APP',$app_strings);   
            $ss->assign('RECORD',$this->bean2->id);   
            //
            $team_options = getJuniorCenter($this->bean2->team_id);
            $ss->assign('CENTER_OPTIONS',$team_options);  
            // 
            $htm_koc = getKOCOfCenter($this->bean2->team_id, $this->bean2->koc_id);
            $ss->assign('KOC_OPTIONS',$htm_koc);  
            
            $htm_level = getLevelOptions($this->bean2->koc_id, $this->bean2->level);
            $ss->assign('LEVEL_OPTIONS',$htm_level);
            
            $ss->assign('WEIGHT',$this->bean2->weight);
            
            unset($app_list_strings['gradeconfig_type_options']['Final']);
            $app_list_strings['gradeconfig_type_options'] = loadTestTypeOfKOC($this->bean2->koc_id, $this->bean2->level);
            
            $type_options = get_select_options_with_id($app_list_strings['gradeconfig_type_options'],$this->bean2->type);
            $ss->assign('TYPE_OPTIONS',$type_options);

            $ss->assign('CONFIG_CONTENT',$this->bean2->loadConfigContent());   

            $ss->display("custom/modules/J_GradebookConfig/tpls/Config.tpl") ;
        }          
    } 
?>