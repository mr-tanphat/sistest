$(document).ready(function() { 
    var options = {
        success: showResponse
    };

    $('#submitFileForm').ajaxForm(options);

    $("#template").on("change",function(){
        var content = $("#template option:selected").attr("content");
        $("#txt_content").val(content);
        countContentCharater($("#txt_content"));
    });

    $("#send_sms").on("click",function(){
        sendSMS();
    });
    countContentCharater($("#txt_content"));
})  

function showResponse(responseText, statusText, xhr, form){
    var json =  jQuery.parseJSON(responseText);
    if(json.success == "1"){
        $("#txt_receiver").val(json.phoneNumbers);
    }
    else{
        alertify.error(SUGAR.language.get('Contacts',json.errorLabel));    
    }
}

function checkContent(){
    if($("#txt_content").val() == ""){
        alertify.error(SUGAR.language.get('Contacts','LBL_EMPTY_CONTENT'));    
        return false;
    }
    else{
        var phones = $("#txt_receiver").val().split(",");
        if(phones.length <= 0){
            alertify.error(SUGAR.language.get('Contacts','LBL_NO_PHONE_NUMBER'));
            return false;    
        }
        else return true;  
    }
}

function sendSMS(){
    if(checkContent()){
        var phones = $("#txt_receiver").val().split(",");
        var count = 0;
        ajaxStatus.showStatus("Sending...");

        $("#count_total").text(phones.length);
        var count_success = 0;
        var count_fail = 0;
        $("#count_failed").text(count_fail);
        $("#count_received").text(count_success);

        $("#sending_result tbody").html("");
        $.each(phones, function (key,value) {
            var send_to_multi = 0;
            var ptype = "Contacts";
            var url = "./index.php?module=Administration&action=smsProvider&sugar_body_only=1&option=send"; 
            var msg = $("#txt_content").val();
            var pid = $("#current_user_id").val();
            var template_id = $("#template").val();
            var team_id = $("#brand_name").val();
            var num = value;

            var result = "RECEIVED";
            $.post(url,{num:num, sms_msg:msg, send_to_multi:0, pid:pid, ptype:"Users", pname:"", template_id: template_id, team_id: team_id}, function(data) { 
                if(data.indexOf("Failed") < 0){
                    count++;
                    count_success++;
                    $("#count_received").text(count_success);
                    if (count >= phones.length) ajaxStatus.hideStatus();
                }
                else{
                    count++;
                    count_fail++;
                    $("#count_failed").text(count_fail);
                    if (count >= phones.length) ajaxStatus.hideStatus();
                    result = "FAILED";
                }
                var table_html = $("#sending_result tbody").html();
                table_html += "<tr><td>"+ num +"</td><td>"+ result +"</td></tr>";
                $("#sending_result tbody").html(table_html);
            });
        });
    }
}

function countContentCharater(this_txt){
    var counter_char = this_txt.val().length;
    if (counter_char == 0){
        var counter_mes = 0;
        var remain_char = 160;    
    }
    else{
        var counter_mes = parseInt(counter_char / 160) + 1;
        var remain_char = 160 - (counter_char % 160);        
    }

    this_txt.closest("tr").find(".message_counter").text("Messages: " + counter_mes + "/3 (" +  remain_char+" remaining).");
}

function showRecentSMS(){
    var current_user = $("#current_user_id").val();
    open_popup('C_SMS', 600, 400, "&assigned_user_id_advanced="+current_user+"&lvso=DESC&C_SMS2_C_SMS_ORDER_BY=date_entered", true, false, {"call_back_function":"set_sms_return","form_name":"EditView","field_to_name_array":{"id":"id","name":"name"}}, "single", true);
}   