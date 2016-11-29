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
// Read request parameters
//$firstName = $_REQUEST["firstName"];
//$lastName = $_REQUEST["lastName"]; // Store values in an array
//$returnValue = array("firstName" => $firstName, "lastName" => $lastName); // Send back request in JSON format
//echo json_encode($returnValue);
