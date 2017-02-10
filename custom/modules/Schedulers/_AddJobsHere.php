<?php
$job_strings[] = 'runMassSMSCampaign';
$job_strings[] = 'runCarryForwardReport';
$job_strings[] = 'updateStatusContacts';
$job_strings[] = 'autoUpdateStudentStatus';
$job_strings[] = 'deleteClassPlanning';
$job_strings[] = 'updateClassStatus';
$job_strings[] = 'unreleaseInvoice';
$job_strings[] = 'autoRetriveStudyRecord';
$job_strings[] = 'inactivePortalAccount';

function runMassSMSCampaign() {

    $GLOBALS['log']->debug('Called:runMassSMSCampaign');

    if (!class_exists('DBManagerFactory')){
        require('include/database/DBManagerFactory.php');
    }

    global $beanList;
    global $beanFiles;
    require("config.php");
    require('include/modules.php');
    if(!class_exists('AclController')) {
        require('modules/ACL/ACLController.php');
    }

    require('modules/EmailMan/SMSManDelivery.php');
    return true;
}

function runCarryForwardReport() {
    include_once("custom/modules/C_Carryforward/cfff.php");
    return true;

}

function updateStatusContacts() {
    $GLOBALS['log']->debug('BEGIN:updateStatusContacts');
    include_once("custom/modules/Contacts/updateStatusStudents.php");
    $GLOBALS['log']->debug('END:updateStatusContacts');
    return true ;
}

//############## STUDENT ########################
/**
* Auto-Update Student Status
*/
function autoUpdateStudentStatus(){
    $today = date('Y-m-d');

    //UPDATE In Progress
    $q1 = "SELECT DISTINCT
    IFNULL(contacts.id, '') primaryid
    FROM
    contacts
    INNER JOIN
    j_studentsituations l1 ON contacts.id = l1.student_id
    AND l1.deleted = 0
    INNER JOIN j_class cl ON l1.ju_class_id = cl.id
    AND cl.deleted = 0
    AND cl.class_type = 'Normal Class'
    WHERE
    (((l1.start_study <= '$today')
    AND (l1.end_study > '$today')
    AND (l1.type IN ('Enrolled','Settle','Moving In'))))
    AND contacts.deleted = 0";
    $row1 = $GLOBALS['db']->fetchArray($q1);
    if(!empty($row1)){
        $u1 = "UPDATE contacts SET contact_status = 'In Progress' WHERE id IN ('".implode("','",array_column($row1, 'primaryid'))."')";
        $GLOBALS['db']->query($u1);
    }

    //UPDATE OutStanding
    $q2 = "SELECT DISTINCT
    IFNULL(contacts.id, '') primaryid
    FROM
    contacts
    INNER JOIN
    j_studentsituations l1 ON contacts.id = l1.student_id
    AND l1.deleted = 0
    WHERE
    (((l1.start_study <= '$today')
    AND (l1.end_study >= '$today')
    AND (l1.type IN ('OutStanding'))
    AND contacts.contact_status NOT IN ('In Progress')))
    AND contacts.deleted = 0";
    $row2 = $GLOBALS['db']->fetchArray($q2);
    if(!empty($row2)){
        $u2 = "UPDATE contacts SET contact_status = 'OutStanding' WHERE id IN ('".implode("','",array_column($row2, 'primaryid'))."')";
        $GLOBALS['db']->query($u2);
    }

    //UPDATE Delayed - Not In Progress và outstanding ở trên
    $q3 = "SELECT DISTINCT
    IFNULL(contacts.id, '') primaryid
    FROM
    contacts
    INNER JOIN
    j_studentsituations l1 ON contacts.id = l1.student_id
    AND l1.deleted = 0
    WHERE
    (((l1.start_study <= '$today')
    AND (l1.end_study >= '$today')
    AND (l1.type IN ('Delayed','Stopped'))
    AND contacts.id NOT IN ('".implode("','",array_column($row1, 'primaryid'))."','".implode("','",array_column($row2, 'primaryid'))."')))
    AND contacts.deleted = 0";
    $row3 = $GLOBALS['db']->fetchArray($q3);
    if(!empty($row3)){
        $u3 = "UPDATE contacts SET contact_status = 'Delayed' WHERE id IN ('".implode("','",array_column($row3, 'primaryid'))."')";
        $GLOBALS['db']->query($u3);
    }

    //UPDATE Finished
    $q4 = "SELECT DISTINCT
    IFNULL(st.id, '') primaryid
    FROM
    contacts st
    INNER JOIN
    j_studentsituations ss ON ss.student_id = st.id AND ss.deleted = 0
    AND st.deleted = 0
    AND st.contact_status = 'In Progress'
    INNER JOIN j_class cl ON ss.ju_class_id = cl.id
    AND cl.deleted = 0
    AND cl.class_type = 'Normal Class'
    GROUP BY st.id
    HAVING MAX(ss.end_study) <= '$today'";
    $row4 = $GLOBALS['db']->fetchArray($q4);
    if(!empty($row4)){
        $u4 = "UPDATE contacts SET contact_status = 'Finished' WHERE id IN ('".implode("','",array_column($row4, 'primaryid'))."')";
        $GLOBALS['db']->query($u4);
    }

    //    //UPDATE Waiting for Class
    //    $u5 = "UPDATE contacts SET contact_status = 'Waiting for class' WHERE contact_status NOT IN ('In Progress', 'OutStanding', 'Delayed', 'Finished') AND deleted = 0";
    //    $GLOBALS['db']->query($u5);
    //
    return true;
}
//End STUDENT

//############## CLASS ########################
/**
* Auto-Delete Class Planning
*/
function deleteClassPlanning(){
    $date = new DateTime('first day of last month');
    $filter_date = $date->format('Y-m-d');
    if(empty($filter_date)){
        $GLOBALS['log']->security("Crontab deleteClassPlanning failed!!");
        return true;
    }
    //Test Cron
    $q1 = "SELECT
    jc.id class_id
    FROM
    j_class jc
    WHERE
    jc.status = 'Planning'
    AND jc.class_type <> 'Waiting Class'
    AND jc.start_date < '$filter_date'
    AND jc.deleted = 0
    AND jc.id NOT IN (SELECT
    ju_class_id
    FROM
    j_studentsituations
    WHERE
    deleted = 0 AND ju_class_id <> ''
    GROUP BY ju_class_id
    HAVING COUNT(ju_class_id) > 0)";
    $rs1 = $GLOBALS['db']->query($q1);
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        $q2 = "DELETE FROM meetings WHERE ju_class_id = '{$row['class_id']}' ";
        $GLOBALS['db']->query($q2);

        $q3 = "UPDATE j_class SET deleted = 1 WHERE id = '{$row['class_id']}' ";
        $GLOBALS['db']->query($q3);
    }
    //Fix bug Add Demo Lead convert to Student
    $q1 = "SELECT DISTINCT
    IFNULL(meetings_contacts.id, '') primaryid,
    IFNULL(meetings_contacts.contact_id, '') contact_id,
    IFNULL(meetings_contacts.meeting_id, '') meeting_id,
    date(DATE_ADD(mt.date_start,INTERVAL 7 hour)) date_start,
    st.start_study start_study,
    IFNULL(st.id, '') situation_demo_id
    FROM
    meetings_contacts
    INNER JOIN
    meetings mt ON mt.id = meetings_contacts.meeting_id
    AND mt.deleted = 0
    INNER JOIN
    j_class cl ON mt.ju_class_id = cl.id
    AND cl.deleted = 0
    LEFT JOIN
    contacts ct ON ct.id = meetings_contacts.contact_id
    AND ct.deleted = 0
    LEFT JOIN
    j_studentsituations st ON st.student_id = ct.id AND st.deleted = 0
    AND st.type = 'Demo'
    WHERE
    meetings_contacts.deleted = 0
    AND (meetings_contacts.situation_id = ''
    OR meetings_contacts.situation_id IS NULL)";
    $rs1 = $GLOBALS['db']->query($q1);
    while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
        if(empty($row['situation_demo_id'])){
            $GLOBALS['db']->query("DELETE FROM meetings_contacts WHERE id='{$row['primaryid']}'");
        }else{
            if($row['date_start'] == $row['start_study']){
                $GLOBALS['db']->query("UPDATE meetings_contacts SET situation_id = '{$row['situation_demo_id']}' WHERE id = '{$row['primaryid']}'");
            }else{
                $GLOBALS['db']->query("DELETE FROM meetings_contacts WHERE id='{$row['primaryid']}'");
            }
        }
    }

    return true;
}
/**
* Auto-Update Finish Class
*/
function updateClassStatus($GET){
    $q1 = "UPDATE j_class SET status = 'Finish' WHERE (((end_date <= '".date('Y-m-d')."' ) AND (status IN ('In Progress') ) AND (class_type <> 'Waiting Class' ))) AND deleted=0";
    $GLOBALS['db']->query($q1);
    return true;
}
//End CLASS

//############## PAYMENT ########################
/**
* Un-release Invoice
*/
function unreleaseInvoice($get){
    $sql = "UPDATE j_paymentdetail SET is_release=0 WHERE is_release=1";
    $GLOBALS['db']->query($sql);

    $sql2 = "UPDATE j_configinvoiceno SET release_list='', finish_printing=1 WHERE deleted=0";
    $GLOBALS['db']->query($sql2);

    //Remove data rac
    $sql3 = "DELETE FROM c_deliveryrevenue WHERE passed = 1";
    $GLOBALS['db']->query($sql3);
    return true;
}

function autoRetriveStudyRecord(){
    $sql = "SELECT id FROM alpha_classroom WHERE alpha_delete = 0";
    $rs = $GLOBALS['db']->fetchArray($sql);
    $auth_key = "?username=webs&password=GHhNJ5=26";
    foreach($rs as $key=>$value){
        $url = "http://portal360.apollo.edu.vn/admin/elearning/retrievejson/{$value['id']}$auth_key";
        $success = 0;
        while(!$success){
            $json_string = file_get_contents($url);
            $passed_arr = json_decode($json_string,true);
            $success = $passed_arr['success'];
        }

    }
    return $success;
}

function inactivePortalAccount(){
    $sql = "SELECT
    u.id
    FROM
    contacts_j_payment_1_c cp
    INNER JOIN
    j_payment p ON p.id = cp.contacts_j_payment_1j_payment_idb
    AND cp.deleted = 0
    AND p.deleted = 0
    AND p.payment_type = 'Cashholder'
    AND p.status <> 'Closed'
    INNER JOIN
    teams t ON t.id = p.team_id
    AND t.team_type = 'Adult'
    INNER JOIN
    contacts c ON c.id = cp.contacts_j_payment_1contacts_ida
    AND c.deleted = 0
    INNER JOIN
    users u ON u.id = c.user_id AND u.deleted = 0
    AND u.status = 'Active'
    GROUP BY cp.contacts_j_payment_1contacts_ida
    HAVING MAX(case when p.end_study = '0000-00-00' then date_add(p.payment_date, interval p.tuition_hours day) else
    ifnull(p.end_study,date_add(p.payment_date, interval p.tuition_hours day)) end) = DATE_ADD(CURDATE(), INTERVAL - 1 DAY)";
    $rs = $GLOBALS['db']->query($sql);
    $arr_student = array();
    while ($row = $GLOBALS['db']->fetchByAssoc($rs)){
        $arr_student[] = $row['id'];
    }
    $ext_student = "'".implode("','",$arr_student)."'";
    return $GLOBALS['db']->query("UPDATE users SET status = 'Inactive' WHERE id IN ($ext_student)");
}
//End PAYMENT
?>
