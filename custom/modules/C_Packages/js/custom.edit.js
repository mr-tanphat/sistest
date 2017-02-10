function isdiscount(){
    var price = unformatNumber($('#price').val(),num_grp_sep,dec_sep);
    var discount = unformatNumber($('#discount_amount').val(),num_grp_sep,dec_sep);
    var total = formatNumber(price - discount, num_grp_sep,dec_sep,0,0);

    if (total == "NaN") 
        $('#after_discount_text').text('');
    else
        $('#after_discount_text').text(total);

    //Auto Fill Payment amount
    var pays = $('#number_of_payments').val();
    if(pays == '1'){
        $('#payment_price_1').val( $('#price').val() );
        $('#payment_rate_1').val('100'); 
        $('#after_discount_1').val(total); 
    }

    if($('#isdiscount').is(':checked')){
        $('#after_discount_1,#after_discount_2,#after_discount_3,#after_discount_4,#after_discount_1_label,#after_discount_2_label,#after_discount_3_label,#after_discount_4_label,#after_discount,#discount_amount').closest('td').show();
        return true;
    }else{
        $('#after_discount_1,#after_discount_2,#after_discount_3,#after_discount_4,#after_discount_1_label,#after_discount_2_label,#after_discount_3_label,#after_discount_4_label,#after_discount,#discount_amount').closest('td').hide();
        $('#discount_amount, #after_discount_1, #after_discount_2, #after_discount_3, #after_discount_4').val('');
        return false;
    }   
}

//function show/hide payment price, rate - by MTN
function toggle_payment(){
    $pays = $('#number_of_payments').val();
    switch ($pays){
        case '2':
            $("#payment_price_2").closest("tr").show();
            $("#payment_price_3").closest("tr").hide();
            $("#payment_price_4").closest("tr").hide();
            break;
        case '3':
            $("#payment_price_2").closest("tr").show();
            $("#payment_price_3").closest("tr").show();
            $("#payment_price_4").closest("tr").hide();
            break;
        case '4':
            $("#payment_price_2").closest("tr").show();
            $("#payment_price_3").closest("tr").show();
            $("#payment_price_4").closest("tr").show();
            break;
        default:
            $("#payment_price_2").closest("tr").hide();
            $("#payment_price_3").closest("tr").hide();
            $("#payment_price_4").closest("tr").hide(); 
            break;
    } 
}
function clean_all(){
    $('#payment_price_1').val('');
    $('#payment_price_2').val('');
    $('#payment_price_3').val('');
    $('#payment_price_4').val('');
    $('#payment_rate_1').val('');
    $('#payment_rate_2').val('');
    $('#payment_rate_3').val('');
    $('#payment_rate_4').val('');
}
// Calculated rate - by MTN
function calculate_rate(){

    var price = unformatNumber($('#price').val(),num_grp_sep,dec_sep);

    var price_1 = unformatNumber($('#payment_price_1').val(),num_grp_sep,dec_sep);
    var price_2 = unformatNumber($('#payment_price_2').val(),num_grp_sep,dec_sep);
    var price_3 = unformatNumber($('#payment_price_3').val(),num_grp_sep,dec_sep);
    var price_4 = unformatNumber($('#payment_price_4').val(),num_grp_sep,dec_sep);

    var rate_1 = formatNumber((price_1 / price) * 100, num_grp_sep,dec_sep,4,4);
    var rate_2 = formatNumber((price_2 / price) * 100, num_grp_sep,dec_sep,4,4);
    var rate_3 = formatNumber((price_3 / price) * 100, num_grp_sep,dec_sep,4,4);
    var rate_4 = formatNumber((price_4 / price) * 100, num_grp_sep,dec_sep,4,4);

    //Populate
    $('#payment_rate_1').val(rate_1 == '.0000' ? '' : rate_1);
    $('#payment_rate_2').val(rate_2 == '.0000' ? '' : rate_2);
    $('#payment_rate_3').val(rate_3 == '.0000' ? '' : rate_3);
    $('#payment_rate_4').val(rate_4 == '.0000' ? '' : rate_4);
}

function calculate_price(){
    var pays = $('#number_of_payments').val();

    //Auto Fill if number of payments = 1
    if(pays == '1'){
        $('#payment_price_1').val( $('#price').val() );
        $('#payment_rate_1').val('100');   
    }else{

        var price = unformatNumber($('#price').val(),num_grp_sep,dec_sep);

        var rate_1 =  unformatNumber($('#payment_rate_1').val(),num_grp_sep,dec_sep);
        var rate_2 =  unformatNumber($('#payment_rate_2').val(),num_grp_sep,dec_sep);
        var rate_3 =  unformatNumber($('#payment_rate_3').val(),num_grp_sep,dec_sep);
        var rate_4 =  unformatNumber($('#payment_rate_4').val(),num_grp_sep,dec_sep);

        var price_1 = formatNumber(rate_1 * price / 100, num_grp_sep,dec_sep,0,0);
        var price_2 = formatNumber(rate_2 * price / 100, num_grp_sep,dec_sep,0,0);
        var price_3 = formatNumber(rate_3 * price / 100, num_grp_sep,dec_sep,0,0);
        var price_4 = formatNumber(rate_4 * price / 100, num_grp_sep,dec_sep,0,0);

        //Populate
        $('#payment_price_1').val(price_1 == '.00' ? '' : price_1);
        $('#payment_price_2').val(price_2 == '.00' ? '' : price_2);
        $('#payment_price_3').val(price_3 == '.00' ? '' : price_3);
        $('#payment_price_4').val(price_4 == '.00' ? '' : price_4);
    }
}

function validate(){
    var pays = $('#number_of_payments').val();
    switch ($pays){
        case '2':
            if(validate['EditView']!='undefined'){delete validate['EditView']};
            addToValidate('EditView', 'name', 'name', true, SUGAR.language.get('C_Packages','LBL_NAME') );
            addToValidateRange('EditView','total_hours','decimal',true,SUGAR.language.get('C_Packages','LBL_TOTAL_HOURS'),0,2000);
            addToValidate('EditView', 'interval_package', 'enum', true, SUGAR.language.get('C_Packages','LBL_INTERVAL_PACKAGE') );
            addToValidate('EditView', 'price', 'currency', true,SUGAR.language.get('C_Packages','LBL_PRICE') );
            //            addToValidate('EditView', 'start_date', 'date', true,'Apply From Date' );
            //            addToValidate('EditView', 'end_date', 'date', true,'End Date' );
            addToValidate('EditView', 'package_type', 'enum', true,'Package Type' );
            addToValidate('EditView', 'kind_of_course', 'enum', true, SUGAR.language.get('C_Packages','LBL_KIND_OF_COURSE') );
            addToValidateVerified('EditView','payment_price_1','currency',true, '');
            addToValidateVerified('EditView','payment_price_2','currency',true, '');
            break;
        case '3':
            if(validate['EditView']!='undefined'){delete validate['EditView']};
            addToValidate('EditView', 'name', 'name', true, SUGAR.language.get('C_Packages','LBL_NAME') );
            addToValidateRange('EditView','total_hours','decimal',true,SUGAR.language.get('C_Packages','LBL_TOTAL_HOURS'),0,2000);
            addToValidate('EditView', 'interval_package', 'enum', true, SUGAR.language.get('C_Packages','LBL_INTERVAL_PACKAGE') );
            addToValidate('EditView', 'price', 'currency', true,SUGAR.language.get('C_Packages','LBL_PRICE') );
            //            addToValidate('EditView', 'start_date', 'date', true,'Apply From Date' );
            //            addToValidate('EditView', 'end_date', 'date', true,'End Date' );
            addToValidate('EditView', 'package_type', 'enum', true,'Package Type' );
            addToValidate('EditView', 'kind_of_course', 'enum', true, SUGAR.language.get('C_Packages','LBL_KIND_OF_COURSE') );
            addToValidateVerified('EditView','payment_price_1','currency',true, '');
            addToValidateVerified('EditView','payment_price_2','currency',true, '');
            addToValidateVerified('EditView','payment_price_3','currency',true, '');
            break;
        case '4':
            if(validate['EditView']!='undefined'){delete validate['EditView']};
            addToValidate('EditView', 'name', 'name', true, SUGAR.language.get('C_Packages','LBL_NAME') );
            addToValidateRange('EditView','total_hours','decimal',true,SUGAR.language.get('C_Packages','LBL_TOTAL_HOURS'),0,2000);
            addToValidate('EditView', 'interval_package', 'enum', true, SUGAR.language.get('C_Packages','LBL_INTERVAL_PACKAGE') );
            addToValidate('EditView', 'price', 'currency', true,SUGAR.language.get('C_Packages','LBL_PRICE') );
            //            addToValidate('EditView', 'start_date', 'date', true,'Apply From Date' );
            //            addToValidate('EditView', 'end_date', 'date', true,'End Date' );
            addToValidate('EditView', 'package_type', 'enum', true,'Package Type' );
            addToValidate('EditView', 'kind_of_course', 'enum', true, SUGAR.language.get('C_Packages','LBL_KIND_OF_COURSE') );
            addToValidateVerified('EditView','payment_price_1','currency',true, '');
            addToValidateVerified('EditView','payment_price_2','currency',true, '');
            addToValidateVerified('EditView','payment_price_3','currency',true, '');
            addToValidateVerified('EditView','payment_price_4','currency',true, '');
            break;
        default:
            if(validate['EditView']!='undefined'){delete validate['EditView']};
            addToValidate('EditView', 'name', 'name', true, SUGAR.language.get('C_Packages','LBL_NAME') );
            addToValidateRange('EditView','total_hours','decimal',true,SUGAR.language.get('C_Packages','LBL_TOTAL_HOURS'),0,2000);
            addToValidate('EditView', 'interval_package', 'enum', true, SUGAR.language.get('C_Packages','LBL_INTERVAL_PACKAGE') );
            addToValidate('EditView', 'price', 'currency', true,SUGAR.language.get('C_Packages','LBL_PRICE') );
            //            addToValidate('EditView', 'start_date', 'date', true,'Apply From Date' );
            //            addToValidate('EditView', 'end_date', 'date', true,'End Date' );
            addToValidate('EditView', 'package_type', 'enum', true,'Package Type' );
            addToValidate('EditView', 'kind_of_course', 'enum', true, SUGAR.language.get('C_Packages','LBL_KIND_OF_COURSE') );
            addToValidateVerified('EditView','payment_price_1','currency',true, '');
            break;
    }

    return check_total() && check_form('EditView');
}

function check_total(){
    if(isdiscount()){
        var pays = $('#number_of_payments').val();
        var price = unformatNumber($('#price').val(),num_grp_sep,dec_sep);
        var discount_amount = unformatNumber($('#discount_amount').val(),num_grp_sep,dec_sep);

        var discount = price - discount_amount;

        var price_1 = unformatNumber($('#payment_price_1').val(),num_grp_sep,dec_sep);
        var price_2 = unformatNumber($('#payment_price_2').val(),num_grp_sep,dec_sep);
        var price_3 = unformatNumber($('#payment_price_3').val(),num_grp_sep,dec_sep);
        var price_4 = unformatNumber($('#payment_price_4').val(),num_grp_sep,dec_sep);

        var discount_1 = unformatNumber($('#after_discount_1').val(),num_grp_sep,dec_sep);
        var discount_2 = unformatNumber($('#after_discount_2').val(),num_grp_sep,dec_sep);
        var discount_3 = unformatNumber($('#after_discount_3').val(),num_grp_sep,dec_sep);
        var discount_4 = unformatNumber($('#after_discount_4').val(),num_grp_sep,dec_sep);

        switch ($pays){
            case '1':
                if( price_1 != price || discount_1 != discount || discount_1 > price_1){
                    $("#payment_price_1,#after_discount_1").effect("highlight", {color: '#ff9933'}, 1000);
                    return false;  
                } 
                break;
            case '2':
                if((price_2 + price_1) != price || (discount_1 + discount_2) != discount || discount_1 > price_1 || discount_2 > price_2){
                    $("#payment_price_1,#after_discount_1,#payment_price_2,#after_discount_2").effect("highlight", {color: '#ff9933'}, 1000);
                    return false;
                }
                break;
            case '3':
                if((price_3 + price_2 + price_1) != price || (discount_1 + discount_2 + discount_3) != discount || discount_1 > price_1 || discount_2 > price_2 || discount_3 > price_3){
                    $("#payment_price_1,#after_discount_1,#payment_price_2,#after_discount_2,#payment_price_3,#after_discount_3").effect("highlight", {color: '#ff9933'}, 1000);
                    return false;
                }
                break;
            case '4':
                if((price_2 + price_1 + price_3 + price_4) != price || (discount_1 + discount_2 + discount_3 + discount_4) != discount || discount_1 > price_1 || discount_2 > price_2 || discount_3 > price_3 || discount_4 > price_4 ){
                    $("#payment_price_1,#after_discount_1,#payment_price_2,#after_discount_2,#payment_price_3,#after_discount_3,#payment_price_4,#after_discount_4").effect("highlight", {color: '#ff9933'}, 1000);
                    return false;
                }
                break;
        }   
    }
    return true;  
}


$(function(){

    toggle_payment();
    $('#number_of_payments').change(function (){
        toggle_payment();
        clean_all();  
    });
    isdiscount();
    $('#isdiscount').change(isdiscount);
    $('#discount_amount, #price').live('blur',isdiscount);

    $('#name').live('change',function(){
        var str = $(this).val();
        if(str.search("Save&Learn") > -1 || str.search("Save&") > -1 || str.search("Learn") > -1){
            $("#package_type option[value='Save&Learn']").attr('selected', 'selected');
            $('#package_type').effect("highlight", {color: '#ff9933'}, 3000);    
        }

    });


    $('#payment_price_1, #payment_price_2, #payment_price_3, #payment_price_4').blur(calculate_rate);  
    //    $('#payment_rate_1, #payment_rate_2, #payment_rate_3, #payment_rate_4, #price').blur(calculate_price);

    //Remove event save
    $('#SAVE_HEADER, #SAVE_FOOTER').removeAttr('onclick');
    $('#SAVE_HEADER, #SAVE_FOOTER').click(function(){
        var _form = document.getElementById('EditView');
        _form.action.value='Save'; 
        if(validate())
            SUGAR.ajaxUI.submitForm(_form);
        return false;
    });

    $("select[name=kind_of_course]").select2({placeholder: "--Select one--",allowClear: true});   
});