//function hideShowMoreDetails(action){
//    if(action=='less'){
//        if($('input#payment_method').val()=='CreditDebitCard'){
//            $('#card_name').closest('tr').hide();     
//            $('#expiration_date').closest('tr').hide();     
//        }    
//        $('#payment_type').closest('tr').hide();     
//        $('#amount').closest('tr').hide();   
//        $('#uploadfile').closest('tr').hide();
//        $('#less_details_img').hide();    
//        $('#more_details_img').show();   
//    }else{
//        if($('input#payment_method').val()=='CreditDebitCard'){
//            $('#card_name').closest('tr').show();     
//            $('#expiration_date').closest('tr').show();     
//        }
//        $('#payment_type').closest('tr').show();     
//        $('#amount').closest('tr').show();   
//        $('#uploadfile').closest('tr').show();
//        $('#more_details_img').hide();
//        $('#less_details_img').show();    
//    }  
//}
function hideShowLead(){
    var payment_type =  $('#payment_type').val()
    if(payment_type == 'Placement Test'){
        $('#leads_c_payments_1leads_ida').closest('tr').show();
        $('#contacts_c_payments_1contacts_ida').closest('tr').hide();

    }
    else{
        $('#leads_c_payments_1leads_ida').closest('tr').hide();
        $('#contacts_c_payments_1contacts_ida').closest('tr').show();  
    }
}
$(document).ready(function() {
    hideShowLead();
    //    hideShowMoreDetails('less');

    // show pop up
    $("#invoicevoucher").click(function(){
        //        if($('input[name=printed]').is(':checked'))
        //            $("#print_use").click();
        //        else
        $("#entry-form_1").fadeIn("fast"); 

    });

    $("#close_ct").click(function(){
        $("#entry-form_1").fadeOut("fast");
    });

    $("#edit_num").click(function(){
        $("#entry-form_1").fadeIn("fast");
    });

    $("#save_use").click(function(){
        $('#type_use').val('save_use');
        $('#invoice_num_ok').html("");
        if(validate['configinfo']!='undefined'){delete validate['configinfo']};
        addToValidate('configinfo', 'invoice_num', 'phone', true,'Invoice Number' );
        addToValidate('configinfo', 'serial_num', 'phone', true,'Serial Number' );
        ajaxCheckSerial(0);

    });   
    $("#print_use").click(function(){
        $('#type_use').val('print_use');
        if(validate['configinfo']!='undefined'){delete validate['configinfo']};
        submit_config();
        $('#printed').prop('checked',true);
    });  
    $("#saveprint_use").click(function(){
        $('#invoice_num_ok').html("");
        if(validate['configinfo']!='undefined'){delete validate['configinfo']};
        addToValidate('configinfo', 'invoice_num', 'phone', true,'Invoice Number' );
        addToValidate('configinfo', 'serial_num', 'phone', true,'Serial Number' );
        ajaxCheckSerial(1); 
    });

    //Add field payment date
    Calendar.setup ({
        inputField : "date_text",
        ifFormat : cal_date_format,
        daFormat : cal_date_format,
        button : "date_text_trigger",
        singleClick : true,
        dateStr : "",
        startWeekday: 0,
        step : 1,
        weekNumbers:false
        }
    );
    $('#div_date_2').hide();
    $("#edit_date").click(function(){
        $('#div_date_1').hide();
        $('#date_text_span').hide();
        $('#div_date_2').show(); 
    });
    $("#save_date").live('click',ajaxChangeDateField);
    
    
    //Handle Convert Revenue
    $("#close_ct_2, #cancel_bt_2").click(function(){
        $("#entry-form_2").fadeOut("fast");
    });
    
    $("#drop_to_revenue").click(function(){
      $("#entry-form_2").fadeIn("fast"); 
    });
    $("#convert_to_revenue_bt").click(function(){
      submit_config_revenue();
    });
    
    addToValidate('convert_to_revenue_frm', 'to_revenue_date', 'date', true,'Revenue Date' );
    
    Calendar.setup ({
        inputField : "to_revenue_date",
        ifFormat : cal_date_format,
        daFormat : cal_date_format,
        button : "to_revenue_date_trigger",
        singleClick : true,
        dateStr : "",
        startWeekday: 0,
        step : 1,
        weekNumbers:false
        }
    );
    
    // Edit by Bui Kim Tung
    
    // Hide "From student" if type isn't Transfer in
    if ($('#payment_type').val() != 'Transfer in') $('#contacts_c_payments_2contacts_ida').closest('tr').find('td:eq(2),td:eq(3)').html('');
    //-- End edit by Bui Kim Tung
    
});
function submit_config(){
    var _form = document.getElementById('configinfo');
    if(check_form('configinfo')){
        $('#record_use').val($('input[name=record]').val());
        $("#entry-form_1").fadeOut("fast");
        _form.submit(); 
    }else 
        return false;
}

// Convert Revenue
function submit_config_revenue(){
    var _form = document.getElementById('convert_to_revenue_frm');
    if(check_form('convert_to_revenue_frm')){
        $('#record_use_2').val($('input[name=record]').val());
        $("#entry-form_2").fadeOut("fast");
        _form.submit(); 
    }else 
        return false;
}

function ajaxCheckSerial($type) {
    var serial_num = $('#serial_num').val();
    var invoice_num = $('#invoice_num').val();
    var record = $("input[name$='record']").val();

    $.ajax({
        url: "index.php?module=C_Payments&action=ajaxCheckSerial&sugar_body_only=true",
        type: "POST",
        async: true,
        data:  
        {
            invoice_num : invoice_num,
            record : record,
        },
        dataType: "json",
        success: function(data){           
            if(data.success == "1"){
                if($type==1)
                {
                    $('#type_use').val('saveprint_use');
                    $('#printed').prop('checked',true); 
                    submit_config();
                    $('#printed').prop('checked',true);
                }
                else  submit_config();
                $('#span_serial_num').text($('input#serial_num').val());
                $('#span_invoice_num').text($('input#invoice_num').val());    
            }
            else
                $('#invoice_num_ok').html("<img src='custom/include/images/icon_unescused.png'>This Code has been used");  
        },        
    });
}
function ajaxChangeDateField(){
    $.ajax({
        url: "index.php?entryPoint=ajaxChangeDate",
        type: "POST",
        async: true,
        data:  
        {
            module: $('input[name=module]').val(),
            id:     $('input[name=record]').val(),
            date:   $('#date_text').val(),
            field:  $('#date_text').closest('div').closest('span').attr('id'), 
        },
        dataType: "json",
        success: function(res){          
            if(res.success == "1"){
                $('#date_text_span').text(res.date);
                $('#div_date_1').show();
                $('#date_text_span').show();
                $('#div_date_2').hide();
            }  
        },        
    });
}


function convert_to_revenue() {
    if(confirm("This payment will be converted to revenue of the time of payment period : "+$('#date_text_span').text()+" , Click OK to comfirm this action.")){
        ajaxStatus.showStatus('Converting <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
        $.ajax({
            url: "index.php?module=C_Payments&action=convert_to_revenue&sugar_body_only=true",
            type: "POST",
            async: true,
            data:  
            {
                payment_id : $('input[name=record]').val(),
            },
            dataType: "json",
            success: function(data){           
                if(data.success == "1"){
                ajaxStatus.hideStatus();
                location.reload();   
                }
            },        
        });  
    }
}