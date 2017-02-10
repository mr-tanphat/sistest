var record_id       = $('input[name=record]').val();
var duplicate_id    = $('input[name=duplicateId]').val();
var aims_id         = $('input[name=aims_id]').val();
if (typeof duplicate_id == 'undefined')
    duplicate_id = '';
var ug_koc = '';
var ug_level = '';
var ug_module = '';
$(document).ready(function(){
    //Fix bug Upgrade Class - Do not input this field
    $('#j_class_j_class_1_name').prop('readonly',true).attr('title','Please, select !!');
    // Set TimePicker
    setTimePicker();
    // case Duplicate
    if(duplicate_id != "" ){
        ug_koc = $('#kind_of_course').val();
        ug_level = $('#level').val();
        ug_module = $('#modules').val();
        generateSchedule($('input#content').val(), $('#j_class_j_class_1j_class_ida').val());
    }

    toggleTimeslots();
    $('input[name=week_date]').change(function(){
        toggleTimeslots();
        ajaxMakeJsonSession();
    });
    $('#start_date, #modules, #level, #kind_of_course').live('change',function(){
        ajaxMakeJsonSession();
    });

    //Handle Button Clear Schedule
    $('#btn_clr_time').click(function(){
        clrSelection();
    });
    //Handle Create / Edit
    generateOption();
    if(record_id == ''){
        addToValidate('EditView', 'validate_weekday', 'varchar', true, 'Weekdays' );
        getClassHours();
        $("#change_date_from").closest("tr").hide();
        $("#btn_edit_schedule").closest("tr").hide();
    }
    else{
        //Validate Data Lock
        $('#change_date_from').live('change',function(){
            if(!checkDataLockDate('change_date_from', false))
                return ;
        });
        $('#validate_weekday, #timeframe_panel').closest('tr').hide();
        $('#btn_edit_schedule, #btn_edit_startdate').show();
        //    if(aims_id == '' || is_admin == '1'){  //AIMS CODE
        $('#start_date_trigger').hide();
        $('#hours, #start_date').prop('readonly',true).addClass('input_readonly');
        $('#kind_of_course, #level, #modules').prop('disabled',true).addClass('input_readonly');
        //Lock Team
        $('#EditView_team_name_table').find('input').prop('readonly',true).addClass('input_readonly');
        //    }
    }
    //Lock Team
    $('#teamSelect, #teamAdd, #remove_team_name_collection_0').prop('disabled',true);
    $("#change_reason_label").closest("tr").hide();


    $('#kind_of_course, #level').on('change',function(){
        $('#koc_id').val($('#kind_of_course option:selected').attr('koc_id'));
        generateOption();
    });

    $('#class_type_adult').on('change',function(){
        if($(this).val() != 'Practice')
            $('#level').prop("multiple", true).attr('name','level[]');
        else $('#level').prop("multiple", false).attr('name','level');

        generateOption();
    });

    $('#modules').on('change',function(){
        getClassHours();
    });
    $('.revenue_hour').on('change',function(){
        ajaxMakeJsonSession();
    });
    $('#hours').on('blur',function(){
        ajaxMakeJsonSession();
    });

    //Handle change startdate
    $('#btn_edit_startdate').on('click',function(){
        $(this).hide();
        $('#btn_edit_schedule').hide();
        $('#start_date').prop('readonly',false).removeClass('input_readonly');
        $('#start_date_trigger').show();

        $('#change_reason_label').closest('tr').show();
        $('#validate_weekday, #timeframe_panel').closest('tr').show();
        $('#class_case').val('change_startdate');
        if(is_admin != '1' && current_user_name != 'crm.bot5')
            addToValidate('EditView', 'change_reason', 'text', true,'Change Reason' );
        addToValidate('EditView', 'validate_weekday', 'varchar', true, 'Weekdays' );
    });
    //Handle edit schedule
    $('#btn_edit_schedule').on('click',function(){
        $(this).hide();
        $('#btn_edit_startdate').hide();
        $('#change_date_from_label, #change_date_to_label, #change_date_from_span, #change_date_to_span').show();
        $('#change_reason_label').closest('tr').show();
        $('#validate_weekday, #timeframe_panel').closest('tr').show();
        $('#class_case').val('change_schedule');
        $('#change_date_to').val($('#end_date').val());
        addToValidate('EditView', 'change_date_from', 'date', true,'Change From Date' );
        addToValidate('EditView', 'change_date_to', 'date', true,'Change To Date' );
        if(is_admin != '1' && current_user_name != 'crm.bot5')
            addToValidate('EditView', 'change_reason', 'text', true,'Change Reason' );
        addToValidate('EditView', 'validate_weekday', 'varchar', true, 'Weekdays' );
    });
    $('#change_date_from_trigger_div_t tbody, #container_change_date_from_trigger #callnav_today').live('click',function(){
        validateChangeFrom();
    });

    $('#change_date_to_trigger_div_t tbody, #container_change_date_to_trigger #callnav_today').live('click',function(){
        validateChangeTo();
    });


    $('#change_date_from').on('change',validateChangeFrom);
    $('#change_date_to').on('change',validateChangeTo);



    $('#btn_clr_j_class_j_class_1_name').on('click',function(){
        $('#upgrade_class_info').remove();
    });

    //Remove SQS
    sqs_objects['EditView_j_class_j_class_1_name'] = {};

    //Check duplicate Kind Of Course
    $('#kind_of_course, #level, #modules').on('change',function(){
        checkDuplicate();
    });
    var crm_bot = [ 'crm.bot1','crm.bot2','crm.bot3','crm.bot4','crm.bot5'];
    if(aims_id != '' && $('#main_schedule').val() != '' && is_admin != '1' && jQuery.inArray( current_user_name, crm_bot ) > -1){
        $('#hours').prop('readonly',false).removeClass('input_readonly');
        $('#btn_edit_schedule').trigger('click');
        removeFromValidate('EditView','change_reason');
    }  //AIMS CODE
    //Validate Data Lock
    if(!checkDataLockDate('start_date', false, false))
        $('#btn_edit_startdate').hide();
});


// Show/Hide Timeslot, Mapping weekday and Timeslot and Clear Input
function toggleTimeslots(){
    var count_selected = 0;
    $('input[name=week_date]').each(function () {
        var week_row = "#TS_"+$(this).val();
        if($(this).is(":checked")){
            $(week_row).show();
            count_selected++
        }else{
            $(week_row).hide();
            $(week_row+' :input').val('');
        }
    });
    //Catch validate Weekday
    if(count_selected == 0 )
        $('#validate_weekday').val('');
    else
        $('#validate_weekday').val('1');
}

function getClassHours(){
    if(record_id != ''){
        return false;
    }

    if(aims_id == ''){
        var kind_of_course = $('#kind_of_course').val();
        var level_selected = $('#level').val();
        var module_selected = $('#modules').val();
        var objs =  $.parseJSON($('#kind_of_course :selected').attr('json'));

        if (kind_of_course == "" || level_selected == ""){
            $('#hours').val("");
            return false;
        }
        if (kind_of_course == "Premium"){
            return false;
        }

        $.each( objs, function( key, koc ) {
            if(koc.levels == level_selected){
                if (koc.modules == "") {
                    $('#hours').val(koc.hours);
                }
                else{
                    if (module_selected == "") $('#hours').val("");
                    else $('#hours').val(koc.hours);
                }
                return false;
            }
        });
    }
}

//showing Kind Of Course
function generateOption(){
    var kind_of_course = $('#kind_of_course').val();
    var level_selected = $('#level').val();
    var module_selected = $('#modules').val();
    var objs =  $.parseJSON($('#kind_of_course :selected').attr('json'));

    //Adult variable
    var team_type              = $('#team_type').val();
    var class_type_adult       = $('#class_type_adult').val();
    var arr_type               = [ "Skill", "Connect Club", "Connect Event"];
    //Generate options level
    if(kind_of_course != '' && kind_of_course != null && aims_id == ''){

        if(kind_of_course == 'Premium' || (team_type == 'Adult' && $.inArray(class_type_adult, arr_type) >= 0 )){
            $('#hours').prop('readonly',false).removeClass('input_readonly');
            $('#level').prop('disabled',false).removeClass('input_readonly');
            $('#modules').prop('disabled',false).removeClass('input_readonly');
        }
        else if((kind_of_course == 'Outing Trip' || kind_of_course == 'Cambridge' )){
            if(kind_of_course == 'Outing Trip'){
                alert(' Example: \n     Outing trip 1 day: 8 hours');
            }
            $('#level').prop('disabled',true).addClass('input_readonly');
            $('#modules').prop('disabled',true).addClass('input_readonly');
            $('#hours').prop('readonly',false).removeClass('input_readonly');
        }
        else {
            $('#hours').prop('readonly',true).addClass('input_readonly');
            $('#level').prop('disabled',false).removeClass('input_readonly');
            $('#modules').prop('disabled',false).removeClass('input_readonly');
        }
        // Clear all select list items except first one
        $('#level').find('option:gt(0)').remove();
        $.each( objs, function( key, obj ) {
            $('#level').append('<option label="'+obj.levels+'" value="'+obj.levels+'">'+obj.levels+'</option>');
        });
        $('#level').val(level_selected);

        //Generate options module
        if(level_selected != '' && level_selected != null){
            $('#modules').find('option:gt(0)').remove();
            $.each( objs, function( key, koc ) {
                if(koc.levels == level_selected){
                    $.each( koc.modules, function( key, module ) {
                        if(module != "")
                            $('#modules').append('<option label="'+module+'" value="'+module+'">'+module+'</option>');
                    });
                    //If level do not have module
                    if ($('#modules option').size() == 1){
                        $('#modules').prop('disabled',true).addClass('input_readonly');
                    }
                    else {
                        $('#modules').prop('disabled',false).removeClass('input_readonly');
                    }
                }
            });
            $('#modules').val(module_selected);
        }
    }
    getClassHours();
}

//Ajax Cal Ending Date
function ajaxMakeJsonSession(){
    var schedule  = {};
    var start_date= $('#start_date').val();
    var flag_ajax = true;
    var class_case  = $('#class_case').val();
    var change_date_from = $('#change_date_from').val();
    var change_date_to  = $('#change_date_to').val();
    var team_type       = $('#team_type').val();
    $('#end_date').val('');
    //Check valid week date
    var day = '';
    var day_time = '';
    var first_day = true;
    $('input[name=week_date]').each(function(){
        if($(this).is(':checked')){
            var rvn_hour = $("#TS_"+$(this).val()).find(".revenue_hour").val();
            var tea_hour = $("#TS_"+$(this).val()).find(".teaching_hour").val();
            var duration_hour = $("#TS_"+$(this).val()).find(".duration_hour").val();
            var start_time  = $("#TS_"+$(this).val()).find(".start").val();
            var end_time    = $("#TS_"+$(this).val()).find(".end").val();

            if(start_time == '' || end_time == ''){
                flag_ajax = false;
                return false;
            }else{
                schedule[$(this).val()]                     = {};
                schedule[$(this).val()]['start_time']       = start_time;
                schedule[$(this).val()]['end_time']         = end_time;
                schedule[$(this).val()]['duration_hour']    = duration_hour;
                schedule[$(this).val()]['revenue_hour']     = rvn_hour;
                schedule[$(this).val()]['teaching_hour']    = tea_hour;
            }
            if (first_day){
                day = day + $(this).val();
                day_time = day_time + $(this).val() + '('+start_time+'-'+ end_time+')';
                first_day = false;

            } else {
                day = day + '/' + $(this).val();
                day_time = day_time + '/' + $(this).val() + '('+start_time+'-'+ end_time+')';
            }
        }
    });
    if(record_id == "" || $('#class_case').val() == 'change_startdate'){
        $('#study_date').val(day);
        $('#study_time_date').val(day_time);
        $('#main_schedule').val(JSON.stringify(schedule));
    }
    if($('#class_case').val() == 'change_schedule' && $('#change_date_from').val() == '') {
        flag_ajax = false;
    }
    if($('#class_case').val() == 'change_schedule') {
        $('#history_temp').val(JSON.stringify(schedule));
    }

    //check start date
    $('#notification_weekdate').remove();
    if($('input[name=week_date]:checked').length != 0)
        checkStartDate();

    //checking run validate ajax
    if(!flag_ajax || $('input[name=week_date]:checked').length == 0 || $('#hours').val() == '')
        return false;

    //get hour test of Kind of Course
    var level_selected = $('#level').val();
    var objs =  $.parseJSON($('#kind_of_course :selected').attr('json'));
    $('#accept_schedule_change').val('0') //Update change lich
    if(start_date != '' && schedule != ''){
        ajaxStatus.showStatus('Processing...');
        $.ajax({
            url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
            type: "POST",
            async: true,
            data:
            {
                type            : 'ajaxMakeJsonSession',
                class_id        : record_id,
                class_case      : class_case,
                change_date_from: change_date_from,
                change_date_to  : change_date_to,
                start_date      : start_date,
                schedule        : schedule,
                team_type       : team_type,
                total_hours     : $('input#hours').val(),
                change_reason   : $('#change_reason').val(),
            },
            dataType: "json",
            success: function(res){
                ajaxStatus.hideStatus();
                if(res.success == "1"){
                    $('input#content').val(res.content);
                    var json =  jQuery.parseJSON(res.content);
                    var end_date = new Date(json.end_date);

                    var end_date_format = SUGAR.util.DateUtils.formatDate(end_date);
                    $('#end_date').val(end_date_format);
                    $('#end_date').effect("highlight", {color: '#ff9933'}, 2000);

                    if(typeof res.contentHistory != 'undefined')
                        $('input#history').val(res.contentHistory);

                    if(json.new_start_Date != "" && typeof json.new_start_Date != 'undefined' && typeof json.holidays != 'undefined'){
                        var holiday_alert = "The Holidays in this duration:\n";
                        $.each(json.holidays, function( index, value ) {
                            holiday_alert += "- "+index+": "+value+"\n";
                        });
                        holiday_alert += "\nStart date will change to: " + json.new_start_Date;
                        alertify.alert(holiday_alert);
                        $("#start_date").val(json.new_start_Date);
                    }
                    //                    else if(typeof json.holidays != 'undefined') {
                    //                        if(json.count_holidays) {
                    //                            var holiday_alert = "The Holidays in this duration:\n";
                    //                            $.each(json.holidays, function( index, value ) {
                    //                                holiday_alert += "- "+index+": "+value+"\n";
                    //                            });
                    //                            alert(holiday_alert);
                    //                        }
                    //                    }
                    if(json.html_situation != '' && typeof json.html_situation != 'undefined'){
                        $('#sn_table_error').html(json.html_situation);

                        $('#count_unpaid').val(json.count_unpaid);
                        show_dialog_change_schedule();

                    }else
                        $('#sn_table_error').html('');

                }
                else
                    $('#end_date').val('');
            },
        });
    }else{
        $('#end_date').val('');
        return ;
    }
}
function show_dialog_change_schedule(){
    var count_unpaid = $('#count_unpaid').val();
    $('#situa_notify_dialog').dialog({
        resizable    : false,
        width        :"800px",
        height       :'auto',
        modal        : true,
        visible      : true,
        position     : ['middle',30],
        closeOnEscape: false,
        open: function(event, ui) {
            $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
        },
        buttons: {
            "OK":{
                class    : 'button btn_accept_change',
                text    : '1. Tôi đã hiểu rủi ro này và không còn cách nào khác',
                click:function() {
                    $('#accept_schedule_change').val('1');
                    $(this).dialog('close');
                },
            },
            "Cancel":{
                class    : 'button primary btn_unaccept_change',
                text    : '2. Để tôi xem xét lại',
                click:function() {
                    $(this).dialog('close');
                },
            },
        },
    });
    if(count_unpaid > 0)
        $('.btn_accept_change').hide();
    else $('.btn_accept_change').show();
}
//Validate Change To
function validateChangeTo(){
    $from   = SUGAR.util.DateUtils.parse($('#change_date_from').val(),cal_date_format).getTime();
    $to     = SUGAR.util.DateUtils.parse($('#root_end_date').val(),cal_date_format).getTime();
    //get date change
    $date_change = SUGAR.util.DateUtils.parse($('#change_date_to').val(),cal_date_format);
    if($date_change==false){
        alertify.error('Invalid date range. Please, choose another date!!');
        $('#change_date_to').val('');
    }else{
        $change = $date_change.getTime();
        if($change < $from || $change > $to){
            alertify.error('Invalid date range. Please, choose another date!!');
            $('#change_date_to').val('');
        }else
            ajaxMakeJsonSession();
    }
}

//Validate Change From
function validateChangeFrom(){
    $from   = SUGAR.util.DateUtils.parse($('#root_start_date').val(),cal_date_format).getTime();
    $to     = SUGAR.util.DateUtils.parse($('#root_end_date').val(),cal_date_format).getTime();
    //get date change
    $date_change = SUGAR.util.DateUtils.parse($('#change_date_from').val(),cal_date_format);
    if($date_change==false){
        alertify.error('Invalid date range. Please, choose another date!!');
        $('#change_date_from').val('');
    }else{
        $change = $date_change.getTime();
        if($change < $from || $change > $to){
            alertify.error('Invalid date range. Please, choose another date!!');
            $('#change_date_from').val('');
        }else
            ajaxMakeJsonSession();
    }
}

//Overwrite function set_return: Handle upgrade class
function set_class_return(popup_reply_data){
    $('#upgrade_class_info').remove();
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    if(name_to_value_array.isupgrade != 0){
        alertify.alert('<b>'+name_to_value_array.j_class_j_class_1_name+"</b> is upgraded. You can not choose this class upgrade again !!");
        return false;
    }
    if(name_to_value_array.class_type == 'Waiting Class'){
        alertify.alert('<b>'+name_to_value_array.j_class_j_class_1_name+"</b> is Waiting Class. You can not choose this class upgrade !!");
        return false;
    }
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'j_class_j_class_1j_class_ida':
                    $('#j_class_j_class_1j_class_ida').val(val);
                    var upgrade_id = val;
                    break;
                case 'j_class_j_class_1_name':
                    $('#j_class_j_class_1_name').val(val);
                    var upgrade_name = val;
                    break;
                case 'c_teachers_j_class_1c_teachers_ida':
                    if(record_id == '')
                        $('#c_teachers_j_class_1c_teachers_ida').val(val);
                    break;
                case 'c_teachers_j_class_1_name':
                    if(record_id == ''){
                        $('#c_teachers_j_class_1_name').val(val);
                        $('#c_teachers_j_class_1_name').effect("highlight", {color: '#ff9933'}, 3000);
                    }
                    break;
                case 'kind_of_course':
                    if(record_id == ''){
                        $('#kind_of_course').val(val);
                        $('#kind_of_course').effect("highlight", {color: '#ff9933'}, 3000);
                        ug_koc = val;
                    }
                    break;
                case 'level':
                    if(record_id == ''){
                        $('#level').val(val);
                        $('#level').effect("highlight", {color: '#ff9933'}, 3000);
                        ug_level = val;
                    }
                    break;
                case 'modules':
                    if(record_id == ''){
                        $('#modules').val(val);
                        $('#modules').effect("highlight", {color: '#ff9933'}, 3000);
                        ug_module = val;
                    }
                    break;
                case 'content':
                    if(record_id == '')
                        var content = val;
                    break;
            }
        }
    }
    //Append btn More Info
    generateSchedule(content, upgrade_id);

}

// check the Start date of course
function checkStartDate() {
    var class_case = $('#class_case').val();
    var start_date = $('#start_date').val();
    $('#notification_weekdate').remove();
    if($('input[name=week_date]:checked').length == 0) return true;
    if( class_case=='change_startdate' || class_case=='create'){
        var daysOfWeek = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        var weekdate_checking =  daysOfWeek[SUGAR.util.DateUtils.parse(start_date,cal_date_format).getDay()];

        var count = 0;
        $('input[name=week_date]:checked').each(function () {
            if($(this).val() == weekdate_checking)
                count ++;
        });
        if(count == 0){
            $('input[name=week_date]').closest('td').append("<div id='notification_weekdate' class='required validation-message'>"+SUGAR.language.get('J_Class','LBL_CHECK_DATE_ERROR')+"</div>");
            return false;
        }
        else return true;
    }
    else
        return true;
}

// check Duplicate class name
function checkDuplicate(){
    if(ug_koc != '' &&  ug_level != '' && ug_module != ''){
        if(ug_koc == $('#kind_of_course').val() && ug_module == $('#modules').val() && ug_level == $('#level').val()){
            alertify.error("You can not set Upgrade Class with the same Kind Of Course, Level, Module !");
            return false;
        }
        else return true;
    }
    else return true;
}

//Overwrite check_form to validate
function check_form(formname) {
    var accept_sche = $('#accept_schedule_change').val() == '1' ? true : false;
    var sn_table_error = $('#sn_table_error').html();
    if(!accept_sche && sn_table_error != '')
        show_dialog_change_schedule();
    else
        accept_sche = true;

    //Validate timepicker
    var validate_days = true;
    $('input[name=week_date]').each(function () {
        var week_row = "#TS_"+$(this).val();
        if($(this).is(":checked")){
            $(week_row+' :input').each(function () {
                if($(this).val() == ''){
                    validate_days = false;
                    $(this).effect("highlight", {color: '#FF0000'}, 2000);
                }
            });
        }
    });
    if($('#class_case').val() == 'change_schedule'){
        var history = {};
        var schedule = jQuery.parseJSON($('#history_temp').val());
        history['change_date'] =  $('#change_date_from').val();
        history['from_date'] =  $('#change_date_to').val();
        history['schedule'] =  schedule;
        history['change_reason'] =  $('#change_reason').val();
        $('#history').val(JSON.stringify(history));
    }

    if(validate_form(formname, '') && validate_days && checkStartDate() && checkDuplicate() && alertUpgradeClass() && accept_sche)
        return true;
    else return false;
}

//Generate suggest selected schedule
function generateSchedule(content, upgrade_id){
    if(record_id == ''){
        clrSelection();
        // Generate schedule from class upgrade
        var day_schedule = [];

        var json =  jQuery.parseJSON(content);

        $.each( json.schedule , function( key, obj ){
            $('input[id='+key+']').prop('checked',true).trigger('change');
            var sss = new Date("2015-03-25 "+obj.start_time);
            var eee = new Date("2015-03-25 "+obj.end_time);
            $('#TS_'+key).find('.start').timepicker('setTime', sss);
            $('#TS_'+key).find('.end').timepicker('setTime', eee);
            $('#TS_'+key).find('.duration_hour').val(formatNumber(obj.duration_hour,num_grp_sep,dec_sep,2,2));
            $('#TS_'+key).find('.revenue_hour').val(formatNumber(obj.revenue_hour,num_grp_sep,dec_sep,2,2));
            $('#TS_'+key).find('.teaching_hour').val(formatNumber(obj.teaching_hour,num_grp_sep,dec_sep,2,2));
            day_schedule.push(key);
        });
        // set TimePicker
        //setTimePicker();

        // set start date of class upgrade
        var end_date = new Date(json.end_date);
        var end_date_next = new Date(end_date.setDate(end_date.getDate() + 1));
        var daysOfWeek = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        var end_date_checking =  daysOfWeek[SUGAR.util.DateUtils.parse(end_date_next,cal_date_format).getDay()];

        while(day_schedule.indexOf(end_date_checking) == -1) {
            end_date_next = new Date(end_date.setDate(end_date_next.getDate() + 1));
            end_date_checking =  daysOfWeek[SUGAR.util.DateUtils.parse(end_date_next,cal_date_format).getDay()];
        }
        $('#start_date').val(SUGAR.util.DateUtils.formatDate(end_date_next));
        checkStartDate();
        //   $('#start_date').effect("highlight", {color: '#ff9933'}, 1000);

        // suggest kind of course, level, module
        generateOption();
        if($('#modules option:selected').index() != $('#modules option').length-1){
            $('#modules').val($('#modules option:selected').next().val());
        }
        else if($('#level option:selected').index() != $('#level option').length-1){
            $('#level').val($('#level option:selected').next().val());
            $('#level').trigger('change');
            $('#modules').val($('#modules option:nth-child(2)').val());
        }
        else if($('#kind_of_course option:selected').index() != $('#kind_of_course option').length-1){
            $('#kind_of_course').val($('#kind_of_course option:selected').next().val());
            $('#kind_of_course').trigger('change');
            $('#level').val($('#level option:nth-child(2)').val());
            $('#level').trigger('change');
            $('#modules').val($('#modules option:nth-child(2)').val());
        }
        // link more info
        $('#btn_j_class_j_class_1_name').closest('.multiple').after( "<a target='_blank' id='upgrade_class_info' style='text-decoration: none; font-style: italic;' href='index.php?module=J_Class&offset=1&stamp=1439367238038569100&return_module=J_Class&action=DetailView&record="+upgrade_id+"'>&nbsp;&nbsp;More info >></a>" );

        ajaxMakeJsonSession();
    }
}

// Set Timepicker
function setTimePicker(){
    $('.timeOnly').each(function () {
        $(this).find(".time").eq(0).timepicker({
            'minTime': '6:00am',
            'maxTime': '9:30pm',
            'showDuration': false,
            'timeFormat': SUGAR.expressions.userPrefs.timef,
            'step': 15
        });
        $(this).find(".time").eq(1).timepicker({
            'showDuration': true,
            'timeFormat': SUGAR.expressions.userPrefs.timef,
            'step': 15
        });
        var timeOnlyDatepair = new Datepair(this, {
            'defaultTimeDelta': defaultTimeDelta * 3600000 // milliseconds
        });

        $(this).on('rangeSelected', function(){
            var js_start    = SUGAR.util.DateUtils.parse($(this).find(".start").val(),SUGAR.expressions.userPrefs.timef);
            var js_end      = SUGAR.util.DateUtils.parse($(this).find(".end").val(),SUGAR.expressions.userPrefs.timef);
            var duration    = formatNumber(((js_end - js_start)/3600000),num_grp_sep,dec_sep,2,2);
            $(this).closest('tr').find(".duration_hour").val(duration);
            $(this).closest('tr').find(".revenue_hour").val(duration);
            $(this).closest('tr').find(".teaching_hour").val(duration);
            ajaxMakeJsonSession();
        });
    });
}
//Clear all selection && Input
function clrSelection(){
    $('.start, .end, .revenue_hour, .teaching_hour, .duration_hour, #end_date').val('');
    $('input[name=week_date]').prop('checked',false).trigger('change');
}

function alertUpgradeClass(){
    var upgrade_to_id     = $('#upgrade_to_id').val();
    var upgrade_to_name = $('#upgrade_to_name').val();
    var class_name         = $('#name').val();
    var class_case         = $('#class_case').val();
    if(upgrade_to_id != '' && upgrade_to_name != ''){
        alertify.set({ labels: {
            ok     : "Let's me check & Save",
            cancel : "Skip & Save"
        } });


        alertify.confirm('<b>'+class_name+"</b> is upgraded to class <b>"+upgrade_to_name+'</b>. Want you to update the upgrade\'s Schedule ?', function (e) {
            if (e) {
                window.open("index.php?module=J_Class&action=EditView&return_module=J_Class&return_action=DetailView&record="+upgrade_to_id, '_blank');
                ajaxStatus.showStatus('Saving...');
                var _form = document.getElementById('EditView');
                _form.action.value='Save';
                SUGAR.ajaxUI.submitForm(_form);
                return false;
            } else {
                ajaxStatus.showStatus('Saving...');
                var _form = document.getElementById('EditView');
                _form.action.value='Save';
                SUGAR.ajaxUI.submitForm(_form);
                return false;
            }
        });
    }else return true;
}


