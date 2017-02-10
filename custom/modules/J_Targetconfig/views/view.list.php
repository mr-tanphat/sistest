<?php
    class J_TargetconfigViewList extends SugarView {

        function J_TargetconfigViewList() {
            parent::SugarView();
        }

        function display() {              
            global $mod_strings;
            global $theme;
            $theme_path = "themes/".$theme."/";
            $image_path = $theme_path."images/"; 
            $image_path_default = "themes/default/images/"; 
            require_once($theme_path.'layout_utils.php'); 
        ?>
        <h1>CONFIG TARGET</h1>
        <table border="0" cellpadding="0" cellspacing="0" class="h3Row"><tr>
                <td align="left" valign="top" colspan="2"><img src="include/images/blank.gif" 
                    alt="spacer" width="10" height="2" border="0"><h3 style="margin: 0px;"><img src="include/images/blank.gif" 
                    alt="spacer" width="10" height="2" border="0"></td>
            </tr></table>
        <table border="0" cellpadding="0" cellspacing="1" width="100%" class="h3Row">           
            <tr>
                <td class="tabDetailViewDF" nowrap="nowrap" width="20%">
                    <a href="index.php?module=J_Targetconfig&action=ConfigNewsale"><strong><?php echo $mod_strings['LBL_SET_NEW_SALE']; ?></strong></a>
                </td>
                <td class="tabDetailViewDL" width="30%"><?php echo $mod_strings['LBL_SET_NEW_SALE']; ?></td>
            </tr>
            <tr>
                <td class="tabDetailViewDF" nowrap="nowrap" width="20%">
                    <a href="index.php?module=J_Targetconfig&action=ConfigEnquires"><strong><?php echo $mod_strings['LBL_SET_TARGET_ENQUIRES']; ?></strong></a>
                </td>
                <td class="tabDetailViewDL" width="30%"><?php echo $mod_strings['LBL_SET_TARGET_ENQUIRES']; ?></td>
            </tr>
            <tr>
                <td class="tabDetailViewDF" nowrap="nowrap" width="20%">
                    <a href="index.php?module=J_Targetconfig&action=ConfigRevenue"><strong><?php echo $mod_strings['LBL_SET_TARGET_REVENUE']; ?></strong></a>
                </td>
                <td class="tabDetailViewDL" width="30%"><?php echo $mod_strings['LBL_SET_TARGET_REVENUE']; ?></td>
            </tr>            
        </table>
        <?php

        } 
    } 
?>
