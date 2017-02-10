<?php /* Smarty version 2.6.11, created on 2017-02-07 13:25:48
         compiled from custom/modules/J_Class/tpls/delayClass.tpl */ ?>
<div id="delay_class_dialog" title="Delay Class" style="display:none;">
        <input id="dl_student_id" type="hidden" value=""/>
        <input id="dl_situation_id" type="hidden" value=""/>
        <input id="dl_payment_date_date" type="hidden" value=""/>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>THAO TÁC DELAY HỌC VIÊN. Vui lòng làm theo từng bước bên dưới.<br>
        <br> Họ Tên: <span id='dl_student_name'></span><br>
        <br> Thời gian học trong lớp này: <span id='dl_start'></span> - <span id='dl_end'></span><br>
        <br> Tổng số giờ:  <span id='dl_total_hour' style="font-weight:bold;"></span>  Tổng số tiền: <span id='dl_total_amount' style="font-weight:bold;"></span><br>
        <br> Lịch học của lớp: <span id='dl_schedule'><?php echo $this->_tpl_vars['SCHEDULE']; ?>
</span><br>
        <b>Bước 1:</b> Chọn khoảng thời gian delay <span style="color:red;">*</span><br><br>
        Delay từ:
        <span class="dateTime" style="margin-right: 70px;margin-left: 10px;">
            <input disabled name="dl_from_date" size="10" id="dl_from_date" type="text" value="<?php echo $this->_tpl_vars['today']; ?>
">
            <img border="0" src="custom/themes/default/images/jscalendar.png" alt="From Date" id="dl_from_date_trigger" align="absmiddle"></span>
        Delay đến:
        <span class="dateTime" style="margin-left: 10px;">
            <input disabled name="dl_to_date" size="10" id="dl_to_date" type="text" value="">
            <img border="0" src="custom/themes/default/images/jscalendar.png" alt="To Date" id="dl_to_date_trigger" align="absmiddle"></span>

        <br><br> <b>Bước 2:</b> Tính toán số dư của học viên<br><br>
        <table style="width: 520px !important;">
            <tbody>
                <tr>
                	 <td width="20%"> <span>Số giờ đã học: </span></td>
                	 <td width="30%"> <span id="dl_studied_hour" style="font-weight:bold;">0</span></td>
                	 <td width="20%"> <span>Số tiền đã học: </span></td>
                	 <td width="30%"> <span id="dl_studied_amount" style="font-weight:bold;">0</span></td>
                </tr>
                <tr>
                	<td width="20%"><span>Số giờ Delay: </span></td>
                	<td width="30%"><span id="dl_delay_hour" style="font-weight:bold;">0</span> </td>
                	<td width="20%"><span>Số tiền Delay: </span></td>
                	<td width="30%"><span id="dl_delay_amount" style="font-weight:bold;">0</span></td>
                </tr>
                <tr>
                <td colspan="2" align="left">Ngày thực hiện delay:<span style="color:red;">*</span> <span class="dateTime" style="margin-right: 70px;margin-left: 10px;"></td>
                <td colspan="2"><input disabled name="dl_payment_date" size="10" id="dl_payment_date" type="text" value="">
                    <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Delay Payment Date" id="dl_payment_date_trigger" align="absmiddle"></span></td>
                </tr>
            </tbody>
        </table>
        <br>
        <b>Bước 3: Nêu lý do Delay học viên <span style="color:red;">*</span></b><br>
        <textarea cols="50" rows="2" style="margin-top: 5px;" id="dl_reason"></textarea><br>
        <b>Bước 4:</b>
        <br>Click <b>Save</b> : Số dư được chuyển vào Payment của học viên. Delay Payment có thể sử dụng để đăng ký một khóa học khác, refund hoặc transfer.<br>
        Click <b>Cancel</b> :Để hủy bỏ thao tác<br><br>
        <span id = "save_loading" style="display:none;">Loading.. <img src="custom/include/images/loader.gif" align="absmiddle" width="16"></span>
</div>