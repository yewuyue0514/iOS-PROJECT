<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: get_child_profile_by_phone.php 
 * Date and Time: Nov 29, 2016 8:55:16 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/child_profiles_repository.php';
include_once '../../model/child_profiles.php';
include_once '../../db/db_context.php';
require '../../db/db_connect.php';
$db = DBContext::getDB();

$phone = '';
if(isset($_POST['$phone'])){
    $phone = $_POST['phone'];
}else{
    echo "Error";
    return;
} 
$newChild = ChildProfilesRepository::getChildsByPhone($phone);
echo $newChild->convertToJson();