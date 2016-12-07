<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: get_daily_records.php 
 * Date and Time: Dec 6, 2016 5:00:42 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/daily_records_repository.php';
include_once '../../model/daily_records.php';
include_once '../../db/db_context.php';
require '../../db/db_connect.php';
$db = DBContext::getDB();

$newDailyRecord = DailyRecordsRepository::getDailyRecords();
$resultArray = array();
foreach ($newDailyRecord as $record){
    $resultArray[] = $record->converAsArray();    
}
echo json_encode($resultArray);

