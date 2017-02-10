<?php
    global $timedate;
    $q1 = "SELECT DISTINCT IFNULL(contacts.id,'') primaryid ,CONCAT(IFNULL(contacts.last_name,''),' ',IFNULL(contacts.first_name,'')) contacts_full_name, l1_1.enrollment_id as enroll_id FROM contacts INNER JOIN c_classes_contacts_1_c l1_1 ON contacts.id=l1_1.c_classes_contacts_1contacts_idb AND l1_1.deleted=0 INNER JOIN c_classes l1 ON l1.id=l1_1.c_classes_contacts_1c_classes_ida AND l1.deleted=0 WHERE (((l1.start_date = '".$timedate->nowDbDate()."' ) AND (l1.type = 'Practice' ))) AND contacts.deleted=0";
    $rs = $GLOBALS['db']->query($q1);
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs)){
        $enr = new Opportunity();
        $enr->disable_row_level_security = true;
        $enr->retrieve($row1['enroll_id']);
        if(empty($enr->expire_date)){
            $expire_date = $timedate->getNow();
            $num = $GLOBALS['db']->getOne("SELECT interval_package FROM c_packages WHERE id = '{$enr->c_packages_opportunities_1c_packages_ida}'");
            if($num != '0'){
                $expire_date->modify("+$num months");
                $set_date = substr($expire_date->date,0,10);    
            }else{
                $set_date = '0000-00-00';
            }
            $q2 = "UPDATE opportunities SET expire_date='$set_date' WHERE id='{$enr->id}'";  
            $GLOBALS['db']->query($q2);
        }
    }
    
    $q2 = "SELECT DISTINCT IFNULL(contacts.id,'') primaryid ,CONCAT(IFNULL(contacts.last_name,''),' ',IFNULL(contacts.first_name,'')) contacts_full_name, l1_1.enrollment_id as enroll_id FROM contacts INNER JOIN c_classes_contacts_1_c l1_1 ON contacts.id=l1_1.c_classes_contacts_1contacts_idb AND l1_1.deleted=0 INNER JOIN c_classes l1 ON l1.id=l1_1.c_classes_contacts_1c_classes_ida AND l1.deleted=0 WHERE (((l1.end_date = '".$timedate->nowDbDate()."' ) AND (l1.type = 'Practice' ))) AND contacts.deleted=0";
    $rs = $GLOBALS['db']->query($q2);
    while($row1 = $GLOBALS['db']->fetchByAssoc($rs)){
        $now = $timedate->nowDate();
        $enr = new Opportunity();
        $enr->disable_row_level_security = true;
        $enr->retrieve($row1['enroll_id']);
        if($now == $enr->expire_date){
            $q3 = "SELECT DISTINCT
            SUM(opportunities.total_in_invoice) total,
            SUM(l2.total_hours) l2_total_hours,
            l1.enroll_balance enroll_balance,
            l1.hour_balance hour_balance
            FROM
            opportunities
            INNER JOIN
            opportunities_contacts l1_1 ON opportunities.id = l1_1.opportunity_id
            AND l1_1.deleted = 0
            INNER JOIN
            contacts l1 ON l1.id = l1_1.contact_id
            AND l1.deleted = 0
            INNER JOIN
            c_packages_opportunities_1_c l2_1 ON opportunities.id = l2_1.c_packages_opportunities_1opportunities_idb
            AND l2_1.deleted = 0
            INNER JOIN
            c_packages l2 ON l2.id = l2_1.c_packages_opportunities_1c_packages_ida
            AND l2.deleted = 0
            WHERE
            (((l1.id = '{$enr->contact_id}')
            AND (opportunities.sales_stage = 'Success')))
            AND opportunities.deleted = 0";

            $rs3 = $GLOBALS['db']->query($q3);
            $row3 = $GLOBALS['db']->fetchbyAssoc($rs3);

            $q4 = "UPDATE opportunities SET sales_stage='Expired' WHERE id='{$enr->id}'";
            $GLOBALS['db']->query($q4);

            $hour = $GLOBALS['db']->getOne("SELECT total_hours FROM c_packages WHERE id = '{$enr->c_packages_opportunities_1c_packages_ida}'");
            $dlr_total = $row3['total'] - $enr->total_in_invoice;
            $dlr_hour  = $row3['l2_total_hours'] - $hour;
            $enroll_balance = $row3['enroll_balance'];
            $hour_balance   = $row3['hour_balance'];


            if($enroll_balance > $dlr_total && $hour_balance > $dlr_hour && $enr->sales_stage == 'Success'){

                $q5 = "UPDATE contacts SET enroll_balance=".unformat_number($dlr_total)." AND hour_balance=".unformat_number($dlr_hour)." WHERE id='{$enr->contact_id}'";
                $GLOBALS['db']->query($q5);
                //Delivery
                $delivery = new C_DeliveryRevenue();
                $delivery->disable_row_level_security = true;

                $delivery->name = 'Hết hạn sử dụng Enrollment '. $enr->oder_id;
                $delivery->team_id          = $enr->team_id;
                $delivery->team_set_id      = $enr->team_set_id;
                $delivery->assigned_user_id = '1';

                $delivery->student_id = $enr->contact_id;
                $delivery->duration = $hour_balance - $dlr_hour;
                $delivery->amount = $enroll_balance - $dlr_total;

                $delivery->month = date('n');
                $delivery->year = date('Y');
                $delivery->date_input = $timedate->nowDbDate();
                $delivery->passed = 1;
                $delivery->save();

            }  
        }  
    }

?>
