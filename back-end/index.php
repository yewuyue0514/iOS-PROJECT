<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: index.php 
 * Date and Time: Nov 27, 2016 9:24:33 PM 
 * Project Name: CS556_Team_Project 
 */    
include_once 'model/child_profiles_repository.php';
include_once 'model/child_profiles.php';
include_once 'db/db_context.php';
require 'db/db_connect.php';
$db = DBContext::getDB();

$columnIndex = array();
$field = 'Field';
$query = "SHOW columns FROM daycaredb.child_profiles;";
$result = $db->query($query);
//echo "Print all column name:<br><br>";
while ($row = $result->fetch()) {
    $columnIndex[] = $row['Field'];
}
echo "--------------------------------------------------------------------------<br>";
$json = '{"id": null ,"mom_id":2,"dad_id": 2, "emer_1_id": 2, "emer_2_id": 2, "medical_history_id": 1, "medical_care_id": 1,
        "enrollment_date": "2016-01-01", "start_date": "2016-07-12", "withdraw_date": null, "withdraw_reason": "qe", "first_name": "we", "last_name": "hua", 
        "chinese_name": "we hua", "nick_name": "bb", "sex": "m", "age": "1-1-1", "birthday": "2015-09-15",
        "primary_language": "english", "address": "123 ss","phone": 5103122334, "child_status": "studing"}';
$newchild = ChildProfiles::initFromJson($json);
print_r($newchild->convertToJson());
$childid = ChildProfilesRepository::addChild($newchild);
$childs = ChildProfilesRepository::getChilds();
foreach ($childs as $child) {
    $childArray = $child->convertAsArray();
    foreach ($childArray as $index => $value) {
        echo $columnIndex[$index] . ":   " . $value . "<br>";
    }
    echo "------------------<br>";
}

?>