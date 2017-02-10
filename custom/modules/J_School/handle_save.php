<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
class logicCoursefee {  
	public function saveFile(&$bean, $event, $arguments){
		global $current_user;
		//save school name
		if(empty($bean->address_address_street))
			$bean->name = $bean->level.' '.$bean->short_name; 
		else
			$bean->name = $bean->level.' '.$bean->short_name.' ('.$bean->address_address_street.')';
			
		$bean->assigned_user_id	=	$current_user->id;
        
        $team_list = array();
            // Get all team set
            $teamSetBean = new TeamSet();
            $teams = $teamSetBean->getTeams($bean->team_set_id);
            // Add all team set to  $team_list
            foreach ($teams as $key => $value) {
                $team_list[] = $key;
            }
            // Add children of team set to $team_list
            foreach ($teams as $key => $value) {
                // Get children of team
                $q1 = "SELECT id, name, parent_id FROM teams WHERE private <> 1 AND deleted = 0 AND parent_id = '{$key}'";
                $rs1 = $GLOBALS['db']->query($q1);

                while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
                    if (!isset($teams[$row['id']])) $team_list[] = $row['id'];
                    $q2 = "SELECT id, name, parent_id FROM teams WHERE private <> 1 AND deleted = 0 AND parent_id = '{$row['id']}'";
                    $rs2 = $GLOBALS['db']->query($q2);
                    while($row2 = $GLOBALS['db']->fetchByAssoc($rs2))
                        if (!isset($teams[$row['id']])) $team_list[] = $row2['id'];
                }
            }

            if(!empty($team_list)){
                $bean->team_id = $bean->team_id;
                $bean->load_relationship('teams');
                //Add the teams
                $bean->teams->replace($team_list); 
            }
	}

	//to mau id va status Quyen.Cao
	function listViewColorSchool(&$bean, $event, $arguments){
		$bean->school_id = '<span class="textbg_blue">'.$bean->school_id.'</span>';
		switch ($bean->level) {
			case "Mẫu giáo":
				$colorClass = "textbg_yellow_light";
				break;
			case "Tiểu học":
				$colorClass = "textbg_green";
				break; 
			case "THCS":
				$colorClass = "textbg_orange";
				break;
			case "THPT":
				$colorClass = "textbg_dream";
				break;
			case "Cao đẳng":
				$colorClass = "textbg_crimson";
				break;
			case "Đại học":
				$colorClass = "textbg_crimson";
				break;
			case "N/A":
				$colorClass = "textbg_red";
				break;

		}   
		$bean->level = '<span class="'.$colorClass.'">'.$bean->level.'</span>';
	}
}
?>