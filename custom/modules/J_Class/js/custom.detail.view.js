var today = new Date();
var input_list = {};
$(document).ready(function(){
    //xu ly dau x de dong bang chon ngay
    $('.container-close').live('click',function(){
        $('.ui-widget-overlay').trigger('click');  
    });
    
    //SEND SMS
    $('#btn_send_sms').live('click',function(){
        var sms_list = $('#J_StudentSituations_checked_str').val();
        if (typeof sms_list !== 'undefined' && sms_list.length >= 36)
            openAjaxPopupForMulti('','J_StudentSituations',sms_list, 'J_Class'); 
        else 
            alert('Please select at least 1 recipient'); return false;
    });

    //////////////////////////////////---------------Already Apollo Junior By Anh NHi --------------------------///////////////    
    sqs_objects = [];
    //seacch input popup
    sqs_objects["move_class_name"] = {
        "form":"moveClass",
        "method":"query",
        "modules":['J_Class'],
        "group":"or",
        "field_list":["name", "id"],
        "populate_list":["move_class_name", "move_class_id"],
        "required_list":"move_class_id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"move_class_name",
        "limit":"30",
        "no_match_text":"No Match"
    };
    enableQS(true);

    //////////////////////////////////---------------End Already Apollo Junior By Anh Nhi --------------------------/////////////// 

    //Add by Tung Bui
    $("#submit_in_progress").on('click',function(){
        alertify.confirm("Are you sure you want to Submit In Progress this class?", function (e) {
            if (e) {
                //Submit class in progress
                ajaxStatus.showStatus('Processing...');
                $.ajax({
                    url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
                    type: "POST",
                    async: true,
                    data:  
                    {
                        type            : 'ajaxSubmitInProgress',
                        class_id        : $("input[name='record']").val(),
                    },
                    dataType: "json",
                    success: function(res){
                        location.reload();
                    },        
                });       
            }
        });
    });

    $('#btn_close_class').live('click',function(){
        if($('#cc_closed_date').val() == ''){
            alertify.error('Please fill out fields completely !');
            return ;
        }
        //Submit class in progress
        ajaxStatus.showStatus('Processing...');
        $('#close_class_loading').show();
        $('#btn_close_class').hide();
        $.ajax({
            url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
            type: "POST",
            async: true,
            data:  
            {
                type            : 'ajaxSubmitClose',
                class_id        : $("input[name='record']").val(),
                closed_date     : $("#cc_closed_date").val(),
            },
            dataType: "json",
            success: function(res){
                if(res.success == '1'){
                    location.reload();    
                }else{
                    alertify.alert('An error occurred. <br><br>Students are still in this class, Please, check again!');
                    ajaxStatus.hideStatus();
                    $('#close_class_loading').hide();
                    $('#btn_close_class').show();
                    $('#diaglog_close_class').dialog("close");
                }

            },        
        });     
    });
    $('#cc_closed_date').on('change',function(){
        //Validate Data Lock
        if(!checkDataLockDate($(this).attr('id'),true))
            return ;

    });

    $("#btn_submit_close").on('click',function(){

        $('#diaglog_close_class').dialog({
            resizable: false,
            width: 500,
            height:'auto',
            modal: true,
            visible: true,
            position: ['center'],
            beforeClose: function(event, ui) {
                $("body").css({ overflow: 'inherit' });
            },

        });

    });
    $("#send_SMS").on('click',function(){
        window.open("index.php?module=J_Class&action=sendSMS&class_id="+$('input[name="record"]').val(),'_blank');
    });
    // END - add by Tung Bui      
    //add by Trung Nguyen
    $('.studentsituations_description').live('change',function(){
        var _this = $(this);
        $.ajax({
            url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
            type: "POST",
            async: true,
            data: {
                type : 'saveStudentSituationDescription',
                studentsituation_id : _this.attr('ss_id'),
                description: _this.val(),
            },               
            success: function(res){

            },        
        });

    });
});

//////////////////////////////////---------------Function Apollo Junior By Anh Lap --------------------------///////////////

function handleSendSMS(){
    if($("input[name='j_class_studentsituations']:checked").length>0)
        openAjaxPopupForMulti("j_class_studentsituations","J_StudentSituations",""); 
    else 
        alertify.error(SUGAR.language.get('C_Classes','LBL_ERROR_1'));
    return;
}

function schedule_ta(schedule){
    //Show dialog
    $('#dialog_ta').attr('title','Shedule TA');
    $('#dialog_ta').dialog({
        resizable: false,
        width:'800',
        height:'500',
        modal: true,
        visible: false,
        position: ['center',50],
        beforeclose: function (event, ui) {
            $('#dialog_ta').dialog("destroy");
        }
    });
} 
//==========================Filter Date Situation Student==========================//
function handle_filter(){  //modify by Trung Nguyen 2015.12.18
//    var class_start   = SUGAR.util.DateUtils.parse($('#start_date').text(),cal_date_format).getTime();
//    var class_end     = SUGAR.util.DateUtils.parse($('#end_date').text(),cal_date_format).getTime();
//    var date =  $('#filter_date').val();
//    var fiter_date = 0;
//    var load_subpanel = true;
//    if(date != ""){
//        try{    
//            fiter_date = SUGAR.util.DateUtils.parse($('#filter_date').val(),cal_date_format).getTime();
//        } catch (e) {             
//            load_subpanel = false;
//        }
//    } 
//    if(!load_subpanel) {
//        var today = new Date();
//        $('#filter_date').val(today.toString(cal_date_format.replace('%d', 'dd').replace('%m', 'MM').replace('%Y', 'yyyy'))); 
//        alertify.error(SUGAR.language.get('J_Class','LBL_ERROR_DELAY_2'));
//    }else if(fiter_date > 0 && (fiter_date < class_start || fiter_date >  class_end)){
//        var today = new Date();
//        $('#filter_date').val(today.toString(cal_date_format.replace('%d', 'dd').replace('%m', 'MM').replace('%Y', 'yyyy'))); 
//        alertify.error(SUGAR.language.get('J_Class','LBL_ERROR_DELAY'));
//    }else{
//        // var date = $('#filter_date').val();
//        var url = "index.php?sugar_body_only=1&module=J_Class&subpanel=j_class_studentsituations&action=SubPanelViewer&inline=1&record="+$('input[name=record]').val()+"&layout_def_key=&inline=1&date="+date+"&ajaxSubpanel=true";
//        var returnstuff = http_fetch_sync(url);
//        got_data_cutom(returnstuff.responseText,true);
//        $('#filter_date').val(date);
//    }
showSubPanel('j_class_studentsituations', null, true);

}

//lay sql tra ve
function got_data_cutom(args, inline) {
    var list_subpanel = document.getElementById('list_subpanel_j_class_studentsituations');
    if (list_subpanel != null) {
        var subpanel = document.getElementById('subpanel_j_class_studentsituations');
        var child_field = 'j_class_studentsituations';
        if (inline) {
            child_field_loaded[child_field] = 2;
            list_subpanel.innerHTML = '';
            list_subpanel.innerHTML = args;
        } 
        SUGAR.util.evalScript(args);
        subpanel.style.display = '';
        set_div_cookie(subpanel.cookie_name, '');
        if (current_child_field != '' && child_field != current_child_field) {}
        current_child_field = child_field;
        $("ul.clickMenu").each(function(index, node) {
            $(node).sugarActionMenu();
        });
    }
}
//==========================End Filter Date Situation Student==========================//               

//Show dialog Export Attendance List 
function showDialogExportAttendance(){
    //re-select lesson
    $("#export_from_lesson option:first").prop("selected",true)
    $("#export_to_lesson option:last").prop("selected",true)

    //show dialog
    $("body").css({ overflow: 'hidden' });
    $('#diaglog_export_attendance').dialog({
        resizable    : false,
        width        : 900,
        height        :'auto',
        modal        : true,
        visible        : true,
        position    : ['center',130],
        beforeClose: function(event, ui) {
            $("body").css({ overflow: 'inherit' });
        },
        buttons: {
            "Export":{
                click:function() {
                    ajaxExportAttendance();
                },
                class    : 'button primary',
                text    : 'Export',
            },
            "Cancel":{
                click:function() {
                    $(this).dialog('close');
                },
                class    : 'button',
                text    : 'Cancel',
            },  
        },
    });
}

function ajaxExportAttendance(){
    //Check export to >= export from
    var export_from_lesson = Numeric.parse($('#export_from_lesson').val());
    var export_to_lesson = Numeric.parse($('#export_to_lesson').val());
    if (export_to_lesson < export_from_lesson){
        alertify.error(SUGAR.language.get('J_Class','LBL_LESSON_RANGE_NOT_VALID'));  
    }
    else{
        var class_id = $("input[name='record']").val();
        window.open("index.php?module=J_Class&action=exportAttendanceList&record="+class_id+"&from="+export_from_lesson+"&to="+export_to_lesson,'_blank');    
    }
}
Calendar.setup ({
    inputField : "cc_closed_date",
    daFormat : cal_date_format,
    button : "cc_closed_date_trigger",
    singleClick : true,
    dateStr : "",
    step : 1,
    weekNumbers:false
});

function isInSchedule(checking_date){
    var rs = new Object();
    var json_sessions     = $("#json_sessions").val();
    if( checking_date != '' && json_sessions != ''){
        var checking_date = SUGAR.util.DateUtils.parse(checking_date,cal_date_format);  

        obj = JSON.parse(json_sessions);
        flag = SUGAR.util.DateUtils.formatDate(checking_date,false,"Y-m-d") in obj;
        if(!flag)
            alertify.error('Date not in class schedule !');
    }
    return flag;
}