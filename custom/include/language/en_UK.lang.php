<?php
    $app_strings['LBL_THONGBAO_VAOLOP'] = '<body>
    <div id="dialog-confirm" title="Thông báo" style="display:none;">
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">
    </span>Lớp này đã bắt đầu học và có thể có 1 số buổi học đã kết thúc.  Bạn có đồng ý với thao tác này ?<br><br>
    Bấm <strong>Thêm vào tất cả các buổi</strong>: Học viên sẽ có mặt ở tất cả các buổi học và học phí sẽ tính trên tất cả các buổi của lớp này.<br><br>
    Bấm <strong>Chỉ thêm vào các buổi chưa bắt đầu</strong>: Học viên sẽ có chỉ có mặt buổi học chưa bắt đầu và học phí sẽ chỉ được tính trên các buổi chưa học của lớp này.
    </div>
    </body>';

    $app_strings['LBL_THONGBAO_MOVESTUDENT'] = '<body>
    <div id="dialog-confirm_5" title="Thông báo" style="display:none;">
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">
    </span>Trước khi chuyển học viên sang trung tâm khác, bạn có muốn bảo lưu học viên tại trung tâm hiện tại không?<br><br>
    Bấm <strong>Suspend & Move Student</strong>:  Học viên sẽ bị xóa khỏi tất cả các buổi học chưa bắt đầu và doanh thu sẽ được tính trên các buổi đã bắt đầu.<br><br>
    Bấm <strong>Move Student</strong>: Vẫn giữ học viên trong các buổi đã chưa bắt đầu và doanh thu sẽ được tính trên tất cả các buổi đã và chưa bắt đầu.
    </div>
    </body>';

    $app_strings['LBL_THONGBAO_XOAKHOILOP'] = '<body>
    <div id="dialog-confirm" title="Thông báo" style="display:none;">
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">
    </span>Khi thực hiện thao tác xóa học viên ra khỏi lớp, học viên sẽ bị xóa khỏi tất cả các buổi học của lớp này. Bạn có đồng ý với thao tác này ?<br><br>
    <strong>Gợi ý</strong>: Nếu bạn chỉ muốn xóa học viên ra khỏi 1 buổi học của lớp thì bạn hãy vào màn hình chi tiết của buổi học đó và thao tác xóa học viên ra khỏi buổi.<br>
    </div>
    </body>';
    $app_strings['LBL_THONGBAO_UPGRADE'] = '<body>
    <div id="dialog-confirm_2" title="Thông báo" style="display:none;">
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">
    </span>Tất cả học viên trong lớp này sẽ được thêm vào danh sách lớp học mới. Bấm nút đồng ý để tiếp tục<br><br>
    <strong>Chú ý</strong>: Bởi vì chức năng này sẽ copy toàn bộ học viên lên lớp mới nên sau khi upgrade thành công, bạn có thể xóa bớt học viên ra khỏi lớp mới bằng chức năng Remove.<br>
    </div>
    </body>';
    $app_strings['LBL_THONGBAO_MOVE'] = '<body>
    <div id="dialog-confirm_3" title="Thông báo" style="display:none;">
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">
    </span>Lớp này đã bắt đầu học và có thể có 1 số buổi học đã kết thúc.  Bạn có đồng ý với thao tác này ?<br><br>
    Bấm <strong>Thêm vào tất cả các buổi</strong>: Học viên sẽ có mặt ở tất cả các buổi học và học phí sẽ tính trên tất cả các buổi của lớp này.<br><br>
    Bấm <strong>Chỉ thêm vào các buổi chưa bắt đầu</strong>: Học viên sẽ có chỉ có mặt buổi học chưa bắt đầu và học phí sẽ chỉ được tính trên các buổi chưa học của lớp này.<br><br>
    <strong>Chú ý</strong>: Bởi vì chức năng này không xóa lịch sử học của học viên tại lớp cũ. Nếu bạn muốn xóa lịch sử học của học viên tại lớp cũ thì dùng chức năng Remove.
    </div>
    </body>';


    $app_strings['LBL_THONGBAO_SUSPEND'] = '<body>
    <div id="dialog-confirm" title="Thông báo" style="display:none;">
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">
    </span>Khi thực hiện thao tác bảo lưu hồ sơ học viên, học viên sẽ bị xóa khỏi tất cả các buổi học chưa bắt đầu. Bạn có đồng ý với thao tác này ?<br><br>
    </div>
    </body>';

    $app_list_strings['extapi_meeting_password'] = array (
        'GoToMeeting' => 'GoToMeeting',
        'WebEx' => 'WebEx',
    );
    //Custom lable - BY Lap Nguyen
    $app_strings['LBL_QUICK_REPAIR_AND_REBUILD'] = 'Quick Repair';
    $app_strings['LBL_STUDIO'] = 'Studio';
    $app_strings['LBL_REPAIR_RELATIONSHIP'] = 'Repair relationship';
    $app_strings['LBL_DISPLAY_MODULES'] = 'Display Modules and Subpanels';
    $app_list_strings['menthod_payments_list'] = array (
        'Cash' => 'Cash',
        'CreditDebitCard' => 'Card',
        'BankTranfer' => 'Bank Transfer',
        'Loan' => 'Loan',
        'Other' => 'Other',
    );
    $app_list_strings['discount_in_payment_list'] = array (
        'Cash' => '0',
        'CreditDebitCard' => '0',
        'BankTranfer' => '0',
        'Loan' => '0',
    );

    $app_list_strings['type_meeting_list'] = array (
        'Meeting' => 'Meeting',
        //'Consultant' => 'Consultant',
        'Placement Test' => 'Placement Test',
        'Session' => 'Session',
        'Demo' => 'Demo'
    );
    $app_list_strings['level_lead_list'] = array (
        'High' => 'High',
        'Medium' => 'Medium',
        'Low' => 'Low',
    );
    $app_list_strings['gender_lead_list'] = array (
        'Male' => 'Male',
        'Female' => 'Female',
    );
    $app_list_strings['flexparent_options'] = array (
        'Leads' => 'Lead',
        'Contacts' => 'Student',
    );
    $app_list_strings['sales_stage_dom'] = array (
        'Success' => 'Success',
        'Closed' => 'Closed',
        'Deleted' => 'Deleted',
    );
    $app_list_strings['student_type_list'] = array (
        'Public' => 'Public',
        'Corporate' => 'Corporate',
        'Public/Corp' => 'Public from Corp',
    );
    $app_list_strings['lead_source_dom'] = array (
        '' => '',
        'Cold Call' => 'Cold Call',
        'Corporate' => 'Corporate',
        'Existing Customer' => 'Existing Customer',
        'Friends/Relatives' => 'Friends/Relatives',
        'SMS Marketing' => 'SMS Marketing',
        'App' => 'App',
        'Campaign' => 'Campaign',
        'Direct Mail' => 'Direct Mail',
        'Conference' => 'Conference',
        'Trade Show' => 'Trade Show',
        'Web Site' => 'Web Site',
        'Blog' => 'Blog',
        'Facebook' => 'Facebook',
        'Online forum' => 'Online forum',
        'Online advertising' => 'Online advertising',
        'Online Interaction Game' => 'Online Interaction Game',
        'Activation Booth' => 'Activation Booth',
        'Street Banner' => 'Street Banner',
        'Seminar' => 'Seminar',
        'Newspaper' => 'Newspaper',
        'Advertising' => 'Advertising',
        'Walk in' => 'Walk in',
        'University' => 'University',
        'Sponsorship' => 'Sponsorship',
        'Voucher' => 'Voucher',
        'Return Student' => 'Return Student',
        'Other' => 'Other',
    );
    //END - By Lap Nguyen
    $app_list_strings['contact_status_list'] = array (
        'Learning' => 'Learning',
        'Suspended' => 'Suspended',
        'Not In Class' => 'Not In Class',
    );
    $app_list_strings['loan_type_list'] = array (
        '' => '',
        'Cash' => 'Cash',
        'Credit' => 'Credit',
    );
    $app_list_strings['number_of_payments_list'] = array (
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
    );
    $app_list_strings['timesheet_minutes_list'] = array (
        '00' => '00',
        '10' => '10',
        '20' => '20',
        '30' => '30',
        '40' => '40',
        '50' => '50',
    );
    $app_list_strings['timesheet_tasklist_list'] = array (
        '' => '-none-',
        'Event' => 'Event',
        'Marketing' => 'Marketing',
        'Other' => 'Other',
    );
    $app_list_strings['stage_score_list'] = array (
        'Beginner' => 'Beginner',
        'Elementary' => 'Elementary',
        'Pre-Intermediate' => 'Pre-Intermediate',
        'Intermediate' => 'Intermediate',
        'Upper-Intermediate' => 'Upper-Intermediate',
        'Advanced' => 'Advanced',
        'Master' => 'Master',
    );
    $app_list_strings['level_score_list'] = array (
        '-none-' => '-none-',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
    );
    $app_list_strings['case_type_dom'] = array (
        'Complaint' => 'Complaint',
        'Suggestion' => 'Suggestion',
        'Question' => 'Question',
    );
    $app_list_strings['delivery_status_list'] = array (
        'RECEIVED' => 'RECEIVED',
        'FAILED' => 'FAILED',
    );

    $app_strings['LBL_PROMOTION_NAME'] = 'Promotion Name';
    $app_strings['LBL_PROMOTION_DISCOUNT'] = 'Discount (%)';
    $app_strings['LBL_PROMOTION_NOTE'] = 'Promotion Note';
    $app_strings['LBL_PROMOTION_MARKETING%'] = 'Marketing (%)';
    $app_strings['LBL_PROMOTION_CENTER%'] = 'Center (%)';
    $app_strings['LBL_BTN_ADD_ITEM'] = 'Add Discount';
    $app_strings['LBL_BTN_CLOSE'] = 'Close';

    $app_list_strings['moduleList']['Contacts']='Students';
    $app_list_strings['moduleListSingular']['Contacts']='Student';
    $app_list_strings['record_type_display']['Contacts']='Student';
    $app_list_strings['parent_type_display']['Contacts']='Student';
    $app_list_strings['record_type_display_notes']['Contacts']='Student';
    $app_list_strings['moduleList']['Opportunities']='Enrollments';
    $app_list_strings['moduleListSingular']['Opportunities']='Enrollment';
    $app_list_strings['record_type_display']['Opportunities']='Enrollment';
    $app_list_strings['parent_type_display']['Opportunities']='Enrollment';
    $app_list_strings['record_type_display_notes']['Opportunities']='Enrollment';

    //Add Field - Date 14/05 - By Lap Nguyen

    //Add Field - Date 22/05 - By MTN
    $app_list_strings['parent_type_display'] = array (
        'Leads' => 'Lead',
        'Contacts' => 'Student',
        'Opportunities' => 'Enrollment',               
        'Tasks' => 'Task',
        'Prospects' => 'Target',
    );
    $app_list_strings['interval_packages_list'] = array (
        '' => '',
        '3' => '1 month',
        '6' => '3 months',
        '9' => '6 months',
        '12' => '9 months',               
        '15' => '12 months',
        '21' => '18 months',
        '27' => '24 months',
        '0' => ' - infinity - ',
    );
    $app_list_strings['month_list_view'] = array (
        '0'=>"",
        '01'=>"January",
        '02'=>"February",
        '03'=>"March",
        '04'=>"April",
        '05'=>"May",
        '06'=>"June",
        '07'=>"July",
        '08'=>"August",
        '09'=>"September",
        '10'=>"October",
        '11'=>"November",
        '12'=>"December",
    ); 
    $app_list_strings['class_type_list'] = array (
        'Skill' => 'Skill',
        'Connect Club' => 'Connect Club',
        'Practice' => 'Practice',
    );
    $app_list_strings['membership_type_list'] = array (
        'Student' => 'Student',
        'Visitor' => 'Visitor',
    );
    $app_list_strings['schools_list'] = array (
        '' => '',                                     
        'Trường ĐH An ninh Nhân dân' => 'Trường ĐH An ninh Nhân dân',
        'Trường ĐH Bách khoa' => 'Trường ĐH Bách khoa',
        'Trường ĐH Cảnh sát Nhân dân' => 'Trường ĐH Cảnh sát Nhân dân',
        'Trường ĐH Công nghệ Thông tin' => 'Trường ĐH Công nghệ Thông tin',
        'Học viện Công nghệ Bưu chính Viễn thông cơ sở phía Nam'=> 'Học viện Công nghệ Bưu chính Viễn thông cơ sở phía Nam',
        'Trường ĐH Công nghiệp TP.HCM'=> 'Trường ĐH Công nghiệp TP.HCM',
        'Trường ĐH Công nghiệp Thực phẩm TP.HCM'=> 'Trường ĐH Công nghiệp Thực phẩm TP.HCM',
        'Trường ĐH Công nghệ Sài Gòn'=> 'Trường ĐH Công nghệ Sài Gòn',
        'Trường ĐH FPT'=> 'Trường ĐH FPT',
        'Trường ĐH Công nghệ thông tin Gia Định'=> 'Trường ĐH Công nghệ thông tin Gia Định',
        'Trường ĐH Giao thông Vận tải - cơ sở 2 phía Nam'=> 'Trường ĐH Giao thông Vận tải - cơ sở 2 phía Nam',
        'Trường ĐH Giao thông Vận tải TP.HCM'=> 'Trường ĐH Giao thông Vận tải TP.HCM',
        'Trường ĐH Hoa Sen'=> 'Trường ĐH Hoa Sen',
        'Trường ĐH Hùng Vương'=> 'Trường ĐH Hùng Vương',
        'Học viện Hàng không Việt Nam'=> 'Học viện Hàng không Việt Nam',
        'Học viện Hành chính cơ sở phía Nam'=> 'Học viện Hành chính cơ sở phía Nam',
        'Nhạc viện Thành phố Hồ Chí Minh'=> 'Nhạc viện Thành phố Hồ Chí Minh',
        'Trường ĐH Quốc tế Hồng Bàng'=> 'Trường ĐH Quốc tế Hồng Bàng',
        'Trường ĐH Khoa học Tự nhiên'=> 'Trường ĐH Khoa học Tự nhiên',
        'Trường ĐH Khoa học Xã hội và Nhân văn'=> 'Trường ĐH Khoa học Xã hội và Nhân văn',
        'Trường ĐH Kinh tế - Tài chính TP.HCM'=> 'Trường ĐH Kinh tế - Tài chính TP.HCM',
        'Trường ĐH Kinh tế TP.HCM' => 'Trường ĐH Kinh tế TP.HCM',
        'Trường ĐH Kinh tế - Luật' => 'Trường ĐH Kinh tế - Luật',
        'Trường ĐH Kiến trúc TP.HCM' => 'Trường ĐH Kiến trúc TP.HCM',
        'Trường ĐH Công nghệ TP.HCM (HUTECH)'=> 'Trường ĐH Công nghệ TP.HCM (HUTECH)',
        'Trường ĐH Luật TP.HCM'=> 'Trường ĐH Luật TP.HCM',
        'Trường ĐH Lao động - Xã hội (cơ sở 2 TP.HCM)'=> 'Trường ĐH Lao động - Xã hội (cơ sở 2 TP.HCM)',
        'Học viện Kỹ thuật Mật mã cơ sở phía Nam'=> 'Học viện Kỹ thuật Mật mã cơ sở phía Nam',
        'Trường ĐH Mở TP.HCM'=> 'Trường ĐH Mở TP.HCM',
        'Trường ĐH Mỹ thuật TP.HCM'=> 'Trường ĐH Mỹ thuật TP.HCM',
        'Trường ĐH Ngoại ngữ - Tin học TP.HCM'=> 'Trường ĐH Ngoại ngữ - Tin học TP.HCM',
        'Trường ĐH Ngoại thương cơ sỏ phía Nam'=> 'Trường ĐH Ngoại thương cơ sỏ phía Nam',
        'Trường ĐH Ngân hàng TP.HCM'=> 'Trường ĐH Ngân hàng TP.HCM',
        'Trường ĐH Nguyễn Tất Thành'=> 'Trường ĐH Nguyễn Tất Thành',
        'Trường ĐH Nông Lâm TP.HCM'=> 'Trường ĐH Nông Lâm TP.HCM',
        'Trường ĐH Quốc gia Thành phố Hồ Chí Minh'=> 'Trường ĐH Quốc gia Thành phố Hồ Chí Minh',
        'Trường ĐH Quốc tế'=> 'Trường ĐH Quốc tế',
        'Trường ĐH Tư thục Quốc tế Sài Gòn'=> 'Trường ĐH Tư thục Quốc tế Sài Gòn',
        'Trường ĐH Quốc tế RMIT Việt Nam'=> 'Trường ĐH Quốc tế RMIT Việt Nam',
        'Trường ĐH Sài Gòn'=> 'Trường ĐH Sài Gòn',
        'Trường ĐH Sân khấu, Điện ảnh TP.HCM'=> 'Trường ĐH Sân khấu, Điện ảnh TP.HCM',
        'Trường ĐH Sư phạm Kỹ thuật TP.HCM'=> 'Trường ĐH Sư phạm Kỹ thuật TP.HCM',
        'Trường ĐH Sư phạm TP.HCM'=> 'Trường ĐH Sư phạm TP.HCM',
        'Trường ĐH Sư phạm Thể dục Thể thao TP.HCM'=> 'Trường ĐH Sư phạm Thể dục Thể thao TP.HCM',
        'Trường ĐH Tài chính - Marketing'=> 'Trường ĐH Tài chính - Marketing',
        'Trường ĐH Tài nguyên - Môi Trường TP.HCM'=> 'Trường ĐH Tài nguyên - Môi Trường TP.HCM',
        'Trường ĐH Thủy lợi cơ sở 2'=> 'Trường ĐH Thủy lợi cơ sở 2',
        'Trường ĐH Thể dục Thể thao TP.HCM'=> 'Trường ĐH Thể dục Thể thao TP.HCM',
        'Trường ĐH Tôn Đức Thắng'=> 'Trường ĐH Tôn Đức Thắng',
        'Trường ĐH Trần Đại Nghĩa'=> 'Trường ĐH Trần Đại Nghĩa',
        'Trường ĐH Văn Hiến'=> 'Trường ĐH Văn Hiến',
        'Trường ĐH Dân lập Văn Lang'=> 'Trường ĐH Dân lập Văn Lang',
        'Trường ĐH Văn hóa TP.HCM'=> 'Trường ĐH Văn hóa TP.HCM',
        'Trường ĐH Việt Đức'=> 'Trường ĐH Việt Đức',
        'Trường ĐH Y Dược TP.HCM'=> 'Trường ĐH Y Dược TP.HCM',
        'Trường ĐH Y khoa Phạm Ngọc Thạch'=> 'Trường ĐH Y khoa Phạm Ngọc Thạch',
    );

    $app_list_strings['total_hours_list'] = array (
        '' => '',
        '10' => '10',
        '20' => '20',
        '13' => '13',
        '26' => '26',
        '60' => '60',
        '100' => '100',
        '180' => '180',
    ); 
    $app_list_strings['status_invoice_list'] = array (
        'Unpaid' => 'Unpaid',
        'Paid' => 'Paid',
        'Cancel' => 'Cancel',
        'Deleted' => 'Deleted',
    ); 
    $app_list_strings['status_payments_list'] = array (
        'Unpaid' => 'Unpaid',
        'Paid' => 'Paid',
        'Deleted' => 'Deleted',
    );
    $app_list_strings['status_payments_list_2'] = array (
        'Unpaid' => 'Unpaid',
        'Paid' => 'Paid',
    );
    $app_list_strings['payment_type_dom'] = array (
        'Normal' => 'Normal',
        'Deposit' => 'Deposit',
        'Extend Balance' => 'Extend Balance',
        'Placement Test' => 'Placement Test',
        'Penalty' => 'Penalty',
        'FreeBalance' => 'FreeBalance',
        'Moving in' => 'Moving in',
        'Transfer in' => 'Transfer in',
    );

    $app_list_strings['target_status_dom'] = array (
        'New' => 'New',
        'Assigned' => 'Assigned',
    );
    //create by leduytan  15/7/2014
    $app_list_strings['expire_duration_list'] = array (
        '3' => '3 months',
        '6' => '6 months',
        '9' => '9 months',               
        '12' => '12 months',
        '24' => '24 months',
    );
    $app_list_strings['promotions_type_list'] = array (
        'money' => 'money',
        'percentage' => 'percentage',
    );
    //end

    //Add field - 15/07/2014 - by MTN

    $app_list_strings['status_classes_list'] = array (
        'Opened' => 'Opened',
        'Closed' => 'Closed',
    );

    $app_list_strings['teacher_type_list'] = array (
        'Partime' => 'Part-time',
        'Fulltime' => 'Full-time',
    );

    $app_list_strings['teacher_status_list'] = array (
        'Active' => 'Active',
        'Inactive' => 'Inactive',
    );

    $app_list_strings['room_status_list'] = array (
        'Active' => 'Active',
        'Inactive' => 'Inactive',
    );
    $app_list_strings['capacity_list'] = array (
        '10' => '10',
        '20' => '20',
        '25' => '25',
        '30' => '30',
        '35' => '35',
        '40' => '40',
        '45' => '45',
        '50' => '50',
        '55' => '55',
        '60' => '60',
        '65' => '65',
        '70' => '70',
    );

    $app_list_strings['account_status_list'] = array (
        'Learning' => 'Learning',
        'Cancel' => 'Cancel',
        'Finish' => 'Finish',
    );
    $app_list_strings['holiday_type_list'] = array (
        'Holidays' => 'Holidays',
        'Sick Leave' => 'Sick Leave',
        'Unpaid Leave' => 'Unpaid Leave',
        'Marriage Leave' => 'Marriage Leave',
        'Maternity Leave' => 'Maternity Leave',
        'Accident Leave' => 'Accident Leave',
        'Public Holiday' => 'Public Holiday',
    );

    //Add field - 22/07/2014 - by MTN
    $app_list_strings['session_status_list'] = array (
        '' => '',
        'Cancelled' => 'Cancelled',
        'Make-up' => 'Make-up',
        'Cover' => 'Cover',
        'Not Started' => 'Not Started',
        'In Progress' => 'In Progress',
        'Finish' => 'Finish',
    );
    $app_list_strings['refund_type_dom'] = array (
        'Normal' => 'Normal',
        'Moving out' => 'Moving out',
        'Transfer out' => 'Transfer out',
    );
    $app_list_strings['leaving_type_student_list'] = array (
        '' => '',
        'P' => 'Present',
        'A' => 'Absence',
        'L' => 'Late',
    );

    $app_list_strings['moduleList']['Accounts']='Corporates';
    $app_list_strings['moduleListSingular']['Accounts']='Corporate';
    $app_list_strings['record_type_display']['Accounts']='Corporate';
    $app_list_strings['record_type_display_notes']['Accounts']='Corporate';



    $app_strings['LBL_GROUPTAB6_1406016993'] = 'EFL';
    //Datatables Language
    $app_strings['LBL_JDATATABLE1'] = 'Show ';
    $app_strings['LBL_JDATATABLE2'] = ' entries';
    $app_strings['LBL_JDATATABLE3'] = 'Search:';
    $app_strings['LBL_STT_D'] = 'Order';
    $app_strings['LBL_TEN_D'] = 'Name';
    $app_strings['LBL_JDATATABLE6'] = 'Showing  ';
    $app_strings['LBL_JDATATABLE7'] = ' to ';
    $app_strings['LBL_JDATATABLE8'] = ' of total ';
    $app_strings['LBL_JDATATABLE9'] = 'First';
    $app_strings['LBL_JDATATABLE10'] = 'Next';
    $app_strings['LBL_JDATATABLE11'] = 'Previous';
    $app_strings['LBL_JDATATABLE12'] = 'Last';
    $app_strings['LBL_JDATATABLE13'] = 'No matching records found';
    $app_strings['LBL_JDATATABLE14'] = 'No data';
    $app_strings['LBL_JDATATABLE15'] = 'Showing 0 entries';
    $app_strings['LBL_CAMPAIGNS_SEND_SMS_QUEUED'] = 'Send SMS Campaign';
    $app_strings['LBL_GROUPTAB7_1407210988'] = 'New Group';


    //create by leduytan 21/8/2014

    $app_list_strings['card_type_payments_list']=array (
        '' => '',
        'MasterCard' => 'MasterCard',
        'VisaCard' => 'VisaCard',
        'VietcomBank' => 'VietcomBank (VCB)',
        'JCB' => 'JCB',
        'AmericanExpress' => 'American Express (AMEX)',
    );

    $app_list_strings['bank_name_list']=array (
        '' => '',
        'VietcomBank' => 'VietcomBank',
        'Sacombank' => 'Sacombank',
        'TestBank' => 'TestBank',
        'TestBankNo1' => 'TestBankNo1',
    );

    $app_list_strings['loan_rate']=array (
        'VietcomBank' => '1.2|2.8',
        'Sacombank' => '4.2|9.9',
        'TestBank' => '5.0|8.7',
        'TestBankNo1' => '6.8|8.6',
    );
    $app_list_strings['moduleList']['Cases']='Feedback';
    $app_list_strings['moduleListSingular']['Cases']='Feedback';
    $app_list_strings['record_type_display']['Cases']='Feedback';
    $app_list_strings['record_type_display_notes']['Cases']='Feedback';



    $app_list_strings['teacher_comment_list']=array (
        ' ' => '- Please Choose -',
        'Very Good' => 'Very Good',
        'Unbelievable' => 'Unbelievable',
        'You Are Not Alone' => 'You Are Not Alone',
    );
    $app_list_strings['package_payment_type_list']=array (
        '' => '',
        '10.0' => 'Before the course starts',
        '10.2' => '10 days first of the 2nd month',
        '10.3' => '10 days first of the 3rd month',
        '10.4' => '10 days first of the 4th month',
        '10.5' => '10 days first of the 5th month',
        '10.7' => '10 days first of the 7th month',
        '10.8' => '10 days first of the 8th month',
        '10.9' => '10 days first of the 9th month',
        '10.10' => '10 days first of the 10th month',
        '10.12' => '10 days first of the 12th month',
    );
    $app_list_strings['gradebook_overral_comment_list']=array (
        '' => '--- Select ---',
        'O1' =>  'A noticeable level of improvement in ability over the last period. Well done and keep up the good work.',
        'O10' =>  'Noticeable improvements in all areas recently. Well done.',  
        'O11' =>  'Participation and behaviour has been excellent throughout the last period and progress has been strong. All skills have improved considerably.',  
        'O12' =>  'Continued effort as seen recently will lead to a very good course result.',  
        'O13' =>  'A pleasure to teach in class - keep up the good work.',  
        'O14' =>  'A very well behaved student who has been very polite and dedicated in class.',  
        'O15' =>  'Well done, a very positive and well mannered student.',
        'O16' =>  'Excellent progress, well done.',
        'O17' =>  'The hard work put into this course has led to a lot of progress being made. Well done.',  
        'O18' =>  'A noticeable improvement over the last period.',
        'O19' =>  'Very good results and progress so far, keep up this  level of effort.',
        'O2' =>  'Progress has been very good to date. Well done.', 
        'O20' =>  'An excellent level of participation in all classroom activities has led to steady overall improvement.',
        'O21' =>  'A superb effort has been made recently',  
        'O22' =>  'A great turnaround in attitude and application. Great to see.',  
        'O23' =>  'A delight to teach.',
        'O24' =>  'A pleasure to teach.',  
        'O25' =>  'A good level of progress is being made for this level –  keep it up!', 
        'O26' =>  'Progress is good, although with more review at home this would likely improve.',
        'O27' =>  'Participation and progress have improved considerably, well done.',
        'O28' =>  'A fair effort for this level and this amount of improvement is good for this stage of the course.',  
        'O29' =>  'There has been noticeable progress across all four skills; speaking, reading, writing, listening.',
        'O3' =>  'A pleasure to teach. Behaviour has been very good.',
        'O30' =>  'Progress and overall performance has been good.  Keep up the good work.', 
        'O31' =>  'Participation, progress and behaviour have all been good recently. All skills have improved.',
        'O32' =>  'Although the test score may not reflect it, progress has been steady and adequate for this level.',
        'O33' =>  'Please try to concentrate more in class.',  
        'O34' =>  'Please remember – doing homework regularly will dramatically improve your retention of language covered during class time.',  
        'O35' =>  'The first half of the course is now over and progress  and overall performance has been slow. More work and  more participation throughout the rest of the course is needed.', 
        'O36' =>  'Please try and limit the amount of Vietnamese being used in class. Use English as much as possible.',  
        'O37' =>  'Participation and behaviour has been poor recently and progress has been limited. More work is needed to ensure that more progress is achieved.',  
        'O38' =>  'Please try and arrive to class on time. Arriving late affects the whole class and also makes it more difficult to make good progress.',  
        'O39' =>  'At this stage of the course, more progress is expected.  Please focus more in class and devote more out of class time to practice.',
        'O4' =>  'A really positive level of participation in class. Well done.',  
        'O40' =>  'More progress is expected by this stage. Make sure to review all class work at home.', 
        'O41' =>  'At this stage progress is disappointing - please ensure that more effort is made for the rest of the course to ensure a pass mark.',  
        'O42' =>  'A lot more effort, commitment and motivation is required in order to keep up with the rest of the class.',
        'O43' =>  'There are times when behaviour and concentration are an issue. Stay focused and pay attention to the teacher in class.',  
        'O44' =>  'Please note that more effort needs to be made or a fail in this course is likely.', 
        'O45' =>  'Please try not to distract other students in class and try and stay focused on the activities we are doing.',  
        'O46' =>  'Absence from class has made a negative impact on progress. Please try and attend all classes.',  
        'O47' =>  'Remember – learners have to revisit language time and time again to become fluent. Keep practicing.',  
        'O5' =>  'Progress and overall performance has been excellent.  Keep up the good work.',  
        'O6' =>  'Recently there has been a lot of improvement in class.  Behaviour has been very good, participation is high and motivation is very good.',
        'O7' =>  'An excellent rate of progress for this level.',  
        'O8' =>  'All four skills, reading, writing, speaking and listening have improved significantly over the last period; above average for the class.',
        'O9' =>  'Progress has been very good and this is due to continued hard work and high levels of participation in class. This has meant that improvement across all four skill areas has been strong.',
    );
    $app_list_strings['gradebook_participation_comment_list']=array (
        '' => '--- Select ---',
        'P.1'   =>   'Excellent participation, contributes regularly, appropriately and confidently. A model student who is far exceeding expectations for this level.',
        'P.10'   =>   'Always speaks English in class; this encourages other students to do the same and is useful speaking practice.', 
        'P.11'   =>   'A confident and competent speaker.',  
        'P.12'   =>   'A natural leader in the classroom setting, participation is an area of strength.',  
        'P.13'   =>   'Shows great enthusiasm and tries very hard.',   
        'P.14'   =>   'Participates very well in class and always returns  homework on time.',    
        'P.15'   =>   'Always gets involved in class activities.',  
        'P.16'   =>   'Interacts very well with the teacher and other students.',   
        'P.17'   =>   'Gets involved in all class activities, excellent  participation.',    
        'P.18'   =>   'Has made great progress over the course and is now participating far more than before.',  
        'P.19'   =>   'Tries very hard in class.',  
        'P.2'   =>   'Exceeding expectations of participation for the level.',
        'P.20'   =>   'Is not afraid to try, even when not sure of an answer.',  
        'P.21'   =>   'Great participation and enthusiasm, a pleasure to teach.',  
        'P.22'   =>   'Interacts very well with other students and assists others with their learning.',  
        'P.23'   =>   'Always has a positive attitude, which has a good effect on the whole class.',  
        'P.24'   =>   'Interacts well with other students and sometimes leads  in speaking activities.',    
        'P.25'   =>   'Contributes well to the class. Is involved in most class activities and interacts well with other students. Meeting expectations for the level.',  
        'P.26'   =>   'Confidence is growing; still needs to participate more.',  
        'P.27'   =>   'Has improved in this area over the course; needs to continue to pay attention in class.',
        'P.28'   =>   'Makes appropriate and relevant contributions to the class.',  
        'P.29'   =>   'Works hard, and is gaining in confidence.',  
        'P.3'   =>   'Very good participation in almost all classroom activities.',
        'P.30'   =>   'Seems to be enjoying English studies more and is showing increased enthusiasm in class activities. Keep it up!',  
        'P.31'   =>   'Has gained confidence over the course and now participates well.',  
        'P.32'   =>   'Good participation, appropriate interjections and involvement in the class.',  
        'P.33'   =>   'Meeting expectations of participation.',  
        'P.34'   =>   'Only just meeting expectations for the level.',  
        'P.35'   =>   'Has not participated in class actively enough.',  
        'P.36'   =>   'Needs to develop more confidence when speaking in class.',  
        'P.37'   =>   'Increased participation will create more opportunities for practice and lead to faster progress being made.',  
        'P.38'   =>   'Makes some contribution to the class but generally lacks confidence.',  
        'P.39'   =>   'Makes some contribution to the class but generally lacks enthusiasm.',  
        'P.4'   =>   'Makes a lot of relevant contributions to the class.',  
        'P.40'   =>   'Needs to pay more attention in class.',  
        'P.41'   =>   'Needs to focus on speaking more English in class.',   
        'P.42'   =>   'More involvement in class activities is needed in order  to reach potential.',    
        'P.43'   =>   'Has not attended class regularly enough to assess participation.',  
        'P.5'   =>   'Is very good at contributing to group discussions.',  
        'P.6'   =>   'Tries very hard in class and this is reflected in progress and results.',  
        'P.7'   =>   'Often leads group activities.',  
        'P.8'   =>   'Has good energy and enthusiasm during group discussions, which benefits everyone.',  
        'P.9'   =>   'Very enthusiastic, excellent participation',
    );
    $app_list_strings['gradebook_speaking_comment_list']=array (
        '' => '--- Select ---',
        'S.1'   => 'Above average spoken ability for the level. Generally speaks clearly and makes few errors.Making good progress.',
        'S.10'   => 'Communicative ability and the range of language used is high for this level.',  
        'S.11'   => 'Continues to display a strong ability to speak clearly and coherently in all activities in class.',
        'S.12'   => 'A higher level of participation in speaking activities has seen a great improvement in confidence and this is now evident in other skill areas.',
        'S.13'   => 'Well done. Keep challenging yourself in speaking activities and experiment with the new language each time.',
        'S.14'   => 'A very productive period where participation in all speaking activities was high, accuracy was good and outcomes were regularly achieved.',
        'S.15'   => 'Each lesson the class has a number of speaking activities and they are always done well. Participation and behaviour has been good and as a result, the general speaking level has improved greatly.',
        'S.16'   => 'Experiments successfully with the new language in communicative activities.',
        'S.17'   => 'Is very good at working new language into existing language patterns.',
        'S.18'   => 'Has shown great improvement in speaking activities over the last period and as a result is now one of the more fluent speakers in class.',
        'S.19'   => 'Speaking accuracy and fluency for this level is higher than average. Well done.',
        'S.2'   => 'Excellent average spoken ability for the level. Always speaks clearly and makes few errors.Making good progress.',
        'S.20'   => 'Speaking accuracy and fluency for this level is higher than average.',
        'S.21'   => 'Fluency and confidence has improved greatly, enabling greater participation and confidence in speaking activities.',
        'S.22'   => 'Involvement in communicative activities has improved greatly in both fluency and range of language use. This has lead to a very good result in the last period.',
        'S.23'   => 'Has shown great effort in trying out difficult new language during free speaking activities.',
        'S.24'   => 'There has been significant improvement throughout  the course and more natural sounding English is now  being produced. Well done.',
        'S.25'   => 'Meeting expectations for the level. Makes some errors but usually communicates meaning well.',
        'S.26'   => 'Speaking ability is good for the level, though frequent errors sometimes impede understanding.',
        'S.27'   => 'Has the ability to communicate in all activities and is generally able to convey meaning with accuracy.',
        'S.28'   => 'Speaks well in most activities in class although with more participation in activities in English, speaking skills would improve a lot more.',
        'S.29'   => 'Continued improvement in speaking ability has been evident. Participation in all communicative activities has been good and this has helped produce some noticeable improvements.',
        'S.3'   => 'Very good, fluent speaking with very few errors',
        'S.30'   => 'Speaking levels have improved. Continue to work hard and participate in all speaking activities to improve further.',
        'S.31'   => 'Fluency and conversational ability have shown good signs of improvement in the last period.',
        'S.32'   => 'Despite a good effort, more practice in communicative activities is needed.',
        'S.33'   => 'Speaking has improved – don’t forget, practice makes perfect!',  
        'S.34'   => 'Try to speak as much as you can during the activities  – remember, practice makes perfect!',    
        'S.35'   => 'Speaking ability is below expectations for the level. Needs to make serious improvement in this area.',
        'S.36'   => 'Please try to slow the speed of your speech in class.,This will help others to understand you more easily.',
        'S.37'   => 'There should be more effort to try and speak in all exercises in class.',
        'S.38'   => 'Has not attended class regularly enough to assess speaking ability.',
        'S.39'   => 'Concentration in speaking activities is low. Please try harder to stay focused and on task in all speaking activities.',
        'S.4'   => 'Excellent speaking ability, communicates clearly and fluently. Far exceeding expectations for the level.',
        'S.40'   => 'Speaking has improved little over the last period and this is due to low levels of participation in class.Concentrate in all activities that lead up to speaking activities so that the new language can be practiced.',
        'S.41'   => 'More effort and concentration is required in all speaking activities for progress to be made.',
        'S.42'   => 'Speaking activities have been difficult due to shyness.Please try to speak up and please look to participate more in speaking activities.',
        'S.43'   => 'Although there has been some improvement in the area of speaking, it has been less than anticipated for the level.',
        'S.44'   => 'The level of accuracy in speaking activities has been poor and this has affected the outcome of many activities.',
        'S.45'   => 'Try harder to speak in fluency activities; this is the only way that you can improve your level of speaking.',
        'S.46'   => 'Learning to speak English is similar to learning to ride a bike – improvements cannot be made without practice. Please try to contribute more to class discussions.',
        'S.5'   => 'All communicative activities are completed well. Accuracy and fluency have both improved greatly and this is a result of a high level of effort.',
        'S.6'   => 'Speaking ability has greatly improved due to a high level of participation in speaking activities.',
        'S.7'   => 'Great speaking skills for this level.',
        'S.8'   => 'Speaking in the activities in class has been very good and this has led to a marked increase in confidence.',
        'S.9'   => 'Effort has been great and participation in speaking activities is high.',
    );
    $app_list_strings['gradebook_listening_comment_list']=array (
        '' => '--- Select ---',
        'L.13'  =>  'Good at listening and helps other students to understand listening texts.', 
        'L.8'  =>  'Can usually understand the main message of the text after only one listening - very competent in this area.', 
        'L.1'  =>  'Excellent listening ability. Exceeding expectations for the level.',
        'L.10'  =>  'Has strong listening skills for this level.', 
        'L.11'  =>  'Has really improved listening skills throughout the course. Keep up the hard work.', 
        'L.12'  =>  'Listening skills are improving.', 
        'L.14'  =>  'Enjoys listening activities in class and is excelling in this area.', 
        'L.15'  =>  'Is able to understand most of the challenging listening texts.', 
        'L.16'  =>  'Finds it easy to understand listening activities, English songs and the teacher!',
        'L.17'  =>  'Has improved the ability to understand the general message, rather than be distracted by unknown vocabulary.',
        'L.18'  =>  'A good level of comprehension for the level.', 
        'L.19'  =>  'Aim to listen to a variety of things in English outside the classroom; the course book CD is useful for extra practice.', 
        'L.2'  =>  'Can cope with a wide variety of listening texts and levels of challenge.',
        'L.20'  =>  'Listening skills have greatly improved over the duration of the course.', 
        'L.21'  =>  'Meeting expectations for listening ability at this level.', 
        'L.22'  =>  'Is able to understand most of the listening texts.',  
        'L.23'  =>  'Displays good listening skills in class.', 
        'L.24'  =>  'No concerns with listening ability at this level.', 
        'L.25'  =>  'Listening skills are developing and will continue to do so with consistent effort.', 
        'L.26'  =>  'Can cope with a variety of listening texts.', 
        'L.27'  =>  'Has made some improvements in listening skills throughout the course.', 
        'L.28'  =>  'Average listening ability; needs repeated attempts to achieve understanding.', 
        'L.29'  =>  'Listening skills are improving but this area still needs more practice.', 
        'L.3'  =>  'Excels in listening activities.',
        'L.30'  =>  'Making steady progress with listening skills.', 
        'L.31'  =>  'Try to listen to as much authentic English outside the class as possible.', 
        'L.32'  =>  'Listening skills are good - listen to English songs, radio and TV as much as possible to improve even more.',
        'L.33'  =>  'The more you practice listening, the easier it will become!',
        'L.34'  =>  'Needs to concentrate more when listening in class.', 
        'L.35'  =>  'Listening ability is below expectations for the level.  Improvement is needed in this area.',   
        'L.36'  =>  'Tries too hard to understand every word which means the overall meaning is often misunderstood.', 
        'L.37'  =>  'Try not to understand every word when listening – just listen for the overall meaning.', 
        'L.38'  =>  'Finds listening challenging, needs to keep working hard on this area.',
        'L.39'  =>  'Weak in this area; needs to practise more.', 
        'L.4'  =>  'Good listening skills. Generally able to gain a good understanding of the whole text.', 
        'L.40'  =>  'Should try to listen to English more outside of the class.',  
        'L.41'  =>  'Should listen to English on the radio and watch English  T.V. and movies when possible.', 
        'L.42'  =>  'Struggles to understand the message of the text due to focussing on unknown words. Try to listen for the overall message.', 
        'L.43'  =>  'Should listen more attentively during all listening activities.', 
        'L.44'  =>  'Has not attended class regularly enough to assess listening ability.',   
        'L.45'  =>  'Try to concentrate but at the same time relax when listening, to prevent being confused by unknown words.',
        'L.5'  =>  'Can cope with a good variety of listening texts.', 
        'L.6'  =>  'Has no problem following long, challenging listening texts.',
        'L.7'  =>  'Very good listening comprehension for the level.', 
        'L.9'  =>  'Listening skills are strong for this level. Keep up the good effort.', 
        'G.9'  =>  'Knowledge of grammar and vocabulary are very good for the level.', 
        'L.13'  =>  'Good at listening and helps other students to understand listening texts.', 
        'L.8'  =>  'Can usually understand the main message of the text after only one listening - very competent in this area.', 

    );
    $app_list_strings['gradebook_pronunciation_comment_list']=array (
        '' => '--- Select ---',
        'PR.1'   =>  'An excellent level of pronunciation for this level.', 
        'PR.10'   =>  'Pronunciation in most areas is strong. Participation in songs and other pronunciation activities has been great and this has lead to a significant improvement in overall pronunciation.',  
        'PR.11'   =>  'Songs, rhyming activities, drills, speaking activities have all been well handled and as a result, levels of pronunciation are now very good.',  
        'PR.12'   =>  'There has been continual improvement in pronunciation and this has been through a lot of hard work and commitment in class.',  
        'PR.13'   =>  'Improvement has been evident in every lesson and as a result pronunciation is now very good.',  
        'PR.14'   =>  'Nearly all sounds are produced well and pronunciation is very strong for this level.',  
        'PR.15'   =>  'Pronunciation is very good and is higher than average for this class.',  
        'PR.16'   =>  'Pronunciation is clearer than expected for a student at this level.',  
        'PR.17'   =>  'Pronunciation is clear and easy to understand.',   
        'PR.18'   =>  'Through very hard work pronunciation is now very  clear and sounds are made with very good accuracy.',  
        'PR.19'   =>  'Pronunciation skills are improving, keep up the good work.',  
        'PR.2'   =>  's level pronunciation is strong. Continue with.',
        'PR.20'   =>  'There was substantial improvement in pronunciation over the last part of the course.',  
        'PR.21'   =>  'The basic sounds of English are being produced very well.',  
        'PR.22'   =>  'Pronunciation is a pleasure to listen to. Well done.',  
        'PR.23'   =>  'Intonation and pronunciation have greatly improved, now sounding much more natural.',  
        'PR.24'   =>  'Pronunciation skills meet expectations for the level.',  
        'PR.25'   =>  'Has made some progress with pronunciation.',  
        'PR.26'   =>  'Average pronunciation for this level. Keep working on this area.',  
        'PR.27'   =>  'Pronunciation has improved, and will continue to do so with further effort.',  
        'PR.28'   =>  'There is a need to focus on stress and intonation which can be done with the course tape at home.',  
        'PR.29'   =>  'Keep trying to mimic the pronunciation of your teacher, the more you practice the easier it will become.',  
        'PR.3'   =>  'Very good use of intonation, stress and rhythm.',
        'PR.30'   =>  'Pronunciation is generally very good and is done with a reasonably clear accent.',  
        'PR.31'   =>  'A lot of effort recently with pronunciation, well done.',  
        'PR.32'   =>  'Please listen to the course book CD at home more in order to improve.',  
        'PR.33'   =>  'Concentrate in class when doing pronunciation activities.',  
        'PR.34'   =>  'Try to listen to as much authentic English on the TV  or radio as possible.',  
        'PR.35'   =>  'Pronunciation is below expectations for the level,  keep trying to improve this area.',    
        'PR.36'   =>  'Try to concentrate more in pronunciation activities.',  
        'PR.37'   =>  'Listen to your teachers’ pronunciation and try to repeat it carefully. Keep practicing this area.',  
        'PR.38'   =>  'More effort and focus is needed when participating in pronunciation exercises in class.',  
        'PR.39'   =>  'Practice more with pronunciation. At home use the tape script and the wordlist to listen to the sounds and copy them. This will help.',  
        'PR.4'   =>  'Very few difficulties with pronunciation. Speech is clear and precise.',  
        'PR.40'   =>  'Please try and speak louder in class, this will help to pronounce more clearly.',  
        'PR.41'   =>  'Needs to repeat new words after the teacher in class during pronunciation activities. Please make more effort to practice in class.',  
        'PR.42'   =>  'Pronunciation needs immediate work. Some suggestions for how to improve: listen to the CD, watch some English movies, talk with friends in English, listen to English radio, use the ILC.',  
        'PR.43'   =>  'This is an area of weakness and more practice is needed.', 
        'PR.44'   =>  'Remember – pronunciation doesn’t improve without practice!',  
        'PR.5'   =>  'Excellent use of stress and intonation in nearly all areas of spoken language.',  
        'PR.6'   =>  'A lot of work has gone into clear and precise communication, repeating after the teacher and listening to models. This has lead to very clear pronunciation.',  
        'PR.7'   =>  'Pronunciation is an area that has improved significantly and will continue to do so with further practice.',  
        'PR.8'   =>  'Words and phrases are very clearly pronounced. The improvement in pronunciation has been great.',  
        'PR.9'   =>  'Clarity in most areas of speech is high.',
    );
    $app_list_strings['gradebook_vocabulary_comment_list']=array (
        '' => '--- Select ---',
        'G.1'   =>   'Excellent use of grammar and vocabulary for the level; exceeding expectations.',
        'G.10'   =>   'Consistently produced homework of a high standard, showing considerable effort.',
        'G.11'   =>   'Doing well with grammar and vocabulary, can use new grammar appropriately.',
        'G.12'   =>   'Very good at remembering and using new words.',   
        'G.13'   =>   'Now has a much broader range of vocabulary.',   
        'G.14'   =>   'Is now able to speak and write about many more  topics.',    
        'G.15'   =>   'Ability to talk about less familiar topics has risen substantially – well done.',  
        'G.16'   =>   'Loves learning new words and using them in class.',   
        'G.17'   =>   'Has developed an ability to use increasingly complex  grammatical structures.',    
        'G.18'   =>   'Has worked hard over the course and will continue to make good progress with sustained effort.',  
        'G.19'   =>   'Can use newly acquired vocabulary creatively.',  
        'G.2'        =>   'Is able to use a wide range of grammatical structures.',
        'G.20'   =>   'Has a wide vocabulary for this level.',  
        'G.21'   =>   'Reviews grammar and vocabulary at home, this is evident in class.',
        'G.22'   =>   'Has a good level of knowledge of grammar for this level which can be applied accurately.',  
        'G.23'   =>   'Has made the strongest progress in the class in relation to widening knowledge of grammar and vocabulary.',  
        'G.24'   =>   'Meeting expectations for use of grammar and  vocabulary for this level.',    
        'G.25'   =>   'Shows good understanding of grammar for the level.',   
        'G.26'   =>   'Shows good knowledge of vocabulary for the level.',   
        'G.27'   =>   '"With support and continued effort, should achieve  good results in grammar and vocabulary tests.',
        'G.28'   =>   'Is able to use grammar accurately.',  
        'G.29'   =>   'Is able to choose the correct grammatical structure on most occasions.',  
        'G.3'   =>   'Easily understands and recalls new vocabulary and is able to use it appropriately.',
        'G.30'   =>   'Is making steady progress in this area. Keep trying!',  
        'G.31'   =>   '"No problems in this area, understanding and use of grammar and vocabulary are appropriate for the level.',
        'G.32'   =>   'Keep a written record of all grammar and vocabulary studied in class; this will help with revision.',  
        'G.33'   =>   'Review new grammar at home and attempt to use new structures in classroom activities.',  
        'G.34'   =>   'Use of grammar and vocabulary is below  expectations for this level. Improvement is needed here.',    
        'G.35'   =>   'Has difficulties using new grammatical structures.',  
        'G.36'   =>   'There needs to be more attention to accurate use of grammar.',  
        'G.37'   =>   'Needs to do more to improve grammar; at the moment simple mistakes make understanding difficult.',  
        'G.38'   =>   'Vocabulary is a little behind the rest of the class but would easily improve with a little more work.',  
        'G.39'   =>   'Grammatical knowledge is not developing well enough for this level.',  
        'G.4'   =>   'Displays an accurate use of grammatical structures in speaking and writing tasks.',  
        'G.40'   =>   'Needs to practise grammar outside the class.',   
        'G.41'   =>   'Finds it challenging to remember new vocabulary.',   
        'G.42'   =>   'An insufficient level of grammatical knowledge for the  level. More work and more focus is needed to keep  up with the pace of the class.',    
        'G.43'   =>   'Has not attended class regularly enough to assess grammar and vocabulary.',  
        'G.44'   =>   'There is a need to expand vocabulary at this stage.',   
        'G.45'   =>   'Remember, grammar is as important as vocabulary!',
        'G.46'   =>   'Meaning is often unclear due to grammatical mistakes.',  
        'G.5'   =>   'Displays a confident use of new grammatical structures in class.',  
        'G.6'   =>   'Enjoys learning new vocabulary and is able to use it to great effect in class.',  
        'G.7'   =>   'Is able to use a wide range of vocabulary in speaking and writing activities.',  
        'G.8'   =>   'Significantly increased the range of grammatical structures and vocabulary being used over the course.',  
        'G.9'   =>   'Knowledge of grammar and vocabulary are very good for the level.',  
    );
    $app_list_strings['gradebook_reading_comment_list']=array (
        '' => '--- Select ---',
        'R.1'   =>  'Excellent reading skills; exceeding expectations for the level.',
        'R.10'   =>  'Has no problem reading texts designed for this level, can cope well with more complex texts.',
        'R.11'   =>  'A confident and competent reader.',
        'R.12'   =>  'Has grasped the important reading skills of skimming and scanning and employs both strategies appropriately.',
        'R.13'   =>  'Reading skills are beyond those expected at this level.', 
        'R.14'   =>  'Achieving good results in reading comprehension.', 
        'R.15'   =>  'Loves reading activities and shows great ability in this  area.',  
        'R.16'   =>  'Does a lot of extra reading in English outside class; this shows in great results for this area.',
        'R.17'   =>  'Minor misunderstandings when reading do not impede comprehension of the overall message.',
        'R.18'   =>  'Has very good reading skills, often helps other students to understand the text.',
        'R.19'   =>  'Can read and understand English very well for this level.',
        'R.2'   =>  'Can cope with a wide variety of texts and levels of challenge.',
        'R.20'   =>  'Works hard at reading and this effort is paying off.',
        'R.21'   =>  'Is very good at reading a text quickly and working out the meaning, without becoming confused by unknown vocabulary.',
        'R.22'   =>  'Displays good reading ability for the level.',
        'R.23'   =>  'Does well with reading tasks.',
        'R.24'   =>  'Reads slowly and thoroughly, with continued practice should have no problems in this area.',
        'R.25'   =>  'Reading skills have improved over the course.',
        'R.26'   =>  'Meeting expectations for reading ability at this level.', 
        'R.27'   =>  'Can cope with a good variety of different reading texts.', 
        'R.28'   =>  'Reading ability is average for the level; more reading in  English at home will help strengthen this skill.',  
        'R.29'   =>  'Has made progress with reading throughout the course.',
        'R.3'   =>  'Employs appropriate strategies in order to gain understanding of the text, locate information within the text, and infer meaning of unknown words from context.',
        'R.30'   =>  'Reading skills meet expectations at this level; needs to concentrate more on longer texts.',
        'R.31'   =>  'Completing homework will help to improve reading skills further.',
        'R.32'   =>  'Try to find something to read for pleasure in English.', 
        'R.33'   =>  'Is able to quickly understand most texts at this level.',
        'R.34'   =>  'Is able to read at a steady pace.',
        'R.35'   =>  'Reading ability is below expectations for the level.Improvement is needed here.',  
        'R.36'   =>  'Is only able to read very familiar texts at a good speed.',
        'R.37'   =>  'Reading skills are improving but still below expectations for the level.',
        'R.38'   =>  'Reads slowly and tends to want to know the meaning of every word in the text.',
        'R.39'   =>  'Needs to concentrate more when reading in class.', 
        'R.4'   =>  'Very good reading ability for the level.',
        'R.40'   =>  'Should practice reading in English more outside the  class.',  
        'R.41'   =>  'Struggles to work out the meaning of unknown vocabulary, and as such can sometimes misunderstand the message of the text.',
        'R.42'   =>  'Needs to improve in this area; reading at home will help.',
        'R.43'   =>  'Needs to practice reading skills of skimming and scanning to progress further in this area.',
        'R.44'   =>  'Has not attended class regularly enough to assess reading ability.',
        'R.45'   =>  'Don’t worry if you don’t understand every word when reading a text – just try to understand the meaning.',
        'R.46'   =>  'Remember, with reading, practice makes perfect! Try to find something in English that you find interesting or enjoyable to read.',
        'R.5'   =>  'Obviously enjoys reading in English and practices this outside the class.',
        'R.6'   =>  'Is able to grasp the overall meaning of challenging texts.',
        'R.7'   =>  'Excellent reading ability for this level.',
        'R.8'   =>  'Copes very well with complex reading texts.',
        'R.9'   =>  'Is very good at working out the meaning of unknown vocabulary from the context of the reading.',

    );
    $app_list_strings['gradebook_writing_comment_list']=array (
        '' => '--- Select ---',
        'W.1'  =>  'Excellent vocabulary for the level.', 
        'W.10'  =>  'Concentrates very hard when working on writing, making great progress in this area.',  
        'W.11'  =>  'Is now producing more complex writing.',  
        'W.12'  =>  'Well organized and coherent for the level. Errors are minor.',  
        'W.13'  =>  'Quality of writing has improved a lot over the course.',  
        'W.14'  =>  'Writing is very well organised and easy to read.',   
        'W.15'  =>  'Exceeding expectations for the level, now able to  produce different types of writing.',  
        'W.16'  =>  'Comfortable with writing and has few problems in this area.',  
        'W.17'  =>  'Easily expresses message and meaning in writing tasks.',  
        'W.18'  =>  'Obviously practices this skill at home which is reflected in the work produced.',  
        'W.19'  =>  'Ambitious use of language and few mistakes, very good writing for the level.',  
        'W.2'  =>  'Good vocabulary for the level.',
        'W.20'  =>  'Very good writing for the level, there are some mistakes but it is usually possible to understand the message.',  
        'W.21'  =>  'Excellent writing for the level, an area of strength.',  
        'W.22'  =>  'The writing has a natural flow, and has very few errors, making it a pleasure to read.', 
        'W.23'  =>  'The written homework is a pleasure to read. Clearly a lot of care is being taken.',  
        'W.24'  =>  'The writing is a pleasure to read – well done.',  
        'W.25'  =>  'The writing is almost error-free and has a wide range of vocabulary.',  
        'W.26'  =>  'The writing flows easily and so is a pleasure to read',  
        'W.27'  =>  'Writing has improved a lot over the course – keep up  the good effort.',  
        'W.28'  =>  'Writing has improved a lot over the course – well done.', 
        'W.29'  =>  'Writing has improved over the course.',    
        'W.3'  =>  'Above average writing ability. Good range of structures and language but with some errors; to be expected at this level.',
        'W.30'  =>  'Writing is well organised and easy to read.',   
        'W.31'  =>  'Writing ability meets expectations for the level.  Should keep practicing in order to continue to  improve.',  
        'W.32'  =>  'Writing ability is reasonable for the level though frequent errors of grammar, vocabulary and organization sometimes make understanding difficult.',  
        'W.33'  =>  'Meeting expectations for the level. Adequate range of language. Communicates meaning well but with  some errors.',  
        'W.34'  =>  'Could practice writing at home in order to improve further.',  
        'W.35'  =>  'Writing is improving; it is now easier to understand the meaning.',  
        'W.36'  =>  'Can write fluently and express meaning, keep concentrating on accuracy.',  
        'W.37'  =>  'Doing well with writing, no problems in this area.',  
        'W.38'  =>  'The writing is good at the sentence level, but take  time to think about how your ideas are linked between paragraphs.',  
        'W.39'  =>  'Take some time to think about how good writing flows; it should have a beginning, a middle, and an end.',  
        'W.4'  =>  'Very good writing ability. More than adequate range  of structures and language. Some errors occur but do not impede understanding.',  
        'W.40'  =>  'The writing is good in terms of grammar, but is sometimes too formal for the context.',  
        'W.41'  =>  'Should concentrate more when writing as mistakes  are affecting understanding.',    
        'W.42'  =>  'Should have patience when writing in English and concentrate more on accuracy.',  
        'W.43'  =>  'Try to write at home to improve writing. Try keeping a diary in English.',  
        'W.44'  =>  'Reviewing written work before handing in would reduce the number of small mistakes.',  
        'W.45'  =>  'Take some time to check over your work for small grammatical mistakes.',  
        'W.46'  =>  'Take care with writing; improvement is needed in this area.',  
        'W.47'  =>  'Below expectations for the level, should try to plan the task before hand.', 
        'W.48'  =>  'Needs to improve range of vocabulary in order to improve written work.',  
        'W.49'  =>  'Has not attended class regularly enough to assess writing ability.',  
        'W.5'  =>  'Excellent writing ability. Confident and ambitious use of language.',  
        'W.50'  =>  'Has not completed enough homework assignments to assess writing ability.',  
        'W.51'  =>  'Writing ability is below expectations for the level.  Needs to make serious improvement in this area',    
        'W.52'  =>  'Your free writing scores are lower than your grammar scores – find some time to practice more.',  
        'W.6'  =>  'Can use a wide range of structures and vocabulary for the level.',  
        'W.7'  =>  'Has made excellent progress with writing throughout the course.',  
        'W.8'  =>  'Very good writing ability for the level, the small grammatical mistakes rarely impede understanding.',  
        'W.9'  =>  'Spends a lot of time working on writing and this shows in the excellent results achieved for this skill.',
    );


    $app_list_strings['card_type_payments_list']=array (
        '' => '',
        'MasterCard' => 'MasterCard',
        'VisaCard' => 'VisaCard',
        'VietcomBank' => 'VietcomBank (VCB)',
        'JCB' => 'JCB',
        'AmericanExpress' => 'American Express (AMEX)',
    );

    $app_list_strings['package_type_list']=array (
        '' => '',
        'Normal' => 'Normal',
        'Save&Learn' => 'Save&Learn',
        'Save&Learn & Collect' => 'Save&Learn & Collect',
        'Card Promotion' => 'Card Promotion',
        'Coupon' => 'Coupon',
        'Sponsor' => 'Sponsor',
        'Loyalty Customers' => 'Loyalty Customers',
        'Corporate' => 'Corporate',
        'Referral' => 'Referral',
    );

    $app_list_strings['card_rate']=array (
        'TestBank' => '9.9',
        'VisaCard' => '1.7',
        'MasterCard' => '1.7',
        'VietcomBank' => '0.55',
        'JCB' => '2.2',
        'AmericanExpress' => '2.5',
    ); 
    $app_list_strings['timekeeping_type_list']=array (
        'Admin Hours' => 'Admin Hours',
        'Teaching Hours' => 'Teaching Hours',
    );
    $app_list_strings['timekeeping_type_2_list']=array (
        'Connect Club' => 'Connect Club',
        'Skill' => 'Skill',
        'Practice' => 'Practice',
        'Timesheet' => 'Timesheet',
    );

    $app_list_strings['meeting_location_dom']=array (
        'Apollo Pham Ngoc Thach' => 'Apollo Phạm Ngọc Thạch',
        'Apollo Nguyen Trai' => 'Apollo Nguyễn Trãi',
        'Apollo Đien Bien Phu' => 'Apollo Điện Biên Phủ',
        'Apollo Pho Hue' => 'Apollo Phố Huế',
    );
    $app_list_strings['c_sms_module_selected_list']=array (
        '-BLANK-' => '-BLANK-',
        'Contacts' => 'Students',
        'C_Teachers' => 'Teachers',
    );
    $app_list_strings['moduleList']['C_Timesheet']='Admin Hours';
    $app_list_strings['moduleListSingular']['C_Timesheet']='Admin Hours';

    /*app list string by Trung Nguyen*/
    //cancel reason list
    $app_list_strings['session_cancel_reason_options'] = array(
        'Student request' => 'Student request',
        'Weather' => 'Weather',
        'Teacher holiday' => 'Teacher holiday',
        'Teacher sick' => 'Teacher sick',
        'Teacher leaving' => 'Teacher leaving',
    );
    /*end*/