<!DOCTYPE html>
<?php
/*
 * Student Info ?><br> Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: Wei Jin
 * Filename: index.php 
 * Date and Time: Nov 20, 2016 5:08:57 PM 
 * Project Name: CS556_Team_Project 
 */
include_once '../model/child_profiles_repository.php';
include_once '../model/child_profiles.php';
include_once '../db/db_context.php';
require '../db/db_connect.php';
$db = DBContext::getDB();

$columnIndex = array();
$field = 'Field';
$query = "SHOW columns FROM daycaredb.child_profiles;";
$result = $db->query($query);
//echo "Print all column name:<br><br>";
while ($row = $result->fetch()) {
    $columnIndex[] = $row['Field'];
}
echo "--------------------------------------------------------------------------<br>";
echo "Test for getChilds():<br><br>";
$childs = ChildProfilesRepository::getChilds();
if ($childs === NULL) {
    echo "No data<br>";
}
foreach ($childs as $child) {
    $childArray = $child->convertAsArray();
    foreach ($childArray as $index => $value) {
        echo $columnIndex[$index] . ":   " . $value . "<br>";
    }
    echo "------------------<br>";
}
echo "--------------------------------------------------------------------------<br>";
echo "--------------------------------------------------------------------------<br>";
echo 'Test for getChildById($id):<br><br>';
$testId = 1;
$testIdError = 100;
$child = ChildProfilesRepository::getChildById($testId);
$childError = ChildProfilesRepository::getChildById($testIdError);
$childArray = $child->convertAsArray();
foreach ($childArray as $index => $value) {
    echo $columnIndex[$index] . ":   " . $value . "<br>";
}
echo "------------------<br>";
print_r($childError);
if ($childError === NULL) {
    echo "good, nothing shows up!<br>";
}
echo "--------------------------------------------------------------------------<br>";
echo "--------------------------------------------------------------------------<br>";
echo 'Test for getChildsByName($fname, $lname):<br><br>';
$testFname = 'yue';
$testLname = 'yang';
$testFnameE = 'yuee';
$testLnameE = 'yang';
$childs = ChildProfilesRepository::getChildsByName($testFname, $testLname);
$childError = ChildProfilesRepository::getChildsByName($testFnameE, $testLnameE);
foreach ($childs as $child) {
    $childArray = $child->convertAsArray();
    foreach ($childArray as $index => $value) {
        echo $columnIndex[$index] . ":   " . $value . "<br>";
    }
    echo "------------------<br>";
}
print_r($childError);
if ($childError === NULL) {
    echo "good, nothing shows up!<br>";
}
echo "--------------------------------------------------------------------------<br>";
echo "--------------------------------------------------------------------------<br>";
echo 'Test for getChildsByChineseName($name):<br><br>';
$testname = 'yue yang';
$testnameE = 'yuee yyy';
$childs = ChildProfilesRepository::getChildsByChineseName($testname);
$childError = ChildProfilesRepository::getChildsByChineseName($testnameE);
foreach ($childs as $child) {
    $childArray = $child->convertAsArray();
    foreach ($childArray as $index => $value) {
        echo $columnIndex[$index] . ":   " . $value . "<br>";
    }
    echo "------------------<br>";
}
print_r($childError);
if ($childError === NULL) {
    echo "good, nothing shows up!<br>";
}
echo "--------------------------------------------------------------------------<br>";
echo "--------------------------------------------------------------------------<br>";
echo 'Test for getChildsByPhone($phone):<br><br>';
$testphone = 5103121234;
$testphoneE = 5103001234;
$childs = ChildProfilesRepository::getChildsByPhone($testphone);
$childError = ChildProfilesRepository::getChildsByPhone($testphoneE);
$childArray = $child->convertAsArray();
foreach ($childArray as $index => $value) {
    echo $columnIndex[$index] . ":   " . $value . "<br>";
}
echo "------------------<br>";
print_r($childError);
if ($childError === NULL) {
    echo "good, nothing shows up!<br>";
}
echo "--------------------------------------------------------------------------<br>";
echo "--------------------------------------------------------------------------<br>";
echo 'Test for addChild($child):<br><br>';
$newchild = new ChildProfiles('',2,2,2,2,1,1,'2016-01-01','2016-07-12','','','we', 'hua',
        'we hua', 'bb','m','1-1-1','2015-09-15','english','123 ss', 5103122334,'studing');
$childid = ChildProfilesRepository::addChild($newchild);
$childs = ChildProfilesRepository::getChilds();
foreach ($childs as $child) {
    $childArray = $child->convertAsArray();
    foreach ($childArray as $index => $value) {
        echo $columnIndex[$index] . ":   " . $value . "<br>";
    }
    echo "------------------<br>";
}

//$rows = ChildProfilesRepository::deleteChild(1); 


?>

