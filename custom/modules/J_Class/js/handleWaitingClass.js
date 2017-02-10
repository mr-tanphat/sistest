var record_id = $('input[name=record]').val();
var duplicate_id = $('input[name=duplicateId]').val();
if (typeof duplicate_id == 'undefined')
    duplicate_id = '';
var ug_koc = '';
var ug_level = '';
var ug_module = '';

$(document).ready(function(){
    //    generateOption();
    $('#kind_of_course, #level').on('change',function(){
        $('#koc_id').val($('#kind_of_course option:selected').attr('koc_id'));
        generateOption();  
    });
    $('#class_type').live('change',function(){
        ajaxStatus.showStatus('Change Class Type <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
        var class_type =  $('#class_type').val();
        if(class_type == 'Normal Class'){
            window.location.href = "index.php?module=J_Class&action=EditView&return_module=J_Class&return_action=DetailView&class_type=Normal%20Class";     
        }else{
            window.location.href = "index.php?module=J_Class&action=EditView&return_module=J_Class&return_action=DetailView&class_type=Waiting%20Class";
        }
        ajaxStatus.hideStatus();
    });
    $('.studentsituations_description').live('change',function(){
        var _this = $(this);
        $.ajax({
            url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
            type: "POST",
            async: true,
            data: {
                type : 'saveStudentSituationDescription',
                studentsituation_id : _this.attr('ss_id'),
                description: _this.val(),
            },               
            success: function(res){

            },        
        });

    });
});

function handleAddWaiting(){
    open_popup($('#waiting_class_parent_type').val(),600, 400, "", true, false, {"call_back_function":"set_return_waiting","form_name":"DetailView","field_to_name_array":{"id":"id"}}, "single", true);
}

function set_return_waiting(popup_reply_data, filter){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    ajaxStatus.showStatus('Saving ...');

    var student_id  = name_to_value_array['id'];
    var parent_type = $('#waiting_class_parent_type').val();

    $.ajax({
        type: "POST",
        url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
        data:{
            type        : 'handleWaitingClass',
            student_id  : student_id,  
            class_id    : $('input[name=record]').val(), 
            parent      : parent_type,
            act         : 'addWaitingClass',
        },
        dataType: "json",
        success:function(data){
            ajaxStatus.hideStatus();
            showSubPanel('j_class_studentsituations', null, true);
            alertify.success(SUGAR.language.get('J_Class','LBL_ADD_WAITING_SUCCESS'));
        }
    });  
}
function ajaxDeleteWaitingClass(situation_id){
    alertify.confirm("Are you sure you want to remove record ?", function (e) {
        if (e) {
        ajaxStatus.showStatus('Removing...'); 
            $.ajax({
                type: "POST",
                url: "index.php?module=J_Class&action=handleAjaxJclass&sugar_body_only=true",
                data:{
                    type            : 'handleWaitingClass',
                    situation_id    : situation_id,  
                    act             : 'deleteWaitingClass',  
                },
                dataType: "json",
                success:function(data){
                    ajaxStatus.hideStatus();
                    showSubPanel('j_class_studentsituations', null, true);
                    alertify.success('Remove Successfully !');
                }
            }); 
        }
    });
}

//showing Kind Of Course
function generateOption(){
    var kind_of_course = $('#kind_of_course').val();
    var level_selected = $('#level').val();
    var module_selected = $('#modules').val();
    var objs =  $.parseJSON($('#kind_of_course :selected').attr('json'));
    //Generate options level
    if(kind_of_course != '' && kind_of_course != null){
        if (record_id == ''){
            if(kind_of_course == 'Premium'){
                $('#hours').prop('readonly',false).removeClass('input_readonly');
                $('#level').prop('disabled',false).removeClass('input_readonly');
                $('#modules').prop('disabled',false).removeClass('input_readonly');
            }
            else if((kind_of_course == 'Outing Trip' || kind_of_course == 'Cambridge' )){
                if(kind_of_course == 'Outing Trip'){
                    alert(' Example: \n     Outing trip 1 day: 8 hours');
                }
                $('#level').prop('disabled',true).addClass('input_readonly');
                $('#modules').prop('disabled',true).addClass('input_readonly');
                $('#hours').prop('readonly',false).removeClass('input_readonly');
            }
            else {
                $('#hours').prop('readonly',true).addClass('input_readonly');
                $('#level').prop('disabled',false).removeClass('input_readonly');
                $('#modules').prop('disabled',false).removeClass('input_readonly'); 
            }   
            // Clear all select list items except first one
            $('#level').find('option:gt(0)').remove();
            $.each( objs, function( key, obj ) {
                $('#level').append('<option label="'+obj.levels+'" value="'+obj.levels+'">'+obj.levels+'</option>');
            });
            $('#level').val(level_selected);

            //Generate options module
            if(level_selected != '' && level_selected != null){
                $('#modules').find('option:gt(0)').remove();
                $.each( objs, function( key, koc ) {
                    if(koc.levels == level_selected){
                        $.each( koc.modules, function( key, module ) {
                            if(module != "")
                                $('#modules').append('<option label="'+module+'" value="'+module+'">'+module+'</option>'); 
                        });
                        //If level do not have module 
                        if ($('#modules option').size() == 1){
                            $('#modules').prop('disabled',true).addClass('input_readonly');    
                        } 
                        else {
                            $('#modules').prop('disabled',false).removeClass('input_readonly'); 
                        }
                        $('#lesson_midterm_test').val(koc.midterm_test);
                        $('#lesson_final_test').val(koc.final_test);                                                    
                    }
                });
                $('#modules').val(module_selected);  
            }
        }
    }
    getClassHours();
}
function getClassHours(){
    var kind_of_course = $('#kind_of_course').val();
    var level_selected = $('#level').val();
    var module_selected = $('#modules').val();
    var objs =  $.parseJSON($('#kind_of_course :selected').attr('json'));

    if (kind_of_course == "" || level_selected == ""){
        $('#hours').val("");  
        return false;   
    }

    $.each( objs, function( key, koc ) {
        if(koc.levels == level_selected){
            if (koc.modules == "") {
                $('#hours').val(koc.hours);        
            }
            else{
                if (module_selected == "") $('#hours').val("");     
                else $('#hours').val(koc.hours);        
            }
            return false;
        }
    });
}