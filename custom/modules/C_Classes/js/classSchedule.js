function set_return(popup_reply_data) {
    from_popup_return = true;
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    if (typeof name_to_value_array != 'undefined' && name_to_value_array['account_id']) {
        var label_str = '';
        var label_data_str = '';
        var current_label_data_str = '';
        var popupConfirm = popup_reply_data.popupConfirm;
        for (var the_key in name_to_value_array) {
            if (the_key == 'toJSON') {} else {
                var displayValue = replaceHTMLChars(name_to_value_array[the_key]);
                if (window.document.forms[form_name] && document.getElementById(the_key + '_label') && !the_key.match(/account/)) {
                    var data_label = document.getElementById(the_key + '_label').innerHTML.replace(/\n/gi, '').replace(/<\/?[^>]+(>|$)/g, "");
                    label_str += data_label + ' \n';
                    label_data_str += data_label + ' ' + displayValue + '\n';
                    if (window.document.forms[form_name].elements[the_key]) {
                        current_label_data_str += data_label + ' ' + window.document.forms[form_name].elements[the_key].value + '\n';
                    }
                }
            }
        }
        if (label_data_str != label_str && current_label_data_str != label_str) {
            if (typeof popupConfirm != 'undefined') {
                if (popupConfirm > -1) {
                    set_return_basic(popup_reply_data, /\S/);
                } else {
                    set_return_basic(popup_reply_data, /account/);
                }
            } else if (confirm(SUGAR.language.get('app_strings', 'NTC_OVERWRITE_ADDRESS_PHONE_CONFIRM') + '\n\n' + label_data_str)) {
                set_return_basic(popup_reply_data, /\S/);
            } else {
                set_return_basic(popup_reply_data, /account/);
            }
        } else if (label_data_str != label_str && current_label_data_str == label_str) {
            set_return_basic(popup_reply_data, /\S/);
        } else if (label_data_str == label_str) {
            set_return_basic(popup_reply_data, /account/);
        }
    } else {
        set_return_basic(popup_reply_data, /\S/);
    }
    showDialog('yes'); 
}
//create by leduytan 22/7/2014
//use ajax to check teacher
function getDateString(){
    var re = new RegExp('%', 'g');
    $('span#date_string').text('['+cal_date_format.replace(re,'')+']')
}
function ajaxClassSchedule(){
    //Prepare
    $("#ct_check").parent().append("<span id='loadding'></span>");   
    $("#loadding").html('<img src="custom/include/images/loader.gif" align="absmiddle" width="16">');
    var class_id = $("#class_id").val();
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    var ready_for = $('input[name=check_ready_for]:checked').val();
    var weekday = [];
    $("input[name='week_date']").each(function(){
        if($(this).is(':checked'))  
            weekday.push($(this).val());
    });
    //Ajax 
    $.ajax({
        url: "index.php?module=C_Classes&action=ajaxClassSchedule&sugar_body_only=true",
        type: "POST",
        async: true,
        data:  
        {
            class_id: class_id,
            start_date: start_date,
            end_date: end_date,
            ready_for: ready_for,
            weekday: weekday,
        },
        dataType: "json",
        success: function(data){           
            if(data.success == "1"){
                $('div#result_table').html(data.html);
                diableAndClear('top',true);              
            }
            $("#loadding").remove();  
        },        
    });

}

function validateElements(){
    if(validate['ClassScheduleForm']!='undefined'){delete validate['ClassScheduleForm']};
    //Validate Start date - End date - Class
    addToValidate('ClassScheduleForm', 'class_name', 'text', true, SUGAR.language.get('C_Classes','LBL_CLASS') );
    addToValidateBinaryDependency('ClassScheduleForm', 'class_name', 'alpha', true, SUGAR.language.get('app_strings', 'ERR_SQS_NO_MATCH_FIELD') + SUGAR.language.get('C_Classes','LBL_CLASS') , 'class_id' );
    addToValidate('ClassScheduleForm', 'end_date', 'date', true, SUGAR.language.get('C_Classes','LBL_CHECK_TO_DATE') );
    addToValidateDateBefore('ClassScheduleForm','start_date','date',true,SUGAR.language.get('C_Classes','LBL_CHECK_FROM_DATE'),'end_date');
    //Check Start Date to End Date
    if($('#start').val() != '' && $('#start_date').val() != '' && $('#end').val() != '' && $('#end_date').val() != ''){
        $start 	= SUGAR.util.DateUtils.parse($('#start').val(),cal_date_format).getTime();
        $end 	= SUGAR.util.DateUtils.parse($('#end').val(),cal_date_format).getTime();
        $from 	= SUGAR.util.DateUtils.parse($('#start_date').val(),cal_date_format).getTime();
        $to 	= SUGAR.util.DateUtils.parse($('#end_date').val(),cal_date_format).getTime();    
        if($from > $end || $from < $start || $to > $end || $to < $start){
            $('#start_date, #end_date').addClass("error");
            alertify.error(SUGAR.language.get('C_Classes','LBL_CHECK_DATE_ERROR'));
            return false;   
        }else{
            $('#start_date, #end_date').removeClass("error");  
        }
    }

    //Validate Week Day
    var weekday = [];
    $("input[name='week_date']").each(function(){
        if($(this).is(':checked'))  
            weekday.push($(this).val());
    });
    if(weekday.length == 0){
        addToValidate('ClassScheduleForm', 'validate_weekday', 'varchar', true, SUGAR.language.get('C_Classes','LBL_DAY') ); 
    }

    return check_form('ClassScheduleForm');
}

function diableAndClear($order,$bool){
    if($order == 'top'){
        $('#class_name, #btn_select_class, #ct_check, input[name=week_date], #start_date, #end_date, input[name=check_ready_for]').prop('disabled',$bool);
        if($bool == false){
            $('div#result_table').html('');
            $('#start_date_trigger, #end_date_trigger').show();
//            $('#class_name, #class_id, #start_date, #end_date, #start, #end').val('');
            $('input[name=week_date]').prop('checked',false);
            $('.ui-dialog-content').dialog('close');
        }else $('#start_date_trigger, #end_date_trigger').hide();
    }else{
        $('.start_time, .end_time, .delivery_hours, .teaching_hours, input[name=btn_find]').prop('disabled',$bool);
        $("select[name=select_teacher], select[name=select_room]").select2("readonly", $bool);
        if($bool == false){
            $('.start_time, .end_time, .delivery_hours, .teaching_hours').val('');
            $("select[name=select_teacher]").select2('data', null); 
            $("select[name=select_room]").select2('data', null);

        }
    }  
}
function showDialog($show){
    var json = $('input#content_class').val();

    var html = "<b><label>Class Name :   <a target='_blank' style='text-decoration: none;' href='index.php?module=C_Classes&action=DetailView&record="+$('#class_id').val()+"'>"+$('#class_name').val()+'</a></label></b><br><br>';
    html += "<b>Start :  </b>"+$('#start').val()+'<br><br>';
    html += "<b>End :  </b>"+$('#end').val()+'<br><br>';
    html += "<b>Class Type :  </b>"+$('#class_type').val()+'<br><br>';

    if(json != ''){
        obj = JSON.parse(json);
        html += "<b>Last Created :  </b>"+obj.last_created+'<br><br>';
        html += "<b>From Date :  </b>"+obj.start_date+'<br><br>';
        html += "<b>To Date :  </b>"+obj.end_date+'<br><br>';
        html += "<b>WeekDay :  </b>"+obj.week_day_str+'<br><br>';

        $.each(obj.week_day, function( index, value ) {
            html += "<b>&nbsp&nbsp&nbsp&nbsp"+value+" :  </b> "+obj.start_time[index]+" to "+obj.end_time[index]+"<em style='color:red; font-style:normal;'> ("+Object.keys(obj[value]).length+" sessions) </em><br>";
            html += "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTeacher :  "+obj.teachers[index]+"<br>";
            html += "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRoom :  "+obj.rooms[index]+"<br><br>";
        });
    }else{
        html += "<em font-style:normal;'> -- No Timetable -- </em>";  
    }

    $('#dialog_help').html(html);
    $('#dialog_help').attr('title','Class Info')
    if($show == 'yes'){
        $('#dialog_help').dialog({
            resizable: false,
            width:'auto',
            height:'auto',
            modal: false,
            visible: true,
            position: ['right',50],
        });  
    }
    $(".ui-dialog").effect("highlight", {color: '#ff9933'}, 1000);  
}
$(document).ready(function(){
    $('#ct_check').click(function(){
        if(validateElements())
            ajaxClassSchedule();
    })
    // button select click event
    $('#btn_select_class').click(function(){
        open_popup("C_Classes", 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"ClassScheduleForm","field_to_name_array":{"id":"class_id","name":"class_name","content":"content_class","start_date":"start","end_date":"end","type":"class_type"}});  
    });

    //click event
    $('#help_box').click(function() {
        $('#popup_name').attr('style','display: block;');
        $('#fade').attr('style', 'display: block;');

    });

    // check ready for option chose
    getDateString();
    $('input[name=check_ready_for]').click(function(){
        if($(this).val() != 'optional'){
            var numOfDate = parseInt($(this).val());

            var today = new Date();//today
            YAHOO.widget.DateMath._addDays(today,7);
            var from = YAHOO.widget.DateMath.getFirstDayOfWeek(today,1);
            $("#start_date, #end_date").effect("highlight", {color: '#4BADF5'}, 1000);

            $('#start_date').val(SUGAR.util.DateUtils.formatDate(from));

            YAHOO.widget.DateMath._addDays(from,numOfDate);
            $('#end_date').val(SUGAR.util.DateUtils.formatDate(from));

        }
    });
    $('#start_date_trigger, #end_date_trigger').click(function(){
        $('input[name=check_ready_for]').filter('[value=optional]').prop('checked', true);
    });

    //button Eye Detail
    $( "#eye_dialog" ).click(function() {
        showDialog('yes');
    });

    if($('#class_id').val()!='')
        showDialog('yes');
});