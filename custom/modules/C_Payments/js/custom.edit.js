//Get Relationship field Value
function getRelateFiled(modulename, id, ref, fields, pop_list){
    if(modulename,id,ref,fields,pop_list != null){
        $.ajax({
            url: 'index.php?entryPoint=getRelateField',
            type:"POST", 
            data: {
                modulename : modulename,
                id : id,
                ref : ref,
                fields : fields,
                pop_list : pop_list,
            },
            success: function(res){ 
                res = $.parseJSON(res);
                if(res != null){
                    $.each(res, function(key,value) {
                        $('#'+key).val(value);
                    });    
                }
            }
        });    
    }  
}

// Overwrite set_return -> set_money_return
function set_money_return(popup_reply_data) {
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'c_invoices_c_payments_1c_invoices_ida':
                    $('#c_invoices_c_payments_1c_invoices_ida').val(val);
                    break;
                case 'c_invoices_c_payments_1_name':
                    $('#c_invoices_c_payments_1_name').val(val);
                    break;
                case 'amount':
                    $('#amount').val(formatNumber(val,num_grp_sep,dec_sep,2,2));
                    break;
                case 'contacts_c_payments_1contacts_ida':
                    $('#contacts_c_payments_1contacts_ida').val(val);
                    break;
                case 'contacts_c_payments_1_name':
                    $('#contacts_c_payments_1_name').val(val);
                    break;
            }
        }
    }
}

//Hàm tính toán số dư thanh toán.
function Calculated(){

    var remaining = unformatNumber($('#remaining').val(),num_grp_sep,dec_sep);
    var paymentAmount = unformatNumber($('#payment_amount').val(),num_grp_sep,dec_sep);
    var paymentBalance = remaining - paymentAmount;

    $('#payment_balance').val(paymentBalance).trigger('change');

    //Bo sung ham Doc tien bang chu
    $('#amount_in_words').val(DocTienBangChu(unformatNumber($('#payment_amount').val(),num_grp_sep,dec_sep)));

    //Bo Sung ham Calculate
    calculatedPaymentMethod()
}

//Show/hide payment method
function togglePaymentMethod(self){
    var payment = $(self).val();
    switch(payment) {
        case "BankTranfer":
            $('#credit_info').hide();
            $('#loan_info').hide();
            break;
        case "CreditDebitCard":
            $('#credit_info').slideDown('fast');
            $('#loan_info').hide();
            break;
        case "Cash":
            $('#credit_info').hide();
            $('#loan_info').hide();
            break;
        case "Loan":
            $('#loan_info').slideDown('fast');
            $('#credit_info').hide();
            break;    
        default:
            $('#credit_info').hide();
            $('#loan_info').hide();
    }
    calculatedPaymentMethod();
}

function tonglePaymentType(){
    switch($('#payment_type').val()) {
        case 'Extend Balance':
        case 'Penalty':
            $('#contacts_c_payments_1contacts_ida').closest('tr').show();
            $('#leads_c_payments_1leads_ida').closest('tr').hide();

            $('#payment_amount').val('0.00');
            $('#payment_amount').trigger("focusout");

            $('#contacts_c_payments_1_name, #contacts_c_payments_1contacts_ida, #leads_c_payments_1leads_ida, #leads_c_payments_1_name').val('');
            $("#contacts_c_payments_1_name_label, #contacts_c_payments_1_name").effect("highlight", {color: '#4BADF5'}, 1000);
            break;
        case 'Placement Test':
            $('#contacts_c_payments_1contacts_ida').closest('tr').hide();
            $('#leads_c_payments_1leads_ida').closest('tr').show();

            $('#payment_amount').val('0.00');
            $('#payment_amount').trigger("focusout");

            $('#contacts_c_payments_1_name, #contacts_c_payments_1contacts_ida, #leads_c_payments_1leads_ida, #leads_c_payments_1_name').val('');
            $("#leads_c_payments_1_name_label, #leads_c_payments_1_name").effect("highlight", {color: '#4BADF5'}, 1000);
            break;
        default :
            $('#leads_c_payments_1leads_ida').closest('tr').hide();
    }
}

$(function(){
    switch($('#payment_type').val()) {
        case 'Extend Balance':
            $('#c_invoices_c_payments_1c_invoices_ida').closest('tr').hide();
            break;
        default :
            $('#c_invoices_c_payments_1c_invoices_ida').closest('tr').show();
    }

    tonglePaymentType();
    $('#payment_type').change(function() {
        tonglePaymentType();
        writeDescription();
    });

    $('#payment_amount').focusout(function(){
        Calculated();
        writeDescription();
    });

    //Override button Select Contact
    $('#btn_contacts_c_payments_1_name').removeAttr('onclick');

    $('#btn_contacts_c_payments_1_name').live( "click", function() {
        open_popup("Contacts", 600, 400, "", true, false, 
            {
                "call_back_function": "set_contact_return",
                "form_name": "EditView",
                "field_to_name_array": {
                    "id": "contact_id",
                    "name": "contact_name"
                }
            }, 
            "single", 
            true
        );
    })

    // Init QS for Contact
    sqs_objects["EditView_contacts_c_payments_1_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":['Contacts'],
        "group":"and",
        "field_list":["name", "id"],
        "populate_list":["contacts_c_payments_1_name", "contacts_c_payments_1contacts_ida"],
        "required_list":"id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "writeDescription"
    };

    togglePaymentMethod();
    // Init QS for Invoice
    sqs_objects["EditView_c_invoices_c_payments_1_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":['C_Invoices'],
        "group":"and",
        "field_list":["name", "id", "amount", "balance"],
        "populate_list":["c_invoices_c_payments_1_name", "c_invoices_c_payments_1c_invoices_ida", "amount", "remaining"],
        "required_list":"c_invoices_c_payments_1c_invoices_ida",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""},{"name":"c_invoices.status","op":"equal","value":"Unpaid"}],
        "order":"name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "afterInvoice"
    };

    $('#status_info').hide();
    $('#credit_info').hide();
    $('#loan_info').hide();
    $('input:radio[name="payment_method"]').click(function(){
        togglePaymentMethod(this) ;
    });

    $("#card_type, #bank_fee_rate, #loan_fee_rate, #payment_amount").change(calculatedPaymentMethod);

    //remove dropdown option 
    if($('input[name=record]').val() == ''){
        $("#payment_type option[value='Moving in']").remove(); 
        $("#payment_type option[value='Transfer in']").remove(); 
        $("#payment_type option[value='Normal']").remove(); 
        $("#payment_type option[value='FreeBalance']").remove(); 
    }
//else{
//        $('#payment_amount').prop('readonly', true);
//    }
    $('#bank_fee_rate').prop('readonly', true);
    $('#loan_fee_rate').prop('readonly', true);
    $("#card_type, #bank_fee_rate, #loan_fee_rate, #bank_name").change(calculatedPaymentMethod); 
});

//Calculated Payment Fee
function calculatedPaymentMethod(){
    var paymentMethod = $('input[name=payment_method]:checked').val();
    var payment_amount = unformatNumber($('#payment_amount').val(),num_grp_sep,dec_sep);
    var cardType = $('#card_type').val();
    var card_rate = 0.00;
    if(cardType != '')
        card_rate = parseFloat(SUGAR.language.languages.app_list_strings['card_rate'][cardType]);


    var bankName = $('#bank_name').val(); 
    var loanRate = 0.00;
    var bankRate = 0.00;
    if(bankName != '')
    {  
        loanRate =  parseFloat(SUGAR.language.languages.app_list_strings['loan_rate'][bankName].split("|")[0]);
        bankRate =  parseFloat(SUGAR.language.languages.app_list_strings['loan_rate'][bankName].split("|")[1]);
    }   
    if(paymentMethod=='CreditDebitCard'){

        $('#card_rate').val(card_rate);
        $('#card_amount').val(formatNumber((payment_amount * card_rate) / 100,num_grp_sep,dec_sep,2,2));
    }
    if(paymentMethod=='Loan'){
        $('#bank_fee_rate').val(bankRate);
        $('#loan_fee_rate').val(loanRate);         
        $('#bank_fee_amount').val(formatNumber(bankRate*payment_amount/100,num_grp_sep,dec_sep,2,2));
        $('#loan_fee_amount').val(formatNumber(loanRate*payment_amount/100, num_grp_sep,dec_sep,2,2));
    }
}

//Override Function Set Return Popup Module Contact
function set_contact_return(popup_reply_data){
    $('#contacts_c_payments_1contacts_ida').val(popup_reply_data.name_to_value_array.contact_id);
    $('#contacts_c_payments_1_name').val(popup_reply_data.name_to_value_array.contact_name);
    writeDescription();
}

//Function Auto Add Description when refund type is Moving out, Transfer out - 13/08/2014 - by MTN
function writeDescription(){
    var des = "";
    switch($('#payment_type').val()) {
        case 'Extend Balance':
            des = $('#contacts_c_payments_1_name').val() + " extended Enrollment balance is " + $("#payment_amount").val() + " đ";
            $('#description').val(des)
            break;
        default :
            $('#description').val('');
    }
}