<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin 
 * Filename: delete_child_profile.php 
 * Date and Time: Nov 29, 2016 8:39:12 PM 
 * Project Name: CS556_Team_Project 
 */ 
include_once '../../model/child_profiles_repository.php';
include_once '../../model/child_profiles.php';
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
$rowCount = ChildProfilesRepository::deleteChild($id); 
echo json_encode(array('rowCount'=>$rowCount));