<?php

/*
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: CS556_Team_Project_Fall_2016
 * Author: Wei Jin
 * Filename: child_profiles.php
 * Date and Time: Nov 9, 2016 6:01:40 PM
 * Project Name: CS556_Team_Project
 */

class ChildProfiles {

    private $id, $mom_id, $dad_id, $emer_1_id, $emer_2_id, $medical_history_id,
            $medical_care_id, $enrollment_date, $start_date, $withdraw_date, $withdraw_reason,
            $first_name, $last_name, $chinese_name, $nick_name, $sex, $age, $birthday, $primary_language,
            $address, $phone, $child_status;
    function __construct($id, $mum_id, $dad_id, $emer_1_id, $emer_2_id, $medical_history_id, $medical_care_id, $enrollment_date, $start_date, $withdraw_date, $withdraw_reason, $first_name, $last_name, $chinese_name, $nick_name, $sex, $age, $birthday, $primary_language, $address, $phone, $child_status) {
        $this->id = $id;
        $this->mom_id = $mum_id;
        $this->dad_id = $dad_id;
        $this->emer_1_id = $emer_1_id;
        $this->emer_2_id = $emer_2_id;
        $this->medical_history_id = $medical_history_id;
        $this->medical_care_id = $medical_care_id;
        $this->enrollment_date = $enrollment_date;
        $this->start_date = $start_date;
        $this->withdraw_date = $withdraw_date;
        $this->withdraw_reason = $withdraw_reason;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->chinese_name = $chinese_name;
        $this->nick_name = $nick_name;
        $this->sex = $sex;
        $this->age = $age;
        $this->birthday = $birthday;
        $this->primary_language = $primary_language;
        $this->address = $address;
        $this->phone = $phone;
        $this->child_status = $child_status;
    }
    function initFromJson($json){
        $data = json_decode($json);
        $newchild = new self($data->id, $data->mom_id, $data->dad_id, $data->emer_1_id, $data->emer_2_id
                            , $data->medical_history_id, $data->medical_care_id, $data->enrollment_date, $data->start_date
                            , $data->withdraw_date, $data->withdraw_reason, $data->first_name, $data->last_name
                            , $data->chinese_name, $data->nick_name, $data->sex, $data->age, $data->birthday
                            , $data->primary_language, $data->address
                            , $data->phone, $data->child_status);
        return $newchild;
    }
    function convertToJson(){
        $data = $this->convertAsArray();        
        return json_encode($data);
    }
    function getId() {
        return $this->id;
    }

    function getMom_id() {
        return $this->mom_id;
    }

    function getDad_id() {
        return $this->dad_id;
    }

    function getEmer_1_id() {
        return $this->emer_1_id;
    }

    function getEmer_2_id() {
        return $this->emer_2_id;
    }

    function getMedical_history_id() {
        return $this->medical_history_id;
    }

    function getMedical_care_id() {
        return $this->medical_care_id;
    }

    function getEnrollment_date() {
        return $this->enrollment_date;
    }

    function getStart_date() {
        return $this->start_date;
    }

    function getWithdraw_date() {
        return $this->withdraw_date;
    }

    function getWithdraw_reason() {
        return $this->withdraw_reason;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getChinese_name() {
        return $this->chinese_name;
    }

    function getNick_name() {
        return $this->nick_name;
    }

    function getSex() {
        return $this->sex;
    }

    function getAge() {
        return $this->age;
    }

    function getBirthday() {
        return $this->birthday;
    }

    function getPrimary_language() {
        return $this->primary_language;
    }

    function getAddress() {
        return $this->address;
    }

    function getPhone() {
        return $this->phone;
    }

    function getChild_status() {
        return $this->child_status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMum_id($mum_id) {
        $this->mom_id = $mum_id;
    }

    function setDad_id($dad_id) {
        $this->dad_id = $dad_id;
    }

    function setEmer_1_id($emer_1_id) {
        $this->emer_1_id = $emer_1_id;
    }

    function setEmer_2_id($emer_2_id) {
        $this->emer_2_id = $emer_2_id;
    }

    function setMedical_history_id($medical_history_id) {
        $this->medical_history_id = $medical_history_id;
    }

    function setMedical_care_id($medical_care_id) {
        $this->medical_care_id = $medical_care_id;
    }

    function setEnrollment_date($enrollment_date) {
        $this->enrollment_date = $enrollment_date;
    }

    function setStart_date($start_date) {
        $this->start_date = $start_date;
    }

    function setWithdraw_date($withdraw_date) {
        $this->withdraw_date = $withdraw_date;
    }

    function setWithdraw_reason($withdraw_reason) {
        $this->withdraw_reason = $withdraw_reason;
    }

    function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setChinese_name($chinese_name) {
        $this->chinese_name = $chinese_name;
    }

    function setNick_name($nick_name) {
        $this->nick_name = $nick_name;
    }

    function setSex($sex) {
        $this->sex = $sex;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    function setPrimary_language($primary_language) {
        $this->primary_language = $primary_language;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setChild_status($child_status) {
        $this->child_status = $child_status;
    }
    function convertAsArray() {
        $result = array();
        $result['id'] = $this->getId();
        $result['mom_id'] = $this->getMom_id();
        $result['dad_id'] = $this->getDad_id();
        $result['emer_1_id'] = $this->getEmer_1_id();
        $result['emer_2_id'] = $this->getEmer_2_id();
        $result['medical_history_id'] = $this->getMedical_history_id();
        $result['medical_care_id'] = $this->getMedical_care_id();
        $result['enrollment_date'] = $this->getEnrollment_date();
        $result['start_date'] = $this->getStart_date();
        $result['withdraw_date'] = $this->getWithdraw_date();
        $result['withdraw_reason'] = $this->getWithdraw_reason();
        $result['first_name'] = $this->getFirst_name();
        $result['last_name'] = $this->getLast_name();
        $result['chinese_name'] = $this->getChinese_name();
        $result['nick_name'] = $this->getNick_name();
        $result['sex'] = $this->getSex();
        $result['age'] = $this->getAge();
        $result['birthday'] = $this->getBirthday();
        $result['primary_language'] = $this->getPrimary_language();
        $result['address'] = $this->getAddress();
        $result['phone'] = $this->getPhone();
        $result['status'] = $this->getChild_status();
        return $result;
    }

}