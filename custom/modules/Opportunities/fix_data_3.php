<?php
$q1 = "SELECT DISTINCT IFNULL(j_payment.id,'') primaryid ,IFNULL(j_payment.kind_of_course,'') j_payment_kind_of_course ,IFNULL(j_payment.kind_of_course_string,'') J_PAYMENT_KIND_OF_COURBA00DE ,IFNULL(j_payment.level_string,'') j_payment_level_string ,IFNULL(j_payment.class_string,'') j_payment_class_string ,IFNULL(j_payment.payment_type,'') j_payment_payment_type FROM j_payment INNER JOIN j_studentsituations l1 ON j_payment.id=l1.payment_id AND l1.deleted=0 INNER JOIN j_class l2 ON l1.ju_class_id=l2.id AND l2.deleted=0 WHERE ((
(l2.koc_id = '' OR l2.koc_id IS NULL)
)) AND j_payment.deleted=0";

$rs1 = $GLOBALS['db']->query($q1);
while($row1 = $GLOBALS['db']->fetchByAssoc($rs1)){
    //Get List Class Of Payment
    $sql_get_class="SELECT DISTINCT
    IFNULL(l2.id, '') l2_id,
    IFNULL(l2.name, '') l2_name,
    IFNULL(l2.class_code, '') class_code,
    IFNULL(l2.level, '') level,
    IFNULL(j_payment.id, '') primaryid,
    l3.kind_of_course kind_of_course,
    l2.kind_of_course kind_of_course_class,
    IFNULL(l3.name, '') kind_of_course_name
    FROM
    j_payment
    INNER JOIN
    j_studentsituations l1 ON j_payment.id = l1.payment_id
    AND l1.deleted = 0
    INNER JOIN
    j_class l2 ON l1.ju_class_id = l2.id
    AND l2.deleted = 0
    LEFT JOIN
    j_kindofcourse l3 ON l2.koc_id = l3.id AND l3.deleted = 0
    WHERE
    j_payment.id = '{$row1['primaryid']}'
    AND j_payment.deleted = 0
    ORDER BY l2.name";
    $result_get_class = $GLOBALS['db']->query($sql_get_class);
    $class  = '';
    $level  = '';
    $koc    = '';
    $kind_of_course    = '';
    while($row = $GLOBALS['db']->fetchByAssoc($result_get_class)){
        if(empty($class)){
            $class  .= $row['class_code'];
            $koc    .= $row['kind_of_course_name'];
            $level  .= $row['level'];
            if(!empty($row['kind_of_course']))
                $kind_of_course  = $row['kind_of_course'];
            else $kind_of_course  = $row['kind_of_course_class'];
        } else{
            $class  .= ','.$row['class_code'];
            $koc    .= ','.$row['kind_of_course_name'];
            $level  .= ','.$row['level'];
        }
    }
    $GLOBALS['db']->query("UPDATE j_payment SET class_string = '$class', kind_of_course_string = '$koc', kind_of_course='$kind_of_course', level_string = '$level' WHERE id = '{$row1['primaryid']}'");
}

