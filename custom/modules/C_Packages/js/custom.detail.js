function toggle_payment(){
    var pays = $('#number_of_payments').val();
    switch (pays){
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

$(document).ready(function() {
    toggle_payment();
});