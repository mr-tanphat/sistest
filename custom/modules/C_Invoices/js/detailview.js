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

$(document).ready(function(){
    //Hide buttom
    if($('input#status').val()=='Cancel'){
        $('input#duplicate_button').hide();
        // $('input#create_payment').hide();
    }
    $('#bank_fee_rate').prop('readonly', true);
    $('#loan_fee_rate').prop('readonly', true);
    //Change name
    $('#duplicate_button').val('Cancel and Create new');

    //PAYMENT
    $("#card_type, #bank_fee_rate, #loan_fee_rate, #bank_name").change(calculatedPaymentMethod);

    $('#credit_info').hide();
    $('#loan_info').hide();
    $('input:radio[name="payment_method"]').click(function(){
        togglePaymentMethod(this) ;
    });

    $("#save_payment").click(function(){
        if(unformatNumber($('#payment_amount').val(),num_grp_sep,dec_sep) > 0){
            ajaxStatus.showStatus('Saving'); //Sugar alert
            $('#amount_in_words_payment').val(DocTienBangChu(unformatNumber($('#payment_amount').val(),num_grp_sep,dec_sep)));
            $('#action_save').val('InvoiceSavePayment');
            $('#record_use').val($('input[name=record]').val());  
        } else {
            alert("Please enter again !");
            $('#payment_amount').val("");
        }
    });


    $("a.payment-popup").click(function(){   
        $(".entry-payment-form").fadeIn("fast");
        //Add payment Amount
        $('input[name=payment_amount]').val(formatNumber($(this).attr('payment-amount'),num_grp_sep,dec_sep,0,0));      
        $('input[name=payment_id]').val($(this).attr('id'));
        calculatedPaymentMethod();
    });

    //POPUP
    $("#close_ct").click(function(){   
        $(".entry-payment-form").fadeOut("fast");   
    });
    
     $("#close_ct_2").click(function(){
        $(".entry-form").fadeOut("fast");     
    });
    

    $("#cancel_ct").click(function(){
        $(".entry-form").fadeOut("fast");
        $(".entry-payment-form").fadeOut("fast");   
    });
 // show pop up
    $("#invoicevoucher").click(function(){
        $(".entry-form").fadeIn("fast");    
    });

    $("#save_use").click(function(){
        $('#type_use').val('save_use');
        if(validate['configinfo_2']!='undefined'){delete validate['configinfo_2']};
        addToValidate('configinfo_2', 'invoice_num', 'phone', true,'Invoice Number' );
        addToValidate('configinfo_2', 'serial_num', 'phone', true,'Serial Number' );
        submit_config();
    });   
    $("#print_use").click(function(){
        $('#type_use').val('print_use');
        if(validate['configinfo_2']!='undefined'){delete validate['configinfo_2']};
        submit_config();
        $('#printed').prop('checked',true);
    });  
    $("#saveprint_use").click(function(){
        $('#type_use').val('saveprint_use');
        $('#printed').prop('checked',true);
        if(validate['configinfo_2']!='undefined'){delete validate['configinfo_2']};
        addToValidate('configinfo_2', 'invoice_num', 'phone', true,'Invoice Number' );
        addToValidate('configinfo_2', 'serial_num', 'phone', true,'Serial Number' );
        submit_config();
        $('#printed').prop('checked',true);
    });
});
function submit_config(){
    var _form = document.getElementById('configinfo_2');
    if(check_form('configinfo_2')){
        $('#record_use_2').val($('input[name=record]').val());
        _form.submit(); 
    }else 
        return false;
}