$(document).ready(function(){
    $('#Default_ProductTemplates_Subpanel > tbody > tr:nth-child(5)').hide();
    $('#type_id').live('change',function(){
        if($('#type_id option:selected').text()=='Book'){
            $('#Default_ProductTemplates_Subpanel > tbody > tr:nth-child(5)').show();
        }
        else{
            $('#Default_ProductTemplates_Subpanel > tbody > tr:nth-child(5)').hide();
            $('#quantity').val('');
        }
    });
    $('#type_id').trigger('change');
});