<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: get_daily_record_by_id.php 
 * Date and Time: Dec 6, 2016 5:11:03 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/daily_records_repository.php';
include_once '../../model/daily_records.php';
include_once '../../db/db_context.php';
require '../../db/db_connect.php';
$db = DBContext::getDB();

$id = 0;
if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
    echo "Error";
    return;
} 
$newDailyRecord = DailyRecordsRepository::getDailyRecordById($id);
echo $newDailyRecord->convertToJson();
