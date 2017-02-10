$(document).ready(function(){
    var record_id = $('input[name=record]').val();

    $('#tblLevelConfig').multifield({
        section :   '.row_tpl', // First element is template
        addTo   :   '#tbodylLevelConfig', // Append new section to position 
        btnAdd  :   '#btnAddrow', // Button Add id
        btnRemove:  '.btnRemove', // Buton remove id
    });   

    $('#kind_of_course').on('change',function(){
        $('#name').val($(this).val()); 
    });

    $('.levels, .modules, .book_name, .hours, .test_1, .final_test').live('change',function(){            
        var row = $(this).closest('.row_tpl');
        saveJson(row); 
    });

    /*Comment by Tung Bui - 24/11/2015
    //xóa dòng chọn sách
    //$('.btn_clr_book').live('click',function(){            
    //        var index = $(this).closest('tbody').find("tr:last").index();
    //        if(index>1){
    //            $(this).closest('tr').remove(); 
    //        }
    //    });

    // thêm dòng mới để chọn sách
    //$('#addBook').live('click',function(){
    //        var index = $(this).closest('tbody').find("tr:last").index();
    //        if(index<max_book_name){
    //            $(this).closest('tbody').append($("#tblBook tfoot").html()); 
    //        } 
    //    });
    */


});

// Lưu json để đưa xuống database
function saveJson(row){
    json = {};
    json.levels     = row.find('.levels').val();
    json.modules    = row.find('.modules').val();  
    json.hours      = row.find('.hours').val();
    json.test_1     = row.find('.test_1').val();
    json.test_2     = row.find('.test_2').val();
    json.final_test = row.find('.final_test').val();
    var json_str    = JSON.stringify(json);
    //Assign json
    row.find("input.jsons").val(json_str); 
}

//Overwrite check_form to validate                              
function check_form(formname) {
    //Validate level config
    var validateConfig = true;
    $('.hours,.final_test').each(function () {
        if ($(this).val() == "" && $(this).closest("tr").is(":visible")){
            $(this).effect("highlight", {color: '#FF0000'}, 2000);      
            validateConfig = false;
        }
    });
    
    return validate_form(formname, '') && validateConfig; 
}

/* Comment by Tung Bui - 24/11/2015
//function set_return of open popup 
function set_return_book(popup_reply_data, filter) {
var form_name = popup_reply_data.form_name;

var name_to_value_array = popup_reply_data.name_to_value_array;
for (var the_key in name_to_value_array) {
var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');

switch (the_key)
{
case 'book_name':
currentBook.parent().find(".book_name").val(val);  
currentBook.parent().find(".book_name").trigger('change');
break;
case 'book_id':
currentBook.parent().find(".book_id").val(val);
break;
}
}

}

// Show popup search student
function clickChooseBook(thisButton){
currentBook =  thisButton;
open_popup('ProductTemplates', 600, 400, "", true, false, {"call_back_function":"set_return_book","form_name":"EditView","field_to_name_array":{"id":"book_id","name":"book_name"}}, "single", true);
};
*/

