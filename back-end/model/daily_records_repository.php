<?php

/*
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei jin 
 * Filename: daily_records_repository.php 
 * Date and Time: Nov 14, 2016 05:17:16 PM 
 * Project Name: CS556_Team_Project 
 */

class DailyRecordsRepository {

    // return all records as an array
    public static function getDailyRecords() {
        global $db;
        $query = "SELECT * FROM daycaredb.daily_records ORDER BY id";
        $result = $db->query($query);
        $dailyrecords = array();
        foreach ($result as $row) {
            //impelement the daily record class
            $dailyrecord = new DailyRecords($row['id'], $row['child_id'], $row['record_date']
                    , $row['emotion'], $row['sleep_duration'], $row['body_temperature'], $row['defecation']
                    , $row['meal'], $row['activity'], $row['defecation_at_home'], $row['sleep_status']);
            $dailyrecords[] = $dailyrecord;
        }
        return $dailyrecords;
    }

    // return one record by id, or NULL if no match
    public static function getDailyRecordById($id) {
        global $db;
        $query = "SELECT count(*) FROM daycaredb.daily_records WHERE id = $id";
        if ($result = $db->query($query)) {
            // Check the number of rows that match the SELECT statement 
            if ($result->fetchColumn() == 1) {
                // Issue the real SELECT statement and work with the results 
                $query = "SELECT * FROM daycaredb.daily_records WHERE id = $id";
                $result = $db->query($query);
                $row = $result->fetch();
                $dailyrecord = new DailyRecords($row['id'], $row['child_id'], $row['record_date']
                        , $row['emotion'], $row['sleep_duration'], $row['body_temperature'], $row['defecation']
                        , $row['meal'], $row['activity'], $row['defecation_at_home'], $row['sleep_status']);
                return $dailyrecord;
            } else {
                return NULL;
            }
        }
    }

    // return all records match the child id, or NULL if no match
    public static function getDailyRecordsByChildId($childId) {
        global $db;
        $query = "SELECT count(*) FROM daycaredb.daily_records WHERE child_id = $childId";
        if ($result = $db->query($query)) {
            // Check the number of rows that match the SELECT statement 
            if ($result->fetchColumn() > 0) {
                // Issue the real SELECT statement and work with the results 
                $dailyrecords = array();
                $query = "SELECT * FROM daycaredb.daily_records WHERE child_id = $childId";
                foreach ($db->query($query) as $row) {
                    //impelement the daily record class
                    $dailyrecord = new DailyRecords($row['id'], $row['child_id'], $row['record_date']
                            , $row['emotion'], $row['sleep_duration'], $row['body_temperature'], $row['defecation']
                            , $row['meal'], $row['activity'], $row['defecation_at_home'], $row['sleep_status']);
                    $dailyrecords[] = $dailyrecord;
                }
                return $dailyrecords;
            } else {
                return NULL;
            }
        }
    }

    // 1. return all records between a period of date, or NULL if no match
    // 2. if $finalDate === NULL, than return all records within the $initialDate, or NULL if no match
    public static function getDailyRecordsByDate($initialDate, $finalDate = NULL) {// = null means $finalDate is a optional parameter
        global $db;
        $dailyrecords = array();
        if ($finalDate == NULL) {
            $checkquery = "SELECT count(*) FROM daycaredb.daily_records WHERE record_date = '$initialDate'";
            $query = "SELECT * FROM daycaredb.daily_records WHERE record_date = '$initialDate'";
        } else {
            $checkquery = "SELECT count(*) FROM daycaredb.daily_records WHERE record_date = '$initialDate' AND '$finalDate'";
            $query = "SELECT * FROM daycaredb.daily_records WHERE record_date BETWEEN '$initialDate' AND '$finalDate'";
        }
        if ($result = $db->query($checkquery)) {
            // Check the number of rows that match the SELECT statement 
            if ($result->fetchColumn() > 0) {
                // Issue the real SELECT statement and work with the results 
                foreach ($db->query($query) as $row) {
                    //impelement the daily record class
                    $dailyrecord = new DailyRecords($row['id'], $row['child_id'], $row['record_date']
                            , $row['emotion'], $row['sleep_duration'], $row['body_temperature'], $row['defecation']
                            , $row['meal'], $row['activity'], $row['defecation_at_home'], $row['sleep_status']);
                    $dailyrecords[] = $dailyrecord;
                }
                return $dailyrecords;
            } else {
                return NULL;
            }
        }
    }

    // remove one record from DB, return 1 if record remove successed or 0 if failed
    public static function deleteDailyRecordById($id) {
        global $db;
        $query = "DELETE FROM daycaredb.daily_records WHERE id = $id";
        $row_count = $db->exec($query);
        return $row_count;
    }

    // take a $signInRecord as parameter
    // insert into DB and return the "id" as integer which auto assign by the database
    // or return 0 if insert failed
    public static function addDailyRecord($dailyRecord) {
        global $db;       
        //$dailyRecord = DailyRecords::initFromjson($json);
        $child_id = $dailyRecord->getChild_id();
        $record_date = $dailyRecord->getRecord_date();
        if($dailyRecord->getEmotion() == NULL){
            $emotion = NULL;
        }else{
            $emotion = $dailyRecord->getEmotion();
        }
        $sleep_duration = $dailyRecord->getSleep_duration();
        $body_temperature = $dailyRecord->getBody_temperature();
        $defecation = $dailyRecord->getDefecation();
        if($dailyRecord->getMeal() == NULL){
            $meal = NULL;
        }else{    
            $meal = $dailyRecord->getMeal();
        }
        if($dailyRecord->getActivity() == NULL){
            $activity = NULL;
        }else{
            $activity = $dailyRecord->getActivity();
        }
        if($dailyRecord->getDefecation_at_home()){
            $defecation_at_home = NULL;
        }else{
            $defecation_at_home = $dailyRecord->getDefecation_at_home();
        }
        if($dailyRecord->getSleep_status() == NULL){
            $sleep_status = NULL;
        }else{
            $sleep_status = $dailyRecord->getSleep_status();
        }
        $query = "INSERT INTO daycaredb.daily_records (child_id, record_date, emotion, sleep_duration, body_temperature, defecation, meal, activity, defecation_at_home, sleep_status) VALUES ($child_id, '$record_date', '$emotion', '$sleep_duration', $body_temperature, $defecation, '$meal', '$activity', $defecation_at_home, '$sleep_status')";
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $db->query($query);
            return $db->lastInsertId();
        } catch (PDOException $ex) {
            return array('id'=>$query, 'error'=>$ex->getMessage());
        }
    }

}
