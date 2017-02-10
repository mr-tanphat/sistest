<?php
    include_once('custom/include/_helper/studySchedule.php');

    $weekday = $_POST['weekday'];

    $num_date = howManyDates($_POST['start_date'],$_POST['end_date'],$weekday);
    if($num_date['count_holiday'] > 0)
        $htm_holi = "<br>Total holiday found: <b style='color:#FFB800;'> ".$num_date['count_holiday']." Public holiday(s)</b><br>".$num_date['list_holiday']."<span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 10px 0;'></span> System does not create any session in the holidays";
     
     if($num_date['count_passed'] > 0)
        $htm_passed = "<br>Total day passed: <b style='color:red;'> ".$num_date['count_passed']." day(s)</b><br><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 10px 0;'></span> System does not create any session in the pass because the data_lock funtion now is activated. Please, contact system administrator for more details.";
    
    
    $html = "<div class='page-header'nowrap>
    <h1></h1>
    <h2 align = 'center'>Time Table </h2>
    <div class='block_demo'><h5 style='width:400px;margin: 15px auto;'> Scheduling from {$_POST['start_date']} to {$_POST['end_date']}</h5>
    <br>The session(s) will be created: <b style='color:#468931;'> ".$num_date['count_date']." session(s)</b><br>
    $htm_passed<br>
    $htm_holi<br></div>";
    $num_date['count_date'] == 0 ? $html .= "<h5 align = 'center'> You can not create schedule !!</h5></div>" : $html .= "</div>";

    //Kiem tra lop co hoc vien hay ko
    $numOfStu = (int)$GLOBALS['db']->getOne("SELECT DISTINCT COUNT(IFNULL(contacts.id,'')) num_of_stu FROM contacts INNER JOIN c_classes_contacts_1_c l1_1 ON contacts.id=l1_1.c_classes_contacts_1contacts_idb AND l1_1.deleted=0 INNER JOIN c_classes l1 ON l1.id=l1_1.c_classes_contacts_1c_classes_ida AND l1.deleted=0 WHERE (((l1.id='{$_POST['class_id']}' ))) AND contacts.deleted=0");
    $th_confirm = '';
    $td_confirm = '';
    $col_span_1 = '4';
    $col_span_2 = '2';
    if($numOfStu > 0){
        $th_confirm = "<th>Add students to sessions ?</th>";
        $td_confirm = "<td><select class='confirm_add_students'><option value = 'Yes'>Yes to all</option><option value = 'No'>No to all</option></select></td>";
        $col_span_1 = '5';
        $col_span_2 = '3';
    }
    //END


    //Check number of date = 0 thi khong tao session
    $js = '';
    if($num_date['count_date'] > 0 ){
        $html .= "<table class = 'table_config' width = '90%'> ";
        $html .= "<thead>
        <tr><th>Days</th><th>Time Slot <span class='required'>*</span></td><th>Teacher <span class='required'>*</span></th><th>Room <span class='required'>*</span></th>$th_confirm<th class='hour_item'>Delivery Hour(s)  </th><th class='hour_item'>Teaching Hour(s)</th></tr>
        </thead>
        <tbody>";
        foreach($weekday as $wd){
            $html .= "
            <tr>
            <td nowrap align='left'>".'<b>'.date('l',strtotime($wd)).":</b> (".$num_date[arr_by_wd][$wd]." ss)"."</td>

            <td nowrap align='center'>
            <input class='start_time' type='text' style='width: 70px; text-align: center;'/>
            - to -
            <input class='end_time' type='text' style='width: 70px; text-align: center;'/>
            <input class='btn_find' type='button' name='btn_find' value='Find' id='{$wd}' style='color: green;'>
            <span class = 'loading'></span>
            </td>

            <td nowrap align='center' class='select_teacher'>                    
            <select name='select_teacher' style='width:200px' > 
            <option value=''></option>
            </select>
            </td>

            <td nowrap align='center' class='select_room'>
            <select name='select_room' style='width:200px' > 
            <option value=''></option>
            </select>
            </td>

            $td_confirm

            <td nowrap align='left' class='hour_item'><input type='text' class='delivery_hours' style='width: 70px; text-align: center;'/></td>
            <td nowrap align='left' class='hour_item'><input type='text' class='teaching_hours' style='width: 70px; text-align: center;'/></td>
            </tr>";
        }
        $html .= "
        </tbody>
        <tfoot>
        <tr>

        <td NOWRAP colspan='$col_span_1' style='text-align: center'>
        <input class='button primary' type='button' value='Apply' id='btn_apply' onclick=\"if(validate_apply())ajaxSaveSession();else alertify.error('{$GLOBALS['mod_strings']['LBL_ERROR_3']}');\">
        <span class='loading2'></span>
        <input class='button' type='button' value='Clear' id= 'tb_clear' style='color: blue;' onclick=\"diableAndClear('bot',false)\">
        <a id='show_info' title='Show' style='color: blue; cursor:pointer; float:right;'>Edit Hour Fields </a>
        </td>
        <td NOWRAP colspan='$col_span_2' style='text-align: right' class='hour_item'> 
        <a id='hide_info' title='Hide' style='color: blue; cursor:pointer; float:right;'>Hide</a></td>
        </tr>
        </tfoot>
        ";
        $html .= "</table>";

        $js = 
        <<<EOQ
    <script>
        $("input.start_time").timepicker({'timeFormat': SUGAR.expressions.userPrefs.timef,'minTime': '7:00am','maxTime': '9:30pm','step': 15});
        $("input.end_time").timepicker({'timeFormat': SUGAR.expressions.userPrefs.timef,'minTime': '7:00am','maxTime': '9:30pm','step': 15});
        
        $("select[name=select_teacher]").select2({placeholder: "Select Teacher",allowClear: true});    
        $("select[name=select_room]").select2({placeholder: "Select Room",allowClear: true});
            
        $('#tb_clear').live('click',function(){
            $("input.start_time").val('');
            $("input.end_time").val('');
            });
            
        $(".btn_find").click(function(){
            
            var start_time = $(this).closest("tr").find(".start_time");
            var end_time = $(this).closest("tr").find(".end_time");
            var delivery_hours = $(this).closest("tr").find(".delivery_hours");
            var teaching_hours = $(this).closest("tr").find(".teaching_hours");
            
            var js_start = SUGAR.util.DateUtils.parse(start_time.val(),SUGAR.expressions.userPrefs.timef);
            var js_end = SUGAR.util.DateUtils.parse(end_time.val(),SUGAR.expressions.userPrefs.timef);
            
            
            var closest_tr = $(this).closest('tr');
                         
            if(js_start >= js_end) {
                end_time.addClass("error");
                alertify.error(SUGAR.language.get('C_Classes','LBL_TIME_ERROR'));
                
                
                }else if(!isTime(start_time.val()) || !isTime(end_time.val()) || end_time.val()=='' || start_time.val()==''){                            
                            start_time.addClass("error");
                            end_time.addClass("error");
                            
                            alertify.error(SUGAR.language.get('C_Classes','LBL_TIME_ERROR')); 
                        
                        }else{
                            start_time.removeClass("error");
                            end_time.removeClass("error");
                            delivery_hours.val(formatNumber(((js_end - js_start)/3600000),num_grp_sep,dec_sep,2,2));
                            if($('#class_type').val() == 'Connect Club')
                            teaching_hours.val(formatNumber(((js_end - js_start)/3600000),num_grp_sep,dec_sep,2,2));
                            else
                            teaching_hours.val(formatNumber(((js_end - js_start)/3600000),num_grp_sep,dec_sep,2,2));
                            
                            closest_tr.find('span.loading').html('<img src="custom/include/images/loader.gif" align="absmiddle" width="16">');
                            start_time.prop('disabled',true);
                            end_time.prop('disabled',true);
                            $.ajax({
                                
                                url:"index.php?module=C_Classes&action=ajaxGetRoom_Teacher&sugar_body_only=true",
                                type: "POST",
                                async: true,
                                data:{
                                    class_id : $('#class_id').val(),
                                    start_time : start_time.val(),
                                    end_time : end_time.val(),
                                    weekday : closest_tr.find('input[name=btn_find]').attr('id'),
                                    start_date : $('#start_date').val(),
                                    end_date : $('#end_date').val(), 
                                },
                                dataType: "json",
                                success: function(res){
                                    if(res.success == "3"){
                                        closest_tr.find('.select_teacher').html(res.teacher_option);
                                        closest_tr.find('.select_room').html(res.room_option);
                                        }
                                    if(res.success == "2"){
                                    alertify.error(SUGAR.language.get('C_Classes','LBL_NOT_FOUND_ROOM')); 
                                    }
                                    if(res.success == "1"){
                                    alertify.error(SUGAR.language.get('C_Classes','LBL_NOT_FOUND_TEACHER')); 
                                    }
                                        closest_tr.find('span.loading').html('');
                                }
                            });                          
                        }
        });
                
         function validate_apply(){
         var error = 0;
         $("select[name=select_room]").each(function() {
            if($(this).val() == '') error+=1; 
         });
         
         $("select[name=select_teacher]").each(function() {
            if($(this).val() == '') error+=1;
         });
         
         $(".teaching_hours").each(function() {
            if($(this).val() != '' && $(this).val() < 0) error+=1;
         });
         
         $(".delivery_hours").each(function() {
            if($(this).val() != '' && $(this).val() < 0) error+=1;
         });
         
         if(error == 0) return true;
         else return false; 
       }
       function ajaxSaveSession(){
       var week_day = [];
       $("input[name='week_date']").each(function(){
        if($(this).is(':checked'))  
            week_day.push($(this).val());
        });
        
       var start_time = [];
       $(".start_time").each(function(){ 
            start_time.push($(this).val());
        });
        
        var end_time = [];
        $(".end_time").each(function(){ 
            end_time.push($(this).val());
        });
        
        var delivery_hours = [];
        $(".delivery_hours").each(function(){ 
            delivery_hours.push($(this).val());
        });  
        
        var teaching_hours = [];
        $(".teaching_hours").each(function(){ 
            teaching_hours.push($(this).val());
        });
        
        var add_students = [];
        $(".confirm_add_students").each(function(){ 
            add_students.push($(this).val());
        });                            
                                    
        var teachers = [];
        var teachers_name = [];
        $("select[name=select_teacher]").each(function() {
            teachers.push($(this).val());
            teachers_name.push($(this).select2('data').text);
         });
        
        var rooms = [];
        var rooms_name = [];
        $("select[name=select_room]").each(function() {
            rooms.push($(this).val());
            rooms_name.push($(this).select2('data').text);
         });  
       $('span.loading2').html('<img src="custom/include/images/loader.gif" align="absmiddle" width="16">'); 
       $('#btn_apply, #tb_clear').prop('disabled',true);
       $.ajax({
        url: "index.php?module=C_Classes&action=ajaxSaveSession&sugar_body_only=true",
        type: "POST",
        async: true,
        data:  
        {
            class_id: $('#class_id').val(),
            week_day: week_day,
            start_date: $('#start_date').val(),
            end_date: $('#end_date').val(),
            start_time: start_time,
            end_time: end_time,
            delivery_hours: delivery_hours,
            teaching_hours: teaching_hours,
            add_students: add_students,
            teachers: teachers,
            teachers_name: teachers_name,
            rooms: rooms,
            rooms_name: rooms_name,
        },
        success: function(res){
             alertify.success('{$GLOBALS['mod_strings']['LBL_SUCCESS_1']}');
             diableAndClear('bot',true);               
             $('span.loading2').html('');   
        },        
    });
       }
       
       $(document).ready(function() {
       $('.hour_item, #hide_info').hide();
       $('#show_info').show();
       $('#show_info').live('click',function(){
       $('.hour_item, #hide_info').slideDown();
       $('#show_info').hide();
       });
       $('#hide_info').live('click',function(){
       $('.hour_item, #hide_info').hide();
       $('#show_info').slideDown();
       });
       });
   
    </script>
EOQ;
    }

    echo json_encode(array(
        "success" => "1",
        "html" => $html.$js,
    ));

    function howManyDates($start_date,$end_date,$weekday){
        global $timedate;
        $count = 0;
        $count_holiday = 0;
        $count_passed = 0;
        $arr_date = array();
        $arr_by_wd = array();
        $now_date = strtotime($timedate->nowDbDate());
        foreach($weekday as $wd){
            $arr_wk = get_array_weekdates($start_date,$end_date,$wd);
            //Check lock info - By Lap Nguyen
            foreach($arr_wk as $key=>$value){
                $check_date = strtotime('first day of next month '.$timedate->to_db_date($value,false)) + ( (intval($GLOBALS['sugar_config']['lock_date']) - 1) * 86400 );
                if( $GLOBALS['sugar_config']['lock_info'] && ($now_date > $check_date) && (!$GLOBALS['current_user']->isAdminForModule('Users'))){
                    unset($arr_wk[$key]);
                    $count_passed++; 
                }
            }
            //END Checking lock info
            $arr_by_wd[$wd] = $arr_wk;
            $arr_date = array_merge($arr_date, $arr_wk);
        }


        //Get list holiday
        $arr_holiday = array();
        $q1 = "SELECT id, holiday_date, description FROM holidays WHERE deleted = 0 AND type = 'Public Holiday'";
        $rs1 = $GLOBALS['db']->query($q1);
        while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
            $holiday = $timedate->to_display_date($row['holiday_date']);
            $arr_holiday[] = $holiday;
            if(in_array($holiday,$arr_date)){
                $count_holiday++;
                (!empty($row['description']))  ? $list_holiday .= $timedate->to_display_date($row['holiday_date']).': '.$row['description'].'<br>' : $list_holiday .= $timedate->to_display_date($row['holiday_date']).'<br>';
            }
        }
        foreach($arr_by_wd as $key => $value){
            $arr_by_wd[$key] = count(array_diff($value, $arr_holiday));
        }
        $arr_date = array_diff($arr_date, $arr_holiday);
        $count = count($arr_date);

        return array('count_date' => $count,'count_holiday' => $count_holiday,'list_holiday' => $list_holiday, 'arr_by_wd' => $arr_by_wd, 'count_passed' => $count_passed);
    }
?>