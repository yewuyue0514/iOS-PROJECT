<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: get_emergency_contact_profiles.php 
 * Date and Time: Dec 6, 2016 5:40:37 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/emergency_contact_profiles_repository.php';
include_once '../../model/emergency_contact_profiles.php';
include_once '../../db/db_context.php';
require '../../db/db_connect.php';
$db = DBContext::getDB();

$newEmergencyContactProfile = EmergencyContactProfilesRepository::getEmergencyContactProfiles();
$resultArray = array();
foreach ($newEmergencyContactProfile as $profile){
    $resultArray[] = $profile->converAsArray();    
}
echo json_encode($resultArray);


