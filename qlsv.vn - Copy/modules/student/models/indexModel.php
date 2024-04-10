<?php

function get_list_students() {
    $result = db_fetch_array("SELECT * FROM `tbl_student`");
    return $result;
}

function phantrang_student($start, $number_page){
    $result =db_fetch_array( "SELECT * FROM `tbl_student` LIMIT $start, $number_page");
    return $result;
}

function class_student_class($id){
    $result =db_fetch_row( "SELECT * FROM `tbl_class` where `class_id` = '{$id}' ");
    return $result;
}

function list_course(){
    $result =db_fetch_array( "SELECT * FROM `tbl_course` ");
    return $result;
}


function course_student($id){
    $result =db_fetch_row( "SELECT * FROM `tbl_course` where `course_id` = '{$id}' ");
    return $result;
}
function course_name($name){
    $result =db_fetch_row( "SELECT * FROM `tbl_course` where `course_name` = '{$name}' ");
    return $result;
}

function check_code_email($code, $email){
    $result =db_num_rows( "SELECT * FROM `tbl_student` where `student_code` = '{$code}' OR `email` = '{$email}' ");
    return $result;
}

function check_code_email_edit($email, $email_not){
    $result =db_num_rows( "SELECT * FROM `tbl_student` where `email` = '{$email}'");
    return $result;
}

function class_name($name, $name1){
    $result =db_fetch_row( "SELECT * FROM `tbl_class` where `class_name` = '{$name}' and  `course_id` = '{$name1}' ");
    return $result;
}


function list_class(){
    $result = db_fetch_array("SELECT * FROM `tbl_class`");
    return $result;
}

function student_by_id($id){
    $result =db_fetch_row( "SELECT * FROM `tbl_student` where `student_id` = '{$id}' ");
    return $result;
}

function list_faculty(){
    $result = db_fetch_array("SELECT * FROM `tbl_faculty`");
    return $result;
}
function list_class_by_faculty($id, $id1){
    $result = db_fetch_array("SELECT * FROM `tbl_class` where `faculty_id` = '{$id}' and `course_id` = '{$id1}'");
    return $result;
}

function search_student($a){
    $result = db_fetch_array(" SELECT * FROM `tbl_student` WHERE $a ");
    return $result;
   
}

function phantrang_search_student($start, $number_page, $a){
    $result = db_fetch_array( "SELECT * FROM `tbl_student` Where $a LIMIT $start, $number_page");
    return $result;
}

function list_class_by_course($id){
    $result = db_fetch_array("SELECT * FROM `tbl_class` where  `course_id` = '{$id}' ");
    return $result;
}

function faculty_by_class($id){
    $result = db_fetch_row("SELECT * FROM `tbl_class` where  `class_id` = '{$id}' ");
    return $result;
}


