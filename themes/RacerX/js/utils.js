function handleCheckBox(cell){
    var cell_tbl = cell.closest('table');

    var module_name = cell.attr('module_name');
    var count 	= 0;
    var ckb 	= 0;
    //Make string selected - User str.split(",") to explorer
    var str  = '';
    cell_tbl.find('input.custom_checkbox').each(function(){
        if($(this).val() != ''){
            if(cell.attr('class') == 'checkall_custom_checkbox' && $(this).closest('tr').attr('class') != 'tr_not_in_class'){
                $(this).prop('checked',cell.is(':checked'));
            }
            if($(this).is(":checked")){
                ckb++;
                if(ckb == 1)
                    str = str + $(this).val();
                else
                    str = str + ',' + $(this).val();
            }
            count++;
        }
    });
    if(ckb != count)
        cell_tbl.find('input.checkall_custom_checkbox').prop('checked',false);
    else
        cell_tbl.find('input.checkall_custom_checkbox').prop('checked',true);

    if(ckb> 0)
        cell_tbl.find(".selectedTopSupanel").html('<input type="hidden" id="'+module_name+'_checked_str" value="'+str+'"><p style="color:red; padding:5px;">Selected: '+ckb+'</p>');
    else
        cell_tbl.find(".selectedTopSupanel").html('');
}

function checkDataLockDate(id_field_date, has_trigger, has_clear){
    var check_date_str = $('#'+id_field_date).val();
    if (has_trigger === undefined)
        has_trigger = true;

    if (has_clear === undefined)
        has_clear = true;

    if(sugar_config_lock_info == true || sugar_config_lock_info == '1'){
        if(except_lock_for_user_name != ''){
            var count_match = 0;
            var val_user_name = except_lock_for_user_name.split(',');
            $.each(val_user_name, function( index, user_name ) {
                if(user_name == current_user_name)
                    count_match++;
            });
            if(count_match > 0) return true;
        }
        if(is_admin == '1' || is_admin == true){
            return true;
        }else{
            if(check_date_str != ''){
                var input_date = SUGAR.util.DateUtils.parse(check_date_str,cal_date_format);
                var now_date = new Date();
                var splitted = sugar_config_lock_date.split("-");
                var check_date = new Date(input_date.getFullYear(), input_date.getMonth()+1, parseInt(splitted[0]), parseInt(splitted[1]));
                var suggestion = SUGAR.util.DateUtils.formatDate(  new Date(now_date.getFullYear(), now_date.getMonth(), 1) );
                //neu ngay hien tai dang thao tac sua Out > ngay lock cua thang do thi false
                if(now_date.getTime() > check_date.getTime()){
                    if(has_clear){
                        alertify.error('Date: '+check_date_str +' has been prevented by data-lock funtion. <br> Date should be greater than '+suggestion, 10000);
                        //$('#'+id_field_date).val(SUGAR.util.DateUtils.formatDate(now_date));
                        $('#'+id_field_date).val('').effect("highlight", {color: 'red'}, 2000);
                    }

                    if(has_trigger)
                        $('#'+id_field_date).trigger('change');
                    return false;
                }
                else return true;
            }
        }
    }
    else return true;
}

// Util function to fix the callOnChangeListers function
SUGAR.util.callOnChangeListers = function(field) {
    var listeners = YAHOO.util.Event.getListeners(field, 'change');
    if (listeners != null) {
        for (var i = 0; i < listeners.length; i++) {
            var l = listeners[i];
            l.fn.call(l.scope ? l.scope : this, l.obj);
        }
    }

    // Trigger jquery change event
    $(field).trigger('change');
}