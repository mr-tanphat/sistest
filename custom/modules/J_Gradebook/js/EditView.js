//add by Lam Hai 22/07/2016
var adultKOC = {
    'Pronunciation' : true,
    'GE' : true,
    'BE' : true,
    //'IELTS' : true,
    'Toeic' : true,
    // 'Kindy' : true,
}
var newAdultKOC = {
    'Flexi' : true,
    'Premium' : true,
    'Access'  : true,
}
//function check form before submit
function check_form(formname) {
    if (typeof (siw) != 'undefined' && siw && typeof (siw.selectingSomething) != 'undefined' && siw.selectingSomething)
    {
        return false;
    }

    if(document.getElementById(formname).module.value == 'J_Gradebook') {
        // console.log(checkDuplicateTest(formname));
        // return false;
        if(validate_form(formname, '') && checkDuplicateTest(formname)) {
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

function checkDuplicateTest(from_id){
    //  debugger;
    ajaxStatus.showStatus('Proccessing...');
    var classID = document.getElementById(from_id).j_class_j_gradebook_1j_class_ida.value;
    var type = document.getElementById(from_id).type.value;
    var gradebook_id = document.getElementById(from_id).record.value;

    var check = false;
    jQuery.ajax({
        url: "index.php?module=J_Gradebook&sugar_body_only=true&action=ajaxGradebook",
        type: "POST",
        async: false,
        data:{
            process_type: "checkDuplicateTest",
            gradebook_id: gradebook_id,
            class_id: classID,
            type: type,
        },
        success: function(data){
            ajaxStatus.hideStatus();
            if(data) {
                alertify.error('Class and Type of the Gradebook already exists');
                check =  false;
            } else {
                check =  true;
            }
        },
        error: function(){
            ajaxStatus.hideStatus();
            alertify.error("There are errors. Please try again!");
            check = false;
        },
    });
    return check;
}

function getTestByKOC() {
    var koc = $("#kind_of_course").val();
    if (adultKOC[koc]) {
        $("select#type option[value='Test 1']").text('Test');
        $("select#type option[value='Test 1']").attr('label','Test');
        $("select#type option[value='Test 2']").hide();
        $("select#type option[value='Test 3']").hide();
    } else {

        $("select#type option[value='Test 1']").text('Test 1');
        $("select#type option[value='Test 1']").attr('label','Test 1');
        $("select#type option[value='Test 2']").show();
        $("select#type option[value='Test 3']").show();
    }
}

$(document).ready(function(){

    getTestByKOC();
    //var module = $("input[name='module']")
    if($('#j_class_j_gradebook_1j_class_ida').closest("form").find("#status").val() == 'Approved') {
        $("#type").closest("td").append("<span>" + $("#type option[value='" + $("#type").val() + "']").text() + "</span>");
        $("#type").hide();
        // $("#j_class_j_gradebook_1_name").closest("td").append("<span>" + $("#j_class_j_gradebook_1_name").val() + "</span>");
        // $("#j_class_j_gradebook_1_name").hide();
        //$("#btn_clr_j_class_j_gradebook_1_name").remove();
        // $("#btn_j_class_j_gradebook_1_name").remove();
    }
    if($("input[name='module']").val() != 'J_Gradebook') {
        $("#j_class_j_gradebook_1_name").closest("td").append("<span>" + $("#j_class_j_gradebook_1_name").val() + "</span>");
        $("#j_class_j_gradebook_1_name").hide();
        $("#btn_clr_j_class_j_gradebook_1_name").remove();
        $("#btn_j_class_j_gradebook_1_name").remove();
    }
    $('#type').live('change',function() {
        checkDuplicateTest($(this).closest("form").attr('id'));
    });

    $('#j_class_j_gradebook_1j_class_ida').live('change',function() {
        getTestByKOC();
        checkDuplicateTest($(this).closest("form").attr('id'));
    });

    if($('input[name=record]').val()  != ''){
        $('#btn_j_class_j_gradebook_1_name, #btn_clr_j_class_j_gradebook_1_name').prop('disabled',true);
        $('#j_class_j_gradebook_1_name').prop('readonly',true).addClass('input_readonly');

    }
});
//end Lam Hai