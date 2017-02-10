
$( document ).ready(function(){
    //Hide Student, Center Fields
    switch($('#refund_type').val()) {
        case 'Moving out':
            $('#student_name').closest("td").prev().text(SUGAR.language.get('C_Refunds', 'LBL_CENTER_NAME') + ":");
            break;
        case 'Transfer out':
            $('#student_name').closest("td").prev().text(SUGAR.language.get('C_Refunds', 'LBL_STUDENT_NAME') + ":");
            $('#center_name').hide();
            break;
        default :
            $('#student_name').closest("td").prev().text('');
    } 

});