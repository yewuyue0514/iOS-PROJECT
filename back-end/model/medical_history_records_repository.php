<?php

/*
 * Student Info: Name=Arvin Mai, ID=10010
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Arvin-tcm 
 * Filename: medical_history_records_repository.php 
 * Date and Time: Nov 10, 2016 11:21:33 PM 
 * Project Name: CS556_Team_Project 
 */

class MedicalHistoryRecordsRepository {

    // return all records as an array
    public static function getAllMedicalHistoryRecords() {
        global $db;
        $query = "SELECT * FROM daycaredb.medical_history_records ORDER BY id";
        $result = $db->query($query);
        $medicalHistoryRecords = array();
        foreach ($result as $row) {
            // fetch db data to record array variable
            $medicalHistoryRecord = new MedicalHistoryRecords($row['id'], row['height'], row['weight'], row['bronchiolitis']
                    , row['pneumonia'], row['chicken_pox'], row['hepatitis'], row['scarlet_fever'], row['measles'], row['german_measles']
                    , row['mumps_'], row['pertussis'], row['other_illnesses']);
            // add new record to array
            $medicalHistoryRecords[] = $medicalHistoryRecord;
        }
        return $medicalHistoryRecords;
    }

    // return one profile search by id, or NULL if no match
    public static function getMedicalHistoryRecordById($id) {
        global $db;
        $query = "SELECT * FROM daycaredb.medical_history_records WHERE id = $id";
        $result = $db->query($query);
        if ($result->rowCount() === 1) {
            $row = $reuslt->fetch();
            $medicalHistoryRecord = new MedicalHistoryRecords($row['id'], row['height'], row['weight'], row['bronchiolitis']
                    , row['pneumonia'], row['chicken_pox'], row['hepatitis'], row['scarlet_fever'], row['measles'], row['german_measles']
                    , row['mumps_'], row['pertussis'], row['other_illnesses']);
            return $medicalHistoryRecord;
        } else {
            return NULL;
        }
    }

    // return record match the child id, or NULL if no match
    public static function getMedicalHistoryByChildId($childId) {
        global $db;
        $queryToGetMedicalHistoryId = "SELECT medical_care_id FROM daycaredb.child_profiles WHERE id = $childId";
        $resultForMedicalHistoryId = $db->query($queryToGetMedicalHistoryId);
        if($resultForMedicalHistoryId->rowCount() !== 1) {
            return NULL;
        }
        $rowForMedicalHistoryId = $resultForMedicalHistoryId->fetch();
        $medicalHistoryId = $rowForMedicalHistoryId['medical_history_id'];
        $queryToGetMedicalHistoryRecord = "SELECT * FROM daycaredb.medical_history_records WHERE id = $medicalHistoryId";
        $resultForMedicalHistoryRecord = $db->query($queryToGetMedicalHistoryRecord);
        if($resultForMedicalHistoryRecord->rowCount() !== 1) {
            return NULL;
        }
        $row = $resultForMedicalHistoryRecord->fetch();
        $medicalHistoryRecord = new MedicalHistoryRecords($row['id'], row['height'], row['weight'], row['bronchiolitis']
                    , row['pneumonia'], row['chicken_pox'], row['hepatitis'], row['scarlet_fever'], row['measles'], row['german_measles']
                    , row['mumps_'], row['pertussis'], row['other_illnesses']);
        return $medicalHistoryRecord;
    }
    

    // remove on record from DB, return 1 if record remove successed or 0 means failed
    public static function deleteMedicalHistoryRecordById($id) {
        global $db;
        $query = "DELETE FROM daycaredb.medical_history_records WHERE id = $id";
        $rowCount = $db->exec($query);
        return $rowCount;
    }

    // take a $medicalHistoryRecord as parameter
    // insert in to DB and return the "id" as integer which auto assign by the DB
    // or return 0 if insert failed
    public static function addMedicalHistoryRecord($medicalHistoryRecord) {
        global $db;
        $query = "INSERT INTO daycaredb.medical_history_records() VALUES()";
        // why no exec?
        $db->query($query);
        return $db->lastInsertId();
    }

}
