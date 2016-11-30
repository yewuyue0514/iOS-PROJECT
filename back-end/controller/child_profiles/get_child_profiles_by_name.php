<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: get_child_profiles_by_name.php 
 * Date and Time: Nov 29, 2016 8:45:57 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/child_profiles_repository.php';
include_once '../../model/child_profiles.php';
include_once '../../db/db_context.php';
require '../../db/db_connect.php';
$db = DBContext::getDB();

$fname = '';
$lname = '';
if(isset($_POST['first_name'])){
    $fname = $_POST['first_name'];
}else{
    echo "Error";
    return;
} 
if(isset($_POST['last_name'])){
    $lname = $_POST['last_name'];
}else{
    echo "Error";
    return;
} 
$newChilds = ChildProfilesRepository::getChildsByName($fname,$lname);
$resultArray = array();
foreach ($newChilds as $child){
    $resultArray[] = $child->convertAsArray();    
}
echo json_encode($resultArray);
