<?php

/*
 * Student Info: Name=Tsai-Chang Mai, ID=10010
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Arvin
 * Filename: add_child.php 
 * Date and Time: Nov 28, 2016 9:04:17 PM 
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
$newChildId = ChildProfilesRepository::addChild(json_encode($newArray));
$child = ChildProfilesRepository::getChildById($newChildId);
$result = $child->convertAsArray();
echo json_encode($child);
