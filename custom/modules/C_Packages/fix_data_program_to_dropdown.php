<?php

    $pro_like = array(
        'flexi' => 'Flexi', // 220
        '1.2.1' => '1.2.1', // 34
        'mobi' => 'Mobile',  // 11
        'premi' => 'Premium', // 3
        'travel' => 'Premium + Travel Expense', // 1
        'ising' => 'Ising Course',   // 1
        'place' => 'Placement Test',  // 8
    );
    // PACKAGE
    $count = 0;
    foreach ($pro_like as $key => $value) {
        $q1 = "SELECT DISTINCT
        IFNULL(c_packages.id, '') primaryid,
        IFNULL(c_packages.name, '') c_packages_name,
        IFNULL(l1.id, '') l1_id,
        IFNULL(l1.name, '') l1_name,
        IFNULL(c_packages.kind_of_course, '') c_packages_kind_of_course
        FROM
        c_packages
        INNER JOIN
        c_programs_c_packages_1_c l1_1 ON c_packages.id = l1_1.c_programs_c_packages_1c_packages_idb
        AND l1_1.deleted = 0
        INNER JOIN
        c_programs l1 ON l1.id = l1_1.c_programs_c_packages_1c_programs_ida
        AND l1.deleted = 0
        WHERE                                                                     
        (((l1.name LIKE '%$key%')))
        AND c_packages.deleted = 0"; 
        $rs1 = $GLOBALS['db']->query($q1);
        while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
            $q2 = "UPDATE c_packages SET kind_of_course='$value' WHERE id='{$row['primaryid']}';";
            $GLOBALS['db']->query($q2);
            $count++;    
        } 
    }
    echo "<b>Updated $count Packages</b><br><br>";
    
    // CLASS
    $count = 0;
    foreach ($pro_like as $key => $value) {
        $q1 = "SELECT DISTINCT
        IFNULL(c_classes.id, '') primaryid,
        IFNULL(c_classes.name, '') c_classes_name,
        IFNULL(l1.id, '') l1_id,
        IFNULL(l1.name, '') l1_name,
        IFNULL(c_classes.kind_of_course, '') c_classes_kind_of_course,
        IFNULL(l2.id, '') l2_id,
        IFNULL(l2.name, '') l2_name
        FROM
        c_classes
        INNER JOIN
        c_programs_c_classes_1_c l1_1 ON c_classes.id = l1_1.c_programs_c_classes_1c_classes_idb
        AND l1_1.deleted = 0
        INNER JOIN
        c_programs l1 ON l1.id = l1_1.c_programs_c_classes_1c_programs_ida
        AND l1.deleted = 0
        INNER JOIN
        teams l2 ON c_classes.team_id = l2.id
        AND l2.deleted = 0
        WHERE
        (((l1.name LIKE '%$key%')))
        AND c_classes.deleted = 0
        ORDER BY l2_name DESC"; 
        $rs1 = $GLOBALS['db']->query($q1);
        while($row = $GLOBALS['db']->fetchByAssoc($rs1)){
            $q2 = "UPDATE c_classes SET kind_of_course='$value' WHERE id='{$row['primaryid']}';";
            $GLOBALS['db']->query($q2);
            $count++;    
        } 
    }
    echo "<b>Updated $count Classes</b><br><br>";

?>
