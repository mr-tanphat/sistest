$(document).ready(function(){
    $('.choose_team').change(function() {
    }).multipleSelect({
        width: '300px'
    });
   //  var _formname = 
    $('select#year_targetconfig_list').select2({minimumResultsForSearch: Infinity, width: '100px'});
   // $('#contentTable').css("background-color", "white");
    //require choose team
    addToValidate('TargetConfig', 'choose_team', 'multiselect', true, SUGAR.language.get('J_Targetconfig','LBL_MSG'));
    //bắt sự kiện thực hiện click filter
    $('#ns_filter').live('click', function(){
        //Kiểm tra chọn team
        if(check_form('TargetConfig')) {
            $(".loading").html('<img src="custom/include/images/loader.gif" align="absmiddle" width="16">');
            $('#years_choose').val($('#year_targetconfig_list').val());
            $('.total').val('');
            $("#tbl_result>tbody>tr").remove();  
            $('#result').show();  
            // ajax load data cũ
            $.ajax({
                url: 'index.php?module=J_Targetconfig&action=ajaxDisplay&sugar_body_only=true',
                type: 'POST',
                data: {
                    choose_teams:$('#choose_team').val(),
                    year:$('#year_targetconfig_list').val(),
                    type:$('#target_type').val(),
                }, 
                async: "false",    
                success: function(data) { 
                    $('#result').append(data);
                     $('.input_set').width(65) ;
                    //add số thứ tự
                    addNo(); 
                    
                    $(".loading").html('');
                    $("#choose_team").multipleSelect("disable");
                    $("#year_targetconfig_list").prop("disabled", true);
                    $('#ns_filter').prop('disabled', true); 

                },
            });  
        }
    });

    //button clear click event
    $('#ns_clear').live('click',function(){
        $("#choose_team").multipleSelect("enable");
        $("#year_targetconfig_list").prop("disabled", false);
        $('#ns_filter').prop('disabled', false);
        $("#result_tbl").remove();  
        jQuery('#choose_team :selected').attr('selected', '');
    });
    $('#nsSave').live('click', function(){
        saveNewSale();
    });
});


function addNo(){
    $('#tbl_result tr').each(function(index,element){
        if(index>=1){
            $(element).find('td:first').text(index);
        }
        if(index%2!=0){
            $(element).css("background-color", "#E2E4FF");
        }
    })
}

function saveNewSale(){
    ajaxStatus.showStatus('Processing...');
    $.ajax({
        url: 'index.php?module=J_Targetconfig&action=saveTarget&sugar_body_only=true',
        type: 'POST',
        dataType: 'json',
        data: $('#TargetConfig').serialize(),     
        success: function(data) {//kiem tra data   
            ajaxStatus.hideStatus();
            ajaxStatus.showStatus('Save Done!');
            ajaxStatus.hideStatus();
        },
    });
}