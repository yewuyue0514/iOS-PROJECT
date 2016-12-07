<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: delete_daily_record.php 
 * Date and Time: Dec 6, 2016 5:13:32 PM 
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
$rowCount = DailyRecordsRepository::deleteDailyRecordById($id); 
echo json_encode(array('rowCount'=>$rowCount));
