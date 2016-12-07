<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: add_daily_record.php 
 * Date and Time: Dec 6, 2016 5:14:13 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/daily_records_repository.php';
include_once '../../model/daily_records.php';
include_once '../../db/db_context.php';
require '../../db/db_connect.php';
$db = DBContext::getDB();

$newDailyRecord = new DailyRecords(NULL, NULL, $_POST['record_date']
                            , $_POST['emotion'], $_POST['sleep_duration'], $_POST['body_temperature'], $_POST['defecation']
                            , $_POST['meal'], $_POST['activity'], $_POST['defecation_at_home'], $_POST['sleep_status']);
$newDailyRecordId = DailyRecordsRepository::addChild($newDailyRecord);
echo json_encode(array('id'=>$newDailyRecordId));

