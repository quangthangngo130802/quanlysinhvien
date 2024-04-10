<?php

function get_list_student() {
    $result = db_fetch_array("SELECT * FROM `tbl_student`");
    return $result;
}

function get_list_class() {
    $result = db_fetch_array("SELECT * FROM `tbl_class`");
    return $result;
}

function get_list_subject() {
    $result = db_fetch_array("SELECT * FROM `tbl_subject`");
    return $result;
}

function get_list_teacher() {
    $result = db_fetch_array("SELECT * FROM `tbl_teacher`");
    return $result;
}

function get_list_faculty() {
    $result = db_fetch_array("SELECT * FROM `tbl_faculty`");
    return $result;
}

function student(){
    $query =  db_fetch_array("SELECT `course_id`, COUNT(course_id) AS `size_status` FROM `tbl_student` GROUP BY `course_id`");
    return $query;
}

function teacher(){
    $query =  db_fetch_array("SELECT `education_id`, COUNT(education_id) AS `size_education` FROM `tbl_teacher` GROUP BY `education_id`");
    return $query;
}

function education($id){
    $result = db_fetch_row("SELECT * FROM `tbl_education` where `education_id` = '{$id}'");
    return $result;
}

function list_major(){
    $result = db_fetch_array("SELECT * FROM `tbl_major` ");
    return $result;
}

function list_class_faculty($id){
    $result = db_fetch_array("SELECT * FROM `tbl_class` where `faculty_id` = '{$id}' ");
    return $result;
}

function list_student_class($id){
    $result = db_fetch_array("SELECT * FROM `tbl_student` where `class_id` = '{$id}'");
    return $result;
}



