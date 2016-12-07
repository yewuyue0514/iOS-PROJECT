<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: delete_emergency_contact_profile.php 
 * Date and Time: Dec 6, 2016 5:41:29 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/emergency_contact_profiles_repository.php';
include_once '../../model/emergency_contact_profiles.php';
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
$rowCount = EmergencyContactProfilesRepository::deleteEmergencyContactProfileById($id); 
echo json_encode(array('rowCount'=>$rowCount));
