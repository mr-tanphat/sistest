var record_id       = $('input[name=record]').val();
var student_id      = $('#contacts_j_payment_1contacts_ida').val();
var payment_type_begin    = $('#payment_type').val();
var book_index      = 1;
var lock_coursefee = false;
var aims_id         = $('input[name=aims_id]').val();
$(document).ready(function() {

    $('#table_sponsor').multifield({
        section :   '.row_tpl_sponsor', // First element is template
        addTo   :   '#tbodysponsor', // Append new section to position
        btnAdd  :   '#btnAddSponsor', // Button Add id
        btnRemove:  '.btnRemoveSponsor', // Buton remove id
    });
    // FIELD STUDENT
    // Đổi type input SAVE thành button
    changeTypeInputSubmit($("#SAVE_HEADER"));
    changeTypeInputSubmit($("#SAVE_FOOTER"));
    generateStudentSelector();
    addToValidate('EditView', 'contacts_j_payment_1contacts_ida', 'varchar', true,'Student' );

    // removeFromValidate('EditView','description');
    //Open Popup
    $('#btn_select_student').click(function(){
        open_popup('Contacts', 600, 400, "", true, false, {"call_back_function":"set_contact_return","form_name":"EditView","field_to_name_array":{"id":"contacts_j_payment_1contacts_ida","name":"name","phone_mobile":"phone_mobile","birthdate":"birthdate"}}, "single", true);
    });

    $('#btn_clr_select_student').click(function(){
        $('.filter-option,.pull-left').text('');
        $("#contacts_j_payment_1contacts_ida").val('');
        $('input#json_student_info').val('');
        $('#tbodypayment').html("");
        $('#student_picker').html('');
        $('#student_picker').selectpicker("refresh");
        showDialogStudent();
    });

    $('#student_picker').live('change',function(){
        $('#contacts_j_payment_1contacts_ida').val($(this).val());
        var stuText = $("#student_picker option:selected").attr("data-subtext");
        if(stuText.search("Lead")!= -1){
            $('#lead_id').val($(this).val());
        }
        else $('#lead_id').val("");
        ajaxGetStudentInfo(true);
    });

    $('#eye_dialog_123').live('click',function(){
        showDialogStudent(true);
    });

    //FIELD DISCOUNT AND GET DISCOUNT
    $('#btn_get_discount').live('click',function(){
        $("body").css({ overflow: 'hidden' });
        reloadDiscount();
        showDialogDiscount();
        checkAvailableAllDiscount();
        calDiscount();
    });
    $('#btn_add_sponsor').live('click',function(){
        $("body").css({ overflow: 'hidden' });
        calSponsor();
        showDialogSponsor();
    });
    //Click table rows to select checkbox
    $('#table_discount tr').click(function(event) {
        if ($(this).hasClass("locked")) return;
        if (event.target.type !== 'checkbox' && event.target.type !== 'select-one' && $(this).find(".dis_name").text() != 'Apollo Reward')
            {$(':checkbox', this).trigger('click');}
    });
    $('.dis_check, #discount_partnership, #discount_reward').live('change',function(){
        checkAvailableDiscount($(this));
        calDiscount();

    });
    //Live Change Course Fee
    $('#coursefee').live('change',function(){
        var tuition_hours       = Numeric.parse($('#tuition_hours').val());
        var tuition_fee         = Numeric.toInt(calCourseFee(tuition_hours));
        $('#tuition_fee').val(tuition_fee);
        caculated();
        submitSponsor();
        submitDiscount();
        caculated();
    });
    //HANDLE ENROLLMENT
    if(payment_type_begin == 'Enrollment'){
        addToValidate('EditView', 'classes', 'multienum', true,'Class' );
        addToValidate('EditView', 'j_coursefee_j_payment_1j_coursefee_ida', 'enum', true,'Course Fee' );
        generateClassMultiSelect();

        $('#start_study, #end_study').on('change',function(){
            if(!checkDataLockDate($(this).attr('id'),false))
                return ;

            validateStart();
            validateEnd();

            //Kiểm tra ngày được chọn có nằm trong lịch không
            rs2 = isInSchedule($(this).val());
            if(!rs2) {
                $(this).val('').effect("highlight", {color: 'red'}, 1000);
                return ;
            }

            calSession(true);
        });

        $('#payment_date').on('change',function(){
            if(!checkDataLockDate($(this).attr('id'),false))
                return ;
            var outstanding_list      = $('input[name=outstanding_list]').val();
            if(!isEmpty(outstanding_list) && !$.isEmptyObject($.parseJSON(outstanding_list))){
                ajaxGetStudentInfo(false);
                outstandingChecking($('#classes').val(), true);
            }
        });

        if(record_id != ''){//In Case edit Enrollment - thong bao nhap lai ngay Start - End
            $('#start_study, #end_study').effect("highlight", {color: 'red'}, 2000);
            alertify.alert(" In case edit, this class schedule may be changed. Please, choose again !!");
            $('#classes').multiselect('deselectAll', false).multiselect('refresh');
        }

        $('#payment_list_div').closest('td').attr('colspan','4');

        $('.pay_check').live('change',function(){
            //#Bug PAY0037
            if($('.pay_check').is(':checked')){
                var type        = $(this).closest('tr').find('.pay_payment_type').text();
                var course_fee_id  = $(this).closest('tr').find('.pay_course_fee_id').val();
                if(type == 'Cashholder'){
                    $('#coursefee').val(course_fee_id).trigger('change');
                    lock_coursefee = true;
                }else lock_coursefee = false;
            }

            //    lockUsedDiscount($(this));
            //tinh toan lai before discount
            caculated();
            //            //Nap lai discount
            submitSponsor();
            submitDiscount();
            //            //tinh toan lai so cuoi
            caculated();
        });

        $('#paid_amount').closest('table').closest('tr').hide();
        $('#deposit_amount').closest('table').closest('tr').hide();

        //Waiting class
        $('#tuition_hours').live('change',function(){
            var tuition_hours = Numeric.parse($('#tuition_hours').val());
            var tuition_fee    = Numeric.toInt(calCourseFee(tuition_hours));
            $('#tuition_fee').val(tuition_fee);
            caculated();
            submitSponsor();
            //Nap lai discount
            submitDiscount();
            //tinh toan lai so cuoi
            caculated();
        });
        //Outing Trip
        $('#tuition_fee').live('blur',function(){
            caculated();
            submitSponsor();
            submitDiscount();
            caculated();
        });

    }
    else{
        //HANDLE PAYMENT
        $('#amount_bef_discount').on('blur', function(){
            var amount_bef_discount = Numeric.parse($(this).val());
            $('#tuition_fee').val(Numeric.toInt(amount_bef_discount));
            caculated();
            submitSponsor();
            submitDiscount();
            caculated();
        });
        $('#tuition_hours').live('change',function(){ // Edit by Tung Bui
            $('#total_hours').val($('#tuition_hours').val());
            var total_hours = Numeric.parse($('#total_hours').val());
            suggestCourseFee();
            var tuition_fee    = Numeric.toInt(calCourseFee(total_hours));
            $('#tuition_fee').val(tuition_fee);
            caculated();
            submitSponsor();
            submitDiscount();
            caculated();
        });
        switchPaymentType();
        $('select#payment_type').on('change',function(){
            switchPaymentType();
        });

        $('#tblbook').multifield({
            section :   '.row_tpl', // First element is template
            addTo   :   '#tbodybook', // Append new section to position
            btnAdd  :   '#btnAddrow', // Button Add id
            btnRemove:  '.btnRemove', // Buton remove id
        });

        $('.btn_select_book').live('click',function(){
            book_index = $(this).closest('tr').index();
            open_popup('ProductTemplates', 600, 400, "", true, false, {"call_back_function":"set_book_return","form_name":"EditView","field_to_name_array":{"id":"book_id","name":"book_name","discount_price":"book_price"}}, "single", true);
        });

        $('.book_quantity, #charge_book, #payment_type').live('change',function(){
            calBookPayment();
        });
    }

    if(student_id != '' && student_id != null){
        //Load Student Info agian
        ajaxGetStudentInfo(true);
    }
    $('input.sponsor_percent, input.sponsor_amount').live('blur',function(){
        calSponsor();
    });

    $('.sponsor_number').live('change',function(){
        ajaxCheckVoucherCode($(this).closest('tr'));
    });

    $('.foc_type').live('change',function(){
        calSponsor();
    });

    $('#payment_amount').live('blur',function(){
        var typeArr = ['Deposit','Placement Test','Book/Gift','Cambridge','Outing Trip'];
        if(jQuery.inArray($('#payment_type').val(), typeArr) !== -1){
            //Bổ sung hàm tự động tính tiền Split Payment
            autoGeneratePayment();
        }
    });

    generateClassSchedule();

    if($('#is_outing').val() == '1'){
        $('#tuition_fee').removeClass('input_readonly').prop('readonly', false).effect("highlight", {color: '#ff9933'}, 3000);
        removeFromValidate('EditView', 'j_coursefee_j_payment_1j_coursefee_ida');
        $('label[for=j_coursefee_j_payment_1j_coursefee_ida]').find('.required').hide();
        $('#coursefee').addClass('input_readonly').find('option').not(':first').prop('disabled', true).hide();
    }
});
// Generate Dropdown Search Student
function generateStudentSelector(){
    $('#student_picker')
    .selectpicker()
    .ajaxSelectPicker({
        ajax: {
            url: "index.php?module=J_Payment&action=handleAjaxPayment&sugar_body_only=true",
            type: "POST",
            dataType: "json",
            data: {
                type        : 'ajaxLoadStudent',
                payment_type: $("#payment_type").val(),
                q           : '{{{q}}}'
            },
        },
        locale: {
            emptyTitle: ' '
        },
        preprocessData: function (data) {
            var i, l = data.length, array = [];
            if (l) {
                for(i = 0; i < l; i++){
                    var showLead = false;
                    var typeArr = ['Placement Test','Cambridge','Outing Trip'];
                    if(jQuery.inArray($('#payment_type').val(), typeArr ) !== -1){
                        showLead = true;
                    }
                    if(showLead || data[i].type == "Student"){
                        array.push($.extend(true, data[i], {
                            text: data[i].name,
                            value: data[i].id,
                            data: {
                                subtext: "<br> Phone: "+data[i].phone_mobile + "<br>Birthdate: "+data[i].birthdate + "<br>Type: "+data[i].type
                            }
                        }));
                    }
                }
            }
            return array;
        },
        requestDelay: 0,
        restoreOnError  : true
    });
}

// Đối type của nút SAVE thành button (để không tự động save form khi user ấn enter trong input)
function changeTypeInputSubmit(inputItem){
    var newInput = inputItem.clone();
    newInput.attr("type", "button");
    newInput.insertBefore(inputItem);
    inputItem.remove();
}

//Open Popup
function set_contact_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'name':
                    var student_name = val;
                    break;
                case 'contacts_j_payment_1contacts_ida':
                    var student_id = val;
                    $("#contacts_j_payment_1contacts_ida").val(val);
                    break;
                case 'phone_mobile':
                    var phone_mobile = val;
                    break;
                case 'birthdate':
                    var birthdate = val;
                    break;
            }
        }
    }
    $('#student_picker').html('');
    $('#student_picker').selectpicker("refresh");
    // Add option to "student" select and refresh ajax bootstrap select
    $("#student_picker").html('<option selected value="'+student_id+'" data-subtext="<br>Phone: '+phone_mobile+'<br> Birthdate: '+birthdate+'">'+student_name+'</option>');
    $('.filter-option,.pull-left').text(student_name);
    ajaxGetStudentInfo(true);
}

//Show Dialog
function showDialogStudent(show){
    if (show === undefined)
        show = false;

    var json = $('input#json_student_info').val();
    var count = 0;
    var htm = '';
    if(json != '' && json != null ){
        obj = JSON.parse(json);
        //Assign to First EC
        $('#assigned_user_name').val(obj['info']['assigned_user_name']);
        $('#assigned_user_id').val(obj['info']['assigned_user_id']);
        $('#team_type').val(obj['info']['team_type']);
        if (!(typeof collection === "undefined")){
            $('input[name='+collection['EditView_team_name'].primary_field+']').val(obj['info']['team_name']);
            $('input[name=id_'+collection['EditView_team_name'].primary_field+']').val(obj['info']['team_id']);
        }

        htm +=  "Name: <span id='student_name'>"+ obj['info']['student_name']+"</span><br>";
        htm +=  "Mobile: "+ obj['info']['phone']+"<br>";
        htm +=  "Birthday: "+ obj['info']['birthday']+"<br>";
        htm +=  "Relative: ";
        if(obj.info.relative.length == 0)
            htm += "<br>-none-<br>";
        $.each(obj.info.relative, function( key, value ) {
            count++;
            if(count == 1)
                htm +=  "<a target='_blank' style='text-decoration: none;' href='index.php?module=Contacts&action=DetailView&record="+key+"'>"+value+"</a><br>";
            else
                htm +=  "&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' style='text-decoration: none;' href='index.php?module=Contacts&action=DetailView&record="+key+"'>"+value+"</a><br>";
        });
        htm +=  "<hr>";

        htm +=  "<b>Study</b><br>";
        if(obj.class_list == 0)
            htm += "-none-<br>";
        var outstanding_list = {};
        $.each(obj.class_list, function(key, value){
            //Handle Log Outstanding
            if(value.type == 'OutStanding'){
                outstanding_list[key] = {}
                outstanding_list[key]['student_name']    =  value.student_name;
                outstanding_list[key]['class_id']        =  value.class_id;
                outstanding_list[key]['class_name']      =  value.class_name;
                outstanding_list[key]['total_hour']      =  unformatNumber(value.total_hour, num_grp_sep, dec_sep);
                outstanding_list[key]['total_revenue_util_now']      =  unformatNumber(value.total_revenue_util_now, num_grp_sep, dec_sep);
                outstanding_list[key]['start_study']     =  value.start_study;
                outstanding_list[key]['end_study']       =  value.end_study;
            }

            htm +=  "<b><a target='_blank' style='text-decoration: none;' href='index.php?module=J_Class&action=DetailView&record="+value.class_id+"'>"+value.class_name+"</a></b>";
            htm +=  "<p>Type: <b style='color: #FF8C00;'>"+value.type+"</b></p>";
            htm +=  "<p style='margin-left:10px;'>Hour: "+value.total_hour+" hours</p>";
            htm +=  "<p style='margin-left:10px;'>Start: "+ SUGAR.util.DateUtils.formatDate(new Date(value.start_study)) +"</p>";
            htm +=  "<p style='margin-left:10px;'>Finish: "+ SUGAR.util.DateUtils.formatDate(new Date(value.end_study))+"</p>";
        });
        $('input[name=outstanding_list]').val(JSON.stringify(outstanding_list));
        htm +=  "<hr>";
        htm +=  "<b>Payment</b><br>";
        if(obj.left_list == 0)
            htm += "-none-<br>";
        $.each(obj.left_list, function( key, value ) {
            htm +=  "<p><a target='_blank' style='text-decoration: none;' href='index.php?module=J_Payment&action=DetailView&record="+key+"'>"+value+"</a></p>";
        });
        htm +=  "<hr>";
        htm +=  "<a target='_blank' style='text-decoration: none; float: right; font-weight: bold;' href='index.php?module=Contacts&action=DetailView&record="+obj['info']['id']+"'>More Info >></a><br>";
    }else
        htm += "<em font-style:normal;'> -- No Infomation -- </em>";

    if (show) {
        $('#dialog_student_info').html(htm);
        $('#dialog_student_info').attr('title','Student Information')

        $('#dialog_student_info').dialog({
            resizable: false,
            width:'auto',
            height:'500',
            modal: false,
            visible: true,
            position: ['right',70],
        });

        $('#dialog_student_info').effect("highlight", {color: '#ff9933'}, 1000);
    }

    //Show Payment List
    var html    = '';
    var count   = 0;
    $.each(obj.top_list, function( key, value ) {
        html += "<tr>";
        html += "<td align='right'><input type='checkbox' style='vertical-align: initial;zoom: 1.2;' class='pay_check' value='"+value['payment_id']+"'"+value['checked']+">";
        html += "<input type='hidden' class='used_discount' value='"+value['used_discount']+"'/>";
        html += "<input type='hidden' class='use_type' value='"+value['use_type']+"'/><input type='hidden' class='pay_course_fee_id' value='"+value['course_fee_id']+"'/></td>";
        html += "<td align='center'><a target='_blank' style='text-decoration: none;font-weight: bold;' href='index.php?module=J_Payment&action=DetailView&record="+value['payment_id']+"'>"+value['payment_code']+"</a></td>";
        html += "<td align='center' class='pay_payment_type'>"+value['payment_type']+"</td>";
        html += "<td align='center'>"+value['payment_date']+"</td>";
        html += "<td align='center' class='pay_payment_amount'>"+Numeric.toFloat(value['payment_amount'])+"</td>";
        html += "<td align='center' class='pay_total_hours'>"+Numeric.toFloat(value['total_hours'],2,2)+"</td>";
        html += "<td align='center' class='pay_remain_amount'>"+Numeric.toFloat(value['remain_amount'])+"</td>";
        html += "<td align='center' class='pay_remain_hours'>"+Numeric.toFloat(value['remain_hours'],2,2)+"</td>";
        html += "<td align='center' class='pay_course_fee'>"+value['course_fee']+"</td>";
        html += "<td align='center'><a target='_blank' style='text-decoration: none;' href='index.php?module=Users&action=DetailView&record="+value['assigned_user_id']+"'>"+value['assigned_user_name']+"</a></td>";
        html += "</tr>";
        count++
    });
    if(count == 0){
        html += '<tr><td colspan="10" style="text-align: center;">No Payment Avaiable</td></tr>';
    }
    $('#tbodypayment').html(html);
}

//Ajax get Student Info
function ajaxGetStudentInfo(async){
    $('#classes').multiselect('disable');
    $('#payment_type').prop('disabled',true).addClass('input_readonly');
    ajaxStatus.showStatus('Processing <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
    $.ajax({
        url: "index.php?module=J_Payment&action=handleAjaxPayment&sugar_body_only=true",
        type: "POST",
        async: async,
        data:  {
            type            : 'ajaxGetStudentInfo',
            enrollment_id   : record_id,
            payment_type    : payment_type_begin,
            student_id      : $('#contacts_j_payment_1contacts_ida').val(),
            payment_date    : $('#payment_date').val(),
        },
        dataType: "json",
        success: function(res){
            ajaxStatus.hideStatus();
            if(res.success == "1"){
                $('input#json_student_info').val(res.content);
                showDialogStudent();
                caculated();
                submitSponsor();
                submitDiscount();
                caculated();
            }else
                $('input#json_student_info').val('');
            $('#classes').multiselect('enable');
            $('#payment_type').prop('disabled',false).removeClass('input_readonly');
        },
    });
}

function generateClassMultiSelect(){
    $('#classes').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '225px',
        maxHeight: 400,
        enableHTML : true,
        optionLabel: function(element)
        {
            var start_date  = $(element).attr("start_date");
            var end_date    = $(element).attr("end_date");
            var class_name  = $(element).attr("class_name");
            var class_type  = $(element).attr("class_type");
            var sub_text = "<small>";
            sub_text += "<br>Class name: " + class_name;
            if(class_type == 'Normal Class'){
                sub_text += "<br>Start date: " + start_date;
                sub_text += "<br>End date: " + end_date;
                sub_text += "<br>Type: <span class='textbg_green'>" + class_type + "</span>";
            }else{
                sub_text += "<br>Expected Open Date: " + start_date;
                sub_text += "<br>Type: <span class='textbg_orange'>" + class_type + "</span>";
            }

            sub_text += "</small>";
            return $(element).html() + sub_text;
        },
        onChange: function(option, checked, select) {
            //Calculate End Date - Start Date
            var minStartDate = 1602288000000; //Year 2020
            var maxEndDate = 939513600000;    //Year 1999
            var countSelected   = 0;
            var countWaiting    = 0;
            var countOuting     = 0;
            $('#classes option:selected').each(function(index, brand){
                var start = SUGAR.util.DateUtils.parse($(this).attr("start_date"),cal_date_format).getTime();
                var end = SUGAR.util.DateUtils.parse($(this).attr("end_date"),cal_date_format).getTime();
                if(minStartDate > start)
                    minStartDate = start;
                if(maxEndDate < end)
                    maxEndDate = end;
                // Open readonly Tuition Hours - WAITING CLASS
                countSelected++;
                var class_type = $(this).attr("class_type");
                if(class_type == 'Waiting Class')
                    countWaiting++;
                //Count Kind of course
                var kind_of_course = $(this).attr("kind_of_course");
                if(kind_of_course == 'Outing Trip')
                    countOuting++;
            });

            if(countWaiting == countSelected && countSelected == 1)
                $('#tuition_hours').removeClass('input_readonly').prop('readonly', false).effect("highlight", {color: '#ff9933'}, 3000);
            else
                $('#tuition_hours').addClass('input_readonly').prop('readonly', true);

            if(countOuting == countSelected && countSelected == 1){
                $('#tuition_fee').removeClass('input_readonly').prop('readonly', false).effect("highlight", {color: '#ff9933'}, 3000);
                removeFromValidate('EditView', 'j_coursefee_j_payment_1j_coursefee_ida');
                $('label[for=j_coursefee_j_payment_1j_coursefee_ida]').hide();
                $('#coursefee').hide().addClass('input_readonly').find('option').not(':first').prop('disabled', true);
                var is_outing = true;
            }else{
                $('#tuition_fee').addClass('input_readonly').prop('readonly', true);
                addToValidate('EditView', 'j_coursefee_j_payment_1j_coursefee_ida', 'enum', true,'Course Fee ID' );
                $('label[for=j_coursefee_j_payment_1j_coursefee_ida]').show();
                $('#coursefee').show().removeClass('input_readonly').find('option').prop('disabled', false);
                var is_outing = false;
            }

            if($('#classes option:selected').length == 0)
                $('#class_start, #class_end, #start_study, #end_study').val('');
            else{
                $('#start_study').val(SUGAR.util.DateUtils.formatDate(new Date()));
                $('#class_start').val(SUGAR.util.DateUtils.formatDate(new Date(minStartDate)));
                $('#end_study, #class_end').val(SUGAR.util.DateUtils.formatDate(new Date(maxEndDate)));
            }
            //Check Outstanding
            var oustanding = outstandingChecking(option.val(), checked);
            calSession(true);
            if(countSelected > 0 && !is_outing){
                suggestCourseFee();
                $("#coursefee").trigger('change');     //Mới thay đổi
            }else{
                $("#coursefee").val('');
            }
            if(is_outing) $('#is_outing').val('1');
            else $('#is_outing').val('0');
            generateClassSchedule();
        },
        filterPlaceholder: 'Select class'
    });
}

function outstandingChecking(class_id, checked){
    //Check Outstanding
    var outstanding_list = $('input[name=outstanding_list]').val();
    if(outstanding_list != '')
        var obj_outstanding = JSON.parse(outstanding_list);
    else obj_outstanding = '';

    var countOst = 0;
    $.each(obj_outstanding, function( key, value ) {
        if(class_id == value.class_id){
            countOst++;
            classOst    = value.class_id;
            student_name= value.student_name;
            classNameOst= value.class_name;
            startOst    = SUGAR.util.DateUtils.formatDate(new Date(value.start_study));
            endOst      = SUGAR.util.DateUtils.formatDate(new Date(value.end_study));
            hourOst     = Numeric.toFloat(value.total_hour,2,2);
            hourOstUtilNow     = Numeric.toFloat(value.total_revenue_util_now,2,2);
            hourRest     = Numeric.toFloat(value.total_hour - value.total_revenue_util_now,2,2);
        }
    });
    if(countOst > 0 && checked){
        alertify.confirm('Student <b>'+student_name+'</b> has been added outstanding <br>in class <b>'+classNameOst+'</b><br><br>Total Outstanding Hours(until '+$('#payment_date').val()+'): <b>'+hourOstUtilNow+' hours</b>.<br>(Change Payment Date to calculate Total Outstanding Hours)<br> Total continuing hours: <b>'+hourRest+' hours</b>.<br>Total hours: <b>'+hourOst+' hours</b>.<br>Does he/she want to pay now ?', function (e) {
            if (e) {
                $('#classes').multiselect('select', class_id, false);
                $('#classes').removeAttr('multiple').val(class_id).multiselect("destroy").addClass('input_readonly').find('option:not(:selected)').prop('disabled', true);
                $('#start_study').val(startOst).addClass('input_readonly').prop('readonly', true);
                $('#end_study').val(endOst).addClass('input_readonly').prop('readonly', true);
                $('#start_study_trigger, #end_study_trigger').hide();
                $('input[name=is_outstanding]').val('1');
                calSession(false);
                return true;             //not generate start date
            }else{
                $('#classes').val('').attr('multiple','multiple').multiselect("destroy").find('option:not(:selected)').prop('disabled', false);
                generateClassMultiSelect();
                $('#classes').multiselect('deselect', class_id).multiselect('refresh');
                $('#start_study').val('').removeClass('input_readonly').prop('readonly', false);
                $('#end_study').val('').removeClass('input_readonly').prop('readonly', false);
                $('#start_study_trigger, #end_study_trigger').show();
                $('input[name=is_outstanding]').val('0');

                alertify.success('Please select another class to make enrollment!');
                calSession(true);
                return true;
            }
        });
    }else
        return false;

}

function calSession(generate_start_date){
    if($('#start_study').val() != '' && $('#end_study').val() != ''){
        var start_study         = SUGAR.util.DateUtils.parse($('#start_study').val(),cal_date_format);
        var end_study           = SUGAR.util.DateUtils.parse($('#end_study').val(),cal_date_format);
        var is_outstanding      = $('input[name=is_outstanding]').val();
        YAHOO.widget.DateMath._addDays(end_study,1) //+ 1days
        var now_date = Date.today();
        if(start_study < now_date && is_outstanding != '1')
            alertify.success('Make sure to add student to this class, because this class has already started and some lesson finished !');

        var count = 0
        var tuition_hours= 0;
        var class_list = {};
        if(generate_start_date)
            $('#start_study').val(SUGAR.util.DateUtils.formatDate(new Date()));
        $('#classes option:selected').each(function(index, brand){
            var class_ = $(this);
            var seleted_class_id = $(this).val();
            isHistory(seleted_class_id);
            class_list[seleted_class_id] =  {};
            var start_obj 	= '';
            var end_obj 	= '';
            var hour_obj 	= 0;
            var count_inside= 0;

            // Calculate tuition hours
            obj = JSON.parse(class_.attr("json_ss"));
            $.each(obj, function( key, value ) {
                if((new Date(key) <= end_study) && (new Date(key) >= start_study)){
                    count++;
                    if(count == 1 && generate_start_date) //Set start study is first date schedule
                        $('#start_study').val(SUGAR.util.DateUtils.formatDate(new Date(key)));
                    count_inside++;
                    tuition_hours	= tuition_hours + parseFloat(value);
                    hour_obj		= hour_obj + parseFloat(value);
                    if(count_inside == 1) start_obj = key;
                    end_obj = key;
                }
            });
            class_list[$(this).val()]['class_id']       = $(this).val();
            class_list[$(this).val()]['total_hour'] 	= hour_obj;
            class_list[$(this).val()]['start_study'] 	= start_obj;
            class_list[$(this).val()]['end_study'] 		= end_obj;
        });
        $('#sessions').val(count);
        $('#tuition_hours').val(Numeric.toFloat(tuition_hours,2,2));

        var class_content = JSON.stringify(class_list);
        $('input[name=content]').val(class_content);

        var tuition_fee = Numeric.toInt(calCourseFee(tuition_hours));
        $('#tuition_fee').val(tuition_fee);
    }
    else{
        $('#sessions').val(0);
        $('#tuition_hours').val(0);
        $('#tuition_fee').val(0);
    }

    //tinh toan lai before discount
    caculated();
    //Nap lai discount
    submitSponsor();
    submitDiscount();
    //tinh toan lai so cuoi
    caculated();
}
//Check Class is history Class
function isHistory(class_id){
    var json_class = $('#class_list').val();
    var found = 0;
    if(json_class != '' && json_class != null){
        obj_class = JSON.parse(json_class);

        $.each(obj_class, function( key, idclass ) {
            if(idclass.id == class_id)
                found++;
        });
    }
    if(found > 0){
        alertify.error('Class has been learning');
        return true;
    }
    else return false;
}

function showDialogDiscount(){
    $( "#dialog_discount" ).dialog({
        resizable: false,
        width: 900,
        modal: true,
        hideCloseButton: true,
        buttons: {
            "Submit":{
                click:function() {
                    submitSponsor();
                    submitDiscount();
                    caculated();
                    $(this).dialog('close');
                },
                class: 'button primary',
                text: 'Submit',
            },
            "Cancel": function() {
                $(this).dialog('close');
            },
        },
        beforeClose: function(event, ui) {
            $("body").css({ overflow: 'inherit' });
        },
    });
}
function showDialogSponsor(){
    $( "#dialog_sponsor" ).dialog({
        resizable: false,
        width: 700,
        modal: true,
        hideCloseButton: true,
        buttons: {
            "Submit":{
                click:function() {
                    submitSponsor();
                    submitDiscount();
                    caculated();
                },
                class: 'button primary',
                text: 'Submit',
            },
            "Cancel": function() {
                var sponsor_list = $('#sponsor_list').val();
                if(sponsor_list == '' || sponsor_list == '{}' || sponsor_list == '[]'){
                    $('.sponsor_number').not(':eq(0)').val('');
                    $('.foc_type').not(':eq(0)').val('');
                    $('.sponsor_amount').not(':eq(0)').val('');
                    $('.sponsor_percent').not(':eq(0)').val('');
                    $('.btnRemoveSponsor').not(':eq(1)').not(':eq(0)').trigger('click');
                    $(this).dialog('close');
                }else{
                    submitSponsor();
                    submitDiscount();
                    caculated();
                }
            },
        },
        beforeClose: function(event, ui) {
            $("body").css({ overflow: 'inherit' });
        },
    });
}

//Suggest Course Fee
function suggestCourseFee(){
    if(!lock_coursefee){
        var total_hours     = Numeric.parse($('#total_hours').val()) + Numeric.parse($('#paid_hours').val());
        var payment_type    = $('#payment_type').val();
        //De xuat lua chon
        $("#coursefee").effect("highlight", {color: '#ff9933'}, 3000);
    }
}
//Calculate Course Fee
function calCourseFee(tuition_hours){
    var course_fee = parseFloat($("#coursefee option:selected").attr('price'));
    var course_hour = parseInt($("#coursefee option:selected").attr('type'));

    price = course_fee / course_hour;

    return tuition_hours * price;
}

function caculated(){
    // Caculate Payment list
    var payment_type = $('#payment_type').val();

    var payment_list = {};
    payment_list['paid_list']       =  {};
    payment_list['deposit_list']    =  {};
    var total_used_amount  = 0;
    var total_used_hours  = 0;
    var total_deposit_amount  = 0;
    var tuition_fee         = Numeric.parse($('#tuition_fee').val());
    var amount_bef_discount = Numeric.parse($('#amount_bef_discount').val());
    var discount_amount     = Numeric.parse($('#discount_amount').val());
    var tuition_hours       = Numeric.parse($('#tuition_hours').val());
    var discount_percent    = Numeric.parse($('#discount_percent').val());

    var payment_amount      = 0;
    var remaining_freebalace      = 0;

    var final_sponsor           = Numeric.parse($('#final_sponsor').val());
    var final_sponsor_percent   = Numeric.parse($('#final_sponsor_percent').val());

    var price_enroll = (tuition_fee) / (tuition_hours); // đơn giá tổng
    if (!isFinite(price_enroll)) price_enroll = 0;
    var total_hours = parseFloat(tuition_hours);

    // add paid payment to json
    var count_pay = 0;

    $('.pay_check:checked').each(function(index, brand){
        var payment_related_type = $(this).closest('tr').find('.pay_payment_type').text();
        var use_type = $(this).closest('tr').find('.use_type').val();
        var paid_type = ["Cashholder"];
        if(($.inArray(payment_related_type,paid_type) >= 0 || use_type == "Hour") && (total_hours > 0)){
            var used_amount = Numeric.parse($(this).closest('tr').find('.pay_remain_amount').text());
            var used_hours = Numeric.parse($(this).closest('tr').find('.pay_remain_hours').text());
            var temp_price = used_amount / used_hours;
            total_hours = total_hours - used_hours;
            if(total_hours < 0){
                used_hours = used_hours + total_hours;
                total_hours = 0;
            }
            used_amount = temp_price * used_hours;

            total_used_amount += used_amount;
            total_used_hours += used_hours;

            payment_list['paid_list'][$(this).val()] = {};
            payment_list['paid_list'][$(this).val()]["id"] = $(this).val();
            payment_list['paid_list'][$(this).val()]["used_amount"] = used_amount;
            payment_list['paid_list'][$(this).val()]["used_hours"] = used_hours;
            count_pay++;

        }
    });
    if (payment_type == "Cashholder") amount_bef_discount = calCourseFee(total_hours);
    else if (payment_type == "Enrollment") amount_bef_discount = price_enroll * total_hours;

    //Get Ratio - Ratio áp dụng cho Discount và Sponsor
    var coursefee_hour = parseInt($("#coursefee option:selected").attr('type'));
    var ratio = 1;
    if(total_hours < coursefee_hour && total_hours != 0 && coursefee_hour != 0)
        ratio = total_hours / coursefee_hour;

    var total_after_discount = amount_bef_discount - discount_amount - final_sponsor;

    payment_amount = total_after_discount;
    // add deposit payment to json
    $('.pay_check:checked').each(function(index, brand){
        var payment_type = $(this).closest('tr').find('.pay_payment_type').text();
        var use_type = $(this).closest('tr').find('.use_type').val();
        if((payment_type == 'Deposit' || use_type == "Amount") && (payment_amount > 0)){
            var used_amount = Numeric.parse($(this).closest('tr').find('.pay_remain_amount').text());
            payment_amount = payment_amount - used_amount;
            if(payment_amount < 0){
                used_amount = used_amount + payment_amount;
                remaining_freebalace += payment_amount;
                payment_amount = 0;
            }
            total_deposit_amount += used_amount;

            payment_list['deposit_list'][$(this).val()] = {};
            payment_list['deposit_list'][$(this).val()]["id"] = $(this).val();
            payment_list['deposit_list'][$(this).val()]["used_amount"] = used_amount;
            payment_list['deposit_list'][$(this).val()]["used_hours"] = 0;
            count_pay++;
        }
    });
    var str_json_payment_list = '';
    if(count_pay > 0)
        str_json_payment_list = JSON.stringify(payment_list);

    $('#payment_list').val(str_json_payment_list);

    if(total_used_hours > 0)
        $('#paid_amount').closest('table').closest('tr').show();
    else
        $('#paid_amount').closest('table').closest('tr').hide();

    if(total_deposit_amount > 0)
        $('#deposit_amount').closest('table').closest('tr').show();
    else
        $('#deposit_amount').closest('table').closest('tr').hide();
    //Assign money
    $('#tuition_fee').val(Numeric.toInt(tuition_fee));
    //không làm tròn 2 số này
    $('#paid_amount').val(Numeric.toFloat(total_used_amount));
    $('#deposit_amount').val(Numeric.toFloat(total_deposit_amount));

    $('#amount_bef_discount').val(Numeric.toInt(amount_bef_discount));
    $('#total_after_discount').val(Numeric.toInt(total_after_discount));
    $('#remaining_freebalace').val(Numeric.toInt(Math.abs(remaining_freebalace)));
    $('#payment_amount').val(Numeric.toInt(payment_amount));

    //Assign hour
    $('#tuition_hours').val(Numeric.toFloat(tuition_hours,2,2));
    $('#paid_hours').val(Numeric.toFloat(total_used_hours,2,2));

    $('#total_hours').val(Numeric.toFloat(total_hours,2,2));
    $('#ratio').val(Numeric.toFloat(ratio,3,3));

    //Bổ sung hàm tự động tính tiền Split Payment
    autoGeneratePayment();
}

function ajaxCheckVoucherCode(self){
    var voucher_code    = self.find('.sponsor_number').val();
    var student_id      = $('#contacts_j_payment_1contacts_ida').val();
    if(voucher_code != ''){
        //Ajax check Sponsor code
        $.ajax({
            url: "index.php?module=J_Payment&action=handleAjaxPayment&sugar_body_only=true",
            type: "POST",
            async: true,
            data:  {
                type            : 'ajaxCheckVoucherCode',
                voucher_code    : voucher_code,
                student_id      : student_id,
                payment_date    : $('#payment_date').val(),
            },
            dataType: "json",
            success: function(res){
                ajaxStatus.hideStatus();
                if(res.success == "1"){
                    var status          = ' <b style="color:green;"> Available</b>';
                    var discount_amount = '<br>Discount: '+res.discount_amount;
                    var discount_percent= '<br>Discount %: '+res.discount_percent;
                    if(res.discount_amount == 0) discount_amount = '';
                    if(res.discount_percent == 0) discount_percent = '';

                    var description = ''
                    if(res.description != '') description = ' ('+res.description+')';

                    var owner = ''
                    if(res.student_name != '') owner = '<br>Owner: ' + res.student_name;

                    if(res.status == 'Expired'){
                        status = ' <b style="color:red;"> Expired</b>';
                        self.find('.sponsor_amount, .sponsor_percent, .voucher_id, .sponsor_number, .foc_type').val('');
                    }else{
                        self.find('.sponsor_amount').val(res.discount_amount);
                        self.find('.sponsor_percent').val(res.discount_percent);
                        self.find('.voucher_id').val(res.voucher_id);
                        self.find('.foc_type').val(res.foc_type);
                    }

                    alertify.alert('Voucher: '+ res.voucher_code + description +'<br>Expires: ' + res.end_date + status + owner  + discount_amount + discount_percent + '<br>Used/Use: '+ res.used_time + ' / '+ res.use_time);

                }else{
                    var old_voucher_id = self.find('.voucher_id').val();
                    if(old_voucher_id != '')
                        self.find('.sponsor_amount, .sponsor_percent, .voucher_id, .sponsor_number, .foc_type').val('');
                    alertify.alert('Voucher not fould !');
                }


                calSponsor();
            },
        });
        //END
    }

}

function calSponsor(){
    var total_sponsor_percent       = 0;
    var total_sponsor_amount        = 0;
    var count_referal               = 0;
    var ratio                       = Numeric.parse($('#ratio').val());
    var amount_bef_discount         = Numeric.parse($('#amount_bef_discount').val());
    $('.row_tpl_sponsor').not(":eq(0)").each(function(index, brand){
        var sponsor_amount = Numeric.parse($(this).find('.sponsor_amount').val());
        var sponsor_percent = Numeric.parse($(this).find('.sponsor_percent').val());
        var foc_type = $(this).find('.foc_type').val();
        if(foc_type == 'Referral' || foc_type == 'Staff children' || foc_type == 'Management' || foc_type == 'Retake' || foc_type == 'BUV, BEP'){
            count_referal++;
            total_sponsor_amount += sponsor_amount
        }else
            total_sponsor_amount += (sponsor_amount * ratio)

        total_sponsor_percent  += sponsor_percent;
    });

    //Tính Sponsor
    $('.sponsor_amount_bef_discount').text(Numeric.toInt(amount_bef_discount));
    $('.total_sponsor_amount').text(Numeric.toInt(total_sponsor_amount));
    $('.total_sponsor_percent').text(Numeric.toFloat(total_sponsor_percent,2,2));
    $('#sponsor_ratio').html('&nbsp;&nbsp;&nbsp;Ratio: <b>'+Numeric.toFloat(ratio,3,3)+'</b>');

    var total_sponsor_percent_to_amount = ((amount_bef_discount - total_sponsor_amount) * total_sponsor_percent / 100);

    var final_sponsor = total_sponsor_amount + total_sponsor_percent_to_amount;
    var final_sponsor_percent = (final_sponsor / amount_bef_discount) * 100;

    $('.final_sponsor').text(Numeric.toInt(final_sponsor));
    $('.final_sponsor_percent').val(Numeric.toFloat(final_sponsor_percent,2,2));
    $('.total_sponsor_percent_to_amount').val(Numeric.toInt(total_sponsor_percent_to_amount));

}
function submitSponsor(){
    calSponsor();
    var sponsor_list = {};
    var count = 0;
    var count_error = 0;
    var ratio = Numeric.parse($('#ratio').val());
    var total_sponsor_percent_to_amount  = Numeric.parse($('.total_sponsor_percent_to_amount').val());
    var total_sponsor_percent            = Numeric.parse($('.total_sponsor_percent').text());
    $('.row_tpl_sponsor').not(":eq(0)").each(function(index, brand){
        var total_sponsor_down = 0;
        var sponsor_number  = $(this).find('.sponsor_number').val();
        var foc_type        = $(this).find('.foc_type').val();
        var voucher_id      = $(this).find('.voucher_id').val();
        var sponsor_amount  = Numeric.parse($(this).find('.sponsor_amount').val());
        var sponsor_percent = Numeric.parse($(this).find('.sponsor_percent').val());
        if(sponsor_amount != 0 || sponsor_percent != 0 ){
            if(sponsor_number == '' || foc_type == ''){
                count_error++;
                return;
            }
        }
        //        else
        //            return;

        if(foc_type == 'Referral'){
            total_sponsor_down += sponsor_amount
        }else
            total_sponsor_down += (sponsor_amount * ratio)
        if(total_sponsor_percent != 0)
            total_sponsor_down += total_sponsor_percent_to_amount * (sponsor_percent/total_sponsor_percent);

        sponsor_list[count] = {};
        sponsor_list[count]['voucher_id']       = voucher_id;
        sponsor_list[count]['sponsor_number']   = sponsor_number;
        sponsor_list[count]['foc_type']         = foc_type;
        sponsor_list[count]['sponsor_amount']   = Numeric.toInt(sponsor_amount);
        sponsor_list[count]['sponsor_percent']  = Numeric.toFloat(sponsor_percent,2,2);
        sponsor_list[count]['total_down']       = Numeric.toInt(total_sponsor_down);
        count++;
    });
    if(count_error > 0){
        alertify.error('Please fill out the information completely !');
        return false;
    }
    $('#sponsor_list').val(JSON.stringify(sponsor_list));
    $('#final_sponsor').val($('.final_sponsor').text());
    $('#final_sponsor_percent').val($('.final_sponsor_percent').val());
    $( "#dialog_sponsor" ).dialog('close');
}

function reloadDiscount(){
    //Remove all selected
    $("#discount_reward option:selected").prop("selected", false);
    $("#discount_partnership option:selected").prop("selected", false);
    $('.dis_check').prop("checked", false);
    //Parse and Ship json
    var json = $('input#discount_list').val();
    if(json != '' && json != null){
        obj = JSON.parse(json);

        $.each(obj, function(id, dis_obj) {
            if(dis_obj.type == 'Reward')
                $('#discount_reward option[value=' + id + ']').prop('selected',true);
            else if(dis_obj.type == 'Partnership')
                $('#discount_partnership').val(dis_obj.partnership_id);
                else
                    $('.dis_check[value=' + id + ']').prop('checked',true);
        });
    }
}

function calDiscount(){
    //Handle schema apply with discount
    $('.dis_amount_bef_discount').text($('#amount_bef_discount').val());
    var dis_amount_bef_discount = Numeric.parse($('#amount_bef_discount').val());
    var dis_total_hours = Numeric.parse($('#total_hours').val());
    var ratio = Numeric.parse($('#ratio').val());
    var final_sponsor = Numeric.parse($('#final_sponsor').val());

    var dis_discount_amount     = 0;
    var dis_discount_percent    = 0;
    var total_reward_amount     = 0;
    var total_reward_percent    = 0;
    var partnership_amount      = 0;
    var partnership_percent     = 0;

    var dis_total_discount      = 0;
    var dis_total_discount_amount      = 0;
    var dis_total_discount_percent     = 0;

    // calculate Reward
    var reward_array = [];
    reward_array = $("#discount_reward").val();
    total_reward_amount = 0;
    total_reward_percent = 0;
    if (reward_array != null){
        $.each(reward_array, function(index,value) {
            if(total_reward_amount < Numeric.parse($("#discount_reward option[value='"+value+"']").attr("dis_amount")))
                total_reward_amount  =  Numeric.parse($("#discount_reward option[value='"+value+"']").attr("dis_amount"));
            if(total_reward_percent < Numeric.parse($("#discount_reward option[value='"+value+"']").attr("dis_percent")))
                total_reward_percent =  Numeric.parse($("#discount_reward option[value='"+value+"']").attr("dis_percent"));
        });
        dis_discount_amount += total_reward_amount;
        dis_discount_percent += total_reward_percent;
    }

    // calculate Partnership
    if($('#discount_partnership').length > 0) {
        partnership_amount  = Numeric.parse($('#discount_partnership option:selected').attr("dis_amount"));
        partnership_percent = Numeric.parse($('#discount_partnership option:selected').attr("dis_percent"));
    }
    dis_discount_amount  += partnership_amount;
    dis_discount_percent += partnership_percent;
    var maximum_percent = 0;
    $('.dis_check:checked').each(function(index, brand){
        var cr_maximum = Numeric.parse($(this).attr('maximum_percent'));
        if(cr_maximum > maximum_percent)
            maximum_percent = cr_maximum;

        dis_amount  = Numeric.parse($(this).closest('tr').find('.dis_amount').val());
        dis_percent = Numeric.parse($(this).closest('tr').find('.dis_percent').val());

        dis_discount_amount     += dis_amount;
        dis_discount_percent    += dis_percent;
    });

    dis_total_discount_amount     = dis_discount_amount * ratio;
    dis_total_discount_percent     = (dis_discount_percent/100)*(dis_amount_bef_discount-dis_total_discount_amount-final_sponsor);
    dis_total_discount     = dis_total_discount_amount + dis_total_discount_percent;
    //assign
    $('.dis_total_discount').text(Numeric.toInt(dis_total_discount));
    $('.dis_discount_percent').text(Numeric.toFloat(dis_discount_percent,2,2));
    $('#dis_ratio').html('&nbsp;&nbsp;&nbsp;Ratio: <b>'+Numeric.toFloat(ratio,3,3)+'</b>');
    $('.dis_discount_amount').text(Numeric.toInt(dis_total_discount_amount));
    $('#discount_partnership').parent().parent().find("td:eq(2)").text(partnership_percent == "0"? "" : Numeric.toFloat(partnership_percent),2,2);
    $('#discount_partnership').parent().parent().find("td:eq(3)").text(partnership_amount == "0"? ""  : Numeric.toInt(partnership_amount));
    $('#discount_reward').parent().parent().find("td:eq(2)").text(total_reward_percent == "0"? ""  : Numeric.toFloat(total_reward_percent),2,2);
    $('#discount_reward').parent().parent().find("td:eq(3)").text(total_reward_amount  == "0"? ""  : Numeric.toInt(total_reward_amount));

    var limit_percent = limit_discount_percent;
    if(maximum_percent > 0)
        limit_percent = maximum_percent;
    //Compare with limit - Limited Discount chỉ áp dụng cho Discount
    var limited_discount    = (limit_percent/100) * (dis_amount_bef_discount - final_sponsor);    //limit discount

    var catch_limit = false;
    $('#catch_limit').val('0');
    if(dis_total_discount >= limited_discount){
        dis_total_discount = limited_discount;
        catch_limit = true;
        $('#catch_limit').val('1');
    }
    var dis_final_discount_percent = Numeric.toFloat((dis_total_discount / (dis_amount_bef_discount - final_sponsor)) * 100,2,2);

    if(catch_limit)
        $('.dis_alert_discount').html("&nbsp;&nbsp;&nbsp;(limited "+limit_percent+" %)").show();
    else $('.dis_alert_discount').hide();
    //assign final discount
    $('.dis_final_discount').text(Numeric.toInt(dis_total_discount));
    $('.dis_final_discount_percent').val(dis_final_discount_percent);
    $('.dis_discount_percent_to_amount').val(Numeric.toInt(dis_total_discount_percent));
}

function submitDiscount(){
    calDiscount();
    var discount_list = {};
    var count = 0;
    var description = 'Chiết khấu: ';
    var catch_limit =  $('#catch_limit').val();

    var ratio = Numeric.parse($('#ratio').val());
    var dis_discount_percent_to_amount  = Numeric.parse($('.dis_discount_percent_to_amount').val());
    var discount_percent                = Numeric.parse($('.dis_discount_percent').text());

    var total_discount = Numeric.parse($('.dis_total_discount').text());
    var final_discount = Numeric.parse($('.dis_final_discount').text());
    // reward
    var reward_array = [];
    reward_array = $("#discount_reward").val();

    if (typeof reward_array != 'undefined'){
        if(reward_array !== null && reward_array.length > 0 && reward_array[0] == '') reward_array.shift();

        if (reward_array !== null && reward_array.length > 0){
            description = description + 'Reward khóa: ';
            var first_reward = true;
            $.each(reward_array, function(index,value) {
                var total_down = 0;
                var dis_percent     = Numeric.parse($("#discount_reward option[value='"+value+"']").attr("dis_percent"));
                var dis_amount      = Numeric.parse($("#discount_reward option[value='"+value+"']").attr("dis_amount"));
                total_down += (dis_amount * ratio)
                if(discount_percent != 0)
                    total_down += dis_discount_percent_to_amount * (dis_percent/discount_percent);

                if(catch_limit == '1')
                    total_down = total_down * final_discount / total_discount;

                count++;
                discount_list[value] = {};
                discount_list[value]['id']           = value;
                discount_list[value]['type']         = 'Reward';
                discount_list[value]['dis_percent']  = Numeric.toFloat(dis_percent,2,2);
                discount_list[value]['dis_amount']   = Numeric.toInt(dis_amount);
                discount_list[value]['total_down']   = Numeric.toInt(total_down);

                if (first_reward) {
                    description = description + $("#discount_reward option[value='"+value+"']").text();
                    first_reward = false;
                }
                else description = description +', '+ $("#discount_reward option[value='"+value+"']").text();
            });
        }
    }

    $('.dis_check:checked').each(function(index, brand){
        var total_down = 0;
        var dis_percent     = Numeric.parse($(this).closest('tr').find('.dis_percent').val());
        var dis_amount      = Numeric.parse($(this).closest('tr').find('.dis_amount').val());
        total_down += (dis_amount * ratio)
        if(discount_percent != 0)
            total_down += dis_discount_percent_to_amount * (dis_percent/discount_percent);

        if(catch_limit == '1')
            total_down = total_down * final_discount / total_discount;

        count++;
        discount_list[$(this).val()] =  {};
        discount_list[$(this).val()]['id']          =  $(this).val();
        discount_list[$(this).val()]['type']        =  'Discount';
        discount_list[$(this).val()]['dis_percent']  = Numeric.toFloat(dis_percent,2,2);
        discount_list[$(this).val()]['dis_amount']   = Numeric.toInt(dis_amount);
        discount_list[$(this).val()]['total_down']   = Numeric.toInt(total_down);
        if(count == 1)
            var des =  $(this).closest('tr').find('.dis_name').text();
        else var des = ', '+$(this).closest('tr').find('.dis_name').text()
        description = description + des;
    });

    //partnership
    if ($("#discount_partnership").val() != "" && $("#discount_partnership").val() != null) {
        var total_down = 0;
        var dis_percent     = Numeric.parse($("#discount_partnership option:selected").attr("dis_percent"));
        var dis_amount      = Numeric.parse($("#discount_partnership option:selected").attr("dis_amount"));
        total_down += (dis_amount * ratio)
        if(discount_percent != 0)
            total_down += dis_discount_percent_to_amount * (dis_percent/discount_percent);

        if(catch_limit == '1')
            total_down = total_down * final_discount / total_discount;

        count++;
        var dis_partnership_id = $("#discount_partnership").parent().parent().find(".dis_check").val();
        discount_list[dis_partnership_id] = {};
        discount_list[dis_partnership_id]['id']           = dis_partnership_id;
        discount_list[dis_partnership_id]['type']         = 'Partnership';
        discount_list[dis_partnership_id]['dis_percent']  = Numeric.toFloat(dis_percent,2,2);
        discount_list[dis_partnership_id]['dis_amount']   = Numeric.toInt(dis_amount);
        discount_list[dis_partnership_id]['total_down']   = Numeric.toInt(total_down);
        discount_list[dis_partnership_id]['partnership_id']  = $("#discount_partnership").val();
        if(count == 1)
            description = description + ' Partnership: ' + $("#discount_partnership option:selected").text();
        else
            description = description + ', Partnership: ' + $("#discount_partnership option:selected").text();
    }
    $(this).dialog('close');
    var str_json_discount = '';
    var str_json_discount = JSON.stringify(discount_list);
    if (description != "Chiết khấu: ") $('#description').val(description);
    else $('#description').val('');
    $('#discount_list').val(str_json_discount);


    $('#discount_amount').val($('.dis_final_discount').text());
    $('#discount_percent').val($('.dis_final_discount_percent').val());
    $('#sub_discount_amount').val($('.dis_discount_amount').text());
    $('#sub_discount_percent').val($('.dis_discount_percent').text());
}

function switchPaymentType(){
    var type = $('#payment_type').val();
    if(record_id == ''){  //In Case Create
        $('#tuition_hours').val('');
        $('#tuition_fee').val('');
        $('#amount_bef_discount').val('');
        $('.dis_check').prop('checked',false);
        submitDiscount();
        caculated();
    }
    switch (type) {
        case 'Cashholder':
            $('#tuition_hours').prop('readonly',false).removeClass('input_readonly');
            $('#amount_bef_discount').prop('readonly',true).addClass('input_readonly');
            $('#payment_amount').prop('readonly',true).addClass('input_readonly');

            $('.tuition_hours, .coursefee').show();

            $('#detailpanel_2').hide();
            $('#sponsor_percent').closest('table').closest('tr').show();
            $('#btn_get_discount').closest('tr').show();
            $('#discount_amount').closest('table').closest('tr').show();
            $('#total_after_discount').closest('table').closest('tr').show();
            $('#amount_bef_discount').closest('table').closest('tr').show();
            $('#kind_of_course').closest('tr').show();
            addToValidate('EditView','kind_of_course','enum',true,SUGAR.language.get('J_Payment', 'LBL_KIND_OF_COURSE'))
            $('#kind_of_course_label').find('.required').show();
            break;
        case 'Outing Trip':
            $('.tuition_hours, .coursefee').hide();
            $('#tuition_hours').val('');
            $('#amount_bef_discount').prop('readonly',false).removeClass('input_readonly');
            $('#payment_amount').prop('readonly',true).addClass('input_readonly');

            $('#detailpanel_2').hide();
            $('#sponsor_percent').closest('table').closest('tr').show();
            $('#btn_get_discount').closest('tr').show();
            $('#discount_amount').closest('table').closest('tr').hide();
            $('#total_after_discount').closest('table').closest('tr').show();
            $('#amount_bef_discount').closest('table').closest('tr').show();
            $('#kind_of_course').closest('tr').hide();
            removeFromValidate('EditView','kind_of_course');
            $('#kind_of_course_label').find('.required').show();
            $("#coursefee").val("");
            break;
        case 'Deposit':
            $('#amount_bef_discount').prop('readonly',true).addClass('input_readonly');
            $('#payment_amount').prop('readonly',false).removeClass('input_readonly');
            $('#tuition_hours').prop('readonly',true).addClass('input_readonly');
            $('#detailpanel_2').hide();
            $('#sponsor_percent').closest('table').closest('tr').hide();
            $('#btn_get_discount').closest('tr').hide();
            $('#discount_amount').closest('table').closest('tr').hide();
            $('#total_after_discount').closest('tr').hide();
            $('#amount_bef_discount').closest('table').closest('tr').hide();
            $('#kind_of_course').closest('tr').show();
            addToValidate('EditView','kind_of_course','enum',true,SUGAR.language.get('J_Payment', 'LBL_KIND_OF_COURSE'))
            $('#kind_of_course_label').find('.required').show();
            $("#coursefee").val("")
            break;
        case 'Placement Test':
        case 'Cambridge':
            $('#amount_bef_discount').prop('readonly',true).addClass('input_readonly');
            $('#payment_amount').prop('readonly',false).removeClass('input_readonly');
            $('#tuition_hours').prop('readonly',true).addClass('input_readonly');
            $('#detailpanel_2').hide();
            $('#sponsor_percent').closest('table').closest('tr').hide();
            $('#btn_get_discount').closest('tr').hide();
            $('#discount_amount').closest('table').closest('tr').hide();
            $('#total_after_discount').closest('tr').hide();
            $('#amount_bef_discount').closest('table').closest('tr').hide();
            $('#kind_of_course').closest('tr').hide();
            removeFromValidate('EditView','kind_of_course');
            $('#kind_of_course_label').find('.required').hide();
            $("#coursefee").val("");
            break;
        case 'Book/Gift':
            $('#detailpanel_2').show();

            $('#tuition_hours, #payment_amount').prop('readonly',true).addClass('input_readonly');
            $('#sponsor_percent').closest('table').closest('tr').hide();
            $('#btn_get_discount').closest('tr').show();
            $('#total_after_discount').closest('tr').hide();
            $('#btn_get_discount').closest('tr').hide();
            $('#discount_amount').closest('table').closest('tr').hide();
            $('#amount_bef_discount').closest('table').closest('tr').hide();
            $('#kind_of_course').closest('tr').hide();
            removeFromValidate('EditView','kind_of_course');
            $('#kind_of_course_label').find('.required').hide();
            $("#coursefee").val("");
            break;
    }
}

//Open Popup Book
function set_book_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'book_id':
                    $('#tblbook tbody tr:eq('+book_index+')').find('.book_id').val(val);
                    break;
                case 'book_name':
                    $('#tblbook tbody tr:eq('+book_index+')').find('.book_name').val(val);
                    $('.book_name').trigger('change');
                    break;
                case 'book_price':
                    $('#tblbook tbody tr:eq('+book_index+')').find('.book_price').val(Numeric.toInt(val));
                    break;
            }
            calBookPayment();
        }
    }
}

function calBookPayment(){
    var total_pay = 0;
    $('#tblbook tbody tr').each(function(index, brand){
        var book_price       =  Numeric.parse($(this).find('.book_price').val());
        var book_quantity    =  $(this).find('.book_quantity').val();
        total_pay = total_pay + (book_price * book_quantity);
    });
    $('#total_book_pay').val(Numeric.toFloat(total_pay));
    if($('#charge_book').is(':checked'))
        $('#payment_amount').val('0');
    else
        $('#payment_amount').val(Numeric.toFloat(total_pay));
    autoGeneratePayment();
}
function handleRemoveRow(){
    calBookPayment();
}

//Validate start study date
function validateStart(){
    $classStart   = SUGAR.util.DateUtils.parse($('#class_start').val(),cal_date_format).getTime();
    $classEnd     = SUGAR.util.DateUtils.parse($('#class_end').val(),cal_date_format).getTime();
    //get date start study
    $date_start = SUGAR.util.DateUtils.parse($('#start_study').val(),cal_date_format);
    if($date_start==false){
        alertify.error('Invalid date');
        $('#start_study').val('');
    }else{
        $start = $date_start.getTime();
        if($start < $classStart || $start > $classEnd){
            alertify.error('Invalid date range. Please, choose another date!!')
            $('#start_study').val('');
        }
    }
}

//Validate start study date
function validateEnd(){
    $classStart   = SUGAR.util.DateUtils.parse($('#class_start').val(),cal_date_format).getTime();
    $classEnd     = SUGAR.util.DateUtils.parse($('#class_end').val(),cal_date_format).getTime();
    //get date start study
    $date_end = SUGAR.util.DateUtils.parse($('#end_study').val(),cal_date_format);
    if($date_end==false){
        alertify.error('Invalid date');
        $('#end_study').val('');
    }else{
        $end = $date_end.getTime();
        if($end < $classStart || $end > $classEnd){
            alertify.error('Invalid date range. Please, choose another date!!')
        }
    }
}

// check available discount
function checkAvailableDiscount(focus){
    var status = "";
    var discountId = focus.closest('tr').find(".dis_check").val();
    var discountName = focus.closest('tr').find(".dis_name").text();
    //Reward or Partnership
    if (focus.attr("name") == "discount_reward"){
        if (focus.val() == "") status = "unselected";
        else status = "selected";
    }
    else if (focus.attr("name") == "discount_partnership"){
        if (focus.val() == "") status = "unselected";
        else status = "selected";
    }
    //Other
    else{
        if (focus.prop("checked")) status = "selected";
        else status = "unselected";
    }

    /*
    *   Neu status la selected
    *   1. Lay danh sach "do not apply with" cua discount dang chon.
    *   2. Check tung dong va lock nhung disount trong danh sach.
    */
    if (status == "selected"){
        var disableList = focus.closest("tr").find(".disable_discount_list").val();
        var disableBy = focus.closest("tr").find(".dis_name").text();
        if (disableList != ""){
            disableList = JSON.parse(disableList);
            var message = SUGAR.language.get('J_Payment', 'LBL_ALERT_DISABLE_DISCOUNT') + disableBy;
            $("#table_discount tbody .discount_row").each(function(){
                var curDiscountId = $(this).find(".dis_check").val();
                if ($.inArray(curDiscountId,disableList) != -1) lockDiscount($(this),message);
            });
        }
    }
    /*
    *   Neu status la unselected
    *   1. Lay danh sach "do not apply with" cua tat ca discount dang chon.
    *   2. Lay danh sach discount da su dung cho nhung payment dang chon tren payment list.
    *   3. Chay tung discount dang bi khoa: neu khong thuoc danh sach tren thi unlock
    */
    else{
        //Lay danh sach "do not apply with" cua tat ca discount dang chon
        var disableList = {};
        if ($("#discount_reward").val() != "" && $("#discount_reward").val() != null){
            var disableOfReward = $("#discount_reward").closest("tr").find(".disable_discount_list").val();
            if (disableOfReward != ""){
                disableOfReward = JSON.parse(disableOfReward);
                disableList["Reward"] = disableOfReward;
            }
        }
        if ($("#discount_partnership").val() != "" && $("#discount_partnership").val() != null){
            var disableOfPartnership = $("#discount_partnership").closest("tr").find(".disable_discount_list").val();
            if (disableOfPartnership != ""){
                disableOfPartnership = JSON.parse(disableOfPartnership);
                disableList["Partnership"] = disableOfPartnership;
            }
        }
        $('.dis_check:checked').each(function(){
            var disableOfDiscount = $(this).closest("tr").find(".disable_discount_list").val();
            var disableBy = $(this).closest("tr").find(".dis_name").text();
            if (disableOfDiscount != ""){
                disableOfDiscount = JSON.parse(disableOfDiscount);
                disableList[disableBy] = disableOfDiscount;
            }
        })
        //TODO Lay danh sach discount da su dung trong payment dang chon
        $('.pay_check:checked').each(function(){
            var usedDiscount = $(this).closest("tr").find(".used_discount").val();
            var paymentName = $(this).closest("tr").find("td:eq(1)").text();
            if (usedDiscount != ""){
                usedDiscount = JSON.parse(usedDiscount);
                disableList[paymentName] = usedDiscount;
            }
        })

        //Chay tung discount dang khoa, neu khong thuoc danh sach thi mo khoa
        //Neu thuoc array thi update title
        $("#table_discount tbody .locked").each(function(){
            var curDiscountId = $(this).find(".dis_check").val();

            for (var key in disableList) {
                if ($.inArray(curDiscountId,disableList[key]) != -1){
                    var mes = SUGAR.language.get('J_Payment', 'LBL_ALERT_DISABLE_DISCOUNT') + key;
                    $(this).attr("title",mes);
                    return;
                }
            }
            unlockDiscount($(this));
        })
    }
}

function lockUsedDiscount(focus){
    var usedDiscount = focus.closest("tr").find(".used_discount").val()
    if (usedDiscount != ""){
        usedDiscount = JSON.parse(usedDiscount);
        var paymentName = focus.closest("tr").find("td:eq(1)").text();
        var message = SUGAR.language.get('J_Payment', 'LBL_ALERT_USED_DISCOUNT') + paymentName;
        $("#table_discount tbody .discount_row").each(function(){
            var curDiscountId = $(this).find(".dis_check").val();
            if ($.inArray(curDiscountId,usedDiscount) != -1){
                lockDiscount($(this),message);
                checkAvailableDiscount($(this));
            }
        });
    }
}

// lock discount by Tung Bui
function lockDiscount(row,message){
    if (row.find(".dis_check").val() == "Reward"){
        $("#discount_reward option").each(function(){
            if ($(this).text() == "-none-"){
                $(this).prop("selected",true);
            }
            else{
                $(this).prop("disabled",true);
            }
        });
        checkAvailableDiscount($("#discount_reward"));
    }
    else if (row.find(".dis_check").val() == "Partnership"){
        $("#discount_partnership option").each(function(){
            if ($(this).text() == "-none-"){
                $(this).prop("selected",true);
            }
            else{
                $(this).prop("disabled",true);
            }
        })
        checkAvailableDiscount($("#discount_partnership"));
    }
    else {
        row.find(".dis_check").prop("checked",false);
        row.find(".dis_check").hide();
        checkAvailableDiscount($("#dis_check "));
    }

    row.find("td").css("background","bisque");
    row.attr("title",message);
    row.removeClass("unlocked");
    row.addClass("locked");
}

// unlock discount by Tung Bui
function unlockDiscount(row){
    if (row.find(".dis_check").val() == "Reward"){
        $("#discount_reward option").prop("disabled",false);
    }
    else if (row.find(".dis_check").val() == "Partnership"){
        $("#discount_partnership option").prop("disabled",false);
    }
    else row.find(".dis_check").show();

    row.find("td").css("background","");
    row.attr("title","");
    row.removeClass("locked");
    row.addClass("unlocked");

    //if (row.find(".dis_check").val() == "Reward") checkAvailableDiscount($("#discount_reward"));
    //    else if (row.find(".dis_check").val() == "Partnership") checkAvailableDiscount($("#discount_partnership"));
    //    else checkAvailableDiscount(row.find(".dis_check"));

}

function unlockAllDiscount(){
    $("#table_discount tbody .discount_row").each(function(){
        unlockDiscount($(this));
    })
}

function checkAvailableAllDiscount(){
    unlockAllDiscount();

    // Lock discount used in related payment
    $('.pay_check:checked').each(function(){
        //    lockUsedDiscount($(this));
    })

    // Lock discount by "do not apply with"
    if ($("#discount_reward").val() != "" && $("#discount_reward").val() != null){
        checkAvailableDiscount($("#discount_reward"));
    }
    if ($("#discount_partnership").val() != "" && $("#discount_partnership").val() != null){
        checkAvailableDiscount($("#discount_partnership"));
    }
    $('.dis_check:checked').each(function(){
        checkAvailableDiscount($(this));
    })
}

function isInSchedule(checking_date){
    var checking_date = SUGAR.util.DateUtils.parse(checking_date,cal_date_format);
    var count_err = 0;
    $('#classes option:selected').each(function(index, brand){
        obj = JSON.parse($(this).attr("json_ss"));
        if( checking_date != ''){
            flag = SUGAR.util.DateUtils.formatDate(checking_date,false,"Y-m-d") in obj;
            if(flag)
                count_err++;
        }
    });
    if(count_err>0)
        return true;
    else{
        alertify.error('Date not in class schedule !');
        return false;
    }

}

//Add by Tung Bui - 04/01/2016 - show Schedule when select Class
function generateClassSchedule(){
    var html = "";
    $("#classes option:selected").each(function(){
        html += "<b>"+$(this).attr("class_name") + "</b>: "+ $(this).attr("start_date");
        if($(this).attr("class_type") == 'Normal Class') html +=  " - "+ $(this).attr("end_date")
        html += $(this).attr("main_schedule");
    });

    $('#div_sclass_schedule').html(html);
}

function showClassSchedule(){
    if ($("#div_sclass_schedule").is(":visible")){
        $("#div_sclass_schedule").hide();
        $("#btn_show_hide_schedule").val(SUGAR.language.get('J_Payment', 'LBL_SHOW_SCHEDULE'));
    }
    else {
        $("#div_sclass_schedule").show();
        $("#btn_show_hide_schedule").val(SUGAR.language.get('J_Payment', 'LBL_HIDE_SCHEDULE'));
    }
}
function isEmpty(str) {
    return typeof str == 'string' && !str.trim() || typeof str == 'undefined' || str === null;
}




