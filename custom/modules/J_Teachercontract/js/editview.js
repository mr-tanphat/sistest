$(document).ready(function(){

    if($('input[name="record"]').val()=='')
    {
        $('#contract_type').live('change', function(){
            if($('#contract_type').val()=='FT')
            {
                $('#less_non_working_hours').val('3');
                $('#working_hours_monthly').val('74'); 
            }
        });
    }

    $('#contract_type').live('change', function(){
        if($('#contract_type').val()=='PT')
        {
            $('#less_non_working_hours').val('0');
            $('#working_hours_monthly').val('0');
            $('#Default_J_Teachercontract_Subpanel > tbody > tr:nth-child(4)').hide();
        }
        else 
        {
            $('#Default_J_Teachercontract_Subpanel > tbody > tr:nth-child(4)').show();
        }
    });

    $('#contract_type').trigger('change');

    $('input[name="dayoff[]"]').live('click', function(){
        if($('input[name="dayoff[]"]:checked').length >2)
        {
            alert(SUGAR.language.translate('J_Teachercontract','LBL_ERROR'));
            return false;
        }
    });
    //add by Lam Hai 17/08/2016
    if($('input[name="record"]').val() != '')
    {      
        $('#contract_until').live('change', function(){
            checkSession($(this).closest("form").attr('id'));          
        });
        
        $('#status').live('change', function(){
            if($('#status').val() == 'Inactive')
                checkContractInactive($(this).closest("form").attr('id'));          
        });
    }
    
    if($('input[name="record"]').val() == '')
    {      
        $('#contract_date').live('change', function(){
            checkContractTime($(this).closest("form").attr('id'));          
        });
        
        $('#c_teachers_j_teachercontract_1c_teachers_ida').live('change', function(){
            checkContractTime($(this).closest("form").attr('id'));          
        });       
    }  
});

function checkSession(formID) {
    var check = true;
    var dateUntil = document.getElementById(formID).contract_until.value;
    var teacherContract = $('input[name="record"]').val(); 
    $.ajax({
        url: "index.php?module=J_Teachercontract&action=checksession&sugar_body_only=true",
        type: "POST",
        async: false,
        data:  
        {
            teacher_id : $('#c_teachers_j_teachercontract_1c_teachers_ida').val(),
            contract_until : dateUntil,
            teacher_contract : teacherContract,
            type : 'check_session',
        },
        success: function(data){
            if(data != 'false') {
                data = jQuery.parseJSON(data);
                $.each(data, function(index, tag) {  
                    alertify.error('This teacher already have session in '+ tag);
                });
                 
                check =  false;                
            } 
            else {
                check =  true;
            }    
        },        
    });
    return check;
}

function checkContractInactive(formID) {

    var date = new Date();
    var dateUntil = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
    var teacherContract = $('input[name="record"]').val(); 
    $.ajax({
        url: "index.php?module=J_Teachercontract&action=checksession&sugar_body_only=true",
        type: "POST",
        async: false,
        data:  
        {
            teacher_id : $('#c_teachers_j_teachercontract_1c_teachers_ida').val(),
            contract_until : dateUntil,
            teacher_contract : teacherContract,
            type : 'check_session',
        },
        success: function(data){
            if(data != 'false') {
                data = jQuery.parseJSON(data);
                
                $.each(data, function(index, tag) {  
                    alertify.error('This teacher already have session in '+ tag);
                }); 
                
                $('#status').val('Active');
            }
        },        
    });
}

function checkContractTime(formID)
{
    var check = true;
    var dateBegin = document.getElementById(formID).contract_date.value;
    var teacherContract = $('input[name="record"]').val(); 
    $.ajax({
        url: "index.php?module=J_Teachercontract&action=checksession&sugar_body_only=true",
        type: "POST",
        async: false,
        data:  
        {
            teacher_id : $('#c_teachers_j_teachercontract_1c_teachers_ida').val(),
            contract_begin : dateBegin,
            type : 'check_contract',
        },
        success: function(data){
            if(data == 'true') {
                alertify.error('This teacher already have contract active');
                check =  false;                
            } 
            else {
                check =  true;
            }    
        },        
    });
    return check;    
}  

function check_form(formname) {
    if (typeof (siw) != 'undefined' && siw && typeof (siw.selectingSomething) != 'undefined' && siw.selectingSomething)
    {
        return false;         
    }    
    var check = checkSession(formname);
    var checkContract = checkContractTime(formname);
    if(document.getElementById(formname).module.value == 'J_Teachercontract') {
        // console.log(checkDuplicateTest(formname));
        // return false;
        if(validate_form(formname, '') && check && checkContract) {
            //console.log(1);
            return true;
        } else {
            // console.log(0);
            return false;
        }
    } else {
        if(validate_form(formname, '')) {
            return true;
        } else {
            return false;
        }
    }   

    return false;
} 
