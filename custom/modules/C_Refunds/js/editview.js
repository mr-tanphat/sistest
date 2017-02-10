//Change amount to words - By Lap Nguyen
$( document ).ready(function(){
    $("#refund_type option[value='Transfer Enrollment']").remove();
    
    $("#refund_type option[value='Normal']").text('Refund').attr('label','Refund');
    $("#refund_type option[value='Moving out']").text('Move').attr('label','Move');;
    $("#refund_type option[value='Transfer out']").text('Transfer').attr('label','Transfer');;

    $('#refund_amount').live('blur', function() {
        caculated_refund();
    });

    toggleRefundType();
    $('#refund_type').change(toggleRefundType);
    ajax_get_student();

    //Remove event Onclick button contacts_c_refunds
    $('#btn_contacts_c_refunds_1_name').removeAttr('onclick');
    $('#btn_contacts_c_refunds_1_name').live('click',function(){
        open_popup("Contacts", 600, 400, "", true, false, {
            "call_back_function": "set_return_student_1",
            "form_name": "EditView",
            "field_to_name_array": {
                "id": "contacts_c_refunds_1contacts_ida",
                "name": "contacts_c_refunds_1_name",
            }
            },
            "single",
            true
        );
    });

    sqs_objects["EditView_contacts_c_refunds_1_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":['Contacts'],
        "group":"or",
        "field_list":["name", "id"],
        "populate_list":["contacts_c_refunds_1_name", "contacts_c_refunds_1contacts_ida"],
        "required_list":"parent_id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "ajax_get_student"
    };

    $('#btn_select_student').live('click',function(){
        open_popup("Contacts", 600, 400, "", true, false, {
            "call_back_function": "set_return",
            "form_name": "EditView",
            "field_to_name_array": {
                "id": "student_id",
                "name": "student_name",
            }
            },
            "single",
            true
        );
    });

    //Remove event save
    $('#SAVE_HEADER, #SAVE_FOOTER').removeAttr('onclick');
    $('#SAVE_HEADER, #SAVE_FOOTER').click(function(){
        var _form = document.getElementById('EditView');
        _form.action.value='Save'; 
        if(validate())
            SUGAR.ajaxUI.submitForm(_form);
        return false;
    }); 
   
    $('#payment_list').change(Calculated); 
});

function toggleRefundType(){
    $('#center_name, #student_name, #student_id').val('');
    switch($('#refund_type').val()) {
        case 'Moving out':
            $('#student').hide();
            $('#refond_method').parent().closest('tr').hide();
            $("input[name=refond_method][value=Other]").prop('checked', true);
            $('#center').show();
            $('#student').closest('td').prev().text(SUGAR.language.get('C_Refunds', 'LBL_CENTER_NAME')+ ":");
            //            $('.balance_label').show();
            break;
        case 'Transfer out':
            $('#student').show();
            $('#center').hide();
            $('#refond_method').parent().closest('tr').hide();
            $("input[name=refond_method][value=Other]").prop('checked', true);
            $('#student').closest('td').prev().text(SUGAR.language.get('C_Refunds', 'LBL_STUDENT_NAME')+ ":");
            //            $('.balance_label').show();
            break;
        default :
            $('#student').hide();
            $('#center').hide();
            $('#refond_method').parent().closest('tr').show();
            $('#student').closest('td').prev().text(''); 
        //            $('.balance_label').hide();
    }
}

function set_return_student_1(popup_reply_data) {

    //Get Data from Popup
    contact_id = popup_reply_data.name_to_value_array.contacts_c_refunds_1contacts_ida;
    contact_name = popup_reply_data.name_to_value_array.contacts_c_refunds_1_name;
    //Add value into input text, span...
    $('#contacts_c_refunds_1contacts_ida').val(contact_id);
    $('#contacts_c_refunds_1_name').val(contact_name);

    ajax_get_student();
}

function validate(){
    var pays = $('#refund_type').val();
    switch (pays){
        case 'Moving out':
            if(validate['EditView']!='undefined'){delete validate['EditView']};
            addToValidateVerified('EditView','refund_amount','currency',true, SUGAR.language.get('C_Refunds','LBL_REFUND_AMOUNT'));
            addToValidateVerified('EditView','description','text',true, SUGAR.language.get('C_Refunds','LBL_DESCRIPTION'));
            addToValidateBinaryDependency('EditView', 'contacts_c_refunds_1_name', 'alpha', true,'No match for field: Student', 'contacts_c_refunds_1contacts_ida' );
            addToValidate('EditView', 'center_name', 'enum', true, SUGAR.language.get('C_Refunds','LBL_CENTER_NAME') );
//            if($('#center_id').val() == $('#current_team_id').val()){
//                alert('Can not move student to same center !');
//                return false; 
//            }
            break;
        case 'Transfer out':
            if(validate['EditView']!='undefined'){delete validate['EditView']};
            addToValidateVerified('EditView','refund_amount','currency',true, SUGAR.language.get('C_Refunds','LBL_REFUND_AMOUNT'));
            addToValidateVerified('EditView','description','text',true, SUGAR.language.get('C_Refunds','LBL_DESCRIPTION'));
            addToValidateBinaryDependency('EditView', 'student_name', 'alpha', true,'No match for field: Student', 'student_id' );
            addToValidateBinaryDependency('EditView', 'contacts_c_refunds_1_name', 'alpha', true,'No match for field: Student', 'contacts_c_refunds_1contacts_ida' );
            if($('#student_id').val() == $('#contacts_c_refunds_1contacts_ida').val()){
                alert('Can not tranfer to current student !');
                return false; 
            }
            break;
        default:
            if(validate['EditView']!='undefined'){delete validate['EditView']};
            addToValidateVerified('EditView','refund_amount','currency',true, SUGAR.language.get('C_Refunds','LBL_REFUND_AMOUNT'));
            addToValidateVerified('EditView','description','text',true, SUGAR.language.get('C_Refunds','LBL_DESCRIPTION'));
            addToValidateBinaryDependency('EditView', 'contacts_c_refunds_1_name', 'alpha', false,'No match for field: Student', 'contacts_c_refunds_1contacts_ida' );
            break; 
    }
    return check_form('EditView');
}

function caculated_refund(){
    var amount 			= unformatNumber($('#refund_amount').val(),num_grp_sep,dec_sep);
    var ending_balance 	= unformatNumber($('#ending_balance').val(),num_grp_sep,dec_sep);
    if(amount > ending_balance){
        alert('Invalid Amount !!');
        $('#refund_amount').val('0');
        return false; 
    }
}

function check_form(formname) {
    if (typeof (siw) != 'undefined' && siw && typeof (siw.selectingSomething) != 'undefined' && siw.selectingSomething)
        return false;
        var refund_amount = unformatNumber($('#refund_amount').val(),num_grp_sep,dec_sep);
        var ending_balance = unformatNumber($('#ending_balance').val(),num_grp_sep,dec_sep);
        var flag = true;
        if(refund_amount <= 0 || refund_amount > ending_balance){
			flag = false;
			$('#refund_amount').effect("highlight", {color: '#ff0000'}, 3000);
        }
        	
    return validate_form(formname, '') && flag;
}

function ajax_get_student(){
    var student_id = $('#contacts_c_refunds_1contacts_ida').val();
    $("#center_name option").each(function(){
        $(this).show();
    });
    if(student_id != ''){
        ajaxStatus.showStatus('Loading <img src="custom/include/images/dots32.gif" align="absmiddle" width="32">');
        $.ajax({
            url: "index.php?module=C_Refunds&action=ajax_get_student&sugar_body_only=true",
            type: "POST",
            async: true,
            data:  
            {
                student_id: student_id,
            },
            dataType: "json",
            success: function(data){           
                if(data.success == "1"){
                    $('#ending_balance').val(data.ending_balance).effect("highlight", {color: 'red'}, 1000);
                    $('#current_team_id').val(data.current_team_id);
                    $('#free_balance_select').html(data.html);
                    Calculated();
                }
                ajaxStatus.hideStatus();  
            },        
        }); 
    }
}

function Calculated(){
    $('#refund_amount').val($('#payment_list').find(":selected").attr('amount'));
}