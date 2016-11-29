<?php

/*
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: CS556_Team_Project_Fall_2016
 * Author: Wei Jin
 * Filename: child_profiles_repository.php
 * Date and Time: Nov 9, 2016 6:29:16 PM
 * Project Name: CS556_Team_Project
 */

class ChildProfilesRepository {

    // return all records as an array
    public static function getChilds() {
        global $db;
        $query = "SELECT * FROM daycaredb.child_profiles ORDER BY id";
        $result = $db->query($query);
        $childs = array();
        foreach ($result as $row) {
            //impelement the child class
            $child = new ChildProfiles($row['id'], $row['mom_id'], $row['dad_id'], $row['emer_1_id'], $row['emer_2_id']
                    , $row['medical_history_id'], $row['medical_care_id'], $row['enrollment_date'], $row['start_date']
                    , $row['withdraw_date'], $row['withdraw_reason'], $row['first_name'], $row['last_name']
                    , $row['chinese_name'], $row['nick_name'], $row['sex'], $row['age'], $row['birthday'], $row['primary_language'], $row['address']
                    , $row['phone'], $row['child_status']);
            $childs[] = $child;
        }
        return $childs;
    }

    // return one record by id, or NULL if no match 
    public static function getChildById($childId) {
        global $db;
        $query = "SELECT count(*) FROM daycaredb.child_profiles WHERE id = $childId";
        if ($result = $db->query($query)) { 
            // Check the number of rows that match the SELECT statement 
            if ($result->fetchColumn() > 0) {
                // Issue the real SELECT statement and work with the results 
                $query = "SELECT * FROM daycaredb.child_profiles WHERE id = $childId";
                $result = $db->query($query);
                $row = $result->fetch();
                $child = new ChildProfiles($row['id'], $row['mom_id'], $row['dad_id'], $row['emer_1_id'], $row['emer_2_id']
                        , $row['medical_history_id'], $row['medical_care_id'], $row['enrollment_date'], $row['start_date']
                        , $row['withdraw_date'], $row['withdraw_reason'], $row['first_name'], $row['last_name']
                        , $row['chinese_name'], $row['nick_name'], $row['sex'], $row['age'], $row['birthday'], $row['primary_language'], $row['address']
                        , $row['phone'], $row['child_status']);
                return $child;
            } else {
                return NULL;
            }
        }
    }

    // return one record by first name and last name, or NULL if no match 
    public static function getChildsByName($fname, $lname) {
        global $db;
        $query = "SELECT count(*) FROM daycaredb.child_profiles WHERE first_name = '$fname' AND last_name = '$lname'";
        if ($result = $db->query($query)) { 
            // Check the number of rows that match the SELECT statement 
            if ($result->fetchColumn() > 0) {
                // Issue the real SELECT statement and work with the results 
                $query = "SELECT * FROM daycaredb.child_profiles WHERE first_name = '$fname' AND last_name = '$lname'";
                $childs = array();
                foreach ($db->query($query) as $row) {
                    $child = new ChildProfiles($row['id'], $row['mom_id'], $row['dad_id'], $row['emer_1_id'], $row['emer_2_id']
                            , $row['medical_history_id'], $row['medical_care_id'], $row['enrollment_date'], $row['start_date']
                            , $row['withdraw_date'], $row['withdraw_reason'], $row['first_name'], $row['last_name']
                            , $row['chinese_name'], $row['nick_name'], $row['sex'], $row['age'], $row['birthday'], $row['primary_language'], $row['address']
                            , $row['phone'], $row['child_status']);
                    $childs[] = $child;
                }
                return $childs;
            } else {
                return NULL;
            }
        }
    }

    // return one record by chinese name, or NULL if no match 
    public static function getChildsByChineseName($name) {
        global $db;
        $query = "SELECT count(*) FROM daycaredb.child_profiles WHERE chinese_name = '$name'";
        if ($result = $db->query($query)) { 
            // Check the number of rows that match the SELECT statement 
            if ($result->fetchColumn() > 0) {
                // Issue the real SELECT statement and work with the results 
                $query = "SELECT * FROM daycaredb.child_profiles WHERE chinese_name = '$name'";
                $childs = array();
                foreach ($db->query($query) as $row) {
                    $child = new ChildProfiles($row['id'], $row['mom_id'], $row['dad_id'], $row['emer_1_id'], $row['emer_2_id']
                            , $row['medical_history_id'], $row['medical_care_id'], $row['enrollment_date'], $row['start_date']
                            , $row['withdraw_date'], $row['withdraw_reason'], $row['first_name'], $row['last_name']
                            , $row['chinese_name'], $row['nick_name'], $row['sex'], $row['age'], $row['birthday'], $row['primary_language'], $row['address']
                            , $row['phone'], $row['child_status']);
                    $childs[] = $child;
                }
                return $childs;
            } else {
                return NULL;
            }
        }
    }

    // return one record by phone number, or NULL if no match 
    public static function getChildsByPhone($phone) {
        global $db;
        $query = "SELECT count(*) FROM daycaredb.child_profiles WHERE phone = $phone";
        if ($result = $db->query($query)) { 
            // Check the number of rows that match the SELECT statement 
            if ($result->fetchColumn() > 0) {
                // Issue the real SELECT statement and work with the results 
                $query = "SELECT * FROM daycaredb.child_profiles WHERE phone = $phone";
                $childs = array();
                foreach ($db->query($query) as $row) {
                    $child = new ChildProfiles($row['id'], $row['mom_id'], $row['dad_id'], $row['emer_1_id'], $row['emer_2_id']
                            , $row['medical_history_id'], $row['medical_care_id'], $row['enrollment_date'], $row['start_date']
                            , $row['withdraw_date'], $row['withdraw_reason'], $row['first_name'], $row['last_name']
                            , $row['chinese_name'], $row['nick_name'], $row['sex'], $row['age'], $row['birthday'], $row['primary_language'], $row['address']
                            , $row['phone'], $row['child_status']);
                    $childs[] = $child;
                }
                return $childs;
            } else {
                return NULL;
            }
        }
    }

    // remove one record from DB, return 1 if record remove successed or 0 if failed
    public static function deleteChild($childId) {
        global $db;
        $query = "DELETE FROM daycaredb.child_profiles WHERE id = $childId";
        $row_count = $db->exec($query);   //after drop the child maybe need to delete related info table
        return $row_count;
    }

    // take a $child as parameter, insert into DB and return the "id" as integer which auto assign by the database, 0 if failed
    public static function addChild($child) {
        global $db;        
        //$child = ChildProfiles::initFromJson($json);
        $mom_id = $child->getMom_id();
        $dad_id = $child->getDad_id();
        $emer1id = $child->getEmer_1_id();
        $emer2id = $child->getEmer_2_id();
        $medicalhisid = $child->getMedical_history_id();
        $medicalcareid = $child->getMedical_care_id();
        $enrollment_date = $child->getEnrollment_date();
        $start_date = $child->getStart_date();
        $withdraw_date = $child->getWithdraw_date();
        $withdraw_reason = $child->getWithdraw_reason();
        $first_name = $child->getFirst_name();
        $last_name = $child->getLast_name();
        $chinese_name = $child->getChinese_name();
        $nick_name = $child->getNick_name();
        $sex = $child->getSex();
        $age = $child->getAge();
        $birthday = $child->getBirthday();
        $primary_language = $child->getPrimary_language();
        $address = $child->getAddress();
        $phone = $child->getPhone();
        $child_status = $child->getChild_status();
        $query = "INSERT INTO daycaredb.child_profiles (mom_id, dad_id, emer_1_id, emer_2_id,medical_history_id,
                  medical_care_id, enrollment_date, start_date, withdraw_date, withdraw_reason,
                  first_name, last_name, chinese_name, nick_name, sex, age, birthday, primary_language,
                  address, phone, child_status) VALUES ($mom_id, $dad_id, $emer1id, $emer2id,$medicalhisid,
                  $medicalcareid, '$enrollment_date', '$start_date', '$withdraw_date', '$withdraw_reason',
                  '$first_name', '$last_name', '$chinese_name', '$nick_name', '$sex', '$age', '$birthday', '$primary_language',
                  '$address', $phone, '$child_status')";
        $db->query($query);
        return $db->lastInsertId();
    }

}
