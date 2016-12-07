<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: add_emergency_contact_profile.php 
 * Date and Time: Dec 6, 2016 5:41:46 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/emergency_contact_profiles_repository.php';
include_once '../../model/emergency_contact_profiles.php';
include_once '../../db/db_context.php';
require '../../db/db_connect.php';
$db = DBContext::getDB();
$newEmergencyContactProfile = new EmergencyContactProfiles(NULL, $_POST['relationship']
                        , $_POST['first_name'], $_POST['last_name'], $_POST['chinese_name'], $_POST['home_phone_number']
                        , $_POST['occupation'], $_POST['work_time'], $_POST['work_phone_number'], $_POST['cell_phone_number'], $_POST['note']);
$newEmergencyContactProfileId = EmergencyContactProfilesRepository::addEmergencyContactProfile($newEmergencyContactProfile);
echo json_encode(array('id'=>$newEmergencyContactProfileId));