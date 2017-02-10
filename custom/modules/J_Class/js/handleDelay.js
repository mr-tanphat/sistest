$(document).ready(function(){
    $('#dl_from_date, #dl_to_date').on('change',function(){
        $('#dl_studied_hour').text(0);
        $('#dl_studied_amount').text(0);
        $('#dl_delay_hour').text(0);
        $('#dl_delay_amount').text(0);

        //Validate Is Between and check valid input
        var rs1 = validateDateIsBetween($(this).val(), $('#dl_start').text(), $('#dl_end').text());
        if(!rs1) {
            $(this).val('').effect("highlight", {color: 'red'}, 1000);
            return ;	
        }
        //Kiểm tra ngày được chọn có nằm trong lịch không
        rs2 = isInSchedule($(this).val());
        if(!rs2) {
            $(this).val('').effect("highlight", {color: 'red'}, 1000);
            return ;
        }

        //Validate Data Lock
        if(!checkDataLockDate($(this).attr('id'),true))
            return ;

        caculateFreeBalance();

    });

    $('#dl_payment_date').on('change',function(){
        //Validate Is Between and check valid input
        var rs1 = validateDateIsBetween($(this).val(), $('#dl_payment_date_date').val(), $('#dl_from_date').val());
        if(!rs1) {
            $(this).val('').effect("highlight", {color: 'red'}, 1000);
            return ;    
        }

        //Validate Data Lock
        if(!checkDataLockDate($(this).attr('id'),true))
            return ;

    });


    $('.btn_delay').live('click', function(){
        if( (current_status.value == 'Closed' || current_status.value == 'Finish') && is_admin != '1' ){
            alertify.alert("<span class=\"ui-icon ui-icon-alert\" style=\"float:left;\"></span> Could not perform this operation because the class was "+current_status.value+" !!");
            return ; 
        }
        var payment_status= this.getAttribute('payment_status');
        if(payment_status == 'Paid'){
            //Prepare dialog           
            var student_id 	= this.getAttribute('student_id');
            var student_name= this.getAttribute('student_name');
            var situa_id 	= this.getAttribute('situa_id');
            var start_study = this.getAttribute('start_study');
            var end_study 	= this.getAttribute('end_study');
            var total_hour 	= this.getAttribute('total_hour');
            var total_amount= this.getAttribute('total_amount');

            var input_date = SUGAR.util.DateUtils.parse(this.getAttribute('payment_date'),cal_date_format);
            var now_date    = new Date();

            if(now_date.getTime() > input_date.getTime())
                var payment_delay_date= SUGAR.util.DateUtils.formatDate(now_date);
            else var payment_delay_date= SUGAR.util.DateUtils.formatDate(input_date); 

            $('#dl_situation_id').val(situa_id);
            $('#dl_student_id').val(student_id);
            $('#dl_student_name').text(student_name);
            $('#dl_start').text(start_study);
            $('#dl_end').text(end_study);
            $('#dl_to_date').val(end_study);
            $('#dl_total_hour').text(total_hour);
            $('#dl_total_amount').text(total_amount);
            $('#dl_payment_date').val(payment_delay_date);
            $('#dl_payment_date_date').val(this.getAttribute('payment_date'));

            showDialogDelay();
            $('#dl_from_date').trigger('change');	
        }else if(payment_status == 'Unpaid'){
            alertify.alert('<b>This student has not paid in full ! So you can not perform this action.</b>'); 
        }
    });
});

//Show dialog Delay 
function showDialogDelay(){
    $('#delay_class_dialog').dialog({
        resizable: false,
        width: 700,
        modal: true,
        buttons: {
            "Create Delay":{
                click:function() {
                    handleCreateDelay();
                },
                class	: 'button primary btn_create_delay',
                text	: 'Save',
            },
            "Cancel":{
                click:function() {
                    $(this).dialog('close');
                },
                class	: 'button btn_cancel_delay',
                text	: 'Cancel',
            },
        }

    });
}

function caculateFreeBalance(){
    var dl_from_date 	= $('#dl_from_date').val();
    var dl_to_date 		= $('#dl_to_date').val();
    var dl_situation_id= $('#dl_situation_id').val();
    if(dl_from_date == '' || dl_to_date == '' ||dl_situation_id == ''){
        $('#dl_studied_hour').text(0);
        $('#dl_studied_amount').text(0);
        $('#dl_delay_hour').text(0);
        $('#dl_delay_amount').text(0);
        return ;
    }
    $('.btn_create_delay, .btn_cancel_delay').hide();
    $('#save_loading').show(); 
    ajaxStatus.showStatus('Waiting <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
    $.ajax({
        url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
        type: "POST",
        async: true,
        data:  
        {
            situation_id	: dl_situation_id,
            dl_from_date		: dl_from_date,
            dl_to_date			: dl_to_date,
            type 			: "caculateFreeBalance",
        },
        dataType: "json", 
        success: function(res){
            if(res.success == "1"){
                $('#dl_studied_hour').text(res.used_hour).effect("highlight", {color: '#3594FF'}, 2000);
                $('#dl_studied_amount').text(res.used_amount).effect("highlight", {color: '#3594FF'}, 2000);
                $('#dl_delay_hour').text(res.delay_hour).effect("highlight", {color: '#3594FF'}, 2000);
                $('#dl_delay_amount').text(res.delay_amount).effect("highlight", {color: '#3594FF'}, 2000);
            }else
                alertify.alert('An error occurred. Please, Try again!'); 
            $('.btn_create_delay, .btn_cancel_delay').show();
            $('#save_loading').hide(); 
            ajaxStatus.hideStatus();   
        },       
    });  
}

function handleCreateDelay(){
    var dl_from_date 	= $('#dl_from_date').val();
    var dl_to_date 		= $('#dl_to_date').val();
    var dl_situation_id = $('#dl_situation_id').val();
    var dl_delay_hour 	= Numeric.parse($('#dl_delay_hour').text());
    var dl_delay_amount = Numeric.parse($('#dl_delay_amount').text());
    var dl_reason       =  $('#dl_reason').val();
    var dl_payment_date =  $('#dl_payment_date').val();

    if(dl_from_date == '' || dl_to_date == '' || dl_situation_id == '' || dl_delay_hour <= 0  ||  dl_reason == '' || dl_payment_date == ''){
        alertify.error('Please fill out fields completely !');
        return ;
    }
    $('.btn_create_delay, .btn_cancel_delay').hide();
    $('#save_loading').show();
    ajaxStatus.showStatus('Saving <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
    $.ajax({
        url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
        type: "POST",
        async: true,
        data:  
        {
            dl_from_date		:	dl_from_date,
            dl_to_date			:	dl_to_date,
            dl_situation_id		:	dl_situation_id,
            dl_reason           :   dl_reason,
            dl_payment_date		: 	dl_payment_date,
            type 				: 	"handleCreateDelay",
        },
        dataType: "json",
        success: function(res){
            if(res.success == '1'){
//                $('#filter_date').val(dl_from_date);	
                handle_filter();
                $('#delay_class_dialog').dialog("close");
                alertify.success('Saved completely !');
            }else
                alertify.alert('An error occurred. Please, Try again!');
            $('.btn_create_delay, .btn_cancel_delay').show();
            $('#save_loading').hide();
            ajaxStatus.hideStatus();   
        },       
    });  
}

function undoDelay(situation_delay_id){
    if( (current_status.value == 'Closed' || current_status.value == 'Finish') && is_admin != '1' ){
        alertify.alert("<span class=\"ui-icon ui-icon-alert\" style=\"float:left;\"></span> Could not perform this operation because the class was "+current_status.value+" !!");
        return ; 
    }
    if(situation_delay_id == ''){
        alertify.error('You can not Undo now!');
        return ;
    }
    alertify.confirm("Are you sure you want to Undo record ?", function (e) {
        if (e) {
            ajaxStatus.showStatus('Undying <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
            $.ajax({
                url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
                type: "POST",
                async: true,
                data:  
                {
                    situation_delay_id	:	situation_delay_id,
                    type 				: 	"undoDelay",
                },
                dataType: "json",
                success: function(res){
                    if(res.success == '1'){
//                        $('#filter_date').val(res.start_study);	
                        handle_filter();
                        $('#delay_class_dialog').dialog("close");
                        alertify.success('Undo completely !');
                    }else
                        alertify.alert('An error occurred. Please, Try again!');

                    ajaxStatus.hideStatus();   
                },       
            });  	
        }
    });

}

Calendar.setup ({
    inputField : "dl_from_date",
    daFormat : cal_date_format,
    button : "dl_from_date_trigger",
    singleClick : true,
    dateStr : "",
    step : 1,
    weekNumbers:false
});

Calendar.setup ({
    inputField : "dl_to_date",
    daFormat : cal_date_format,
    button : "dl_to_date_trigger",
    singleClick : true,
    dateStr : "",
    step : 1,
    weekNumbers:false
});

Calendar.setup ({
    inputField : "dl_payment_date",
    daFormat : cal_date_format,
    button : "dl_payment_date_trigger",
    singleClick : true,
    dateStr : "",
    step : 1,
    weekNumbers:false
});