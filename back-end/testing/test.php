<?php

/*
 * Student Info: Name=Tsai-Chang Mai, ID=10010
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Arvin
 * Filename: test.php 
 * Date and Time: Nov 28, 2016 10:46:50 PM 
 * Project Name: CS556_Team_Project 
 */
include_once '../model/child_profiles_repository.php';
include_once '../model/child_profiles.php';
include_once '../db/db_context.php';
require '../db/db_connect.php';
$db = DBContext::getDB();
$newChild = new ChildProfiles(NULL, NULL, NULL, NULL, NULL, NULL, NULL, $_POST['enrollment_date']
        , $_POST['start_date'], $_POST['withdraw_date'], $_POST['withdraw_reason'], $_POST['first_name']
        , $_POST['last_name'], $_POST['chinese_name'], $_POST['nick_name'], $_POST['sex'], $_POST['age']
        , $_POST['birthday'], $_POST['primary_language'], $_POST['address'], $_POST['phone'], $_POST['child_status']);
$newArray = $newChild->convertAsArray();
//echo json_encode($newArray);
//$newChildId = ChildProfilesRepository::addChild($newChild);
$child = ChildProfilesRepository::getChildById(1);
$result = $child->convertAsArray();
echo json_encode($result);
//$result = $child->convertAsArray();
//$result = array('id'=>$newChildId);
//echo json_encode($result);
// Read request parameters
//$firstName = $_REQUEST["firstName"];
//$lastName = $_REQUEST["lastName"]; // Store values in an array
//$returnValue = array("firstName" => $firstName, "lastName" => $lastName); // Send back request in JSON format
//echo json_encode($returnValue);
