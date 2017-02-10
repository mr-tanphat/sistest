$(document).ready(function(){
    $('#export').click(function(){
        $("body").css({ overflow: 'hidden' });

        $('#div_change_session').dialog({
            resizable    : false,
            width        : 700,
            height       :'auto',
            modal        : true,
            visible      : true,
            position     : ['center',130],
            beforeClose: function(event, ui) {
                $("body").css({ overflow: 'inherit' });
            },
            buttons: {
                "SaveSession":{
                    click:function() {
                        var studentID = new Array();
                        var template = $('#template').val();
                        var classID = $('#classID').val();
                        
                        $('#tbl_change_session').parent().find('[name="student_id[]"]:checked').each(function()
                        {
                            studentID.push($(this).val());                            
                        });
                        
                        studentID = JSON.stringify(studentID);
                        var url = 'index.php?module=J_Class&action=exportfile&template=' + template + '&classID=' + classID + '&studentID=' + studentID + '&certificate_no='+$('#certificate_no').val();
                        window.open(url,'_blank');
                    },
                    class   : 'button primary btn_save_session',
                    text    : SUGAR.language.get('J_Class','BTN_EXPORT'),
                },
                "Cancel":{
                    click:function() {
                        $(this).dialog('close');
                    },
                    class   : 'button btn_cancel',
                    text    : SUGAR.language.get('J_Class','LBL_BTN_CANCEL'),
                },  
            },                                      
        });
    });
    
    $('#checkAll').click(function(){
        if ($(this).is(':checked')) {
            $(".check").attr("checked", true);
        } else {
            $(".check").attr("checked", false);
        }
    });
    
    $(".check").click(function(){        
        $("#checkAll").attr("checked", false);      
    });
    
    $("#template").change(function(){
        var template = $(this).val();
        var team_type = $("#team_type").val();
        if(template == 'Certificate Adult' && team_type == 'Adult' ){
          $('.certificate_no').show();  
        }else{
          $('.certificate_no').hide();  
        }
        
        $.ajax({
            type: "POST",
            url: "index.php?module=J_Class&action=showdialog&sugar_body_only=true",
            data:{'template':$("#template").val(), 'classID':$('#classID').val()} ,
            success: function(data){
                $('#tbl_change_session tbody').html(data);   
            }
        });       
    });
});