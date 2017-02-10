<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class C_ClassesViewDetail extends ViewDetail {

	function C_ClassesViewDetail(){
		parent::ViewDetail();
	}
	function _displaySubPanels(){ 
		require_once ('include/SubPanel/SubPanelTiles.php'); 
		$subpanel = new SubPanelTiles($this->bean, $this->module); 

		//Remove button subpanel teacher - room
		unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_classes_c_rooms_1']['top_buttons'][0]);//hiding create 
		unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_classes_c_rooms_1']['top_buttons'][1]);//hiding select 
		//            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_classes_c_teachers_1']['top_buttons'][0]);//hiding select 
		unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['c_classes_c_teachers_1']['top_buttons'][1]);//hiding select 

		echo $subpanel->display(); 
	}
	function display() {
		global $timedate;
		//dialog
		echo '<div id="dialog-confirm" title="Thông báo" style="display:none;">
		<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">
		</span>Vui lòng chọn Ngày Delay học viên. <span class="dateTime"><input disabled name="delay_date" size="10" id="delay_date" type="text" value="'.$timedate->nowDate().'">  <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Enter Date" id="delay_date_trigger" align="absmiddle"></span><br><br>
		<strong>Gợi ý</strong>: Học viên sẽ được xóa khỏi các buổi học từ sau Ngày Delay. Nếu bạn chỉ muốn xóa học viên ra khỏi 1 số buổi học của lớp thì bạn truy cập vào buổi học đó và thao tác xóa học viên ra khỏi buổi.<br>
		</div>
		</body>
		<script type="text/javascript">
		Calendar.setup ({
		inputField : "delay_date",
		daFormat : cal_date_format,
		daFormat : cal_date_format,
		button : "delay_date_trigger",
		singleClick : true,
		dateStr : "'.$timedate->nowDate().'",
		startWeekday: 0,
		step : 1,
		weekNumbers:false
		}
		);
		</script>';
		echo $GLOBALS['app_strings']['LBL_THONGBAO_UPGRADE'];
		echo $GLOBALS['app_strings']['LBL_THONGBAO_MOVE'];

		$currency = new Currency();
		if(isset($this->bean->currency_id) && !empty($this->bean->currency_id))
		{
			$currency->retrieve($this->bean->currency_id);
			if( $currency->deleted != 1){
				$this->ss->assign('CURRENCY', $currency->iso4217 .' '.$currency->symbol);
			}else {
				$this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());	
			}
		}else{
			$this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());
		}
		$this->bean->fee = format_number($this->bean->fee);
		
		//Add popup confirm minus to class - 04/08/2014 - by MTN
		$html_popup = '';
		$html_popup .= '<div id="popup_confirm" style="display:none;" title="Popup Message!"><h3 style="color: #A8141B;font-weight: bolder;">Do you agree minus money of the sessions has finished?</h3></div>';
		$this->ss->assign('POPUP_CONFIRM',$html_popup);

		//CUstom Buttom Input Score - Lap Nguyen
		if (ACLController::checkAccess('C_Classes', 'edit', true)){
			//Add button Upgrade to class - 04/08/2014 - by MTN
			$html = '';
			$html .= '<input type="button" id="upgrade_to_class" value="'.$GLOBALS['mod_strings']['LBL_UPGRADE_TO_CLASS'].'" onclick="open_popup(\'C_Classes\',600,400, \'\' ,true,true,{\'call_back_function\':\'ajaxUpgradeToClass\',\'form_name\':\'DetailView\',\'field_to_name_array\':{\'id\':\'class_id\'},},\'Select\',true);"></input>';
			$this->ss->assign('UPGRADE_BUTTON',$html);
			$bt = '<input type="button" id="create_time_table" value="'.$GLOBALS['mod_strings']['LNK_CLASS_SCHEDULE'].'" onclick="location.href=\'index.php?module=C_Classes&action=classSchedule&class_id='.$this->bean->id.'\'"/>';
			$this->ss->assign('TIME',$bt);  
		}
		//LOCK DATA - FUNCTION
		$sql2 = "SELECT DISTINCT
		COUNT(contacts.id) contacts__allcount,
		COUNT(DISTINCT contacts.id) contacts__count
		FROM
		contacts
		INNER JOIN
		c_classes_contacts_1_c l1_1 ON contacts.id = l1_1.c_classes_contacts_1contacts_idb
		AND l1_1.deleted = 0
		INNER JOIN
		c_classes l1 ON l1.id = l1_1.c_classes_contacts_1c_classes_ida
		AND l1.deleted = 0
		WHERE
		(((l1.id = '{$this->bean->id}')))
		AND contacts.deleted = 0";

		$bt_delete = '<input title="Delete" accesskey="d" class="button" onclick="var _form = document.getElementById(\'formDetailView\'); _form.return_module.value=\'Contacts\'; _form.return_action.value=\'ListView\'; _form.action.value=\'Delete\'; if(confirm(\'Are you sure you want to delete this record?\')) SUGAR.ajaxUI.submitForm(_form);" type="submit" name="Delete" value="Delete" id="delete_button">';
		if($GLOBALS['db']->getOne($sql2) > 0 && $GLOBALS['sugar_config']['lock_info'] && !($GLOBALS['current_user']->isAdmin()))
			$bt_delete = '';	
		$this->ss->assign('DELETE',$bt_delete);


		parent::display();
	}
}
?>