<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: get_daily_records_by_date.php 
 * Date and Time: Dec 6, 2016 5:11:54 PM 
 * Project Name: CS556_Team_Project 
 */ 
$initialDate = NULL;
$finalDate = NULL;
if(isset($_POST['initialDate'])){
    $id = $_POST['initialDate'];
}else{
    echo "Error";
    return;
} 
if(isset($_POST['finalDate'])){
    $id = $_POST['finalDate'];
}
$newDailyRecord = DailyRecordsRepository::getDailyRecordsByDate($initialDate, $finalDate);
$resultArray = array();
foreach ($newDailyRecord as $record){
    $resultArray[] = $record->converAsArray();    
}
echo json_encode($resultArray);