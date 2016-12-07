<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: get_daily_record_by_child_id.php 
 * Date and Time: Dec 6, 2016 5:11:27 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/daily_records_repository.php';
include_once '../../model/daily_records.php';
include_once '../../db/db_context.php';
require '../../db/db_connect.php';
$db = DBContext::getDB();

$child_id = 0;
if(isset($_POST['child_id'])){
    $id = $_POST['child_id'];
}else{
    echo "Error";
    return;
} 
$newDailyRecord = DailyRecordsRepository::getDailyRecordsByChildId($child_id);
$resultArray = array();
foreach ($newDailyRecord as $record){
    $resultArray[] = $record->converAsArray();    
}
echo json_encode($resultArray);
