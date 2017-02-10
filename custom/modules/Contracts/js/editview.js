$(document).ready(function() {
    // Init QS for package
    sqs_objects["EditView_account_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":['Accounts'],
        "group":"or",
        "field_list":["name", "id", "phone_office", "tax_code", "phone_fax", "bank_name", "bank_number", "billing_address_street"],
        "populate_list":["account_name", "account_id", "account_phone", "account_tax_code", "account_fax", "account_bank_name", "account_bank_number", "account_address"],
        "required_list":"id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"name",
        "limit":"30",
        "no_match_text":"No Match",
        "form":"EditView",
        "method":"query",
    };
    enableQS(true);

        $('#total_contract_value, #total_student').live('blur',function(){
        var total_contract_value = Numeric.parse($('#total_contract_value').val());
        var total_student        = $('#total_student').val();
        var amount_per_student   = (total_contract_value / total_student);
        $('#amount_per_student').val(Numeric.toInt(amount_per_student));
    });

    var status = $('#status').val();
    if(status == 'signed' || status == 'closed'){
        $('#total_contract_value, #total_student, #customer_signed_date, #study_duration, #account_name').addClass('input_readonly').prop('readonly', true);
        $('#customer_signed_date_trigger').hide();
        $('#btn_account_name, #btn_clr_account_name').prop('disabled', true);
        var pmd_amount = [
            Numeric.parse($('#payment_amount_1').val()),
            Numeric.parse($('#payment_amount_2').val()),
            Numeric.parse($('#payment_amount_3').val()),
            Numeric.parse($('#payment_amount_4').val()),
            Numeric.parse($('#payment_amount_5').val()),
        ];
        $.each(pmd_amount, function( index, value ) {
            if(value > 0){
                var indexx = index + 1;
                $('#payment_date_'+indexx+', #invoice_no_'+indexx+', #payment_amount_'+indexx).addClass('input_readonly').prop('readonly', true);
                $('#payment_date_'+indexx+'_trigger').hide();
            }
        });
    }
});

//Overwrite check_form to validate
function check_form(formname) {
    //Validate sum amount of split payments
    var pmd_amount = [
        Numeric.parse($('#payment_amount_1').val()),
        Numeric.parse($('#payment_amount_2').val()),
        Numeric.parse($('#payment_amount_3').val()),
        Numeric.parse($('#payment_amount_4').val()),
        Numeric.parse($('#payment_amount_5').val()),
    ];
    var total_contract_value    = Numeric.parse($('#total_contract_value').val());
    var total_paid  = 0;
    var count_err   = 0;

    //Checking mission required
    $.each(pmd_amount, function( index, value ) {
        if(value > 0){
            total_paid            += value;

            var indexx        = index + 1;
            var pm_date       = $('#payment_date_'+indexx).val();
            var pm_invoice    = $('#invoice_no_'+indexx).val();
            if(pm_date == '' || pm_invoice == ''){
                alertify.error('Missing required fields !');
                $('#payment_date_'+indexx+', #invoice_no_'+indexx).effect("highlight", {color: '#FF0000'}, 3000);
                count_err++;
            }
        }
    });

    //Check total contract
    if(total_paid > total_contract_value || total_paid < 0){
        alertify.error('Invalid Payments Amount. Total Payment Amount should be equal Total Contract Value');
        count_err++;
    }

    var result = validate_form(formname, '');

    if(result && count_err == 0){
        ajaxStatus.showStatus('Saving...');
        return true;
    }else return false;

}