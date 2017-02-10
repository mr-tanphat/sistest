/**
 * Client Side Form Validation and send Survey popup, Schedule Survey etc.
 * 
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
/**
 * create send survey popup
 *
 * @author     Original Author Biztech Co.
 * @param      string - record,module
 * @return     
 */
function create_SendSurveydiv(record, module) {
    $('body').append('<div id="backgroundpopup">&nbsp;</div>');
    $('body').append('<div id="survey_main_div">' +
            '<input type="hidden" name="send_records" id="send_records" value="' + record + '">' +
            '<input type="hidden" name="send_module_name" id="send_module_name" value="' + module + '">' +
            '<div id="survey_content">' +
            '<div id="button_div">' +
            '<table class="zebra" cellpadding="0" cellspacing="0" style="width: 100%;">' +
            '<thead><tr><th style="width: 100%;">Survey</th></tr></thead>' +
            '<tfoot><tr><td style="width: 100%;">&nbsp;</td></tr></tfoot>' +
            '<tbody style="height: 65px;">' +
            '<tr><td align="center" style="width: 100%; padding-top: 25px;">' +
            '<input type="button" class="button" value="Select Existing Survey" onclick="select_surveys(\'survey\')">&nbsp;' +
            '<input type="button" class="button" value="Create Survey From Existing Template" onclick="select_surveys(\'survey_template\');">' +
            '</td></tr></tbody></table>' +
            '</div>' +
            '</div>' +
            '<a onclick="close_survey_div();" href="javascript:close_survey_div();"></a>' +
            '</div>');
    $('#backgroundpopup').fadeIn();
    $('#survey_main_div').fadeIn();
}
/**
 * on popup close button click
 *
 * @author     Original Author Biztech Co.
 */
function close_survey_div() {
    $('#backgroundpopup').fadeOut(function () {
        $('#backgroundpopup').remove();
    });
    $('#survey_main_div').fadeOut(function () {
        $('#survey_main_div').remove();
    });
    $("#indivisual_report_main_div").fadeOut(function () {
        $("#indivisual_report_main_div").remove();
    });
}
/**
 * on popup back button click
 *
 * @author     Original Author Biztech Co.
 */
function goback() {
    var _html = '<div id="button_div">' +
            '<table class="zebra" cellpadding="0" cellspacing="0" style="width: 100%;">' +
            '<thead><tr><th style="width: 97%;">Survey</th></tr></thead>' +
            '<tfoot><tr><td style="width: 97%;">&nbsp;</td></tr></tfoot>' +
            '<tbody style="height: 65px;">' +
            '<tr><td align="center" style="width: 97%; padding-top: 25px;">' +
            '<input type="button" class="button" value="Select Existing Survey" onclick="select_surveys(\'survey\')">&nbsp;' +
            '<input type="button" class="button" value="Create Survey From Existing Template" onclick="select_surveys(\'survey_template\');">' +
            '</td></tr></tbody></table>' +
            '</div>';
    $('#survey_content').html(_html);
}
/**
 * get data of survey or survey template
 *
 * @author     Original Author Biztech Co.
 * @param      string - type
 */
function select_surveys(type) {
    ajaxStatus.showStatus('Please wait...');
    var call = 'POSTSurveys';
    var surveyModule = $('input[name="send_module_name"]').val();
    if (type == 'survey') {
        call = 'GetSurveys';
    } else {
        call = 'GetSurveyTemplates';
    }
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {'module': 'bc_survey', 'action': call, 'surveyModule': surveyModule},
        success: function (result) {
            $('#survey_content').html(result);
            ajaxStatus.hideStatus();
        }
    });
}
/**
 * search survey
 *
 * @author     Original Author Biztech Co.
 * @param      string - type,element
 */
function search_surveys(element, type) {
    ajaxStatus.showStatus('Please wait...');
    var _form = $(element).closest('form');
    var surveyModule = $('input[name="send_module_name"]').val();
    var query = $(_form).find("input[name='query']").val();
    var call = 'GetSurveys';
    if (type == 'survey') {
        call = 'GetSurveys';
    } else {
        call = 'GetSurveyTemplates';
    }
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {'module': 'bc_survey', 'action': call, 'search_query': query, 'surveyModule': surveyModule},
        success: function (result) {
            $('#survey_content').html(result);
            ajaxStatus.hideStatus();
        }
    });
}
/**
 * send survey to customer
 *
 * @author     Original Author Biztech Co.
 * @param      string - survey_id
 */
function send_survey(survey_id) {
    var records = $('input[name="send_records"]').val();
    var module = $('input[name="send_module_name"]').val();
    ajaxStatus.showStatus('Please wait while sending survey...');
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {module: 'bc_survey', action: 'checkEmailTemplateForSurvey', survey_ID: survey_id},
        success: function (result) {
            if (result.trim() != '') {
                $.ajax({
                    url: "index.php",
                    type: "POST",
                    data: {
                        module: 'bc_survey',
                        action: 'SendSurveyEmail',
                        records: records,
                        module_name: module,
                        id_survey: survey_id
                    },
                    success: function (result) {
                        var resultObj = JSON.parse(result);
                        var content = resultObj.contentPopUP;
                        if (resultObj.mailStatus.trim() == 'send') {
                            alert('Survey email sent successfully to recipient');
                        } else if (resultObj.mailStatus.trim() == 'notsend') {
                            alert("There seems some error sending survey email, Please try again.");
                        } else {
                            alert("There seems the survey is already sent to recipient.");
                        }

                        $('body').append('<div id="customerMailPopup" title="Customer Mail Status Details" style="display:"";position: absolute; z-index: 1000; background-image: none;"></div>');
                        $("#customerMailPopup").html(content);
                        $("#customerMailPopup").dialog({
                            dialogClass: 'dialog_style',
                            modal: true,
                            draggable: false,
                            resizable: false,
                        });
                        $(".dialog_style").css('width', 'auto');
                        $(".dialog_style").find('.ui-dialog-titlebar').find('.ui-dialog-titlebar-close').css('right', '0.0em');
                        ajaxStatus.hideStatus();
                        close_survey_div();
                    }
                });
            } else {
                ajaxStatus.hideStatus();
                if (confirm('Email template does not exist.Click Ok to create email template for this survey.')) {
                    window.open('index.php?module=EmailTemplates&action=EditView&return_module=EmailTemplates&return_action=DetailView');
                }
            }
        }
    });
}
/**
 * schedule survey click
 *
 * @author     Original Author Biztech Co.
 * @param      date - current_date
 * @param      string - survey_id
 */
function schedule_survey(survey_id, current_date) {
    var records = $('input[name="send_records"]').val();
    var module = $('input[name="send_module_name"]').val();
    var sendPeopleCount = $('#selectCountTop').val();
    var schedule_on = $('input[name="schedule_survey_date"]').val();
    if (schedule_on == '') {
        $('#show_error').html('<span style="color: red;font-size: 10px;">Please select date to schedule survey.</span>');
    }
    else {
        if (typeof schedule_on == 'undefined' && current_date != '') {
            schedule_on = current_date;
        }
        ajaxStatus.showStatus('Please wait while scheduling survey...');
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {module: 'bc_survey', action: 'checkEmailTemplateForSurvey', survey_ID: survey_id},
            success: function (result) {
                if (result.trim() != '') {
                    $.ajax({
                        url: "index.php",
                        type: "POST",
                        data: {
                            module: 'bc_survey',
                            action: 'SendSurveyEmail',
                            records: records,
                            module_name: module,
                            id_survey: survey_id,
                            schedule_on: schedule_on,
                            total_selected: sendPeopleCount
                        },
                        success: function (result) {
                            var resultObj = JSON.parse(result);
                            var content = resultObj.contentPopUP;
                            $('body').append('<div id="customerMailPopup" title="Customer Mail Status Details" style="display:"";position: absolute; z-index: 1000; background-image: none;"></div>');
                            $("#customerMailPopup").html(content);
                            $("#customerMailPopup").dialog({
                                dialogClass: 'dialog_style',
                                modal: true,
                                draggable: false,
                                resizable: false,
                            });
                            $(".dialog_style").css('width', 'auto');
                            $(".dialog_style").find('.ui-dialog-titlebar').find('.ui-dialog-titlebar-close').css('right', '0.0em');
                            ajaxStatus.hideStatus();
                            close_survey_div();
                        }
                    });
                } else {
                    if (confirm('Email template does not exist.Click Ok to create email template for this survey.')) {
                        window.open('index.php?module=EmailTemplates&action=EditView&return_module=EmailTemplates&return_action=DetailView&module_name=' + module + '&survey_name=' + survey_id);
                    }
                }
            }
        });
    }
}
/**
 * schedule survey form
 *
 * @author     Original Author Biztech Co.
 * @param      string - survey_id,self_element
 */
function schedule_survey_form(self_element, survey_id) {
    if ($('#sehedule_row').length == 0) {
        var current_tr = $(self_element).closest('tr');
        var new_row = '<tr id="sehedule_row"><td colspan="3" align="center" style="width: 90%;"><div id="sehedule_div"  style="display: none;">' +
                '<strong>Select Date :</strong>&nbsp;' +
                '<input type="text" name="schedule_survey_date" id="schedule_survey_date" style="vertical-align: bottom;">&nbsp;' +
                "<input type='button' name='schedule_button' value='Schedule' onclick=\"schedule_survey('" + survey_id + "');\">&nbsp;" +
                '<input type="button" name="schedule_cancel_button" value="Cancel" onclick="cancel_schedule_survey();">' +
                '</div></td></tr>';
        current_tr.after(new_row);
        $('#sehedule_div').slideDown();
        $('#schedule_survey_date').datetimepicker({format: curr_user_date_format + ' ' + curr_user_time_format, minDate: 0, minTime: 0});
    } else {
        cancel_schedule_survey();
    }
}
/**
 * click on cancel button on schedule survey
 *
 * @author     Original Author Biztech Co.
 */
function cancel_schedule_survey() {
    $('#show_error').html('&nbsp;');
    $('#sehedule_div').slideUp(function () {
        $('#sehedule_row').fadeOut(function () {
            $('#sehedule_row').remove();
        });
    });
}
/**
 * click on cancel button on schedule survey
 *
 * @author     Original Author Biztech Co.
 * @param      string - module_name
 */
function getListRecords(module_name) {
    var record_ids = '';
    var allChecked = $('input[name="mass[]"]:checked');
    var sendPeopleCount = $('#selectCountTop').val();
    var msg = 'You are going to send survey of ' + sendPeopleCount + ' ' + module_name + '. Are you sure you want to proceed?';
    if (confirm(msg)) {
        if ($('input[name="select_entire_list"]').val() == '1') {
            record_ids = 'all';
        } else {
            var red_id = new Array();
            for (var i = 0; i < sendPeopleCount; i++) {
                var checkedBox = $("input[name='mass[" + i + "]']").val(); // get other pages selected ids
                if (checkedBox != null) {
                    red_id.push(checkedBox);
                }
            }
            for (i = 0; i < $(allChecked).length; i++) {
                var checkedBox = allChecked[i]; // get current pages selected ids
                if (red_id.indexOf($(checkedBox).val()) == -1) { // if already exists then don't push
                    red_id.push($(checkedBox).val());
                }
            }
            record_ids = red_id.join();
        }
        create_SendSurveydiv(record_ids, module_name);
    }
}
/**
 * click on cancel button on schedule survey
 *
 * @author     Original Author Biztech Co.
 * @param      string - template_id
 */
function createSurvey(template_id) {
    var send_to_records = $('input[name="send_records"]').val();
    var send_to_module = $('input[name="send_module_name"]').val();

    window.open('index.php?module=bc_survey&action=EditView&template_id=' + template_id + '&return_module=' + send_to_module + '&return_action=index');
}
/**
 * get reports controller is called
 *
 * @author     Original Author Biztech Co.
 * @param      string - survey_id,module_id
 * @param      integer - page
 */
function getReports(survey_id, page, module_id) {
    $("<input>").attr({type: "hidden", id: "selectedRecord", name: "selectedRecord"}).appendTo("head");
    $("#selectedRecord").val(module_id);
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {"module": "bc_survey", "action": "getReports", survey_id: survey_id, module_id: module_id, page: page},
        success: function (result) {
            $("body").append('<div id="backgroundpopup">&nbsp;</div>');
            if ($("#indivisual_report_main_div").length == 0) {
                $("body").append('<div id="indivisual_report_main_div"> <a onclick="close_survey_div();" href="javascript:void(0);" class="close_link"></a></div>');
            }
            $("#backgroundpopup").fadeIn();
            $("#indivisual_report_main_div").fadeIn();
            $("#indivisual_report_main_div").html('<div id="indivisual_report">'
                    + result +
                    "<a onclick='close_survey_div();' href='javascript:void(0);' class='close_link'></a>" +
                    "</div>");
        }
    });
}
/**
 * Validate Survey Form at Client Side
 *
 * @author     Original Author Biztech Co.
 * @param      string - type, que_id, is_required,advance_type, is_datetime
 * @param      integer - min, max, maxsize,is_sort, scale_slot
 * @param      float - precision
 */
function surveySliderValidationOnNextPrevClick(type, que_id, is_required, min, max, maxsize, precision, advance_type, is_datetime, is_sort, scale_slot) {
    var validate = true;
    var lengthValidationMsg = 0;
    if (typeof $('#require_msg_' + que_id) !== undefined) {
        lengthValidationMsg = $('#require_msg_' + que_id).length;
    }
    if (precision != null) {
        var str = '^\\d*\.?\\d{0,' + precision + '}$';
        var reg = new RegExp(str);
    }
    //if hide question is required
    if ($('#' + que_id + '_div').parent('div').css('display') !== 'none') {
        switch (type) {
            
            case 'MultiSelectList':
                if (is_required == 1) {
                    if ($('.' + que_id).val() == null || $('.' + que_id).val() == '') {
                        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                            if (lengthValidationMsg == 0) {
                                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
                            }
                        }
                        validate = false;
                    }
                    else {
                        $('#require_msg_' + que_id).remove();
                    }
                }
                break;
            case 'Checkbox':
                if (is_required == 1) {
                    $('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').remove();
                    var check = 0;
                    $('.' + que_id).each(function () {
                        if ($(this).is(':checked') == true) {
                            check = 1;
                        }
                    });
                    if (check != 1) {
                        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                            if (lengthValidationMsg == 0) {
                                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
                            }
                        }
                        validate = false;
                    } else {
                        $('#require_msg_' + que_id).remove();
                    }
                }
                break;
            case 'RadioButton':
                if (is_required == 1) {
                    $('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').remove();
                    var check = 0;
                    $('.' + que_id).each(function () {
                        if ($(this).is(':checked') == true) {
                            check = 1;
                        }
                    });
                    if (check != 1) {
                        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                            if (lengthValidationMsg == 0) {
                                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
                            }
                        }
                        validate = false;
                    } else {
                        $('#require_msg_' + que_id).remove();
                    }
                }
                break;
            case 'DrodownList':
                if (is_required == 1) {
                    if ($('.' + que_id).val() == 0) {
                        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                            if (lengthValidationMsg == 0) {
                                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
                            }
                        }
                        validate = false;
                    } else {
                        $('#require_msg_' + que_id).remove();
                    }
                }
                break;
            case 'Textbox':

                validate = textboxValiadation(que_id, is_required, min, max, maxsize, precision, advance_type, reg);
                break;
            case 'CommentTextbox':
                validate = commentboxValidation(que_id, is_required, min, max, maxsize, precision, advance_type);
                break;
            case 'Rating':
                validate = ratingValidation(que_id, is_required);
                break;
            case 'ContactInformation':

                validate = contactInformationValidation(que_id, is_required, advance_type);
                break;
            case 'Date':
                validate = DateTimeValidation(que_id, is_required, min, max, is_datetime);
                break;
            case 'Scale':
                validate = ScaleValidation(que_id, is_required);
                break;
            case 'Matrix':
                if($('#' + que_id + '_div').parent('div').parent().css('display') !== 'none'){
                    validate = MatrixValidation(que_id, is_required);
                }
                break;
        }
    }
    if (validate == false) {
        if ($(document).find('.validation-tooltip').parent().parent().find('input')[1] != undefined) {
            $(document).find('.validation-tooltip').parent().parent().find('input')[1].focus();
        }
    }
    return validate;
}
/**
 * validate textbox of survey form
 *
 * @author     Original Author Biztech Co.
 * @param      string - que_id, datatype, reg
 * @param      integer - is_required,min, max, maxsize,
 * @param      float - precision
 */
function textboxValiadation(que_id, is_required, min, max, maxsize, precision, datatype, reg) {
    var validate = true;
    var lengthValidationMsg = $('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').length;

    $('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').remove();
    // not null validation 
    if (is_required == 1 && ($('.' + que_id).val() == null || $('.' + que_id).val() == '')) {
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
            }
        }
        validate = false;
    }
    // if interger or Float then minimum & maximum value validation
    else if ((datatype == 'Integer') && $('.' + que_id).val() && min != '' && max != '' && parseInt($('.' + que_id).val()) < parseInt(min)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   Please enter Value between ' + min + '-' + max + ' </div>');
                validate = false;
            }

        }

    } //only min is given
    else if ((datatype == 'Integer') && $('.' + que_id).val() && min != '' && max == '' && parseInt($('.' + que_id).val()) < parseInt(min)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   Value can not be less then ' + min + '</div>');
                validate = false;
            }

        }

    }
    // if interger or Float then minimum & maximum value validation
    else if ((datatype == 'Integer') && $('.' + que_id).val() && min != '' && max != '' && parseInt($('.' + que_id).val()) > parseInt(max)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   Please enter Value between ' + min + '-' + max + ' </div>');
                validate = false;
            }

        }

    }
    // only max is given
    else if ((datatype == 'Integer') && $('.' + que_id).val() && min == '' && max != '' && parseInt($('.' + que_id).val()) > parseInt(max)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>    Value can not be more then ' + max + '</div>');
                validate = false;
            }

        }

    }// both min & max given
    else if ((datatype == 'Float') && $('.' + que_id).val() && min != '' && max != '' && parseFloat($('.' + que_id).val()) < parseFloat(min)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>    Please enter Value between ' + min + '-' + max + '</div>');
                validate = false;
            }

        }

    } // only min given
    else if ((datatype == 'Float') && $('.' + que_id).val() && min != '' && max == '' && parseFloat($('.' + que_id).val()) < parseFloat(min)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>    Value can not be less then ' + min + '</div>');
                validate = false;
            }

        }

    }
    // only max is given
    else if ((datatype == 'Float') && $('.' + que_id).val() && min == '' && max != '' && parseFloat($('.' + que_id).val()) > parseFloat(max)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>    Value can not be more then ' + max + '</div>');
                validate = false;
            }

        }

    } else if (datatype == 'Float' && $('.' + que_id).val() && (precision != null || precision != '')) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (reg.test(parseFloat($('.' + que_id).val())) == false && lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   Please enter atleast ' + precision + ' precision point.</div>');
                validate = false;
            }

        }

    }
    //Email validation
    else if (datatype == 'Email' && $('.' + que_id).val()) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            var re = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$');
            if (re.test($('.' + que_id).val()) == false && lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_email_reg\'>   Please enter correct Email Address.</div>');
                validate = false;
            }
        }

    }
    //max size validation
    else if (maxsize != null && $('.' + que_id).val() && $('.' + que_id).val().length > parseInt(maxsize)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   Maximum length ' + maxsize + ' character.</div>');
                validate = false;
            }

        }

    }
    else {
        $('#require_msg_' + que_id).remove();
    }
    return validate;
}
/**
 * validate comment textbox of survey form
 *
 * @author     Original Author Biztech Co.
 * @param      string - que_id, datatype, reg
 * @param      integer - is_required,min, max, maxsize,
 * @param      float - precision
 */
function commentboxValidation(que_id, is_required, min, max, maxsize, precision, datatype) {
    var validate = true;
    var lengthValidationMsg = 0;
    // not null validation
    $('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').remove();
    if (is_required == 1 && $('.' + que_id).val() == '') {
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
                validate = false;
            }
        }
    }
    // max allowed char validation
    else if (maxsize != null && $('.' + que_id).val().length > parseInt(maxsize)) {
        lengthValidationMsg = 0;
        $('#require_msg_' + que_id).html('');
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if (lengthValidationMsg == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   Maximum length ' + maxsize + ' character.</div>');
                validate = false;
            }
        }

    } else {
        $('#require_msg_' + que_id).remove();
    }
    return validate;
}
/**
 *  validate rating of survey form
 *
 * @author     Original Author Biztech Co.
 * @param      string - que_id,
 * @param      integer - is_required
 */
function ratingValidation(que_id, is_required) {
    var validate = true;
    var lengthValidationMsg = 0;
    if (is_required == 1) {
        $('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').remove();
        if ($('.' + que_id).val() == null || $('.' + que_id).val() == '') {
            if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                if (lengthValidationMsg == 0) {
                    $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
                }
            }
            validate = false;
        } else {
            $('#require_msg_' + que_id).remove();
        }
    }
    return validate;
}
/**
 * validate contact-information of survey form
 *
 * @author     Original Author Biztech Co.
 * @param      string - que_id,
 * @param      integer - is_required
 * @param      array - requireFields
 */

// validate contact-information of survey form
function contactInformationValidation(que_id, is_required, requireFields) {

    var validate = true;
    var lengthValidationMsg = 0;

    if (is_required == 1 && (requireFields == null || requireFields == '')) {
        var flag = true;
        $('#require_msg_' + que_id + '_combine').remove();
        $('#require_msg_' + que_id + '_phone_reg').remove();
        $('#require_msg_' + que_id + '_email_reg').remove();
        if ($('.' + que_id + '_name').val() == '' || $('.' + que_id + '_phone').val() == '' || $('.' + que_id + '_email').val() == '') {
            if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_combine\'>   This question is mandatory, Please answer this question.</div>');
            }
            flag = false;
        } else {
            $('#require_msg_' + que_id + '_combine').remove();
        }
        var validationMsgForRequiredField = $('#require_msg_' + que_id + '_combine').length;
        if ($('.' + que_id + '_phone').val() != '') {
            if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                var re = new RegExp('^[0-9-+]+$');
                if (re.test($('.' + que_id + '_phone').val()) == false && validationMsgForRequiredField == 0) {
                    $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_phone_reg\'>   Please enter proper Phone Number.</div>');
                    flag = false;
                }
            }
        }
        if ($('.' + que_id + '_email').val() != '') {
            if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                var re = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$');
                if (re.test($('.' + que_id + '_email').val()) == false && validationMsgForRequiredField == 0) {
                    $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_email_reg\'>   Please enter correct Email Address.</div>');
                    flag = false;
                }
            }

        }
        if (flag == false) {
            validate = false;
        }
    }
    else if (is_required == 1 && (requireFields != null || requireFields != '')) {
        requireFields = requireFields.split(' ');
        $.makeArray(requireFields);
        var flag = true;
        $('#require_msg_' + que_id + '_combine').remove();
        $('#require_msg_' + que_id + '_phone_reg').remove();
        $('#require_msg_' + que_id + '_email_reg').remove();
        //require validation for given fields
        $.each(requireFields, function (key, field) {
            if (field != null && field != '') {
                if ($('.' + que_id + '_' + field.toLowerCase()).val() == '' || $('.' + que_id + '_' + field.toLowerCase()).val() == null) {
                    if ($('#' + que_id + '_div').parent('div').children('h3').children('div').length == 0) {
                        $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_combine\'>   This question is mandatory, Please answer this question.</div>');
                    }
                    flag = false;
                } else {
                    $('#require_msg_' + que_id + '_combine').remove();
                }
            }
        });

        var validationMsgForRequiredField = $('#require_msg_' + que_id + '_combine').length;
        if ($.inArray("Phone", requireFields) != -1 && $('.' + que_id + '_phone').val() != '') {
            if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                var re = new RegExp('^[0-9-+]+$');
                if (re.test($('.' + que_id + '_phone').val()) == false && validationMsgForRequiredField == 0) {
                    $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_phone_reg\'>   Please enter proper Phone Number.</div>');
                    flag = false;
                }
            }
        }
        if ($.inArray("Email", requireFields) != -1 && $('.' + que_id + '_email').val() != '') {
            if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                var re = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$');
                if (re.test($('.' + que_id + '_email').val()) == false && validationMsgForRequiredField == 0) {
                    $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_email_reg\'>   Please enter correct Email Address.</div>');
                    flag = false;
                }
            }

        }
        if (flag == false) {
            validate = false;
        }
    }
    return validate;
}
/**
 * validate date-time of survey form
 *
 * @author     Original Author Biztech Co.
 * @param      string - que_id,
 * @param      integer - is_required, min, max
 * @param      date - is_datetime
 */
// validate date-time of survey form
function DateTimeValidation(que_id, is_required, min, max, is_datetime) {
    // cretae unique format to check date
    var mindate = new Date(min);
    var maxdate = new Date(max);
    var compare_min_date = mindate.getMonth() + '/' + mindate.getDate() + '/' + mindate.getFullYear();
    var compare_max_date = maxdate.getMonth() + '/' + maxdate.getDate() + '/' + maxdate.getFullYear();

    var validate = true;
    var lengthValidationMsg = 0;
    $('#require_msg_' + que_id).remove();
    var current_date_value = new Date($('.' + que_id + '_datetime').val());
    var current_date = current_date_value.getMonth() + '/' + current_date_value.getDate() + '/' + current_date_value.getFullYear();

    // var compare_min_date = new Date(min);
    // var compare_max_date = new Date(max);
    $('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').remove();
    //Is required validation
    if (is_required == 1 && $('.' + que_id + '_datetime').val() == '') {
        if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
            if ($('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').length == 0) {
                $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
            }
                validate = false;
            }
        }
    // Start date validation
    else if ($('.' + que_id + '_datetime').val() && min != '' && max != '' && current_date < compare_min_date) {
        if ($('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').length == 0 || $('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').css('display') == 'none') {
            $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_datemin\'>    Date can be between  ' + min + ' to ' + max + '</div>');
        }
            validate = false;
    } else if ($('.' + que_id + '_datetime').val() && min != '' && max == '' && current_date < compare_min_date) {
        if ($('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').length == 0 || $('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').css('display') == 'none') {
            $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_datemin\'>    Please enter date after ' + min + '</div>');
        }
            validate = false;
        }
    // End date validation
    else if ($('.' + que_id + '_datetime').val() && max != '' && min != '' && current_date > compare_max_date) {
        if ($('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').length == 0 || $('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').css('display') == 'none') {
            $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_datemax\'>    Date can be between  ' + min + ' to ' + max + '</div>');
        }
            validate = false;
    } else if ($('.' + que_id + '_datetime').val() && min == '' && max != '' && current_date > compare_max_date) {
        if ($('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').length == 0 || $('#' + que_id + '_div').parent('div').children('h3').find('.validation-tooltip').css('display') == 'none') {
            $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '_datemin\'>    Please enter date before ' + max + '</div>');
        }
            validate = false;
        }
    else {
        $('#require_msg_' + que_id).remove();
        $('#require_msg_' + que_id + '_datemin').remove();
    }
    return validate;
}
/**
 * validate scale of survey form
 *
 * @author     Original Author Biztech Co.
 * @param      string - que_id,
 * @param      integer - is_required, min, max
 * @param      date - is_datetime
 */
function ScaleValidation(que_id, is_required) {
    var validate = true;
    var lengthValidationMsg = 0;
    if (is_required == 1) {
        $('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').remove();
        if ($('.' + que_id).find('.tooltip').text() == null || $('.' + que_id).find('.tooltip').text() == '') {
            if ($('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                if (lengthValidationMsg == 0) {
                    $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question is mandatory, Please answer this question.</div>');
                }
            }
            validate = false;
        } else {
            $('#require_msg_' + que_id).remove();
        }
    }
    return validate;
}
/**
 * validate matrix of survey form
 *
 * @author     Original Author Biztech Co.
 * @param      string - que_id,
 * @param      integer - is_required
 */

function MatrixValidation(que_id, is_required) {
    var validate = true;
    var lengthValidationMsg = 0;
    if (is_required == 1) {
        $('#' + que_id + '_div').parent('div').children('h3').children('span:nth-child(2)').remove();
        $('.' + que_id + '_matrix').each(function (key, val) {

            var row = $(this).attr('value');
            if ($('.' + que_id + '_matrix').parent().find('[name="' + que_id + '[' + row + '][]"]:checked').length == 0) {
                if ($('#' + que_id + '_div').parent('div').parent('div').children('h3').children('span:nth-child(2)').html() == undefined) {
                    if (lengthValidationMsg == 0) {
                        $('#' + que_id + '_div').parent('div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question require one answer per row.</div>');
                    }
                }
                validate = false;
            } else {
                $('#require_msg_' + que_id).remove();
            }
        });
    }
    if (validate == false) {
        $('#' + que_id + '_div').parent('div').children('h3').append('<div class="validation-tooltip" style=\'color:red;display: inline-table;\' id=\'require_msg_' + que_id + '\'>   This question require one answer per row.</div>');
    }
    return validate;
}
/**
 * open helptips popup survey
 *
 * @author     Original Author Biztech Co.
 * @param      string - el,helpCommentText
 */
// help tips layout for survey form
function openHelpTipsPopUpSurvey(el, helpCommentText) {
    var offset_Question = $(el).offset();
    $('.customClassForTooltip').fadeIn();
    $('#tooltipDiv').dialog({
        dialogClass: 'customClassForTooltip',
        draggable: false,
        resizable: false,
        width: 500,
    });
    $('#tooltipDiv').html(helpCommentText);
    $('#tooltipDiv').css('min-height', '');
    $('.customClassForTooltip').css('top', offset_Question.top - 10);
    $('.customClassForTooltip').css('left', offset_Question.left + 40);
    $('.customClassForTooltip').css('height', 'auto');
    $('.customClassForTooltip').css('float', 'right');
    $('.customClassForTooltip').css('width', 'auto');
    $('.customClassForTooltip').css('display', 'block');
    $('.customClassForTooltip').css('font-size', '12px');
    $('.customClassForTooltip').css('color', 'white');
    $('.customClassForTooltip').css('background', '#000');
    $('.customClassForTooltip').find('.ui-dialog-titlebar').remove();
}
/**
 * remove helptips
 *
 * @author     Original Author Biztech Co.
 */
// hide helptips of mouse out
function removeHelpTipPopUpDiv() {
    $('.customClassForTooltip').fadeOut();
}
/**
 * send survey Reminder
 *
 * @author     Original Author Biztech Co.
 * @param      string - surveyID,module_name
 */
function sendSurveyReminder(surveyID, module_name) {
    var allReminderChk = new Array();
    var moduleIDs = new Array();
    $('.reminder_chk').each(function () {
        if ($(this).is(":checked")) {
            allReminderChk.push(true);
            moduleIDs.push($(this).val());
        } else {
            allReminderChk.push(false);
        }
    });
    var allmodulesIDs = JSON.stringify(moduleIDs);
    if ($.inArray(true, allReminderChk) != -1) {
        $.ajax({
            url: "index.php?module=bc_survey&action=SendSurveyReminder",
            type: "POST",
            data: {moduleName: module_name, moduleID: allmodulesIDs, surveyID: surveyID},
            success: function (result) {
                if (result.trim() == 'scheduled') {
                    alert("Survey reminder mail scheduled successfully");
                }
            }
        });
    } else {
        alert('please check atleast one checkbox');
    }
}
/**
 * select deselect reminder
 *
 * @author     Original Author Biztech Co.
 */
function selectDeselectReminderChk() {
    $('.reminder_chk').each(function () {
        if ($('.reminder_chkAll').is(":checked")) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
    });
}
/**
 * validate email body 
 *
 * @author     Original Author Biztech Co.
 */
function validateBody() {
    //check survey link is added to email body or not
    var _form = document.getElementById('EditView');
    _form.action.value = 'Save';
    if (check_form('EditView')) {

        var flag = false;
        var link_status = window.parent.tinyMCE.get('body_text')['contentDocument'].getElementById('survey_link'); // survey link element
        var link_edit_status = window.parent.tinyMCE.get('body_text')['contentDocument'].getElementById('sugar_text_survey_link'); // survey link element
        var survey = $('#survey_id').val();
        var survey_module_type = $('#survey_module_type').val();

        if (survey != '' && survey_module_type != '') {
            if (link_status == null || link_status == '') { //survey link not added to email body
                if (link_edit_status == null || link_edit_status == '') { // survey link not added to email body ( Edit mode)
                    $('#survey_insert_btn_msg').text('Survey link not added to email template. Please insert.').css({
                        'font-size': '12px',
                        'font-weight': 'normal',
                        'color': 'red'
                    }); // validation message
                    $('#survey_insert_btn_msg').show();
                    flag = false;
                }
                else {
                    flag = true;
                }
            }
            else {
                flag = true;
            }
        } else {
            flag = true;
        }
    }

    if (flag) { // if survey link added then submit form
        return SUGAR.ajaxUI.submitForm(_form);
    }
    return false;
}
/**
 * insert survey link in email body
 *
 * @author     Original Author Biztech Co.
 */
// insert survey link to email body
function insertSurveyUrlLinkEmailTemplate() {

    var surveyUrlPart = document.getElementById('survey_url_link').value;
    var surveyID = document.getElementById('survey_id').value;
    var surveyUrl = '<a id="survey_link" href="' + surveyUrlPart + "SURVEY_PARAMS" + '">click here</a>';
    var link_status = '';
    var link_edit_status = '';
    try {
        link_status = window.parent.tinyMCE.get('body_text')['contentDocument'].getElementById('survey_link'); // survey link element
        link_edit_status = window.parent.tinyMCE.get('body_text')['contentDocument'].getElementById('sugar_text_survey_link'); // survey link element
    }
    catch (err) {
        //document.getElementById("demo").innerHTML = err.message;
        link_status = tinyMCE.activeEditor.contentDocument.getElementById("survey_link");
        link_edit_status = tinyMCE.activeEditor.contentDocument.getElementById("sugar_text_survey_link");

    }
    if (surveyID == '') {
        $('#survey_insert_btn_msg').text('You must select survey for insert survey link.').css({
            'font-size': '12px',
            'font-weight': 'normal',
            'color': 'red'
        });
        $('#survey_insert_btn_msg').show();
    } else {
        $('#survey_insert_btn_msg').hide();
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {module: 'bc_survey', action: 'checkEmailTemplateForSurvey', survey_ID: surveyID},
            success: function (result) {
                var current_record = $('[name=record]').val();
                var res = result.trim();
                if ($(link_status).html() != "click here" && $(link_edit_status).html() != "click here" && current_record == res)
                {
                    try {
                        var inst = tinyMCE.getInstanceById("body_text");
                        if (inst)
                            inst.getWin().focus();
                        inst.execCommand('mceInsertRawHTML', false, surveyUrl);
                    }
                    catch (err) {
                        tinyMCE.activeEditor.execCommand('mceInsertRawHTML', false, surveyUrl);
                    }
                }
                else if ($(link_status).html() != "click here" && $(link_edit_status).html() != "click here" && current_record != res && res != '')
                {
                    $('#survey_insert_btn_msg').text('Email template has already created for this survey.').css({
                        'font-size': '12px',
                        'font-weight': 'normal',
                        'color': 'red'
                    });
                    $('#survey_insert_btn_msg').show();
                }
                else if (result.trim() != '') {
                    $('#survey_insert_btn_msg').text('Email template has already created for this survey.').css({
                        'font-size': '12px',
                        'font-weight': 'normal',
                        'color': 'red'
                    });
                    $('#survey_insert_btn_msg').show();
                }
            }
        });
    }
}
/**
 * redirect to email template
 *
 * @author     Original Author Biztech Co.
 * @param      string - survey_ID
 */
function redirectToEmailTemplate(survey_ID) {
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {module: 'bc_survey', action: 'checkEmailTemplateForSurvey', survey_ID: survey_ID},
        success: function (result) {
            if (result.trim() != '') {
                window.open("index.php?module=EmailTemplates&action=DetailView&record=" + result);
            } else {
                if (confirm('Preview is not available because email template does not exist. Click Ok to create email template for this survey.')) {
                    window.open('index.php?module=EmailTemplates&action=EditView&return_module=EmailTemplates&return_action=DetailView');
                }
            }
        }

    });
}
/**
 * Remove Customer Summary PopUp
 *
 * @author     Original Author Biztech Co.
 */
function removeCustomerSummaryPopUp() {
    $('.dialog_style,#customerMailPopup').remove();
}

$(document).ready(function () {
    // Check current module in email template or not and validation email template body
    if ($('[name="return_module"]').val() == 'EmailTemplates') {
        $("#SAVE").removeAttr('onclick');
        $('#SAVE').click(function (e) {
            return validateBody();
        });
    }
});


