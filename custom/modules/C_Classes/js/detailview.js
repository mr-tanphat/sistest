$(document).ready(function(){
	//Remove and change action of button Select Meeting in subpanel - 24/07/2014 - by MTN
	$('#classes_meetings_select_button').removeAttr('onclick');
	$('#classes_meetings_select_button').val(SUGAR.language.get('C_Classes', 'LBL_DELETE_ALL_SESSION'));

	//Ajax Delete each Session record in subpanel - 29/07/2014 - by MTN
	$('input[name="delete_button"]').live('click',function(){
		var checked = confirm("Do you want to delete this session?");

		if (checked == true) {
			jQuery("#availability_status").remove();
			jQuery(this).parent().append("<span id='availability_status' style = 'padding-top: 7px;'></span>");
			jQuery("#availability_status").html('<img src="custom/include/images/loader.gif" align="absmiddle" width="16">');
			$.ajax({
				url:'index.php?module=C_Classes&action=actAddToClass&sugar_body_only=true',
				type:'POST',
				data:{
					session_id : this.getAttribute('id'),
					type : 'removeSession',
				},
				success:function(data){
					showSubPanel('classes_meetings', null, true);
					jQuery("#availability_status").remove();
				}
			});
		}
	});

	//Ajax Delete All Session record in subpanel - 29/07/2014 - by MTN
	$('#delete_all_button').live('click',function(){
		//Dialog confirm to delete All
		var checked = confirm("Are you sure you want to delete all session Not Started?");

		if (checked == true) {
			jQuery("#availability_status").remove();
			jQuery("#delete_all_button").parent().append("<span id='availability_status' style = 'padding-top: 5px;'></span>");
			jQuery("#availability_status").html('<img src="custom/include/images/loader.gif" align="absmiddle" width="16">');
			$.ajax({
				url:'index.php?module=C_Classes&action=actDeleteSession&sugar_body_only=true',
				type:'POST',
				data:{
					delete_all : "Delete All",
					class_id : $('input[name="record"]').val(),
				},
				success:function(data){
					showSubPanel('classes_meetings', null, true);
					jQuery("#availability_status").remove();
				}
			});
		}
	});

	//add action for Upgrade To Class Button
	$('#move_to_class').live('click',function(){
		open_popup("C_Classes", 600, 400, "", true, true, {
			"call_back_function": "showPopupConfirm",
			"form_name": "DetailView",
			"field_to_name_array": {
				"id": "class_id"
			},
			}, "Select", true);
	});

	//add action for Upgrade To Class Button
	$('#select_from_publ').live('click',function(){
		window.location = 'index.php?module=Opportunities&action=index&class_id='+$('input[name=record]').val();
	});

	//add action 
	$('#select_from_corp').live('click',function(){
		window.location = 'index.php?module=Contracts&action=index&class_id='+$('input[name=record]').val();
	});

	//create by leduytan 2/8/2014
	$('#send_email').live('click', function(){
		ajaxSendMailStudent();        
	});
	$('#send_sms').live('click', function(){
		ajaxSendSMS();        
	});
	//end

	//Add event Remove and Suspend a Student from Class - 07/08/2013 - by MTN
	$('input[name=remove]').live('click', function(){
		var student_id = this.getAttribute('id');
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			width: 600,
			modal: true,
			buttons: {
				"Đồng ý": function() {
					$(this).dialog("close");
					ajaxRemoveStudent(student_id);
				},
				"Hủy thao tác": function() {
					$(this).dialog("close");   
				},
			}
		});     
	});

	$('input[name=make_up_button]').live('click', function(){
		window.open('index.php?module=Meetings&return_module=Meetings&action=EditView&record='+this.getAttribute('id')+'&session_status=Make-up', '_blank');
	});

	$('input[name=cover_button]').live('click', function(){
		window.open('index.php?module=Meetings&return_module=Meetings&action=EditView&record='+this.getAttribute('id')+'&session_status=Cover', '_blank');
	});
	$('#delay_date').on('change', function(){
		checkDataLockDate('delay_date');
	});
});

//Show popup to confirm minus money when move to new class have some session is finish - 04/08/2014 - by MTN
function showPopupConfirm(popup_reply_data){

	//get Class ID from popup sugarcrm screen
	var class_id = popup_reply_data.name_to_value_array.class_id;
	//get Student ID checked in Sunpanel
	var move_list = [];
	$("input.checkbox_inclass").each(function(){
		if($(this).is(':checked')){
			move_list.push($(this).val());
		}  
	});

	if(move_list.length == 0){
		alertify.alert('You must select at least 1 student.');
	}else{
		ajaxStatus.showStatus('Checking <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');

		$.ajax({
			url: "index.php?module=C_Classes&action=actCheckClassNull&sugar_body_only=true",
			type: "POST",
			async: true,
			data:  
			{
				class_id: class_id,
				move_list: move_list,
				type: 'moveStudent',
			},
			dataType: "json", 
			success: function(res){
				switch (res.success) {
					case 'error1':
						alertify.alert('This class is not enough seating for' + move_list.length + ' persons. Please, Check max size of class again.');
						ajaxStatus.hideStatus();
						break;
					case 'error2':
						ajaxStatus.hideStatus();
						$( "#dialog-confirm_3" ).dialog({
							resizable: false,
							width: 600,
							modal: true,
							buttons: {
								"Thêm vào tất cả các buổi": function() {
									$(this).dialog("close");
									ajaxMoveToClass(class_id, move_list, '1');
								},
								"Chỉ thêm vào các buổi chưa bắt đầu": function() {
									$(this).dialog("close");
									ajaxMoveToClass(class_id, move_list, '0');
								},
							}
						});
						break;
					case '1':
						ajaxMoveToClass(class_id, move_list); 
						break;
					default:
						alertify.alert('An error occurred. Please, try again!');
						ajaxStatus.hideStatus();
				}   
			},       
		});
	}
}

//Ajax Move to class
function ajaxMoveToClass(class_id, move_list, comfirm){

	ajaxStatus.showStatus('Waiting <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
	$.ajax({
		url: "index.php?module=C_Classes&action=actAddToClass&sugar_body_only=true",
		type: "POST",
		async: true,
		data:  
		{
			move_list: move_list,
			new_class_id: class_id,
			comfirm: comfirm,
			old_class_id: $('input[name=record]').val(),
			type: 'moveStudent',
		}, 
		dataType: "json",
		success: function(data){
			if(data.success == "1"){
				alertify.confirm("Move thành công !!. Bạn có muốn chuyển trang sang màn hình của lớp mới <br><br>", function (e) {
					if (e) {
						window.location = 'index.php?module=C_Classes&return_module=C_Classes&action=DetailView&record='+class_id;
					}else{
						window.location = 'index.php?module=C_Classes&return_module=C_Classes&action=DetailView&record='+$('input[name=record]').val();
					}
				});
			} else{
				alert('Đã có lỗi xảy ra, vui lòng kiểm tra lại các hồ sơ học viên!');
			}  
		},       
	});
	ajaxStatus.hideStatus(); 
}

//Ajax Upgrade to class
function ajaxUpgradeToClass(popup_reply_data){
	var new_class_id = popup_reply_data.name_to_value_array.class_id;
	ajaxStatus.showStatus('Waiting <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
	$( "#dialog-confirm_2" ).dialog({
		resizable: false,
		width: 600,
		modal: true,
		buttons: {
			"Đồng ý": function() {
				$(this).dialog("close");
				ajaxStatus.showStatus('Waiting <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
				$.ajax({
					url: "index.php?module=C_Classes&action=actAddToClass&sugar_body_only=true",
					type: "POST",
					async: true,
					data:  
					{   
						old_class_id: $('input[name=record]').val(),
						new_class_id: new_class_id,
						type : 'upgradeClass',
					}, 
					dataType: "json",
					success: function(data){           
						if(data.success == "1"){
							alertify.confirm("Upgrade thành công !!. Bạn có muốn chuyển trang sang màn hình của lớp mới <br><br>", function (e) {
								if (e) {
									window.location = 'index.php?module=C_Classes&return_module=C_Classes&action=DetailView&record='+new_class_id;
								}else{
									window.location = 'index.php?module=C_Classes&return_module=C_Classes&action=DetailView&record='+$('input[name=record]').val();
								}
							});
						} else{
							alert('Đã có lỗi xảy ra, vui lòng kiểm tra lại các hồ sơ học viên!');
						} 
					},       
				});

			},
			"Hủy thao tác": function() {
				$(this).dialog("close");   
			},
		}
	});
	ajaxStatus.hideStatus();
}

//Tonggle Check all in subpanel
function toggleCheckAll(source){
	for(var i = 0, n = $('.checkbox_inclass').length; i < n; i++) {
		$('.checkbox_inclass')[i].checked = source.checked;
	}
	if($('#checkall').is(':checked')){
		$("#checkall").parent().append(" <span id='availability_status'> ("+$('.checkbox_inclass').length+" selected)</span>");
	}else{
		$("#availability_status").remove();
	}
}

//Ajax Remove Student from a class
function ajaxRemoveStudent(student_id){
	var delay_date = $('#delay_date').val();
	if(delay_date != ''){
		$("#availability_status").remove();
		$('#'+student_id).parent().append("<span id='availability_status' style = 'padding-top: 5px;'></span>");
		$("#availability_status").html('<img src="custom/include/images/loader.gif" align="absmiddle" width="16">');
		$.ajax({
			url:'index.php?module=C_Classes&action=actAddToClass&sugar_body_only=true',
			type:'POST',
			data:{
				type 		: 'removeFromClass',
				student_id 	: student_id,
				delay_date 	: delay_date,
				class_id	: $('input[name=record]').val(),
			},
			dataType: "json",
			success:function(data){
				if(data.success == "1"){
					showSubPanel('c_classes_contacts_1', null, true);
					alertify.success('Remove successfully !');
				} else {
					alertify.alert('An error occurred. Please, try again!'); 
				}
				$("#availability_status").remove();
			}
		});	
	}else{
		alertify.alert('An error occurred. Please, try again!');
	} 
}

//create by leduytan 2/8/2014
function ajaxSendMailStudent(){
	var student_id = [];
	$("input[class='checkbox_inclass']").each(function(){
		if($(this).is(':checked'))  
			student_id.push($(this).val());
	});
	if(student_id == 0){
		alertify.error(SUGAR.language.get('C_Classes','LBL_SEND_MAIL_ERROR'));
		return;
	}
	else{
		ajaxStatus.showStatus('Sending Message... Please wait, this will take less than a minute...');
		var record = $("input[name='record']").val();
		$.ajax({
			url: "index.php?module=C_Classes&action=sendMailStudent&sugar_body_only=true",
			type: "POST",
			async: true,
			data:  
			{
				student_id: student_id,
				record: record,
			},
			dataType: "json",
			success: function(data){
				if(data.success == "1") 
					alertify.success(SUGAR.language.get('C_Classes','LBL_SEND_MAIL_SUCCESS'));
				else alertify.error("Something was wrong. Please try again!");
				ajaxStatus.hideStatus();
			}         
		});        
	}

}

function ajaxSendSMS(){
	var student_id = [];
	$("input[class='checkbox_inclass']").each(function(){
		if($(this).is(':checked'))  
			student_id.push($(this).val());
	});
	if(student_id == 0){
		alertify.error(SUGAR.language.get('C_Classes','LBL_SEND_MAIL_ERROR'));
		return;
	}
	else{
		ajaxStatus.showStatus('Sending Message... Please wait, this will take less than a minute...');
		var record = $("input[name='record']").val();
		$.ajax({
			url: "index.php?module=C_Classes&action=sendSMSStudent&sugar_body_only=true",
			type: "POST",
			async: true,
			data:  
			{
				student_id: student_id,
				record: record,
			},
			dataType: "json",
			success: function(data){
				if(data.success == "1") 
					alertify.success(SUGAR.language.get('C_Classes','LBL_SEND_MAIL_SUCCESS'));
				else
					alertify.error('Something error occurred. Please try again!');   
				ajaxStatus.hideStatus();
			}         
		});        
	}

}
function ajaxSendSMSStudent() {
	if($("input[name='checkbox_inclass']:checked").length>0)
		openAjaxPopupForMulti("checkbox_inclass","Contacts",""); 
	else 
		alertify.error(SUGAR.language.get('C_Classes','LBL_ERROR_1'));
	return;
}
function toggleCheckAllTeacher(source){
	for(var i = 0, n = $('.checkbox_teacher').length; i < n; i++) {
		$('.checkbox_teacher')[i].checked = source.checked;
	}
	if($('#checkall_teacher').is(':checked')){
		$("#checkall_teacher").parent().append(" <span id='availability_status_teacher'> ("+$('.checkbox_teacher').length+" selected)</span>");
	}else{
		$("#availability_status_teacher").remove();
	}
}
function ajaxSendSMSTeacher() {
	if($("input[name='checkbox_teacher']:checked").length>0)
		openAjaxPopupForMulti("checkbox_teacher","C_Teachers",""); 
	else 
		alertify.error(SUGAR.language.get('C_Classes','LBL_ERROR_1'));
	return;
}

//end by leduytan
