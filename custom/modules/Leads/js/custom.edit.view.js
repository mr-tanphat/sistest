var currentRela      = 1;
$(document).ready(function(){
    if( $("#status").val() != 'Converted' ){
        $('#status').find('option[value=Converted]').prop('disabled', true).addClass('input_readonly');    
    }else{
        $("#status option:not(:selected)").prop('disabled', true).addClass('input_readonly'); 
    }

    removeFromValidate('EditView', 'account_name');
    //add relationship
    $('#tblLevelConfig').multifield({
        section :   '.row_tpl', // First element is template
        addTo   :   '#tbodylLevelConfig', // Append new section to position 
        btnAdd  :   '#btnAddrow', // Button Add id
        btnRemove:  '.btnRemove', // Buton remove id
    });
    // lưu levels, module, book và chuỗi json
    $('#select, .select_rela, .rela_name').live('change',function(){            
        var row = $(this).closest('.row_tpl');
        saveJsonRelationship(row); 
    });
    $('#select, .select_rela, .student_name').trigger('change');
    //Begin Save list testing
    $(".row_save").hide();
    $(".row_cancel").hide();
    $(".edit_td").click(function(){
        //bắt sự kiện click button khác thì tr đang sử dụng đóng lại
        $('#tblItemSelector tbody').find('tr').each(function(){
            $(this).closest('tr').find(".span_reading").show();
            $(this).closest('tr').find(".span_listening").show();
            $(this).closest('tr').find(".input_reading").hide();
            $(this).closest('tr').find(".input_listening").hide();
            $(this).closest('tr').find(".row_edit").show();
            $(this).closest('tr').find(".row_save").hide();
            $(this).closest('tr').find(".row_cancel").hide();

            var span_reading = $(this).closest('tr').find(".span_reading").text();
            var span_listening = $(this).closest('tr').find(".span_listening").text();
            $(this).closest('tr').find(".input_reading").val(span_reading);
            $(this).closest('tr').find(".input_listening").val(span_listening);         
        });

        $(this).closest('tr').find(".span_reading").hide();
        $(this).closest('tr').find(".span_listening").hide();
        $(this).closest('tr').find(".input_reading").show();
        $(this).closest('tr').find(".input_listening").show();
        $(this).closest('tr').find(".row_edit").hide();
        $(this).closest('tr').find(".row_save").show();
        $(this).closest('tr').find(".row_cancel").show(); 

    });

    $(".row_edit").click(function(){
        //bắt sự kiện click button khác thì tr đang sử dụng đóng lại
        $('#tblItemSelector tbody').find('tr').each(function(){
            $(this).closest('tr').find(".span_reading").show();
            $(this).closest('tr').find(".span_listening").show();
            $(this).closest('tr').find(".input_reading").hide();
            $(this).closest('tr').find(".input_listening").hide();
            $(this).closest('tr').find(".row_edit").show();
            $(this).closest('tr').find(".row_save").hide();
            $(this).closest('tr').find(".row_cancel").hide();         
        });

        $(this).closest('tr').find(".span_reading").hide();
        $(this).closest('tr').find(".span_listening").hide();
        $(this).closest('tr').find(".input_reading").show();
        $(this).closest('tr').find(".input_listening").show();
        $(this).closest('tr').find(".row_edit").hide();
        $(this).closest('tr').find(".row_save").show();
        $(this).closest('tr').find(".row_cancel").show(); 

    });

    $(".row_save").click(function(){
        var ID=$(this).closest('tr').attr('id');     
        var listening=formatNumber($(this).closest('tr').find(".input_listening").val(),num_grp_sep,dec_sep,2,2);
        var reading=formatNumber($(this).closest('tr').find(".input_reading").val(),num_grp_sep,dec_sep,2,2);

        var dataString = 'id='+ ID +'&listening='+listening+'&reading='+reading;
        if(listening >= 0 && reading >= 0){
            ajaxStatus.showStatus('Saving...'); //Sugar alert
            $.ajax({
                url: "index.php?module=Leads&action=save_testing_list&sugar_body_only=true",
                type: "POST",
                data: dataString,
                dataType: "json",
                success: function(res){            
                    if(res.success == "1"){
                        $("#"+res.id).find(".span_listening").text(res.listening);
                        $("#"+res.id).find(".span_reading").text(res.reading);
                        $("#"+res.id).find(".input_listening").val(res.listening);
                        $("#"+res.id).find(".input_reading").val(res.reading);  


                        $("#"+res.id).find(".span_listening").show();
                        $("#"+res.id).find(".span_reading").show();
                        $("#"+res.id).find(".input_listening").hide();
                        $("#"+res.id).find(".input_reading").hide(); 

                        $("#"+res.id).find(".row_save").hide(); 
                        $("#"+res.id).find(".row_cancel").hide(); 
                        $("#"+res.id).find(".row_edit").show(); 
                    }
                    ajaxStatus.hideStatus();
                },
            });
        }else{
            alert('Enter something.');
        }
    });


    $(".row_cancel").click(function(){
        //show span, hide input
        $(this).closest('tr').find(".span_reading").show();
        $(this).closest('tr').find(".span_listening").show();
        $(this).closest('tr').find(".input_reading").hide();
        $(this).closest('tr').find(".input_listening").hide();
        $(this).closest('tr').find(".row_edit").show();
        $(this).closest('tr').find(".row_save").hide();
        $(this).closest('tr').find(".row_cancel").hide();

        //get value span into value input
        var span_reading = $(this).closest('tr').find(".span_reading").text();
        var span_listening = $(this).closest('tr').find(".span_listening").text();
        $(this).closest('tr').find(".input_reading").val(span_reading);
        $(this).closest('tr').find(".input_listening").val(span_listening);
    });

    //End Save list testing...

    //Show Hide nationality
    $('input:radio[name="radio_national"]').click(function(){
        if($(this).val()== "Việt Nam"){
            $('#nationality').val("Việt Nam");
            $('#nationality').hide();
        } else {
            $('#nationality').show();
            $('#nationality').val("");
        }
    });

    // Change status

    //choose parent
    $('#btn_c_contacts_leads_1_name').removeAttr('onclick');
    $('#btn_c_contacts_leads_1_name').live('click', function(){
        open_popup("C_Contacts", 600, 400, "", true, false, {"call_back_function":"set_return_contact","form_name":"EditView","field_to_name_array":{"id":"c_contacts_leads_1c_leads_ida","name":"c_contacts_leads_1_name","email1":"Leads0emailAddress0","address":"primary_address_street","mobile_phone":"phone_mobile"}}, "single", true);  
    });
})


//function set_return of open popup 
function set_return_rela(popup_reply_data, filter) {
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
        switch (the_key)
        {
            case 'rela_name':
                currentRela.closest('td').find(".rela_name").val(val); 
                currentRela.closest('td').find(".rela_name").trigger('change');     
                break;
            case 'rela_id':
                currentRela.closest('td').find(".rela_id").val(val);      
                break;
        }
    }
}

// Show popup search student, lead
function clickChooseRela(thisButton){
    currentRela =  thisButton;
    var module = currentRela.closest('tr').find('select#select').val();
    open_popup(module, 600, 400, "", true, false, {"call_back_function":"set_return_rela","form_name":"EditView","field_to_name_array":{"id":"rela_id","name":"rela_name"}}, "single", true);
};

// Clear row relationship
function clickClearRela(thisButton){
    thisButton.closest('td').find(".rela_name").val('');
    thisButton.closest('td').find(".rela_id").val('');
}

// Make Json to handle Save relationship
function saveJsonRelationship(row){
    var json =  jQuery.parseJSON(row.find("input.jsons").val());
    if(json == null){
        json = {};
    }
    json.index      = row.index();
    json.select     = row.find('#select').val();
    json.select_rela    = row.find('.select_rela').val();

    json.rela_name  = row.find('.rela_name').val();
    json.rela_id    = row.find('.rela_id').val(); 
    var json_str = JSON.stringify(json);
    //Assign json
    row.find("input.jsons").val(json_str); 
}

//function set_return_contact of open popup 
function set_return_contact(popup_reply_data, filter) {
    var form_name = popup_reply_data.form_name;

    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');

        switch (the_key)
        {
            case 'c_contacts_leads_1_name':
                $("#c_contacts_leads_1_name").val(val);      
                break;
            case 'c_contacts_leads_1c_leads_ida':
                $("#c_contacts_leads_1c_contacts_ida").val(val);      
                break;
            case 'phone_mobile':
                $("#phone_mobile").val(val);      
                break;
            case 'Leads0emailAddress0':
                $("#Leads0emailAddress0").val(val);      
                break;
            case 'primary_address_street':
                $("#primary_address_street").val(val);      
                break;
        }
    }
}